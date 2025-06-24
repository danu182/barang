
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
            <h1 class="h3 mb-2 text-gray-800">{{$title}} </h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    {{-- <h6 class="m-0 font-weight-bold text-primary"> {{ $barang->namaBarang }} ==>> {{ $barang->kodeBarang }}</h6> --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="namaPelanggan">namaPelanggan</label>
                                <input type="text" class="form-control" id="namaPelanggan" aria-describedby="emailHelp" name="namaPelanggan" value="{{ $pelanggan->namaPelanggan }}">
                            </div>

                            <div class="form-group">
                                <label for="picPelanggan">picPelanggan</label>
                                <input type="text" class="form-control" id="picPelanggan" aria-describedby="emailHelp" name="picPelanggan" value="{{ $pelanggan['picPelanggan'] }}">
                            </div>

                            <div class="form-group">
                                <label for="tLpPelanggan">tLpPelanggan</label>
                                <input type="text" class="form-control" id="tLpPelanggan" aria-describedby="emailHelp" name="tLpPelanggan" value="{{ $pelanggan['tLpPelanggan'] }}">
                            </div>

                            <div class="form-group">
                                <label for="alamatPelanggan">alamatPelanggan</label>
                                <input type="text" class="form-control" id="alamatPelanggan" aria-describedby="emailHelp" name="alamatPelanggan" value="{{ $pelanggan['alamatPelanggan'] }}">
                            </div>

                            <div class="form-group">
                                <label for="emailPelanggan">emailPelanggan</label>
                                <input type="text" class="form-control" id="emailPelanggan" aria-describedby="emailHelp" name="emailPelanggan" value="{{ $pelanggan['emailPelanggan'] }}">
                            </div>

                            <div class="form-group">
                                <label for="keteranganPelanggan">keteranganPelanggan</label>
                                <textarea name="keteranganPelanggan" class="form-control" id="" cols="30" rows="10">{{ $pelanggan['keteranganPelanggan'] }}</textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('pelanggan.index') }}" class="btn btn-success">kembali</a>
                        </form>


                    </div>
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->

    @push('js') {{-- Or just place inside <script> tags directly --}}




    @endpush


@endsection
