<div class="cart-table-area section-padding-50">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="cart-title mt-50">
                <h2>Detail Pemesanan</h2>
            </div>
        </div>
        <div class="col-12 col-lg-12">
            <table>
                <tr>
                    <td>No Pemesanan</td>
                    <td>: <?= $pesanan['id_pesan'] ?></td>
                </tr>
                <!-- <th>Nama Pembeli</th>
                <th>Alamat Pembeli</th>
                <th>Total Pembelian</th>
                <th>Total Pembayaran</th>
                <th>Metode Pembayaran</th>
                <th>Tanggal Pembelian</th> -->
            </table>
            <hr>
            <div class="table-responsive">
                <?= json_encode($pesanan) ?>
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