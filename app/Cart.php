<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    protected $fillable = [
      'id', 'goods_id', 'count'
    ];
//    private $name;
//    private $img_url;
//    private $goods_id;
//    private $total_price;
//    private $count;
//    private $open_id;
}
