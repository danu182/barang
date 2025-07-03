
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
    <script src="{{ asset('js/barang.js') }}"></script>

@endpush



    <!-- Begin Page Content -->
        <div class="container-fluid" >

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">{{$title}} </h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    {{-- <h6 class="m-0 font-weight-bold text-primary"> {{ $barang->namaBarang }} ==>> {{ $barang->kodeBarang }}</h6> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                         {{-- <form action="{{ route('negara.store') }}" method="POST"> --}}
                        <form method="POST" action="{{route('asset-mutasi.store')}}">
                            @csrf


                            <div class="row">
                                <div class="col">
                                <label for="" id="">Kode barang baru</label>
                                </div>
                                <div class="col">
                                <label for="" id="kodeBarangBaruInput"></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                <label for="" id="">Merek</label>
                                </div>
                                <div class="col">
                                <label for="" id="merekInput"></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                <label for="" id="">model</label>
                                </div>
                                <div class="col">
                                <label for="" id="modelInput"></label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                <label for="" id="">tipe Ram</label>
                                </div>
                                <div class="col">
                                <label for="" id="tipeRamInput"></label>
                                </div>
                            </div>

                                <label for="myInput" class="mr-2">cari barang:</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="barang" name="namaBarang" aria-label="barang" aria-describedby="button-addon2" id="namaBarangInput">
                                    <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" data-toggle="modal" data-target="#exampleModal">cari</button>
                                    </div>
                                </div>


                            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                         </form>
                    </div>
                </div>
            </div>

        </div>




<!-- Modal syats-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cari Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            {{-- table start --}}

            <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>pilih</th>
                                    <th>procesor</th>
                                    <th>namaTipeProsesor</th>
                                    <th>Ramkpasitas</th>
                                    <th>kapasitasHarddisk</th>
                                    <th>kategori</th>
                                    <th>kodeBaranglama</th>
                                    <th>kodeBarangBaru</th>
                                    <th>namaBarang</th>
                                    <th>merek</th>
                                    <th>model</th>
                                    <th>nomorSeri</th>
                                    <th>tanggalPerolehan</th>
                                    <th>hargaPerolehan</th>
                                    <th>vendor</th>
                                    <th>catatan</th>

                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>pilih</th>
                                    <th>procesor</th>
                                    <th>namaTipeProsesor</th>
                                    <th>Ramkpasitas</th>
                                    <th>kapasitasHarddisk</th>
                                    <th>kategori</th>
                                    <th>kodeBaranglama</th>
                                    <th>kodeBarangBaru</th>
                                    <th>namaBarang</th>
                                    <th>merek</th>
                                    <th>model</th>
                                    <th>nomorSeri</th>
                                    <th>tanggalPerolehan</th>
                                    <th>hargaPerolehan</th>
                                    <th>vendor</th>
                                    <th>catatan</th>


                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($barang as $item)
                                    <tr>
                                       <td>
                                        <button class="btn btn-danger select-item-btn"
                                                data-nama-barang="{{ $item['namaBarang'] }}"
                                                data-kode-barang-baru="{{ $item['kodeBarang'] }}"
                                                data-merek="{{ $item['merek'] }}"
                                                data-model="{{ $item['model'] }}"
                                                data-harga-perolehan="{{ $item['hargaPerolehan'] }}"
                                                data-tipe-ram="{{ $item['tipeRam'] }}"
                                                >
                                            Pilih
                                        </button>
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
                                                    <li>{{ $rams['tipeRam']['tipeRam'] }} : {{ $rams['kapasitas'] }}</li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td>
                                            <ul>
                                                @foreach ($item->hd as $hds)
                                                    <li>{{ $hds['tipeHardDisk']['namaTipeHardDisk']  }} : {{ $hds['kapasitas']  }}</li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        {{-- <td>{{$item['id']}}</td> --}}
                                        <td>{{$item['kategori']['namaKategori']}}</td>
                                        <td>{{$item['kodeBaranglama']}}</td>
                                        <td>{{$item['kodeBarang']}}</td>
                                        <td>{{$item['namaBarang']}}</td>
                                        <td>{{$item['merek']}}</td>
                                        <td>{{$item['model']}}</td>
                                        <td>{{$item['nomorSeri']}}</td>
                                        <td>{{$item['tanggalPerolehan']}}</td>
                                        <td>{{$item['hargaPerolehan']}}</td>
                                        <td>{{$item['vendor']}}</td>
                                        <td>{{$item['catatan']}}</td>
                                        {{-- <td>
                                            <a href="{{ route('barang.edit', $item['id']) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('barang.destroy', $item['id']) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td> --}}
                                    </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal end-->





@endsection
