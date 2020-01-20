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
                            <form class="" action="<?php echo base_url('Adm/Cadmin/update_action') ?>" method="post">
                                <div class="form-group">
                                    <label for="">Id Admin</label>
                                    <input type="text" class="form-control" name="id_admin" id="id_admin" value="<?php echo "$data_update->id_admin"; ?>" readonly="">
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" value="<?php echo "$data_update->username"; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" class="form-control" name="pass" id="pass" value="<?php echo "$data_update->pass"; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?php echo "$data_update->nama"; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">No telp</label>
                                    <input type="number" class="form-control" name="no_telp" id="no_telp" value="<?php echo "$data_update->no_telp"; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="email" id="email;" value="<?php echo "$data_update->email"; ?>">
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
                    <form class="" action="<?php echo base_url('Adm/Cadmin/insert_action') ?>" method="post">
                        <div class="form-group">
                            <label for="">Id Admin</label>
                            <input type="text" class="form-control" name="id_admin" id="" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" id="" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="pass" id="" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama" id="" value="">
                        </div>
                        <div class="form-group">
                            <label for="">No Telephone</label>
                            <input type="number" class="form-control" name="no_telp" id="" value="">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" id="" value="">
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

<div class="row">
    <div class="col-12 col-lg-12">
        <div class="cart-title mt-50">
            <h2>Admin</h2>
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
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admin as $data_admin) { ?>
                        <tr>
                            <td class="cart_product_desc">
                                <h5><?php echo $data_admin->username; ?></h5>
                            </td>
                            <td class="cart_product_desc">
                                <h5><?php echo $data_admin->pass; ?></h5>
                            </td>
                            <td class="cart_product_desc">
                                <a href="<?php echo base_url("Adm/Cadmin/update/" . $data_admin->id_admin); ?>" class="btn btn-warning">Ubah</a>
                                <input type="hidden" name="id" value="<?php echo $data_admin->id_admin; ?>">
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