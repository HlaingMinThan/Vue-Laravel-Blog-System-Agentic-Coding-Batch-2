<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NRC extends Model
{
    //a nrc belongsto a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
