<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title; ?></h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#rakModal">
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
                                        <th>Kode Rak</th>
                                        <th>Kapasitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Rak</th>
                                        <th>Kapasitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($rak as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['kode_rak']; ?></td>
                                            <td><?= number_format($value['kapasitas'], 0, ',', '.'); ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#rakModal_edit" onclick="edit(<?= $value['id_rak'] ?>)" class="btn btn-info btn-border btn-sm">
                                                    <span class="btn-label">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </span>
                                                </button>

                                                <button onclick="Hapus(<?= $value['id_rak'] ?>)" class="btn btn-danger btn-border btn-sm">
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

<!-- Modal -->
<div class="modal fade" id="rakModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                <form id="form-rak">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Kode Rak</label>
                                <input type="text" class="form-control" id="kode_rak" name="kode_rak">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Kapasitas</label>
                                <input type="text" class="form-control" id="kapasitas" name="kapasitas">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer no-bd">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal edit -->
<div class="modal fade" id="rakModal_edit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                <form id="form-rak-edit">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Kode Rak</label>
                                <input type="hidden" class="form-control" id="id_rak_edit" name="id_rak_edit">
                                <input type="text" class="form-control" id="kode_rak_edit" name="kode_rak_edit">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Kapasitas</label>
                                <input type="text" class="form-control" id="kapasitas_edit" name="kapasitas_edit">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer no-bd">
                <button type="submit" class="btn btn-primary">Edit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
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

    function edit(id_rak) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('Rak/ambil_IdRak') ?>',
            data: {
                id_rak: id_rak
            },
            dataType: 'json',
            success: function(data) {
                $("#id_rak_edit").val(data.id_rak);
                $("#kode_rak_edit").val(data.kode_rak);
                $("#kapasitas_edit").val(data.kapasitas);
            }
        })
    }

    function Hapus(id_rak) {
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
                    url: "<?= base_url('Rak/hapus') ?>",
                    dataType: "json",
                    data: {
                        id_rak: id_rak
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            swal({
                                title: 'Data Rak',
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

        $("#form-rak").validate({
            rules: {
                kode_rak: {
                    required: !0
                },
                kapasitas: {
                    required: !0,
                    number: true
                },
            },
            messages: {
                kode_rak: 'Tidak boleh kosong',
                kapasitas: {
                    required: 'Tidak boleh kosong',
                    number: 'Harus Angka'

                }
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                kode_rak = $("#kode_rak").val();
                kapasitas = $("#kapasitas").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Rak/tambah') ?>",
                    dataType: "json",
                    data: {
                        kode_rak: kode_rak,
                        kapasitas: kapasitas
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $("#rakModal").hide();
                            swall('Ditambah')
                        }

                    }
                })

            }
        })

        $("#form-rak-edit").validate({
            rules: {
                kode_rak_edit: {
                    required: !0
                },
                kapasitas_edit: {
                    required: !0,
                    number: true
                },
            },
            messages: {
                kode_rak_edit: 'Tidak boleh kosong',
                kapasitas_edit: {
                    required: 'Tidak boleh kosong',
                    number: 'Harus Angka'

                }
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                id_rak_edit = $("#id_rak_edit").val();
                kode_rak_edit = $("#kode_rak_edit").val();
                kapasitas_edit = $("#kapasitas_edit").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Rak/ubah_data') ?>",
                    dataType: "json",
                    data: {
                        id_rak_edit: id_rak_edit,
                        kode_rak_edit: kode_rak_edit,
                        kapasitas_edit: kapasitas_edit
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $("#rakModal_edit").hide();
                            swall('Diubah')
                        }

                    }
                })

            }
        })


    })
</script>