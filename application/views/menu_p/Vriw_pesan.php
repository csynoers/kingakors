<div class="col-sm-12 mt-3 mb-3">
    <h2>Riwayat Pesanan</h2>
    <hr>
    <table class="table" id="dataTable">
        <thead>
            <tr>
                <th>No pemesanan</th>
                <th>Alamat Pengiriman</th>
                <th>Jumlah Bayar</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            foreach ($pemesanan as $data_pemesanan) {
                $data_pemesanan->jumlah_uangText    = "Rp. ".number_format($data_pemesanan->jumlah_uang);
                $data_pemesanan->verifikasiMod      = strtoupper($data_pemesanan->verifikasi);
                if ( $data_pemesanan->verifikasi=='belum bayar' ) {
                    $data_pemesanan->aksi = '
                        <a href="javascript:void(0)" data-id="'.$data_pemesanan->id_pesan.'" class="detailPesanan btn-outline-primary border p-2">Detail Pesanan</a>
                        <a href="'.base_url('Ctm/Cpemesanan/delete_relasi/?id_pesan='.$data_pemesanan->id_pesan.'&id_pembayaran='.$data_pemesanan->id_pembayaran).'" target="_blank" class="btn-outline-warning border p-2">Batalkan Pesanan</a>
                        <a href="'.$data_pemesanan->invoice_url.'" class="btn-outline-info border p-2">Bayar Sekarang</a>
                    ';
                } else {
                    $data_pemesanan->aksi = '<a href="javascript:void(0)" data-id="'.$data_pemesanan->id_pesan.'" class="detailPesanan btn-outline-primary border p-2">Detail Pesanan</a>';
                }
            // echo json_encode($data_pemesanan);
                ?>
                    
                    <tr>
                        <td class="cart_product_desc">
                            <h5><?php echo $data_pemesanan->id_pesan; ?></h5>
                        </td>
                        <td class="cart_product_desc">
                            <h5><?php echo $data_pemesanan->alamat_lengkap; ?></h5>
                        </td>
                        <td class="cart_product_desc">
                            <h5><?php echo $data_pemesanan->jumlah_uangText; ?></h5>
                        </td>
                        <td class="cart_product_desc">
                            <h5><?php echo $data_pemesanan->verifikasiMod; ?></h5>
                        </td>
                        <td>
                            <?php echo $data_pemesanan->aksi; ?>
                        </td>
                    </tr>
                    <?php 
                } 
            ?>
        </tbody>
    </table>
</div>

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
    $(document).on('click','.detailPesanan',function(e){
        // e.preventDefault();
        let id_pesan = $(this).data('id');
        $.ajax({
            url: '<?php echo base_url("Ctm/Criw/getDetailRiwayat/") ?>',
            type: "GET",
            data: {
                id_pesan: id_pesan
            },
            // async: false,
            success: function(res) {
                console.log(res);
                $('#modDetailTitle').html(id_pesan);
                $('#result').html(res);
                $('#modDetail').modal('show');
            },
        });
    });
    // function modalDetail(id) {
    // $("#id_pesan").val(id);
    // $.ajax({
    // url: '<?php //echo base_url("Ctm/Criw/getDetailRiwayat/") ?>',
    // type: "POST",
    // data: {
    //     id_pesan: id
    // },
    // // async: false,
    // success: function(res) {
    //     // console.log(res);
    //     $('#modDetailTitle').html(id);
    //     $('#result').html(res);
    //     $('#modDetail').modal('show');
    // },
    // });
    // // console.log(id);
    // }
    </script>
