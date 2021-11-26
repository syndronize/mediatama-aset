<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    public function index(){
        $home = DB::table('tb_aset')
                ->leftjoin('tb_pengguna','tb_pengguna.id_pengguna','=','tb_aset.id_pengguna')
                ->leftjoin('tb_kategori','tb_kategori.id_kategori','=','tb_aset.id_kategori')
                ->orderBy('id_aset')
                ->select('tb_aset.*','tb_pengguna.*','tb_kategori.*')
                ->get();
        return view('backend/home',compact('home'));
    }

    public function cariNilai(Request $request){

        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $home = DB::table('tb_aset')
                ->leftjoin('tb_pengguna','tb_pengguna.id_pengguna','=','tb_aset.id_pengguna')
                ->leftjoin('tb_kategori','tb_kategori.id_kategori','=','tb_aset.id_kategori')
                ->whereBetween('tb_aset.created_at',array($tanggal_awal,$tanggal_akhir))
                ->select('tb_aset.*','tb_pengguna.*','tb_kategori.*')
                ->orderBy('id_aset')
                ->get();
        return view(
            'backend/home',
            [
                'home' => $home
            ]
        );

    }
}
