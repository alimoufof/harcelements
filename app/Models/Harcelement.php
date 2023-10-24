<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Harcelement extends Model
{
    use HasFactory;

    protected $table = "harcelements";

    protected $fillable = [
        'type',
    ];
}
