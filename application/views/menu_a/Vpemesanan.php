<div class="cart-table-area section-padding-50">
    <div class="">
        <div class="">

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="cart-title mt-50">
                        <h2>Pemesanan</h2>
                    </div>
                    <!-- selesai pemaanggilan form Insert data-->
                    <div class="cart-table clearfix">
                        <table class="table table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    <th>Id Pesan</th>
                                    <th>pelanggan</th>
                                    <th>barang</th>
                                    <th>jumlah pesan</th>
                                    <th>total harga</th>
                                    <th>alamat pengiriman</th>
                                    <th>tanggal pesan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pemesanan as $data_pemesanan) {
                                    echo json_encode($data_pemesanan);
                                    $data_pemesanan->total_harga_barangText    = "Rp. ".number_format($data_pemesanan->total_harga_barang);
                                    ?>
                                    <tr>
                                        <td class="cart_product_desc">
                                            <h5><?= $data_pemesanan->id_pesan; ?></h5>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?= $data_pemesanan->nama_pel; ?></h5>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?= $data_pemesanan->merek; ?></h5>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?= $data_pemesanan->jumlah_pesan; ?></h5>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?= $data_pemesanan->total_harga_barangText; ?></h5>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?= $data_pemesanan->alamat_lengkap; ?></h5>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?= $data_pemesanan->tgl_pesan ?></h5>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ##### Main Content Wrapper End ##### -->