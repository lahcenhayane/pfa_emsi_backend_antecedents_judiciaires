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
        return $this->belongsToMany(Criminal::class, 'criminal_fichier', 'fichier_id', 'criminal_id', 'id', 'id');
    }
    public function victimes(){
        return $this->belongsToMany(Victime::class, 'victime_fichier', 'fichier_id', 'victime_id', 'id', 'id');
    }
}
