@extends('user.kelulusan')

@section('title')
Kelulusan PAUD
@endsection

@section('content')
<!-- Form PAUD -->
<div id="paud">
    <div class="card shadow mb-4 bg-success text-white text-center">
        <div class="card-header">
            <h3>Kelulusan PAUD</h3>
        </div>
    </div>
    <div class="container-fluid bg-white rounded shadow p-4">
        <table id="tabel" class="display table table-striped table-bordered" style="width:100%">
            <thead class="table-success">
                <tr>
                    <th>#</th>
                    <th>No. Pendaftaran</th>
                    <th>Nama Siswa</th>
                </tr>
            </thead>
            <tfoot class="table-success">
                <tr>
                    <th>#</th>
                    <th>No. Pendaftaran</th>
                    <th>Nama Siswa</th>
                </tr>
            </tfoot>
            <tbody class="table-hover">
                @foreach($data as $key=>$datas)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $datas->calonsiswa->nodaftar }}</td>
                    <td>{{ $datas->calonsiswa->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<!-- Form PAUD End -->
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#tabel').DataTable();
    });
</script>
@endsection