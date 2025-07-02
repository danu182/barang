
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

    {{-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('sosmed.index') }}">Sosmed</a></li>
        <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Sosmed Detail</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
    </nav> --}}

    <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                {{-- <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1> --}}
                <a href="{{ route('asset-mutasi.index') }}" class="d-none d-sm-inline-block btn btn-sm btn btn-success shadow-sm">kembali</a>
                <a href="{{ route('asset-mutasi.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-check fa-sm text-white-50"></i> Create</a>
                        {{-- "{{ route('dashboard.product.gallery.create', $product->id) }}" --}}
            </div>



            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    {{-- <h6 class="m-0 font-weight-bold text-primary">{{ $barang->namaBarang }} ==>> {{ $barang->kodeBarang }}  </h6> --}}
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

                                    <th>barang_id</th>
                                    <th>old_location_id</th>
                                    <th>new_location_id</th>
                                    <th>mutation_date</th>
                                    <th>mutation_type_id</th>
                                    <th>kondisi_id</th>
                                    <th>bagian_id</th>
                                    <th>notes</th>
                                    <th>user_id</th>
                                    <th>aksi</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <tr>
                                        <th>barang_id</th>
                                        <th>old_location_id</th>
                                        <th>new_location_id</th>
                                        <th>mutation_date</th>
                                        <th>mutation_type_id</th>
                                        <th>kondisi_id</th>
                                        <th>bagian_id</th>
                                        <th>notes</th>
                                        <th>user_id</th>
                                        <th>aksi</th>
                                </tr>

                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($assetMutation as $item)
                                    <tr>
                                        <td>{{$item['id']}}</td>
                                        <td class="text-uppercase">{{$item['barang_id']}}</td>
                                        <td>{{$item['old_location_id']}}</td>
                                        <td>{{$item['new_location_id']}}</td>
                                        <td>{{$item['mutation_date']}}</td>
                                        <td>{{$item['mutation_type_id']}}</td>
                                        <td>{{$item['kondisi_id']}}</td>
                                        <td>{{$item['bagian_id']}}</td>
                                        <td>{{$item['notes']}}</td>
                                        <td>{{$item['user_id']}}</td>

                                        <td>
                                            <a href="{{ route('asset-mutasi.show',$item['id'] )  }}" class="btn btn-info">detail</a>
                                            <a href="{{ route('asset-mutasi.edit',$item['id'] )  }}" class="btn btn-warning">edit</a>

                                            <form action="{{ route('asset-mutasi.destroy',   $item['id']  ) }}" method="POST" style="display:inline;">
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
                    {{-- <a href="{{ route('barang.index') }}" class="btn btn-success">kembali</a> --}}
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->




@endsection
