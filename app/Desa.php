<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
	
    protected $table = 'villages';
    public $incrementing = false;
    protected $appends = array('total_formulir','desa_belum');
    
    protected $casts = ['id' => 'string'];


    public function Kecamatan()
    {
        return $this->hasOne('App\Kecamatan', 'id', 'district_id');
    }


    public function Formulir()
    {
        return $this->hasMany('App\Formulir_btl', 'desa_id', 'id');
    }

    public function getTotalFormulirAttribute()
	{
		return $this->Formulir->count();
	}

	public function getDesaBelumAttribute()
	{
		if($this->Formulir->count() == 0){
			return true;
		}
		else{
			return false;
		}
	}
}
