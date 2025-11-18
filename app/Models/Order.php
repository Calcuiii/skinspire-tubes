<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'quantity', 'total_price']; // Menambahkan product_id sebagai kolom yang bisa diisi

    public function product()
    {
        return $this->belongsTo(Product::class); // Relasi belongsTo dengan Product
    }
}