

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Add Package</h1>

          <!-- DataTales Example -->
<!--          --><?php //$attributes = array('class' => 'form-row', 'id' => 'myform'); ?>
          <?= form_open('selly/insert_package')?>
          <div class="container">
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail4">Title</label>
      <input type="text" class="form-control" name="title" placeholder="Title">
    </div>
    </div>
            
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Price">
              </div>

              <div class="form-group col-md-4">
                <label for="inputEmail4">Type</label>
                <select name="type" id="" class="form-control">
                  <option value="Free">Free</option>
                  <option value="Paid">Paid</option>
                  <option value="Premium">Premium</option>
                </select>
              </div>
            </div>

            <div class="row ">
              <div class="col-md-8">
                <button type="submit"  class="btn btn-primary  ">Add</button>
              </div>
            </div>

            <!--container ended-->
      </div>


          <?=form_close()?>

          <!--container-fluid ended-->
      </div>
        <br>

