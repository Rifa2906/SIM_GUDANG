<div class="login-form-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-xl-6">
                <div class="form-input-content">
                    <div class="card login-form mb-0 w-75" style="margin-left: 40px;">
                        <div class="card-body pt-5">
                            <a class="text-center">
                                <img class="mb-3" style="margin-left: 40%;" src="<?= base_url('assets/logo/logo.jpg'); ?>" width="50" height="50">
                                <h3>Industri Hilir Teh</h3>
                            </a>
                            <?= $this->session->flashdata('message'); ?>
                            <form class="mt-4 mb-5" method="POST">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukan Email">
                                    <small class="text-danger"> <?= form_error('email') ?></small>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Masukan password">
                                    <small class="text-danger"> <?= form_error('password') ?></small>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Masuk</button>
                            </form>
                            <p class="mt-5 login-form__footer">Lupa kata sandi? <a href="page-register.html" class="text-primary">Klik disini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>