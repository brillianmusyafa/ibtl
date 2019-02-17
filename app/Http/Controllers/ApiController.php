<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Desa;
use App\Kecamatan;
use App\Category;
use App\Formulir_btl;
use App\MobileMenu;
use App\Page;

class ApiController extends Controller
{
    public function getDesa($kecamatan_id)
    {
    	$desa = Desa::where('district_id',$kecamatan_id)->orderBy('name','ASC')->pluck('name','id');

    	return view('helper.desa',compact('desa'));
    }

    public function getSubCategory($id)
    {
    	$data = Category::where('category_id',$id)->pluck('nama_category','id');

    	return view('helper.sub_category',compact('data'));
    }

    public function getData($cat,Request $req)
    {
        try{
            $data = Formulir_btl::where('category',$cat);

            $input = $req->all();
            if(isset($input['kecamatan'])){
                $data = $data->where('kecamatan_id',$input['kecamatan']);
            }
            if(isset($input['desa'])){
                $data = $data->where('desa_id',$input['desa']);
            }
            if(isset($input['query'])){
                $data = $data->where('judul_berkas','LIKE','%'.$input['query'].'%');
            }
            return $data->paginate(15);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
        
    }

    public function getMenu($parent=null)
    {
        try{
            if($parent){
                $menu = MobileMenu::where('parent_menu',$parent);
            }
            else{
                $menu = MobileMenu::where('parent_menu',null);
            }
            return $menu->get();
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function getPage($id){
        try{
            $page = Page::findOrFail($id);

            return $page;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
