<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title; ?></h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#stok_papanModal">
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
                                        <th>Kode Lantai</th>
                                        <th>Kode Papan</th>
                                        <th>Terisi ( dus ) </th>
                                        <th>Jumlah Kosong</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Lantai</th>
                                        <th>Kode Papan</th>
                                        <th>Terisi ( dus )</th>
                                        <th>Jumlah Kosong</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($stok_p as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['kode_lantai']; ?></td>
                                            <td><?= $value['kode_papan']; ?></td>
                                            <td><?= $value['jumlah_ada']; ?></td>
                                            <td><?= $value['jumlah_kosong']; ?></td>
                                            <td>
                                                <button onclick="hapus(<?= $value['id_stok_papan'] ?>)" class="btn btn-danger btn-border btn-sm">
                                                    <span class="btn-label">
                                                        <i class="fas fa-trash"></i>
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
<div class="modal fade" id="stok_papanModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form id="form_stok_papan">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kode Lantai</label>
                                <select name="id_lantai" id="id_lantai" class="form-control">
                                    <option value="">Pilih Kode lantai</option>
                                    <?php
                                    foreach ($lantai as $key => $value) { ?>
                                        <option value="<?= $value['id_lantai']; ?>"><?= $value['kode_lantai']; ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kode Papan</label>
                                <select name="id_papan" id="id_papan" class="form-control">
                                </select>
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
<!-- <div class="modal fade" id="stok_papanModal_edit" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form id="form-stok-papan-edit">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kode Lantai</label>
                                <input type="hidden" name="id_stok_papan_edit" id="id_stok_papan_edit">
                                <select name="id_lantai_edit" id="id_lantai_edit" class="form-control">
                                    <option value="Pilih Kode lantai"></option>
                                    <?php
                                    foreach ($lantai as $key => $value) { ?>
                                        <option value="<?= $value['id_lantai']; ?>"><?= $value['kode_lantai']; ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kode Papan</label>
                                <select name="id_papan_edit" id="id_papan_edit" class="form-control">
                                    <option value="Pilih Kode papan"></option>
                                    <?php
                                    foreach ($papan as $key => $value) { ?>
                                        <option value="<?= $value['id_papan']; ?>"><?= $value['kode_papan']; ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
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
</div> -->
<script>
    $("#id_lantai").change(function() {
        id_lantai = $(this).val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('Stok_papan/kode_papan_otomatis') ?>',
            data: {
                id_lantai: id_lantai
            },
            dataType: 'json',
            success: function(data) {
                var baris = ' <option value="">Pilih Kode Papan</option>';
                for (let i = 0; i < data.length; i++) {
                    const element = data[i];
                    baris += '<option value="' + element.id_papan + '" >' + element.kode_papan + '</option>';
                }
                $('#id_papan').html(baris);

            }
        })
    })


    


    function error() {
        swal({
            title: 'Kode Papan',
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

    // function edit(id_stok_papan) {
    //     $.ajax({
    //         type: 'POST',
    //         url: '<?= base_url('Stok_papan/ambil_IdStok') ?>',
    //         data: {
    //             ID_stok_papan: id_stok_papan
    //         },
    //         dataType: 'json',
    //         success: function(data) {
    //             $("#id_stok_papan_edit").val(data.id_stok_papan);
    //             $("#id_papan_edit").val(data.id_papan);
    //             $("#id_lantai_edit").val(data.id_lantai);
    //         }
    //     })
    // }

    function hapus(id_stok_papan) {
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
                    url: "<?= base_url('Stok_papan/hapus') ?>",
                    dataType: "json",
                    data: {
                        id_stok_papan: id_stok_papan
                    },
                    success: function(data) {
                        if (data == 1) {
                            swal({
                                title: 'Data Stok Papan',
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

        $("#form_stok_papan").validate({
            rules: {
                id_lantai: {
                    required: !0
                },
                id_papan: {
                    required: !0
                },

            },
            messages: {
                id_lantai: 'Belum Dipilih',
                id_papan: 'Belum Dipilih',
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                id_lantai = $("#id_lantai").val();
                id_papan = $("#id_papan").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Stok_papan/tambah_data') ?>",
                    dataType: "json",
                    data: {
                        id_lantai: id_lantai,
                        id_papan: id_papan,
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#stok_papanModal").hide();
                            swall('Ditambah')
                        } else if (data == 0) {
                            $("#stok_papanModal").hide();
                            error();
                        }

                    }
                })

            }
        })

        $("#form-stok-papan-edit").validate({
            rules: {
                id_lantai_edit: {
                    required: !0
                },
                id_papan_edit: {
                    required: !0
                },
            },
            messages: {
                id_lantai_edit: 'Tidak boleh kosong',
                id_papan_edit: 'Tidak boleh kosong',
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                id_stok_papan_edit = $("#id_stok_papan_edit").val();
                id_lantai_edit = $("#id_lantai_edit").val();
                id_papan_edit = $("#id_papan_edit").val();
                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Stok_papan/ubah_data') ?>",
                    dataType: "json",
                    data: {
                        id_stok_papan_edit: id_stok_papan_edit,
                        id_lantai_edit: id_lantai_edit,
                        id_papan_edit: id_papan_edit,
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#stok_papanModal_edit").hide();
                            swall('Diubah')
                        }

                    }
                })

            }
        })


    })
</script>