@extends('backend/layout/app')
@section('content')
<title>Category - Mediatama Assets</title>
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
                <h3 class="card-title">Category - Mediatama Assets</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <a href="{{route('kategori.create', '0')}}" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Category</a>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th>No.</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $no=>$kategori )
                            <tr align="center">
                                <td>{{$no + 1}}</td>
                                <td>{{$kategori->nama_kategori}}</td>
                                <td>{!!$kategori->deskripsi_kategori!!}</td>
                                <td width="15%">
                                    <a href="{{ route('kategori.edit', $kategori->id_kategori) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Are You Sure ?')" href="{{ route('kategori.delete', $kategori->id_kategori) }}" class="btn btn-danger btn-sm" ><i class="fa fa-trash">
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
