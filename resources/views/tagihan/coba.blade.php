@extends('master.app.index')

@section('content')


@push('css')
    {{-- <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('css/wizard.css')}}">



@endpush

@push('js')
    <!-- Page level plugins -->
    {{-- <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script> --}}

    <!-- Page level custom scripts -->
    {{-- <script src="{{asset('js/demo/datatables-demo.js')}}"></script> --}}

    <script src="{{ asset('js/wizard.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    {{-- <script src="wizard.js"></script> --}}

@endpush

<div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                	<form action="" method="post" class="f1">
                		{{-- <h3>www.ayongoding.com</h3> --}}
                		<p>Membuat Form Wizard Bootstrap</p>
                		<div class="f1-steps">

                			<div class="f1-progress">
                			    <div class="f1-progress-line" data-now-value="25" data-number-of-steps="4" style="width: 25%;"></div>
                			</div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <p>Tagihan</p>
                            </div>
                			<div class="f1-step">
                				<div class="f1-step-icon"><i class="fa fa-home"></i></div>
                				<p>Lampiran</p>
                			</div>
                			<div class="f1-step">
                				<div class="f1-step-icon"><i class="fa fa-key"></i></div>
                				<p>detail</p>
                			</div>
                		    <div class="f1-step">
                				<div class="f1-step-icon"><i class="fa fa-address-book"></i></div>
                				<p>Sosial</p>
                			</div>

                		</div>
                		<!-- step 1 start -->

                		<fieldset>
                		    <h4>Input tagihan</h4>
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



                            <div class="f1-buttons">
                                <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>


                        <!-- step 1 end -->


                        <!-- step 2 start -->
                        <fieldset>
                            <h4>Alamat Lengkap</h4>

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

                            <div class="f1-buttons">
                                <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                                <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>
                        <!-- step 2 end -->


                        <!-- step 3 detail tagihan start-->
                        <fieldset>
                            <h4>detail tagihan</h4>
                            <div class="field_wrapper">
                                <div class="form-group">

                                    <div class="form-row">
                                        <div class="col-6 col-sm-4 form-group">
                                            <label>namaItem</label>
                                            <input type="text" name="namaItem[]" class="form-control" placeholder="namaItem">
                                        </div>
                                        <div class="col-3 col-sm-2 form-group">
                                            <label>jumlah</label>
                                            <input type="text" name="jumlah[]" class="form-control" placeholder="jumlah">
                                        </div>
                                        <div class="col-6 col-sm-2 form-group">
                                            <label>hargaSatuan</label>
                                            <input type="text" name="hargaSatuan[]" class="form-control" placeholder="hargaSatuan">
                                        </div>
                                        <div class="col-6 col-sm-3 form-group">
                                            <label>subtotal</label>
                                            <input type="text" name="subtotal[]" class="form-control" placeholder="subtotal">

                                        </div>
                                        <div class="col-6 col-sm-1 form-group">
                                            <a class="btn btn-success" href="javascript:void(0);" id="add_button" title="Add field">+</a>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <div class="f1-buttons">
                                <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                                <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                            </div>

                        </fieldset>



                        <!-- step 3 end -->

                        <!-- step 4 start -->
                        <fieldset>
                            {{-- <h4>Sosial Media</h4> --}}

                            <div id="preview-container" aria-live="polite" aria-label="Preview of billing details">
                                <h4>Preview Detail Tagihan</h4>

                                <div class="container">
                                    <div class="row">
                                        {{-- <div class="col-md-2">
                                        Foto Profil
                                        </div> --}}
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-title">Informasi Ku</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                    <div class="col-md-6">Nama Lengkap</div>
                                                    <div class="col-md-6" id="nama_lengkap">: Nama Lengkap Kita</div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6" >Tempat, Tanggal Lahir</div>
                                                    <div class="col-md-6">: TTL Kita</div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">Alamat</div>
                                                    <div class="col-md-6">: Alamat Kita</div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-md-6">Kontak</div>
                                                    <div class="col-md">:</div>
                                                    <div class="col-md-6">
                                                        <ul>
                                                        <li>Instagram Kita</li>
                                                        <li>Facebook Kita</li>
                                                        <li>No HP Kita</li>
                                                        <li>Email Kita</li>
                                                        </ul>
                                                    </div>
                                                    </div>
                                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                                </div>
                                                </div>

                                        </div>
                                        <div class="col-md-5">
                                        Riwayat Pendidikan
                                        </div>
                                    </div>
                                </div>

                                    <table class="table" id="preview-table" role="table" aria-describedby="preview-empty">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Nama Item</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th scope="col">Subtotal</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="preview-empty"><td colspan="4">Belum ada data yang diisi.</td></tr>
                                    </tbody>
                                </table>
                                </div>
                            <div class="f1-buttons">
                                <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                                <button type="submit" class="btn btn-primary btn-submit"><i class="fa fa-save"></i> Submit</button>
                            </div>
                        </fieldset>
                        <!-- step 4 end -->
                	</form>
                </div>
            </div>
        </div>
        <!-- Javascript -->





         @push('js') {{-- Or just place inside <script> tags directly --}}

        <script type="text/javascript">
        $(document).ready(function() {
            var maxField = 10; // Input fields increment limitation
            var addButton = $('#add_button'); // Add button selector
            var wrapper = $('.field_wrapper'); // Input field wrapper
            var fieldHTML = '<div class="form-row">'+
                            '<div class="col-6 col-sm-4 form-group">'+
                            '<label>namaItem</label>'+
                            '<input type="text" name="namaItem[]" class="form-control" placeholder="namaItem">'+
                            '</div>'+
                            '<div class="col-3 col-sm-2 form-group">'+
                            '<label>jumlah</label>'+
                            '<input type="text" name="jumlah[]" class="form-control" placeholder="jumlah">'+
                            '</div>'+
                            '<div class="col-6 col-sm-2 form-group">'+
                            '<label>hargaSatuan</label>'+
                            '<input type="text" name="hargaSatuan[]" class="form-control" placeholder="hargaSatuan">'+
                            '</div>'+
                            '<div class="col-6 col-sm-3 form-group">'+
                            '<label>subtotal</label>'+
                            '<input type="text" name="subtotal[]" class="form-control" placeholder="subtotal">'+
                            '</div>'+
                            '<div class="col-6 col-sm-1 form-group">'+
                            '<div class="form-group row mr-2 ml-2"><a href="javascript:void(0);" class="remove_button btn btn-danger" aria-label="Remove row">-</a></div>' +
                            '</div>'+
                            '</div>';

            var x = 1; // Initial field counter is 1

            // Function to update preview table
            function updatePreview() {
                const rows = wrapper.find('.form-row');
                const tbody = $('#preview-table tbody');

                // var noTagihan = $(this).find('input[name="noTagihan"]').val().trim() || '-';
                // console.console.log(noTagihan);

                tbody.empty();
                if (rows.length === 0) {
                tbody.append('<tr id="preview-empty"><td colspan="4">Belum ada data yang diisi.</td></tr>');
                return;
                }
                rows.each(function() {
                var namaItem = $(this).find('input[name="namaItem[]"]').val().trim() || '-';
                var jumlah = $(this).find('input[name="jumlah[]"]').val().trim() || '-';
                var hargaSatuan = $(this).find('input[name="hargaSatuan[]"]').val().trim() || '-';
                var subtotal = $(this).find('input[name="subtotal[]"]').val().trim() || '-';


                // Optional: Format numbers with thousand separators if numeric
                function formatNumber(num) {
                    return isNaN(num) || num === '-' ? num : Number(num).toLocaleString();
                }

                var row = '<tr>'+
                    `<td>${namaItem}</td>`+
                    `<td>${formatNumber(jumlah)}</td>`+
                    `<td>${formatNumber(hargaSatuan)}</td>`+
                    `<td>${formatNumber(subtotal)}</td>`+
                    '</tr>';
                tbody.append(row);
                });



            }

            // Update preview initially
            updatePreview();

            // Once add button is clicked
            $(addButton).click(function() {
                // Check maximum number of input fields
                if (x < maxField) {
                    x++; // Increment field counter
                    $(wrapper).append(fieldHTML); // Add field html
                    updatePreview();
                }
            });

            // Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).closest('.form-row').remove(); // Remove field html
                x--; // Decrement field counter
                updatePreview();
            });

            // Update preview on input change in any input within the wrapper
            wrapper.on('input', 'input', function() {
                updatePreview();
            });
        });
        </script>


@endpush



@endsection
