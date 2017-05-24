<?php
/**
 * Created by PhpStorm.
 * User: kaling
 * Date: 15/05/2017
 * Time: 5:42 PM
 */

namespace App\Http\Controllers;


use Curl\Curl;
use Illuminate\Http\Request;
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
        $infoUrl = "https://api.weixin.qq.com/sns/userinfo?access_token=".$token."&openid=".$openId."&lang=zh_CN";
        $infoCurl = new Curl();
        $infoCurl->get($infoUrl);
        $infoRes = $infoCurl->response;
        $infoArr = json_decode($infoRes, true);
        return view('store', ['infoArr'=>$infoArr]);
//        return view('token', ['url'=>$url]);
    }

    public function getCode(Request $request)
    {
        $redirectUri = urlencode("http://wf.hk1.mofasuidao.cn/token");
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".ApiController::$APP_ID."&redirect_uri=" . $redirectUri . "&response_type=code&scope=snsapi_userinfo&state=123#wechat_redirect";
        return Redirect::to($url);
//        return view('code');
    }

}