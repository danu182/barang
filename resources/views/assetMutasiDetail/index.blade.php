@extends('master.app.index')

@section('content')

@push('css')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <style>
        .details-row {
            padding: 10px;
            background-color: #f9f9f9;
            border-left: 4px solid #5bc0de;
        }
        .details-table {
            width: 100%;
        }
        .details-table th {
            width: 30%;
            font-weight: 600;
        }
        .expand-icon {
            cursor: pointer;
            transition: transform 0.3s;
        }
        .expand-icon.expanded {
            transform: rotate(180deg);
        }
    </style>
@endpush

<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
        <a href="{{route('barang.create')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-check fa-sm text-white-50"></i> Create</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables {{ $title }}</h6>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card-body">
            <div class="table-responsive">
                <h2 class="mb-4">Mutation Records</h2>
                <table id="mutationTable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Mutation ID</th> {{-- Changed to Mutation ID --}}
                            <th>Asset Name / Code</th> {{-- Changed for clarity --}}
                            <th>Mutation Date</th>
                            <th>Condition</th>
                            <th>Section</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@push('js')
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    <script>
        // Function to format the child row details
        function formatDetails(d) {
            // `d` now contains the specific asset_mutation object, and the parent_barang object
            const mutation = d.mutation;
            const barang = d.barang;

            return `
                <div class="details-row">
                    <table class="details-table">
                        <tr>
                            <th>Asset Name:</th>
                            <td>${barang.namaBarang || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Asset Code:</th>
                            <td>${barang.kodeBarang || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Brand:</th>
                            <td>${barang.merek || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Model:</th>
                            <td>${barang.model || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Serial Number:</th>
                            <td>${barang.nomorSeri || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Acquisition Date:</th>
                            <td>${new Date(barang.tanggalPerolehan).toLocaleDateString() || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Acquisition Price:</th>
                            <td>${barang.hargaPerolehan ? new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(barang.hargaPerolehan) : 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Vendor:</th>
                            <td>${barang.vendor || 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Mutation Type:</th>
                            <td>${mutation.mutation_type ? mutation.mutation_type.namaMutasi : 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Mutated By:</th>
                            <td>${mutation.user ? mutation.user.name : 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Old Location:</th>
                            <td>${mutation.lokasi_old ? mutation.lokasi_old.namaLokasi : 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>New Location:</th>
                            <td>${mutation.lokasi_new ? mutation.lokasi_new.namaLokasi : 'N/A'}</td>
                        </tr>
                        <tr>
                            <th>Notes:</th>
                            <td>${mutation.notes || 'N/A'}</td>
                        </tr>
                    </table>
                </div>
            `;
        }

        $(document).ready(function() {
            const table = $('#mutationTable').DataTable({
                ajax: {
                    url: '{{ route("detail.mutasi.asset") }}',
                    dataSrc: function (json) {
                        let data = [];
                        // Iterate through each barang (asset)
                        json.forEach(barang => {
                            // For each barang, iterate through its asset_mutasi (mutations)
                            barang.asset_mutasi.forEach(mutation => {
                                // Create a new object for each row that includes both mutation and parent barang data
                                data.push({
                                    mutation: mutation,
                                    barang: barang // Include the parent barang data
                                });
                            });
                        });
                        return data;
                    }
                },
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        data: null,
                        defaultContent: '<i class="fas fa-plus-circle expand-icon"></i>'
                    },
                    { data: 'mutation.id' }, // Accessing mutation ID
                    {
                        data: null, // Custom rendering for asset name/code
                        render: function(data) {
                            return data.barang ? `${data.barang.namaBarang} (${data.barang.kodeBarang})` : 'N/A';
                        }
                    },
                    {
                        data: 'mutation.mutation_date',
                        render: function(data) {
                            return new Date(data).toLocaleDateString('en-GB'); // Format for DD/MM/YYYY
                        }
                    },
                    {
                        data: 'mutation.kondisi.namaKondisi', // Corrected: Access 'kondisi.namaKondisi'
                        render: function(data) {
                            return data || 'N/A';
                        }
                    },
                    {
                        data: 'mutation.bagian.nama_bagian', // Corrected: Access 'bagian.nama_bagian'
                        render: function(data) {
                            return data || 'N/A';
                        }
                    },
                    {
                        data: null,
                        render: function(data) {
                            // You can use mutation.id or barang.id here for actions
                            return `
                                <button class="btn btn-sm btn-info me-1">View</button>
                                <button class="btn btn-sm btn-warning">Edit</button>
                            `;
                        }
                    }
                ],
                order: [[1, 'desc']] // Order by Mutation ID
            });

            // Add event listener for opening and closing details
            $('#mutationTable tbody').on('click', 'td.dt-control', function() {
                const tr = $(this).closest('tr');
                const row = table.row(tr);
                const icon = $(this).find('i');

                if (row.child.isShown()) {
                    row.child.hide();
                    icon.removeClass('expanded');
                } else {
                    row.child(formatDetails(row.data())).show();
                    icon.addClass('expanded');
                }
            });
        });
    </script>
@endpush

@endsection
