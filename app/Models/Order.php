<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $hidden=['created_at','updated_at'];

    public function ratings()
    {
        return $this->hasMany(OrderRating::class,'order_id','id');
    }
}
