<?php
// var_dump($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>KING AKOR'S - Furniture And Interior Design | Tugas Akhir</title>

    <!-- logo icon di bar -->
    <link rel="icon" href="<?= base_url('assets/img/core-img/new.PNG'); ?>">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/amado/css/core-style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/amado/style.css') ?>">

    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/datatables') ?>/dataTables.bootstrap4.min.css" rel="stylesheet">
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
                                    <?php if ($this->session->userdata('status_login') == "customer_oke") { ?>
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item ">
                                                <a class="nav-link" href="<?= base_url('Chome'); ?>">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= base_url('ctm/Cbarang'); ?>">Product</a>
                                            </li>
                                            <li class="nav-item">
                                                <?php
                                                $crt = "";
                                                // print_r($cart);
                                                if (isset($cart)) {
                                                    $crt =  $cart->num_rows();
                                                } else {
                                                    $crt = "0";
                                                }
                                                ?>
                                                <a class="nav-link" href="<?= base_url('Ctm/Ckeranjang'); ?>">Cart (<?= $crt; ?>)</a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-user"></i> <?= $this->session->userdata('username') ?>
                                                </a>
                                                <div class="dropdown-menu bg-warning" aria-labelledby="navbarDropdownMenuLink">
                                                    <a class="dropdown-item" href="<?= base_url('Ctm/cprofil'); ?>">My Account</a>
                                                    <a class="dropdown-item" href="<?= base_url('Ctm/Criw'); ?>">Order Details</a>
                                                </div>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="<?= base_url('Clogin/log_out'); ?>">Log Out</a>
                                                </li>
                                            </li>
                                        </ul>
                                    <?php } else { ?>
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= base_url('Chome'); ?>">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= base_url('C_barang'); ?>">Product</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?= base_url('Adm/A_log'); ?>">Sign In</a>
                                            </li>
                                        </ul>
                                    <?php } ?>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Footer Area End ##### -->
