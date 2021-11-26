@extends('backend/layout/app')
@section('content')
<title>Project - Mediatama Assets</title>
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
                <h3 class="card-title">Project - Mediatama Assets</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <a href="{{route('project.create', '0')}}" class="btn btn-success mb-2"><i class="fas fa-plus"></i> Project</a>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr align="center">
                            <th>No.</th>
                            <th>Creator</th>
                            <th>Project Name</th>
                            <th>Latest Evidence</th>
                            <th>Github Url</th>
                            <th>Description</th>
                            <th>As</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($project as $no=>$project )
                            <tr align="center">
                                <td>{{$no + 1}}</td>
                                <td>{{$project->nama_pengguna}}</td>
                                <td>{{$project->nama_aset}}</td>
                                <td><img class="zoom" src="/gambar/{{$project->bukti_project}}" alt="Image Not Found" class="light-logo" style="width: 10em;"></td>
                                <td><a href="{{$project->link_project}}" class="nav-link" target="_blank">{{$project->link_project}}</a></td>
                                <td>{!!$project->deskripsi_project!!}</td>
                                <td>{{$project->peranan_project}}</td>
                                <td width="15%">
                                    <a href="{{ route('project.edit', $project->id_project) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a onclick="return confirm('Are You Sure ?')" href="{{ route('project.delete', $project->id_project) }}" class="btn btn-danger btn-sm" onclick="mHapus('{{ route('project.delete', $project->id_project) }}')"><i class="fa fa-trash">
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
