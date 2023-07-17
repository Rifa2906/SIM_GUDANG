<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
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

    <div>
        <img src="<?= base_url('assets/logo/logo.jpg'); ?>" style="margin-left: 45%;" width="60" height="60">
        <h3 style="margin-left: 40%;">Industri Hilir Teh</h3>
        <p style="margin-left: 35px;">Jl. Raya Panyileukan No.1, Cipadung Kidul, Kec. Panyileukan, Kota Bandung, Jawa Barat 40614</p>
    </div>
    <hr style="margin-bottom: 30px;">
    <div style="text-align:center">
        <h3> Laporan Barang</h3>
    </div>
    <table id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Masuk</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Rak</th>
                <th>Lantai</th>
                <th>Papan</th>
                <th>Tanggal Kadaluarsa</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $no = 1;
            foreach ($barang_masuk as $key => $value) { ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= date('d F Y', strtotime($value['tanggal_masuk'])) ?></td>
                    <td><?= $value['nama_brand']; ?></td>
                    <td><?= $value['jumlah']; ?></td>
                    <th><?= $value['kode_rak']; ?></th>
                    <th><?= $value['kode_lantai']; ?></th>
                    <th><?= $value['kode_papan']; ?></th>
                    <td><?= date('d F Y', strtotime($value['tanggal_kadaluarsa'])) ?></td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>