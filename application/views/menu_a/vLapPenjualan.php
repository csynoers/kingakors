<div class="col-9 section-padding-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="cart-title mt-50">
                    <h2>Laporan Data Penjualan</h2>
                    <br>
                </div>

                <!-- pemaanggilan form Insert data-->
                <form class="form-inline" action="<?= base_url('Cprint/Print_penjualan') ?>" method="POST" target="_blank">
                    <div class="form-group mb-2">
                        <label for="printL" class="sr-only">Print Laporan</label>
                        <input type="text" readonly class="form-control-plaintext" id="printL" value="Laporan Yang Diinginkan">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">From</div>
                            </div>
                            <input type="date" onchange="fromDate()" class="form-control" id="from" name="from">
                        </div>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">To</div>
                            </div>
                            <input type="date" class="form-control" id="to" name="to">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2"><i class="fa fa-print"></i> Cetak</button>
                </form>
                <!-- selesai pemaanggilan form Insert data-->

                <div class=" mt-15">
                    <table class="table table-responsive table-hover" width="100%" id="dataTable">
                        <thead>
                            <th>No Pemesanan</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Total Pembelian</th>
                            <th>Total Pembayaran</th>
                            <th>Tanggal Pembelian</th>
                            <th>Print Struct</th>
                        </thead>
                        <tbody>
                            <?php foreach ($penjualan as $data_penjualan) : ?>
                                <!-- <?php print_r($data_penjualan); ?> -->
                                <tr>
                                    <td><?= $data_penjualan->id_pesan ?></td>
                                    <td><?= $data_penjualan->nama_pel ?></td>
                                    <td><?= $data_penjualan->alamat_lengkap ?></td>
                                    <td style="text-align:center">
                                        <?php
                                        $res = $this->db->query("SELECT COUNT(id_det_pem) as j FROM `detail_pemesanan` WHERE id_pesan='{$data_penjualan->id_pesan}'")->result();
                                        foreach ($res as $key) {
                                            echo $key->j;
                                        }
                                        ?>
                                    </td>
                                    <td>Rp. <?= number_format($data_penjualan->jumlah_uang) ?></td>
                                    <td><?= $data_penjualan->tgl_bayar ?></td>
                                  </div>
                                  <td>
                                    <form action="<?= base_url('adm/Clap_penjualan/print_struct') ?>" method="POST" target="_blank">
                                      <input type="hidden" id="id_pesan" name="id_pesan" value="<?= $data_penjualan->id_pesan ?>">
                                      <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Print Struct</button>
                                    </td>
                                    </form>
                                    <br>
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

<script>
    function fromDate() {
        console.log(document.getElementById("from").value);
        document.getElementById("to").setAttribute("min", document.getElementById("from").value);
        document.getElementById("to").value = document.getElementById("from").value;
    }
</script>
