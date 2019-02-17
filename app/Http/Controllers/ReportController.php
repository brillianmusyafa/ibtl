<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kecamatan;
use App\Desa;
use App\Formulir_btl;

class ReportController extends Controller
{

	public function index($value='')
	{
		$list_kec = Kecamatan::where('id','LIKE','3328%')->pluck('name','id');
		$datas = Formulir_btl::all();

		return view('admin.report.index',compact('data','list_kec'));
	}
    public function desa($value='')
    {

    	$data_kec = Kecamatan::where('id','LIKE','3328%')->get();

    	$desa_belum = $this->find_desa_0();
    	return view('admin.report.desa_belum',compact('data_kec','desa_belum'));
    }

    public function desa_detail($kecamatan_id)
    {
    	$data_desa = Desa::where('district_id',$kecamatan_id)->get();

    	return view('admin.report.detail_desa_belum',compact('data_desa'));
    }


    public function find_desa_0($value='')
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

    	// $data_desa = Desa::with(['Formulir'])->get();
    	// return $data_desa;
    	return view('admin.report.detail_desa_belum',compact('data_desa'));
    }
}
