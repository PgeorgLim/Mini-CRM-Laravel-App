<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Userlevel extends Model
{
    //
    public function user(){
        return $this->hasMany(User::class);
    }
}
