
@extends('master.app.index')

@section('content')

@push('css')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
     <style>
        td.details-control {
            background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
            cursor: pointer;
        }
        tr.shown td.details-control {
            background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;
        }
    </style>
@endpush

@push('js')
    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

@endpush

    {{-- <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('sosmed.index') }}">Sosmed</a></li>
        <li class="breadcrumb-item"><a href="{{ url()->previous() }}">Sosmed Detail</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
    </ol>
    </nav> --}}

    <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
                {{-- <a href="{{ route('subcont.index') }}" class="d-none d-sm-inline-block btn btn-sm btn btn-success shadow-sm">kembali</a> --}}
                <a href="{{ route('tagihan.create' ) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-check fa-sm text-white-50"></i> Create</a>
                        {{-- "{{ route('dashboard.product.gallery.create', $product->id) }}" --}}
            </div>



            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    {{-- <h6 class="m-0 font-weight-bold text-primary">{{ $subcont->namaBarang }} ==>> {{ $subcont->kodeBarang }}  </h6> --}}
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="tbl_tagihan" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="30px"></th> <th>No</th>
                                    <th>tanggalTagihan</th>
                                    <th>noTagihan</th>
                                    <th>namaPelanggan</th>
                                    <th>nama Vendor</th>
                                    <th>dueDateTagihan</th>
                                    <th>totaltagihan</th>
                                    <th>lampiran</th>
                                    <th>keterangan</th>
                                    <th width="100px">Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th width="30px"></th> <th>No</th>
                                    <th>tanggalTagihan</th>
                                    <th>noTagihan</th>
                                    <th>namaPelanggan</th>
                                    <th>nama Vendor</th>
                                    <th>dueDateTagihan</th>
                                    <th>totaltagihan</th>
                                    <th>lampiran</th>
                                    <th>keterangan</th>
                                    <th width="100px">Action</th>


                                </tr>
                            </tfoot>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                    {{-- <a href="{{ route('barang.index') }}" class="btn btn-success">kembali</a> --}}
                </div>
            </div>

        </div>
    <!-- /.container-fluid -->

    @push('js')
        <script type="text/javascript">
           $(document).ready(function () {
            var table = $('#tbl_tagihan').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url()->current() }}',
                columns: [
                    {
                        // Kolom untuk kontrol detail
                        className: 'details-control',
                        orderable: false,
                        data: null, // Data tidak langsung dari server, tapi diisi JS
                        defaultContent: ''
                    },
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false}, // Untuk nomor urut
                    {data: 'tanggalTagihan' , name:'tanggalTagihan'},
                    {data:'noTagihan' , name:'noTagihan'},
                    {data:'pelanggan.namaPelanggan' , name:'pelanggan.namaPelanggan'}, // Pastikan relasi 'pelanggan' dimuat
                    {data:'vendor.namaVendor' , name:'vendor.namaVendor'}, // Pastikan relasi 'vendor' dimuat
                    {data:'dueDateTagihan' , name:'dueDateTagihan'},
                    {data:'totaltagihan' , name:'totaltagihan'},
                    {data:'lampiran' , name:'lampiran'},
                    {data:'keterangan' , name:'keterangan'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                order: [[1, 'asc']] // Urutkan berdasarkan kolom 'No'
            });

            // Event listener untuk membuka dan menutup detail child row
            $('#tbl_tagihan tbody').on('click', 'td.details-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);

                if (row.child.isShown()) {
                    // Jika child row sudah terbuka, tutup
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Jika child row belum terbuka, tampilkan loading sementara
                    row.child('<div class="data-details">Memuat detail...</div>').show();
                    tr.addClass('shown');

                    var rowData = row.data();
                    var tagihanId = rowData.id; // Asumsi ID tagihan ada di `rowData.id`

                    $.ajax({
                        url: `/tagihan/${tagihanId}/details`, // Sesuaikan dengan route detail Anda
                        method: 'GET',
                        success: function(htmlContent) {
                            // Setelah data diterima, masukkan ke child row
                            row.child(htmlContent).show();
                            tr.addClass('shown');
                        },
                        error: function(xhr, status, error) {
                            console.error("Error fetching child row details:", error);
                            row.child('<div class="data-details text-danger">Gagal memuat detail. Silakan coba lagi.</div>').show();
                            tr.addClass('shown');
                        }
                    });
                }
            });
        });
        </script>
    @endpush




@endsection
