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
         <div class="col-md-9 p-2" >
                <div class="card product-item-description">
                        <h5 class="card-header text-light p-4" style="background:#5390ff; "><?= $single_product[0]['title'] ?></h5>
                        <div class="card-body">
                            <div class="" style="text-align: center;">
                                <img src="<?= base_url();?>image/product_image/<?= $single_product[0]['image'] ?>" class="img-responsive" style="width: 80%;">
                            </div>
                          <p class="card-text" style="margin-top: 20px;">
                            <h3>Description</h3>
                                <div style="padding: 10px;font-size: 16px;text-align: justify;">
                                    <?= $single_product[0]['des'] ?>
                                </div>
                          </p>
                        </div>
                </div>
         </div>
         <!--about area-->
         <div class="col-md-3 p-2" >
                <div class="card product-item-purchase-area">
                        <h5 class="card-header text-light p-3" style="background:#5390ff; ">About</h5>
                        <div class="card-body">
                          <p class="card-text">
                              <p class="product-item-price text-center">Price : $<?= $single_product[0]['price'] ?>.00</p>
                              <p id="discount" class="product-item-price text-center"></p>
                              <p id="total" class="product-item-price text-center"></p>
                             <p class="text-center"><a class="btn btn-primary purchase-btn" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Purchase</a>
                             </p> 
                             <div class="row">
                                        <div class="col">
                                          <div class="collapse multi-collapse" id="multiCollapseExample1">
                                         <ul class="list-group">

<!--                                           <li class="list-group-item disabled"><a href="#" data-toggle="modal" data-target="#paypal">Paypal</a></li>-->
<!--                                             <li class="list-group-item disabled"><a href="#" data-toggle="modal" data-target="#coin">Coins Payment</a></li>-->                         
                                            
                                            <!-- "<?= site_url('Main/view/coin_checkout/'.$this->uri->segment(4).'/'.$this->uri->segment(5)) ?>" -->
                                            <form action="" method="POST" id="coin_checkout_form">
                                                <input type="hidden" id="qty" name="qty" pattern="[0-9]*" value="1" > 
                                                <input type="hidden" id="form_coupon" name="coupon" value="" >
                                                <input type="email" name="user_email" class="form-control" id="user_email" style="font-size: 12px;" placeholder="Enter your email to proceed." required>
                                            </form>


                                            <!-- <form action="<?= site_url('Main/view/coin_checkout/'.$this->uri->segment(4).'/'.$this->uri->segment(5)) ?>" method="POST" id="paypal_checkout_form">
                                                <input type="hidden" id="qty" name="qty" pattern="[0-9]*" value="1" > 
                                                <input type="email" name="user_email" class="form-control" id="user_email" style="font-size: 12px;" placeholder="Enter your email to proceed." required>
                                            </form> -->


                                           <li class="list-group-item disabled"><a href="#" id="payBtn">Paypal</a></li>
                                           <!-- <li class="list-group-item disabled"><a href="<?= site_url('Products/buy/'.$single_product[0]['id']) ?>">Paypal</a></li> -->
                                            <li class="list-group-item disabled"><a href="#" id="cpBtn">Coins Payment</a></li>
                                        </ul>
                                          </div>
                                          </div>
                             </div>
                          </p>
                          <p class="increment-decrement-btn text-center">
                                <span class="sub-btn">
                                <svg class="pi_ex" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" height="8px" viewBox="0 0 491.9 491.9"><path d="M465.2 211.6H26.7C18.3 211.6 0 223 0 245.9s18.3 34.3 26.7 34.3h438.4c8.4 0 26.7-11.4 26.7-34.3s-18.2-34.3-26.6-34.3z"></path></svg>
                                </span>&nbsp; 
                                <span class="item-qty-area" ><input type="text" id="no"  pattern="[0-9]*" value="1" ></span>
                                &nbsp; 
                                <span class="add-btn">
                                        <svg class="pi_ex" xmlns="http://www.w3.org/2000/svg" height="8px" x="0px" y="0px" viewBox="0 0 491.86 491.86"><path d="M465.2 211.6h-185v-185C280.2 18.4 268.8 0 246 0s-34.3 18.3-34.3 26.7v185h-185C18.4 211.6 0 223 0 245.8s18.3 34.3 26.7 34.3h185v185c0 8.4 11.4 26.7 34.2 26.7s34.3-18.3 34.3-26.7v-185h185c8.4 0 26.7-11.4 26.7-34.3s-18.3-34.3-26.7-34.3z"></path></svg>
                                </span> 
                          </p>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                            <script>
                                $(document).ready(function () {

                                    function validateEmail(email) {
                                      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                                      return re.test(email);
                                    }

                                    $('#cpBtn').click(function(){

                                        var form_action = "<?= site_url('Main/view/coin_checkout/'.$this->uri->segment(4).'/'.$this->uri->segment(5)) ?>";
                                        $('#coin_checkout_form').attr('action', form_action);

                                        if( $('#user_email').val() != '' && validateEmail($('#user_email').val()) ) {
                                            $("#coin_checkout_form").submit();
                                        } else {
                                            alert('Please! Enter valid email.');
                                        }
                                    })


                                    $('#payBtn').click(function(){

                                        var form_action = "<?= site_url('Products/buy/'.$single_product[0]['id']) ?>";
                                        $('#coin_checkout_form').attr('action', form_action);

                                        if( $('#user_email').val() != '' && validateEmail($('#user_email').val()) ) {
                                            $("#coin_checkout_form").submit();
                                        } else {
                                            alert('Please! Enter valid email.');
                                        }
                                    })


                                    $('.add-btn').click(function () {
                                        var x = parseInt($('#no').val())+1;
                                        $('#no').val(x);
                                        $('#qty').val(x);
                                    });
                                    $('.sub-btn').click(function () {
                                        var x = parseInt($('#no').val());
                                        if(x>1){
                                            x--;
                                            $('#no').val(x);
                                            $('#qty').val(x);
                                        }
                                    });
                                    $('#click_coupon').click(function () {
                                        var x = $('#coupon').val();
                                        var arr = [];
                                        var arrD = [];
                                        var checkif = false;
                                        <?php foreach ($single_coupons as $k=>$v){ ?>
                                        arr.push("<?= $v['codes'] ?>");
                                        arrD.push("<?= $v['discount'] ?>");
                                        <?php } ?>
                                        for(var i =0;i<=<?= count($single_coupons) ?>;i++) {
                                            if (x === arr[i]) {
                                                $('#apply').css('display','none');
                                                $('#add_coupon').html(x);
                                                $('#form_coupon').val(x);
                                                checkif = true;
                                            }
                                        }
                                        if(!(checkif)) {
                                            alert('Invalid Coupon!');
                                        }
                                    });
                                });
                            </script>
                          <p class="text-center coupon-area"><a href="#" id="apply" data-toggle="modal" data-target="#myModal">Apply a Coupon</a> </p>
                          <p class="text-center coupon-area"><a id="add_coupon"></a> </p>
                        </div>
                        <div class="card-footer">
                                <div class="d-flex bd-highlight">
                                        <div class="p-2 w-100 bd-highlight">Seller: </div>
                                        <div class="p-2 flex-shrink-1 bd-highlight seller-name"><a href="<?= site_url('Main/view/vendor/'.$this->uri->segment(4)) ?>"><?= $single_product[0]['store_name'] ?></a></div>
                                </div>
                                <div class="d-flex bd-highlight">
                                        <div class="p-2 w-100 bd-highlight">Stock:</div>
                                        <div class="p-2 flex-shrink-1 bd-highlight stock-qty"><?= $single_product[0]['quantity'] ?></div>
                                </div>
                                <div class="d-flex bd-highlight">
                                        <div class="p-2 w-100 bd-highlight">Feedback:</div>
                                        <div class="p-2 flex-shrink-1 bd-highlight seller-feedback"><a href="<?= site_url('Main/view/vendor-feedback/'.$this->uri->segment(4).'/'.$this->uri->segment(5)) ?>" class="text-success"><?= count($single_feedback) ?></a></div>
                                </div>
                                
                                   <p class="text-center coupon-area"><a href="<?= site_url('Main/view/vendor-contact/'.$this->uri->segment(4)) ?>" style="font-size:12px;">Contact Seller</a> </p>
                        </div>
                </div>
         </div>
         <!--about area end-->
        </div>
    </section>


<!-- give customer feedback-->
    <section class="content-section container">
        <div class="col-md-12 p-2" >
         <h5 class="card-header text-light p-3" style="background:#5390ff; ">Give Your Feedback</h5>
            <?= form_open('Main/feedback/'.$single_product[0]['id'].'/'.$web_login[0]['id'].'/'.$this->uri->segment(4)) ?>
                <div class="card">
                        <div class="card-body">
                                <textarea class="form-control" name="message" rows="3" style="font-size: 14px; resize:none;"> </textarea>
                        </div>
                        <?php if($web_login[0]['status'] != 'Active') { ?>
                            <p class="text-center"><button class="btn text-light post-btn" disabled>You cannot post feedback</button></p>
                        <?php } else { ?>
                            <p class="text-center"><button type="submit" class="btn text-light post-btn">Post</button></p>
                        <?php } ?>
                </div>
            <?= form_close(); ?>
        </div>
     </section>
<!-- give customer feedback END-->


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

