@extends('layouts.app')

@section('title', 'Data Member')

@section('content')
    <div class="card shadow">
        <div class="card-header">
            <h4 class="card-title">
                Data Member
            </h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Email</th>
                            <th>Nama Member</th>
                            <th>No HP</th>
                            <th>Bukti KTP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-form" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-kategori">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Member</label>
                                    <input type="text" class="form-control" name="nama_member"
                                        placeholder="Nama Member" required>
                                </div>
                                <div class="form-group">
                                    <label for="">No HP</label>
                                    <input type="text" class="form-control" name="no_hp"
                                        placeholder="No HP" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Bukti KTP</label>
                                    <img src="" class="image d-block" width=400>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <script>
        $(function() {

            $.ajax({
                url: '/api/members',
                success: function({
                    data
                }) {

                    let row;
                    data.map(function(val, index) {
                        row += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${val.email}</td>
                            <td>${val.nama_member}</td>
                            <td>${val.no_hp}</td>
                            <td><img src="/uploads/${val.bukti_ktp}" width=100></td>
                            <td>
                                <a data-toggle="modal" href="#modal-form" data-id="${val.id}" class="btn btn-warning modal-ubah">Edit</a>
                                <a href="#" data-id="${val.id}" class="btn btn-danger btn-hapus">Hapus</a>
                            </td>
                        </tr>
                        `;
                    });

                    $('tbody').append(row)
                }
            });

            $(document).on('click', '.btn-hapus', function() {
                const id = $(this).data('id');
                const token = localStorage.getItem('token');

                confirm_dialog = confirm('Apakah anda yakin?');

                if (confirm_dialog) {
                    $.ajax({
                        url: 'api/members/' + id,
                        type: 'DELETE',
                        headers: {
                            "Authorization": 'Bearer ' + token
                        },
                        success: function(data) {
                            if (data.success) {
                                alert('Data berhasil dihapus');
                                location.reload();
                            }
                        }
                    });
                }
            });

            $(document).on('click', '.modal-ubah', function() {
                $('#modal-form').modal('show')
                const id = $(this).data('id');

                $.get('/api/members/' + id, function({
                    data
                }) {
                    $('input[name="email"]').val(data.email);
                    $('input[name="nama_member"]').val(data.nama_member);
                    $('input[name="no_hp"]').val(data.no_hp);
                    $('.image').attr('src', '/uploads/' + data.bukti_ktp);
                });

                $('.form-kategori').submit(function(e) {
                e.preventDefault();
                const token = localStorage.getItem('token');
                const frmdata = new FormData(this);

                $.ajax({
                    url: `api/members/${id}?_method=PUT`,
                    type: 'POST',
                    data: frmdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    headers: {
                        "Authorization": 'Bearer ' + token
                    },
                    success: function(data) {
                        if (data.success) {
                            alert('Data berhasil diubah');
                            location.reload();
                        }
                    }
                });
            });

            });
        })
    </script>
@endpush
