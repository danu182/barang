@extends('master.app.index')

@section('content')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/wizard/wizard.css') }}">
@endpush

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> {{-- Pastikan jQuery dimuat --}}
    {{-- <script src="{{ asset('js/wizard/wizard.js') }}"></script> --}} {{-- Ini akan kita buat nanti --}}
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

<div class="container-fluid">

    <form id="msform" method="post" action="{{ route('tagihan.store') }}" enctype="multipart/form-data" >
        @csrf
        <ul id="progressbar">
            <li class="active" id="account"><strong>Vendor</strong></li>
            <li id="personal"><strong>Personal</strong></li>
            <li id="payment"><strong>Image</strong></li>
            <li id="confirm"><strong>Finish</strong></li>
        </ul>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <br>
        {{-- step 1 start --}}
        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">informasi tagihan :</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 1 - 4</h2>
                    </div>
                </div>
                <label class="fieldlabels">Vendor: *</label>

                {{-- vendor_id --}}
                <div class="form-group">
                    <label for="vendor_select">pilih nama vendor</label>
                    <select class="form-control" name="vendor_id" id="vendor_select">
                        @foreach ($vendor as $vendorItem)
                            <option
                                value="{{ $vendorItem->id }}"
                                data-nama="{{ $vendorItem->namaVendor }}"
                                data-telepon="{{ $vendorItem->tlpVendor }}"
                                data-alamat="{{ $vendorItem->alamatVendor }}"
                                data-email="{{ $vendorItem->emailVendor }}"
                                >
                                {{ $vendorItem->namaVendor }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- pelanggan_id --}}
                <div class="form-group">
                    <label for="pelanggan_select">pilih nama pelanggan_id</label>
                    <select class="form-control" name="pelanggan_id" id="pelanggan_select">
                        @foreach ($pelanggan as $pelangganItem)
                            <option
                                value="{{ $vendorItem->id }}"
                                data-nama="{{ $pelangganItem->namaPelanggan }}"
                                data-pic="{{ $pelangganItem->picPelanggan }}"
                                data-telepon="{{ $pelangganItem->tLpPelanggan }}"
                                data-alamat="{{ $pelangganItem->alamatPelanggan }}"
                                data-email="{{ $pelangganItem->emailPelanggan }}"
                                >
                                {{ $pelangganItem->namaPelanggan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- noTagihan --}}
                <div class="form-group">
                    <label for="no_tagihan">No tagihan</label>
                    <input type="text" class="form-control" name="noTagihan" id="no_tagihan">
                </div>

                {{-- tanggalTagihan --}}
                <div class="form-group">
                    <label for="tanggal_tagihan">tanggalTagihan</label>
                    <input type="date" class="form-control" name="tanggalTagihan" id="tanggal_tagihan" value="{{ date('Y-m-d') }}">
                </div>

                {{-- periodeTagihan --}}
                <div class="form-group">
                    <label for="periode_tagihan">periodeTagihan</label>
                    <input type="text" class="form-control" name="periodeTagihan" id="periode_tagihan">
                </div>

                {{-- dueDateTagihan --}}
                <div class="form-group">
                    <label for="due_date_tagihan">dueDateTagihan</label>
                    <input type="date" class="form-control" name="dueDateTagihan" id="due_date_tagihan" value="{{ date('Y-m-d') }}">
                </div>

            </div>
            <input type="button" name="next" class="next action-button" value="Next"/>
        </fieldset>
        {{-- step 1 end --}}

        {{-- step 2  start --}}
        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Personal Information:</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 2 - 4</h2>
                    </div>
                </div>
                {{-- keterangan --}}
                <div class="form-group">
                    <label for="keterangan">keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="5"></textarea>
                </div>
                {{-- upload lampiran --}}
                <div class="form-group">
                    <label for="lampiran">lampiran</label>
                    <input type="file" name="lampiran" id="lampiran" class="form-control">
                </div>
            </div>
            <input type="button" name="next" class="next action-button" value="Next"/>
            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
        </fieldset>
        {{-- step 2  end--}}

        {{-- step 3 start --}}
        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Detail Item & Total:</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 3 - 4</h2>
                    </div>
                </div>

                <div id="item_fields_container">
                    {{-- Form dinamis item akan ditambahkan di sini oleh JavaScript --}}
                    <div class="form-row item-row mb-3 border p-2 rounded">
                        <div class="col-12 text-right">
                             <button type="button" class="btn btn-danger btn-sm remove-item-btn" style="display:none;">X</button>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Nama Item</label>
                            <input type="text" name="namaItem[]" class="form-control nama-item" placeholder="Nama Item">
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah[]" class="form-control jumlah-item" placeholder="Jumlah" min="1" value="1">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Harga Satuan</label>
                            <input type="number" name="hargaSatuan[]" class="form-control harga-satuan-item" placeholder="Harga Satuan" min="0" value="0">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Subtotal</label>
                            <input type="number" name="subtotal[]" class="form-control subtotal-item" placeholder="Subtotal" readonly value="0">
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="button" class="btn btn-success" id="add_item_button">➕ Tambah Item</button>
                </div>

                <hr class="mt-4 mb-4">

                {{-- Diskon --}}
                <div class="form-group row">
                    <label for="diskon" class="col-sm-3 col-form-label">Diskon (%)</label>
                    <div class="col-sm-9">
                        <input type="number" name="diskon" id="diskon" class="form-control" value="0" min="0" max="100">
                    </div>
                </div>
                {{-- Denda --}}
                <div class="form-group row">
                    <label for="denda" class="col-sm-3 col-form-label">Denda</label>
                    <div class="col-sm-9">
                        <input type="number" name="denda" id="denda" class="form-control" value="0" min="0">
                    </div>
                </div>
                {{-- Pajak --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Pajak</label>
                    <div class="col-sm-9">
                        <div class="form-group form-check">
                            {{-- Checkbox untuk mengaktifkan/menonaktifkan pajak --}}
                            <input type="checkbox" class="form-check-input" id="enable_pajak" {{ isset($vats) && $vats->vat > 0 ? 'checked' : '' }}>
                            {{-- Label pajak yang menampilkan nilai pajak dari backend, jika ada --}}
                            <label class="form-check-label" for="enable_pajak">
                                Terapkan PPN {{ isset($vats) ? ($vats->vat) : 100 }}%
                            </label>
                            {{-- Input tersembunyi untuk menyimpan nilai pajak yang akan dikirim ke backend --}}
                            <input type="hidden" name="pajak" id="pajak_value_hidden" value="{{ isset($vats) ? $vats->vat : 0 }}">
                        </div>
                    </div>
                </div>
                <hr>
                {{-- Total (jumlah subtotal) --}}
                <div class="form-group row">
                    <label for="total" class="col-sm-3 col-form-label">Total</label>
                    <div class="col-sm-9">
                        <input type="text" name="total" id="total" class="form-control" readonly value="0">
                    </div>
                </div>
                {{-- Grand Total --}}
                <div class="form-group row">
                    <label for="grand_total" class="col-sm-3 col-form-label">Grand Total</label>
                    <div class="col-sm-9">
                        <input type="text" name="grandTotal" id="grand_total" class="form-control font-weight-bold" readonly value="0">
                    </div>
                </div>

            </div>
            <input type="button" name="next" class="next action-button" value="Next"/>
            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
        </fieldset>
        {{-- step 3 end --}}

        {{-- step 4 start --}}
        <fieldset>
            <div class="form-card">
                <div class="row">
                    <div class="col-7">
                        <h2 class="fs-title">Finish:</h2>
                    </div>
                    <div class="col-5">
                        <h2 class="steps">Step 4 - 4</h2>
                    </div>
                </div>

                <br><br>
                @include('tagihan.inv')
            </div> {{-- Close form-card here --}}

            {{-- These buttons should be outside form-card to follow the pattern of other fieldsets --}}
            {{-- Buttons MUST be outside the form-card div for consistent styling and behavior --}}

            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
            <button class="action-button" >simpan</button>
        </fieldset>
        {{-- <input type="button" name="submit_form" id="submit_form_button" class="action-button" value="Submit"/> --}}
        {{-- step 4 end --}}


    </form>
</div>

@endsection

@push('js')

    <script>
        $(document).ready(function() {
            // Wizard JS (existing code)
            var current_fs, next_fs, previous_fs;
            var opacity;
            var current = 1;
            var steps = $("fieldset").length;

            setProgressBar(current);

            $(".next").click(function(){
                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                // PENTING: Saat pindah ke step berikutnya, terutama jika itu adalah step invoice,
                // panggil fungsi untuk update preview. Step 4 adalah index 3 (0-indexed)
                if ($("fieldset").index(next_fs) === 3) {
                    updateInvoicePreview();
                }

                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
                next_fs.show();
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({'opacity': opacity});
                    },
                    duration: 500
                });
                setProgressBar(++current);
            });

            $(".previous").click(function(){
                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
                previous_fs.show();
                current_fs.animate({opacity: 0}, {
                    step: function(now) {
                        opacity = 1 - now;
                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({'opacity': opacity});
                    },
                    duration: 500
                });
                setProgressBar(--current);
            });

            function setProgressBar(curStep){
                var percent = parseFloat(100 / steps) * curStep;
                percent = percent.toFixed();
                $(".progress-bar").css("width",percent+"%")
            }

            // --- Logika Dinamis Item dan Perhitungan ---

            // Ambil nilai PPN dari Blade (asumsi 11% fixed jika tidak dari backend)
            const DEFAULT_VAT_RATE = 11;

            // Fungsi untuk menghitung subtotal satu baris item
            function calculateSubtotal(row) {
                const jumlah = parseFloat(row.find('.jumlah-item').val()) || 0;
                const hargaSatuan = parseFloat(row.find('.harga-satuan-item').val()) || 0;
                const subtotal = jumlah * hargaSatuan;
                row.find('.subtotal-item').val(subtotal.toFixed(2)); // Format 2 desimal
                calculateGrandTotal(); // Panggil fungsi hitung total setiap kali subtotal berubah
            }

            // Fungsi untuk menghitung Total, Diskon, Denda, Pajak, dan Grand Total
            function calculateGrandTotal() {
                let totalItems = 0;
                $('.subtotal-item').each(function() {
                    totalItems += parseFloat($(this).val()) || 0;
                });

                $('#total').val(totalItems.toFixed(2)); // Update Total

                let diskonPercent = parseFloat($('#diskon').val()) || 0;
                let dendaAmount = parseFloat($('#denda').val()) || 0;
                let pajakPercent = 0;

                // Cek apakah checkbox pajak dicentang
                if ($('#enable_pajak').is(':checked')) {
                    pajakPercent = DEFAULT_VAT_RATE; // Gunakan nilai PPN default jika dicentang
                }
                // Update nilai hidden input pajak
                $('#pajak_value_hidden').val(pajakPercent);

                let totalAfterDiskon = totalItems * (1 - (diskonPercent / 100));
                let totalAfterPajak = totalAfterDiskon * (1 + (pajakPercent / 100));
                let grandTotal = totalAfterPajak + dendaAmount;

                $('#grand_total').val(grandTotal.toFixed(2)); // Update Grand Total

                // Panggil updateInvoicePreview setelah perhitungan total selesai
                updateInvoicePreview();
            }

            // Tambah Baris Item Baru
            $('#add_item_button').click(function() {
                const newItemRow = `
                    <div class="form-row item-row mb-3 border p-2 rounded">
                        <div class="col-12 text-right">
                            <button type="button" class="btn btn-danger btn-sm remove-item-btn">X</button>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Nama Item</label>
                            <input type="text" name="namaItem[]" class="form-control nama-item" placeholder="Nama Item">
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Jumlah</label>
                            <input type="number" name="jumlah[]" class="form-control jumlah-item" placeholder="Jumlah" min="1" value="1">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Harga Satuan</label>
                            <input type="number" name="hargaSatuan[]" class="form-control harga-satuan-item" placeholder="Harga Satuan" min="0" value="0">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Subtotal</label>
                            <input type="number" name="subtotal[]" class="form-control subtotal-item" placeholder="Subtotal" readonly value="0">
                        </div>
                    </div>
                `;
                $('#item_fields_container').append(newItemRow);
                updateRemoveButtonsVisibility();
                calculateGrandTotal(); // Panggil ini untuk update preview setelah menambah item
            });

            // Hapus Baris Item
            $(document).on('click', '.remove-item-btn', function() {
                $(this).closest('.item-row').remove();
                calculateGrandTotal(); // Recalculate and update preview after removing an item
                updateRemoveButtonsVisibility();
            });

            // Event listener untuk perubahan pada Jumlah atau Harga Satuan
            $(document).on('input', '.jumlah-item, .harga-satuan-item', function() {
                const row = $(this).closest('.item-row');
                calculateSubtotal(row); // Ini akan memanggil calculateGrandTotal, yang memanggil updateInvoicePreview
            });

            // Event listener untuk perubahan pada Diskon atau Denda
            $(document).on('input', '#diskon, #denda', function() {
                calculateGrandTotal(); // Ini akan memanggil updateInvoicePreview
            });

            // Event listener untuk checkbox pajak
            $(document).on('change', '#enable_pajak', function() {
                calculateGrandTotal(); // Ini akan memanggil updateInvoicePreview
            });

            // Fungsi untuk mengontrol visibilitas tombol "X"
            function updateRemoveButtonsVisibility() {
                if ($('.item-row').length > 1) {
                    $('.remove-item-btn').show();
                } else {
                    $('.remove-item-btn').hide();
                }
            }

            // --- FUNGSI UTAMA: Update Preview Invoice ---
            function updateInvoicePreview() {
                // Ambil data dari dropdown pelanggan
                const selectedPelangganOption = $('#pelanggan_select option:selected');
                const namaPelanggan = selectedPelangganOption.data('nama');
                const picPelanggan = selectedPelangganOption.data('pic');
                const tlpPelanggan = selectedPelangganOption.data('telepon');
                const alamatPelanggan = selectedPelangganOption.data('alamat');
                const emailPelanggan = selectedPelangganOption.data('email');

                // Update elemen pelanggan di preview invoice
                $('#preview_pelanggan_nama').text(`Bpk/Ibu. ${namaPelanggan || ''} (${picPelanggan || ''})`);
                // $('#preview_pelanggan_perusahaan').text(''); // Ini tidak ada ID di inv.blade.php
                $('#preview_pelanggan_alamat').text(alamatPelanggan || '');
                $('#preview_pelanggan_email').text(emailPelanggan || '');
                $('#preview_pelanggan_telepon').text(`Telp: ${tlpPelanggan || ''}`);

                // Ambil data dari dropdown vendor
                const selectedVendorOption = $('#vendor_select option:selected');
                const namaVendor = selectedVendorOption.data('nama');
                const alamatVendor = selectedVendorOption.data('alamat');
                const tlpVendor = selectedVendorOption.data('telepon');
                const emailVendor = selectedVendorOption.data('email');


                // Update elemen vendor di preview invoice
                $('#preview_vendor_nama').text(namaVendor || 'Nama Vendor');
                // $('#preview_Vendor_perusahaan').text(''); // Ini tidak ada ID di inv.blade.php
                $('#preview_vendor_alamat').text(alamatVendor || 'Alamat Vendor');
                $('#preview_vendor_telepon').text(`Telepon: ${tlpVendor || ''}`);
                $('#preview_vendor_email').text(`Email: ${emailVendor || ''}`);

                // Ambil data dari form step 1 dan 2 lainnya
                $('#preview_no_tagihan').text($('#no_tagihan').val());
                $('#preview_tanggal_tagihan').text($('#tanggal_tagihan').val());
                $('#preview_due_date_tagihan').text($('#due_date_tagihan').val());
                // Anda mungkin juga ingin menampilkan keterangan di preview
                // $('#preview_keterangan').text($('#keterangan').val());

                // --- MODIFIKASI: Update Detail Item di Preview Invoice ---
                let itemTableHtml = ``;
                let hasItems = false; // Flag untuk mengecek apakah ada item

                $('.item-row').each(function() {
                    const namaItem = $(this).find('.nama-item').val();
                    const jumlah = parseFloat($(this).find('.jumlah-item').val()) || 0;
                    const hargaSatuan = parseFloat($(this).find('.harga-satuan-item').val()) || 0;
                    const subtotal = parseFloat($(this).find('.subtotal-item').val()) || 0;

                    if (namaItem.trim() !== '' && (jumlah > 0 || hargaSatuan > 0)) { // Cek jika nama item tidak kosong dan ada nilai
                        hasItems = true;
                        itemTableHtml += `
                            <tr>
                                <td>${namaItem}</td>
                                <td>${jumlah}</td>
                                <td>Rp ${hargaSatuan.toLocaleString('id-ID', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                                <td>Rp ${subtotal.toLocaleString('id-ID', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                            </tr>
                        `;
                    }
                });

                // Jika tidak ada item, tampilkan pesan "Tidak ada item"
                if (!hasItems) {
                    itemTableHtml = `
                        <tr>
                            <td colspan="4" style="text-align: center; color: #6c757d; padding: 15px;">
                                Tidak ada item yang ditambahkan.
                            </td>
                        </tr>
                    `;
                }
                $('#invoice_item_table_body').html(itemTableHtml);
                // --- AKHIR MODIFIKASI ---

                // Update total, diskon, denda, pajak, dan grand total di preview invoice
                const total = parseFloat($('#total').val()) || 0;
                const diskonPercent = parseFloat($('#diskon').val()) || 0;
                const dendaAmount = parseFloat($('#denda').val()) || 0;
                const pajakPercent = parseFloat($('#pajak_value_hidden').val()) || 0;
                const grandTotal = parseFloat($('#grand_total').val()) || 0;

                let subtotalItemsOnly = 0;
                $('.subtotal-item').each(function() {
                    subtotalItemsOnly += parseFloat($(this).val()) || 0;
                });

                const nilaiDiskon = subtotalItemsOnly * (diskonPercent / 100);
                const nilaiPajak = (subtotalItemsOnly - nilaiDiskon) * (pajakPercent / 100);

                // Pastikan elemen preview total, diskon, denda, pajak, grand total ada di invoice-container (inv.blade.php)
                // Jika Anda tidak memiliki ID untuk elemen ini di inv.blade.php, tambahkan.
                $('#preview_subtotal').text(`Rp ${subtotalItemsOnly.toLocaleString('id-ID', {minimumFractionDigits: 2, maximumFractionDigits: 2})}`);
                $('#preview_diskon').text(`Diskon (${diskonPercent}%): Rp ${nilaiDiskon.toLocaleString('id-ID', {minimumFractionDigits: 2, maximumFractionDigits: 2})}`);
                $('#preview_denda').text(`Denda: Rp ${dendaAmount.toLocaleString('id-ID', {minimumFractionDigits: 2, maximumFractionDigits: 2})}`);
                // Hanya tampilkan pajak jika checkbox diaktifkan atau pajak > 0
                if ($('#enable_pajak').is(':checked') && pajakPercent > 0) {
                    $('#preview_pajak').text(`Pajak (PPN ${pajakPercent}%): Rp ${nilaiPajak.toLocaleString('id-ID', {minimumFractionDigits: 2, maximumFractionDigits: 2})}`).show();
                } else {
                    $('#preview_pajak').text('Pajak: Rp 0.00').hide(); // Sembunyikan jika tidak ada pajak
                }
                $('#preview_grand_total').text(`GRAND TOTAL: Rp ${grandTotal.toLocaleString('id-ID', {minimumFractionDigits: 2, maximumFractionDigits: 2})}`);
            }

            // Inisialisasi awal saat halaman dimuat
            // Perlu dipanggil setelah semua perhitungan awal selesai
            $('.item-row').each(function() {
                calculateSubtotal($(this)); // Ini akan memicu calculateGrandTotal dan updateInvoicePreview
            });
            updateRemoveButtonsVisibility();
            // calculateGrandTotal(); // Ini akan dipanggil dari calculateSubtotal, jadi tidak perlu lagi di sini

            // Panggil fungsi update setiap kali pilihan pelanggan/vendor atau input dasar berubah
            $('#pelanggan_select, #vendor_select, #no_tagihan, #tanggal_tagihan, #due_date_tagihan, #keterangan').on('change input', function() {
                updateInvoicePreview();
            });

            // Perbaikan: Pastikan calculateGrandTotal selalu memicu updateInvoicePreview
            // Saya sudah memindahkan pemanggilan updateInvoicePreview() ke akhir fungsi calculateGrandTotal()
            // sehingga setiap kali total dihitung ulang, preview juga diperbarui.
        });
    </script>




@endpush
