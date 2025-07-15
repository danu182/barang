
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
                    <h6 class="m-0 font-weight-bold text-primary">List Asset Mutasi Barang  </h6>
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
                                    <th>perusahaan</th>
                                    <th>kode barang</th>
                                    <th>kategori barang</th>
                                    <th>nama Barang</th>
                                    <th>old_location</th>
                                    <th>new_location</th>
                                    <th>mutation_date</th>
                                    <th>mutation_type</th>
                                    <th>kondisi</th>
                                    <th>bagian</th>
                                    <th>notes</th>
                                    {{-- <th>user_id</th> --}}
                                    <th>nama user</th>
                                    <th>aksi</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <tr>
                                        <th>id</th>
                                        <th>perusahaan</th>
                                        <th>kode barang</th>
                                        <th>kategori barang</th>
                                        <th>nama Barang</th>
                                        <th>old_location</th>
                                        <th>new_location</th>
                                        <th>mutation_date</th>
                                        <th>mutation_type</th>
                                        <th>kondisi</th>
                                        <th>bagian</th>
                                        <th>notes</th>
                                        {{-- <th>user_id</th> --}}
                                        <th>nama user</th>
                                        <th>aksi</th>
                                </tr>

                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($assetMutation as $item)
                                    <tr>
                                        <td>{{$item['id']}}</td>
                                        <td>{{$item['barang']['pelanggan']['namaPelanggan']}}</td>
                                        <td>
                                            <ul>
                                                {{-- <li>
                                                    kode lama = {{$item['barang']['kodeBaranglama']}}
                                                </li> --}}
                                                <li>
                                                     {{$item['barang']['kodeBarangUse']}}
                                                </li>
                                            </ul>
                                        </td>
                                        <td>{{$item['barang']['kategori']['namaKategori']}}</td>

                                        <td class="text-uppercase">{{$item['barang']['namaBarang']}}</td>
                                        {{-- <td>{{$item['lokasiOld']['namaLokasi']}}</td> --}}
                                        <td>{{$item['lokasiOld']['namaLokasi']}}  |  lantai : {{$item['lokasiOld']['lantai']}}</td>
                                        <td>{{$item['lokasiNew']['namaLokasi']}}  |  lantai : {{$item['lokasiNew']['lantai']}}</td>
                                        <td>{{$item['mutation_date']}}</td>
                                        <td>{{$item['mutationType']['namaMutasi']}}</td>
                                        <td>{{$item['kondisi']['namaKondisi']}}</td>
                                        <td>{{$item['bagian']['nama_bagian']}}</td>
                                        <td>{{$item['notes']}}</td>
                                        {{-- <td>{{$item['user_id']}}</td> --}}
                                        <td>{{$item['user']['name']}}</td>

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
