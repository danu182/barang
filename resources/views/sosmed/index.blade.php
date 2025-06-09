
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


    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Sosmed</li>
        </ol>
    </nav>


    <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>

                <a href="{{route('sosmed.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-check fa-sm text-white-50"></i> Create</a>
            </div>



            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables {{ $title }}</h6>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                 @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>namaSosmed</th>
                                    <th>keterangan</th>
                                    <th>aksi</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>namaSosmed</th>
                                    <th>keterangan</th>
                                    <th>aksi</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($sosmed as $item)
                                    <tr>
                                        <td>{{$item['id']}}</td>
                                        <td>{{$item['namaSosmed']}}</td>
                                        <td>{{$item['keterangan']}}</td>
                                        <td>
                                            <a href="{{ route('sosmed.detail.index', $item['id'])  }}" class="btn btn-info">detail</a>
                                            {{-- <a href="{{ route('sosmed.detail', $item['id']) }}" class="btn btn-info">detail</a> --}}
                                            <a href="{{ route('sosmed.edit', $item['id']) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('sosmed.destroy', $item['id']) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->




@endsection
