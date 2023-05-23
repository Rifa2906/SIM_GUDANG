<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Atlantis Lite - Bootstrap 4 Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <!--   Core JS Files   -->
    <script src="<?= base_url('assets'); ?>/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/js/core/popper.min.js"></script>
    <script src="<?= base_url('assets'); ?>/assets/js/core/bootstrap.min.js"></script>

    <script src="<?= base_url('assets'); ?>/assets/js/plugin/jquery-validation/jquery.validate.min.js"></script>

    <link rel="icon" href="<?= base_url('assets'); ?>/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?= base_url('assets'); ?>/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['<?= base_url('assets'); ?>/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/assets/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?= base_url('assets'); ?>/assets/css/demo.css">
</head>

<body>
    <div class="wrapper">
        <div class="main-header">