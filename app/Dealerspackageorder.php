<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dealerspackageorder extends Model
{
    public function dealer()
    {
        return $this->belongsTO('App\Dealer', 'dealerid', 'id');
    }
}
