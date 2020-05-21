<?php

namespace CJPTELECOM;

use Illuminate\Database\Eloquent\Model;

class Dispositivos extends Model
{
    protected $table = "dispositivos";
    protected $fillable = [
    	'id',
    	'name',
    	'show_id',
    	'user_id',
    	'deleted_at',
    	'created_at',
    	'updated_at',
    ];

    public function un_usuario()
    {
        return $this->hasOne('CJPTELECOM\User', 'id', 'user_id');
    }

    public function varios_registros()
    {
        return $this->hasMany('CJPTELECOM\Registros', 'device_id', 'id');
    }
}
