
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

                         {{-- <form action="{{ route('negara.store') }}" method="POST"> --}}
                        <form method="POST" action="{{route('bagian.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">nama_bagian</label>
                                <input type="text" class="form-control text-uppercase" name="nama_bagian" id="nama_bagian" placeholder="nama_bagian">
                            </div>
                            <div class="form-group">
                                <label for="keteranganBagian">keteranganBagian</label>
                                <textarea name="keteranganBagian" class="form-control" id="keteranganBagian" rows="3" placeholder="keteranganBagian"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('bagian.index') }}" class="btn btn-success">kembali</a>
                         </form>
                    </div>
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->




@endsection
