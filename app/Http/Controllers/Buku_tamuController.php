<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Buku_tamu;
use Illuminate\Http\Request;
use Session;

class Buku_tamuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $buku_tamu = Buku_tamu::paginate(25);

        return view('buku_tamu.index', compact('buku_tamu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('buku_tamu.create');
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
        
        $create = Buku_tamu::create($requestData);
        

        // Session::flash('flash_message', 'Buku_tamu added!');

        return redirect('/daftar/'.$create->id.'/pertanyaan');
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
        $buku_tamu = Buku_tamu::findOrFail($id);

        return view('buku_tamu.show', compact('buku_tamu'));
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
        $buku_tamu = Buku_tamu::findOrFail($id);

        return view('buku_tamu.edit', compact('buku_tamu'));
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
        
        $buku_tamu = Buku_tamu::findOrFail($id);
        $buku_tamu->update($requestData);

        Session::flash('flash_message', 'Buku_tamu updated!');

        return redirect('buku_tamu');
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
        Buku_tamu::destroy($id);

        Session::flash('flash_message', 'Buku_tamu deleted!');

        return redirect('buku_tamu');
    }
}
