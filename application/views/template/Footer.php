<footer style="display:none" class="section footer-classic text-dark bg-image" style="background: #000000;">
  <div class="container">
    <div class="row row-30">


      <div class="col-md-4 col-xl-5 ">
        <br>
        <div class="pr-xl-4">
          <p>Kami menciptakan desain furniture yang luar biasa, dengan cara memperluas jangkauan produk.</p>
          <!-- Rights-->
          <p class="rights"><span>TEMUKAN KAMI</span>
            <div class="pr-xl-4">
              <span class="fa fa-facebook-square fa-2x"></span>
              <span class="fa fa-instagram fa-2x"></span>
              <span class="fa fa-comment fa-2x"></span>
            </div>
          </p>
          <dd>Anda punya pertanyaan? silahkan hubungi</dd>
          <p>Kontak</p>
          <p>085229123244</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <br>
      <dl class="contact-list">
        <p>
          <dt>Alamat:</dt>
          <p>Jalan tentara pelajar no.122, Waras, Sariharjo, Ngaglik, Kabupaten Sleman, Yogyakarta</p>
        </p>
      </dl>
      <dl class="contact-list">
        <p>
          <dt>email:</dt>
          <p>depojati06@gmail.com</p>
          <p><a href="mailto:#">#</a></p>
          <!-- </dl>
              <dl class="contact-list">
                <dt>phones:</dt>
                <p>08114813804</p>
                </dd>
              </dl> -->
    </div>
    <div class="col-md-4 col-xl-3">
      <br>
      <!-- <h5>Links</h5> -->
      <ul class="nav-list">
      </ul>
    </div>
  </div>
  </div>


</footer>
<div class="modal fade bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal Title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal Body ...</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
<!-- <script src="<?= base_url("assets/amado/js/jquery/jquery-2.2.4.min.js") ?>"></script> -->

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