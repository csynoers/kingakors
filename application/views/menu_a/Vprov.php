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
                            <form class="" action="<?php echo base_url('Adm/Cprov/update_action') ?>" method="post">
                                <div class="form-group">
                                    <label for="">Id Provinsi</label>
                                    <input type="text" class="form-control" name="id_prov" id="id_prov" value="<?php
                                                                                                                echo "$data_update->id_prov"; ?>" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="">Provinsi</label>
                                    <input type="text" class="form-control" name="nama_prov" id="nama_prov" value="<?php
                                                                                                                    echo "$data_update->nama_prov"; ?>">
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
                    <h3 class="box-title">Tambah Data</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <!-- body -->
                <div class="box-body">
                    <form class="" action="<?php echo base_url('Adm/Cprov/insert_action') ?>" method="post">
                        <div class="form-group">
                            <label for="">Id Provinsi</label>
                            <input type="text" class="form-control" id="id_prov" name="id_prov" value="<?= $kodeunik; ?>" readonly>
                            <!-- <input type="text" class="form-control" name="id_prov" id="id_prov" value=""> -->
                        </div>
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <input type="text" class="form-control" name="nama_prov" id="nama_prov" value="">
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
                    <h2>Data Provinsi</h2>
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
                                <th>Id Provinsi</th>
                                <th>Provinsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($provinsi as $data_provinsi) { ?>
                                <tr>
                                    <td>
                                        <h5><?php echo $data_provinsi->id_prov; ?></h5>
                                    </td>
                                    <td>
                                        <h5><?php echo $data_provinsi->nama_prov; ?></h5>
                                    </td>
                                    <td>
                                        <a href="<?php echo base_url("Adm/Cprov/update/" . $data_provinsi->id_prov); ?>" class="btn btn-warning">Ubah</a>
                                        <form class="" action="<?php echo base_url("Adm/Cprov/hapus") ?>" method="post"> <br>
                                        <input type="hidden" name="id" value="<?php echo $data_provinsi->id_prov; ?>">
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
</div><!-- .content -->


<!-- ##### Main Content Wrapper End ##### -->
