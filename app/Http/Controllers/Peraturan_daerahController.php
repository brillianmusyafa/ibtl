<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Peraturan_daerah;
use Illuminate\Http\Request;
use Session;
use App\Upload;

class Peraturan_daerahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $peraturan_daerah = Peraturan_daerah::paginate(25);

        return view('peraturan_daerah.index', compact('peraturan_daerah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tahun = [];
        for ($i=2000; $i<2021 ; $i++) { 
            $tahun[$i] = $i;
        }
        return view('peraturan_daerah.create',compact('tahun'));
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
        // handle upload
        $model = new Upload();
        $path = 'upload';
        $new_name = $model->upload($requestData,$path);
        if($new_name['success'] ==false){

            Session::flash('flash_message', $new_name['msg']);
            return redirect()->back();
        }

        $requestData['file'] = $new_name['nama_file'];
        Peraturan_daerah::create($requestData);

        Session::flash('flash_message', 'peraturan_daerah added!');

        return redirect('admin/peraturan_daerah');
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
        $peraturan_daerah = Peraturan_daerah::findOrFail($id);

        return view('peraturan_daerah.show', compact('peraturan_daerah'));
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
        $peraturan_daerah = Peraturan_daerah::findOrFail($id);
        $tahun = [];
        for ($i=2000; $i<2025 ; $i++) { 
            $tahun[$i] = $i;
        }
        return view('peraturan_daerah.edit', compact('peraturan_daerah','tahun'));
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
        
        $peraturan_daerah = Peraturan_daerah::findOrFail($id);
        $peraturan_daerah->update($requestData);

        Session::flash('flash_message', 'peraturan_daerah updated!');

        return redirect('admin/peraturan_daerah');
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
        Peraturan_daerah::destroy($id);

        Session::flash('flash_message', 'peraturan_daerah deleted!');

        return redirect()->back();
    }
}
