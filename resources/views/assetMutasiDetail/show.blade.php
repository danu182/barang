
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
            {{-- <h1 class="h3 mb-2 text-gray-800">{{$title}}</h1> --}}

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header">
                        rincian
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <table class="table">
                            <tr>
                                <td>id</td>
                                <td>:</td>
                                <td>{{ $barang->id }}</td>
                            </tr>
                            <tr>
                                <td>kategori_id</td>
                                <td>:</td>
                                <td>{{ $barang->kategori->namaKategori }}</td>
                            </tr>
                            <tr>
                                <td>kodeBaranglama</td>
                                <td>:</td>
                                <td>{{ $barang->kodeBaranglama }}</td>
                            </tr>
                            <tr>
                                <td>kodeBarang</td>
                                <td>:</td>
                                <td>{{ $barang->kodeBarang }}</td>
                            </tr>
                            <tr>
                                <td>namaBarang</td>
                                <td>:</td>
                                <td>{{ $barang->namaBarang }}</td>
                            </tr>
                            <tr>
                                <td>merek</td>
                                <td>:</td>
                                <td>{{ $barang->merek}}</td>
                            </tr>
                            <tr>
                                <td>model</td>
                                <td>:</td>
                                <td>{{ $barang->model }}</td>
                            </tr>
                            <tr>
                                <td>tanggalPerolehan</td>
                                <td>:</td>
                                <td>{{ $barang->tanggalPerolehan }}</td>
                            </tr>
                            <tr>
                                <td>hargaPerolehan</td>
                                <td>:</td>
                                <td>{{ $barang->hargaPerolehan }}</td>
                            </tr>
                        </table>
                    </div>
                    {{-- <div class="card-footer text-muted">
                        2 days ago
                </div> --}}

            </div>

            <table class="table shadow">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">mutation_date</th>
                    <th scope="col">old_location</th>
                    <th scope="col">new_location</th>
                    <th scope="col">kondisi</th>
                    <th scope="col">tipe mutasi</th>
                    <th scope="col">bagian</th>
                    <th scope="col">user</th>
                    <th scope="col">created_at</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barang->assetMutasi as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->mutation_date }}</td>
                            <td>{{ $item->lokasiOld->namaLokasi }} lantai =  {{ $item->lokasiOld->lantai }}</td>
                            <td>{{ $item->lokasiNew->namaLokasi }} lantai =  {{ $item->lokasiNew->lantai }}</td>
                            <td>{{ $item->kondisi->namaKondisi }}</td>
                            <td>{{ $item->mutationType->namaMutasi }}</td>
                            <td>{{ $item->bagian->nama_bagian }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <table>

        </div>
    <!-- /.container-fluid -->




@endsection
