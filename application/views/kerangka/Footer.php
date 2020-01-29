        <!-- ##### Newsletter Area Start ##### -->
        <section class="newsletter-area section-padding-100-0">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Newsletter Text -->
                    <div class="col-12 col-lg-6 col-xl-2" style="min-height:300px">
                        <div class="newsletter-text mb-50 mt-3">
                            <h4 class="text-white">Social Media</h4>
                            <hr style="border-color:white">
                            <table class="text-white">
                                <tr>
                                    <td><i class="fa fa-facebook"></i></td>
                                    <td>
                                        <p class="text-white">&nbsp Facebook</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-google"></i></td>
                                    <td>
                                        <p class="text-white">&nbsp Google</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-whatsapp"></i></td>
                                    <td>
                                        <p class="text-white">&nbsp 08123456789</p>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <!-- Newsletter Text -->
                    <div class="col-12 col-lg-6 col-xl-4" style="min-height:300px">
                        <div class="newsletter-text mb-50 mt-3">
                            <h4 class="text-white text-center">Contact Us</h4>
                            <hr style="border-color:white">
                            <address>
                                <p>Address : Desa Singopadu, RT/RW 07/02, Kec. Sidoharjo, Kabupaten Sragen, Jawa Tengah 57281</p>
                            </address>
                            <p><i class="fa fa-comment"></i> &nbsp : kingakor's06@gmail.com</p>
                            <p>Hp &nbsp: 0811-4813-804</p>
                        </div>
                    </div>
                    <!-- Newsletter Form -->
                    <div class="col-12 col-lg-6 col-xl-6" style="min-height:300px">
                        <div class="newsletter-text mb-50 mt-3">
                            <h4 class="text-white text-center">Customer Support</h4>
                            <hr style="border-color:white">
                            <p>Klik Untuk : <a href="<?= base_url('auth/lkonsumen') ?>" class="text-white">Pembayaran & Pembelian</a></p>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </section>



        <!-- <footer> -->

        <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
        <script src="<?= base_url("assets/amado/js/jquery/jquery-2.2.4.min.js") ?>"></script>

        <script>
        // $(document).ready(function() {
        //   $('#dTable').DataTable();
        // });
        </script>
        <!-- <script src="<?= base_url("assets/bootstrap/js/bootstrap.bundle.min.js") ?>"></script> -->

        <!-- Popper js -->
        <script src="<?= base_url("assets/amado/js/popper.min.js") ?>"></script>
        <!-- Bootstrap js -->
        <script src="<?= base_url("assets/bootstrap/js/bootstrap.min.js") ?>"></script>
        <!-- Plugins js -->
        <?php if (!isset($update) && !isset($_POST['tambah'])) { ?>
        <script src="<?= base_url("assets/amado/js/plugins.js") ?>"></script>
        <?php } ?>
        <!-- Active js -->
        <script src="<?= base_url("assets/amado/js/active.js") ?>"></script>


        <!-- Page level plugins -->
        <script src="<?= base_url('assets') ?>/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url('assets') ?>/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?= base_url('assets') ?>/datatables/demo/datatables-demo.js"></script>
        <script src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js></script"></script>
        <script src="<?= base_url(); ?>assets/js/myscript.js"></script>
        <!-- </footer> -->
    </body>
</html>