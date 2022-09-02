<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jamu extends Model
{
    use HasFactory;

    // Mass assignment -> menambah fields-field yg diizinkan untuk melakukan manipulasi data
    protected $fillable = [
        'image',
        'merk',
        'variety',
        'stock',
        'price'
    ];
}
