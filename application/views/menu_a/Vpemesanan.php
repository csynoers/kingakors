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
                                    <th>Nama Pelanggan</th>
                                    <th>Tanggal Pesan</th>
                                    <th>Status Pesanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($pemesanan as $data_pemesanan) {
                                    $data_pemesanan->tgl_pesan_indo = date('d/m/Y', strtotime($data_pemesanan->tgl_pesan));
                                    $data_pemesanan->status_pesanan = '<span style="font-size: 20px" class="badge '.(($data_pemesanan->verifikasi == 'selesai') ? 'badge-success' : 'badge-warning' ).'">'.$data_pemesanan->verifikasi.'</span>';
                                    
                                    // echo json_encode($data_pemesanan);
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
                                            <h5><?= $data_pemesanan->tgl_pesan_indo ?></h5>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?= $data_pemesanan->status_pesanan ?></h5>
                                        </td>
                                        <td class="cart_product_desc">
                                            <a href="<?= base_url("Adm/Cpemesanan/detail-pesanan/{$data_pemesanan->id_pesan}") ?>" class="detail-pesanan border p-2 btn-outline-info" title="Lihat Detail Pesanan">Detail Pesanan</a>
                                            <a href="<?= base_url("Adm/Cpemesanan/update-pesanan/{$data_pemesanan->id_pesan}") ?>" data-id="<?= $data_pemesanan->id_pesan ?>" class="update-pesanan border p-2 btn-outline-primary" title="Update Status Pesanan Ini">Update Status</a>
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

<div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal Body ...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    (function(j){
        j(document).on('click','.detail-pesanan',function(e){
            e.preventDefault();
            // Show the Modal on load
            $("#myModal").modal("show");
        });
        j(document).on('click','.update-pesanan',function(e){
            e.preventDefault();
            // Show the Modal on load
            $("#myModal").modal("show");
        });
    })(jQuery)
</script>