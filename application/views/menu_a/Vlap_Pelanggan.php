<div class="col-9 section-padding-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-title mt-50">
                    <h2>Laporan Data Pelanggan</h2>
                </div>

                <!-- pemaanggilan form Insert data-->
                <a href="<?= base_url('cprint/print_member') ?>" target="_blank">
                    <button class="btn btn-primary">
                        <i class="fa fa-print"></i> Cetak Laporan
                    </button>
                </a>
                <br>
                <!-- selesai pemaanggilan form Insert data-->

                <div class="clearfix mt-15">
                    <table class="table table-responsive table-hover" id="dataTable">
                        <thead>
                            <th>id Pelanggan</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                        </thead>
                        <tbody>
                            <?php foreach ($pelanggan as $data_pelanggan) : ?>
                                <!-- var_dump($data_barang); -->
                                <tr>
                                    <td>
                                        <h5><?= $data_pelanggan->id_pelanggan; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $data_pelanggan->nama_pel; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $data_pelanggan->alamat_lengkap; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $data_pelanggan->no_telp; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $data_pelanggan->email; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $data_pelanggan->username; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $data_pelanggan->pass; ?></h5>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end tampil data -->

</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
