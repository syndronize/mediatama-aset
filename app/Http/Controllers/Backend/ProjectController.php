<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProjectModel;
use App\Models\AsetModel;
use App\Models\PenggunaModel;
use Storage;
use DB;

class ProjectController extends Controller
{
    public function index(){
        $project = DB::table('tb_project')
                ->leftjoin('tb_pengguna','tb_pengguna.id_pengguna','=','tb_project.id_pengguna')
                ->leftjoin('tb_aset','tb_aset.id_aset','=','tb_project.id_aset')
                ->orderBy('id_project')
                ->get();
        return view('backend/pages/project/index',compact('project'));
    }

    public function create(){
        $aset=AsetModel::all();
        return view (
            'backend/pages/project/form',

            [
                'url'=>'project.store',
                'aset'=>$aset
            ]
            );
    }

    public function store(Request $request, ProjectModel $project){
        $validator = Validator::make($request->all(),[
            'id_pengguna'=>'required',
            'id_aset'=>'required',
            'bukti_project'=>'required|mimes:jpg,jpeg,png,bmp',
            'link_project'=>'required',
            'deskripsi_project'=>'required',

        ]);

        if($validator->fails()){
            return redirect()
            ->route('project.create')
            ->withErrors($validator)
            ->withInput();
        }else{
            $project->id_pengguna = $request->input('id_pengguna');
            $project->id_aset = $request->input('id_aset');
            $project->bukti_project=$request->file("bukti_project")->store("project");
            $project->link_project = $request->input('link_project');
            $project->deskripsi_project = $request->input('deskripsi_project');
            $project->save();

            return redirect()
            ->route('project')
            ->with('message','Data Berhasil Disimpan');
        }
    }

    public function edit(ProjectModel $project){
        $aset=AsetModel::all();
        return view(
            'backend/pages/project/form',compact('project','aset')
        );
    }

    public function update(Request $request,ProjectModel $project){
        $validator = Validator::make($request->all(),[
            'id_pengguna'=>'required',
            'id_aset'=>'required',
            'bukti_project'=>'required|mimes:jpg,jpeg,png,bmp',
            'link_project'=>'required',
            'deskripsi_project'=>'required',
        ]);

        if($validator->fails()){
            return redirect()
            ->route('project.edit')
            ->withErroes($validator)
            ->withInput();
        }else{
            Storage::delete($project->bukti_project);
            $project->id_pengguna = $request->input('id_pengguna');
            $project->id_aset = $request->input('id_aset');
            $project->bukti_project=$request->file("bukti_project")->store("project");
            $project->link_project = $request->input('link_project');
            $project->deskripsi_project = $request->input('deskripsi_project');
            $project->save();

            return redirect()
            ->route('project')
            ->with('message','Data Berhasil Diedit');
        }
    }

    public function destroy(ProjectModel $project){
        Storage::delete($project->bukti_project);
        $project->forceDelete();
        return redirect()
        ->route('project')
        ->with('message','Data Berhasil Dihapus');
    }
}
