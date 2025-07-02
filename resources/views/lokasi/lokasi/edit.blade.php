
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


                        <form method="POST" action="{{route('lokasi.update', $lokasi['id'])}}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="exampleFormControlInput1">nama kota</label>
                                <select name="kota_id" id="" class="form-control text-uppercase">
                                    <option value="{{ $lokasi->kota_id }}">{{ $lokasi->kota->namaKota }}</option>
                                    <option disabled>------------</option>
                                    @foreach ($kota as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['namaKota'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">namaLokasi</label>
                                <input type="text" class="form-control text-uppercase" name="namaLokasi" id="namaLokasi" placeholder="nama lokasi" value="{{ $lokasi->namaLokasi }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">lantai</label>
                                <input type="text" class="form-control text-uppercase" name="lantai" id="lantai" placeholder="nama lokasi" value="{{ $lokasi->lantai }}">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
                                <textarea name="keterangan" class="form-control" id="keterangan" rows="3" placeholder="keterangan">{{ $lokasi->keterangan }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>

                         </form>
                    </div>
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->




@endsection
