<div class="container">
  <div class="row">
    <div class="col-3">
      <div class="shop_sidebar_area" style="background-color:#f5f7fa; padding: 100px 40px; width:230px;max-width:230px;flex:0 0 230px;position:relative;z-index:1;-webkit-box-flex:0;">
          <!-- ##### Single Widget ##### -->
          <div class="widget catagory mb-50">
              <!-- Widget Title -->
              <h6 class="widget-title mb-30" >Catagories</h6>
              <!--  Catagories  -->
              <div class="catagories-menu">
                <ul>
                  <li><a href="<?= base_url('ctm/Cbarang/1');?>">Chairs</a></li>
                  <li><a href="<?= base_url('ctm/Cbarang/2');?>">Bookcase</a></li>
                  <li><a href="<?= base_url('ctm/Cbarang/3');?>">Cupboard</a></li>
                </ul>
              </div>
          </div>
      </div>
    </div>
    <div class="col-9" style="padding:100px 0px 0px 0px">
      <div class="col-12">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Product</li>
            <?php
              // echo $kategori;
              if ($this->session->kategori_barang == null) {
                $kat = "Chairs";
              }else{
                if ($this->session->kategori_barang == 1) {
                  $kat = "Chairs";
                }else if ($this->session->kategori_barang == 2){
                  $kat = "Bookcase";
                }else if ($this->session->kategori_barang == 3) {
                  $kat = "Cupboard";
                }
              }
            ?>
            <li class="breadcrumb-item active"><?= $kat ?></li>
          </ol>
        </nav>
      </div>
      <div class="col-12">
        <div class="row">
          <?php foreach ($barang as $list) { ?>
          <div class="col-md-4">
            <div class="single-product-wrapper">
              <a href="<?= base_url("C_barang/detailbarang/".$list->id_barang); ?>">
                <!-- Product Image -->
                <div class="product-img">
                    <img src="<?= base_url("assets/uploads/".$list->gambar)?>" alt="">
                    <!-- Hover Thumb -->
                    <img class="hover-img" src="<?= base_url("assets/uploads/".$list->gambar1)?>" alt="">
                </div>
                <!-- Product Description -->
                <div class="product-description d-flex align-items-center justify-content-between">
                    <!-- Product Meta Data -->
                    <div class="product-meta-data">
                        <div class="line"></div>
                        <p class="product-price" style="color:black;font-size:15px">Rp. <?= number_format($list->harga) ?></p>
                        <h6><?= $list->merek ?></h6>
                    </div>
                    <!-- Ratings & Cart -->
                    <div class="ratings-cart text-right">
                        <div class="cart">
                            <span data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="<?= base_url('assets/amado/img/core-img/cart.png')?>" alt=""></span>
                        </div>
                    </div>
                </div>
              </a>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
