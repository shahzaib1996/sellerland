<?php //var_dump($single_vendor);die; ?>
        <section class="banner-area relative banner-vendor" id="home">	
            <div class="overlay overlay-bg"></div>
            <div class="container">				
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content vendor-parent-links col-lg-12">
                       <img src="img/payment-method-1.svg" alt="" class="img-fluid vendor-img">
                    <p class="vendor-name "><a class="text-light" style="font-size: 18px;">All Products</a>
                        <!-- premium icon-->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999" height="18"><path d="M452.71 157.937l-133.741-12.404L265.843 22.17c-3.72-8.638-15.967-8.638-19.686 0l-53.126 123.362L59.29 157.937c-9.365.868-13.149 12.516-6.084 18.723l100.908 88.646-29.531 131.029c-2.068 9.175 7.841 16.373 15.927 11.572L256 339.331l115.49 68.576c8.087 4.802 17.994-2.397 15.927-11.572l-29.532-131.029 100.909-88.646c7.065-6.207 3.28-17.855-6.084-18.723z" fill="#ffdc64"></path><g fill="#fff082"><path d="M119.278 17.923c6.818 9.47 26.062 50.14 37.064 73.842 1.73 3.726-2.945 7.092-5.93 4.269-18.987-17.952-51.452-49.104-58.27-58.575-5.395-7.493-3.694-17.941 3.8-23.336 7.493-5.395 17.941-3.693 23.336 3.8zM392.722 17.923c-6.818 9.47-26.062 50.14-37.064 73.842-1.73 3.726 2.945 7.092 5.93 4.269 18.987-17.952 51.451-49.105 58.27-58.575 5.395-7.493 3.694-17.941-3.8-23.336-7.493-5.395-17.941-3.693-23.336 3.8zM500.461 295.629c-11.094-3.618-55.689-9.595-81.612-12.875-4.075-.516-5.861 4.961-2.266 6.947 22.873 12.635 62.416 34.099 73.51 37.717 8.778 2.863 18.215-1.932 21.078-10.711 2.863-8.779-1.932-18.215-10.71-21.078zM11.539 295.629c11.094-3.618 55.689-9.595 81.612-12.875 4.075-.516 5.861 4.961 2.266 6.947-22.873 12.635-62.416 34.099-73.51 37.717-8.778 2.863-18.215-1.932-21.078-10.711s1.932-18.215 10.71-21.078zM239.794 484.31c0-11.669 8.145-55.919 13.065-81.582.773-4.034 6.534-4.034 7.307 0 4.92 25.663 13.065 69.913 13.065 81.582 0 9.233-7.485 16.718-16.718 16.718-9.234.001-16.719-7.485-16.719-16.718z"></path></g><path d="M285.161 67.03l-19.319-44.86c-3.72-8.638-15.967-8.638-19.686 0L193.03 145.532 59.29 157.937c-9.365.868-13.149 12.516-6.084 18.723l100.908 88.646-29.531 131.029c-2.068 9.175 7.841 16.373 15.927 11.572l15.371-9.127c25.199-163.12 96.041-282.862 129.28-331.75z" fill="#ffc850"></path></svg>   </p>
<!--                     <p class="vendor-links"><a class="text-light" href="vendor-contact.php">Contact</a><a href="vendor-feedback.php" class="text-light">Feedback</a><a href="vendor-groups.php" class="text-light">Product Groups</a></p>-->
                    </div>	
                </div>
            </div>
        </section>

        <section class="container" style="padding-top: 20px;">
          <a href="<?= site_url('/Main/view/myqueries')?>" class="btn btn-primary" style="color:#fff;">My Queries</a>
        </section>
        <!-- End banner Area -->	
        <section class="content-section container pb-5">
                <div class="row pt20">
                    <?php $x=0; foreach ($product as $k=>$v){ if($vendor[$x]['id']== $v['user_id']){?>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 vdp-plr">
                            <div class="card">
                              <a href="<?= site_url('Main/view/vendor-brand-item-view/'.$vendor[$x]['id'].'/'.$v['id']) ?>">
                                  <img class="card-img-top vendor-product-img" src="<?= base_url() ?>theme/img/banner-img.svg" alt="Card image cap">
                                  <div class="card-body">
                                      <h3 class="card-text vendor-product-details text-center" style="color: #1f82f7"><?= $v['title'] ?></h3>
                                    <p class="card-text vendor-product-details" style="font-size: 13px; color:black;">Terms of service(Read before buying)</p>
                                    <span class="vendor-product-price" style="color:black; font-size:13px">$<?= $v['price'] ?></span>
                                    <span class="vendor-product-stock" style="float:right;  font-size:13px"><?= $v['quantity'] ?> in stock</span>
                                  </div>
                                </div>
                              </a>
                    </div>
                    <?php }} ?>
                </div>

                <!-- pagination for pages-->
                <nav aria-label="...">
                        <ul class="pagination">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                          </li>
                          <li class="page-item active"><a class="page-link" href="#">1</a></li>
                          <li class="page-item ">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                          </li>
                        </ul>
                      </nav>    

        </section>

