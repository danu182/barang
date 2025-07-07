@extends('master.app.index')

@section('content')

@push('css')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endpush

{{-- Main Page Form to be populated --}}
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">{{$title}}</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Mutasi Asset</h6>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('asset-mutasi.store')}}">
                @csrf
                {{-- Hidden input to store selected item ID if needed for form submission --}}
                <input type="hidden" id="selectedBarangId" name="barang_id">
                <input type="hidden" id="selectedBarangId" name="old_location_id">
                <input type="hidden" id="selectedBarangId" name="new_location_id">
                {{-- <input type="hidden" id="selectedBarangId" name="mutation_date"> --}}
                <input type="hidden" id="selectedBarangId" name="mutation_type_id">
                <input type="hidden" id="selectedBarangId" name="kondisi_id">
                <input type="hidden" id="selectedBarangId" name="bagian_id">
                <input type="hidden" id="selectedBarangId" name="notes">
                <input type="hidden" id="selectedBarangId" name="notes">
                <input type="hidden" id="selectedBarangId" name="user_id">

                <div class="mb-3">
                    <label for="namaBarangInput" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="namaBarangInput" name="namaBarang" readonly>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="kodeBarangBaruInput" class="form-label">Kode Barang Baru</label>
                        <p class="form-control-plaintext" id="kodeBarangBaruInput"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="merekInput" class="form-label">Merek</label>
                        <p class="form-control-plaintext" id="merekInput"></p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="modelInput" class="form-label">Model</label>
                        <p class="form-control-plaintext" id="modelInput"></p>
                    </div>
                    <div class="col-md-6">
                        <label for="nomorSeriInput" class="form-label">Nomor Seri</label>
                        <p class="form-control-plaintext" id="nomorSeriInput"></p>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="prosesorInput" class="form-label">Prosesor</label>
                    <p class="form-control-plaintext" id="prosesorInput"></p>
                </div>

                <div class="mb-3">
                    <label for="tipeRamInput" class="form-label">Tipe RAM</label>
                    <p class="form-control-plaintext" id="tipeRamInput"></p>
                </div>

                <div class="mb-3">
                    <label for="harddiskInput" class="form-label">Hard Disk</label>
                    <p class="form-control-plaintext" id="harddiskInput"></p>
                </div>

                <div class="mb-3">
                    <label for="hargaPerolehanInput" class="form-label">Harga Perolehan</label>
                    <input type="text" class="form-control" id="hargaPerolehanInput" name="hargaPerolehan" readonly>
                </div>

                <div class="mb-3">
                    <label for="tanggalPerolehanInput" class="form-label">Tanggal Perolehan</label>
                    <p class="form-control-plaintext" id="tanggalPerolehanInput"></p>
                </div>
                <div class="mb-3">
                    <label for="vendorInput" class="form-label">Vendor</label>
                    <p class="form-control-plaintext" id="vendorInput"></p>
                </div>
                <div class="mb-3">
                    <label for="catatanInput" class="form-label">Catatan</label>
                    <p class="form-control-plaintext" id="catatanInput"></p>
                </div>

                <div class="form-group">
                    <label for="catatanInput" class="form-label">Lokasi baru</label>
                    <select name="new_location_id" id="" class="form-control">
                        @foreach ($lokasi as $lok)
                            <option value="{{ $lok->id }}"> {{ $lok->namaLokasi }} lantai {{ $lok->lantai }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="catatanInput" class="form-label">tanggal mutasi</label>
                    <input type="date" name="mutation_date" class="form-control" value="{{ date('Y-m-d')  }}">
                </div>

                <div class="form-group">
                    <label for="catatanInput" class="form-label">kondisi</label>
                    <select name="kondisi_id" id="" class="form-control">
                        <option disabled>pilih salah satu</option>
                        @foreach ($kondisi as $kon)
                            <option value="{{ $kon->id }}">{{ $kon->namaKondisi }} - {{ $kon->keteranganKondisi }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="catatanInput" class="form-label">bagian baru</label>
                    <select name="bagian_id" id="" class="form-control">
                        <option disabled>pilih salah satu</option>
                        @foreach ($bagian as $bag)
                            <option value="{{ $bag->id }}">{{ $bag->nama_bagian }} - {{ $bag->keteranganBagian }} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="catatanInput" class="form-label">nama baru</label>
                    <select name="user_id" id="" class="form-control">
                        <option disabled>pilih salah satu</option>
                        @foreach ($user as $usr)
                            <option value="{{ $usr->id }}">{{ $usr->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="catatanInput" class="form-label">Tipe mutasi</label>
                    <select name="mutation_type_id" id="" class="form-control">
                        <option disabled>pilih salah satu</option>
                        @foreach ($tipeMutasi as $tm)
                            <option value="{{ $tm->id }}">{{ $tm->namaMutasi }} - {{ $tm->keteranganMutasi }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="catatanInput" class="form-label">notes</label>
                    <textarea name="notes" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>




                {{-- Button to open the modal for searching barang --}}
                <div class="input-group mb-3 mt-4">
                    <input type="text" class="form-control" placeholder="Cari Barang..." aria-label="barang" aria-describedby="button-addon2" id="searchBarangModalTrigger" readonly>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#searchBarangModal">Cari Barang</button>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit Mutasi</button>
            </form>
        </div>
    </div>


                {{-- New section for Asset Mutation History Table --}}
                <h5 class="mt-4 mb-3">Riwayat Mutasi Asset</h5>
                <div class="table-responsive">
                    {{-- Changed ID here to match JS variable name --}}
                    <table class="table table-bordered" id="assetMutasiHistoryTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>mutation_date</th>
                                <th>mutation_type_nama</th>
                                <th>old_location_display</th>
                                <th>new_location_display</th>
                                <th>kondisi_nama</th>
                                <th>bagian_nama</th>
                                <th>user_name</th>
                                <th>notes</th>
                            </tr>
                        </thead>
                        <tbody id="assetMutasiTableBody">
                            {{-- Rows will be dynamically added here by JavaScript --}}
                        </tbody>
                    </table>
                </div>


</div>

{{-- Modal for Barang Selection --}}
<div class="modal fade" id="searchBarangModal" tabindex="-1" aria-labelledby="searchBarangModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchBarangModalLabel">Pilih Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="barangDataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Pilih</th>
                                <th>Prosesor</th>
                                <th>Kapasitas Prosesor</th>
                                <th>RAM</th>
                                <th>Hard Disk</th>
                                <th>Kategori</th>
                                <th>Kode Barang Lama</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Merek</th>
                                <th>Model</th>
                                <th>Nomor Seri</th>
                                <th>Tanggal Perolehan</th>
                                <th>Harga Perolehan</th>
                                <th>Vendor</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $item)
                                <tr>
                                    <td>
                                        <button class="btn btn-sm btn-info select-item-btn"
                                        data-item-id="{{ $item['id'] }}">
                                            Pilih
                                        </button>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($item->prosesor as $proces)
                                                <li>{{ optional($proces->tipeProsesor)->namaTipeProsesor }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($item->prosesor as $proces)
                                                <li>{{ $proces->kapasitas }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($item->ram as $rams)
                                                <li>{{ optional($rams->tipeRam)->tipeRam }} : {{ $rams->kapasitas }}GB</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <ul>
                                            @foreach ($item->hd as $hds)
                                                <li>{{ optional($hds->tipeHardDisk)->namaTipeHardDisk }} : {{ $hds->kapasitas }}TB</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ optional($item->kategori)->namaKategori }}</td>
                                    <td>{{ $item->kodeBaranglama }}</td>
                                    <td>{{ $item->kodeBarang }}</td>
                                    <td>{{ $item->namaBarang }}</td>
                                    <td>{{ $item->merek }}</td>
                                    <td>{{ $item->model }}</td>
                                    <td>{{ $item->nomorSeri }}</td>
                                    <td>{{ $item->tanggalPerolehan }}</td>
                                    <td>{{ $item->hargaPerolehan }}</td>
                                    <td>{{ $item->vendor }}</td>
                                    <td>{{ $item->catatan }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTables for the modal table
            $('#barangDataTable').DataTable();

            // Declare assetMutasiHistoryDataTable in a scope accessible by the success callback
            // let assetMutasiHistoryDataTable;
             // Declare assetMutasiHistoryDataTable in a scope accessible by the success callback
            let assetMutasiHistoryDataTable = null; // Initialize as null

            $('#barangDataTable').on('click', '.select-item-btn', function() {
                var barangId = $(this).data('item-id');

                $.ajax({
                    url: '/get-barang-details/' + barangId,
                    method: 'GET',
                    success: function(response) {
                        var item = response.barang;
                        // var assetMutations = response.assetMutasi; // Correctly named (plural)
                        //  var assetMutations = response.assetMutasi ? [response.assetMutasi] : [];
                         var assetMutations = response.assetMutasi ;

                        console.log("Full AJAX response:", response); // For debugging
                        console.log("Barang data received:", item);
                        console.log(assetMutations);


                        // --- Populate Main Barang Details ---
                        $('#selectedBarangId').val(item.id);
                        $('#namaBarangInput').val(item.namaBarang);
                        $('#searchBarangModalTrigger').val(item.namaBarang);

                        $('#kodeBarangBaruInput').text(item.kodeBarang);
                        $('#merekInput').text(item.merek);
                        $('#modelInput').text(item.model);
                        $('#nomorSeriInput').text(item.nomorSeri);

                        let prosesorDetails = item.prosesor.map(p => {
                            let tipe = (p.tipe_prosesor && p.tipe_prosesor.namaTipeProsesor) ? p.tipe_prosesor.namaTipeProsesor : 'N/A Tipe';
                            let kapasitas = p.kapasitas ? p.kapasitas : 'N/A Kapasitas';
                            return `${tipe} (${kapasitas})`;
                        }).join(', ');
                        $('#prosesorInput').text(prosesorDetails || 'N/A');

                        let tipeRamDetails = item.ram.map(r => {
                            let tipe = (r.tipe_ram && r.tipe_ram.tipeRam) ? r.tipe_ram.tipeRam : 'N/A Tipe';
                            let kapasitas = r.kapasitas ? r.kapasitas : 'N/A Kapasitas';
                            return `${tipe} : ${kapasitas}GB`;
                        }).join(', ');
                        $('#tipeRamInput').text(tipeRamDetails || 'N/A');

                        let harddiskDetails = item.hd.map(h => {
                            let tipe = (h.tipe_hard_disk && h.tipe_hard_disk.namaTipeHardDisk) ? h.tipe_hard_disk.namaTipeHardDisk : 'N/A Tipe';
                            let kapasitas = h.kapasitas ? h.kapasitas : 'N/A Kapasitas';
                            return `${tipe} : ${kapasitas}TB`;
                        }).join(', ');
                        $('#harddiskInput').text(harddiskDetails || 'N/A');

                        let harga = parseFloat(item.hargaPerolehan);
                        if (!isNaN(harga)) {
                            $('#hargaPerolehanInput').val(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(harga));
                        } else {
                            $('#hargaPerolehanInput').val(item.hargaPerolehan);
                        }

                        $('#tanggalPerolehanInput').text(item.tanggalPerolehan);
                        $('#vendorInput').text(item.vendor);
                        $('#catatanInput').text(item.catatan);


                         // --- Populate Asset Mutation History Table ---
                        // Check if DataTable instance exists, destroy if it does to re-initialize cleanly
                        if (assetMutations.length > 0) {
                            // Clear previous data
                            $('#assetMutasiTableBody').empty();
                            // Populate the table with new data
                            assetMutations.forEach(mutasi => {
                                $('#assetMutasiTableBody').append(`
                                    <tr>
                                        <td>${mutasi.mutation_date}</td>
                                        <td>${mutasi.mutation_type ? mutasi.mutation_type.namaMutasi : 'N/A'}</td>
                                        <td>${mutasi.lokasi_old ? mutasi.lokasi_old.namaLokasi + ' lantai ' + mutasi.lokasi_old.lantai : 'N/A'}</td>
                                        <td>${mutasi.lokasi_new ? mutasi.lokasi_new.namaLokasi + ' lantai ' + mutasi.lokasi_new.lantai : 'N/A'}</td>
                                        <td>${mutasi.kondisi ? mutasi.kondisi.namaKondisi : 'N/A'}</td>
                                        <td>${mutasi.bagian ? mutasi.bagian.nama_bagian : 'N/A'}</td>
                                        <td>${mutasi.user ? mutasi.user.name : 'N/A'}</td>
                                        <td>${mutasi.notes || 'N/A'}</td>
                                    </tr>
                                `);
                            });
                        } else {
                            $('#assetMutasiTableBody').append('<tr><td colspan="8">No mutation history available.</td></tr>');
                        }
                        // Hide the modal after selecting an item
                        $('#searchBarangModal').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error fetching details: ", status, error);
                        alert('Gagal memuat detail. Silakan coba lagi.');
                    }
                });
            });
        });
    </script>
@endpush
