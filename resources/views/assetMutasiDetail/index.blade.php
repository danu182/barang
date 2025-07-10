
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
                                        <th>id</th>
                                        <th>kode barang lama</th>
                                        <th>kode barang</th>
                                        <th>kategori barang</th>
                                        <th>nama Barang</th>
                                        <th>merk</th>
                                        <th>no seri</th>
                                        <th>harga</th>
                                        <th>mutation_date</th>
                                        <th>old_location</th>
                                        <th>new_location</th>
                                        <th>mutation_type</th>
                                        <th>kondisi</th>
                                        <th>bagian</th>
                                        <th>notes</th>
                                        <th>nama user</th>
                                        <th>aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <tr>
                                        <th>id</th>
                                        <th>kode barang lama</th>
                                        <th>kode barang</th>
                                        <th>kategori barang</th>
                                        <th>nama Barang</th>
                                        <th>merk</th>
                                        <th>no seri</th>
                                        <th>harga</th>
                                        <th>mutation_date</th>
                                        <th>old_location</th>
                                        <th>new_location</th>
                                        <th>mutation_type</th>
                                        <th>kondisi</th>
                                        <th>bagian</th>
                                        <th>notes</th>
                                        <th>nama user</th>
                                        <th>aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($barang as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->kodeBaranglama }}</td>
                                    <td>{{ $item->kodeBarang }}</td>
                                    <td>{{ $item->kategori->namaKategori }}</td>
                                    <td>{{ $item->namaBarang }}</td>
                                    <td>{{ $item->merek }}</td>
                                    <td>{{ $item->nomorSeri }}</td>
                                    <td>{{ $item->hargaPerolehan }}</td>
                                     @if($item->assetMutasi->isNotEmpty())
                                        <td>{{ $item->assetMutasi->first()->mutation_date ?? 'N/A' }}</td>
                                        <td>{{ $item->assetMutasi->first()->lokasiOld->namaLokasi   ?? 'N/A' }}</td>
                                        <td>{{ $item->assetMutasi->first()->lokasiNew->namaLokasi  ?? 'N/A' }}</td>
                                        <td>{{ $item->assetMutasi->first()->mutationType->namaMutasi ?? 'N/A' }}</td>
                                        <td>{{ $item->assetMutasi->first()->kondisi->namaKondisi ?? 'N/A' }}</td>
                                        <td>{{ $item->assetMutasi->first()->bagian->nama_bagian ?? 'N/A' }}</td>
                                        <td>{{ $item->assetMutasi->first()->notes ?? 'N/A' }}</td>

                                    <td>{{ $item->assetMutasi->first()->user->name ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('barang-mutasi.show', $item->id) }}" class="btn btn-primary">TEs</a>
                                    </td>
                                     @else
                                        {{-- If no mutation record exists, display default values or leave blank --}}
                                        <td>Belum Dimutasikan</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                    @endif

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
