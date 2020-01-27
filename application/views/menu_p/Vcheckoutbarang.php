<div class="main-content-wrapper d-flex clearfix">
  <div class="cart-table-area section-padding-50">
    </div>
    <!-- end Update data-->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-12">
          <div class="cart-title mt-50">
            <center>
              <h2>Detail Pembayaran</h2>
          </div>
            <div class="cart-table clearfix" >
            <form id="checkout">
            <hr>
            <table class="table table-responsive">
                <tbody>
                    <input type="hidden" id="id_det_pem" name="id_det_pem" value="<?php echo $data_update->id_det_pem ?>">
                    <tr>
                        <td class="cart_product_desc">
                            <label for="">Nama </label>
                        </td>
                        <td class="cart_product_desc">
                            <h4><?php echo $data_update->merek ?> </h4>
                            <img style="width: 130px;height: 130px;border-radius: 50%;object-fit: cover; display: block;margin-right: auto;margin-left: auto;" id="upload_preview2" src="<?php echo base_url("assets/uploads/".$data_update->gambar)?>" style="width: 300px;" />
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_product_desc">
                            <label for="">Jumlah Pesan </label>
                        </td>
                        <td class="cart_product_desc">
                            <label><?php echo $data_update->jumlah_pesan ?> </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_product_desc">
                            <label for="">Harga Barang </label>
                        </td>
                        <td class="cart_product_desc">
                            <label>Rp. <?php echo number_format($data_update->harga) ?> </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_product_desc">
                            <label for="">Alamat Pengiriman </label>
                        </td>
                        <td class="cart_product_desc">
                            <label for="">: <?php echo @$alamat_pengiriman->alamat_lengkap ?> </label>
                            <input type="hidden" id="id_al_peng" name="id_al_peng" value="<?php echo @$alamat_pengiriman->id_al_peng ?>">
                            <button style="background-color: #2f82e4; color: white" class="btn btn-primary">
                            <a class="fa fa-eye" href="<?php echo base_url("Ctm/Cprofil"); ?>"> Ubah Alamat Pengiriman
                            </a></button>
                        </td>
                    </tr>
                    <!-- <tr class='d-none'>
                        <td class="cart_product_desc">
                            <label for="">Metode Pembayaran</label>
                        </td>
                        <td class="cart_product_desc">
                            <select class="form-control" name="id_met_pem" id="id_met_pem">
                                <option value="">Pilih</option>
                                <?php foreach ($metode_pembayaran as $data_metode_pembayaran) {?>
                                    <?php if ($data_metode_pembayaran->id_met_pem ==$data_pembayaran->id_pembayaran): ?>
                                    <option value="<?php echo @$data_metode_pembayaran->id_met_pem ?>" selected><?php echo $data_pembayaran->Transfer_Bank ?></option>
                                    <?php else: ?>
                                        <option value="<?php echo @$data_metode_pembayaran->id_met_pem;?>"><?php echo $data_metode_pembayaran->Transfer_Bank;?></option>
                                    <?php endif; ?>
                                <?php } ?>
                            </select><br><br>
                        </td>
                    </tr> -->
                    <tr>
                        <td class="cart_product_desc">
                            <label for="">Total Harga Barang </label>
                        </td>
                        <td class="cart_product_desc">
                            <label id="label_total_harga_barang" for="">: Rp. <?php echo number_format(@$data_update->harga * @$data_update->jumlah_pesan);?></label><br>
                            <input type="hidden" name="total_harga_barang"id="total_harga_barang" value="<?php echo $total_harga_barang = @$data_update->harga * @$data_update->jumlah_pesan;?>">
                        </td>
                    </tr>
                    <tr>
                         <td class="cart_product_desc">
                            <label for="">Ongkir </label>
                        </td>
                        <td class="cart_product_desc">
                            <label id="label_ongkir" for="">: Rp. <?php echo number_format(@$total_ongkir) ?></label><br>
                            <input type="hidden" id="ongkir" value="<?php echo @$total_ongkir ?>" name="ongkir">
                        </td>
                    </tr>
                    <tr>
                        <td class="cart_product_desc">
                            <label for="">Total Harga </label>
                        </td>
                        <td class="cart_product_desc">
                            <label id="label_total_harga" for="">: Rp. <?php echo number_format(@$total_ongkir + @$total_harga_barang) ?></label><br>
                            <input type="hidden" name="total_harga" value="<?php echo @$total_ongkir + @$total_harga_barang ?>" id="total_harga">
                        </td>
                    </tr>
                </tbody>
            </table>
            <button type="button" onclick="simpan_alamat_pengiriman();"class="btn btn-success" name="button"> Simpan </button><br><br>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->

<script>

function simpan_alamat_pengiriman(){
    var id_det_pem = $('#id_det_pem').val();
    // var id_met_pem = $('#id_met_pem').val();
    var id_al_peng = $('#id_al_peng').val();
    var ongkir = $('#ongkir').val();
    var total_harga = $('#total_harga').val();
    var total_harga_barang = $('#total_harga_barang').val();
    let text ;
// if (id_met_pem == '' || ongkir == '' || total_harga == '' || total_harga_barang == '') {
if ( ongkir == '' || total_harga == '' || total_harga_barang == '') {
      alert('Form masih ada yang kosong');
    } else {
$.ajax({
        url: '<?php echo base_url("Ctm/CKeranjang/lakukan_pemesanan_satuan/") ?>',
        type: "POST",
        data: {
            id_al_peng : id_al_peng,
            id_det_pem : id_det_pem,
            // id_met_pem : id_met_pem,
            ongkir : ongkir,
            total_harga : total_harga,
            total_harga_barang : total_harga_barang,
        },
        async: true,
        success: function (arr) {
            // console.log(arr.status);
            text = JSON.stringify(arr);
            // console.log(text);
            // die();
            // location.href   = "<?php echo base_url('Ctm/Cpembayaran/detail_pembayaran/') ?>"+arr;
        },
        error: function (arr,textStatus,errorThrown) {
            // console.log(JSON.stringify(arr));
            // console.log("AJAX error : "+textStatus+' : '+errorThrown);
        }
      });
      }
}

function hitung_ongkir(){
    var id_al_peng = $('#id_al_peng').val();
    var total_harga_barang = $('#total_harga_barang').val();
    var total_harga = 0;
$.ajax({
        url: '<?php echo base_url("Ctm/Ckeranjang/hitung_ongkir/") ?>'+id_al_peng,
        success: function (data) {
            console.log(data);
        total_harga = parseInt(total_harga_barang) + parseInt(data);
        $('#ongkir').val(data);
        $('#label_ongkir').html(data);
        $('#label_total_harga').html(total_harga);
        $('#total_harga').val(total_harga);
        },
      });
}
</script>
