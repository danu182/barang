
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

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form method="POST" action="{{route('barang.store')}}">
                            @csrf

                            {{-- kategori start --}}
                            <div class="form-group">
                                <label for="kodeBarang">kategori</label>
                                <select class="form-control" name="kategori_id" id="">
                                    <option disabled>------ pilih salah satu ------</option>
                                    @foreach ($kategori as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['namaKategori'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- kategori end --}}

                            {{-- kode barang start --}}
                            <div class="form-group">
                                    <label for="kodeBarang">kodeBaranglama</label>
                                    <input type="text" class="form-control" id="kodeBaranglama" placeholder="Masukkan Kode Barang lama" name="kodeBaranglama">
                            </div>
                            {{-- kode barang end --}}

                            <div class="form-group">
                                <label for="merek">namaBarang</label>
                                <input type="text" class="form-control" id="namaBarang" aria-describedby="namaBarang" name="namaBarang">
                            </div>
                            <div class="form-group">
                                <label for="merek">merek</label>
                                <input type="text" class="form-control" id="merek" aria-describedby="merek" name="merek">
                            </div>

                            <div class="form-group">
                                <label for="model">model</label>
                                <input type="text" class="form-control" id="model" aria-describedby="model" name="model">
                            </div>

                            <div class="form-group">
                                <label for="nomorSeri">nomorSeri</label>
                                <input type="text" class="form-control" id="nomorSeri" aria-describedby="nomorSeri" name="nomorSeri">
                            </div>

                            <div class="form-group">
                                <label for="tanggalPerolehan">tanggalPerolehan</label>
                                <input type="date" class="form-control" id="tanggalPerolehan" aria-describedby="tanggalPerolehan" name="tanggalPerolehan">
                            </div>

                            <div class="form-group">
                                <label for="hargaPerolehan">hargaPerolehan</label>
                                <input type="number" class="form-control" id="hargaPerolehan" aria-describedby="hargaPerolehan" name="hargaPerolehan">
                            </div>

                            <div class="form-group">
                                <label for="vendor">vendor</label>
                                <input type="text" class="form-control" id="vendor" aria-describedby="vendor" name="vendor">
                            </div>

                            <div class="form-group">
                                <label for="catatan">catatan</label>
                                <textarea class="form-control"  name='catatan' id="catatan" rows="3"></textarea>
                            </div>



                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('barang.index') }}" class="btn btn-success">kembali</a>
                        </form>


                    </div>
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->




@endsection
