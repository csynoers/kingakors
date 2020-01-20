<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
</head>

<body>
    <div style="text-align: right;">
        <span style="font-size: 30px;font-weight:bold">KING AKOR'S</span><br>
        <span style="font-weight: bold">furniture & interior design</span><br>
    </div>
    <p style="text-align: center;font-size: 25px; font-weight:bold">LAPORAN PENJUALAN</p>
    <p style="text-align: center">Desa Singopadu, RT/RW 07/02, Kec. Sidoharjo, Kabupaten Sragen, Jawa Tengah 57281</p>
    <hr>
    <p>
        <?php
        if ($a == "") {
            echo " ";
        } else {
            echo "Laporan Penjualan Terhitung Tanggal {$a} Sampai {$b}<hr>";
        }
        ?>
    </p>
    <br>
    <table width="100%" border="1" cellspacing="0">
        <thead style="text-align: center">
            <tr>
                <th>No Pemesanan</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Total Pembelian</th>
                <th>Total Pembayaran</th>
                <th>Tanggal Pembelian</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($penjualan as $data_penjualan) : ?>
                <tr>
                    <td style="text-align:center"><?= $data_penjualan->id_pesan ?></td>
                    <td style="padding-left: 10px"><?= $data_penjualan->nama_pel ?></td>
                    <td style="padding-left: 10px"><?= $data_penjualan->alamat ?></td>
                    <td style="text-align:center">
                        <?php
                        $res = $this->db->query("SELECT COUNT(id_det_pem) as j FROM `detail_pemesanan` WHERE id_pesan='{$data_penjualan->id_pesan}'")->result();
                        foreach ($res as $key) {
                            echo $key->j;
                        }
                        ?>
                    </td>
                    <td style="padding-left: 10px">Rp. <?= number_format($data_penjualan->jumlah_uang) ?></td>
                    <td style="text-align: center"><?= $data_penjualan->tgl_bayar ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
