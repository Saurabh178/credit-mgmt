<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function account(){
    	return $this->hasOne('App\Account');
    }
}
