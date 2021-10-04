<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParoleOriginale extends Model
{
    use HasFactory;

    protected $fillable = [
        'parole_originale',
        // 'details_chanson_id',
        // 'langue_id'
    ];

    public function details_chanson()
    {
        return $this->belongsTo(DetailsChanson::class);
    }

    public function langue()
    {
        return $this->hasOne(Langue::class);
    }
}
