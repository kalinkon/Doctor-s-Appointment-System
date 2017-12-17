<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayOff extends Model
{

    protected $table = 'day_offs';
    protected $primaryKey = 'id';

    protected $fillable = [
        'doctor_id',
        'day_off_date',

    ];


    public function doctors()
    {
        return $this->belongsTo(Doctors::class);
    }








}
