@extends('master.app.index')

@section('content')


@push('css')
    {{-- <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{asset('css/wizard.css')}}">
    <link rel="stylesheet" href="{{ asset('css/showTagihan.css') }}">


@endpush

@push('js')

    <script src="{{ asset('js/wizard.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/view-tagihan.js') }}"></script>
    {{-- <script src="wizard.js"></script> --}}


@endpush


{{-- start --}}
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">{{$title}} </h1> --}}

    <div class="row">
                <div class="col-md-10 col-md-offset-1">
                	<form action="{{ route('tagihan.store') }}" method="post" class="f1">
                		@csrf

                        {{-- header step form start --}}
                		<div class="f1-steps">
                			<div class="f1-progress">
                			    <div class="f1-progress-line" data-now-value="25" data-number-of-steps="4" style="width: 25%;"></div>
                			</div>
                            <div class="f1-step active">
                                <div class="f1-step-icon"><i class="fa fa-user"></i></div>
                                <p>Info Tagihan</p>
                            </div>
                			<div class="f1-step">
                				<div class="f1-step-icon"><i class="fa fa-home"></i></div>
                				<p>Tagihan Untuk</p>
                			</div>
                			<div class="f1-step">
                				<div class="f1-step-icon"><i class="fa fa-key"></i></div>
                				<p>Detail Tagihan</p>
                			</div>
                		    <div class="f1-step">
                				<div class="f1-step-icon"><i class="fa fa-address-book"></i></div>
                				<p>Preview Tagihan</p>
                			</div>
                		</div>
                        {{-- header step form end --}}

                		<!-- step 1 start-->
                		<fieldset>
                		    <h4>Info Tagihan</h4>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">vendor</label>
                                <div class="col-sm-10">
                                <select name="vendor_id" id="vendor_id" class="form-control text-uppercase" >
                                    @foreach ($vendor as $item2)
                                        <option  value="{{ $item2->id }}">{{ $item2->namaVendor }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">noTagihan</label>
                                <div class="col-sm-10">
                                <input type="text" name="noTagihan" class="form-control" id="inputnoTagihan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">tanggalTagihan</label>
                                <div class="col-sm-10">
                                <input type="date" name="tanggalTagihan" class="form-control" id="inputtanggalTagihan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">dueDateTagihan</label>
                                <div class="col-sm-10">
                                <input type="date" name="dueDateTagihan" class="form-control" id="inputdueDateTagihan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">periodeTagihan</label>
                                <div class="col-sm-10">
                                <input type="text" name="periodeTagihan" class="form-control" id="inputperiodeTagihan">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">subttotal</label>
                                <div class="col-sm-10">
                                <input type="number" name="subttotal" class="form-control" id="inputsubttotal">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">vat / pajak</label>
                                <div class="col-sm-10">
                                <input type="number" name="vat" class="form-control" id="inputvat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Denda</label>
                                <div class="col-sm-10">
                                <input type="number" name="denda" class="form-control" id="inputdenda">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">diskon</label>
                                <div class="col-sm-10">
                                <input type="number" name="diskon" class="form-control" id="inputdiskon">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">totaltagihan</label>
                                <div class="col-sm-10">
                                <input type="number" name="totaltagihan" class="form-control" id="inputtotaltagihan">
                                </div>
                            </div>



                            <div class="f1-buttons">
                                <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>
                        <!-- step 1 end -->

                        <!-- step 2 start -->
                        <fieldset>
                            <h4>Tagihan Untuk</h4>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">pelanggan</label>
                                <div class="col-sm-10">
                                <select name="pelanggan_id" id="pelanggan_id" class="form-control" onchange="fetchData()" >
                                        <option value="" selected >-- pilih --</option>
                                    @foreach ($pelanggan as $item)
                                        <option value="{{ $item->id }}">{{ $item->namaPelanggan }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                                <input type="hidden" name="PelangganId" class="form-control" id="inputPelangganId" disabled>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">picUser</label>
                                <div class="col-sm-10">
                                <input type="text" name="picUser" class="form-control" id="inputpicUser" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">picAlamat</label>
                                <div class="col-sm-10">
                                <input type="text" name="picAlamat" class="form-control" id="inputpicAlamat" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">picTlp</label>
                                <div class="col-sm-10">
                                <input type="text" name="picTlp" class="form-control" id="inputpicTlp" disabled>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">picEmail</label>
                                <div class="col-sm-10">
                                <input type="email" name="picEmail" class="form-control" id="inputpicEmail" disabled>
                                </div>
                            </div>



                            <div class="f1-buttons">
                                <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                                <button type="button" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>
                        <!-- step 2 end -->

                        <!-- step 3 start -->
                        <fieldset>
                            <h4>Detail Tagihan</h4>

                            <div class="field_wrapper">
                                <div class="form-group">

                                    <div class="form-row">
                                        <div class="col-6 col-sm-4 form-group">
                                            <label>namaItem</label>
                                            <input type="text" name="namaItem[]" class="form-control" placeholder="namaItem">
                                        </div>
                                        <div class="col-3 col-sm-2 form-group">
                                            <label>jumlah</label>
                                            <input type="number" name="jumlah[]" class="form-control" placeholder="jumlah">
                                        </div>
                                        <div class="col-6 col-sm-2 form-group">
                                            <label>hargaSatuan</label>
                                            <input type="number" name="hargaSatuan[]" class="form-control" placeholder="hargaSatuan">
                                        </div>
                                        <div class="col-6 col-sm-3 form-group">
                                            <label>subtotal</label>
                                            <input type="number" name="subtotal[]" class="form-control" placeholder="subtotal" readonly>

                                        </div>
                                        <div class="col-6 col-sm-1 form-group">
                                            <a class="form-group mr-2 ml-2 btn btn-success" href="javascript:void(0);" id="add_button" title="Add field">+</a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="f1-buttons">
                                <button type="button" class="btn btn-warning btn-previous"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                                <button type="button" id="tampilkan_tagihan" class="btn btn-primary btn-next">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                            </div>
                        </fieldset>
                        <!-- step 3 end -->

                        <!-- step 4 start -->
                        <fieldset>
                            <h4>Preview Tagihan</h4>


                            <div class="container">
                                <div class="invoice-container">
                                    <!-- Header Invoice -->
                                    <div class="invoice-header">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="logo-container mb-3">
                                                    <img src="{{ asset('img/undraw_rocket.svg') }}" alt="Company Logo" class="img-fluid">
                                                </div>
                                                <h6 class="mb-3">Tagihan Dari : </h6>
                                                {{-- <h5 class="mb-1" class="font-weight-bold text-uppercase" id="namaVendor"><strong></strong></h5> --}}
                                                <h5  class="mb-1 font-weight-bold text-uppercase" id="namaVendor"><strong></strong></h5>
                                                <p class="mb-1"><small class="text-muted" id="alamatVendor"></small></p>
                                                <p class="mb-1"><small class="text-muted" id="tlpVendor"></small></p>
                                                <p class="mb-0"><small class="text-muted" id="emailVendor"></small></p>

                                            </div>
                                            <div class="col-md-6 text-right">
                                                <h1 class="invoice-title">INVOICE</h1>

                                                <p class="invoice-number mb-1 text-uppercase" id="noTagihan"></p>

                                                <p class="mb-1" id="tanggalTagihan"><small class="text-muted" ></small></p>

                                                <p class="mb-0 due-date" id="dueDateTagihan"><small class="text-muted" ></p>

                                                    <div class="mt-3">
                                                    <span class="status-badge status-unpaid"><i class="fas fa-exclamation-circle mr-1"></i> namaStatusTagihan </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Info Klien -->
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <div class="client-info">
                                                <h5 class="mb-3">Tagihan Untuk : </h5>
                                                <h6 class="mb-1 font-weight-bold text-uppercase" id="inputPelanggan"><strong></strong></h6>
                                                <p class="mb-1 text-uppercase font-weight-bolder" id="picUser"></p>
                                                <p class="mb-1 text-uppercase" id="picAlamat"></p>
                                                <p class="mb-1 text-uppercase" id="picTlp"> </p>
                                                <p class="mb-0 " id="picEmail"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="client-info">
                                                <h5 class="mb-3">Detail Pembayaran:</h5>
                                                <p class="mb-1"><strong>Bank:</strong> Bank Central Asia (BCA)</p>
                                                <p class="mb-1"><strong>No. Rekening:</strong> 1234567890</p>
                                                <p class="mb-1"><strong>Atas Nama:</strong> PT. Maju Jaya Abadi</p>
                                                <p class="mb-0"><strong>Kode Pembayaran:</strong> INV125</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tabel Item -->
                                    <div class="table-responsive mb-4">
                                        <table class="table table-bordered table-items" id="tagihanTable">
                                            <thead>
                                                <tr>
                                                    <th width="5%">No</th>
                                                    <th width="50%">Deskripsi</th>
                                                    <th width="15%" class="text-right">Harga Satuan</th>
                                                    <th width="10%" class="text-center">Qty</th>
                                                    <th width="20%" class="text-right">Jumlah</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Data will be inserted here -->
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Total Pembayaran -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="payment-info">
                                                <h5 class="mb-3">Instruksi Pembayaran:</h5>
                                                <ol class="pl-3 mb-0">
                                                    <li>Transfer ke rekening yang tertera di atas</li>
                                                    <li>Gunakan kode pembayaran sebagai referensi</li>
                                                    <li>Konfirmasi pembayaran via email atau WhatsApp</li>
                                                    <li>Tagihan akan dianggap lunas setelah pembayaran diterima</li>
                                                </ol>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="total-section">
                                                <div class="row mb-1">
                                                    <div class="col-6 text-right">
                                                        <strong>Subtotal:</strong>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <p class="font-weight-bolder" id="subttotal"></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-6 text-right">
                                                        <strong>PPN (10%):</strong>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <p id="vat"></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-6 text-right">
                                                        <strong>Denda:</strong>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <p id="denda"></p>
                                                    </div>
                                                </div>
                                                <div class="row mb-1">
                                                    <div class="col-6 text-right">
                                                        <strong>Diskon:</strong>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <p id="diskon"></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-right">
                                                        <h5 class="mb-0" id="">totaltagihan</h5>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <h5 class="mb-0 font-weight-bold" id="totaltagihan"></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Footer -->
                                    <div class="mt-4 pt-3 border-top">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h6 class="mb-2">Catatan:</h6>
                                                <p class="small text-muted mb-0">Tagihan ini valid hingga tanggal jatuh tempo. Pembayaran setelah tanggal jatuh tempo dikenakan denda keterlambatan sebesar 2% per bulan.</p>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <div class="mt-3">
                                                    <img src="{{ asset('favicon.ico') }}" alt="Signature" class="img-fluid">
                                                    <p class="mb-0"><small class="text-muted">Hormat kami,</small></p>
                                                    <p class="mb-0"><strong>Budi Santoso</strong></p>
                                                    <p class="mb-0"><small class="text-muted">Finance Manager</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Aksi -->
                                {{-- <div class="text-center mb-5">
                                    <button class="btn btn-primary mr-2"><i class="fas fa-print mr-1"></i> Cetak Invoice</button>
                                    <button class="btn btn-success mr-2"><i class="fas fa-file-pdf mr-1"></i> Download PDF</button>
                                    <button class="btn btn-outline-secondary"><i class="fas fa-envelope mr-1"></i> Kirim via Email</button>
                                </div> --}}
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

{{-- end --}}


@push('js') {{-- Or just place inside <script> tags directly --}}

    <script type="text/javascript">

        $(document).ready(function() {
            var maxField = 10; // Input fields increment limitation
            var addButton = $('#add_button'); // Add button selector
            var wrapper = $('.field_wrapper'); // Input field wrapper
            var fieldHTML = '<div class="form-row">'+
                            '<div class="col-6 col-sm-4 form-group">'+
                            '<input type="text" name="namaItem[]" class="form-control" placeholder="namaItem">'+
                            '</div>'+
                            '<div class="col-3 col-sm-2 form-group">'+
                            '<input type="text" name="jumlah[]" class="form-control" placeholder="jumlah">'+
                            '</div>'+
                            '<div class="col-6 col-sm-2 form-group">'+
                            '<input type="text" name="hargaSatuan[]" class="form-control" placeholder="hargaSatuan">'+
                            '</div>'+
                            '<div class="col-6 col-sm-3 form-group">'+
                            '<input type="text" name="subtotal[]" class="form-control" placeholder="subtotal" readonly>'+
                            '</div>'+
                            '<div class="col-6 col-sm-1 form-group">'+
                            '<div class="form-group row mr-2 ml-2">'+
                            '<a href="javascript:void(0);" class="remove_button btn btn-danger" aria-label="Remove row">-</a></div>' +
                            '</div>'+
                            '</div>'+
                            '</div>';

            var x = 1; // Initial field counter is 1

            // Fungsi untuk menghitung subtotal
            function calculateSubtotal() {
                $('.form-row').each(function() {
                    var jumlah = $(this).find('input[name="jumlah[]"]').val().trim() || 0;
                    var hargaSatuan = $(this).find('input[name="hargaSatuan[]"]').val().trim() || 0;
                    // Menghitung subtotal
                    var subtotal = parseFloat(jumlah) * parseFloat(hargaSatuan);
                    // Memperbarui input subtotal
                    $(this).find('input[name="subtotal[]"]').val(isNaN(subtotal) ? 0 : subtotal);
                });
            }
            // Memperbarui subtotal saat input jumlah atau hargaSatuan berubah
            $('.field_wrapper').on('input', 'input[name="jumlah[]"], input[name="hargaSatuan[]"]', function() {
                calculateSubtotal();
            });


            // Function to update preview table
            function updatePreview() {

                const rows = wrapper.find('.form-row');
                const tbody = $('#preview-table');
                tbody.empty(); // Clear existing rows
                if (rows.length === 0) {
                    tbody.append('<tr id="preview-empty"><td colspan="5">Belum ada data yang diisi.</td></tr>');
                    return;
                }

                rows.each(function(index) {
                    var namaItem = $(this).find('input[name="namaItem[]"]').val().trim() || '-';
                    var jumlah = $(this).find('input[name="jumlah[]"]').val().trim() || '0';
                    var hargaSatuan = $(this).find('input[name="hargaSatuan[]"]').val().trim() || '0';
                    var subtotal = $(this).find('input[name="subtotal[]"]').val().trim() || '0';
                    // Optional: Format numbers with thousand separators if numeric
                    function formatNumber(num) {
                        return isNaN(num) || num === '-' ? num : Number(num).toLocaleString();
                    }
                    var row = '<tr>' +
                        `<td>${index + 1}</td>` +
                        `<td>${namaItem}</td>` +
                        `<td class="text-right">${formatNumber(hargaSatuan)}</td>` +
                        `<td class="text-center">${formatNumber(jumlah)}</td>` +
                        `<td class="text-right">${formatNumber(subtotal)}</td>` +
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
