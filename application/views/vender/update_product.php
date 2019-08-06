


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Update Product</h1>

          <!-- DataTales Example -->
          <?= form_open_multipart('vender/update_product/'.$this->uri->segment(4))?>
          <div class="container">
            <div style="margin-bottom: 10px;">
              <img src="<?= base_url();?>image/product_image/<?= $wh_product[0]['image'] ?>" height="100px" style="border: 2px solid black;">

            </div>
  <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail4">Title</label>
      <input type="text" class="form-control" name="title"  placeholder="Title" value="<?=$wh_product[0]['title']?>" required>
    </div>
    </div>

      <div class="form-row">
    <div class="form-group col-md-8">
      <label for="inputEmail4">Image</label>
      <input type="file" class="form-control" name="image" >
    </div>
        </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="inputEmail4">Price</label>
                <input type="number" class="form-control" name="price" placeholder="Price" value="<?=$wh_product[0]['price']?>" required>
              </div>
                <div class="form-group col-md-4">
                <label for="inputEmail4">WholeSale Price</label>
                <input type="number" class="form-control" name="wholesale_price" placeholder="WholeSale Price" value="<?=$wh_product[0]['wholesale_price']?>" required>
              </div>
            </div>

            <div class="form-row">
              
              <div class="form-group col-md-4" style="padding: 0px">
                <label for="inputEmail4">Stock</label>
                <input type="number" class="form-control" name="quantity" placeholder="Quantity" value="<?=$wh_product[0]['quantity']?>" required>
              </div>

              <div class="form-group col-md-4" style="padding: 0 10px 0 0 ">
                <label for="inputEmail4">Product Group</label>
                <select class="form-control" name="product_group_id" id="product_group_id" required>
                  <!-- <option hidden value="<?= $wh_product[0]['product_group_id'] ?>"> <?= $wh_product[0]['product_group_id'] ?> </option> -->
                  <option value=""> Select product group </option>
                  <?php foreach($vendor_product_groups as $k=>$v) { ?>
                    <option value="<?= $v['id'] ?>"> <?= $v['group_name'] ?> </option>
                  <?php } ?>
                </select>
              </div>

            </div>
              
              <div class="form-group col-md-8" style="padding: 0 10px 0 0 ">
                <label for="inputEmail4">Description</label>
                <textarea class="form-control" name="des" required><?=$wh_product[0]['des'] ?> </textarea>
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

<script>
    
    $(document).ready(function(){
       $("#product_group_id option[value=<?= $wh_product[0]['product_group_id'] ?>]").attr('selected', 'selected'); 
    })

</script>
