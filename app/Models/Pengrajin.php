<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengrajin extends Model
{
    protected $guarded = [];

    // Relasi: Satu Pengrajin punya BANYAK Produk (One to Many)
    public function produks()
    {
        return $this->hasMany(Produk::class);
    }
}