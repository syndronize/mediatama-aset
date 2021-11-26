@extends('backend/layout/app')
@section('content')
<title>Admin Form - Mediatama Assets</title>
<br>
<br>
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 align="middle" class="card-title">Admin Form - Mediatama Assets</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ isset($pengguna) ? route('pengguna.update', $pengguna->id_pengguna) : route('pengguna.store') }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($pengguna))
            @isset($pengguna)
            @method('put')
            @endif
            @endif
            <div class="card-body">
                <div class="form-group">
                    <label for="nama_pengguna">Full Name</label>
                    <input type="text" class="form-control @error('nama_pengguna') {{ 'is-invalid' }} @enderror"
                        value="{{ old('nama_pengguna') ?? $pengguna->nama_pengguna ?? ''}}" name="nama_pengguna"
                        placeholder="Type Here">
                    @error('nama_pengguna')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username_pengguna">Username</label>
                    <input type="text" class="form-control @error('username_pengguna') {{ 'is-invalid' }} @enderror"
                        value="{{ old('username_pengguna') ?? $pengguna->username_pengguna ?? ''}}" name="username_pengguna"
                        placeholder="Type Here">
                    @error('username_pengguna')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nohp_pengguna">Phone Number</label>
                    <input type="text" value="+62" class="form-control @error('nohp_pengguna') {{ 'is-invalid' }} @enderror"
                        value="{{ old('nohp_pengguna') ?? $pengguna->nohp_pengguna ?? ''}}" name="nohp_pengguna"
                        placeholder="Type Here">
                    @error('nohp_pengguna')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- select -->
                        <label for="jk_pengguna">Gender</label>
                        <div class="form-group">
                            <select class="form-control" name="jk_pengguna" required>
                                <option disabled selected value=''>Select</option>

                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- select -->
                        <label for="level_pengguna">Privilege</label>
                        <div class="form-group">
                            <select class="form-control" name="level_pengguna" required>
                                <option disabled selected value=''>Select</option>
                                <option value="Admin" >Admin</option>
                                <option value="User" >User</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_pengguna">Password</label>
                    <input type="password" class="form-control @error('password_pengguna') {{ 'is-invalid' }} @enderror"
                        value="{{ old('password_pengguna') ?? $pengguna->password_pengguna ?? ''}}" name="password_pengguna"
                        placeholder="Type Here">
                    @error('password_pengguna')
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
