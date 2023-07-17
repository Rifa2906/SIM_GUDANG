<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_print; ?></title>
    <style>
        #table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #table td,
        #table th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #table tr:hover {
            background-color: #ddd;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: left;
            background-color: #177dff;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container" style="width: 80%;">
        <div class="content" style="margin-left: 20%;">
            <div>
                <img src="<?= base_url('assets/logo/logo.jpg'); ?>" style="margin-left: 45%;" width="60" height="60">
                <h3 style="margin-left: 40%;">Industri Hilir Teh</h3>
                <center>
                    <p>Jl. Raya Panyileukan No.1, Cipadung Kidul, Kec. Panyileukan, Kota Bandung, Jawa Barat 40614</p>
                </center>

            </div>
            <hr style="margin-bottom: 30px;">
            <div style="text-align:center">
                <h3> Laporan Barang</h3>
            </div>
            <table id="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Barang</th>
                        <th>Nama Brand</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $no = 1;
                    foreach ($barang as $key => $value) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $value['kode_barang']; ?></td>
                            <td><?= $value['nama_brand']; ?></td>
                        </tr>

                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </div>

</body>

</html>

<script>
    window.print();
</script>