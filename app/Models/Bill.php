<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{

    use SoftDeletes;
    protected $dates=['deleted_at'];
    public function product()
    {
    	return $this->belongsToMany(Product::class);
    }
}
