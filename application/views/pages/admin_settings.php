
        <!-- Begin Page Content -->
        <div class="container-fluid">
           
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Coinpayment Settings</h1>
            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Update Coinpayment Settings</h6>
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
                    <?= form_open('selly/admin_update_coinpayment')?>

                    <div class="container">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Wallet Code</label>
                                <input type="text" class="form-control" name="admin_wallet_address" placeholder="Enter your wallet address" value="<?= $admin_data[0]['coinpayment_wallet_address'] ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Coin Accept</label>
                                <select name="coin" class="form-control" required>
                                  <option hidden><?=$admin_data[0]['coin']?></option>
                                  <?php if(count($vendor_coin) != 0){ foreach($vendor_coin as $coin) { ?>
                                    <option value="<?= $coin['acronym']?>"><?= $coin['name'] ?></option>
                                  <?php } } ?>

                                </select>
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
            <h1 class="h3 mb-2 text-gray-800">Paypal Settings</h1>
            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"> Update Paypal Settings</h6>
            </div>
            <div class="card-body">
                
              <?php if(!empty($this->session->flashdata('paypal')) ){ ?>
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
                    <?= form_open('selly/admin_update_paypal')?>

                    <div class="container">

                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label >Paypal Email</label>
                                <input type="text" class="form-control" name="paypal_email" placeholder="Enter your paypal email" value="<?= $admin_data[0]['paypal_email'] ?>" required>
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

            <!--container-fluid ended-->
        </div>
        <br>

