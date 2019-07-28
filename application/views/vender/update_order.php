

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Update Order</h1>

          <!-- DataTales Example -->
          <?= form_open_multipart('vender/update_order/'.$this->uri->segment(4))?>
          <div class="container">
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail4">Title</label>
      <input type="text" class="form-control" name="title"  placeholder="Title" value="<?=$wh_orders[0]['title']?>">
    </div>
    </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Price" value="<?=$wh_orders[0]['price']?>" >
              </div>
                <div class="form-group col-md-4">
                <label for="inputEmail4">Quantity</label>
                <input type="number" class="form-control" name="qty" placeholder="Quantity" value="<?=$wh_orders[0]['qty']?>">
              </div>
            </div>


              <div class="form-group col-md-4" style="padding: 0px">
                <label for="inputEmail4">Payment</label>
                  <select name="status" id="" class="form-control">
                      <option hidden><?=$wh_orders[0]['status']?></option>
                      <option value="paid">paid</option>
                      <option value="pending">pending</option>
                  </select>
              </div>
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
            <div class="row ">
              <div class="col-md-12 text-center">
                <input type="submit"  class="btn btn-primary" value="Update">
              </div>
            </div>

            <!--container ended-->
      </div>


          <?=form_close()?>

          <!--container-fluid ended-->
      </div>
        <br>

