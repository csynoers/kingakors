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
                            <form class="" action="<?= base_url('customer/Cpelanggan/update_action')?>" method="post">
                            <div class="form-group">
                                <label for="">Id Pelanggan</label>
                                <input type="text" class="form-control" name="id_pelanggan" id="id_pelanggan" value="<?= "$data_update->id_pelanggan";?>" readonly="">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Pelanggan</label>
                                <input type="text" class="form-control" name="nama_pel" id="nama_pel" value="<?= "$data_update->nama_pel";?>">
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?= "$data_update->username";?>">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="pass" id="pass" value="<?= "$data_update->pass";?>">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" id="email;" value="<?= "$data_update->email";?>">
                            </div>
                            <div class="form-group">
                                <label for="">No telp</label>
                                <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?= "$data_update->no_telp";?>">
                            </div>
                            <div class="form-group"><br>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        <?php } ?>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- end Update data-->

    <!-- Insert data-->
    <div class="container">
        <br><li>*Hanya melakukan pengiriman di provinsi tertentu <b>(Yogyakarta, Jawa Tengah, Jawa Timur)</li>
        <div class="row">
            <div class="col-md-12"><br><br>
                <h3 align="center">Pendaftaran anggota baru</h3><hr><br>
                <!-- header -->
                <?= $this->session->flashdata("message") ?>
                <!-- body -->
                <form class="" action="<?= base_url("Clogin/insert_register")?>" method="post" enctype="multipart/form-data">
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
                            <div class="form-group">
                                <label> Email </label>
                                <input type="email" class="form-control" name="email" placeholder="Sesuai Email Anda" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> No Telepon </label>
                                <input type="text" class="form-control" name="no_telp" placeholder="Massukan nomor ponsel" pattern="\d*" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Provinsi</label><br>
                                        <select class="form-control" name="id_prov" id="id_prov_input">
                                        <option value="">Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $data_provinsi) {?>
                                        <option value="<?="$data_provinsi->id_prov";?>"><?="$data_provinsi->nama_prov";?></option><?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Kota</label>
                                        <select onblur="cari_kota()" class="form-control" name="id_kota" id="id_kota_input">
                                        <option value="">Pilih kota</option>
                                        <?php foreach ($kota as $data_provinsi) {?>
                                        <option value="<?="$data_provinsi->id_kota";?>"><?="$data_provinsi->nm_kota";?></option><?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Kecamatan</label>
                                        <select onblur="cari_kecamatan()" class="form-control" name="id_kecamatan" id="id_kecamatan_input">
                                        <option value="">Pilih Kecamatan</option>
                                        <?php foreach ($kecamatan as $data_provinsi) {?>
                                        <option value="<?="$data_provinsi->id_kec";?>"><?="$data_provinsi->nm_kec";?></option><?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12"><br>
                            <div class="form-group">
                                <label for="">Alamat Lengkap</label>
                                <textarea class="form-control" name="alamat_lengkap"  rows="8" placeholder="Masukkan alamat lengkap anda" required></textarea>
                            </div>
                        </div>
                        <div class="form-group" align="center">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                            <?= form_close() ;?>
                        </div>
                    </div>
                </form>
                <!-- <a type="button" name="button">Hapus</a> -->
            </div>
        </div>
        <!-- ##### Newsletter Area End ##### -->
    </div>

    <script type="text/javascript">
    function cari_kota(){
        var id_prov = $('#id_prov_input').val();
        var url = "<?= base_url('Ctm/Cprofil/cari_kota_ajax')?>";
        url += "?provinsi=" + id_prov;
        console.log(url);

        $.ajax({
            url : url,
            dataType : 'json',
            success : function (data) {
            console.log(data);
            $('#id_kota_input').empty();
            $("#id_kota_input").append('<option value="">Pilihlah</option>');
            if (data.length > 0) {
                $.each(data, function (index, value) {
                var nama_kota = value.nm_kota;
                var id_kota = value.id_kota;
                $("#id_kota_input").append('<option value="' + id_kota + '">' + nama_kota + '</option>');
                console.log(id_kota);
                });
            } else {
                $("#id_kota_input").append('<option value="">Tidak ditemukan</option>');
            }
            }
        });
    }

    function cari_kecamatan(){
        var id_kota = $('#id_kota_input').val();
        var url = "<?= base_url('Ctm/Cprofil/cari_kecamatan_ajax')?>";
        url += "?kota=" + id_kota;
        console.log(url);

        $.ajax({
            url : url,
            dataType : 'json',
            success : function (data) {
            console.log(data);
            $('#id_kecamatan_input').empty();
            $("#id_kecamatan_input").append('<option value="">Pilihlah</option>');
            if (data.length > 0) {
                $.each(data, function (index, value) {
                var nama_kec = value.nm_kec;
                var id_kec = value.id_kec;
                $("#id_kecamatan_input").append('<option value="' + id_kec + '">' + nama_kec + '</option>');
                console.log(id_kec);

                });
            } else {
                $("#id_kecamatan_input").append('<option value="">Tidak ditemukan</option>');
            }
            }
        });
    }

    </script>
