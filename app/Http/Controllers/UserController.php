<?php
/**
 * Created by PhpStorm.
 * User: kaling
 * Date: 15/05/2017
 * Time: 5:42 PM
 */

namespace App\Http\Controllers;


use App\User;
use Curl\Curl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function toStorePage(Request $request, $openId)
    {
        return view('store', ['openId' => $openId]);
    }

    public function getAccessToken(Request $request)
    {
        $code = $request->input('code');

        // 获取 token
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . ApiController::$APP_ID
            . "&secret=" . ApiController::$APP_SECRET
            . "&code=" . $code . "&grant_type=authorization_code";
        $curl = new Curl();
        $curl->get($url);
        $response = $curl->response;
        $resJson = json_decode($response, true);
        $token = $resJson['access_token'];
        $openId = $resJson['openid'];

        // 获取用户信息
        $infoUrl = "https://api.weixin.qq.com/sns/userinfo?access_token=" . $token . "&openid=" . $openId . "&lang=zh_CN";
        $infoCurl = new Curl();
        $infoCurl->get($infoUrl);
        $infoRes = $infoCurl->response;
        $infoArr = json_decode($infoRes, true);

        // 将用户数据存入数据库
        $user = new User;
        $user->wx_name = $infoArr['nickname'];
        $user->sex = $infoArr['sex'];
        $user->openid = $infoArr['openid'];
        $user->avatar = $infoArr['headimgurl'];
        $user->save();

        $url = 'store/' . $openId;
        return Redirect::to($url);
    }

    public function getCode(Request $request)
    {
        $code = $request->input('code');

        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . ApiController::$APP_ID . "&secret=" . ApiController::$APP_SECRET . "&code=" . $code . "&grant_type=authorization_code";
        // 获取 token 和 open id
        $curl = new Curl();
        $curl->get($url);
        $response = $curl->response;
        $resJson = json_decode($response, true);
        $openId = $resJson['openid'];

        // 判断用户是否存在
        $result = DB::table('users')->where('openid', $openId)->get();

        if ($result->isEmpty()) {
            $redirectUri = urlencode("http://wf.hk1.mofasuidao.cn/token");
            $tokenUrl = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . ApiController::$APP_ID . "&redirect_uri=" . $redirectUri . "&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
            return Redirect::to($tokenUrl);
        } else {
            $storePageUrl = 'store/' . $openId;
            return Redirect::to($storePageUrl);
        }
    }

    public function getTokenIfNeed(Request $request)
    {
        $redirectUri = urlencode("http://wf.hk1.mofasuidao.cn/code");
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . ApiController::$APP_ID . "&redirect_uri=" . $redirectUri . "&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
        return Redirect::to($url);
    }

}