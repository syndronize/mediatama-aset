@extends('backend/layout/app')
@section('content')
<title>User - Mediatama Assets</title>
<br>
<br>
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <!-- /.row -->
        <!-- Main row -->
        <div class="card">
            @if(Session::get('message'))
            <div class="alert alert-success" style="" id="message">
                <strong>{{ session()->get('message') }}</strong>
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            </div>
            @endif

            <div class="card-header">
                <h3 class="card-title">Users - Mediatama Assets</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <a href="{{route('pengguna.create', '0')}}" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Add Admin</a>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th>No.</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Phone Number</th>
                            <th>Gender</th>
                            <th>User Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengguna as $no=>$pengguna )
                            <tr align="center">
                                <td>{{$no + 1}}</td>
                                <td>{{$pengguna->nama_pengguna}}</td>
                                <td>{{$pengguna->username_pengguna}}</td>
                                <td><a href="http://wa.me/{{$pengguna->nohp_pengguna}}" class="fas fa-phone" target="#">  {{$pengguna->nohp_pengguna}}</td>
                                <td>{{$pengguna->jk_pengguna}}</td>
                                <td>{{$pengguna->level_pengguna}}</td>
                                <td>
                                    <a href="{{ route('pengguna.edit', $pengguna->id_pengguna) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Are You Sure ?')" href="{{ route('pengguna.delete', $pengguna->id_pengguna) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                    <!-- <button type="button" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('pengguna.delete', $pengguna->id_pengguna) }}')"><i class="fa fa-trash"></i></button> -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- modal hapus -->
<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST" id="formDelete">
                <div class="modal-body">
                    @csrf
                    @method('delete')
                    Yakin Hapus Data ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // untuk hapus data
    function mHapus(url) {
        $('#ModalHapus').modal()
        $('#formDelete').attr('action', url);
    }

</script>
    @if (session()->has('message'))
    <script>
        // $('#message').show();
        setTimeout(function () {
            $('#message').remove();
        }, 3000);

    </script>
    @endif
    <!-- /.container-fluid -->
</section>
@endsection
