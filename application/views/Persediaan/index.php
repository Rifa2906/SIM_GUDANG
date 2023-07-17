<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title; ?></h4>
                            <!-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#persediaanModal">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </button> -->
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
                                        <th>Kode Produk</th>
                                        <th>Produk</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Kadaluarsa</th>
                                        <th>Rak</th>
                                        <th>Lantai</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Produk</th>
                                        <th>Produk</th>
                                        <th>Tanggal Masuk</th>
                                        <th>Tanggal Kadaluarsa</th>
                                        <th>Kode Rak</th>
                                        <th>Lantai</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($persediaan as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['kode_produk']; ?></td>
                                            <td><?= $value['nama_produk']; ?></td>
                                            <td><?= $value['tanggal_masuk']; ?></td>
                                            <td><?= $value['tanggal_kadaluarsa']; ?></td>
                                            <td><?= $value['rak']; ?></td>
                                            <td><?= $value['lantai']; ?></td>
                                            <td><?= $value['jumlah']; ?></td>
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
<div class="modal fade" id="persediaanModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form id="form-persediaan">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Brand</label>
                                <select class="form-control" id="id_barang" name="id_barang">
                                    <option value="">Pilih brand</option>
                                    <?php
                                    foreach ($barang as $key => $value) { ?>
                                        <option value="<?= $value['id_barang']; ?>"><?= $value['nama_brand']; ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" class="form-control" id="stok" name="stok">
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
<div class="modal fade" id="persediaanModal_edit" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form id="form-persediaan-edit">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Brand</label>
                                <input type="hidden" class="form-control" id="id_persediaan_edit" name="id_persediaan_edit">
                                <select class="form-control" id="id_barang_edit" name="id_barang_edit">
                                    <option value="">Pilih brand</option>
                                    <?php
                                    foreach ($barang as $key => $value) { ?>
                                        <option value="<?= $value['id_barang']; ?>"><?= $value['nama_brand']; ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="text" class="form-control" id="stok_edit" name="stok_edit">
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

    function edit(id_persediaan) {
        $.ajax({
            type: 'POST',
            url: '<?= base_url('persediaan/ambil_IdPersediaan') ?>',
            data: {
                id_persediaan: id_persediaan
            },
            dataType: 'json',
            success: function(data) {
                $("#id_persediaan_edit").val(data.id_persediaan);
                $("#id_barang_edit").val(data.id_barang);
                $("#stok_edit").val(data.stok);
            }
        })
    }

    function Hapus(id_persediaan) {
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
                    url: "<?= base_url('Persediaan/hapus') ?>",
                    dataType: "json",
                    data: {
                        id_persediaan: id_persediaan
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            swal({
                                title: 'Data Persediaan',
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

        $("#form-persediaan").validate({
            rules: {
                id_barang: {
                    required: !0
                },
                stok: {
                    required: !0,
                    number: true
                },
            },
            messages: {
                id_barang: 'Belum dipilih',
                stok: {
                    required: 'Tidak boleh kosong',
                    number: 'Harus Angka'

                }
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {
                id_barang = $("#id_barang").val();
                stok = $("#stok").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Persediaan/tambah') ?>",
                    dataType: "json",
                    data: {
                        id_barang: id_barang,
                        stok: stok
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $("#persediaanModal").hide();
                            swall('Ditambah')
                        }

                    }
                })

            }
        })

        $("#form-persediaan-edit").validate({
            rules: {
                id_barang_edit: {
                    required: !0
                },
                stok_edit: {
                    required: !0,
                    number: true
                },
            },
            messages: {
                id_barang_edit: 'Belum dipilih',
                stok_edit: {
                    required: 'Tidak boleh kosong',
                    number: 'Harus Angka'

                }
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                id_persediaan_edit = $("#id_persediaan_edit").val();
                id_barang_edit = $("#id_barang_edit").val();
                stok_edit = $("#stok_edit").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Persediaan/ubah_data') ?>",
                    dataType: "json",
                    data: {
                        id_persediaan_edit: id_persediaan_edit,
                        id_barang_edit: id_barang_edit,
                        stok_edit: stok_edit
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $("#persediaanModal_edit").hide();
                            swall('Diubah')
                        }

                    }
                })

            }
        })


    })
</script>