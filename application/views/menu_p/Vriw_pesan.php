    <div class="main-content-wrapper d-flex clearfix">
    <div class="cart-table-area section-padding-50">
        <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
            <div class="cart-title mt-50">
            <h2>Riwayat Pesanan</h2>
        </div>
        <!-- pemaanggilan form Insert data-->
        <form action="" method="post">
        </form>
        <!-- selesai pemaanggilan form Insert data-->
        <div class="cart-table clearfix">

            <!--alert-->
            <?php if ($this->session->flashdata('info') == 'sukses') { ?>
            <div class="">

                <div class="alert alert-sukes">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            <?php } ?>

            <?php if ($this->session->flashdata('info') == 'gagal') { ?>
                <div class="">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
                <?php } ?>
                </div>

                <div class="cart-table clearfix">
                <table class="table table-responsive" id="dataTable">
                    <thead>
                    <tr>
                    <th>No pemesanan</th>
                    <th>Alamat Pengiriman</th>
                    <th>Jumlah Bayar</th>
                    <th>Status Pembayaran</th>
                    <th>Info rek Bank</th>
                    <th>Batalkan Pesanan</th>
                    <th>Detail Pemesanan</th>
                </tr>
                </thead>
                <?php // var_dump($pemesanan);
                ?>
                <?php foreach ($pemesanan as $data_pemesanan) {
                    echo json_encode($data_pemesanan);
                ?>
                    <tbody>
                    <tr>
                        <td class="cart_product_desc">
                            <h5><?php echo $data_pemesanan->id_pesan; ?></h5>
                        </td>
                        <td class="cart_product_desc">
                            <h5><?php echo $data_pemesanan->alamat_lengkap; ?></h5>
                        </td>
                        <td class="cart_product_desc">
                            <h5><?php echo $data_pemesanan->jumlah_uang; ?></h5>
                        </td>
                        <td class="cart_product_desc">
                            <h5><?php echo $data_pemesanan->verifikasi; ?></h5>
                        </td>
                        <td>
                        <form class="" action="<?php echo base_url("Ctm/Cpembayaran/detail_pembayaran"); ?>" method="post">
                            <input type="hidden" name="id" value="<?php echo $data_pemesanan->id_pembayaran; ?>">

                            <button type="submit" class="btn btn-danger"
                            <?php
                                //jika bukti transfer sudah di info pembayaran tidak bisa di lihat
                                if ($data_pemesanan->bukti_transfer != null || $data_pemesanan->verifikasi == 'expired') {
                                echo "disabled";
                                } ?>>Info Pembayaran</button>
                        </form>
                        </td>
                        <td>
                        <form class="" action="<?php echo base_url('Ctm/Cpemesanan/delete_relasi') ?>" method="post">
                            <input type="hidden" name="id_pesan" value="<?php echo $data_pemesanan->id_pesan; ?>">
                            <input type="hidden" name="id_pembayaran" value="<?php echo $data_pemesanan->id_pembayaran; ?>">

                            <button type="submit" class="btn btn-warning"
                            <?php
                            //jika bukti transfer sudah di isi pesanan tidak bisa di batalkan
                            if ($data_pemesanan->bukti_transfer != null  || $data_pemesanan->verifikasi == 'expired') {
                                echo "disabled";
                            } ?>>Batalkan Pesanan</button>
                        </form>
                        </td>
                        <td>
                        <button type="button" class="btn btn-primary" onclick="modalDetail('<?= $data_pemesanan->id_pesan ?>')">Detail Pesanan</button>
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
    </div>
    </div>
    <br><br>

    <div class="modal fade bd-example-modal-xl" id="modDetail" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="modDetailTitle"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <br>
        <div id="result"></div>
    </div>
    <div class="modal-footer">

        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>


    <script type="text/javascript">
    function modalDetail(id) {
    $("#id_pesan").val(id);
    $.ajax({
    url: '<?php echo base_url("Ctm/Criw/getDetailRiwayat/") ?>',
    type: "POST",
    data: {
        id_pesan: id
    },
    // async: false,
    success: function(res) {
        // console.log(res);
        $('#modDetailTitle').html(id);
        $('#result').html(res);
        $('#modDetail').modal('show');
    },
    });
    // console.log(id);
    }
    </script>
