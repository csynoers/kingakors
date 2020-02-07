<?= print_r($this->session) ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- Title  -->
    <title>TA - Furniture Ecommerce | Home</title>

    <!-- logo icon di bar -->
    <link rel="icon" href="<?= base_url('assets/img/core-img/8.PNG'); ?>">


    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/amado/css/core-style.css') ?>">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/amado/style.css') ?>"> -->

    <!-- Bootstrap core CSS
    <link href="<?= base_url('assets/bootstrap') ?>/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets') ?>/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style type="text/css">
        #dTable_filter {
            float: right
        }

        .dataTables_filter {
            float: right
        }
    </style>
    <script src="<?= base_url("assets/amado/js/jquery/jquery-2.2.4.min.js") ?>"></script>
</head>

<body>
    <!-- ##### Footer Area Start ##### -->
    <header class="footer_area clearfix bg-dark" style="padding:0px">
        <div class="container">
            <div class="row align-items-center">
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-4">
                    <div class="single_widget_area">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="<?= base_url(); ?>"><img src="<?= base_url("assets/img/a/16.jPG") ?> " alt=""></a>
                        </div>

                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-12 col-lg-8">
                    <div class="single_widget_area">
                        <!-- Footer Menu -->
                        <div class="footer_menu">
                            <nav class="navbar navbar-expand-lg justify-content-end">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#footerNavContent" aria-controls="footerNavContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                                <div class="collapse navbar-collapse" id="footerNavContent">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url("Adm/Cpemesanan"); ?>" >Pemberitahuan ( 0 Pesanan Belum Dikirim)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url('Adm/cadmin'); ?>">Akun</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?= base_url("clogin/log-out"); ?>">Keluar</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Footer Area End ##### -->

    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="#" method="get">
                            <input type="search" name="search" id="search" placeholder="Type your keyword...">
                            <button type="submit"><img src="<?= base_url("assets/img/core-img/search.png") ?>" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <!-- Logo Brand -->
                <a href="<?= base_url(); ?>"><img src="<?= base_url("assets/img/a/4.jpg") ?> " alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>
        <!-- end Mobile Nav (max width 767px)-->

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <nav class="amado-nav">
                <ul>
                    <li><a href="<?= base_url('Adm/Ckategori'); ?>">Kategori</a></li>
                    <li><a href="<?= base_url('Adm/Cbarang'); ?>">Barang</a></li>
                    <li><a href="<?= base_url('Adm/Cprov'); ?>">Provinsi</a></li>
                    <li><a href="<?= base_url('Adm/Ckota'); ?>">Kabupaten/Kota</a></li>
                    <li><a href="<?= base_url('Adm/ckecamatan'); ?>">Kecamatan</a></li>
                    <li><a href="<?= base_url("Adm/Cpemesanan"); ?>">Pemesanan</a></li>
                    <!-- <li><a href="<?= base_url("Adm/Cpembayaran"); ?>">Pembayaran</a></li> -->
                    <li><a href="<?= base_url("Adm/Clap_barang"); ?>">Laporan Barang</a></li>
                    <li><a href="<?= base_url("Adm/Clap_penjualan"); ?>">Laporan Penjualan</a></li>
                    <li><a href="<?= base_url("Adm/Clap_pelanggan"); ?>">Laporan Pelanggan</a></li>
                </ul>
            </nav>
            <?php if ($this->session->userdata('status_login') == 'admin_oke') { ?>
                <!-- <a href="<?= base_url("clogin/log_out"); ?>" class="btn amado-btn mb-15">LOG OUT</a> -->
            <?php } ?>
            <!-- Cart Menu -->
        </header>
