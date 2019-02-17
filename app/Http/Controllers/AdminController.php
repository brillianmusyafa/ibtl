<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Formulir_btl;
use App\Kecamatan;
use App\Desa;
use DB;

class AdminController extends Controller
{
	public function dashboard($value='')
	{
		$dashboard = $this->getDashboard();
		// return ($dashboard['rekapByCat']);
		return view('admin.dashboard',compact('dashboard'));
	}
	public function getDashboard($value='')
	{
		$count_formulir = Formulir_btl::count();
		$desa_belum = count($this->desa_nol());
		$rekapByCat = $this->rekapCat();
		$kelengkapan = $this->rekapKelengkapan(1);
		$tidak_lengkap = $this->rekapKelengkapan(0);
		return [
			'count_formulir'=>$count_formulir,
			'desa_belum'=>$desa_belum,
			'rekapByCat'=>$rekapByCat,
			'kelengkapan'=>$kelengkapan,
			'tidak_lengkap'=>$tidak_lengkap
		];
	}

	public function desa_nol($value='')
	{
		$data_kec = Kecamatan::where('id','LIKE','3328%')->get();
    	$desa_belum=[];
    	foreach ($data_kec as $key => $value) {
    		$data_desa[$key] = Desa::with(['Formulir','Kecamatan'])->where('district_id',$value->id)->get();

    		foreach ($data_desa[$key] as $k => $v) {
    			if($v->desa_belum){
    				$desa_belum[] = $v;
    			}
    		}
    	}

    	return $desa_belum;
	}

	public function rekapCat($value='')
	{
		$rekap = Formulir_btl::with('cat')
		->select('category',DB::RAW("COUNT(id) as count"))
		->groupBy('category')
		->orderBy('count','DESC')
		->get();

		return $rekap;
	}

	public function rekapKelengkapan($value)
	{
		// lengkap
		if($value == 1){
			$rekap = Formulir_btl::where('bendahara',1)->where('spm',1)->where('pengguna_anggaran',1)->count();
		}
		else{ // tidak lengkap
			$rekap = Formulir_btl::orWhereNull('bendahara')->OrwhereNull('spm')->orWhereNull('pengguna_anggaran')->count();
			// dd($rekap);
		}
		return $rekap;
	}
}
