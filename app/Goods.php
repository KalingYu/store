<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
   protected $table = 'goods';

   protected $fillable = [
       'id', 'name', 'intro', 'price', 'img_url'
   ];
}
