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
                    <div class="text-white-50 small">Halaman ini untuk mengatur informasi profil admin saat ini.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pengaturan Akun</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @foreach($data as $key)
                <div class="mb-3">
                    <label for="name" class="form-label">Username <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="{{ $key->name }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="********" disabled>
                </div>
                <div class="text-center">
                    <button class="btn btn-info px-5" data-toggle="modal" data-id="{{ $key->id }}" data-target="#usernameModal">Ubah Username</button>
                    <button class="btn btn-info px-5" data-toggle="modal" data-id="{{ $key->id }}" data-target="#passwordModal">Ubah Password</button>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Username Modal -->
<div class="modal fade" id="usernameModal" tabindex="-1" aria-labelledby="usernameModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="usernameModalLabel">Ubah Username</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('dashboard.admin.changeuname') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="mb-3">
                        <label for="newname" class="form-label">Username Baru</label>
                        <input type="text" class="form-control" id="newname" name="newname" required>
                    </div>
                    <div class="mb-3">
                        <label for="konfirmnewname" class="form-label">Konfirmasi Username Baru</label>
                        <input type="text" class="form-control" id="konfirmnewname" name="konfirmname" required>
                        <span id='message'></span>
                    </div>
                    <hr class="sidebar-divider">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="namekonfbutton" disabled>Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Username Modal End -->

<!-- Password Modal -->
<div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModalLabel">Ubah Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('dashboard.admin.changepass') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="hidden" id="id" name="id" value="">
                    <div class="mb-3">
                        <label for="newpass" class="form-label">Password Baru</label>
                        <input type="password" class="form-control" id="newpass" name="newpassword" required>
                    </div>
                    <div class="mb-3">
                        <label for="konfirmnewpass" class="form-label">Konfirmasi Password Baru</label>
                        <input type="password" class="form-control" id="konfirmnewpass" name="konfirmpassword" required>
                        <span id='messagepass'></span>
                    </div>
                    <hr class="sidebar-divider">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Saat Ini</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" id="passkonfbutton" disabled>Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Password Modal End -->
@endsection

@section('script')
<script>
    $('#usernameModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id)
    })
</script>

<script>
    $('#passwordModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-body #id').val(id)
    })
</script>

<script>
    $('#newname, #konfirmnewname, #namekonfbutton').on('keyup', function() {
        if ($('#newname').val().length >= 3) {
            if ($('#newname').val() == $('#konfirmnewname').val()) {
                $('#message').html('Matching').css('color', 'green');
                $('#namekonfbutton').prop('disabled', false);
            } else {
                $('#message').html('Not Matching').css('color', 'red');
                $('#namekonfbutton').prop('disabled', true);
            }
        } else {
            $('#message').html('Min. 3 characters').css('color', 'red');
            $('#namekonfbutton').prop('disabled', true);
        }
    });
</script>

<script>
    $('#newpass, #konfirmnewpass, #passkonfbutton').on('keyup', function() {
        if ($('#newpass').val().length >= 8) {
            if ($('#newpass').val() == $('#konfirmnewpass').val()) {
                $('#messagepass').html('Matching').css('color', 'green');
                $('#passkonfbutton').prop('disabled', false);
            } else {
                $('#messagepass').html('Not Matching').css('color', 'red');
                $('#passkonfbutton').prop('disabled', true);
            }
        } else {
            $('#messagepass').html('Min. 8 characters').css('color', 'red');
            $('#passkonfbutton').prop('disabled', true);
        }
    });
</script>
@endsection