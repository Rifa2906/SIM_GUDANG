<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title; ?></h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#lantaiModal">
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
                                        <th>Kode Lantai</th>
                                        <th>Kapasitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Rak</th>
                                        <th>Kode Lantai</th>
                                        <th>Kapasitas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($lantai as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['kode_rak']; ?></td>
                                            <td><?= $value['kode_lantai']; ?></td>
                                            <td><?= number_format($value['kapasitas_lantai'], 0, ',', '.'); ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#lantaiModal_edit" onclick="edit(<?= $value['id_lantai'] ?>)" class="btn btn-info btn-border btn-sm">
                                                    <span class="btn-label">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </span>
                                                </button>

                                                <button onclick="Hapus(<?= $value['id_lantai'] ?>)" class="btn btn-danger btn-border btn-sm">
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
<div class="modal fade" id="lantaiModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form id="form-lantai">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Kode Rak</label>
                                <select class="form-control" name="id_rak" id="id_rak">
                                    <option value="">Pilih Kode Rak</option>
                                    <?php
                                    foreach ($rak as $key => $value) { ?>
                                        <option value="<?= $value['id_rak']; ?>"><?= $value['kode_rak']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Lantai</label>
                                <input type="text" onkeyup="this.value = this.value.toUpperCase()" class="form-control" id="kode_lantai" name="kode_lantai">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>No Urut</label>
                                <input type="text" class="form-control" id="no_urut" name="no_urut">
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
<div class="modal fade" id="lantaiModal_edit" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form id="form-lantai-edit">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Kode Rak</label>
                                <input type="hidden" class="form-control" id="id_lantai_edit" name="id_lantai_edit">
                                <select class="form-control" name="id_rak_edit" id="id_rak_edit">
                                    <option value="">Pilih Kode Rak</option>
                                    <?php
                                    foreach ($rak as $key => $value) { ?>
                                        <option value="<?= $value['id_rak']; ?>"><?= $value['kode_rak']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Lantai</label>
                                <input type="text" class="form-control" id="lantai_edit" name="lantai_edit">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>No Urut</label>
                                <input type="text" class="form-control" id="no_urut_edit" name="no_urut_edit">
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
    function error() {
        swal({
            title: 'Kode Lantai',
            text: 'Sudah Ada ',
            icon: "error",
            buttons: false,
            timer: 1500
        }).then((result) => {
            location.reload();
        });
    }

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

    function edit(id_lantai) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('Lantai/ambil_IdLantai') ?>',
            data: {
                id_lantai: id_lantai
            },
            dataType: 'json',
            success: function(data) {
                $("#id_lantai_edit").val(data.id_lantai);
                $("#lantai_edit").val(data.kode_lantai);
                $("#kapasitas_edit").val(data.kapasitas_lantai);
                $("#id_rak_edit").val(data.id_rak);
                $("#no_urut_edit").val(data.no_urut);
            }
        })
    }

    function Hapus(id_lantai) {
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
                    url: "<?= base_url('Lantai/hapus') ?>",
                    dataType: "json",
                    data: {
                        id_lantai: id_lantai
                    },
                    success: function(data) {
                        if (data == 1) {
                            swal({
                                title: 'Data Lantai',
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

        $("#form-lantai").validate({
            rules: {
                id_rak: {
                    required: !0
                },
                kode_lantai: {
                    required: !0
                },
                kapasitas: {
                    required: !0,
                    number: true
                },
            },
            messages: {
                id_rak: 'Tidak boleh kosong',
                kode_lantai: 'Tidak boleh kosong',
                kapasitas: {
                    required: 'Tidak boleh kosong',
                    number: 'Harus Angka'
                }
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                id_rak = $("#id_rak").val();
                kode_lantai = $("#kode_lantai").val();
                kapasitas = $("#kapasitas").val();
                no_urut = $("#no_urut").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Lantai/tambah') ?>",
                    dataType: "json",
                    data: {
                        id_rak: id_rak,
                        kode_lantai: kode_lantai,
                        kapasitas: kapasitas,
                        no_urut: no_urut
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#lantaiModal").hide();
                            swall('Ditambah')
                        } else if (data == 0) {
                            $("#lantaiModal").hide();
                            error();
                        }

                    }
                })

            }
        })

        $("#form-lantai-edit").validate({
            rules: {
                id_rak_edit: {
                    required: !0
                },
                lantai_edit: {
                    required: !0
                },
                no_urut_edit: {
                    required: !0,
                    number: true
                },
                kapasitas_edit: {
                    required: !0,
                    number: true
                },
            },
            messages: {
                id_rak_edit: 'Tidak boleh kosong',
                lantai_edit: 'Tidak boleh kosong',
                no_urut_edit: 'Tidak boleh kosong',
                kapasitas_edit: {
                    required: 'Tidak boleh kosong',
                    number: 'Harus Angka'

                }
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                id_lantai_edit = $("#id_lantai_edit").val();
                id_rak_edit = $("#id_rak_edit").val();
                lantai_edit = $("#lantai_edit").val();
                kapasitas_edit = $("#kapasitas_edit").val();
                no_urut_edit = $("#no_urut_edit").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Lantai/ubah_data') ?>",
                    dataType: "json",
                    data: {
                        id_lantai_edit: id_lantai_edit,
                        id_rak_edit: id_rak_edit,
                        kapasitas_edit: kapasitas_edit,
                        lantai_edit: lantai_edit,
                        no_urut_edit: no_urut_edit
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#lantaiModal_edit").hide();
                            swall('Diubah')
                        }

                    }
                })

            }
        })


    })
</script>