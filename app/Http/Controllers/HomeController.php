<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formulir_btl;
use App\Skpd;
use App\Category;
use App\Buku_tamu;
use App\Peraturan_daerah;
use App\Apbd;
use App\Page;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index','daftar','pertanyaan','perpustakaan_keuangan_daerah','apbd']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::all();
        $home = Page::where('type','feature')->first();
        return view('home',compact('cat','home'));
    }
    public function daftar($bidang)
    {
        // LIST MENU
        $daftar_kategori = [
        '1'=>'BAPPEDA',
        '2'=>'BPKAD - Anggaran',
        '3'=>'BPKAD - Bid Perbendaharaan Akuntansi',
        '4'=>'BPKAD - Bid Aset Daerah',
        '5'=>'Inspektorat',
        '6'=>'Bagian Pengadaan',
        '7'=>'DISPERMADES',
        '8'=>'SETDA - SSH',
        '9'=>'SETDA - ASB'
        ];

        $list_skpd = Skpd::pluck('nama_skpd','id');
        foreach ($daftar_kategori as $key => $text) {
            if($key == $bidang){
                $nama_kategori = $text;
            }
        }
        return view('daftar',compact('nama_kategori','bidang','list_skpd'));
    }

    public function pertanyaan($id)
    {
        $buku_tamu = Buku_tamu::findOrFail($id);

        // dd($buku_tamu->Bidang->nama_bidang);
        return view('pertanyaan',compact('buku_tamu'));
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function perpustakaan_keuangan_daerah()
    {
        $data = Peraturan_daerah::all();
        return view('perpustakaan_keuangan_daerah',compact('data'));
    }
    public function apbd()
    {
        $perda = Apbd::where('type','perda')->get();
        $perbub = Apbd::where('type','perbub')->get();
        return view('apbd',compact('perda','perbub'));
    }

}
