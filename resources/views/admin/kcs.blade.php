@extends('admin.master')

@section('title')
Kelompok Calon Siswa
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kelompok Calon Siswa</h1>
        <a href="{{ route('dashboard.psb.kcs.inputkcs') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Baru</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Gelombang KCS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Proses</th>
                            <th>Kelompok</th>
                            <th>Kapasitas</th>
                            <th>Terisi</th>
                            <th>Keterangan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                        <th>Proses</th>
                            <th>Kelompok</th>
                            <th>Kapasitas</th>
                            <th>Terisi</th>
                            <th>Keterangan</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $key)
                        <tr>
                            <td>{{ $key->ppsb->nama }}</td>
                            <td>{{ $key->nama }}</td>
                            <td>{{ $key->kapasitas }}</td>
                            <td>{{ count($key->calon) }}</td>
                            <td>{{ $key->keterangan }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button href="#" data-toggle="modal" data-target="#editModal" data-psbnama="{{ $key->ppsb->nama }}" data-kcsketerangan="{{ $key->keterangan }}" data-kcsnama="{{ $key->nama }}" data-kcsid="{{ $key->kcs_id }}" data-kapasitas="{{ $key->kapasitas }}" class="btn btn-warning mx-1">Edit</button>
                                    <button href="#" data-toggle="modal" data-target="#deleteModal" data-kcsid="{{ $key->kcs_id }}" data-kcsnama="{{ $key->nama }}" class="btn btn-danger mx-1">Hapus</button>
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

<!-- edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.psb.kcs.update') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="kcs-id" name="kcs_id" value="">
                    <div class="mb-3">
                        <label for="proses" class="form-label">Proses <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="psb-name" disabled>
                        <small class="text-secondary">Proses tidak dapat dirubah.</small>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kelompok <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control" id="kcs-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="kapasitas" class="form-label">Kapasitas <span class="text-danger">*</span></label>
                        <input type="number" name="kapasitas" class="form-control" id="kapasitas" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="kcs-keterangan">
                    </div>
                    <div class="mb-3">
                        <small><span class="text-danger">*</span> Wajib diisi</small>
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
<!-- Edit Modal End -->

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
            <form action="{{ route('dashboard.psb.kcs.delete') }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <input type="hidden" id="kcs-id" name="kcs_id" value="">
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Anda akan menghapus data untuk:</h5>
                        <input type="text" class="form-control" id="kcs-name" disabled>
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
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('kcsid')
        var name = button.data('kcsnama')
        var psbname = button.data('psbnama')
        var kapasitas = button.data('kapasitas')
        var keterangan = button.data('kcsketerangan')
        var modal = $(this)
        modal.find('.modal-body #kcs-name').val(name)
        modal.find('.modal-body #psb-name').val(psbname)
        modal.find('.modal-body #kapasitas').val(kapasitas)
        modal.find('.modal-body #kcs-keterangan').val(keterangan)
        modal.find('.modal-body #kcs-id').val(id)
    })
</script>

<script>
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('kcsid')
        var name = button.data('kcsnama')
        var modal = $(this)
        modal.find('.modal-body #kcs-name').val(name)
        modal.find('.modal-body #kcs-id').val(id)
    })
</script>

<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection