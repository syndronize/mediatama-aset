@extends('backend/layout/app')
@section('content')
<title>Category Form - Mediatama Assets</title>
<br>
<br>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 align="middle" class="card-title">Category Form - Mediatama</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ isset($kategori) ? route('kategori.update', $kategori->id_kategori) : route('kategori.store') }}"
            method="POST" >
            @csrf
            @if(isset($kategori))
            @isset($kategori)
            @method('put')
            @endif
            @endif
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_kategori">Category Name</label>
                    <input type="text" class="form-control @error('nama_kategori') {{ 'is-invalid' }} @enderror"
                        value="{{ old('nama_kategori') ?? $kategori->nama_kategori ?? ''}}" name="nama_kategori"
                        placeholder="Type Here">
                    @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi_kategori" class=" form-control-label">Description</label>
                    <textarea id="konten" name="deskripsi_kategori" rows="10" cols="50"
                        class="form-control @error('deskripsi_kategori') {{ 'is-invalid' }} @enderror">{{ old('deskripsi_kategori') ?? $kategori->deskripsi_kategori ?? ''}}</textarea>

                    @error('deskripsi_kategori')
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
