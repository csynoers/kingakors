<!-- ##### Main Content Wrapper Start ##### -->
<div class="main-content-wrapper d-flex clearfix">

  <div class="cart-table-area section-padding-50">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-title">
                            <h2>Detail Pembayaran</h2>
                        </div>

                        <form action="#" method="post">
                          <div class="row">
                              <div class="col-12 mb-3">
                                  <div class="row">
                                    <div class="col-11">
                                      <input type="text" readonly class="form-control" value="<?php echo $alamat_pengiriman->alamat_lengkap ?>" placeholder="<?= $alamat_pengiriman->alamat_lengkap ?>">
                                      <input type="hidden" id="id_al_peng" value="<?php echo $alamat_pengiriman->id_al_peng ?>" placeholder="<?= $alamat_pengiriman->alamat_lengkap ?>">
                                      <input type="hidden" id="total_harga_barang" value="<?= $total_harga ?>">
                                      <input type="hidden" id="ongkir" value="<?= $total_ongkir ?>">
                                      <input type="hidden" id="total_harga" value="<?= $total_harga+$total_ongkir ?>">
                                    </div>
                                    <div class="col-1">
                                      <a href="<?php echo base_url('ctm/Cprofil'); ?>">
                                        <div class="btn btn-warning float-right" style="padding:16px 20px 16px 20px">
                                          <i class="fa fa-pencil"></i>
                                        </div>
                                      </a>
                                    </div>
                                  </div>
                              </div>
                              <div class="col-12 mb-3">
                                <hr>
                                <?php
                                  // print_r($keranjang);
                                ?>
                                <table class="table table-striped">
                                  <thead>
                                    <tr>
                                      <th>Thumbnail</th>
                                      <th>Name</th>
                                      <th>Price</th>
                                      <th>Quantity</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      foreach ($keranjang as $key => $value) {
                                        $value->hargaText = 'Rp. '.number_format($value->harga);
                                        $value->gambarUrl = base_url("assets/uploads/".$value->gambar);
                                        echo "
                                          <tr>
                                            <td><a href='#'><img src='{$value->gambarUrl}' alt='Product'></a></td>
                                            <td>{$value->merek}</td>
                                            <td>{$value->hargaText}</td>
                                            <td>{$value->jumlah_pesan}</td>
                                          </tr>
                                        ";
                                      }
                                    ?>
                                  </tbody>
                                </table>
                            <select class="w-100 d-none" id="id_met_pem" >
                                <option value="" >Pilih Metode Pembayaran</option>
                                <?php
                                  foreach ($metode_pembayaran as $dataMetPem) {
                                    if ($dataMetPem->id_met_pem == $data_pembayaran->id_pembayaran) {
                                      ?>
                                      <option value="<?= $dataMetPem->id_met_pem ?>" selected><?= $dataMetPem->Transfer_Bank ?></option>
                                      <?php
                                    }else {
                                      ?>
                                      <option value="<?= $dataMetPem->id_met_pem ?>"><?= $dataMetPem->Transfer_Bank ?></option>
                                      <?php
                                    }
                                  }
                                ?>
                            </select>
                              </div>
                          </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="cart-summary">
                        <h5>Cart Total</h5>
                        <ul class="summary-table">
                            <li><span>Total Harga :</span> <span>Rp. <?= number_format($total_harga);?></span></li>
                            <hr>
                            <li><span>Jarak antar kota: <?= $data_peng_kota->nm_kota.' Rp.'.number_format($data_peng_kota->biaya)?></span></li>
                            <hr>
                            <li><span>jarak dari kota ke kecamatan: <?= $data_peng_kec->jarak?> Km</span></li>
                            <li><span>biaya per km (1km = 4000)</span></li>
                            <li><span>Rp.<?= number_format($data_peng_kota->biaya) ?> + ( Rp.4.000 * <?= $data_peng_kec->jarak ?> )</span></li>
                            <hr>
                            <li><span>Harga Ongkir:</span> <span>Rp. <?= number_format($total_ongkir);?></span></li>
                            <li><span>Total:</span> <span>Rp. <?= number_format($total_harga + $total_ongkir);?></span></li>
                        </ul>
                        <div class="cart-btn mt-100">
                            <button class="btn amado-btn w-100" onclick="simpan_alamat_pengiriman()" >Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div></br></br>
<!-- ##### Main Content Wrapper End ##### -->

<script type="text/javascript">
  function simpan_alamat_pengiriman(){
      // var id_met_pem = $('#id_met_pem').val();
      var id_al_peng = $('#id_al_peng').val();
      var ongkir = $('#ongkir').val();
      var total_harga = $('#total_harga').val();
      var total_harga_barang = $('#total_harga_barang').val();
      // console.log(id_met_pem+" "+id_al_peng+" "+ongkir+" "+total_harga+" "+total_harga_barang);
      if (ongkir == '' || total_harga == '' || total_harga_barang == '') {
      // if (id_met_pem == '' || ongkir == '' || total_harga == '' || total_harga_barang == '') {
        alert('Form masih ada yang kosong');
      } else {
        $.ajax({
          url: '<?= base_url("Ctm/CKeranjang/lakukan_pemesanan/") ?>',
          type: "POST",
          // dataType: "json",
          data: {
            id_al_peng : id_al_peng,
            // id_met_pem : id_met_pem,
            ongkir : ongkir,
            total_harga : total_harga,
            total_harga_barang : total_harga_barang,
          },
          // async: false,
          success: function (res) {
              location.href   = res;
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
              // console.log(data);
            total_harga = parseInt(total_harga_barang) + parseInt(data);
            $('#ongkir').val(data);
            $('#label_ongkir').html(data);
            $('#label_total_harga').html(total_harga);
            $('#total_harga').val(total_harga);
          }
      });
  }
</script>
