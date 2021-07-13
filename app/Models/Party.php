<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    public function message (){
        return $this -> hasMany(Comments::class);
    }

    public function partyuser (){
        return $this -> belongsTo(PartyUser::class);
    }
}
