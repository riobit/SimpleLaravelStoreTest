<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'price',
    ];
    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
    
}
