<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pelanggan</title>
</head>

<body>
    <div style="text-align: right;">
        <span style="font-size: 30px;font-weight:bold">KING AKOR'S</span><br>
        <span style="font-weight: bold">furniture & interior design</span><br>
    </div>
    <p style="text-align: center;font-size: 25px; font-weight:bold">LAPORAN MEMBER</p>
    <p style="text-align: center">Desa Singopadu, RT/RW 07/02, Kec. Sidoharjo, Kabupaten Sragen, Jawa Tengah 57281</p>
    <hr>
    <br>
    <table width="100%" border="1" cellspacing="0">
        <thead style="text-align: center">
            <tr>
                <th>id Pelanggan</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pelanggan as $data_pelanggan) : ?>
                <!-- var_dump($data_barang); -->
                <tr>
                    <td style="text-align: center">
                        <h5><?= $data_pelanggan->id_pelanggan; ?></h5>
                    </td>
                    <td style="text-align: center">
                        <h5><?= $data_pelanggan->nama_pel; ?></h5>
                    </td>
                    <td style="text-align: center">
                          <h5><?= $data_pelanggan->alamat; ?></h5>
                    </td>
                    <td style="text-align: center ">
                        <h5><?= $data_pelanggan->no_telp; ?></h5>
                    </td>
                    <td style="text-align: center ">
                        <h5><?= $data_pelanggan->email; ?></h5>
                    </td>
                    <td style="text-align: center">
                        <h5><?= $data_pelanggan->username; ?></h5>
                    </td>
                    <td style="text-align: center">
                          <h5><?= $data_pelanggan->pass; ?></h5>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
