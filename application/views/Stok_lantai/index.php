<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title; ?></h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#stok_lantaiModal">
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
                                        <th>Terisi ( dus ) </th>
                                        <th>Jumlah Kosong</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Rak</th>
                                        <th>Kode Lantai</th>
                                        <th>Terisi ( dus )</th>
                                        <th>Jumlah Kosong</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($stok_lantai as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['kode_rak']; ?></td>
                                            <td><?= $value['kode_lantai']; ?></td>
                                            <td><?= $value['jumlah_ada']; ?></td>
                                            <td><?= $value['jumlah_kosong']; ?></td>
                                            <td>
                                                <button onclick="Hapus(<?= $value['id_stok_lantai'] ?>)" class="btn btn-danger btn-border btn-sm">
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



<!-- Modal -->
<div class="modal fade" id="stok_lantaiModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form id="form_stok_lantai">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kode Rak</label>
                                <select name="id_rak" id="id_rak" class="form-control">
                                    <option value="">Pilih Rak</option>
                                    <?php
                                    foreach ($rak as $key => $value) { ?>
                                        <option value="<?= $value['id_rak']; ?>"><?= $value['kode_rak']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Kode Lantai</label>
                                <select name="id_lantai" id="id_lantai" class="form-control">

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


    function Hapus(id_stok_lantai) {
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
                    url: "<?= base_url('stok_lantai/hapus') ?>",
                    dataType: "json",
                    data: {
                        id_stok_lantai: id_stok_lantai
                    },
                    success: function(data) {
                        if (data == 1) {
                            swal({
                                title: 'Data Stok Lantai',
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

    $("#id_rak").change(function() {
        id_rak = $(this).val();
        $.ajax({
            type: 'POST',
            url: '<?= base_url('Stok_lantai/kode_lantai_otomatis') ?>',
            data: {
                id_rak: id_rak
            },
            dataType: 'json',
            success: function(data) {
                var baris = ' <option value="">Pilih Kode Lantai</option>';
                for (let i = 0; i < data.length; i++) {
                    const element = data[i];
                    baris += '<option value="' + element.id_lantai + '" >' + element.kode_lantai + '</option>';
                }
                $('#id_lantai').html(baris);

            }
        })
    })
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

        $("#form_stok_lantai").validate({
            rules: {
                id_rak: {
                    required: !0
                },
                id_lantai: {
                    required: !0
                }
            },
            messages: {
                id_rak: 'Belum Dipilih',
                id_lantai: 'Belum Dipilih',
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                id_lantai = $("#id_lantai").val();
                id_rak = $("#id_rak").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Stok_lantai/tambah_data') ?>",
                    dataType: "json",
                    data: {
                        ID_rak: id_rak,
                        ID_lantai: id_lantai
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#stok_lantaiModal").hide();
                            swall('Ditambah')
                        } else if (data == 0) {
                            $("#stok_lantaiModal").hide();
                            error();
                        }

                    }
                })

            }
        })

        $("#form-stok-penyimpanan-edit").validate({
            rules: {
                id_barang_edit: {
                    required: !0
                },
                id_lantai_edit: {
                    required: !0
                },
                id_papan_edit: {
                    required: !0
                },
                jumlah_edit: {
                    required: !0,
                    number: true
                },
            },
            messages: {
                id_barang_edit: 'Tidak boleh kosong',
                id_lantai_edit: 'Tidak boleh kosong',
                id_papan_edit: 'Tidak boleh kosong',
                jumlah_edit: {
                    required: 'Tidak boleh kosong',
                    number: 'Harus Angka'

                }
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                id_stok_edit = $("#id_stok_edit").val();
                id_barang_edit = $("#id_barang_edit").val();
                id_lantai_edit = $("#id_lantai_edit").val();
                id_papan_edit = $("#id_papan_edit").val();
                jumlah_edit = $("#jumlah_edit").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Stok_penyimpanan/ubah_data') ?>",
                    dataType: "json",
                    data: {
                        id_stok: id_stok_edit,
                        id_barang_edit: id_barang_edit,
                        id_lantai_edit: id_lantai_edit,
                        id_papan_edit: id_papan_edit,
                        jumlah_edit: jumlah_edit
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#stok_penyimpananModal_edit").hide();
                            swall('Diubah')
                        } else if (data == 'kelebihan') {
                            $("#stok_penyimpananModal_edit").hide();

                            swal({
                                title: 'Jumlah',
                                text: 'Pengisian jangan melebihi 48 ',
                                icon: "error",
                                buttons: false,
                                timer: 1800
                            }).then((result) => {
                                location.reload();
                            });

                        }

                    }
                })

            }
        })


    })
</script>