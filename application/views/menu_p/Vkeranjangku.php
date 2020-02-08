<div class="main-content-wrapperXXX d-flexXXX clearfixXXX">
  <div class="cart-table-areaXXX section-padding-50XXX">
      <div class="container-fluid py-5">
          <div class="row">
            <div class="col-12">
              <div class="cart-title mt-0"><br>
                <h2>Shopping Cart</h2>
              </div>
              <a name="selesaikan" href="<?php echo base_url('Ctm/Cbarang'); ?>">
                <div class="btn btn-success" style="margin-bottom:10px">
                  <i class="fa fa-plus"></i> Tambah
                </div>
              </a>
            </div>
              <div class="col-12 col-lg-9">
                  <div class="cart-table clearfix border p-3">
                      <table class="table table-responsiveXXX table-hover">
                          <thead class="thead-default">
                              <tr>
                                  <th></th>
                                  <th>Name</th>
                                  <th class="text-center">Price</th>
                                  <th class="text-center">Quantity</th>
                                  <th class="text-center">Opsi</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($keranjang as $list) { ?>
                              <tr>
                                  <td>
                                      <a href="#"><img style="width:5rem" src="<?= base_url("assets/uploads/".$list->gambar) ?>" alt="Product"></a>
                                  </td>
                                  <td>
                                      <h5><?= $list->merek ?></h5>
                                  </td>
                                  <td class="text-center">
                                      <p><?= "Rp.".number_format($list->harga) ?></p>
                                  </td>
                                  <td class="text-center">
                                      <p><?= $list->jumlah_pesan ?></p>
                                  </td>
                                  <td class="text-center">
                                      <div class="row">
                                        <div class="col-6">
                                          <a href="<?= base_url("Ctm/Ckeranjang/checkout/".$list->id_det_pem);?>">
                                            <div  class="btn btn-warning">
                                               Check <i class="fa fa-cart-arrow-down"></i>
                                            </div>
                                          </a>
                                        </div>
                                        <div class="col-6">
                                          <a href="<?= base_url("Ctm/Ckeranjang/hapus/".$list->id_det_pem);?>">
                                            <div  class="btn btn-danger">
                                              <i class="fa fa-trash-o"></i>
                                            </div>
                                          </a>
                                        </div>
                                      </div>
                                  </td>
                              </tr>
                            <?php } ?>
                          </tbody>
                      </table>
                  </div>
              </div>
              <div class="col-12 col-lg-3">
                  <div class="cart-summary border p-3">
                      <h5>Cart Total</h5>
                      <?php
                        $sTotalBarang = 0;
                        $sTotal = 0;
                        $delivery = $total_ongkir;
                        $total = 0;
                        foreach ($keranjang as $key) {
                          $sTotalBarang = $key->harga * $key->jumlah_pesan;
                          $sTotal += $sTotalBarang;
                        }
                        $total = $sTotal + $delivery;
                        // echo $sTotal;
                      ?>
                      <ul class="summary-table">
                          <li><span>subtotal:</span> <span><?= "Rp.".number_format($sTotal) ?></span></li>
                          <hr>
                          <li><span>Jarak antar kota: <?= $data_peng_kota->nm_kota.' Rp.'.number_format($data_peng_kota->biaya)?></span></li>
                          <hr>
                          <li><span>jarak dari kota ke kecamatan: <?= $data_peng_kec->jarak?> Km</span></li>
                          <li><span>biaya per km (1km = 4000)</span></li>
                          <li><span>Rp.<?= number_format($data_peng_kota->biaya) ?> + ( Rp.4.000 * <?= $data_peng_kec->jarak ?> )</span></li>
                          <hr>
                          <li><span>delivery </span> <span><?= "Rp.".number_format($delivery) ?></span></li>
                          <li><span>total:</span> <span><?= "Rp.".number_format($total) ?></span></li>
                      </ul>
                      <div class="cart-btn mt-50">
                          <a href="<?= base_url('Ctm/CKeranjang/lanjutkan_pembelanjaan/');?>" class="btn amado-btn w-100">Checkout</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div></br>
