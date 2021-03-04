<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criminal extends Model
{
    use Uuids;
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function fichiers(){
        return $this->hasMany(Fichier::class);
    }
}
