<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Harcelement extends Model
{
    use HasFactory, HasRoles;

    protected $table = "harcelements";

    protected $fillable = [
        'type',
    ];

    public function signalements()
    {
        return $this->hasMany(Signalement::class);
    }

    public function tutoriels()
    {
        return $this->hasMany(Tutoriel::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
