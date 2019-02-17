<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Formulir_btl;
use App\Category;
use App\Kecamatan;
use Illuminate\Http\Request;
use Session;
use Yajra\Datatables\Datatables;
use App\User;

class Formulir_btlController extends Controller
{

    public $tahapan = [
        'BENDAHARA'=>'BENDAHARA',
        'SPP & SPM'=>'SPP & SPM',
        'PENGGUNA ANGGARAN'=>'PENGGUNA ANGGARAN'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    // public function index()
    // {
    //     $formulir_btl = Formulir_btl::orderBy('updated_at','ASC')->paginate(25);

    //     return view('formulir_btl.index', compact('formulir_btl'));
    // }

    public function index(Request $req)
    {
        $lists_kec = Kecamatan::where('id','LIKE','3328%')->orderBy('name')->pluck('name','id');
        $req->flash();

        // $input = $req->all();
        return view('formulir_btl.index_datatables',compact('lists_kec','input'));
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData(Request $request)
    {
        $input = $request->all();
        $model = Formulir_btl::with(['Kecamatan','Desa','Category'])->orderBy('updated_at','ASC');
        if(isset($input['kecamatan_id'])){
            $model = $model->where('kecamatan_id',$input['kecamatan_id']);
        }

        $request->flash();
        return DataTables::of($model)->make(true);
    }

    public function getBasic(){
        $formulir_btl = Formulir_btl::orderBy('updated_at','ASC');
        return DataTables::of($formulir_btl)->make();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $value_sub_category = 0;
        $value_category = 0;
        $value_kecamatan = 0;
        $desa = 0;
        $category = Category::where('level',1)->pluck('nama_category','id');
        $tahapan = $this->tahapan;
        $kecamatan = Kecamatan::where('regency_id','3328')->orderBy('name','ASC')->pluck('name','id');
        return view('formulir_btl.create',compact('desa','value_kecamatan','category','kecamatan','tahapan','value_category','value_sub_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();
        if(isset($requestData['bendahara'])){
            $requestData['bendahara'] = 1;
        }
        else{
            $requestData['bendahara'] = null;
        }
        if(isset($requestData['spm'])){
            $requestData['spm'] = 1;
        }
        else{
            $requestData['spm'] = null;
        }
        if(isset($requestData['pengguna_anggaran'])){
            $requestData['pengguna_anggaran'] = 1;
        }
        else{
            $requestData['pengguna_anggaran'] = null;
        }
        Formulir_btl::create($requestData);
        Session::flash('flash_message', 'Formulir_btl added!');

        return redirect('admin/formulir_btl');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $formulir_btl = Formulir_btl::findOrFail($id);

        return view('formulir_btl.show', compact('formulir_btl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $value_sub_category = null;
        $value_category = null;
        $desa = 0;
        $formulir_btl = Formulir_btl::findOrFail($id);
        $category = Category::where('level',1)->pluck('nama_category','id');
        $tahapan = $this->tahapan;
        $kecamatan = Kecamatan::where('regency_id','3328')->orderBy('name','ASC')->pluck('name','id');
        if($formulir_btl->Category->level >1){
            $findParent = Category::findOrFail($formulir_btl->Category->category_id);
            $value_category = $findParent->id;
            $value_sub_category = $formulir_btl->category;
        }
        if($formulir_btl->desa_id !==0){
            $desa = $formulir_btl->desa_id;
            $value_kecamatan = $formulir_btl->kecamatan_id;
        }
        return view('formulir_btl.edit', compact('formulir_btl','tahapan','category','kecamatan','value_category','value_sub_category','desa','value_kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {

        $requestData = $request->all();
        if(isset($requestData['bendahara'])){
            $requestData['bendahara'] = 1;
        }
        else{
            $requestData['bendahara'] = null;
        }
        if(isset($requestData['spm'])){
            $requestData['spm'] = 1;
        }
        else{
            $requestData['spm'] = null;
        }
        if(isset($requestData['pengguna_anggaran'])){
            $requestData['pengguna_anggaran'] = 1;
        }
        else{
            $requestData['pengguna_anggaran'] = null;
        }
        $formulir_btl = Formulir_btl::findOrFail($id);
        $formulir_btl->update($requestData);

        Session::flash('flash_message', 'Formulir_btl updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Formulir_btl::destroy($id);

        Session::flash('flash_message', 'Formulir_btl deleted!');

        return redirect()->back();
    }

    public function halaman_umum($category)
    {
        $data = Formulir_btl::where('category',$category)->get();
        $category = Category::findOrFail($category);
        return view('daftar_btl',compact('data','category'));
    }
}
