<div class="col-9 cart-table-area section-padding-50">
    <div class="container-fluid">

        <!-- Update data-->
        <?php if (isset($update)) { ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="box">
                        <!-- header -->
                        <div class="box-header with-border">
                            <h3 class="box-title">Konfirmasi Pembayaran</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <!-- body -->
                        <?php
                            echo '<pre>'; print_r($detail_pembayaran); echo '</pre>';
                        ?>
                        <div class="box-body">
                            <form class="" action="<?= base_url('Adm/Cpembayaran/update_action') ?>" method="post">
                                <div class="form-group">
                                    <label for="">Nama Pemesan</label>
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $detail_pembayaran->nama_pel ?>" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="">Id Pesanan</label>
                                    <input type="text" class="form-control" name="id_pesan" id="id_pesan" value="<?= $data_update->id_pesan ?>" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="">Total yang harus dibayar</label>
                                    <input type="text" class="form-control" name="jumlah_bayar" id="jumlah_bayar" value="Rp. <?= number_format($data_update->jumlah_uang) ?>,-" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="">Id Pembayaran</label>
                                    <input type="text" class="form-control" name="id_pembayaran" id="id_pembayaran" value="<?= "$data_update->id_pembayaran"; ?>" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Pengirim</label>
                                    <input type="text" class="form-control" name="nama_peng" id="nama_peng" value="<?= "$data_update->nama_peng"; ?>" readonly="">
                                </div>
                                    <div class="col-sm-4 pl-0">
                                        <img src="<?= base_url('assets/uploads/') . $data_update->bukti_transfer ?>" class="img img-thumbnail" alt="thumbnail" srcset="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- <input type="text" class="form-control" name="verifikasi" id="verifikasi" value="<?= "$data_update->verifikasi"; ?>"> -->
                                    <label for="">Konfirmasi</label>
                                </div>
                                <div class="form-group row ml-1">
                                    <div class="col-sm-2 ml-0">
                                        <input class="form-check-input" type="radio" name="verifikasi" id="ya" value="1" <?= ($data_update->verifikasi == 'selesai') ? 'checked="checked"' : '' ?>>
                                        <label class="form-check-label" for="ya">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="col-sm-2">
                                        <input class="form-check-input" type="radio" name="verifikasi" id="tidak" value="0" <?= ($data_update->verifikasi != 'selesai') ? 'checked="checked"' : '' ?>>
                                        <label class="form-check-label" for="tidak">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group"><br>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php } else { ?>
    <!-- end Update data-->
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="cart-title mt-50">
                <h2>Pembayaran</h2>
            </div>
            <!-- selesai pemaanggilan form Insert data-->

            <div class="cart-table clearfix">
                <table class="table table-responsive" id="dataTable">
                    <thead>
                        <tr>
                            <th>Id Pembayaran</th>
                            <th>pelanggan</th>
                            <th>Total pembayaran</th>
                            <th>Tanggal Bayar</th>
                            <th>Verifikasi</th>
                            <th>Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($pembayaran as $data_pembayaran) {
                                $data_pembayaran->verifikasi = '<span style="font-size: 20px" class="badge '.(($data_pembayaran->verifikasi == 'selesai') ? 'badge-success' : 'badge-warning' ).'">'.$data_pembayaran->verifikasi.'</span>';
                            ?>
                            <tr>
                                <td>
                                    <h5><?= $data_pembayaran->id_pembayaran; ?></h5>
                                </td>
                                <td>
                                    <h5><?= $data_pembayaran->nama_pel; ?></h5>
                                </td>
                                <td>
                                    <h5><?= $data_pembayaran->jumlah_uang; ?></h5>
                                </td>
                                <td>
                                    <h5><?= $data_pembayaran->tgl_bayar ?></h5>
                                </td>
                                <td>
                                    <?= $data_pembayaran->verifikasi ?>
                                </td>
                                <td>
                                    <a href="<?= base_url("Adm/Cpembayaran/update/" . $data_pembayaran->id_pembayaran); ?>">
                                        <input type="button" class="btn btn-warning" value="Update">
                                    </a>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ##### Main Content Wrapper End ##### -->

<?php } ?>
