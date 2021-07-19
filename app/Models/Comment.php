<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{   
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'user_id',
        'parties_id',
    ];
    //  Relacion de un comentario a user
    public function user (){
        return $this -> belongsTo (User::class);

        
    }
    //  Relacion de un comentario a una party
    public function party (){
        return $this -> belongsTo (Party::class);

        
    }
}
