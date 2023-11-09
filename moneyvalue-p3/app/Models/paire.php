<?php

namespace App\Models;

use App\Models\Devises;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paire extends Model
{
    use HasFactory;

    public function devises(): belongsToMany{

        return $this->belongsToMany(Devises::class);
    }
}
