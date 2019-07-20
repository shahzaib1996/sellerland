
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?php if(!empty($this->session->flashdata('email')) OR !empty($this->session->flashdata('password'))){ ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info">
                            <?= $this->session->flashdata('email') ?>
                            <?= $this->session->flashdata('password') ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
<!--          --><?php //if(!empty(form_error('email'))){ ?>

<!--          --><?php //} ?>
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Reset Email</h1>
            <div class="row">
                <div class="col-md-6">
                    <?= form_open('selly/up_email')?>
<!--                    <div class="row">-->
<!--                        <div class="col-lg-12">-->
<!--                            <div class="alert alert-info">-->
<!--                                --><?//= validation_errors()?>
<!--                                --><?//= form_error('cur_password');?>
<!--                                --><?//= form_error('password');?>
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
                    <div class="container">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputEmail4">Current Email</label>
                                <input type="email" class="form-control" name="cur_email" placeholder="Current Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputEmail4">New Email</label>
                                <input type="email" class="form-control" name="email" placeholder="New Email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="submit" class="form-control btn btn-success" value="Update Email">
                            </div>
                        </div>
                        <!--container ended-->
                    </div>
<!--                    --><?php //var_dump(form_error('cur_email'))?>
                    <?=form_close()?>
                </div>
                <div class="col-md-6">
                    <?= form_open('selly/up_password')?>
                    <div class="container">
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputEmail4">Current Password</label>
                                <input type="password" class="form-control" name="cur_password" placeholder="Current Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <label for="inputEmail4">New Password</label>
                                <input type="password" class="form-control" name="password" placeholder="New Password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                                <input type="submit" class="form-control btn btn-success" value="Update Password">
                            </div>
                        </div>
                        <!--container ended-->
                    </div>
                    <?=form_close()?>
                </div>
            </div>

            <!--container-fluid ended-->
        </div>
        <br>

