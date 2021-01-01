<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'cat_id', 'sup_id','product_quantity','product_quantity_update','product_garage',
        'product_route','product_image','buy_date','expire_date',
        'buying_price','previous_price','previous_selling_price','selling_price',
    ];
}
