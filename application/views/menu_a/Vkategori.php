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
              <form class="" action="<?php echo base_url('Adm/Ckategori/update_action') ?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <label for="">Id kategori</label>
                  <input type="text" class="form-control" name="id_kategori" id="id_kategori" value="<?php echo "$data_update->id_kategori"; ?>" readonly="">
                </div>
                <div class="form-group">
                  <label for="">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" value="<?php echo "$data_update->nama_kat"; ?>">
                </div>
                <div class="form-group">
                  <label for="">Gambar </label>
                  <input type="file" class="form-control" name="gambar1" id="gambar1" onchange="cek_gambar1();">
                  <img style="width: 130px;height: 130px;border-radius: 50%;object-fit: cover; display: block;margin-right: auto;margin-left: auto;" id="upload_preview1" src="" style="width: 300px;" />
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
              <h3 class="box-title">Tambah Data</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- body -->
            <div class="box-body">
              <form class="" action="<?php echo base_url('Adm/ckategori/insert_action') ?>" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <label for="">Id Kategori</label>
                  <input type="text" class="form-control" name="id_kategori" id="id_kategori" value="">
                </div>
                <div class="form-group">
                  <label for="">Jenis Barang</label>
                  <input type="text" class="form-control" name="nama_kat" id="nama_kat" value="">
                </div>
                <div class="form-group">
                  <label for="">Unggah Gambar </label>
                  <input type="file" class="form-control" name="gambar" id="gambar" onchange="cek_gambar();">
                  <img style="width: 130px;height: 130px;border-radius: 50%;object-fit: cover; display: block;margin-right: auto;margin-left: auto;" id="upload_preview" src="" style="width: 300px;" />
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

    <!-- tampil data -->

    <div class="">
      <div class="">

        <div class="row">
          <div class="col-12 col-lg-12">
            <div class="cart-title mt-50">
              <h2>Data Kategori</h2>
            </div>

            <!-- pemaanggilan form Insert data-->
            <form action="" class="mb-2" method="post">
              <button type="submit" name="tambah" class="btn btn-primary">
                <i class="fa fa-user-plus"></i> Tambah
              </button>
            </form>
            <!-- selesai pemaanggilan form Insert data-->

            <div class="cart-table clearfix">
              <table class="table table-responsive" id="dataTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Jenis Kategori</th>
                    <th>Gambar</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($kategori as $data_kategori) { ?>
                    <tr>
                      <td>
                        <h5><?php echo $data_kategori->id_kategori; ?></h5>
                      </td>
                      <td>
                        <h5><?php echo $data_kategori->nama_kat; ?></h5>
                      </td>
                      <td>
                        <img style="width:200px; height:150px;border-radius: 100%;" src="<?php echo base_url("assets/foto/" . $data_kategori->gambar) ?>" />
                      </td>
                      <td>
                        <a href="<?php echo base_url("Adm/Ckategori/update/" . $data_kategori->id_kategori); ?>" class="btn btn-warning">Ubah</a>
                        <form class="" action="<?php echo base_url("Adm/Ckategori/hapus") ?>" method="post"><br>
                        <input type="hidden" name="id" value="<?php echo $data_kategori->id_kategori; ?>">
                        <button type="submit" class="btn btn-danger" name="button"> Hapus </button>
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
  </div>
</div><!-- .content -->
  <!-- end tampil data -->


<!-- ##### Main Content Wrapper End ##### -->
<script>
  function cek_gambar() {
    var filename = $('input[type=file]').val().split('\\').pop();
    var extSplit = filename.split('.');
    var extReverse = extSplit.reverse();
    var ext = extReverse[0];

    if (ext === "jpg" || ext === "png" || ext == 'jpeg' || ext === "PNG" || ext == 'JPG' || ext == 'JPEG') {
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("gambar1").files[0]);

      oFReader.onload = function(oFREvent) {
        document.getElementById("upload_preview").src = oFREvent.target.result;
      };

      $('#upload_gambar').val(filename);
    } else {
      alert("Masukan foto dengan format JPG, PNG");
    }
  }

  function cek_gambar1() {
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

      // $('#upload_gambar').val(filename);
    } else {
      alert("Masukan foto dengan format JPG, PNG");
    }
  }
</script>
