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
                	<form action="" method="post" class="f1">
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
                                <select name="vendor_id" id="" class="form-control" >
                                    <option value="1">satu</option>
                                    <option value="2">dua</option>
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
                                <label for="staticEmail" class="col-sm-2 col-form-label">totaltagihan</label>
                                <div class="col-sm-10">
                                <input type="text" name="totaltagihan" class="form-control" id="inputtotaltagihan">
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

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">picUser</label>
                                <div class="col-sm-10">
                                <input type="text" name="picUser" class="form-control" id="inputpicUser">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">picAlamat</label>
                                <div class="col-sm-10">
                                <input type="text" name="picAlamat" class="form-control" id="inputpicAlamat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">picTlp</label>
                                <div class="col-sm-10">
                                <input type="text" name="picTlp" class="form-control" id="inputpicTlp">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">picEmail</label>
                                <div class="col-sm-10">
                                <input type="email" name="picEmail" class="form-control" id="inputpicEmail">
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
                                                    <img src="https://via.placeholder.com/180x60?text=Company+Logo" alt="Company Logo" class="img-fluid">
                                                </div>
                                                <h5 class="mb-1">Nama : nama vendor</h5>
                                                <p class="mb-1"><small class="text-muted">Alamat : Alamat Vendor</small></p>
                                                <p class="mb-1"><small class="text-muted">Tlp :tlpVendor</small></p>
                                                <p class="mb-0"><small class="text-muted">Email: emailVendor </small></p>
                                            </div>
                                            <div class="col-md-6 text-right">
                                                <h1 class="invoice-title">INVOICE</h1>
                                                <p class="invoice-number mb-1" id="noTagihan"></p>
                                                <p class="mb-1" id="tanggalTagihan"><small class="text-muted" id="tanggalTagihanValue">Tanggal: tanggal Tagihan</small></p>
                                                <p class="mb-0 due-date" ><small id="dueDateTagihan">Jatuh Tempo: dueDateTagihan</small></p>
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
                                                <h5 class="mb-3">Tagihan Untuk:</h5>
                                                <h6 class="mb-1">Pelanggan</h6>
                                                <p class="mb-1">picUser  </p>
                                                <p class="mb-1">picAlamat</p>
                                                <p class="mb-1">Telp: 021-4678912345 </p>
                                                <p class="mb-0">Email: email</p>
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
                                        <table class="table table-bordered table-items">
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
                                                @php $no = 1; @endphp
                                                @foreach ($tagihan->tagihanDetail as $item)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>
                                                            <strong>{{ $item->namaItem }}</strong><br>
                                                            {{-- <small class="text-muted">{{ $item->namaItem }}</small> --}}
                                                        </td>
                                                        <td class="text-right">@currency($item->hargaSatuan)</td>
                                                        <td class="text-center">@currency($item->jumlah) </td>
                                                        <td class="text-right">@currency($item->subtotal)  </td>
                                                    </tr>

                                                @endforeach

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
                                                <div class="row mb-2">
                                                    <div class="col-6 text-right">
                                                        <strong>Subtotal:</strong>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        @currency($tagihan->totaltagihan)
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 text-right">
                                                        <strong>PPN (10%):</strong>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        Rp 975.000
                                                    </div>
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-6 text-right">
                                                        <strong>Diskon:</strong>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        - Rp 500.000
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 text-right">
                                                        <h5 class="mb-0">Total:</h5>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <h5 class="mb-0">Rp 10.225.000</h5>
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
                                                    <img src="https://via.placeholder.com/150x50?text=Signature" alt="Signature" class="img-fluid">
                                                    <p class="mb-0"><small class="text-muted">Hormat kami,</small></p>
                                                    <p class="mb-0"><strong>Budi Santoso</strong></p>
                                                    <p class="mb-0"><small class="text-muted">Finance Manager</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Aksi -->
                                <div class="text-center mb-5">
                                    <button class="btn btn-primary mr-2"><i class="fas fa-print mr-1"></i> Cetak Invoice</button>
                                    <button class="btn btn-success mr-2"><i class="fas fa-file-pdf mr-1"></i> Download PDF</button>
                                    <button class="btn btn-outline-secondary"><i class="fas fa-envelope mr-1"></i> Kirim via Email</button>
                                </div>
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
                        '<input type="text" name="subtotal[]" class="form-control" placeholder="subtotal">'+
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

    {{-- <script>
        document.getElementById("tampilkan_tagihan").addEventListener("click", tampilkan_nilai_form);

        function tampilkan_nilai_form(){
            const inputNoTagihan = document.getElementById("noTagihan");
            const spanNoTagihan = document.getElementById("noTagihanSpan");
            const inputUpTagihan = document.getElementById("upTagihan");
            const spanUpTagihan = document.getElementById("upTagihanSpan");
            const inputTanggalTagihan = document.getElementById("tanggalTagihan");
            const spanTanggalTagihan = document.getElementById("tanggalTagihanSpan");

            // document.getElementById("hasil").innerHTML=nilai_form;
            spanNoTagihan.textContent = inputNoTagihan.value;
            spanUpTagihan.textContent= inputUpTagihan.value;
            spanTanggalTagihan.textContent= inputTanggalTagihan.value;

        }


        // const inputNoTagihan = document.getElementById("noTagihan");
        // const spanNoTagihan = document.getElementById("noTagihanSpan");
        // const inputUpTagihan = document.getElementById("upTagihan");
        // const spanUpTagihan = document.getElementById("upTagihanSpan");
        // const inputTanggalTagihan = document.getElementById("tanggalTagihan");
        // const spanTanggalTagihan = document.getElementById("tanggalTagihanSpan");

        // inputTanggalTagihan.addEventListener("input", function() {
        //     spanNoTagihan.textContent = inputNoTagihan.value;
        //     spanUpTagihan.textContent= inputUpTagihan.value;
        //     spanTanggalTagihan.textContent= inputTanggalTagihan.value;
        // });
    </script> --}}


    <script>
    // membuat data berbah pada saat dropdown berubah
        function fetchData() {
            const pelangganId = document.getElementById('pelanggan_id').value;

            if (pelangganId) {
                fetch(`/get-customer-pic/${pelangganId}`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('inputpicUser').value = data.picUser  || '';
                        document.getElementById('inputpicAlamat').value = data.picAlamat || '';
                        document.getElementById('inputpicTlp').value = data.picTlp || '';
                        document.getElementById('inputpicEmail').value = data.picEmail || '';
                    })
                    .catch(error => console.error('Error fetching data:', error));
            } else {
                // Clear fields if no pelanggan is selected
                document.getElementById('inputpicUser').value = '';
                document.getElementById('inputpicAlamat').value = '';
                document.getElementById('inputpicTlp').value = '';
                document.getElementById('inputpicEmail').value = '';
            }
        }
    </script>

@endpush



@endsection
