<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailsChanson extends Model
{
    use HasFactory;
    public $fillable = [
        'titre' , 
        'artiste' , 
        'categorie' , 
        'numero',
        'nb_vu',
        // 'source_id',
        // 'categorie_id',
        // 'parole_originale_id'
    ];

    protected $attributes = [
        'artiste' => 'unknown',
        'nb_vu' => 0
    ];


    public function source() 
    {
        return $this->belongsTo(Source::class);
    }

    public function categorie() 
    {
        return $this->hasOne(Categorie::class);
    }

    public function parole_originale()
    {
        return $this->hasOne(ParoleOriginale::class);
    }

    public function traductions()
    {
        return $this->hasMany(Traduction::class);
    }

    public function favori()
    {
        return $this->belongsToMany(Favori::class);
    }

}
