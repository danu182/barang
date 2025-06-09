
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

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


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

                        <form method="POST" action="{{  route('sosmed.detail.update',  ['sosmed' => $sosmed['id'], 'detail' => $sosmedDetail['id']] ) }}">
                        {{-- <form method="POST" action=""> --}}
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">username</label>
                                <input type="text" class="form-control" id="username" aria-describedby="username" name="username" value="{{ $sosmedDetail['username'] }}">
                            </div>

                            <div class="form-group">
                                <label for="name">email</label>
                                <input type="text" class="form-control" id="email" aria-describedby="email" name="email" value="{{ $sosmedDetail['email'] }}">
                            </div>

                            <div class="form-group">
                                <label for="name">password</label>
                                <input type="text" class="form-control" id="password" aria-describedby="password" name="password" value="{{ $sosmedDetail['password'] }}">
                            </div>

                            <div class="form-group">
                                <label for="name">link ( janagn lupa isi denfan lengkao http://yyyy.com atau https://yyyy.com )</label>
                                <input type="text" class="form-control" id="link" aria-describedby="link" name="link" value="{{ $sosmedDetail['link'] }}">
                            </div>

                            <div class="form-group">
                                <label for="name">pemilik</label>
                                <input type="text" class="form-control" id="pemilik" aria-describedby="pemilik" name="pemilik" value="{{ $sosmedDetail['pemilik'] }}">
                            </div>

                            <div class="form-group">
                                <label for="name">pic</label>
                                <input type="text" class="form-control" id="pic" aria-describedby="pic" name="pic" value="{{ $sosmedDetail['pic'] }}">
                            </div>

                            <div class="form-group">
                                <label for="name">bagian</label>
                                <input type="text" class="form-control" id="bagian" aria-describedby="bagian" name="bagian" value="{{ $sosmedDetail['bagian'] }}">
                            </div>

                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
                                <textarea name="keterangan" class="form-control" id="" cols="30" rows="10">{{ $sosmedDetail['keterangan'] }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('sosmed.detail.index',$sosmed['id']) }}" class="btn btn-success">kembali</a>
                        </form>


                    </div>
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->




@endsection
