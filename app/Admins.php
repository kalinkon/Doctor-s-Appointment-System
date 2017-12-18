<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admins extends Model
{
    protected $table = 'admins';


    protected $fillable = [
        'user_id', 'address',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }



}
