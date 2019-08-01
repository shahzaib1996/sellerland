<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#generate').click(function(e) {
            var strVal = $('#string').val();
            if (strVal.length == 0) {
                $('#statement').html('Please enter something');
            }
            else {
                var strMD5 = $().crypt({
                    method: "md5",
                    source: strVal
                });
                $('#string').val(' ');
                $('#string').val("MD5 string of <b>" + strVal + "</b> is <b>" + strMD5 + "</b>");
            }
            e.preventDefault();
        });
    });
</script>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Add Coupons</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Coupons</h6>
        </div>
        <div class="card-body">
            <div class="container">
                <?= form_open('vender/add_coupons') ?>
                <input type="hidden" value="<?= $vendor_id ?>" name="vender_id">

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Code</label>
                        <input type="text" class="form-control" value="" name="codes" maxlength="20" placeholder="Max 20 characters long" style="text-transform: uppercase;">

                        <!-- <div class="row">
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="string" name="codes" placeholder="Coupon Code">
                                <span id="statement"></span>
                            </div>
                            <div class="col-sm-4">
                                <span class="btn btn-success" id="generate">Generate</span>
                            </div>
                        </div> -->
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Discount</label>
                        <input type="number" class="form-control" value="" name="discount" min="1" max="100" placeholder="USD ($)">
                    </div>
                </div>
                <!-- <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputEmail4">Product</label>
                        <select name="pro_id" class="form-control" id="">
                            <option value="" hidden>Select Product</option>
                            <?php foreach ($code_product as $k=>$v){ ?>
                            <option value="<?= $v['id'] ?>"><?= $v['title'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div> -->
                <div class="form-group col-md-4 text-center">
                    <button type="submit"  class="btn btn-primary form-control">Add Coupons</button>
                </div>
                <?= form_close(); ?>

                <!--container ended-->
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
