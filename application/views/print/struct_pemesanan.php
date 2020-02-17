<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struct Pemesanan</title>
</head>

<body>
    <div style="text-align: right;">
        <span style="font-size: 30px;font-weight:bold">KING AKOR'S</span><br>
        <span style="font-weight: bold">furniture & interior design</span><br>
    </div>
    <p style="text-align: center;font-size: 25px; font-weight:bold">NOTA PEMBELIAN</p>
    <p style="text-align: center">Desa Singopadu, RT/RW 07/02, Kec. Sidoharjo, Kabupaten Sragen, Jawa Tengah 57281</p>
    <hr>
    <?php foreach ($pembayaran as $list) : ?>
        <table width="100%">
            <tr>
                <td>
                    <span>No Nota: <?= $list->id_pesan ?></span>
                </td>
                <td align="right">
                    <span> Tanggal : <?= date("d M Y") ?></span>
                </td>
            </tr>
        </table>
        <hr>
        <table width="100%">
            <tr>
                <td>
                    <table>
                        <tr>
                            <td>Nama</td>
                            <td>: <?= $list->nama_pel ?></td>
                        </tr>
                        <tr>
                            <td>No Telepon</td>
                            <td>: <?= $list->no_telp ?></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>: <?= $list->alamat_lengkap ?></td>
                        </tr>
                    </table>
                <?php endforeach ?>
                </td>
                <td style="vertical-align: top;">
                    <table style="display: none">
                        <tr>
                            <td>asdfjl</td>
                            <td>asdfjl</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table style="width:100%" border="1" cellspacing="0">
            <tr align="center">
                <th>Kode Barang</th>
                <th>Merek</th>
                <th>Harga Satuan</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
            <?php
            $jTotal = 0;
            ?>
            <?php foreach ($det_pesanan->result() as $list) : ?>
                <?php
                $total = $list->jumlah_pesan * $list->harga;
                $jTotal += $total;
                ?>
                <tr>
                    <td><?= $list->id_barang ?></td>
                    <td><?= $list->merek ?></td>
                    <td>Rp. <?= number_format($list->harga) ?> ,-</td>
                    <td align="center"><?= $list->jumlah_pesan ?></td>
                    <td>Rp. <?= number_format($total) ?> ,-</td>
                </tr>
            <?php endforeach ?>
            <tr>
                <td colspan="4">Total Yang Harus Dibayar</td>
                <td>Rp. <?= number_format($jTotal) ?> ,-</td>
            </tr>
        </table>
</body>

</html>
