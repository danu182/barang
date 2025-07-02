
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
            <h1 class="h3 mb-2 text-gray-800">{{$title}} </h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $vendor['namaVendor'] }} </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form method="POST" action="{{ route('subcont.update', $vendor['id']) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="namaVendor">namaVendor</label>
                                <input type="text" class="form-control" id="namaVendor" aria-describedby="emailHelp" name="namaVendor" value="{{ $vendor['namaVendor'] }}">
                            </div>

                            <div class="form-group">
                                <label for="alamatVendor">alamatVendor</label>
                                <input type="text" class="form-control" id="alamatVendor" aria-describedby="emailHelp" name="alamatVendor" value="{{ $vendor['alamatVendor'] }}">
                            </div>

                            <div class="form-group">
                                <label for="tlpVendor">emailVendor</label>
                                <input type="text" class="form-control" id="emailVendor" aria-describedby="emailHelp" name="emailVendor" value="{{ $vendor['emailVendor'] }}">
                            </div>

                            <div class="form-group">
                                <label for="tlpVendor">tlpVendor</label>
                                <input type="text" class="form-control" id="tlpVendor" aria-describedby="emailHelp" name="tlpVendor" value="{{ $vendor['tlpVendor'] }}">
                            </div>

                            <div class="form-group">
                                <label for="keterangan">keterangan</label>
                                <textarea name="keterangan" id="" cols="30" rows="10" class="form-control">{{ $vendor['keterangan'] }}</textarea>
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
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const gambarInput = document.getElementById('gambar');
                const gambarPreview = document.getElementById('gambar-preview');

                gambarInput.addEventListener('change', function (event) {
                    const file = event.target.files[0]; // Get the selected file

                    if (file) {
                        const reader = new FileReader(); // Create a FileReader object

                        reader.onload = function (e) {
                            gambarPreview.src = e.target.result; // Set the image source to the file's data URL
                            gambarPreview.style.display = 'block'; // Show the image preview
                        };

                        reader.readAsDataURL(file); // Read the file as a data URL (base64 encoded)
                    } else {
                        gambarPreview.src = '#'; // Clear the preview if no file is selected
                        gambarPreview.style.display = 'none'; // Hide the image preview
                    }
                });
            });
        </script>
    @endpush



@endsection
