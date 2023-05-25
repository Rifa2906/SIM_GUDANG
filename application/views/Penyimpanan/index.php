<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title; ?></h4>
                            <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#penyimpananModal">
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
                                        <th>Nama Brand</th>
                                        <th>Rak</th>
                                        <th>Terisi</th>
                                        <th>Sisa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Brand</th>
                                        <th>Rak</th>
                                        <th>Terisi</th>
                                        <th>Sisa</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php

                                    $no = 0;
                                    foreach ($penyimpanan as $key => $value) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['nama_brand'] ?></td>
                                            <td><?= $value['kode_rak'] ?></td>
                                            <td><?= $value['terisi'] ?></td>
                                            <td><?= $value['sisa'] ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#penyimpananModal_edit" onclick="edit(<?= $value['id_penyimpanan'] ?>)" class="btn btn-info btn-border btn-sm">
                                                    <span class="btn-label">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </span>
                                                </button>

                                                <button onclick="Hapus(<?= $value['id_penyimpanan'] ?>)" class="btn btn-danger btn-border btn-sm">
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
<div class="modal fade" id="penyimpananModal" tabindex="-1" role="dialog" aria-hidden="true">
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
                <form id="form-penyimpanan">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Brand</label>
                                <select class="form-control" id="id_persediaan" name="id_persediaan">
                                    <option value="">Pilih brand</option>
                                    <?php
                                    foreach ($persediaan as $key => $value) { ?>
                                        <option value="<?= $value['id_persediaan']; ?>"><?= $value['nama_brand']; ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Jumlah Stok </label>
                                <input type="text" class="form-control" id="jumlah_stok" name="jumlah_stok" readonly>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Kode Rak</label>
                                <select class="form-control" id="id_rak" name="id_rak">
                                    <option value="">Pilih rak</option>
                                    <?php
                                    foreach ($rak as $key => $value) { ?>
                                        <option value="<?= $value['id_rak']; ?>"><?= $value['kode_rak']; ?></option>

                                    <?php
                                    }
                                    ?>
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
    // $('#id_rak').click(function() {

    //     $.ajax({
    //         method: 'POST',
    //         url: '<?= base_url('Persediaan/sisa_kapasitas') ?>',
    //         data: {
    //             id_rak: $(this).val()
    //         },
    //         dataType: 'json',
    //         success: function(data) {
    //             $('#sisa_kapasitas').text(data.sisa_kapasitas)
    //         }
    //     })
    // })
    $("#id_persediaan").click(function() {
        $.ajax({
            method: 'POST',
            url: '<?= base_url('Penyimpanan/jumlah_stok') ?>',
            data: {
                id_persediaan: $(this).val()
            },
            dataType: 'json',
            success: function(data) {
                $('#jumlah_stok').val(data.jumlah_stok)
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

        $("#form-penyimpanan").validate({
            rules: {
                id_persediaan: {
                    required: !0
                },
                id_rak: {
                    required: !0
                },
            },
            messages: {
                id_persediaan: 'Belum dipilih',
                id_rak: 'Belum dipilih',


            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {
                id_persediaan = $("#id_persediaan").val();
                id_rak = $("#id_rak").val();
                jumlah_stok = $("#jumlah_stok").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Penyimpanan/tambah') ?>",
                    dataType: "json",
                    data: {
                        id_persediaan: id_persediaan,
                        id_rak: id_rak,
                        jumlah_stok: jumlah_stok
                    },
                    success: function(data) {
                        if (data.status == 1) {
                            $("#penyimpananModal").hide();
                            swall('Ditambah')
                        }

                    }
                })

            }
        })


    })
</script>