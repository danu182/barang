@extends('master.app.index')

@section('content')

@push('css')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/showTagihan.css') }}">
@endpush

@push('js')

@endpush


    <div class="container">
        <div class="invoice-container">
            <!-- Header Invoice -->
            <div class="invoice-header">
                <div class="row">
                    <div class="col-md-6">
                        <div class="logo-container mb-3">
                            <img src="https://via.placeholder.com/180x60?text=Company+Logo" alt="Company Logo" class="img-fluid">
                        </div>
                        <h5 class="mb-1">{{ $tagihan->vendor->namaVendor }}</h5>
                        <p class="mb-1"><small class="text-muted">{{ $tagihan->vendor->alamatVendor }}</small></p>
                        <p class="mb-1"><small class="text-muted">{{ $tagihan->vendor->tlpVendor }}</small></p>
                        <p class="mb-0"><small class="text-muted">Email: {{ $tagihan->vendor->emailVendor }}</small></p>
                    </div>
                    <div class="col-md-6 text-right">
                        <h1 class="invoice-title">INVOICE</h1>
                        <p class="invoice-number mb-1">{{ $tagihan->noTagihan}}</p>
                        <p class="mb-1"><small class="text-muted">Tanggal: {{ $tagihan->tanggalTagihan }}</small></p>
                        <p class="mb-0 due-date"><small>Jatuh Tempo: {{ $tagihan->dueDateTagihan }}</small></p>
                        <div class="mt-3">
                            <span class="status-badge status-unpaid"><i class="fas fa-exclamation-circle mr-1"></i> {{ $tagihan->statusTagihan->namaStatusTagihan }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Klien -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="client-info">
                        <h5 class="mb-3">Tagihan Untuk:</h5>
                        <h6 class="mb-1">{{ $tagihan->upTagihan }}</h6>
                        <p class="mb-1">{{ $tagihan->picUser }} </p>
                        <p class="mb-1">{{ $tagihan->picAlamat }}</p>
                        <p class="mb-1">Telp: {{ $tagihan->picTlp }}</p>
                        <p class="mb-0">Email: {{ $tagihan->picEmail }}</p>
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

@endsection
