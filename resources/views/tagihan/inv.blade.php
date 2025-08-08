@push('css')
    <link rel="stylesheet" href="{{ asset('css/inv/inv.css') }}">
@endpush

<div class="invoice-container">

        <div class="header">
            <div>
                <h1>INVOICE</h1>
                </div>
            <div class="address-block right">
                <p id="preview_vendor_nama"><strong>Your Company Name</strong></p>
                <p id="preview_vendor_alamat">Your Company Address Line 1</p>
                {{-- <p>Your Company Address Line 2</p> --}}
                <p id="preview_vendor_telepon">Your Company Phone</p>
                <p id="preview_vendor_email">Your Company Email</p>
            </div>
        </div>

        <div class="invoice-details">
            <div>
                <p><strong>Bill To:</strong></p>
                <p id="preview_pelanggan_nama">Client Name</p>
                <p id="preview_pelanggan_alamat">Client Address Line 1</p>
                {{-- <p>Client Address Line 2</p> --}}
                <p id="preview_pelanggan_telepon">Client Phone</p>
                <p id="preview_pelanggan_email">Client Email</p>
            </div>
            <div class="right">
                <p>Invoice #: <strong id="preview_no_tagihan"></strong></p>
                <p>Invoice Date: <strong id="preview_tanggal_tagihan"></strong></p>
                <p>Due Date: <strong id="preview_due_date_tagihan"></strong> </p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Deskripsi Layanan</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody id="invoice_item_table_body">
                {{-- Item akan ditambahkan di sini oleh JavaScript --}}
                <tr>
                    <td colspan="4" style="text-align: center;">Tidak ada item yang ditambahkan.</td>
                </tr>
            </tbody>
        </table>


        <div class="total-section">
            <p>Subtotal: <span id="preview_subtotal">Rp 0.00</span></p>
            <p id="preview_diskon">Diskon (0%): Rp 0.00</p>
            <p id="preview_denda">Denda: Rp 0.00</p>
            <p id="preview_pajak">Pajak (PPN 0%): Rp 0.00</p>
            <p class="grand-total-preview">TOTAL DIBAYAR: <span id="preview_grand_total">Rp 0.00</span></p>
        </div>

        <div class="footer">
            <p>Thank you for your business!</p>
            <p>Payment due within 14 days. Please make checks payable to Your Company Name.</p>
        </div>



</div>

