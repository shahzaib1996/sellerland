

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Product</h1>

          <!-- DataTales Example -->
<!--          --><?php //$attributes = array('class' => 'form-row', 'id' => 'myform'); ?>
          <?= form_open_multipart('vender/add_product')?>
          <input type="hidden" name="user_id" value="<?= $login[0]['id'] ?>">
          <div class="container">
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail4">Product Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title">
    </div>
    </div>

      <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail4">Image</label>
      <input type="file" class="form-control" name="image">
    </div>
        </div>
            
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Price">
              </div>

                <div class="form-group col-md-4">
                <label for="inputEmail4">WholeSale Price</label>
                <input type="number" class="form-control" name="WholeSale Price" placeholder="WholeSale Price">
              </div>
            </div>

              <div class="form-group col-md-4" style="padding: 0 10px 0 0 ">
                <label for="inputEmail4">Quantity</label>
                <input type="number" class="form-control" name="quantity" placeholder="Stock">
              </div>






<!--      <div class="form-row">-->
<!--    <div class="form-group col-md-6">-->
<!--      <label for="inputEmail4">Stock</label>-->
<!--      <input type="number" class="form-control" id="inputEmail4" placeholder="Stock">-->
<!--    </div>-->
<!---->
<!--        </div>-->
<!---->
<!---->
<!---->
<!--      <div class="form-row">-->
<!--    <div class="form-group col-md-4">-->
<!--      <label for="inputEmail4">Stock</label>-->
<!--      <input type="number" class="form-control" id="inputEmail4" placeholder="Stock">-->
<!--    </div>-->
<!---->
<!--        </div>-->

<!--  <div class="form-group">-->
<!--    <div class="form-check">-->
<!--      <input class="form-check-input" type="checkbox" id="gridCheck">-->
<!--      <label class="form-check-label" for="gridCheck">-->
<!--        Check me out-->
<!--      </label>-->
<!--    </div>-->
<!--  </div>-->
            <div class="form-group col-md-12 text-center">

                <button type="submit"  class="btn btn-primary  ">Add</button>
            </div>

            <!--container ended-->
      </div>
        </div>



          <?=form_close()?>

          <!--container-fluid ended-->
      </div>
        <br>

