<!-- ##### Main Content Start ##### -->
<div class="" style="margin-bottom:10px">
  <div class="row">
    <div class="col-12">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="<?= base_url('assets/img/a/3.jpg')?>" alt="First slide">
              <div class="carousel-caption">
                <h3 class="text-white">KING AKOR'S</h3>
                <p class="text-white">Kami menciptakan desain furniture yang luar biasa, dengan cara memperluas jangkauan produk</p>
                <a href="<?= base_url('Chome/profil_akors')?>">
                  <div class="btn btn-info">Lihat Profil Kami</div>
                </a>
              </div>
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="<?= base_url('assets/img/a/4.jpg')?>" alt="Second slide">
              <div class="carousel-caption">
                <h3 class="text-white">KING AKOR'S</h3>
                <p class="text-white">Kami menciptakan desain furniture yang luar biasa, dengan cara memperluas jangkauan produk</p>
                <a href="<?= base_url('Chome/profil_akors')?>">
                  <div class="btn btn-info">Lihat Profil Kami</div>
                </a
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="row">
      <div class="col-lg-12">
          <div class="section-title-area text-center"></br></br>
              <h1 class="section-title">New Product</h1>
          </div>
      </div>
  </div>
  <div class="row">
    <?php foreach ($barang as $list) { ?>
    <div class="col-4">
      <div class="single-product-wrapper">
        <a href="<?= base_url("C_barang/detailbarang/".$list['id_barang']); ?>">
          <!-- Product Image -->
          <div class="product-img">
              <img src="<?= base_url("assets/uploads/".$list['gambar'])?>" alt="">
              <!-- Hover Thumb -->
              <img class="hover-img" src="<?= base_url("assets/uploads/".$list['gambar1'])?>" alt="">
          </div>
          <!-- Product Description -->
          <div class="product-description align-items-center justify-content-between">
              <!-- Product Meta Data -->
              <div class="product-meta-data">
                  <div class="line"></div>
                  <p class="product-price" style="color:black;font-size:15px;font-size:12px;color:grey;">Rp. <?= number_format($list['harga']) ?></p>
                  <h2 style="color:#1b1b1b"><?= $list['merek'] ?></h2>
              </div>
              <div class="product-meta-data">
                  <a href="<?= base_url("C_barang/detailbarang/".$list['id_barang']); ?>"><input type="button" name="" value="Add to Cart" class="btn btn amado-btn w-100"></a>
              </div>
          </div>
        </a>
      </div>
    </div>
    <?php } ?>
  </div>
</div>
