@extends('admin.master')

@section('title')
Data Calon Siswa
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Calon Siswa</h1>
        <a href="{{ route('dashboard.psb.data.inputcalon') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Baru</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Calon Siswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No. Pendaftaran</th>
                            <th>Kelompok</th>
                            <th>Nama Siswa</th>
                            <th>Terakhir Diupdate</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No. Pendaftaran</th>
                            <th>nama Kelompok</th>
                            <th>Nama Siswa</th>
                            <th>Terakhir Diupdate</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $key)
                        <tr>
                            <td>{{ $key->nodaftar }}</td>
                            <td>{{ $key->kcs->nama }}</td>
                            <td>{{ $key->nama }}</td>
                            <td>{{ $key->updated_at }}</td>
                            <td>
                                @if( $key->status == 1)
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-success mx-1" data-toggle="modal" data-target="#statusModal" data-nodaftar="{{ $key->nodaftar }}" data-calonid="{{ $key->calon_id }}" data-nama="{{ $key->nama }}" data-status="{{ $key->status }}">Aktif</button>
                                </div>
                                @else
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-danger mx-1" data-toggle="modal" data-target="#statusModal" data-nodaftar="{{ $key->nodaftar }}" data-calonid="{{ $key->calon_id }}" data-nama="{{ $key->nama }}" data-status="{{ $key->status }}">Nonaktif</button>
                                </div>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="{{ route('dashboard.psb.data.editcalon', ['calon_id'=>$key->calon_id]) }}" class="btn btn-warning mx-1">Edit</a>
                                    <button data-toggle="modal" data-target="#deleteModal" data-nama="{{ $key->nama }}" class="btn btn-danger mx-1" data-calon-id="{{ $key->calon_id }}" data-nodaftar="{{ $key->nodaftar }}">Hapus</button>
                                </div>
                            </td>
                        </tr>
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
            <form action="{{ route('dashboard.psb.data.status') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="calon_id" id="calon-id" value="">
                    <input type="hidden" name="status" id="calon-status" value="">
                    <span>Siswa berikut akan ditetapkan sebagai tidak aktif.</span>
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

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Yakin ingin menghapus?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.psb.data.delete') }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <input type="hidden" id="calon-id" name="calon_id" value="">
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Anda akan menghapus data untuk:</h5>
                        <input type="text" class="form-control" id="name" disabled>
                        <span>Nomor Pendaftaran:</span>
                        <input type="text" class="form-control" id="nodaftar" disabled>
                        <small class="text-danger">Data tidak dapat dikembalikan!</small>
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
<!-- Delete Modal End -->
@endsection

@section('script')
<script>
    $('#statusModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('calonid')
        var name = button.data('nama')
        var status = button.data('status')
        var nodaftar = button.data('nodaftar')
        var modal = $(this)
        modal.find('.modal-title').text('Ubah status untuk ' + name + "?")
        modal.find('.modal-body #nama-siswa').val(name)
        modal.find('.modal-body #calon-id').val(id)
        modal.find('.modal-body #calon-status').val(status)
        modal.find('.modal-body #no-daftar').val(nodaftar)
    })
</script>

<script>
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('calon-id')
        var name = button.data('nama')
        var nodaftar = button.data('nodaftar')
        var modal = $(this)
        modal.find('.modal-body #name').val(name)
        modal.find('.modal-body #calon-id').val(id)
        modal.find('.modal-body #nodaftar').val(nodaftar)
    })
</script>

<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection