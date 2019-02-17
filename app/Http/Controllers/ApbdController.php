<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Apbd;
use Illuminate\Http\Request;
use Session;
use App\Upload;

class ApbdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $apbd = Apbd::paginate(25);

        return view('apbd.index', compact('apbd'));
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
        $type = ['perda'=>'PERDA','perbub'=>'PERBUB'];
        return view('apbd.create',compact('tahun','type'));
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
        Apbd::create($requestData);

        Session::flash('flash_message', 'Apbd added!');

        return redirect('admin/apbd');
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
        $apbd = Apbd::findOrFail($id);

        return view('apbd.show', compact('apbd'));
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
        $apbd = Apbd::findOrFail($id);

        return view('apbd.edit', compact('apbd'));
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
        
        $apbd = Apbd::findOrFail($id);
        $apbd->update($requestData);

        Session::flash('flash_message', 'Apbd updated!');

        return redirect('admin/apbd');
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
        Apbd::destroy($id);

        Session::flash('flash_message', 'Apbd deleted!');

        return redirect('admin/apbd');
    }
}
