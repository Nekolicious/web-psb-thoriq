@extends('admin.master')

@section('title')
Proses Penerimaan Siswa Baru
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penerimaan Siswa Baru</h1>
        <a href="{{ route('dashboard.psb.ppsb.inputppsb') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Baru</a>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Proses PSB</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Proses</th>
                            <th>Kode Awalan</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Proses</th>
                            <th>Kode Awalan</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($data as $key)
                        <tr>
                            <td>{{ $key->nama }}</td>
                            <td>{{ $key->kode }}</td>
                            <td>{{ $key->keterangan }}</td>
                            <td>
                                @if( $key->status == 1)
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-success mx-1" data-toggle="modal" data-target="#statusModal" data-status="{{ $key->status }}" data-ppsbnama="{{ $key->nama }}" data-ppsbid="{{ $key->ppsb_id }}">Aktif</button>
                                </div>
                                @else
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-danger mx-1" data-toggle="modal" data-target="#statusModal" data-status="{{ $key->status }}" data-ppsbnama="{{ $key->nama }}" data-ppsbid="{{ $key->ppsb_id }}">Nonaktif</button>
                                </div>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button href="#" data-toggle="modal" data-target="#editModal" data-ppsbketerangan="{{ $key->keterangan }}" data-ppsbnama="{{ $key->nama }}" data-ppsbid="{{ $key->ppsb_id }}" data-kode="{{ $key->kode }}" class="btn btn-warning mx-1">Edit</button>
                                    <button href="#" data-toggle="modal" data-target="#deleteModal" data-ppsbid="{{ $key->ppsb_id }}" data-ppsbnama="{{ $key->nama }}" class="btn btn-danger mx-1">Hapus</button>
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
            <form action="{{ route('dashboard.psb.ppsb.status') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="ppsb_id" id="ppsb-id" value="">
                    <input type="hidden" name="status" id="ppsb-status" value="">
                    <span>Alur pendaftaran juga akan terpengaruh, namun anda dapat mengubahnya lagi.</span>
                    <div class="form-group">
                        <label for="proses-name" class="col-form-label">Nama Proses:</label>
                        <input type="text" class="form-control" id="proses-name" disabled>
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
            <form action="{{ route('dashboard.psb.ppsb.update') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="ppsb-id" name="ppsb_id" value="">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Proses <span class="text-danger">*</span></label>
                        <input type="text" name="nama" class="form-control" id="ppsb-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode" class="form-label">Kode Proses <span class="text-danger">*</span></label>
                        <input type="text" name="kode" style="text-transform: uppercase;" class="form-control kodeinput" id="ppsb-kode" disabled>
                        <small class="text-secondary">Kode tidak dapat diubah.</small>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" id="ppsb-keterangan">
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
            <form action="{{ route('dashboard.psb.ppsb.delete') }}" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <input type="hidden" id="ppsb-id" name="ppsb_id" value="">
                    <div class="mb-3 text-center">
                        <h5 class="text-danger">Anda akan menghapus data untuk:</h5>
                        <input type="text" class="form-control" id="ppsb-name" disabled>
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
        var id = button.data('ppsbid')
        var name = button.data('ppsbnama')
        var status = button.data('status')
        var modal = $(this)
        modal.find('.modal-title').text('Ubah status untuk ' + name + "?")
        modal.find('.modal-body #proses-name').val(name)
        modal.find('.modal-body #ppsb-id').val(id)
        modal.find('.modal-body #ppsb-status').val(status)
    })
</script>

<script>
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('ppsbid')
        var name = button.data('ppsbnama')
        var keterangan = button.data('ppsbketerangan')
        var kode = button.data('ppsbnama')
        var modal = $(this)
        modal.find('.modal-title').text('Edit data untuk ' + name + "?")
        modal.find('.modal-body #ppsb-name').val(name)
        modal.find('.modal-body #ppsb-id').val(id)
        modal.find('.modal-body #ppsb-kode').val(kode)
        modal.find('.modal-body #ppsb-keterangan').val(keterangan)
    })
</script>

<script>
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('ppsbid')
        var name = button.data('ppsbnama')
        var modal = $(this)
        modal.find('.modal-body #ppsb-name').val(name)
        modal.find('.modal-body #ppsb-id').val(id)
    })
</script>

<script>
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('ppsbid')
        var name = button.data('ppsbnama')
        var modal = $(this)
        modal.find('.modal-body #ppsb-name').val(name)
        modal.find('.modal-body #ppsb-id').val(id)
    })
</script>

<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection