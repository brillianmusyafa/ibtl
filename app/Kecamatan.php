<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
	protected $table = 'districts';

	protected $appends = array('total_formulir');

	public function Desa()
	{
		return $this->hasMany('App\Desa', 'district_id', 'id');
	}


	public function Formulir()
	{
		return $this->hasMany('App\Formulir_btl', 'kecamatan_id', 'id');
	}

	public function getTotalFormulirAttribute()
	{
		return $this->Formulir->count();
	}
}
