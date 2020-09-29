<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Bills_Product;
use Faker\Generator as Faker;

$factory->define(App\Models\Bills_Product::class, function (Faker $faker) {
    return [

        'product_id'=>App\Models\Product::all()->random()->id,
           'bill_id'=>App\Models\Bill::all()->random()->id,
    ];
});
