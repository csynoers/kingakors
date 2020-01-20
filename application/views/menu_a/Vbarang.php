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
              <form class="" action="<?= base_url('Adm/cbarang/update_action') ?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <label for="">Id Barang</label>
                  <input type="text" class="form-control" value="<?= $data_update->id_barang ?>" readonly="" name="id_barang" id="id_barang">
                </div>
                <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" class="form-control" value="<?= $data_update->merek ?>" name="nama" id="nama">
                </div>
                <div class="form-group">
                  <label for="">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"><?= $data_update->diskripsi ?><?= $data_update->gambar ?></textarea>
                </div>
                <div class="form-group">
                  <label for="">Gambar 1</label>
                  <input type="file" class="form-control" name="gambar1" id="gambar1" onchange="cek_image1();">
                  <img style="width: 130px;height: 130px;border-radius: 50%;object-fit: cover; display: block;margin-right: auto;margin-left: auto;" id="upload_preview1" src="<?= base_url("assets/uploads/" . $data_update->gambar)  ?>" style="width: 300px;" />
                  <input type="hidden" class="form-control" name="upload_gambar1" id="upload_gambar1">
                </div>
                <div class="form-group">
                  <label for="">Gambar 2</label>
                  <input type="file" class="form-control" name="gambar2" id="gambar2" onchange="cek_image2();">
                  <img style="width: 130px;height: 130px;border-radius: 50%;object-fit: cover; display: block;margin-right: auto;margin-left: auto;" id="upload_preview2" src="<?= base_url("assets/uploads/" . $data_update->gambar1)  ?>" style="width: 300px;" />
                  <input type="hidden" class="form-control" name="upload_gambar2" id="upload_gambar2">
                </div>
                <div class="form-group">
                  <label for="">Harga</label>
                  <input type="number" class="form-control" name="harga" value="<?= $data_update->harga ?>" id="harga">
                </div>
                <div class="form-group">
                  <label for="">Stok</label>
                  <input type="number" class="form-control" value="<?= $data_update->stok ?>" name="stok" id="stok">
                </div>
                <div class="form-group">
                  <label for="">Kategori</label><br>
                  <select class="form-control" name="id_kategori" id="id_kategori">
                    <?php if ($data_update->id_kategori != NULL) : ?>
                      <option value="<?= $data_update->id_kategori ?>" selected><?= $data_update->id_kategori ?></option>
                      <?php foreach ($kategori as $data_kategori) { ?>
                        <option value="<?= "$data_kategori->id_kategori"; ?>"><?= "$data_kategori->nama_kat"; ?></option>
                      <?php } ?>
                    <?php else : ?>
                      <option value="">Pilih</option>
                      <?php foreach ($kategori as $data_kategori) { ?>
                        <option value="<?= "$data_kategori->id_kategori"; ?>"><?= "$data_kategori->nama_kat"; ?></option>
                      <?php } ?>
                    <?php endif; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Tanggal Masuk</label>
                  <input type="date" class="form-control" value="<?= $data_update->tanggal_masuk ?>" name="tanggal_masuk" id="tanggal_masuk">
                </div>
                <div class="form-group"><br>
                  <button type="submit" class="btn btn-success">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
    <?php } ?>
    <!-- end Update data-->

    <!-- Insert data-->
    <?php if (isset($_POST['tambah'])) { ?>
      <div class="row">
        <div class="col-12 col-lg-12">
          <div class="box">
            <!-- header -->
            <div class="box-header with-border mb-2"></br></br>
              <h3 class="box-title">Tambah Data</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- body -->
            <div class="box-body">
              <form class="" action="<?= base_url('Adm/cbarang/insert_action') ?>" enctype="multipart/form-data" method="post">

                <div class="form-group">
                  <label for="cari">Id Barang</label>
                  <input type="text" class="form-control" id="id_barang" name="id_barang" value="<?= $kodeunik; ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama">
                </div>
                <div class="form-group">
                  <label for="">Deskripsi</label>
                  <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Gambar 1</label>
                  <input type="file" class="form-control" name="gambar1" id="gambar1" onchange="cek_image1();">

                  <!--untuk menampilkan preview gambar-->
                  <img style="width: 130px;height: 130px;border-radius: 50%;object-fit: cover; display: block;margin-right: auto;margin-left: auto;" id="upload_preview1" src="" style="width: 300px;" />

                  <input type="hidden" class="form-control" name="upload_gambar1" id="upload_gambar1">
                </div>
                <div class="form-group">
                  <label for="">Gambar 2</label>
                  <input type="file" class="form-control" name="gambar2" id="gambar2" onchange="cek_image2();">

                  <img style="width: 130px;height: 130px;border-radius: 50%;object-fit: cover; display: block;margin-right: auto;margin-left: auto;" id="upload_preview2" src="" style="width: 300px;" />
                  <input type="hidden" class="form-control" name="upload_gambar2" id="upload_gambar2">
                </div>
                <div class="form-group">
                  <label for="">Harga</label>
                  <input type="number" class="form-control" name="harga" id="harga">
                </div>
                <div class="form-group">
                  <label for="">Stok</label>
                  <input type="number" class="form-control" name="stok" id="stok">
                </div>
                <div class="form-group">
                  <label for="">Kategori</label><br>

                  <select class="form-control" name="id_kategori" id="id_kategori">
                    <option value="">Pilih</option>
                    <?php foreach ($kategori as $data_kategori) { ?>
                      <option value="<?= "$data_kategori->id_kategori"; ?>"><?= "$data_kategori->nama_kat"; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Tanggal</label>
                  <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk">
                </div>
                <div class="form-group"><br>
                  <button type="submit" class="btn btn-success">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- </div> -->
    <?php } ?>
    <!-- end Insert data-->

    <div class="">
      <div class="">

        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="cart-title mt-50">
              <h2>Data Barang</h2>
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
                    <th>Merek</th>
                    <th>Gambar</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Tanggal Masuk</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($barang as $data_barang) { ?>
                    <tr>
                      <td>
                        <h5><?= $data_barang->merek; ?></h5>
                      </td>
                      <td>
                        <img style="width:200px; height:150px;border-radius: 100%;" src="<?= base_url('assets/uploads/' . $data_barang->gambar) ?>" />
                        <!-- <?php var_dump($data_barang->gambar1) ?> -->
                      </td>
                      <td>
                        <h5><?= $data_barang->harga; ?></h5>
                      </td>
                      <td>
                        <h5><?= $data_barang->stok; ?></h5>
                      </td>
                      <td>
                        <h5><?= $data_barang->tanggal_masuk; ?></h5>
                      </td>
                      <td>
                        <a href="<?= base_url('Adm/Cbarang/update/' . $data_barang->id_barang); ?>" class="btn btn-warning">Ubah</a><br><br>
                        <form class="" action="<?= base_url('Adm/Cbarang/hapus') ?>" method="post">
                          <input type="hidden" name="id" value="<?= $data_barang->id_barang; ?>">
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
    </div>
  </div>
  <!-- end tampil data -->

</div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
<script>
  function cek_image1() {
    var filename = $('input[type=file]').val().split('\\').pop();
    var extSplit = filename.split('.');
    var extReverse = extSplit.reverse();
    var ext = extReverse[0];

    if (ext === "jpg" || ext === "png" || ext == 'jpeg' || ext === "PNG" || ext == 'JPG' || ext == 'JPEG') {
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("gambar1").files[0]);

      oFReader.onload = function(oFREvent) {
        document.getElementById("upload_preview1").src = oFREvent.target.result;
      };
      $('#upload_gambar1').val(filename);
    } else {
      alert("Masukan foto dengan format JPG, PNG");
    }
  }

  function cek_image2() {
    var filename = $('input[type=file]').val().split('\\').pop();
    var extSplit = filename.split('.');
    var extReverse = extSplit.reverse();
    var ext = extReverse[0];
    if (ext === "jpg" || ext === "png" || ext == 'jpeg' || ext === "PNG" || ext == 'JPG' || ext == 'JPEG') {
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("gambar2").files[0]);

      oFReader.onload = function(oFREvent) {
        document.getElementById("upload_preview2").src = oFREvent.target.result;
      };
      $('#upload_gambar2').val(filename);
    } else {
      alert("Masukan foto dengan format JPG, PNG");
    }
  }
</script>
