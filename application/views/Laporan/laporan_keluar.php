<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title; ?></h4>
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
                                        <th>Jumlah Keluar</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Brand</th>
                                        <th>Jumlah Keluar</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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

    function setuju(id_persetujuan) {


        swal({
            title: 'Apakah kamu yakin?',
            text: "Ingin menyetujuinya!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'ya',
                    className: 'btn btn-success'
                },
                cancel: {
                    text: 'tidak',
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Persetujuan/setuju') ?>",
                    data: {
                        id_persetujuan: id_persetujuan
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data == 1) {
                            swall('Disetujui')
                        }
                    }
                })


            } else {
                swal.close();
            }
        });
    }

    function ditolak(id_persetujuan) {


        swal({
            title: 'Apakah kamu yakin?',
            text: "Ingin menyetujuinya!",
            type: 'warning',
            buttons: {
                confirm: {
                    text: 'ya',
                    className: 'btn btn-success'
                },
                cancel: {
                    text: 'tidak',
                    visible: true,
                    className: 'btn btn-danger'
                }
            }
        }).then((Delete) => {
            if (Delete) {

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Persetujuan/ditolak') ?>",
                    data: {
                        id_persetujuan: id_persetujuan
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data == 1) {
                            swall('Ditolak')
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




    })
</script>