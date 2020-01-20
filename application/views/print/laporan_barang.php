<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Barang</title>
</head>

<body>

    <div style="text-align: right;">
        <span style="font-size: 30px;font-weight:bold">KING AKOR'S</span><br>
        <span style="font-weight: bold">furniture & interior design</span><br>
    </div>
    <p style="text-align: center;font-size: 25px; font-weight:bold">LAPORAN BARANG MASUK</p>
    <p style="text-align: center">Desa Singopadu, RT/RW 07/02, Kec. Sidoharjo, Kabupaten Sragen, Jawa Tengah 57281</p>
    <hr>
    <br>

    <table width="100%">
        <tr>
            <td align="right">
                <span> Tanggal : <?= date("d M Y") ?></span>
            </td>
        </tr><br>

    </table>

    <table width="100%" border="1" cellspacing="0">
        <thead style="text-align: center">
            <tr>
                <th>Id Barang</th>
                <th>Kategori</th>
                <th>Merek</th>
                <th>Keterangan</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($barang as $data_barang) : ?>
                <!-- var_dump($data_barang); -->
                <tr>
                    <td style="text-align: center">
                        <h5><?= $data_barang->id_barang; ?></h5>
                    </td>
                    <td style="text-align: center">
                        <h5><?= $data_barang->nama_kat; ?></h5>
                    </td>
                    <td style="text-align: center">
                        <h5><?= $data_barang->merek; ?></h5>
                    </td>
                    <td style="text-align: center">
                        <h5> &#180; <?= $data_barang->diskripsi; ?></h5>
                    </td>
                    <td>
                        <h5> &#180; Rp. <?= number_format($data_barang->harga); ?></h5>
                    </td>
                    <td style="text-align: center">
                        <h5><?= $data_barang->stok; ?></h5>
                    </td>
                    <td style="text-align: center">
                        <h5><?= $data_barang->tanggal_masuk; ?></h5>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
