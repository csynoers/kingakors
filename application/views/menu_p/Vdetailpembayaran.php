<div class="cart-table-area section-padding-50">
  <div class="container-fluid"></br>
    <h2><center>Info Pembayaran</h2>
    <hr>
            <p>Total pembayaran :Rp. <?php echo number_format(@$pembayaran->jumlah_uang); ?> </p>

                <p>Info Rek Bank : <?php  echo (@$pembayaran->Transfer_Bank); ?></p>

                  <p>Silahkan lakukan pembayaran sesuai jumlah di atas kurun waktu 1x24 jam sesuai no rekening yang tertera <br></p>

                  <br>
                  <hr>
                  <br>
                  <form class="" action="<?php echo base_url("Ctm/Cpembayaran/Konfirmasi");?>" method="post">
                    <input type="hidden" name="id" value="<?php echo @$pembayaran->id_pembayaran;?>">
                    <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Upload bukti transfer sekarang</button> </form>
                    <tr><br>

                  <form class="" action="<?php echo base_url("Chome");?>" method="post">
                    <button type="submit" class="btn btn-success"> <i class="fa fa-plus"></i> Upload bukti transfer nanti</button> </form>
                  <tr><br><br><br>


            </form>
        </div>
    </div>
</div>
<!-- ##### Main Content Wrapper End ##### -->
