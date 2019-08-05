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

           <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Vender Profile Image</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Profile Image </h6>
            </div>
            <div class="card-body">
                
              <?php if(!empty($this->session->flashdata('vendor_pp')) ){ ?>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="alert alert-info">
                              <?= $this->session->flashdata('vendor_pp') ?>
                          </div>
                      </div>
                  </div>
              <?php } ?>

            <div class="row">
                <div class="col-md-6">
                    <?= form_open_multipart('selly/update_vendor_profile_image')?>

                    <div class="container">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Choose Profile Image &nbsp;</label> 
                                <input type="file" class="" name="vendor_image" class="form-control" >
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

          <h1 class="h3 mb-2 text-gray-800">Vender Email</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Email update </h6>
            </div>
            <div class="card-body">
                
              <?php if(!empty($this->session->flashdata('vendor_email')) ){ ?>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="alert alert-info">
                              <?= $this->session->flashdata('vendor_email') ?>
                          </div>
                      </div>
                  </div>
              <?php } else if(!empty($this->session->flashdata('vendor_e_error')) ){ ?>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="alert alert-danger">
                              <?= $this->session->flashdata('vendor_e_error') ?>
                          </div>
                      </div>
                  </div>
              <?php } ?>

            <div class="row">
                <div class="col-md-6">
                    <?= form_open_multipart('selly/update_vendor_email')?>

                    <div class="container">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Current Email</label> 
                                <input type="email" name="cur_email" class="form-control" required>
                                <span> <?= form_error('cur_email') ?> </span>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >New Email</label> 
                                <input type="email" name="email" class="form-control" required>
                                <span> <?= form_error('email') ?> </span>
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


          <h1 class="h3 mb-2 text-gray-800">Vender Password</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Password update </h6>
            </div>
            <div class="card-body">
                
              <?php if(!empty($this->session->flashdata('vendor_pass')) ){ ?>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="alert alert-info">
                              <?= $this->session->flashdata('vendor_pass') ?>
                          </div>
                      </div>
                  </div>
              <?php } else if(!empty($this->session->flashdata('vendor_p_error')) ){ ?>
                  <div class="row">
                      <div class="col-lg-6">
                          <div class="alert alert-danger">
                              <?= $this->session->flashdata('vendor_p_error') ?>
                          </div>
                      </div>
                  </div>
              <?php } ?>

            <div class="row">
                <div class="col-md-6">
                    <?= form_open_multipart('selly/update_vendor_password')?>

                    <div class="container">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Current Password</label> 
                                <input type="password" name="old_password" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >New Password</label> 
                                <input type="password" name="new_password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required >
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Confirm New Password</label> 
                                <input type="password" name="new_c_password" class="form-control" required >
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

