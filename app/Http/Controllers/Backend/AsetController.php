<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\AsetModel;
use App\Models\PenggunaModel;
use App\Models\KategoriModel;
use DB;

class AsetController extends Controller
{
    public function index(){
        $aset = DB::table('tb_aset')
                ->leftjoin('tb_pengguna','tb_pengguna.id_pengguna','=','tb_aset.id_pengguna')
                ->leftjoin('tb_kategori','tb_kategori.id_kategori','=','tb_aset.id_kategori')
                ->orderBy('id_aset')
                ->get();
        return view('backend/pages/aset/index',compact('aset'));
    }

    public function create(){
        $kategori=KategoriModel::all();
        return view (
            'backend/pages/aset/form',
            [
                'url'=>'aset.store',
                'kategori'=>$kategori
            ]
            );
    }

    public function store(Request $request, AsetModel $aset){
        $validator = Validator::make($request->all(),[
            'id_pengguna'=>'required',
            'id_kategori'=>'required',
            'nama_aset'=>'required',
            'deskripsi_aset'=>'required',

        ]);

        if($validator->fails()){
            return redirect()
            ->route('aset.create')
            ->withErrors($validator)
            ->withInput();
        }else{
            $aset->id_pengguna = $request->input('id_pengguna');
            $aset->id_kategori = $request->input('id_kategori');
            $aset->nama_aset = $request->input('nama_aset');
            $aset->deskripsi_aset = $request->input('deskripsi_aset');
            $aset->save();

            return redirect()
            ->route('aset')
            ->with('message','Data Berhasil Disimpan');
        }
    }

    public function edit(AsetModel $aset){
        $kategori=KategoriModel::all();
        return view(
            'backend/pages/aset/form',compact('aset','kategori')
        );
    }

    public function update(Request $request, AsetModel $aset){
        $validator = Validator::make($request->all(),[
            'id_pengguna'=>'required',
            'id_kategori'=>'required',
            'nama_aset'=>'required',
            'deskripsi_aset'=>'required',
        ]);

        if($validator->fails()){
            return redirect()
            ->route('aset.edit')
            ->withErroes($validator)
            ->withInput();
        }else{
            $aset->id_pengguna = $request->input('id_pengguna');
            $aset->id_kategori = $request->input('id_kategori');
            $aset->nama_aset = $request->input('nama_aset');
            $aset->deskripsi_aset = $request->input('deskripsi_aset');
            $aset->save();

            return redirect()
            ->route('aset')
            ->with('message','Data Berhasil Diedit');
        }
    }

    public function destroy(AsetModel $aset){
        $aset->forceDelete();
        return redirect()
        ->route('aset')
        ->with('message','Data Berhasil Dihapus');
    }
}
