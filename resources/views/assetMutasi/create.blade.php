
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
                        <form method="POST" action="{{route('asset-mutasi.store')}}">
                            @csrf


                            <div class="form-group">
                                <label for="exampleFormControlInput1">carai barang</label>
                                {{-- <select name="" id="" class="form-control text-uppercase">
                                    @foreach ($barang as $item)
                                        <option value="{{ $item->id }}">{{ $item->kategori->namaKategori }} | {{ $item->kodeBarang }} | {{ $item->namaBarang }} | {{ $item->merek }} | {{ $item->model }} | {{ $item->nomorSeri }} | {{ $item->vendor }} | {{ $item->ram->tipeRam->keterangan }} | {{ $item->ram->kapasitas }}</option>
                                    @endforeach
                                </select> --}}


                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlInput1">nama Negara</label>
                                <input type="text" class="form-control text-uppercase" name="namaNegara" id="namaNegara" placeholder="nama negara">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">cari</button>
                            </div>
                            <div class="form-group">
                                <label for="keteranganNegara">keteranganNegara</label>
                                <textarea name="keteranganNegara" class="form-control" id="keteranganNegara" rows="3" placeholder="keterangan"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
                    </div>
                </div>
            </div>

        </div>



    <!-- /.container-fluid -->


    <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
            </div>
        </div>
        </div>



@endsection
