<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withTimestamps()
            ->withPivot('sale_price')
            ->withPivot('quantity');
    }

    public function getTotal()
    {
        return $this->products()->sum(DB::raw('sale_price * quantity'));
    }

    public function getAverage()
    {
        return $this->products()->average(DB::raw('sale_price * quantity'));
    }
}
