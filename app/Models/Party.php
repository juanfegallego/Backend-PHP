<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'game_id'
    ];

    public function message (){
        return $this -> hasMany(Message::class);
    }

    public function partyuser (){
        return $this -> belongsTo(PartyUser::class);
    }

}
