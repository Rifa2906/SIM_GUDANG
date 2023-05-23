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
                                        <th>Nama Barang</th>
                                        <th>Brand Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Brand Barang</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody></tbody>
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
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="email2">Email Address</label>
                                <input type="email" class="form-control" id="email2" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label for="email2">Email Address</label>
                                <input type="email" class="form-control" id="email2" placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email2">Email Address</label>
                                <input type="email" class="form-control" id="email2" placeholder="Enter Email">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer no-bd">
                <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
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