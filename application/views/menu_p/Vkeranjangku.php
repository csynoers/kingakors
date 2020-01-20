<div class="main-content-wrapper d-flex clearfix">
  <div class="cart-table-area section-padding-50">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12 col-lg-9">
                  <div class="cart-title mt-0"><br>
                      <h2>Shopping Cart</h2>
                  </div>
                  <a name="selesaikan" href="<?php echo base_url('Ctm/Cbarang'); ?>">
                    <div class="btn btn-success" style="margin-bottom:10px">
                      <i class="fa fa-plus"></i> Tambah
                    </div>
                  </a>
                  <div class="cart-table clearfix">
                      <table class="table table-responsive table-hover">
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
                                      <a href="#"><img src="<?= base_url("assets/uploads/".$list->gambar) ?>" alt="Product"></a>
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
                                        <div class="col-6 float-right">
                                          <form action="<?= base_url("Ctm/Ckeranjang/hapus")?>" method="post">
                                            <input type="hidden" name="id" value="<?php echo $list->id_det_pem;?>">
                                            <button type="submit" class="btn btn-danger" name="button">
                                              <i class="fa fa-trash-o"></i>
                                            </button>
                                          </form>
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
                  <div class="cart-summary">
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
                          <li><span>Jarak antar kota:</span></li>
                          <hr>
                          <li><span>jarak dari kota ke kecamatan:</span></li>
                          <li><span>biaya per km (1km = 4000):</span></li>
                          <hr>
                          <li><span>delivery </span> <span><?= "Rp.".number_format($delivery) ?></span></li>
                          <li><span>total:</span> <span><?= "Rp.".number_format($total) ?></span></li>
                      </ul>
                      <div class="cart-btn mt-50">
                          <a href="<?= base_url('Ctm/Ckeranjang/lanjutkan_pembelanjaan/');?>" class="btn amado-btn w-100">Checkout</a>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div></br>
