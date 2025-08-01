
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

                        <form method="POST" action="{{ route('tagihan.store') }}">
                            {{-- <input type="hidden" name="_token" value="MmgmDjUq6M4Gxdb9EXOjwAWWEkC6uMZQeucyJXLG" autocomplete="off"> --}}

                            @csrf

                            <div class="form-group">
                                <label for="noTagihan">vendor_id</label>
                                <select name="vendor_id" id="" class="form-control">
                                    <option disabled> pilih </option>
                                    @foreach ($vendor as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['namaVendor'] }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="noTagihan">noTagihan</label>
                                <input type="text" class="form-control" id="noTagihan" aria-describedby="emailHelp" name="noTagihan">
                            </div>

                            <div class="form-group">
                                <label for="upTagihan">upTagihan</label>
                                <input type="text" class="form-control" id="upTagihan" aria-describedby="emailHelp" name="upTagihan">
                            </div>

                            <div class="form-group">
                                <label for="tanggalTagihan">tanggalTagihan</label>
                                <input type="date" class="form-control" id="tanggalTagihan" aria-describedby="emailHelp" name="tanggalTagihan">
                            </div>

                            <div class="form-group">
                                <label for="dueDateTagihan">dueDateTagihan</label>
                                <input type="date" class="form-control" id="dueDateTagihan" aria-describedby="emailHelp" name="dueDateTagihan">
                            </div>

                            <div class="form-group">
                                <label for="totaltagihan">totaltagihan</label>
                                <input type="text" class="form-control" id="totaltagihan" aria-describedby="emailHelp" name="totaltagihan">
                            </div>

                            <div class="form-group">
                                <label for="lampiran">lampiran</label>
                                <input type="file" class="form-control" id="lampiran" aria-describedby="emailHelp" name="lampiran">
                            </div>

                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
                                <textarea name="keterangan" id="" cols="30" class="form-control" rows="10"></textarea>
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
