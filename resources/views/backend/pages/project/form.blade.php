@extends('backend/layout/app')
@section('content')
<title>Asset Form - Mediatama Assets</title>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 align="middle" class="card-title">Category Form - Mediatama</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ isset($project) ? route('project.update', $project->id_project) : route('project.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($project))
            @isset($project)
            @method('put')
            @endif
            @endif
            <div class="card-body">
                <input type="hidden" name="id_pengguna" value="{{session('id_pengguna')}}">
                <div class="row">
                    <div class="form-group  col-md-12">
                        <label>Project Name</label>
                        <select name="id_aset" id="id_aset" class="form-control @error('id_aset') {{ 'is-invalid' }} @enderror">
                            <option value="">Select</option>
                            @foreach($aset as $no => $aset)
                            <option value="{{ $aset->id_aset }}">
                                {{ $aset->nama_aset}}</option>
                            @endforeach
                        </select>
                        @if(isset($project))
                        <script>
                            document.getElementById('id_aset').value =
                                '<?php echo $project->id_aset ?>'
                        </script>
                        @endif
                        @error('id_aset')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="link_project">Github Url</label>
                    <input type="text" class="form-control @error('link_project') {{ 'is-invalid' }} @enderror"
                    value="{{ old('link_project') ?? $project->link_project ?? ''}}" name="link_project"
                    placeholder="Type Here">
                    @error('link_project')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="peranan project">As</label>
                        <!-- select -->
                        <div class="form-group">
                            <select class="form-control" name="peranan_project">
                                <option disabled selected>Selet</option>
                                <option value="Project Leader">Project Leader</option>
                                <option value="Contributor">Contributor</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi_project" class=" form-control-label">Description</label>
                    <textarea id="konten" name="deskripsi_project" rows="10" cols="50"
                    class="form-control @error('deskripsi_project') {{ 'is-invalid' }} @enderror">{{ old('deskripsi_project') ?? $project->deskripsi_project ?? ''}}</textarea>

                    @error('deskripsi_project')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bukti_project" class="form-control-label">Project Screenshot</label>
                    <input required type="file" id="bukti_project" name="bukti_project"
                    class="form-control-file @error('bukti_project') {{ 'is-invalid' }} @enderror"
                    value="{{ old('bukti_project') ?? $project->bukti_project ?? ''}}">

                    @error('bukti_project')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
@endsection
