<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public static $APP_ID = "wx510ecd8668932ea8";
    public static $APP_SECRET = "dce769e237509b1f10480f9cb7440d63";

    public function getGoods(Request $request)
    {
        $code = 0;
        $msg = "获取成功";
        $body = [];
        try {
            $body = DB::table('goods')->get();
        } catch(QueryException $ex) {
            $code = -1;
            $msg = "查询失败";
        }
        return response()->json(['code'=>$code, 'msg'=>$msg, 'body'=>$body]);
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
        } catch(QueryException $ex) {
            $code = -1;
            $msg = "查询失败";
        }
        return response()->json(['code'=>$code, 'msg'=>$msg, 'body'=>$body]);
    }

    public function getCart(Request $request, $openId) {
        $code = 0;
        $msg = "获取成功";
        $body = [];
        try {
            $body = DB::table('carts')->where('open_id', $openId)->get();
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "查询失败";
        }

        return response()->json(['code'=>$code, 'msg'=>$msg, 'body'=>$body]);
    }

    public function getUser(Request $request, $openId) {
        $code = 0;
        $msg = "获取成功";
        $body = [];
        try {
            $body = DB::table('users')->where('openid', $openId)->get()->first();
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "查询失败";
        }

        return response()->json(['code'=>$code, 'msg'=>$msg, 'body'=>$body]);
    }

    public function getOrder(Request $request, $openId) {
        $code = 0;
        $msg = "获取成功";
        $body = [];
        try {
            $body = DB::table('orders')->where('open_id', $openId)->get();
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "查询失败";
        }

        return response()->json(['code'=>$code, 'msg'=>$msg, 'body'=>$body]);
    }

    public function addUser(Request $request) {
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
        }catch (QueryException $exception) {
            $code = -1;
            $msg = "添加用户失败";
        }
    }

    public function updateUser(Request $request) {
        $code = 0;
        $msg = "更新成功";
        $body = [];
        try {
            $phone = $request->input('phone');
            $name = $request->input('name');
            $address = $request->input('address');
            $openId = $request->input('open_id');
            $body = DB::table('users')->where('open_id', $openId)->update(['name'=>$name, 'address'=>$address, 'phone'=>$phone]);
        } catch (QueryException $ex) {
            $code = -1;
            $msg = "更新失败";
        }

        return response()->json(['code'=>$code, 'msg'=>$msg, 'body'=>$body]);
    }

    public function addToCart(Request $request) {
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
        }catch (QueryException $ex) {
            $code = -1;
            $msg = "添加到购物车错误";
        }

        return response()->json(['code'=>$code, 'msg'=>$msg, 'body'=>$body]);
    }

    public function getCarts(Request $request, $openId) {
        $code = 0;
        $msg = "添加成功";
        $body = [];
        try {
            $body = DB::table('carts')->where('open_id', $openId)->get();
        }catch (QueryException $ex) {
            $code = -1;
            $msg = "添加到购物车错误";
        }

        return response()->json(['code'=>$code, 'msg'=>$msg, 'body'=>$body]);
    }

    public function deleteCarts(Request $request) {
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

        return response()->json(['code'=>$code, 'msg'=>$msg, 'body'=>$body]);

    }

    public function getWxUserInfo(Request $request) {
        $code = $request->input('code');
        $state = $request->input('state');
        if ($state == "123") {
            $curl = new Curl;
        }
    }

    public function getCode(Request $request) {

    }
}
