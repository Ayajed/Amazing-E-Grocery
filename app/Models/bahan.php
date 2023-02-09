<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahan extends Model
{
    use HasFactory;
    protected $table = "bahan";
    protected $fillable = ['nama_produk', 'harga', 'foto'];
}
