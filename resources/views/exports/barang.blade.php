<table>
    <thead>
    <tr>
            <th>kategori_id</th>
                <th>pelanggan_id</th>
                <th>kodeBaranglama</th>
                <th>kodeBarangAkuntansi</th>
                <th>kodeBarang</th>
                <th>kodeBarangUse</th>
                <th>namaBarang</th>
                <th>merek</th>
                <th>model</th>
                <th>nomorSeri</th>
                <th>tanggalPerolehan</th>
                <th>hargaPerolehan</th>
                <th>vendor</th>
                <th>catatan</th>
    </tr>
    </thead>
    <tbody>
    @foreach($barang as $brg)
        <tr>


                <td width="auto">{{ $brg->id }}</td>
                <td width="auto">{{ $brg->kategori_id }}</td>
                <td width="auto">{{ $brg->pelanggan_id }}</td>
                <td width="auto">{{ $brg->pelanggan->namaPelanggan }}</td>
                <td width="auto">{{ $brg->kodeBaranglama }}</td>
                <td width="auto">{{ $brg->kodeBarangAkuntansi }}</td>
                <td width="auto">{{ $brg->kodeBarang }}</td>
                <td width="auto">{{ $brg->kodeBarangUse }}</td>
                <td width="auto">{{ $brg->namaBarang }}</td>
                <td width="auto">{{ $brg->merek }}</td>
                <td width="auto">{{ $brg->model }}</td>
                <td width="auto">{{ $brg->nomorSeri }}</td>
                <td width="auto">{{ $brg->tanggalPerolehan }}</td>
                <td width="auto">{{ $brg->hargaPerolehan }}</td>
                <td width="auto">{{ $brg->vendor }}</td>
                <td width="auto">{{ $brg->catatan }}</td>
                <td width="auto">{{ $brg->created_at }}</td>


        </tr>
    @endforeach
    </tbody>
</table>
