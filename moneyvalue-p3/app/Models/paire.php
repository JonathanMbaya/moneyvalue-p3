<?php

namespace App\Models;

use App\Models\devises;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class paire extends Model
{
    use HasFactory;

    public function devises(){
        return $this -> belongsTo(devises::class);
    }
}
