<div class="cart-table-areaXXX section-padding-50XXX">
  <div class="container-fluid">

    <!-- Update data -->
    <?php if (isset($update)) { ?>
            <div class="row">
              <div class="col-md-8" style="margin:0 auto; float:none;"><br><br>
                <h3 align="center">Update Data</h3><hr><br>

            <!-- body -->
            <div class="box-body">
              <form class="" action="<?= base_url('Ctm/Cprofil/update_action') ?>" method="post">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Id Pelanggan</label>
                    <input type="text" class="form-control" name="id_pelanggan" id="id_pelanggan" value="<?= $data_update->id_pelanggan ?>" readonly="">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama_pel" id="nama_pel" value="<?= $data_update->nama_pel ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?= $data_update->username ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="pass" id="pass" value="<?= $data_update->pass ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" id="email;" value="<?= $data_update->email ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">No telp</label>
                    <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?= $data_update->no_telp ?>">
                  </div>
                </div>
                <div class="form-group"><center><br>
                  <button type="submit" class="btn btn-success">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <!-- end Update data-->

    <div class="main-content-wrapperXXX d-flexXXX clearfixXXX">
      <div class="cart-table-areaXXX section-padding-50XXX">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12 col-lg-12">
              <div class="cart-title mt-50">
                <h2>Biodata</h2>
              </div>
              <!-- pemaanggilan form Insert data-->
              <form action="" method="post">
              </form>
              <!-- selesai pemaanggilan form Insert data-->
              <div class="cart-table clearfix">
                <table class="table table-responsiveXXX">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th>username</th>
                      <th>email</th>
                      <th>no_telp</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <?php foreach ($pelanggan as $data_pelanggan) { ?>
                    <tbody>
                      <tr>
                        <td class="cart_product_desc">
                          <h5><?= $data_pelanggan->nama_pel; ?></h5>
                        </td>
                        <td class="cart_product_desc">
                          <h5><?= $data_pelanggan->username; ?></h5>
                        </td>
                        <td class="cart_product_desc">
                          <h5><?= $data_pelanggan->email; ?></h5>
                        </td>
                        <td class="cart_product_desc">
                          <h5><?= $data_pelanggan->no_telp; ?></h5>
                        </td>
                        <td class="cart_product_desc">
                          <a href="<?= base_url("Ctm/cprofil/update/" . $data_pelanggan->id_pelanggan); ?>">
                            <div class="btn btn-warning">
                              Update
                            </div>
                          </a>
                          <input type="hidden" name="id" value="<?= $data_pelanggan->id_pelanggan; ?>">
                          <!-- <button type="submit" class="btn btn-danger" name="button"> Hapus </button> -->
                          </form>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <tr>
        <div class="cart-table-area section-padding-50">
          <div class="container-fluid">

              <!-- Update data-->
              <?php if (isset($update1)) { ?>
                <div class="row">
                  <div class="col-md-8" style="margin:0 auto; float:none;"><br><br>
                    <h3 align="center">Update Alamat Pengiriman</h3><hr><br>

                    <!-- body -->
                    <div class="box-body">
                        <form class="" action="<?= base_url('Ctm/Cprofil/update_action1')?>" method="post">
                          <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Id Alamat Pengiriman</label><tr>
                                <input type="text" class="form-control" name="id_al_peng" id="id_al_peng" value="<?=$data_update->id_al_peng?>" readonly="">
                            </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <br><label for="">Nama Penerima</label>
                                <input type="text" class="form-control" name="nama" value="<?= $data_update->nama ?>" id="nama">
                            </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">No Telepon</label>
                                <input type="number" class="form-control" name="no_tlpn" value="<?= $data_update->no_tlpn ?>" id="no_tlpn">
                            </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Provinsi</label><br>
                                <select onblur="cari_kota();" class="form-control" name="id_prov" id="id_prov_input">
                                      <option value="">Pilih</option>

                                      <?php foreach ($provinsi as $data_provinsi) {?>
                                        <?php if ($data_update->id_prov == $data_provinsi->id_prov): ?>
                                            <option value="<?= $data_provinsi->id_prov ?>" selected><?= $data_provinsi->nama_prov ?></option>
                                        <?php else: ?>
                                            <option value="<?=$data_provinsi->id_prov?>"><?=$data_provinsi->nama_prov?></option>
                                        <?php endif; ?>
                                      <?php } ?>
                                  </select>
                                  <br>
                                  </div>
                                  </div>

                              <div class="col-md-12">
                                <div class="form-group">
                                  <br><label for="">Kota</label><br>
                                  <select onblur="cari_kecamatan();" class="form-control" name="id_kota" id="id_kota_input">
                                    <option value="">Pilih</option>
                                    <?php if ($data_update->kota != NULL): ?>
                                        <option value="<?= $data_update->id_kota ?>" selected><?= $data_update->nm_kota ?></option>
                                    <?php else: ?>
                                        <option value="">Pilih</option>
                                    <?php endif; ?>
                                  </select>
                                  <br>
                                </div>
                              </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <br><label for="">Kecamatan</label><br>
                              <select class="form-control" name="id_kec" id="id_kecamatan_input">
                                    <option value="">Pilih</option>
                                    <?php if ($data_update->kecamatan != NULL): ?>
                                          <option value="<?= $data_update->id_kec ?>" selected><?= $data_update->nm_kec ?></option>
                                      <?php else: ?>
                                          <option value="">Pilih</option>
                                      <?php endif; ?>
                                </select>
                                <br>
                                </div>
                                </div>

                              <div class="col-md-12">
                                <div class="form-group">
                                <label for="">Alamat Lengkap</label>
                                <input type="text" class="form-control" name="alamat_lengkap" value="<?= $data_update->alamat_lengkap ?>" id="alamat_lengkap">
                              </div>
                              </div>

                          <tr>
                           <td>Status</td>
                           <td>:</td>
                           <td>
                            <input type="radio" name="status" <?php if($data_update == 'ready'){ echo 'checked';} ?> value="ready">Ready
                            <input type="radio" name="status" <?php if($data_update == 'no ready'){ echo 'checked';} ?> value="no_ready">No Ready
                          </td><?= form_error('Status'); ?>
                          </tr>
                        </div>
                        <div class="form-group"><br>
                            <button type="submit" class="btn btn-success">Simpan</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php } ?>
            <!-- end Update data-->


            <!-- Insert data-->
            <?php if (isset($_POST['tambah'])) { ?>
              <div class="row"><hr>
                <div class="col-md-8" style="margin: auto; float:none;"><br>
                  <h3 align="center">Alamat Penerima</h3><hr><br>
                    <!-- body -->
                        <form class="" action="<?= base_url('Ctm/Cprofil/insert_action1')?>" method="post">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label> Nama </label>
                              <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" required/>
                          </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label> No Telepon </label>
                              <input type="text" class="form-control" name="no_tlpn" placeholder="Massukan nomor ponsel" pattern="\d*" required />
                          </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="">Provinsi</label>
                              <select class="form-control" name="id_prov" id="id_prov_input">
                              <option value="">Pilih Provinsi</option>
                                <?php foreach ($provinsi as $data_provinsi) {?>
                              <option value="<?=$data_provinsi->id_prov?>"><?=$data_provinsi->nama_prov?></option><?php } ?>
                          </select>
                          <br>
                          </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="">Kota</label>
                              <select onblur="cari_kecamatan();" class="form-control" name="id_kota" id="id_kota_input">
                              <option value="">Pilih kota</option>
                              <?php foreach ($kota as $data_provinsi) {?>
                            <option value="<?=$data_provinsi->id_kota?>"><?=$data_provinsi->nm_kota?></option><?php } ?>
                          </select>
                          <br>
                          </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                            <label for="">Kecamatan</label></br>
                            <select class="form-control" name="id_kecamatan" id="id_kecamatan_input">
                              <option value="">Pilih Kecamatan</option>
                              <?php foreach ($kecamatan as $data_provinsi) {?>
                            <option value="<?=$data_provinsi->id_kec?>"><?=$data_provinsi->nm_kec?></option><?php } ?>
                          </select>
                          </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                            <label for="">Alamat Lengkap</label>
                            <textarea class="form-control" name="alamat_lengkap" rows="8" placeholder="Masukkan alamat lengkap anda" required></textarea>
                        </div>
                        </div>

                        <div class="col-md-12">
                          <div class="form-group">
                          <label for="">Status</label><br>
                              <tr> <input type="radio" name="status" checked value="ready">Ready
                               <input type="radio" name="status" value="no ready">No ready
                             </td><?= form_error('status'); ?>
                             </tr>
                           </div>
                           </div>
                           <div class="form-group" align="center">
                             <br>
                         <button type="submit" class="btn btn-success">Simpan</button>
                   </form>
                 </div>
               </div>
            </div>
          </div>
        </div>
      </div>
    </div>

 <?php } ?>

            <!-- end Insert data-->

              <div class="main-content-wrapperXXX d-flex clearfixXXX">
                <div class="cart-table-areaXXX section-padding-50XXX">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-12 col-lg-12">
                        <div class="cart-title mt-50"><hr><br>
                          <h2>Pilih Alamat</h2>
                        </div>

                        <!-- pemaanggilan form Insert data-->
                        <form action="" method="post">
                          <button type="submit" name="tambah" class="btn btn-primary">
                            <i class="fa fa-user-plus"></i> Tambah Alamat Baru
                          </button>
                        </form>
                        <br>
                        <!-- selesai pemaanggilan form Insert data-->

                        <div class="cart-table clearfix">
                          <table class="table table-responsiveXXX">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>No telepon</th>
                                        <th>Alamat Lengkap</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($alamat_pengiriman as $data_alamat_pengiriman) { ?>
                                      <td class="cart_product_desc">
                                          <h5><?= $data_alamat_pengiriman->nama;?></h5>
                                      </td>
                                      <td class="cart_product_desc">
                                          <h5><?= $data_alamat_pengiriman->no_tlpn;?></h5>
                                        </td>
                                      <td class="cart_product_desc">
                                          <h5><?= $data_alamat_pengiriman->alamat_lengkap;?></h5>
                                      </td>
                                      <td class="cart_product_desc">
                                          <h5><?= $data_alamat_pengiriman->status;?></h5>
                                      </td>
                                    <td class="cart_product_desc">
                                      <a href="<?= base_url("Ctm/Cprofil/update1/".$data_alamat_pengiriman->id_al_peng);?>">
                                        <button class="btn btn-warning">Update</button>
                                      </a><br><br>
                                      <form class="" action="<?= base_url("Ctm/Cprofil/hapus1")?>" method="post">
                                        <input type="hidden" name="id" value="<?= $data_alamat_pengiriman->id_al_peng;?>">
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
                </div>

            <!-- ##### Main Content Wrapper End ##### -->
