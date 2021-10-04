<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $fillable = ['titre_source' , 'type' , 'auteur'];

    protected $attributes = ['type' => 'anime'];


    public function details_chansons() 
    {
        return $this->hasMany(DetailsChanson::class);
    }
}
