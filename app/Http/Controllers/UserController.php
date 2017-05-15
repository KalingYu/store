<?php
/**
 * Created by PhpStorm.
 * User: kaling
 * Date: 15/05/2017
 * Time: 5:42 PM
 */

namespace App\Http\Controllers;


class UserController extends Controller
{
    public function toStorePage() {
        return view('store');
    }
}