@extends('admin.master')

@section('title')
Kelulusan Siswa
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelulusan Calon Siswa</h1>
        <button data-toggle="modal" data-target="#tambahModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Baru</button>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Kelulusan Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. Pendaftaran</th>
                            <th>Nama Siswa</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No. Pendaftaran</th>
                            <th>Nama Siswa</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $key)
                        @if($key->status == 1)
                        <tr>
                            <td>{{ $key->calonsiswa->nodaftar }}</td>
                            <td>{{ $key->calonsiswa->nama }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button href="#" data-toggle="modal" data-target="#statusModal" data-id="{{ $key->id }}" data-nodaftar="{{ $key->calonsiswa->nodaftar }}" data-nama="{{ $key->calonsiswa->nama }}" data-calonid="{{ $key->calon_id }}" class="btn btn-warning mx-1">Batalkan</button>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Status Modal -->
<div class="modal fade" id="statusModal" tabindex="-1" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="statusModalLabel">Ubah status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.psb.kelulusan.tolak') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="calon_id" id="calon-id" value="">
                    <input type="hidden" name="id" id="id" value="">
                    <span>Siswa berikut akan ditetapkan sebagai tidak diterima.</span>
                    <div class="form-group">
                        <label for="nama-siswa" class="col-form-label">Nama Siswa:</label>
                        <input type="text" class="form-control" id="nama-siswa" disabled>
                    </div>
                    <div class="form-group">
                        <label for="no-daftar" class="col-form-label">Nomor Pendaftaran:</label>
                        <input type="text" class="form-control" id="no-daftar" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tambah Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Siswa Untuk Diluluskan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive p-3">
                    <table class="table table-bordered" id="dataTambah" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kelompok Calon - </th>
                                <th>No. Pendaftaran</th>
                                <th>Nama Siswa</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Kelompok Calon</th>
                                <th>No. Pendaftaran</th>
                                <th>Nama Siswa</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($datacalon as $keycalon)
                            <tr>
                                <td>{{ $keycalon->kcs->nama }}</td>
                                <td>{{ $keycalon->nodaftar }}</td>
                                <td>{{ $keycalon->nama }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('dashboard.psb.kelulusan.lulus') }}">
                                        @csrf
                                        <input value="{{ $keycalon->calon_id }}" type="hidden" name="calon_id">
                                        <input value="{{ $keycalon->id }}" type="hidden" name="id">
                                        <button class="btn btn-success" type="submit" aria-placeholder="terima" title="terima siswa"><i class="fas fa-check"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@if(!empty(Session::get('response')) && Session::get('response') == 1)
<script>
    $(function() {
        $('#tambahModal').modal('show');
    });
</script>
@endif

<script>
    $('#statusModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var calonid = button.data('calonid')
        var id = button.data('id')
        var name = button.data('nama')
        var nodaftar = button.data('nodaftar')
        var modal = $(this)
        modal.find('.modal-title').text('Ubah status untuk ' + name + "?")
        modal.find('.modal-body #nama-siswa').val(name)
        modal.find('.modal-body #calon-id').val(calonid)
        modal.find('.modal-body #no-daftar').val(nodaftar)
        modal.find('.modal-body #id').val(id)
    })
</script>

<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
<script src="{{ asset('js/demo/datatables-kelulusan.js') }}"></script>
<script src="{{ asset('js/demo/datatables-tambah.js') }}"></script>
@endsection