

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Update Store</h1>

          <!-- DataTales Example -->
          <?= form_open_multipart('selly/update_package/'.$this->uri->segment(4))?>
          <div class="container">
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail4">Title</label>
      <input type="text" class="form-control" name="title" value="<?=$wh_package[0]['title']?>" placeholder="Title">
    </div>
    </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Price" value="<?=$wh_package[0]['price']?>">
              </div>

              <div class="form-group col-md-4">
                <label for="inputEmail4">Stock</label>
                <select name="type" id="">
                  <option hidden><?=$wh_package[0]['type']?></option>
                  <option value="Free">Free</option>
                  <option value="Paid">Paid</option>
                  <option value="Premium">Premium</option>
                </select>
              </div>
            </div>

            <div class="row ">
              <div class="col-md-8">
                <input type="submit"  class="btn btn-primary" value="Update">
              </div>
            </div>

            <!--container ended-->
      </div>


          <?=form_close()?>

          <!--container-fluid ended-->
      </div>
        <br>

