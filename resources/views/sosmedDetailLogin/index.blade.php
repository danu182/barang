
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
        <li class="breadcrumb-item"><a href="{{ route('sosmed.index') }}">Sosmed</a></li>
        <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Sosmed Detail</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
    </nav>

    <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                {{-- <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1> --}}
                <a href="{{ route('sosmed.detail.login.create', ['sosmed' => $sosmed['id'], 'detail' => $sosmedDetail['id']] ) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-check fa-sm text-white-50"></i> Create</a>

                <a href="{{ route('sosmed.detail.login.create', ['sosmed' => $sosmed['id'], 'detail' => $sosmedDetail['id']] ) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-check fa-sm text-white-50"></i> Create</a>
                        {{-- "{{ route('dashboard.product.gallery.create', $product->id) }}" --}}
            </div>



            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">DataTables {{ $title }} >> {{ $sosmed->namaSosmed }}</h6>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>id</th>
                                    <th>sosmedDetail_id</th>
                                    <th>pemilik</th>
                                    <th>pic</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>tanggal</th>
                                    <th>jam</th>
                                    <th>status</th>
                                    <th>gambar</th>
                                    <th>img</th>
                                    <th>aksi</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>sosmedDetail_id</th>
                                    <th>pemilik</th>
                                    <th>pic</th>
                                    <th>username</th>
                                    <th>password</th>
                                    <th>tanggal</th>
                                    <th>jam</th>
                                    <th>status</th>
                                    <th>gambar</th>
                                    <th>img</th>
                                    <th>aksi</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($sosmedDetailLogin as $item)
                                    <tr>
                                        <td>{{$item['id']}}</td>
                                        <td>{{$item['sosmedDetail']['sosmed']['namaSosmed']}}</td>
                                        <td>{{$item['sosmedDetail']['pemilik']}}</td>
                                        <td>{{$item['sosmedDetail']['pic']}}</td>
                                        <td>{{$item['sosmedDetail']['username']}}</td>
                                        <td>{{$item['sosmedDetail']['password']}}</td>
                                        <td>{{$item['tanggal']}}</td>
                                        <td>{{$item['jam']}}</td>
                                        <td>{{$item['status']}}</td>
                                        <td>{{$item['gambar']}}</td>
                                        <td>
                                            <img src="{{ asset('/storage/images/SosmedDetailLogin/'.$item->gambar) }}" class="rounded" style="width: 150px; higt:150px">
                                        </td>
                                        <td>
                                            <a href="{{ route('sosmed.detail.login.edit', ['sosmed' => $sosmed['id'], 'detail' => $sosmedDetail['id'], 'login' => $item['id']] )  }}" class="btn btn-info">detail</a>

                                            <form action="{{ route('sosmed.detail.login.destroy',  ['sosmed' => $sosmed['id'], 'detail' => $sosmedDetail['id'], 'login' => $item['id']]  ) }}" method="POST" style="display:inline;">
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
