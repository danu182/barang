<div class="data-details">
    <h5>Nomor Tagihan: {{ $tagihan->noTagihan }}</h5>
    <p><strong>Tanggal Tagihan:</strong> {{ $tagihan->tanggalTagihan }}</p>
    <p><strong>Due Date:</strong> <span class="badge badge-info">{{ $tagihan->dueDateTagihan }}</span></p>
    <p><strong>Pelanggan:</strong> {{ $tagihan->pelanggan->namaPelanggan ?? 'N/A' }}</p>
    <p><strong>Vendor:</strong> {{ $tagihan->vendor->namaVendor ?? 'N/A' }}</p>
    <p><strong>Total Tagihan:</strong> {{ number_format($tagihan->totaltagihan, 2, ',', '.') }}</p>
    <p><strong>Keterangan:</strong> {{ $tagihan->keterangan }}</p>

    {{-- Contoh jika ada detail item tagihan (relasi TagihanDetail) --}}
    @if($tagihan->detailTagihan && $tagihan->detailTagihan->count() > 0)
        <h6>Item Tagihan:</h6>
        <table class="table thead-light  table-sm table-striped mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>namaItem</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

                @forelse($tagihan->detailTagihan as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item->namaItem }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ number_format($item->hargaSatuan, 2, ',', '.') }}</td>
                        <td>{{ number_format($item->jumlah * $item->hargaSatuan, 2, ',', '.') }}</td>
                    </tr>

                @empty
                    <div class="data-details text-danger">Data tidak tersedia</div>
                @endforelse

            </tbody>
        </table>
    @else
        <p class="text-info">Tidak ada detail item untuk tagihan ini.</p>
    @endif

</div>
