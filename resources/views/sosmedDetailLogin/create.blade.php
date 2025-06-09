
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
            <h1 class="h3 mb-2 text-gray-800">{{$title}}   >> {{ $sosmed->namaSosmed }}</h1>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Category</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form method="POST" action="{{ route('sosmed.detail.login.store',['sosmed' => $sosmed['id'], 'detail' => $sosmedDetail['id']]) }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="name">jenis_sosmed</label>
                                <select name="sosmedDetail_id" id="sosmedDetail_id" class="form-control">
                                    <option value="{{ $sosmedDetail['id'] }}" @readonly(true)>{{ $sosmedDetail['sosmed']['namaSosmed'] }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">tanggal</label>
                                <input type="date" class="form-control" id="tanggal" aria-describedby="tanggal" name="tanggal">
                            </div>

                            <div class="form-group">
                                <label for="name">jam</label>
                                <input type="time" class="form-control" id="jam" aria-describedby="jam" name="jam">
                            </div>

                            <div class="form-group">
                                <label for="name">status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="0">aktif</option>
                                    <option value="1">nonaktif</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">keterangan</label>
                                <textarea name="keterangan" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>


                            <div class="form-group">
                                <label for="name">gambar</label>
                                <input type="file" class="form-control" class="form-control" id="gambar" aria-describedby="gambar" name="gambar">
                                <img id="gambar-preview" src="#" alt="Preview Gambar" style="max-width: 200px; max-height: 200px; margin-top: 10px; display: none;">
                            </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ url()->previous() }}" class="btn btn-success">kembali</a>
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
