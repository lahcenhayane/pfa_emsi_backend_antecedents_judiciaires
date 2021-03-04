<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fichier extends Model
{
    use Uuids;
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function criminals(){
        return $this->hasMany(Criminal::class);
    }
}
