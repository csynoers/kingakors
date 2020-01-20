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
              <form class="" action="<?php echo base_url('Adm/Ckota/update_action') ?>" method="post">
                <div class="form-group">
                  <label for="">Id Kota</label>
                  <tr>
                    <input type="text" class="form-control" name="id_kota" id="id_kota" value="<?php echo "$data_update->id_kota"; ?>" readonly="">
                </div>
                <div class="form-group">
                  <label for="">Provinsi</label><br>
                  <select class="form-control" name="id_prov" id="id_prov">
                    <?php if ($data_update->id_prov != NULL) : ?>
                      <option value="<?php echo $data_update->id_prov ?>" selected><?php echo $data_update->id_prov ?></option>
                      <?php foreach ($provinsi as $data_provinsi) { ?>
                        <option value="<?php echo "$data_provinsi->id_prov"; ?>"><?php echo "$data_provinsi->nama_prov"; ?></option>
                      <?php } ?>
                    <?php else : ?>
                      <option value="">Pilih</option>
                      <?php foreach ($provinsi as $data_provinsi) { ?>
                        <option value="<?php echo "$data_provinsi->id_prov"; ?>"><?php echo "$data_provinsi->nama_prov"; ?></option>
                      <?php } ?>
                    <?php endif; ?>
                  </select></br>
                </div>
                <div class="form-group">
                  <br><label for="">Kota</label>
                  <input type="text" class="form-control" name="nm_kota" id="nm_kota" value="<?php echo "$data_update->nm_kota"; ?>">
                </div>
                <div class="form-group">
                  <label for="">Biaya</label>
                  <input type="number" class="form-control" name="biaya" value="<?php echo $data_update->biaya ?>" id="biaya">
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
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="box">
            <!-- header -->
            <div class="box-header with-border"><br><br>
              <h3 class="box-title">Tambah Kota</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- body -->
            <div class="box-body">
              <form class="" action="<?php echo base_url('Adm/Ckota/insert_action') ?>" method="post">
                <div class="form-group">
                  <label for="">Id Kota</label>
                  <input type="text" class="form-control" id="id_kota" name="id_kota" value="<?= $kodeunik; ?>" readonly>
                </div>
                <div class="form-group">
                  <label for="">Provinsi</label><br>
                  <select class="form-control" name="id_prov" id="id_prov">
                    <option value="">Pilih</option>
                    <?php foreach ($provinsi as $data_provinsi) { ?>
                      <option value="<?php echo "$data_provinsi->id_prov"; ?>"><?php echo "$data_provinsi->nama_prov"; ?></option>
                    <?php } ?>
                  </select>
                  </br>
                </div>
                <div class="form-group">
                  <br><label for="">Kota</label>
                  <input type="text" class="form-control" name="nm_kota" id="" value="">
                </div>
                <div class="form-group">
                  <label for="">Biaya</label>
                  <input type="number" class="form-control" name="biaya" id="biaya">
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
    <!-- end Insert data-->

    <div class="">
      <div class="">
        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="cart-title mt-50">
              <h2>Data Kota</h2>
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
                    <th>Id Kota</th>
                    <th>Provinsi</th>
                    <th>Kota/Kabupaten</th>
                    <th>Biaya</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($kota as $data_kota) { ?>
                    <tr>
                      <td>
                        <h5><?php echo $data_kota->id_kota; ?></h5>
                      </td>
                      <td>
                        <h5><?php echo $data_kota->nama_prov; ?></h5>
                      </td>
                      <td>
                        <h5><?php echo $data_kota->nm_kota; ?></h5>
                      </td>
                      <td>
                        <h5><?php echo $data_kota->biaya; ?></h5>
                      </td>
                      <td>
                        <a href="<?php echo base_url("Adm/Ckota/update/" . $data_kota->id_kota); ?>" class="btn btn-warning">Ubah</a><br><br>
                        <form class="" action="<?php echo base_url("Adm/Ckota/hapus") ?>" method="post">
                          <input type="hidden" name="id" value="<?php echo $data_kota->id_kota; ?>">
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
