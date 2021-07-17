<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    
    protected $fillable = [
        'message',
        'party_id',
        'user_id'
    ];


    public function user (){
        return $this -> belongsTo (User::class);
    }

    public function party (){
        return $this -> belongsTo (Party::class);        
    }
}
}
