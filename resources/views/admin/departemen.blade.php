@extends('admin.master')

@section('title')
Departemen
@endsection

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Departemen</h1>
    <p class="mb-4">Departemen yang tersedia</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Departemen</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>PAUD</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-success mx-1">Aktif</a>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a href="#" class="btn btn-warning mx-1">Edit</a>
                                    <a href="#" class="btn btn-danger mx-1">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/demo/datatables-demo.js') }}"></script>
@endsection