<?php //var_dump($vendor_product);echo '<br><br>';var_dump($single_vendor);die; ?>
<?php //var_dump($web_login);die; ?>
        <nav class="navbar navbar-expand-lg navbar-light " style="background:linear-gradient(90deg,#0b58f1 0%,#3fc1ff 100%); padding: 15px;">
            <a class="navbar-brand text-light" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
           
          </nav>

    <section class="content-section container">
     <div class="row" style="padding-top:20px;">
         
         <!--about area-->
         <div class="col-md-6 mx-auto p-2" >
                <div class="card product-item-purchase-area">
                        <h5 class="card-header text-light p-3" style="background:#5390ff; "> Coin Payment Checkout </h5>
                        <div class="card-body">
                          <p class="card-text">
                            <p class="product-item-price text-center">Product : <?= $single_product[0]['title'] ?></p>
                              <p class="product-item-price text-center">Price : $<?= $single_product[0]['price'] ?>.00</p>
                              <p id="discount" class="product-item-price text-center"></p>
                              <p id="total" class="product-item-price text-center"></p>
                             
                          </p>
                            
                          <!-- <p class="text-center coupon-area"><a href="#" id="apply" data-toggle="modal" data-target="#myModal">Apply a Coupon</a> </p> -->
                          <p class="text-center coupon-area"><a id="add_coupon"></a> </p>

                          <hr>

                          <p class="text-right coupon-area"><a href="#" id="apply" data-toggle="modal" data-target="#myModal">Apply a Coupon</a> </p>
                          <p >Quantity <span style="float: right;"> 1 </span></p>
                          <p >Total <span style="float: right;"> $<?= $single_product[0]['price'] ?> </span></p>
                          <hr>
                          
                          <form class="text-center">
                              <input type="submit" name="checkout" class="btn btn-primary" value="Checkout">
                          </form>

                        </div>
                        
                </div>
         </div>
         <!--about area end-->
        </div>
    </section>





<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color:#5390ff; ">
                <h5 class="card-header text-light p-4 text-center" style="width: 100%; ">Apply a Coupon</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="card product-item-description">
                    <div class="card-body">
                        <p class="card-text">
                            <label for="coupon-title">Coupon Code</label>
                            <br><input type="text" id="coupon" class="form-control">

                        </p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button id="click_coupon" class="btn btn-coupon" data-dismiss="modal">Apply Coupon</button>
<!--                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
            </div>

        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="paypal">
    <div class="modal-dialog ">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color:#5390ff; ">
                <h5 class="card-header text-light p-4 text-center" style="width: 100%; ">Continue With Paypal</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="card product-item-description">
                    <div class="card-body">
                        <p class="card-text">
                            <label for="coupon-title">Coupon Code</label>
                            <br><input type="text" id="coupon" class="form-control">

                        </p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button id="click_coupon" class="btn btn-coupon" data-dismiss="modal">Apply Coupon</button>
                <!--                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
            </div>

        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="coin">
    <div class="modal-dialog ">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color:#5390ff; ">
                <h5 class="card-header text-light p-4 text-center" style="width: 100%; ">Continue With Coin Payment</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="card product-item-description">
                    <div class="card-body">
                        <p class="card-text">
                            <label for="coupon-title">Coupon Code</label>
                            <br><input type="text" id="coupon" class="form-control">

                        </p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button id="click_coupon" class="btn btn-coupon" data-dismiss="modal">Apply Coupon</button>
                <!--                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>-->
            </div>

        </div>
    </div>
</div>

