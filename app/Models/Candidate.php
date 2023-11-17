<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vacant_id',
        'cv',
    ];

    /* Esta relación define que un modelo de candidato pertenece a un usuario. */
    public function user() {
        return $this->belongsTo(User::class);
    }
}
