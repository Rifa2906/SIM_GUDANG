<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title; ?></h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#barang_keluarModal">
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
                                        <th>Tanggal Keluar</th>
                                        <th>Nama Store</th>
                                        <th>Cabang</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Keluar</th>
                                        <th>Nama Store</th>
                                        <th>Cabang</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($bk as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= date('d F Y', strtotime($value['tanggal_keluar'])) ?></td>
                                            <td><?= $value['nama_store']; ?></td>
                                            <td><?= $value['nama_cabang']; ?></td>
                                            <td><?= $value['nama_produk']; ?></td>
                                            <td><?= $value['jumlah']; ?></td>
                                            <td>
                                                <?php
                                                if ($value['status'] == "Belum Disetujui") { ?>
                                                    <span class="badge badge-warning"><?= $value['status']; ?></span>

                                                <?php
                                                } elseif ($value['status'] == "Sudah Disetujui") { ?>
                                                    <span class="badge badge-success"><?= $value['status']; ?></span>
                                                <?php
                                                } elseif ($value['status'] == "Ditolak") { ?>
                                                    <span class="badge badge-danger"><?= $value['status']; ?></span>
                                                <?php
                                                }
                                                ?>

                                            </td>
                                            <td>
                                                <?php
                                                if ($value['status'] == "Sudah Disetujui" || $value['status'] == "Ditolak") {
                                                    # code...
                                                } else { ?>

                                                    <button onclick="Hapus(<?= $value['id_keluar'] ?>)" class="btn btn-danger btn-border btn-sm">
                                                        <span class="btn-label">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                    </button>
                                                <?php
                                                }
                                                ?>


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
<div class="modal fade" id="barang_keluarModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    Form Tambah
                </h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_barang_keluar">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Brand</label>
                                <select name="id_barang" id="id_barang" class="form-control">
                                    <option value="">Plih Nama Brand</option>
                                    <?php
                                    foreach ($barang as $key => $value) { ?>
                                        <option value="<?= $value['id_barang']; ?>"><?= $value['nama_brand']; ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal keluar</label>
                                <input type="date" class="form-control" name="tanggal_keluar" id="tanggal_keluar">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Store</label>
                                <input type="text" class="form-control" name="nama_store" id="nama_store">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Cabang</label>
                                <input type="text" class="form-control" name="cabang" id="cabang">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah">
                            </div>
                        </div>
                    </div>

            </div>
            <div class="modal-footer no-bd">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="button" class="btn btn-danger kembali" data-dismiss="modal">Kembali</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(".close, .kembali").click(function() {
        $('#id_barang').val('');
        $('#tanggal_keluar').val('');
        $('#jumlah').val('');
        location.reload()
    })

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

        $("#form_barang_keluar").validate({
            rules: {
                id_barang: {
                    required: !0
                },
                tanggal_keluar: {
                    required: !0
                },
                jumlah: {
                    required: !0,
                    number: true
                },
                nama_store: {
                    required: !0
                },
                cabang: {
                    required: !0
                }
            },
            messages: {
                tanggal_keluar: 'Tidak boleh kosong',
                nama_store: 'Tidak boleh kosong',
                cabang: 'Tidak boleh kosong',
                id_barang: 'Belum Dipilih',
                jumlah: {
                    required: 'Tidak boleh kosong',
                    number: 'Harus Angka'

                }
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                id_barang = $("#id_barang").val();
                nama_store = $("#nama_store").val();
                cabang = $("#cabang").val();
                tanggal_keluar = $("#tanggal_keluar").val();
                jumlah = $("#jumlah").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Barang_keluar/tambah') ?>",
                    dataType: "json",
                    data: {
                        id_barang: id_barang,
                        nama_store: nama_store,
                        cabang: cabang,
                        tanggal_keluar: tanggal_keluar,
                        jumlah: jumlah,
                    },
                    success: function(data) {
                        if (data == 1) {
                            $("#barang_keluarModal").hide();
                            swall('Ditambah')
                        }

                    }
                })

            }
        })


    })
</script>