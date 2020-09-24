<?php

namespace App\Models;
    use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Order_Product extends Model
{

    use SoftDeletes;
    protected $dates=['deleted_at'];
}
