<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Automobilis extends Model
{
    use HasFactory;

    protected $fillable = [
        'pavadinimas',
        'marke',
        'kuras',
    ];
}
