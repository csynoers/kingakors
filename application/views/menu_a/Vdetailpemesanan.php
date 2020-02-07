<div class="cart-table-area section-padding-50">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="cart-title mt-50">
                <h2>Detail Pemesanan</h2>
            </div>
        </div>
        <div class="col-12 col-lg-12">
                <?= json_encode($pesanan) ?>
            <div class="table-responsive">
                <table>
                    <tr>
                        <td>No Pemesanan</td>
                        <td>: <?= $pesanan->id_pesan ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pembeli</td>
                        <td>: <?= $pesanan->nama_pel ?></td>
                    </tr>
                    <!-- <th>Nama Pembeli</th>
                    <th>Alamat Pembeli</th>
                    <th>Total Pembelian</th>
                    <th>Total Pembayaran</th>
                    <th>Metode Pembayaran</th>
                    <th>Tanggal Pembelian</th> -->
                </table>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <?= $thead ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $tbody ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>