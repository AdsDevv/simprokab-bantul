<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $guarded = [];

    // Relasi: Produk itu MILIK satu Pengrajin
    public function pengrajin()
    {
        return $this->belongsTo(Pengrajin::class);
    }
}