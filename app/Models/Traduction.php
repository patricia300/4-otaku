<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traduction extends Model
{
    use HasFactory;

    protected $fillable = ['parole_traduit'];

    public function langue()
    {
        return $this->hasOne(Langue::class);
    }

    public function details_chanson()
    {
        return $this->belongsTo(DetailsChanson::class);

    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
