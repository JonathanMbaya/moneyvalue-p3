<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\paire;

class Devises extends Model
{
    use HasFactory;

    public function paire(): belongsToMany {
        return $this -> belongsToMany(Paire::class, );
    }
}
