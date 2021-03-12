<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Victime extends Model
{
    use Uuids;
    use HasFactory;

    public function fichiers(){
        return $this->belongsToMany(Fichier::class, 'victime_fichier', 'victime_id', 'fichier_id', 'id', 'id');
    }
}
