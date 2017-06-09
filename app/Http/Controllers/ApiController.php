<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use WxPayApi;
use WxPayUnifiedOrder;

class ApiController extends Controller
{
    public static $APP_ID = "wxb206faacb556aef7";
    public static $APP_SECRET = "1a7a5e8d89dbc3a37a1f326a74dfcbb0";

    public function getGoods(Request $request)
    {
        $code = 0;
        $msg = "获取成功";
        $body = [];
        try {
            $body = DB::table('goods')->get();
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "查询失败";
        }
        return response()->json(['code' => $code, 'msg' => $msg, 'body' => $body]);
    }

    public function isExist(Request $request, $openId)
    {
        $code = 0;
        $msg = "用户存在";
        $body = [];
        try {
            $result = DB::table('users')->where('openid', $openId)->get();
            if ($result->isEmpty()) {
                $msg = "用户不存在";
                $code = -1;
            }
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "查询失败";
        }
        return response()->json(['code' => $code, 'msg' => $msg, 'body' => $body]);
    }

    public function getCart(Request $request, $openId)
    {
        $code = 0;
        $msg = "获取成功";
        $body = [];
        try {
            $body = DB::table('carts')->where('open_id', $openId)->get();
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "查询失败";
        }

        return response()->json(['code' => $code, 'msg' => $msg, 'body' => $body]);
    }

    public function getUser(Request $request, $openId)
    {
        $code = 0;
        $msg = "获取成功";
        $body = [];
        try {
            $body = DB::table('users')->where('openid', $openId)->get()->first();
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "查询失败";
        }

        return response()->json(['code' => $code, 'msg' => $msg, 'body' => $body]);
    }

    public function getOrder(Request $request, $openId)
    {
        $code = 0;
        $msg = "获取成功";
        $body = [];
        try {
            $body = DB::table('orders')->where('open_id', $openId)->get();
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "查询失败";
        }

        return response()->json(['code' => $code, 'msg' => $msg, 'body' => $body]);
    }

    public function addUser(Request $request)
    {
        $code = 0;
        $msg = "添加成功";
        $body = [];

        try {
            $user = new User;
            $user->wx_name = $request->input('nickname');
            $user->openid = $request->input('openid');
            $user->sex = $request->input('sex');
            $user->avatar = $request->input('headimgurl');
            $user->save();
        } catch (QueryException $exception) {
            $code = -1;
            $msg = "添加用户失败";
        }
    }

    public function updateUser(Request $request)
    {
        $code = 0;
        $msg = "更新成功";
        $body = [];
        try {
            $phone = $request->input('phone');
            $name = $request->input('name');
            $address = $request->input('address');
            $openId = $request->input('open_id');
            $body = DB::table('users')->where('open_id', $openId)->update(['name' => $name, 'address' => $address, 'phone' => $phone]);
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "更新失败";
        }

        return response()->json(['code' => $code, 'msg' => $msg, 'body' => $body]);
    }

    public function addToCart(Request $request)
    {
        $code = 0;
        $msg = "添加成功";
        $body = [];
        try {
            $cart = new Cart;
            $cart->img_url = $request->input('img_url');
            $cart->name = $request->input('name');
            $cart->goods_id = $request->input('goods_id');
            $cart->total_price = $request->input('total_price');
            $cart->count = $request->input('count');
            $cart->open_id = $request->input('open_id');
            $cart->save();
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "添加到购物车错误";
        }

        return response()->json(['code' => $code, 'msg' => $msg, 'body' => $body]);
    }

    public function getCarts(Request $request, $openId)
    {
        $code = 0;
        $msg = "添加成功";
        $body = [];
        try {
            $body = DB::table('carts')->where('open_id', $openId)->get();
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "添加到购物车错误";
        }

        return response()->json(['code' => $code, 'msg' => $msg, 'body' => $body]);
    }

    public function deleteCarts(Request $request)
    {
        $id = $request->input('id');
        $code = 0;
        $msg = "删除成功";
        $body = [];
        try {
            $cart = Cart::find($id);
            $cart->delete();
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "删除错误";
        }

        return response()->json(['code' => $code, 'msg' => $msg, 'body' => $body]);

    }

    public function getWxUserInfo(Request $request)
    {
        $code = $request->input('code');
        $state = $request->input('state');
        if ($state == "123") {
            $curl = new Curl;
        }
    }

    public function getWxPayParam(Request $request)
    {
        $code = 0;
        $msg = "删除成功";
        $body = [];

        $openId = $request->input('openid');
        $fee = $request->input('price');
        $orderNumber = $request->input('orderNumber');

        // 获取工具
        $tools = new \JsApiPay();

        // 统一下单
        $input = new WxPayUnifiedOrder();
        $input->SetAppid(ApiController::$APP_ID);
        $input->SetBody("顺富楼梯订单");
        $input->SetAttach("东莞市厚街顺富楼梯");
        $input->SetOut_trade_no($orderNumber);
        $input->SetTotal_fee($fee);
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 1000 * 60 * 5));
        $input->SetGoods_tag("test");
        $input->SetNotify_url(url('http://wf.hk1.mofasuidao.cn/api/notify'));
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openId);
        $order = WxPayApi::unifiedOrder($input);

        $jsApiParameters = $tools->GetJsApiParameters($order);

        return response()->json(['code' => $code, 'msg' => $msg, 'body' => $jsApiParameters]);
    }

    /**
     * 通知支付完成，将订单结果更新在订单中
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function notifyPay(Request $request)
    {
        // todo 通知支付完成的逻辑,现在无脑返回成功

        $id = $request->input('id');
        $code = 0;
        $msg = "删除成功";
        $body = [];


        return "<xml>
  <return_code><![CDATA[SUCCESS]]></return_code>
  <return_msg><![CDATA[OK]]></return_msg>
</xml>";
    }
}
