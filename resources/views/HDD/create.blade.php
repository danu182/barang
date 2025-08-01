
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
                    <h6 class="m-0 font-weight-bold text-primary"> {{ $barang->namaBarang }} ==>> {{ $barang->kodeBarang }}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">

                        <form method="POST" action="{{ route('barang.harddisk.store',['barang' => $barang['id']]) }}" class="form-inline">
                            @csrf

                            <div class="field_wrapper">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="form-group mr-2 ml-4">
                                            <label for="tipeHardDisk_id" class="mr-2">tipe HD</label>
                                            <select name="tipeHardDisk_id[]" class="form-control">
                                                <option disabled>pilih salah satu</option>
                                                @foreach ($tipeHardDisk as $item)
                                                    <option value="{{ $item['id'] }}">{{ $item['namaTipeHardDisk'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mr-2 ml-2">
                                            <label for="kapasitas" class="mr-2">kapasitas HD</label>
                                            <input type="text" class="form-control" name="kapasitas[]">
                                        </div>

                                        <div class="form-group mr-2 ml-4">
                                            <label for="tipeHardDisk_id" class="mr-2">satuanSize</label>
                                            <select name="satuanSize_id[]" class="form-control">
                                                <option disabled>pilih salah satu</option>
                                                @foreach ($satuanSize as $item)
                                                    <option value="{{ $item['id'] }}">{{ $item['namaSatuanSize'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group mr-2 ml-2">
                                            <label for="keterangan" class="mr-2">keterangan HD</label>
                                            <textarea name="keterangan[]" cols="30" rows="10" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group mr-2 ml-2">
                                            <a class="btn btn-success" href="javascript:void(0);" id="add_button" title="Add field">TAMBAH</a>
                                            <button class="btn btn-primary ml-2" type="submit">SIMPAN</button>
                                            <a href="{{ route('barang.index') }}" class="btn btn-warning mr-2 ml-2">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->

    @push('js') {{-- Or just place inside <script> tags directly --}}

        <script type="text/javascript">
            $(document).ready(function() {
                var maxField = 10; // Input fields increment limitation
                var addButton = $('#add_button'); // Add button selector
                var wrapper = $('.field_wrapper'); // Input field wrapper
                var fieldHTML = '<div class="form-group add"><div class="row">' +
                    '<div class="form-group mr-2 ml-4">' +
                    '<label for="tipeHardDisk_id" class="mr-2">tipe HD</label>'+
                    '<select name="tipeHardDisk_id[]" class="form-control">' +
                    '<option disabled>pilih salah satu</option>' +
                    '@foreach ($tipeHardDisk as $item)' +
                    '<option value="{{ $item['id'] }}">{{ $item['namaTipeHardDisk'] }}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group mr-2 ml-2">' +
                    '<label for="kapasitas" class="mr-2">kapasitas HD</label>' +
                    '<input type="text" class="form-control" name="kapasitas[]">' +
                    '</div>' +
                    '<div class="form-group mr-2 ml-4">' +
                    '<label for="tipeHardDisk_id" class="mr-2">satuanSize</label>' +
                    '<select name="tipeHardDisk_id[]" class="form-control">' +
                    '<option disabled>pilih salah satu</option>' +
                    '@foreach ($satuanSize as $item)' +
                    '<option value="{{ $item['id'] }}">{{ $item['namaSatuanSize'] }}</option>' +
                    '@endforeach' +
                    '</select>' +
                    '</div>' +
                    '<div class="form-group mr-2 ml-2">' +
                    '<label for="keterangan" class="mr-2">keterangan HD</label>' +
                    '<textarea name="keterangan[]" cols="30" rows="10" class="form-control"></textarea>' +
                    '</div>' +
                    '<div class="form-group row mr-2 ml-2"><a href="javascript:void(0);" class="remove_button btn btn-danger">HAPUS</a></div>' +
                    '</div></div>';

                var x = 1; // Initial field counter is 1

                // Once add button is clicked
                $(addButton).click(function() {
                    // Check maximum number of input fields
                    if (x < maxField) {
                        x++; // Increment field counter
                        $(wrapper).append(fieldHTML); // Add field html
                    }
                });

                // Once remove button is clicked
                $(wrapper).on('click', '.remove_button', function(e) {
                    e.preventDefault();
                    $(this).closest('.add').remove(); // Remove field html
                    x--; // Decrement field counter
                });
            });
        </script>




        {{-- <script>
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
        </script> --}}
    @endpush


@endsection
