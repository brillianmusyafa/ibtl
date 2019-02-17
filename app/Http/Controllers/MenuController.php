<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Menu;
use Illuminate\Http\Request;
use Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $menu = Menu::paginate(25);

        return view('menu.index', compact('menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('menu.create');
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
        
        Menu::create($requestData);

        Session::flash('flash_message', 'Menu added!');

        return redirect('admin/menu');
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
        $menu = Menu::findOrFail($id);

        return view('menu.show', compact('menu'));
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
        $menu = Menu::findOrFail($id);

        return view('menu.edit', compact('menu'));
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
        
        $menu = Menu::findOrFail($id);
        $menu->update($requestData);

        Session::flash('flash_message', 'Menu updated!');

        return redirect('admin/menu');
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
        Menu::destroy($id);

        Session::flash('flash_message', 'Menu deleted!');

        return redirect('menu');
    }

    public function jsonMenu()
    {
        $menu = [];
        $data = Menu::where('level',1)->orderBy('sequence')->get();
        foreach ($data as $key => $value) {
            $menu[] = [
                'id'=>$value->id,
                'nama_menu'=>$value->nama_menu,
                'link'=>$value->link,
                'icon'=>$value->icon,
                'is_parent'=>$value->is_parent,
                'level'=>$value->level,
                'child'=>$this->getChild($value->id)
            ];
        }
        return view('helper.menu',compact('menu'));
    }

    public function getChild($id)
    {
        $sub = Menu::where('menu_id',$id)->get();
        $menu = [];
        if(count($sub)>0){
            foreach ($sub as $key => $value) {
                $menu[] = [
                'id'=>$value->id,
                'nama_menu'=>$value->nama_menu,
                'link'=>$value->link,
                'icon'=>$value->icon,
                'is_parent'=>$value->is_parent,
                'level'=>$value->level,
                'child'=>$this->getChild($value->id)
                ];
            }
        }

        return $menu;

    }
}
