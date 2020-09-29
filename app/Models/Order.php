<?php

namespace App\Models;
    use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    use SoftDeletes;
    protected $dates=['deleted_at'];

    protected $fillable = [
        'price' , 'quantity','date', 'status' ,
        'discount', 'user_id','product_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function product()
    {
    	return $this->belongsToMany(Product::class);
    }
}
