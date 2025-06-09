
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

                        <form method="POST" action="{{route('kategori.update', $kategori['id'])}}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">kodeKategori</label>
                                <input type="text" class="form-control" id="kodeKategori" aria-describedby="kodeKategori" name="kodeKategori" value="{{ $kategori['kodeKategori'] }}" >
                            </div>

                            <div class="form-group">
                                <label for="namaKategori">namaKategori</label>
                                <input type="text" class="form-control" id="namaKategori" aria-describedby="emailHelp" name="namaKategori" value="{{ $kategori['namaKategori'] }}">
                            </div>

                            <div class="form-group">
                                <label for="namaKategori">spesifikasi</label>
                                <select name="duaPilihan_id" id="" class="form-control">
                                    <option value="{{ $kategori->duaPilihan_id }}">{{ $kategori->duaPilihan['namaPilihan'] }}</option>
                                    @foreach ($duaPilihan as $item)
                                        <option value="{{ $item->id }}">{{ $item->namaPilihan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-success">kembali</a>
                        </form>


                    </div>
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->




@endsection
