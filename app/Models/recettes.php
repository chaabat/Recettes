<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recettes extends Model
{
    use HasFactory;
    protected $fillable = [
       'nomCategorie',
       'picture'
    ];
}
