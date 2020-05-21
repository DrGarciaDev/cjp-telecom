<?php

namespace CJPTELECOM;

use Illuminate\Database\Eloquent\Model;

class Registros extends Model
{
    protected $table = "registros";
    protected $fillable = [
    	'id',
    	'user_show_id',
    	'device_show_id',
    	'ip',
    	'device_id',
    	'created_at',
    	'updated_at'
    ];

    public function un_dispositivo()
    {
        return $this->hasOne('CJPTELECOM\Dispositivos', 'id', 'device_id');
    }
}
