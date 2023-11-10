<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signalement extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'titre',
        'description',
        'contenu',
        'harcelement_id',
    ];

    public function harcelement() 
    {
        return $this->belongsTo(Harcelement::class, 'harcelement_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

