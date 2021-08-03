<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'createdAt'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
