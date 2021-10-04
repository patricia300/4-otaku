<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langue extends Model
{
    use HasFactory;

    protected $fillable = ['langue'];

    public function parole_originales()
    {
        return $this->hasMany(ParoleOriginale::class);
    }

    public function traductions()
    {
        return $this->hasMany(Traduction::class);
    }


}
