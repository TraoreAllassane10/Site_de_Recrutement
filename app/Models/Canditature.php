<?php

namespace App\Models;

use App\Models\User;
use App\Models\Offre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Canditature extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function offre()
    {
        return $this->belongsTo(Offre::class);
    }
}
