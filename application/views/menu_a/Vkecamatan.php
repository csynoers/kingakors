<div class="cart-table-area section-padding-50">
  <div class="container-fluid">

    <!-- Update data-->
    <?php if (isset($update)) { ?>
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="box">
            <!-- header -->
            <div class="box-header with-border"><br><br>
              <h3 class="box-title">Ubah Data</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- body -->
            <div class="box-body">
              <form class="" action="<?php echo base_url('Adm/Ckecamatan/update_action') ?>" method="post">
                <div class="form-group">
                  <label for="">Id Kecamatan</label>
                  <tr>
                    <input type="text" class="form-control" name="id_kec" id="id_kec" value="<?php echo "$data_update->id_kec"; ?>" readonly="">
                </div>
                <div class="form-group">
                  <label for="">Kota</label><br>
                  <select class="form-control" name="id_kota" id="id_kota">
                    <?php if ($data_update->id_kota != NULL) : ?>
                      <option value="<?php echo $data_update->id_kota ?>" selected><?php echo $data_update->id_kota ?></option>
                      <?php foreach ($kota as $data_kota) { ?>
                        <option value="<?php echo "$data_kota->id_kota"; ?>"><?php echo "$data_kota->nm_kota"; ?></option>
                      <?php } ?>
                    <?php else : ?>
                      <option value="">Pilih</option>
                      <?php foreach ($kota as $data_kota) { ?>
                        <option value="<?php echo "$data_kota->id_kota"; ?>"><?php echo "$data_kota->nm_kota"; ?></option>
                      <?php } ?>
                    <?php endif; ?>
                  </select></br>
                </div>
                <div class="form-group">
                  <br><label for="">Kecamatan</label>
                  <input type="text" class="form-control" name="nm_kec" value="<?php echo $data_update->nm_kec ?>" id="nm_kec">
                </div>
                <div class="form-group">
                  <label for="">Jarak</label>
                  <input type="number" class="form-control" name="jarak" value="<?php echo $data_update->jarak ?>" id="jarak">
                </div>
                <div class="form-group">
                  <label for="">Harga</label>
                  <input type="number" class="form-control" name="harga" value="<?php echo $data_update->harga ?>" id="harga">
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

<!-- Insert data-->
<?php if (isset($_POST['tambah'])) { ?>
  <div class="row">
    <div class="col-12 col-lg-12">
      <div class="box">
        <!-- header -->
        <div class="box-header with-border"><br><br>
          <h3 class="box-title">Tambah Kecamatan</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- body -->
        <div class="box-body">
          <form class="" action="<?php echo base_url('Adm/Ckecamatan/insert_action') ?>" method="post">
            <div class="form-group">
              <label for="">Id Kecamatan</label>
              <input type="text" class="form-control" id="id_kec" name="id_kec" value="<?= $kodeunik; ?>" readonly>
            </div>
            <div class="form-group">
              <label for="">Kota</label><br>
              <select class="form-control" name="id_kota" id="id_kota">
                <option value="">Pilih</option>
                <?php foreach ($kota as $data_kota) { ?>
                  <option value="<?php echo "$data_kota->id_kota"; ?>"><?php echo "$data_kota->nm_kota"; ?></option>
                <?php } ?>
              </select>
              </br>
            </div>
            <div class="form-group">
              <br><label for="">Kecamatan</label>
              <input type="text" class="form-control" name="nm_kec" id="nm_kec">
            </div>
            <div class="form-group">
              <label for="">Jarak</label>
              <input type="number" class="form-control" name="jarak" id="jarak">
            </div>
            <div class="form-group">
              <label for="">Harga</label>
              <input type="number" class="form-control" name="harga" id="harga">
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
<!-- end Insert data-->

<div class="">
  <div class="">
    <div class="row">
      <div class="col-12 col-lg-12">
        <div class="cart-title mt-50">
          <h2>Data Kecamatan</h2>
        </div>

        <!-- pemaanggilan form Insert data-->
        <form action="" method="post" class="mb-2">
          <button type="submit" name="tambah" class="btn btn-primary">
            <i class="fa fa-user-plus"></i> Tambah
          </button>
        </form>
        <!-- selesai pemaanggilan form Insert data-->

        <div class="cart-table clearfix">
          <table class="table table-responsive" id="dataTable">
            <thead>
              <tr>
                <th>Id Kecamatan</th>
                <th>Kota</th>
                <th>Kecamatan</th>
                <th>Jarak</th>
                <th>Harga</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($kecamatan as $data_kecamatan) { ?>
                <tr>
                  <td>
                    <h5><?php echo $data_kecamatan->id_kec; ?></h5>
                  </td>
                  <td>
                    <h5><?php echo $data_kecamatan->nm_kota; ?></h5>
                  </td>
                  <td>
                    <h5><?php echo $data_kecamatan->nm_kec; ?></h5>
                  </td>
                  <td>
                    <h5><?php echo $data_kecamatan->jarak; ?></h5>
                  </td>
                  <td>
                    <h5><?php echo $data_kecamatan->harga; ?></h5>
                  </td>
                  <td>
                    <a href="<?php echo base_url("Adm/Ckecamatan/update/" . $data_kecamatan->id_kec); ?>" class="btn btn-warning">Ubah</a><br><br>
                    <form class="" action="<?php echo base_url("Adm/Ckecamatan/hapus") ?>" method="post">
                      <input type="hidden" name="id" value="<?php echo $data_kecamatan->id_kec; ?>">
                      <button type="submit" class="btn btn-danger">Hapus</button>
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
</div><!-- .animated -->
</div><!-- .content -->
<!-- end tampil data -->
