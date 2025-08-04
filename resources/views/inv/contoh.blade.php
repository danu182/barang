<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pembayaran</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background-color: #f8f9fa; /* Warna latar belakang yang lebih terang */
            color: #343a40; /* Warna teks gelap */
            line-height: 1.6;
        }
        .invoice-container {
            max-width: 850px;
            margin: auto;
            background: #ffffff;
            padding: 40px;
            border: 1px solid #e9ecef; /* Border yang lebih lembut */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Bayangan yang lebih menonjol */
            border-radius: 8px; /* Sudut membulat */
        }
        .header {
            text-align: center;
            margin-bottom: 35px;
            border-bottom: 2px solid #007bff; /* Garis bawah biru untuk header */
            padding-bottom: 15px;
        }
        .header h1 {
            color: #007bff; /* Warna biru untuk judul utama */
            margin: 0;
            font-size: 2.5em;
            letter-spacing: 1px;
        }
        .header p {
            margin: 5px 0;
            font-size: 0.95em;
            color: #6c757d;
        }
        .details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            flex-wrap: wrap;
            gap: 20px; /* Jarak antar kolom */
        }
        .details div {
            flex: 1;
            min-width: 280px;
        }
        .details p {
            margin: 6px 0;
        }
        .details strong {
            color: #343a40;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 35px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05); /* Bayangan pada tabel */
            border-radius: 5px;
            overflow: hidden; /* Penting untuk border-radius pada tabel */
        }
        table th, table td {
            border: 1px solid #dee2e6; /* Warna border tabel */
            padding: 15px;
            text-align: left;
        }
        table th {
            background-color: #007bff; /* Header tabel biru */
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9em;
        }
        table tbody tr:nth-child(even) {
            background-color: #f2f7fc; /* Warna baris genap */
        }
        table tbody tr:hover {
            background-color: #e2f0ff; /* Efek hover pada baris */
        }
        .total-section {
            text-align: right;
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px dashed #ced4da; /* Garis putus-putus */
        }
        .total-section p {
            margin: 8px 0;
            font-size: 1.15em;
            color: #495057;
        }
        .total-section .grand-total {
            font-size: 1.8em;
            font-weight: bold;
            color: #dc3545; /* Warna merah untuk grand total */
            margin-top: 15px;
            padding-top: 10px;
            border-top: 2px solid #dc3545;
        }
        .footer {
            text-align: center;
            margin-top: 45px;
            font-size: 0.9em;
            color: #6c757d;
            border-top: 1px solid #e9ecef;
            padding-top: 20px;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="header">
            <h1>INVOICE PEMBAYARAN</h1>
            <p>{{ $tagihans->vendor->namaVendor }}</p>
            <p>{{ $tagihans->vendor->alamatVendor }}</p>
            <p>Telepon: {{ $tagihans->vendor->tlpVendor }} | Email: {{ $tagihans->vendor->emailVendor }}</p>
        </div>

        <div class="details">
            <div>
                <p><strong>Invoice No:</strong> {{ $tagihans->noTagihan }}</p>
                <p><strong>Tanggal Invoice:</strong> {{ $tagihans->tglTagihan }}</p>
                <p><strong>Jatuh Tempo:</strong> {{ $tagihans->dueDateTagihan }}</p>
                <p><strong>Metode Pembayaran:</strong> Transfer Bank</p>
            </div>
            <div>
                <p><strong>Untuk:</strong></p>
                <p>Bapak/Ibu. {{ $tagihans->pelanggan->picPelanggan }}</p>
                <p>Perusahaan: {{ $tagihans->pelanggan->namaPelanggan }}</p>
                <p>{{ $tagihans->pelanggan->alamatPelanggan }}</p>
                {{-- <p>Surabaya, 60293</p> --}}
                <p>Email: {{ $tagihans->pelanggan->emailPelanggan }}</p>
                <p>Telepon: {{ $tagihans->pelanggan->tLpPelanggan }}</p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Deskripsi Layanan</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan (Rp)</th>
                    <th>Total (Rp)</th>
                </tr>
            </thead>
            <tbody>
                {{-- @if (isset($tagihans) && $tagihans->detail_tagihan->isNotEmpty()) --}}
                @foreach ($tagihans->detailTagihan as $item)
                    <tr>
                        <td>{{ $item->namaItem }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->hargaSatuan }}</td>
                        <td>{{ $item->subtotal }}</td>
                    </tr>
                @endforeach
                {{-- @else
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada detail tagihan.</td>
                    </tr>
                @endif --}}

            </tbody>
        </table>

        <div class="total-section">
            <p>Subtotal: Rp {{ $totalSubtotal }}</p>
            <p>Diskon Khusus : Rp {{ $tagihans->diskon }}</p>
            <p>Pajak Pertambahan Nilai (PPN 11%): Rp {{ $tagihans->vat }}</p>
            <p class="grand-total">TOTAL DIBAYAR: Rp {{ $tagihans->totaltagihan }}</p>
        </div>

        <div class="footer">
            <p>Terima kasih atas bisnis Anda. Kami menantikan kerja sama di masa depan.</p>
            <p>Untuk pembayaran, mohon transfer ke:</p>
            <p><strong>BANK MANDIRI</strong> - No. Rek: 123-456-789-0 (a.n. PT. Inovasi Digital Jaya)</p>
            <p>Mohon sertakan nomor invoice pada keterangan transfer.</p>
        </div>
    </div>
</body>
</html>
