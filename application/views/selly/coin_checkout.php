
<?php //var_dump($web_login);die; ?>
        <nav class="navbar navbar-expand-lg navbar-light " style="background:linear-gradient(90deg,#0b58f1 0%,#3fc1ff 100%); padding: 15px;">
            <a class="navbar-brand text-light" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
           
          </nav>

    <section class="content-section container">
     <div class="row" style="padding-top:20px;padding-bottom: 20px;">
         
         <!--about area-->
         <div class="col-md-6 mx-auto p-2" >
                <div class="card product-item-purchase-area">
                        <h5 class="card-header text-light p-3" style="background:#5390ff;"> Coin Payment Checkout </h5>
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
                          <p >Quantity <span style="float: right;" id="s_qty"> <?php if( isset($_POST['qty']) && $_POST['qty'] > 0  ) echo $_POST['qty']; else echo '1'; ?> </span></p>
                          <p >Total <span style="float: right;" id="s_total"> $ <?= $single_product[0]['price'] ?> </span></p>
                          <hr>
                          
                          <!-- <form class="text-center" action="<?= site_url('Main/coin_transaction') ?>" method="POST">
                            <input type="hidden" name="product_id" value="<?= $this->uri->segment(5) ?>">
                            <input type="hidden" name="vendor_id" value="<?= $this->uri->segment(4) ?>">
                            <input type="hidden" name="price" id="price" value="<?= $single_product[0]['price'] ?>">
                            <input type="hidden" name="quantity" id="quantity" value="<?php if( isset($_POST['qty']) && $_POST['qty'] > 0  ) echo $_POST['qty']; else echo '1'; ?>">
                            <input type="hidden" name="total_price" id="total_price" value="">
                              <input type="submit" name="checkout" class="btn btn-primary" value="Checkout">
                          </form> -->

                          <input type="hidden" name="price" id="price" value="<?= $single_product[0]['price'] ?>">
                          <input type="hidden" name="quantity" id="quantity" value="<?php if( isset($_POST['qty']) && $_POST['qty'] > 0  ) echo $_POST['qty']; else echo '1'; ?>">

                          <form action="https://www.coinpayments.net/index.php" method="post">
                            <input type="hidden" name="cmd" value="_pay_simple">
                            <input type="hidden" name="reset" value="1">
                            <input type="hidden" name="merchant" value="<?= $cp_details['coinpayment_merchant'] ?>">
                            <input type="hidden" name="item_name" value="<?= $single_product[0]['title'] ?> - <?= $vendor['store_name'] ?>">
                            <input type="hidden" name="item_number" value="<?= $this->uri->segment(5) ?>">
                            <input type="hidden" name="invoice" value="1">
                            <input type="hidden" name="currency" value="USD">
                            <input type="hidden" name="amountf" value="" id="total_price">
                            <input type="hidden" name="want_shipping" value="0">
                            <!-- <input type="hidden" name="success_url" value="<?= site_url('Main/coin_transaction_complete') ?>"> -->
                            <input type="hidden" name="success_url" value="<?= site_url('Main/view/vendor-brand-item-view') ?>/<?= $this->uri->segment(4)?>/<?= $this->uri->segment(5) ?>?fb=1">
                            <input type="hidden" name="cancel_url" value="<?= site_url('Main/view/vendor-brand-item-view') ?>/<?= $this->uri->segment(4)?>/<?= $this->uri->segment(5) ?>">
                            <input type="hidden" name="ipn_url" value="<?= site_url('Main/coin_ipn_handler') ?>/<?= $order_id ?>">
                            <input type="image" src="https://www.coinpayments.net/images/pub/buynow-wide-blue.png" alt="Buy Now with CoinPayments.net">
                          </form>

                        </div>

                        <script>
                                $(document).ready(function () {

                                    var total_price = $('#quantity').val() * $('#price').val();
                                    $('#total_price').val(total_price);

                                    $('#s_total').html('$ '+total_price);


                                });
                            </script>
                        
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

