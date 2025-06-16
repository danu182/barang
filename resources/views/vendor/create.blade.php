
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

                        <form method="POST" action="{{ route('subcont.store') }}">
                            <input type="hidden" name="_token" value="MmgmDjUq6M4Gxdb9EXOjwAWWEkC6uMZQeucyJXLG" autocomplete="off">

                            <div class="form-group">
                                <label for="namaVendor">namaVendor</label>
                                <input type="text" class="form-control" id="namaVendor" aria-describedby="emailHelp" name="namaVendor">
                            </div>

                            <div class="form-group">
                                <label for="alamatVendor">alamatVendor</label>
                                <input type="text" class="form-control" id="alamatVendor" aria-describedby="emailHelp" name="alamatVendor">
                            </div>

                            <div class="form-group">
                                <label for="tlpVendor">tlpVendor</label>
                                <input type="text" class="form-control" id="tlpVendor" aria-describedby="emailHelp" name="tlpVendor">
                            </div>

                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
                                <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>



                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('subcont.index') }}" class="btn btn-success">kembali</a>
                        </form>


                    </div>
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->

    @push('js') {{-- Or just place inside <script> tags directly --}}




    @endpush


@endsection
