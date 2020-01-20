<div class="col-9 section-padding-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-title mt-50">
                    <h2>Laporan Data Barang</h2>
                </div>

                <!-- pemaanggilan form Insert data-->
                <a href="<?= base_url('cprint/print_barang') ?>" target="_blank">
                    <button class="btn btn-primary">
                        <i class="fa fa-print"></i> Cetak Laporan
                    </button>
                </a>
                <br>
                <!-- selesai pemaanggilan form Insert data-->

                <div class="clearfix mt-15">
                    <table class="table table-responsive table-hover" id="dataTable">
                        <thead>
                            <th>id Barang</th>
                            <th>Kategori</th>
                            <th>Merek</th>
                            <th>Keterangan</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Tanggal</th>
                        </thead>
                        <tbody>
                            <?php foreach ($barang as $data_barang) : ?>
                                <!-- var_dump($data_barang); -->
                                <tr>
                                    <td>
                                        <h5><?= $data_barang->id_barang; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $data_barang->nama_kat; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $data_barang->merek; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $data_barang->diskripsi; ?></h5>
                                    </td>
                                    <td>
                                        <h5>Rp. <?= number_format($data_barang->harga); ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $data_barang->stok; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?= $data_barang->tanggal_masuk; ?></h5>
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
