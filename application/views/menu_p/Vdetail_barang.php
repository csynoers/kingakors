<div class="container-fluid">
  <div class="row">
    <div class="col-12">

      <!-- ##### Main Content Wrapper Start ##### -->
      <div class="main-content-wrapper d-flex clearfix">
          <!-- Product Details Area Start -->
          <div class="single-product-area section-padding-50 clearfix">
              <div class="">
                  <div class="row">
                      <div class="col-12">
                          <nav aria-label="breadcrumb">
                              <ol class="breadcrumb mt-50">
                                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Product</a></li>
                                  <li class="breadcrumb-item active"><a href="#">Details</a></li>
                              </ol>
                          </nav>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                          <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                  <li class="active" data-target="#product_details_slider" data-slide-to="0" style="background-image: url(<?= base_url('assets/uploads/'.$barang->gambar)?>)">
                                  </li>
                                  <li data-target="#product_details_slider" data-slide-to="1" style="background-image: url(<?= base_url('assets/uploads/'.$barang->gambar1)?>)">
                                  </li>
                              </ol>
                              <div class="carousel-inner">
                                  <div class="carousel-item active">
                                      <a class="gallery_img" href="<?= base_url("assets/uploads/".$barang->gambar)?>">
                                          <img class="d-block w-100 img-rounded" src="<?= base_url("assets/uploads/".$barang->gambar)?>" alt="First slide">
                                      </a>
                                  </div>
                                  <div class="carousel-item">
                                      <a class="gallery_img" href="<?= base_url("assets/uploads/".$barang->gambar1)?>">
                                          <img class="d-block w-100 img-rounded" src="<?= base_url("assets/uploads/".$barang->gambar1)?>" alt="Second slide">
                                      </a>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-lg-5">
                          <div class="single_product_desc">
                              <!-- Product Meta Data -->
                              <div class="product-meta-data">
                                  <div class="line"></div>
                                  <p class="product-price">Rp.<?= number_format($barang->harga) ?></p>
                                  <a href="#">
                                      <h6><?= $barang->merek ?></h6>
                                  </a>
                                  <!-- Avaiable -->
                                  <?php
                                    if ($barang->stok > 0) {
                                      ?>
                                      <p class="avaibility"><i class="fa fa-circle"></i> Available</p>
                                      <?php
                                    }else{
                                      ?>
                                      <p class="" style="color:grey"><i class="fa fa-circle"></i> Out Stock</p>
                                      <?php
                                    }
                                  ?>
                              </div>

                              <div class="short_overview my-5">
                                  <p><?= $barang->diskripsi ?></p>
                              </div>

                              <!-- Add to Cart Form -->
                              <form class="cart clearfix" action="<?= base_url('Ctm/Cbarang/add_keranjang/') ?>" method="post">
                                  <div class="cart-btn d-flex mb-50">
                                          <input type="hidden" id="maxi_stock"  name="maxi_stock" value="<?php echo $barang->stok; ?>">
                                      <p>Qty</p>
                                      <div class="quantity">
                                          <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>

                                          <input type="number" class="qty-text" id="qty" step="1" name="quantity" value="1">

                                          <span class="qty-plus" onclick="
                                          var maxistock = document.getElementById('maxi_stock').value;
                                          var effect = document.getElementById('qty');
                                          var qty = effect.value;
                                            if(parseInt(qty) < parseInt(maxistock)) {
                                                effect.value++;
                                            }
                                        //   if( !isNaN( qty )) effect.value++;
                                          return false;
                                          "><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                      </div>
                                  </div>

                                  <?php if ($barang->stok > 0) { ?>
                                    <button type="submit" name="id_barang" value="<?= $barang->id_barang ?>" class="btn amado-btn">Add to cart</button>
                                  <?php }else{ ?>
                                    <button type="submit" name="id_barang" value="<?= $barang->id_barang ?>" disabled class="btn amado-btn">Add to cart</button>
                                  <?php } ?>
                              </form>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Product Details Area End -->
      </div>
      <!-- ##### Main Content Wrapper End ##### -->
    </div>
  </div>
</div>
