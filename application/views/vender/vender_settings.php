<?php
//var_dump($feedback);

//var_dump($product);
//die; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Coin Payment Settings</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Update Merchant ID </h6>
            </div>
            <div class="card-body">
                
              <?php if(!empty($this->session->flashdata('coinpayment')) ){ ?>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="alert alert-info">
                              <?= $this->session->flashdata('coinpayment') ?>
                              <?= $this->session->flashdata('paypal') ?>
                          </div>
                      </div>
                  </div>
              <?php } ?>

            <div class="row">
                <div class="col-md-6">
                    <?= form_open('selly/update_vendor_merchant_id')?>

                    <div class="container">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Enable CoinPayment Method &nbsp;</label> 
                                <input type="checkbox" class="" name="coinpayment_status" <?php if($vendor_payment[0]['coinpayment_status'] == 1){ echo "checked"; } ?> >
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Merchant ID</label>
                                <input type="text" class="form-control" name="vendor_merchant_id" placeholder="Enter your wallet address" value="<?= $vendor_payment[0]['coinpayment_wallet_address'] ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >IPN Secret</label>
                                <input type="text" class="form-control" name="ipn_secret" placeholder="Enter your wallet address" value="<?= $vendor_payment[0]['ipn_secret'] ?>" required>
                            </div>
                        </div>

                        
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="submit" class="form-control btn btn-success" value="Update">
                            </div>
                        </div>
                        <!--container ended-->
                    </div>

                    <?=form_close()?>
                </div>
                
            </div>



            </div>
          </div>

          <h1 class="h3 mb-2 text-gray-800">Paypal Settings</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Paypal Email </h6>
            </div>
            <div class="card-body">
                
                <?php if( !empty($this->session->flashdata('paypal')) ){ ?>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="alert alert-info">
                              <?= $this->session->flashdata('paypal') ?>
                          </div>
                      </div>
                  </div>
              <?php } ?>

            <div class="row">
                <div class="col-md-6">
                    <?= form_open('selly/update_paypal_email')?>

                    <div class="container">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Enable Paypal Method &nbsp;</label> 
                                <input type="checkbox" class="" name="paypal_status" <?php if($vendor_payment[0]['paypal_status'] == 1){ echo "checked"; } ?> >
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Paypal Email</label>
                                <input type="email" class="form-control" name="paypal_email" placeholder="Enter your paypal email" value="<?= $vendor_payment[0]['paypal_email'] ?>">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="submit" class="form-control btn btn-success" value="Update">
                            </div>
                        </div>
                        <!--container ended-->
                    </div>

                    <?=form_close()?>
                </div>
                
            </div>



            </div>
          </div>

        </div>
        <!-- /.container-fluid -->



      </div>
      <!-- End of Main Content -->

