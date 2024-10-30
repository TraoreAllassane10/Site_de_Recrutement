<?php

namespace App\Models;

use App\Models\Entreprise;
use App\Models\Canditature;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offre extends Model
{
    use HasFactory;

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function candidatures()
    {
        return $this->hasMany(Canditature::class);
    }
}
