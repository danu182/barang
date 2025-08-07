@extends('master.app.index')

@section('content')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/wizard/wizard.css') }}">
@endpush

@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> {{-- Pastikan jQuery dimuat --}}
    {{-- <script src="{{ asset('js/wizard/wizard.js') }}"></script> --}} {{-- Ini akan kita buat nanti --}}
@endpush


<div class="container-fluid">
    <form id="msform">
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
                        @foreach ($vendor as $item)
                            <option value="{{ $item->id }}">{{ $item->namaVendor }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- pelanggan_id --}}
                <div class="form-group">
                    <label for="pelanggan_select">pilih nama pelanggan_id</label>
                    <select class="form-control" name="pelanggan_id" id="pelanggan_select">
                        @foreach ($pelanggan as $item)
                            <option value="{{ $item->id }}">{{ $item->namaPelanggan }}</option>
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
                    <input type="file" name="lampiran" id="lampiran" class="form-control-file">
                </div>
            </div>
            <input type="button" name="next" class="next action-button" value="Next"/>
            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
        </fieldset>
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
                                Terapkan PPN {{ isset($vats) ? ($vats->vat  ) : 100 }}%
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
            <input type="button" name="next" class="next action-button" value="Submit"/>
            <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
        </fieldset>
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
                <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                <br>
                <div class="row justify-content-center">
                    <div class="col-3">
                        <img src="https://i.imgur.com/GwStPmg.png" class="fit-image">
                    </div>
                </div>
                <br><br>
                <div class="row justify-content-center">
                    <div class="col-7 text-center">
                        <h5 class="purple-text text-center">You Have Successfully Signed Up</h5>
                    </div>
                </div>
            </div>
        </fieldset>
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
                $(".progress-bar")
                    .css("width",percent+"%")
            }

            // --- Logika Dinamis Item dan Perhitungan ---

            // Ambil nilai PPN dari Blade (pastikan $vats->vat tersedia)
            const DEFAULT_VAT_RATE = {{ isset($vats) ? ($vats->vat * 100) : 0 }}; // Misal 11 untuk 11%

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
                let totalAfterPajak = totalAfterDiskon * (1 + (pajakPercent / 100)); // Menggunakan pajakPercent
                let grandTotal = totalAfterPajak + dendaAmount;

                $('#grand_total').val(grandTotal.toFixed(2)); // Update Grand Total
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
            });

            // Hapus Baris Item
            $(document).on('click', '.remove-item-btn', function() {
                $(this).closest('.item-row').remove();
                calculateGrandTotal(); // Recalculate after removing an item
                updateRemoveButtonsVisibility();
            });

            // Event listener untuk perubahan pada Jumlah atau Harga Satuan
            $(document).on('input', '.jumlah-item, .harga-satuan-item', function() {
                const row = $(this).closest('.item-row');
                calculateSubtotal(row);
            });

            // Event listener untuk perubahan pada Diskon atau Denda
            $(document).on('input', '#diskon, #denda', function() {
                calculateGrandTotal();
            });

            // --- NEW: Event listener untuk checkbox pajak ---
            $(document).on('change', '#enable_pajak', function() {
                calculateGrandTotal(); // Panggil ulang perhitungan total ketika checkbox berubah
            });


            // Fungsi untuk mengontrol visibilitas tombol "X"
            function updateRemoveButtonsVisibility() {
                if ($('.item-row').length > 1) {
                    $('.remove-item-btn').show();
                } else {
                    $('.remove-item-btn').hide();
                }
            }

            // Inisialisasi awal saat halaman dimuat (pastikan subtotal dan total dihitung)
            $('.item-row').each(function() {
                calculateSubtotal($(this));
            });
            updateRemoveButtonsVisibility();
            calculateGrandTotal(); // Hitung grand total awal berdasarkan status checkbox default

        });
    </script>
@endpush
