@extends('backend/layout/app')
@section('content')
<title>Asset Form - Mediatama Assets</title>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 align="middle" class="card-title">Asset Form - Mediatama</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ isset($aset) ? route('aset.update', $aset->id_aset) : route('aset.store') }}"
            method="POST" >
            @csrf
            @if(isset($aset))
            @isset($aset)
            @method('put')
            @endif
            @endif
            <div class="card-body">
            <input type="hidden" name="id_pengguna" value="{{session('id_pengguna')}}">
                <div class="form-group">
                    <label for="nama_aset">Project Name</label>
                    <input type="text" class="form-control @error('nama_aset') {{ 'is-invalid' }} @enderror"
                        value="{{ old('nama_aset') ?? $aset->nama_aset ?? ''}}" name="nama_aset"
                        placeholder="Type Here">
                    @error('nama_aset')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="form-group  col-md-12">
                        <label>Category</label>
                        <select name="id_kategori" id="id_kategori" class="form-control @error('id_kategori') {{ 'is-invalid' }} @enderror">
                            <option value="">Select</option>
                            @foreach($kategori as $no => $kategori)
                            <option value="{{ $kategori->id_kategori }}">
                                {{ $kategori->nama_kategori}}</option>
                            @endforeach
                        </select>
                        @if(isset($aset))
                        <script>
                            document.getElementById('id_kategori').value =
                                '<?php echo $aset->id_kategori ?>'
                        </script>
                        @endif
                        @error('id_kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="deskripsi_aset" class=" form-control-label">Description</label>
                    <textarea id="konten" name="deskripsi_aset" rows="10" cols="50"
                        class="form-control @error('deskripsi_aset') {{ 'is-invalid' }} @enderror">{{ old('deskripsi_aset') ?? $aset->deskripsi_aset ?? ''}}</textarea>

                    @error('deskripsi_aset')
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
