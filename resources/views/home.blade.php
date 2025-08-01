@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar User</div>

                <div class="card-body">
                    <a href="#" class="btn btn-sm btn-success mb-2">Tambah Data</a>
                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>vendor_id</th>
                            <th>pelanggan_id</th>
                            <th>noTagihan</th>
                            <th>tanggalTagihan</th>
                            <th>dueDateTagihan</th>
                            <th>periodeTagihan</th>
                            <th>totaltagihan</th>
                            <th>statusTagihan_id</th>
                            {{-- <th>keterangan</th> --}}
                            {{-- <th>lampiran</th> --}}

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
    $('#tbl_list').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url()->current() }}',
            columns: [
                { data: 'vendor_id', name:'vendor_id'},
                { data: 'pelanggan.namaPelanggan', name:'pelanggan_id'}, //name = di isi th (tabel header nya)
                //data di di isi dengan nama relasi dana nama field di data base jika ada relasi jika tidak ada maka hanya nama field nya saja
                { data: 'noTagihan', name:'noTagihan'},
                { data: 'tanggalTagihan', name:'tanggalTagihan'},
                { data: 'dueDateTagihan', name:'dueDateTagihan'},
                { data: 'periodeTagihan', name:'periodeTagihan'},
                { data: 'totaltagihan', name:'totaltagihan'},
                { data: 'statusTagihan_id', name:'statusTagihan_id'},
                // { data: 'keterangan', name:'keterangan'},
                // { data: 'lampiran', name:'lampiran'},

            ]
        });
    });
</script>
@endpush
