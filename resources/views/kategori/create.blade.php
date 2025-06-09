
@extends('master.app.index')

@section('content')

@push('css')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

@push('js')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

@endpush



    <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">{{$title}}</h1>
            {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                For more information about DataTables, please visit the <a target="_blank"
                    href="https://datatables.net">official DataTables documentation</a>.</p> --}}

            <!-- Page Heading -->
            {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
                <a href="{{route('category.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-check fa-sm text-white-50"></i> Create</a>
            </div>     --}}



            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form method="POST" action="{{route('kategori.store')}}">
                            @csrf

                            <div class="form-group">
                                <label for="name">kodeKategori</label>
                                <input type="text" class="form-control" id="kodeKategori" aria-describedby="kodeKategori" name="kodeKategori">
                            </div>

                            <div class="form-group">
                                <label for="namaKategori">namaKategori</label>
                                <input type="text" class="form-control" id="namaKategori" aria-describedby="emailHelp" name="namaKategori">
                            </div>

                            <div class="form-group">
                                <label for="namaKategori">spesifikasi</label>
                                <select name="spesifikasi" id="" class="form-control">
                                    <option value="0">yes</option>
                                    <option value="1">no</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>


                    </div>
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->




@endsection
