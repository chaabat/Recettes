<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recette extends Model
{
    use HasFactory;
    protected $fillable = [
       'nomRecettes',
       'picture',
       'description',
       'categorie_id'
    ];


    public function category()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }
    
}
