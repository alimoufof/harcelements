<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
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

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
