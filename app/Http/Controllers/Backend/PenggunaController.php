<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\PenggunaModel;
use session;
use DB;

class PenggunaController extends Controller
{
    public function __construct(){
        $this->rules = [
            'username_pengguna' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/',
            'password_pengguna' => 'required|regex:/(^[A-Za-z0-9 ]+$)+/'
        ];
    }

    public function indexExt(){
        if(session('id_pengguna') != null){
            return view('backend/home')->with('pesan','Selamat Datang');
        }else{
            return view('backend/auth/index');
        }
    }

    public function aksilogin(Request $request){
        $validator = Validator::make($request->all(),$this->rules);
        if($validator->fails()){
            return back()->with('message','Silahkan Login Kembali');
        }else{
            $username_pengguna = $request->username_pengguna;
            $password_pengguna = $request->password_pengguna;

            $cek = DB::table('tb_pengguna')->where('username_pengguna',$username_pengguna)->where('password_pengguna',$password_pengguna)->first();
            // dd($cek);
            if($cek == TRUE){
                $request->session()->put("id_pengguna", $cek->id_pengguna);
                $request->session()->put("nama_pengguna",$cek->nama_pengguna);
                return redirect()->route('home')->with('message','Selamat Datang');
            }else{
                return back()->with('message','Silahkan Login Kembali');
            }
        }
    }

    public function register()
    {
            return view('backend/auth/form');

    }

    public function aksiregister(Request $request){
        // dd($request->all());
        $validator = Validator ::make($request->all(),$this->rules);
        if($validator->fails()){
            return back()->with('error','Silahkan Login Kembali');
        }else{
            $isilevel="User";
            $pengguna = new PenggunaModel();
            $pengguna->nama_pengguna = $request->input('nama_pengguna');
            $pengguna->username_pengguna = $request->input('username_pengguna');
            $pengguna->nohp_pengguna = $request->input('nohp_pengguna');
            $pengguna->jk_pengguna = $request->input('jk_pengguna');
            $pengguna->level_pengguna = $isilevel;
            $pengguna->password_pengguna = $request->input('password_pengguna');
            $pengguna->save();
            return redirect("/")->with('pesan','Data Berhasil Disimpan');
        }
    }

    public function logout(Request $request){

        $request->session()->forget('id_pengguna');
        $request->session()->forget('nama_pengguna');
        $request->session()->flush();
        return redirect("/")->with('message','Sukses Logout.');
    }

    public function index(){
        $pengguna = DB::table('tb_pengguna')
        ->orderBy('id_pengguna')
        ->get();
        return view('backend/pages/pengguna/index',compact('pengguna'));
    }

    public function create(){
        return view (
            'backend/pages/pengguna/form',
            [
                'url'=>'pengguna.store'
            ]
            );
    }

    public function store(Request $request, PenggunaModel $pengguna){
        $validator = Validator::make($request->all(),[
            'nama_pengguna'=>'required',
            'username_pengguna'=>'required',
            'nohp_pengguna'=>'required',
            'jk_pengguna'=>'required',
            'level_pengguna'=>'required',
            'password_pengguna'=>'required'

        ]);

        if($validator->fails()){
            return redirect()
            ->route('user.create')
            ->withErrors($validator)
            ->withInput();
        }else{
            $pengguna->nama_pengguna = $request->input('nama_pengguna');
            $pengguna->username_pengguna = $request->input('username_pengguna');
            $pengguna->nohp_pengguna = $request->input('nohp_pengguna');
            $pengguna->jk_pengguna = $request->input('jk_pengguna');
            $pengguna->level_pengguna = $request->input('level_pengguna');
            $pengguna->password_pengguna = $request->input('password_pengguna');
            $pengguna->save();

            return redirect()
            ->route('pengguna')
            ->with('message','Data Berhasil Disimpan');
        }
    }

    public function edit(PenggunaModel $pengguna){
        return view(
            'backend/pages/pengguna/form',compact('pengguna')
        );
    }

    public function update(Request $request,PenggunaModel $pengguna){
        $validator = Validator::make($request->all(),[
            'nama_pengguna'=>'required',
            'username_pengguna'=>'required',
            'nohp_pengguna'=>'required',
            'jk_pengguna'=>'required',
            'level_pengguna'=>'required',
            'password_pengguna'=>'required'
        ]);

        if($validator->fails()){
            return redirect()
            ->route('pengguna.edit')
            ->withErroes($validator)
            ->withInput();
        }else{
            $pengguna->nama_pengguna = $request->input('nama_pengguna');
            $pengguna->username_pengguna = $request->input('username_pengguna');
            $pengguna->nohp_pengguna = $request->input('nohp_pengguna');
            $pengguna->jk_pengguna = $request->input('jk_pengguna');
            $pengguna->level_pengguna = $request->input('level_pengguna');
            $pengguna->password_pengguna = $request->input('password_pengguna');
            $pengguna->save();

            return redirect()
            ->route('pengguna')
            ->with('message','Data Berhasil Diedit');
        }
    }

    public function destroy(PenggunaModel $pengguna){
        $pengguna->forceDelete();
        return redirect()
        ->route('pengguna')
        ->with('message','Data Berhasil Dihapus');
    }
}
