
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
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
                {{-- <a href="{{ route('barang.index') }}" class="d-none d-sm-inline-block btn btn-sm btn btn-success shadow-sm">kembali</a> --}}
                <a href="{{route('barang.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-check fa-sm text-white-50"></i> Create</a>
                        {{-- "{{ route('dashboard.product.gallery.create', $product->id) }}" --}}
            </div>

            {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> --}}
                {{-- <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1> --}}

                {{-- <a href="{{route('barang.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-check fa-sm text-white-50"></i> Create</a>
            </div> --}}



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

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>spec</th>

                                    <th>procesor</th>
                                    <th>namaTipeProsesor</th>

                                    <th>Ramkpasitas</th>

                                    <th>kapasitasHarddisk</th>
                                    <th>perusahaan</th>
                                    <th>kategori</th>
                                    {{-- <th>kodeBaranglama</th> --}}
                                    <th>kodeBarangUse</th>
                                    <th>namaBarang</th>
                                    <th>merek</th>
                                    <th>model</th>
                                    <th>nomorSeri</th>
                                    <th>tanggalPerolehan</th>
                                    <th>hargaPerolehan</th>
                                    <th>vendor</th>
                                    <th>catatan</th>
                                    <th>aksi</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>spec</th>
                                    <th>procesor</th>
                                    <th>namaTipeProsesor</th>
                                    <th>Ramkpasitas</th>

                                    <th>kapasitasHarddisk</th>
                                    <th>perusahaan</th>
                                    <th>kategori</th>
                                    <th>kodeBarangUse</th>
                                    <th>kodeBarangBaru</th>
                                    <th>namaBarang</th>
                                    <th>merek</th>
                                    <th>model</th>
                                    <th>nomorSeri</th>
                                    <th>tanggalPerolehan</th>
                                    <th>hargaPerolehan</th>
                                    <th>vendor</th>
                                    <th>catatan</th>
                                    <th>aksi</th>

                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($barang as $item)
                                    <tr>
                                        @if($item['kategori']['duaPilihan_id'] === 2 )
                                            <td></td>
                                        @else
                                            <td>
                                                <a href="{{ route('barang.harddisk.index', ['barang'=> $item['id'], ]   ) }}" class="mt-2 btn btn-outline-secondary">HDD</a>
                                                <a href="{{ route('barang.ram.index',['barang'=>$item['id']]) }}" class="mt-2 btn btn-outline-info">Ram</a>
                                                <a href="{{ route('barang.prosesor.index',['barang'=>$item['id']]) }}" class="mt-2 btn btn-outline-dark">Prosesor</a>
                                            </td>
                                        @endif

                                        <td>
                                            <ul>
                                                @foreach ($item->prosesor as $proces)
                                                    <li>{{ $proces['tipeProsesor']['namaTipeProsesor']  }}</li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td>
                                            <ul>
                                                @foreach ($item->prosesor as $proces)
                                                    <li>{{ $proces['kapasitas']  }}</li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td>
                                            <ul>
                                                @foreach ($item->ram as $rams)
                                                    <li>{{ $rams['tipeRam']['tipeRam'] }} : {{ $rams['kapasitas'] }} {{ $rams['satuanSize']['namaSatuanSize'] }}</li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td>
                                            <ul>
                                                @foreach ($item->hd as $hds)
                                                    <li>{{ $hds['tipeHardDisk']['namaTipeHardDisk']  }} : {{ $hds['kapasitas']  }} {{ $hds['satuanSize']['namaSatuanSize'] }}</li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        {{-- <td>{{$item['id']}}</td> --}}
                                        <td>{{$item['pelanggan']['namaPelanggan']}}</td>
                                        <td>{{$item['kategori']['namaKategori']}}</td>
                                        {{-- <td>{{$item['kodeBarang']}}</td> --}}
                                        <td>{{$item['kodeBarangUse']}}</td>
                                        <td>{{$item['namaBarang']}}</td>
                                        <td>{{$item['merek']}}</td>
                                        <td>{{$item['model']}}</td>
                                        <td>{{$item['nomorSeri']}}</td>
                                        <td>{{$item['tanggalPerolehan']}}</td>
                                        <td>{{$item['hargaPerolehan']}}</td>
                                        <td>{{$item['vendor']}}</td>
                                        <td>{{$item['catatan']}}</td>
                                        <td>
                                            <a href="{{ route('barang.edit', $item['id']) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('barang.destroy', $item['id']) }}" method="POST" style="display:inline;">
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
