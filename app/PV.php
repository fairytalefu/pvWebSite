<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PV extends Model
{
    //确定表的名称
    protected $table = 'pv';
    protected $fillable = [
        'deviceId','Temp','Humidity','Vmp','Imp','Voltage','Current','Status','Lat','Lng', 'Power'
    ];
}
