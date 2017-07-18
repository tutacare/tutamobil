<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $table = "deposit";

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
