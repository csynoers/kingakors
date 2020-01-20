<div class="cart-table-area section-padding-100">
    <div class="container-fluid">

          <!-- Update data-->
          <?php if (isset($update)) { ?>
          <div class="row">
                  <div class="col-12 col-lg-12">
                  <div class="box">
                  <!-- header -->
                  <div class="box-header with-border">
                      <h3 class="box-title">Update pemesanan</h3>
                      <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                      </div>
                  </div>
                  <!-- body -->
                  <div class="box-body">
                      <form class="" action="<?php echo base_url('admin/Ckota/update_action')?>" method="post">
                          <div class="form-group">
                              <label for="">Id Pemesanan</label><tr>
                              <input type="text" class="form-control" name="id_pesan" id="id_pesan" value="<?php
                              echo "$data_update->id_pesan";?>" readonly="">
                          </div>
                          <div class="form-group">
                          <label for="">Id Pelanggan</label><br>
                          <select class="form-control" name="id_pelanggan" id="id_pelanggan">
                              <?php if ($data_update->id_pelanggan != NULL): ?>
                              <option value="<?php echo $data_update->id_pelanggan ?>" selected><?php echo $data_update->id_pelanggan ?></option>

                              <?php foreach ($pelanggan as $data_pelanggan) {?>
                                  <option value="<?php echo"$data_pelanggan->id_pelanggan";?>"><?php echo"$data_pelanggan->nama_pel";?></option>
                              <?php } ?>
                              <?php else: ?>
                              <option value="">Pilih</option>
                              <?php foreach ($pelanggan as $data_pelanggan) {?>
                                  <option value="<?php echo"$data_pelanggan->id_pelanggan";?>"><?php echo"$data_pelanggan->nama_pel";?></option>
                              <?php } ?>
                              <?php endif; ?>
                          </select></br>
                          </div>

                          <div class="form-group">
                          <label for="">Id Barang</label><br>
                          <select class="form-control" name="id_barang" id="id_barang">
                              <?php if ($data_update->id_barang != NULL): ?>
                              <option value="<?php echo $data_update->id_barang ?>" selected><?php echo $data_update->id_barang ?></option>

                              <?php foreach ($barang as $data_barang) {?>
                                  <option value="<?php echo"$data_barang->id_barang";?>"><?php echo"$data_barang->merek";?></option>
                              <?php } ?>
                              <?php else: ?>
                              <option value="">Pilih</option>
                              <?php foreach ($barang as $data_barang) {?>
                                  <option value="<?php echo"$data_barang->id_barang";?>"><?php echo"$data_barang->merek";?></option>
                              <?php } ?>
                              <?php endif; ?>
                          </select></br>
                          </div>
                          <div class="form-group">
                              <br><label for="">Jumlah</label>
                              <input type="number" class="form-control" name="jumlah_pesan" id="jumlah_pesan" value="<?php
                              echo "$data_update->jumlah_pesan";?>">
                          </div>
                          <div class="form-group">
                              <label for="">Tanggal</label>
                              <input type="date" class="form-control" name="tgl_pesan" value="<?php
                              echo $data_update->tanggal ?>" id="tgl_pesan">
                          </div>
                          <div class="form-group">
                              <label for="">Ongkir</label>
                              <input type="number" class="form-control" name="ongkir" value="<?php
                              echo $data_update->ongkir ?>" id="ongkir">
                          </div>

                          <div class="form-group">
                          <label for="">Alamat Pengiriman</label><br>
                          <select class="form-control" name="id_al_peng" id="id_al_peng">
                              <?php if ($data_update->id_al_peng != NULL): ?>
                              <option value="<?php echo $data_update->id_al_peng ?>" selected><?php echo $data_update->id_al_peng ?></option>

                              <?php foreach ($alamat_pengiriman as $data_alamat_penerima) {?>
                                  <option value="<?php echo"$data_alamat_pengiriman->id_al_peng";?>"><?php echo"$data_alamat_pengiriman->alamat_lengkap";?></option>
                              <?php } ?>
                              <?php else: ?>
                              <option value="">Pilih</option>
                              <?php foreach ($alamat_pengiriman as $data_alamat_pengiriman) {?>
                                  <option value="<?php echo"$data_alamat_pengiriman->id_al_peng";?>"><?php echo"$data_alamat_pengiriman->alamat_lengkap";?></option>
                              <?php } ?>
                              <?php endif; ?>
                          </select></br>
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
          <?php } ?>
          <!-- end Update data-->

        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="cart-title mt-50">
                    <h2>Pemesanan</h2>
                </div>

                <div class="cart-table clearfix">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th>Id pemesanan</th>
                                <th>Barang</th>
                                <th>Jumlah Pesan</th>
                                <!-- <th>ongkir</th>
                                <th>Alamat Pengiriman</th> -->
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($pemesanan as $data_pemesanan) { ?>
                            <tr>
                              <td class="cart_product_desc">
                                  <h5><?php echo @$data_pemesanan->id_pesan;?></h5>
                              </td>
                              <td class="cart_product_desc">
                                <img style="width: 130px;height: 130px;border-radius: 50%;object-fit: cover; display: block;margin-right: auto;margin-left: auto;" id="upload_preview2" src="<?php echo base_url("assets/uploads/".$data_pemesanan->gambar)?>" style="width: 300px;" />

                              </td>
                              <td class="cart_product_desc">
                                  <h5><?php echo @$data_pemesanan->jumlah_pesan;?></h5>
                              </td>
                              <!-- <td class="cart_product_desc">
                                  <h5><?php echo @$data_pemesanan->ongkir;?></h5>
                              </td>
                              <td class="cart_product_desc">
                                  <h5><?php echo @$data_pemesanan->alamat_pengiriman;?></h5>
                              </td> -->
                              <td class="cart_product_desc">
                                <a href="<?php echo base_url("Ctm/Cpemesanan/checkout/".$data_pemesanan->id_pesan);?>" class="btn btn-warning">Checkout</a>
                                <form class="" action="<?php echo base_url("Ctm/Cpemesanan/hapus")?>" method="post">
                                  <input type="hidden" name="id" value="<?php echo $data_pemesanan->id_pesan;?>">
                                  <button type="submit" class="btn btn-danger" name="button"> Hapus </button>
                                </form>
                                <!-- <a type="button" name="button">Hapus</a> -->
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
<!-- ##### Main Content Wrapper End ##### -->
