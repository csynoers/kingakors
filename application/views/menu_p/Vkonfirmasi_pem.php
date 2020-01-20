<div class="cart-table-area section-padding-50">
  <div class="container-fluid"><br>
    <h2><center>Konfirmasi Pembayaran</h2>
    <hr>
    <p>Total pembayaran :Rp. <?= number_format(@$pembayaran->jumlah_uang) ?></p>
    <!-- <?php var_dump($pembayaran) ?> -->
    <p>Info Rek Bank : <b> <?= @$pembayaran->Transfer_Bank ?></p>

    <!-- body -->
    <form class="" action="<?= base_url('Ctm/Cpembayaran/update_action') ?>" enctype="multipart/form-data" method="post">
      <div class="form-group">
        <input type="file" class="form-control" name="bukti_transfer" id="bukti_transfer" onchange="cek_bukti_tf();">
        <!--untuk menampilkan preview gambar-->
        <img class="my-2" style="width: 330px;height: 590;border-radius: 1%;object-fit: cover; display: block;margin-right: auto;margin-left: auto;" id="upload_preview1" src="<?= base_url('assets/img/transfer.jpeg') ?>" style="width: 300px;" />
        <input type="hidden" class="form-control" name="upload_bukti1" id="upload_bukti1">
      </div>

      <input type="hidden" name="id_pembayaran" value="<?= @$pembayaran->id_pembayaran ?>">
      <div class="form-group">
        <label for="">Nama pengirim di Rekening Bank</label>
        <input type="text" class="form-control" name="nama_peng" id="nama_peng" value="" placeholder="Masukkan nama pengirim">
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Kirimkan</button>
        <?= form_close(); ?>
      </div>
    </form>
  </div>
</div>


<!-- ##### Main Content Wrapper End ##### -->

<script>
  function cek_bukti_tf() {
    var filename = $('input[type=file]').val().split('\\').pop();
    var extSplit = filename.split('.');
    var extReverse = extSplit.reverse();
    var ext = extReverse[0];

    if (ext === "jpg" || ext === "png" || ext == 'jpeg' || ext === "PNG" || ext == 'JPG' || ext == 'JPEG') {
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("bukti_transfer").files[0]);

      oFReader.onload = function(oFREvent) {
        document.getElementById("upload_preview1").src = oFREvent.target.result;
      };
      $('#upload_bukti1').val(filename);
    } else {
      alert("Masukan foto dengan format JPG, PNG");
    }
  }
</script>
