<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title; ?></h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#barangModal">
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
                                        <th>Kode Barang</th>
                                        <th>Brand Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Brand Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($barang as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['kode_barang']; ?></td>
                                            <td><?= $value['nama_brand']; ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#barangModal_edit" onclick="edit(<?= $value['id_barang'] ?>)" class="btn btn-info btn-border btn-sm">
                                                    <span class="btn-label">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </span>
                                                </button>

                                                <button onclick="Hapus(<?= $value['id_barang'] ?>)" class="btn btn-danger btn-border btn-sm">
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
<div class="modal fade" id="barangModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form id="form-barang">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" id="kode_barang" value="<?= $kode_b; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Brand</label>
                                <input type="text" class="form-control" id="nama_brand" name="nama_brand">
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
<div class="modal fade" id="barangModal_edit" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form id="form-barang-edit">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id_barang_edit">
                                <label>Kode Barang</label>
                                <input type="text" class="form-control" id="kode_barang_edit" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Brand</label>
                                <input type="text" class="form-control" id="nama_brand_edit" name="nama_brand_edit">
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

    function edit(id_barang) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('Barang/ambil_IdBarang') ?>',
            data: {
                id_barang: id_barang
            },
            dataType: 'json',
            success: function(data) {
                $("#id_barang_edit").val(data.id_barang);
                $("#nama_brand_edit").val(data.nama_brand);
                $("#kode_barang_edit").val(data.kode_barang);
            }
        })
    }

    function Hapus(id_barang) {
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
                    url: "<?= base_url('Barang/hapus') ?>",
                    dataType: "json",
                    data: {
                        id_barang: id_barang
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            swal({
                                title: 'Data Barang',
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

        $("#form-barang").validate({
            rules: {
                nama_brand: {
                    required: !0
                },
            },
            messages: {
                nama_brand: 'Tidak boleh kosong',
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                kode_barang = $("#kode_barang").val();
                nama_brand = $("#nama_brand").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Barang/tambah') ?>",
                    dataType: "json",
                    data: {
                        nama_brand: nama_brand,
                        kode_barang: kode_barang
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $("#barangModal").hide();
                            swall('Ditambah')
                        }

                    }
                })

            }
        })

        $("#form-barang-edit").validate({
            rules: {
                nama_brand_edit: {
                    required: !0
                },
            },
            messages: {
                nama_brand_edit: 'Tidak boleh kosong',
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                id_barang_edit = $("#id_barang_edit").val();
                kode_barang_edit = $("#kode_barang_edit").val();
                nama_brand_edit = $("#nama_brand_edit").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Barang/ubah_data') ?>",
                    dataType: "json",
                    data: {
                        id_barang_edit: id_barang_edit,
                        nama_brand_edit: nama_brand_edit,
                        kode_barang_edit: kode_barang_edit
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $("#barangModal_edit").hide();
                            swall('Diubah')
                        }

                    }
                })

            }
        })

    })
</script>