<div class="cart-table-area section-padding-50">
<div class="container-fluid">

<!-- Update data-->
<?php if (isset($update)) { ?>
<div class="row">
        <div class="col-12 col-lg-12">
        <div class="box">
        <!-- header -->
        <div class="box-header with-border">
            <h3 class="box-title">Update Data</h3>
            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <!-- body -->
        <div class="box-body">
            <form class="" action="<?php echo base_url('customer/Cpelanggan/update_action')?>" method="post">
                <div class="form-group">
                    <label for="">Id Pelanggan</label>
                    <input type="text" class="form-control" name="id_pelanggan" id="id_pelanggan" value="<?php echo "$data_update->id_pelanggan";?>" readonly="">
                </div>
                <div class="form-group">
                    <label for="">Nama Pelanggan</label>
                    <input type="text" class="form-control" name="nama_pel" id="nama_pel" value="<?php echo "$data_update->nama_pel";?>">
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="<?php echo "$data_update->username";?>">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="pass" id="pass" value="<?php echo "$data_update->pass";?>">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" id="email;" value="<?php echo "$data_update->email";?>">
                </div>
                <div class="form-group">
                    <label for="">No telp</label>
                    <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?php echo "$data_update->no_telp";?>">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat;" value="<?php echo "$data_update->alamat";?>">
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
</div>
<!-- end Update data-->

<!-- Insert data-->
      <div class="row">
        <div class="col-md-8" style="margin:0 auto; float:none;"><br><br>
          <h3 align="center">Pendaftaran anggota baru</h3><hr><br>
        <!-- header -->

        <?php
          if($this->session->flashdata("message"))
          {
            echo " <div class='alert alert-success'>
            ".$this->session->flashdata("message")."
            </div>";
          }
         ?>
        <!-- body -->
            <form class="" action="<?php echo base_url("Clogin/insert_register/send")?>" method="post" enctype="multipart/form-data">
              <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label> Nama </label>
                  <input type="text" class="form-control" name="nama_pel"  placeholder="Masukkan Nama" required/>
              </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label> Username </label>
                  <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required/>
              </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                  <label> Password </label>
                  <input type="password" class="form-control" name="pass" placeholder="Massukan Password" required/>
              </div>
              </div>
              <div class="col-md-6">
                  <label> Email </label>
                  <input type="email" class="form-control" name="email" placeholder="Sesuai Email Anda" required/>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                  <label> No Telepon </label>
                  <input type="text" class="form-control" name="no_telp" placeholder="Massukan nomor ponsel" pattern="\d*" required />
              </div>
              </div>
                <div class="col-md-6">
                  <label for="">Alamat</label>
                  <textarea class="form-control" name="alamat" placeholder="Alamat yang sesuai" required></textarea>
              </div>
              </div>
              <div class="form-group" align="center">
              <br>
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                  <?php echo form_close() ;?>
                </div>
            </form>
            </div>
            </div>
            </div>
            </div>
            </div>
          </div>


            </tr>
            <br>
