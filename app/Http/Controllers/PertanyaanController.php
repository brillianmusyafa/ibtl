<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pertanyaan;
use App\Buku_tamu;
use Illuminate\Http\Request;
use Session;
use DB;
use Auth;


class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Role Admin
        if(Auth::user()->role_id == 1){
            $pertanyaan = Pertanyaan::with(['Buku_tamu','Buku_tamu.SKPD'])->paginate(25);
        }
        // Role Bidang
        else{
            $pertanyaan = Pertanyaan::with(['Buku_tamu','Buku_tamu.SKPD'])->whereHas('Buku_tamu',function($query){
                $query->where('bidang_id',Auth::user()->bidang_id);
            })->paginate(25);
        }
        

        return view('pertanyaan.index', compact('pertanyaan'));
    }

    public function list_pertanyaan()
    {
        $pertanyaan = Pertanyaan::with(['Buku_tamu','Buku_tamu.SKPD'])->get();
        $list_skpd = [];
        return view('pertanyaan.list',compact('pertanyaan','list_skpd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pertanyaan.create');
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
        // dd($requestData);

        DB::beginTransaction();
        Pertanyaan::create($requestData);

        // update buku tamu set sudah tanya
        $buku_tamu = Buku_tamu::findOrFail($requestData['buku_tamu_id']);
        $buku_tamu->update(['sudah_tanya'=>1]);

        DB::commit();

        return redirect()->back();
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
        $pertanyaan = Pertanyaan::findOrFail($id);

        return view('pertanyaan.show', compact('pertanyaan'));
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
        $pertanyaan = Pertanyaan::findOrFail($id);

        return view('pertanyaan.edit', compact('pertanyaan'));
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
        
        $pertanyaan = Pertanyaan::findOrFail($id);
        $pertanyaan->update($requestData);

        Session::flash('flash_message', 'Pertanyaan updated!');

        return redirect('admin/pertanyaan');
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
        Pertanyaan::destroy($id);

        Session::flash('flash_message', 'Pertanyaan deleted!');

        return redirect()->back();
    }
}
