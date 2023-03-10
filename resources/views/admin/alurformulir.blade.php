@extends('admin.master')

@section('title')
Alur Formulir
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col mb-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    Informasi
                    <div class="text-white-50 small">Halaman ini untuk mengatur data hasil inputan dari pendaftar dari <a href="{{-- route('user.formdaftar') --}}"><strong>formulir ini</strong></a>.</div>
                </div>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Alur Formulir Pendaftaran Saat Ini</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><a href="{{ route('dashboard.psb.ppsb') }}">Proses Penerimaan Siswa Baru</a></th>
                            <th><i class="fas fa-arrow-right"></i></th>
                            <th><a href="{{ route('dashboard.psb.kcs') }}">Kelompok Calon Siswa</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $data as $key )
                        <tr>
                            <td>
                                <button class="btn btn-outline-secondary rounded" type="text" disabled>{{ $key->ppsb->kode }} | {{ $key->ppsb->nama }}</button>
                            </td>
                            <td>
                                <button class="btn btn-success" disabled>Aktif</button>
                            </td>
                            <td>
                                <button class="btn btn-outline-secondary rounded" type="text" disabled>{{ $key->kcs->nama }}</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="text-center">
                    <button class="btn btn-info px-5" data-toggle="modal" data-target="#formModal">Ubah</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Status Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Ubah Alur Formulir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('dashboard.formulir.ubah') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="">
                    <div class="form-group">
                        <label for="ppsb-id" class="col-form-label">Proses Penerimaan Siswa Baru:</label>
                        <select class="form-control" name="ppsb_id" id="ppsb-id" required>
                            <option selected disabled>-- Pilih Proses --</option>
                            @foreach($datapsb as $keypsb)
                            <option value="{{ $keypsb -> ppsb_id }}">{{ $keypsb->kode }} - {{ $keypsb->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kcs-id" class="col-form-label">Kelompok Calon Siswa:</label>
                        <select class="form-control" name="kcs_id" id="kcs-id" required>
                            <option selected disabled>-- Pilih Kelompok --</option>
                        </select>
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
@endsection

@section('script')
<script>
    $('#formModal').on('show.bs.modal', function(event) {
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

<!-- AJAX/Dropdown Kelompok -->
<script type='text/javascript'>
    $(document).ready(function() {

        // Department Change
        $('#ppsb-id').change(function() {

            // Department id
            var id = $(this).val();

            // Empty the dropdown
            $('#kcs-id').find('option').not(':first').remove();

            // AJAX request 
            $.ajax({
                url: '/dashboard/formulir/getKCS/' + id,
                type: 'get',
                dataType: 'json',
                success: function(response) {

                    var len = 0;
                    if (response['data'] != null) {
                        len = response['data'].length;
                    }

                    if (len > 0) {
                        // Read data and create <option >
                        for (var i = 0; i < len; i++) {

                            var id = response['data'][i].kcs_id;
                            var name = response['data'][i].nama;

                            var option = "<option value='" + id + "'>" + name + "</option>";

                            $("#kcs-id").append(option);
                        }
                    }

                }
            });
        });
    });
</script>
@endsection