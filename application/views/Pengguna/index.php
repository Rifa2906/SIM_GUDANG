<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title; ?></h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#penggunaModal">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </button>
                        </div>
                        <div class="card-head-row">
                            <div class="card-title">
                                <div class="card-tools mt-3">
                                    <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                        <span class="btn-label">
                                            <i class="fa fa-file-pdf"></i>
                                        </span>
                                        Export
                                    </a>
                                    <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                        <span class="btn-label">
                                            <i class="fa fa-print"></i>
                                        </span>
                                        Print
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="multi-filter-select" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No Telpon</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pengguna as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['nama']; ?></td>
                                            <td><?= $value['alamat']; ?></td>
                                            <td><?= $value['no_telpon']; ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#penggunaModal_edit" onclick="edit(<?= $value['id'] ?>)" class="btn btn-info btn-border btn-sm">
                                                    <span class="btn-label">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </span>
                                                </button>

                                                <button onclick="Hapus(<?= $value['id'] ?>)" class="btn btn-danger btn-border btn-sm">
                                                    <span class="btn-label">
                                                        <i class="fa fa-trash"></i>
                                                    </span>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="penggunaModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    Form Tambah
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-pengguna">
                    <div class="row">
                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label for="email2">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>

                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label for="defaultSelect">Role</label>
                                <select class="form-control form-control" id="role" name="role">
                                    <option value="">Please select</option>
                                    <option>Administrator</option>
                                    <option>Kepala Gudang</option>
                                    <option>Kepala Produksi</option>
                                    <option>Staf Gudang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label for="email2">No Telpon</label>
                                <input type="text" class="form-control" id="no_telpon" name="no_telpon">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email2">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label for="email2">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email2">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="Konfpassword" name="Konfpassword">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email2">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer no-bd">
                <button type="submit" class="btn btn-primary" id="tambah">Tambah</button>
                <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Kembali</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="penggunaModal_edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    Form Edit
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_edit-pengguna">
                    <div class="row">
                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_edit">
                                <label for="email2">Nama</label>
                                <input type="text" class="form-control" id="nama_edit" name="nama_edit">
                            </div>
                        </div>

                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label for="defaultSelect">Role</label>
                                <select class="form-control form-control" id="role_edit" name="role_edit">
                                    <option value="">Please select</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Kepala Gudang">Kepala Gudang</option>
                                    <option value="Kepala Produksi">Kepala Produksi</option>
                                    <option value="Staf Gudang">Staf Gudang</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label for="email2">No Telpon</label>
                                <input type="text" class="form-control" id="no_telpon_edit" name="no_telpon_edit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email2">Email</label>
                                <input type="text" class="form-control" id="email_edit" name="email_edit">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email2">Alamat</label>
                                <input type="text" class="form-control" id="alamat_edit" name="alamat_edit">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer no-bd">
                <button type="submit" class="btn btn-primary" id="edit">Edit</button>
                <button type="button" class="btn btn-danger" id="close" data-dismiss="modal">Kembali</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function swall(params) {
        swal({
            title: 'Berhasil',
            text: ' ' + params,
            icon: "success",
            buttons: false,
            timer: 1500
        }).then((result) => {
            location.reload();
        });
    }

    function Hapus(id) {
        swal({
            title: 'Apakah kamu yakin?',
            text: "Ingin menghapus data tersebut!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'Hapus',
                    className: 'btn btn-success'
                },
                cancel: {
                    text: 'Kembali',
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Pengguna/hapus') ?>",
                    dataType: "json",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            swal({
                                title: 'Data Pengguna',
                                text: 'Berhasil dihapus',
                                icon: "success",
                                buttons: false,
                                timer: 1500
                            }).then((result) => {
                                location.reload();
                            });;
                        }
                    }
                })


            } else {
                swal.close();
            }
        });
    }

    function edit(id) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('Pengguna/ambil_IdPengguna') ?>',
            data: {
                id: id
            },
            dataType: 'json',
            success: function(data) {
                $("#id_edit").val(data.id);
                $("#nama_edit").val(data.nama);
                $("#email_edit").val(data.email);
                $("#role_edit").val(data.role);
                $("#no_telpon_edit").val(data.no_telpon);
                $("#alamat_edit").val(data.alamat);
            }
        })
    }

    $(document).ready(function() {


        $('#basic-datatables').DataTable();

        $('#multi-filter-select').DataTable({
            "pageLength": 5,
            initComplete: function() {
                this.api().columns().every(function() {
                    var column = this;
                    var select = $('<select class="form-control"><option value=""></option></select>')
                        .appendTo($(column.footer()).empty())
                        .on('change', function() {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );

                            column
                                .search(val ? '^' + val + '$' : '', true, false)
                                .draw();
                        });

                    column.data().unique().sort().each(function(d, j) {
                        select.append('<option value="' + d + '">' + d + '</option>')
                    });
                });
            }
        });

        $("#form-pengguna").validate({
            rules: {
                nama: {
                    required: !0
                },
                role: {
                    required: !0
                },
                alamat: {
                    required: !0
                },
                no_telpon: {
                    required: true,
                    maxlength: 12,
                    number: true
                },
                hak_akses: {
                    select: true
                },
                email: {
                    email: true,
                    required: true
                },
                password: {
                    required: true,
                },
                Konfpassword: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                nama: 'Tidak boleh kosong',
                alamat: 'Tidak boleh kosong',
                role: 'Plih Role',
                no_telpon: {
                    required: "Tidak boleh kosong",
                    number: "Harus angka"
                },
                password: 'Tidak boleh kosong',
                email: {
                    required: "Tidak boleh kosong",
                    email: "Email tidak valid"
                },
                Konfpassword: {
                    required: "Tidak boleh kosong",
                    equalTo: "Password tidak sama"
                }

            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {




                nama = $("#nama").val();
                no_telpon = $("#no_telpon").val();
                password = $("#password").val();
                email = $("#email").val();
                role = $("#role").val();
                alamat = $("#alamat").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Pengguna/tambah') ?>",
                    dataType: "json",
                    data: {
                        nama: nama,
                        no_telpon: no_telpon,
                        password: password,
                        email: email,
                        role: role,
                        alamat: alamat
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $("#penggunaModal").hide();
                            swall('Ditambahkan')
                        }

                    }
                })

            }
        })

        $("#form_edit-pengguna").validate({
            rules: {
                nama_edit: {
                    required: !0
                },
                role_edit: {
                    required: !0
                },
                alamat_edit: {
                    required: !0
                },
                no_telpon_edit: {
                    required: true,
                    maxlength: 12,
                    number: true
                },
                email_edit: {
                    email: true,
                    required: true
                },
            },
            messages: {
                nama_edit: 'Tidak boleh kosong',
                alamat_edit: 'Tidak boleh kosong',
                role_edit: 'Plih Role',
                no_telpon_edit: {
                    required: "Tidak boleh kosong",
                    number: "Harus angka"
                },
                email_edit: {
                    required: "Tidak boleh kosong",
                    email: "Email tidak valid"
                },

            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {
                id = $("#id_edit").val();
                nama_edit = $("#nama_edit").val();
                no_telpon_edit = $("#no_telpon_edit").val();
                email_edit = $("#email_edit").val();
                role_edit = $("#role_edit").val();
                alamat_edit = $("#alamat_edit").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Pengguna/ubah_data') ?>",
                    dataType: "json",
                    data: {
                        id: id,
                        nama_edit: nama_edit,
                        role_edit: role_edit,
                        email_edit: email_edit,
                        alamat_edit: alamat_edit,
                        no_telpon_edit: no_telpon_edit

                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $("#penggunaModal_edit").hide();
                            swall('Diubah')
                        }

                    }
                })

            }
        })

        $("#close").click(function() {
            location.reload();
        })







    })
</script>