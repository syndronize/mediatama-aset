@extends('backend/layout/app')
@section('content')
<title>Asset - Mediatama Assets</title>
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
                <h3 class="card-title">Asset - Mediatama Assets</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <a href="{{route('aset.create', '0')}}" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Asset</a>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th>No.</th>
                            <th>Creator</th>
                            <th>Category</th>
                            <th>Asset Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aset as $no=>$aset )
                            <tr align="center">
                                <td>{{$no + 1}}</td>
                                <td>{{$aset->nama_pengguna}}</td>
                                <td>{{$aset->nama_kategori}}</td>
                                <td>{{$aset->nama_aset}}</td>
                                <td>{!!$aset->deskripsi_aset!!}</td>
                                <td width="15%">
                                    <a href="{{ route('aset.edit', $aset->id_aset) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Are You Sure ?')" href="{{ route('aset.delete', $aset->id_aset) }}" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('aset.delete', $aset->id_aset) }}')"><i class="fa fa-trash">
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
