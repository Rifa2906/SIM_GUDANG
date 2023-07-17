<div class="content">
    <div class="page-inner">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?= $title; ?></h4>
                        </div>
                        <div class="card-head-row">

                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="email2">Nama</label>
                                    <input type="text" class="form-control" id="pws" placeholder="<?= $user['nama']; ?>">
                                </div>

                                <div class="form-group">
                                    <label for="email2">No Telpon</label>
                                    <input type="text" class="form-control" id="pws" placeholder="<?= $user['no_telpon']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email2">Role</label>
                                    <input type="text" class="form-control" id="pws" placeholder="<?= $user['role']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email2">Alamat</label>
                                    <input type="text" class="form-control" id="pws" placeholder="<?= $user['alamat']; ?>">
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Ganti Password</h4>
                        </div>
                        <div class="card-head-row">

                        </div>
                    </div>
                    <div class="card-body">

                        <form class="mb-5" id="ganti-password">
                            <div class="form-group">
                                <input type="text" name="pl" class="form-control" id="pl" placeholder="Masukan passsword lama">
                            </div>
                            <div class="form-group">
                                <input type="text" name="pb" class="form-control" id="pb" placeholder="Masukan password baru">
                            </div>
                            <div class="form-group">
                                <input type="text" name="kp" class="form-control" id="kp" placeholder="Konfirmasi password">
                            </div>
                            <button type="submit" class="btn btn-primary w-25 mt-3 ml-3">Simpan</button>
                        </form>

                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function error() {
        swal({
            title: 'Ganti password gagal',
            text: 'Password lama tidak sesuai ',
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
    $(document).ready(function() {

        $("#ganti-password").validate({
            rules: {
                pl: {
                    required: !0
                },
                pb: {
                    required: !0
                },
                kp: {
                    required: !0,
                    equalTo: "#pb"
                }
            },
            messages: {
                pl: 'Tidak boleh kosong',
                pb: 'Tidak boleh kosong',
                kp: {
                    required: "Tidak boleh kosong",
                    equalTo: "Password tidak sama"
                }
            },
            errorClass: "error",
            validClass: "valid",
            submitHandler: function() {

                pl = $("#pl").val();
                pb = $("#pb").val();

                $.ajax({
                    method: "POST",
                    url: "<?= base_url('Pengguna/ubah_password') ?>",
                    dataType: "json",
                    data: {
                        pl: pl,
                        kp: kp
                    },
                    success: function(data) {
                        if (data == 1) {
                            swall('Diubah')
                        } else
                        if (data == 0) {
                            error()
                        }

                    }
                })

            }
        })


    })
</script>