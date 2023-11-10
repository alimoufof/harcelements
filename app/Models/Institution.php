<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Institution extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'user_id',
        'grade',
        'nom',
        'email',
        'adresse',
        'image',
        'description',
    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }
}
