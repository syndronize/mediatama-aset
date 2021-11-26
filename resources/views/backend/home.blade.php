@extends('backend/layout/app')
@section('content')
<title>Mediatama Assets</title>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Hello, {{Session()->get('nama_pengguna')}}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Mediatama Assets</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <h5 class="card-title">
                    <form action="{{route('nilai.cari')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-5">
                                <input type="date" name="tanggal_awal" class="form-control">
                            </div>
                            <div class="col-lg-5">
                                <input type="date" name="tanggal_akhir" class="form-control">
                            </div>
                            <div class="col-lg-2">
                                <button type="submit" class="btn btn-success">Cari</button>
                            </div>
                        </div>
                    </form>
            </h5>
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr align="center">
                        <th>No.</th>
                        <th>Project Name</th>
                        <th>Project Leader</th>
                        <th>Project Category</th>
                        <th>Entry Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($home as $no=>$home )
                    <tr align="center">
                        <td>{{$no + 1}}</td>
                        <td>{{$home->nama_aset}}</td>
                        <td>{{$home->nama_pengguna}}</td>
                        <td>{{$home->nama_kategori}}</td>
                        <td>{{date('F d, Y', strtotime($home->created_at))}}</td>
                        <td><a href="#" class="btn btn-info btn-sm"><i class="fas fa-search"></i></a></td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
