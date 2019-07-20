

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">View Product</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Products </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>WholeSale Price</th>
                      <th>Quantity</th>
                      <th>Image</th>
                        <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>WholeSale Price</th>
                      <th>Quantity</th>
                      <th>Image</th>
                        <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $x; $x=1;  foreach ($product as $k=>$v) {?>
                    <tr>
                      <td><?= $x++ ?></td>
                      <td><?= $v['title']?></td>
                      <td><?= $v['price']?></td>
                      <td><?= $v['wholesale_price']?></td>
                      <td><?= $v['quantity']?></td>
                        <td><img src="<?= base_url('image/').$v['image']?>" alt="" style="width: 120px"></td>
                        <td><?=date("d-m-Y",strtotime($v['date']))?></td>

                        <td>
                        <a href="<?= site_url('vender/view/update_product/'.$v['id'])?>"><span class="btn btn-success">Update</span>&nbsp;</a>
                        <a href="<?= site_url('vender/del_product/'.$v['id'])?>"><span class="btn btn-danger">Delete </span>&nbsp;</a>
                      </td>
                    </tr>
                      
                  <?php }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

