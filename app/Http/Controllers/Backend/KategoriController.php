<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\KategoriModel;
use DB;

class KategoriController extends Controller
{
    public function index(){
        $kategori = DB::table('tb_kategori')
        ->orderBy('id_kategori')
        ->get();
        return view('backend/pages/kategori/index',compact('kategori'));
        dd("asd");
    }

    public function create(){
        return view (
            'backend/pages/kategori/form',
            [
                'url'=>'kategori.store'
            ]
            );
    }

    public function store(Request $request, KategoriModel $kategori){
        $validator = Validator::make($request->all(),[
            'nama_kategori'=>'required',
            'deskripsi_kategori'=>'required',

        ]);

        if($validator->fails()){
            return redirect()
            ->route('kategori.create')
            ->withErrors($validator)
            ->withInput();
        }else{
            $kategori->nama_kategori = $request->input('nama_kategori');
            $kategori->deskripsi_kategori = $request->input('deskripsi_kategori');
            $kategori->save();

            return redirect()
            ->route('kategori')
            ->with('message','Data Berhasil Disimpan');
        }
    }

    public function edit(KategoriModel $kategori){
        return view(
            'backend/pages/kategori/form',compact('kategori')
        );
    }

    public function update(Request $request,KategoriModel $kategori){
        $validator = Validator::make($request->all(),[
            'nama_kategori'=>'required',
            'deskripsi_kategori'=>'required',
        ]);

        if($validator->fails()){
            return redirect()
            ->route('kategori.edit')
            ->withErroes($validator)
            ->withInput();
        }else{
            $kategori->nama_kategori = $request->input('nama_kategori');
            $kategori->deskripsi_kategori = $request->input('deskripsi_kategori');
            $kategori->save();

            return redirect()
            ->route('kategori')
            ->with('message','Data Berhasil Diedit');
        }
    }

    public function destroy(KategoriModel $kategori){
        $kategori->forceDelete();
        return redirect()
        ->route('kategori')
        ->with('message','Data Berhasil Dihapus');
    }
}
