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
                                            <option value="" selected disabled> -- Pilih Provinsi -- </option>
                                            <?php foreach ($provinsi as $data_provinsi) {?>
                                            <option value="<?="$data_provinsi->id_prov";?>"><?="$data_provinsi->nama_prov";?></option><?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="" class="d-block">Kota</label>
                                        <select class="form-control" name="id_kota" id="id_kota_input">
                                        <option value="" selected disabled> -- Pilih kota -- </option>
                                        <option value="" disabled> Maaf anda belum memilih provinsi </option>
                                        <!-- <?php foreach ($kota as $data_provinsi) {?>
                                        <option value="<?="$data_provinsi->id_kota";?>"><?="$data_provinsi->nm_kota";?></option><?php } ?> -->
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Kecamatan</label>
                                        <select class="form-control" name="id_kecamatan" id="id_kecamatan_input">
                                        <option value="" selected disabled> -- Pilih Kecamatan -- </option>
                                        <option value="" disabled> Maaf anda belum memilih kota </option>
                                        <!-- <?php foreach ($kecamatan as $data_provinsi) {?>
                                        <option value="<?="$data_provinsi->id_kec";?>"><?="$data_provinsi->nm_kec";?></option><?php } ?> -->
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
    /* (function( j ){
        j( document ).on('change', '#id_prov_input', function(){
            cariKota( j( this ).val() )
        })

        function cariKota(id_prov){
            let url     = ('<?= base_url('Ctm/Cprofil/cari_kota_ajax?provinsi=') ?>'+id_prov)
            
            j.get(url, function( d ){
                if ( d.length > 0 ) {
                    let html = []
                    html.push(`<option value="" selected disabled> -- Pilih kota -- </option>`)
                    j.each(d, function (a,b) {
                        html.push(`<option value="${b.id_kota}">${b.nm_kota}</option>`)
                    });
                    j("#id_kota_input").html( html.join('') )

                    j( document ).on('change', '#id_kota_input', function(){
                        cariKecamatan( j( this ).val() )
                    })

                } else {
                    j("#id_kota_input").append('<option value="" selected disabled>Kota Tidak ditemukan</option>')

                }
                resetKecamatan()

            }, 'json')
        }

        function cariKecamatan(id_kota){
            let url     = ('<?= base_url('Ctm/Cprofil/cari_kecamatan_ajax?kota=') ?>'+id_kota)
            
            j.get(url, function( d ){
                if ( d.length > 0 ) {
                    let html = []
                    html.push(`<option value="" selected disabled> -- Pilih Kecamatan -- </option>`)
                    j.each(d, function (a,b) {
                        html.push(`<option value="${b.id_kec}">${b.nm_kec}</option>`)
                    });
                    j("#id_kecamatan_input").html( html.join('') )

                } else {
                    j("#id_kecamatan_input").append('<option value="" selected disabled>Kota Tidak ditemukan</option>')

                }

            }, 'json')
        }

        function resetKecamatan(){
            let html = []
            html.push(`<option value="" selected disabled> -- Pilih Kecamatan -- </option>`)
            html.push(`<option value="" disabled> Maaf anda belum memilih kota </option>`)
            j("#id_kecamatan_input").html( html.join('') )
        }
    })(jQuery) */

    </script>
