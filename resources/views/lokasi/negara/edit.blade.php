
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


                        <form method="POST" action="{{route('negara.update', $negara['id'])}}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="exampleFormControlInput1">nama Negara</label>
                                <input type="text" class="form-control text-uppercase" name="namaNegara" id="namaNegara" placeholder="nama negara" value="{{ $negara->namaNegara }}">
                            </div>
                            <div class="form-group">
                                <label for="keteranganNegara">keteranganNegara</label>
                                <textarea name="keteranganNegara" class="form-control" id="keteranganNegara" rows="3" placeholder="keterangan">{{ $negara->keteranganNegara }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
                    </div>
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->




@endsection
