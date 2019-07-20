<?php //var_dump($orders);die; ?>



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">View Order</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Orders </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Order No</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>User Email</th>
                      <th>Status</th>
                      <th>Total Bill</th>
                      <th>User Id</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Order No</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>User Email</th>
                      <th>Status</th>
                      <th>Total Bill</th>
                      <th>User Id</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $x; $x=1; foreach ($orders as $k=>$v) {?>
                    <tr>
                      <td><?= $x++ ?></td>
                      <td><?= $v['title']?></td>
                      <td><?= $v['price']?></td>
                      <td><?= $v['qty']?></td>
                      <td><?=$v['email']?></td>
                      <td><?= $v['status']?></td>
                      <td><?= $v['price']*$v['qty']?></td>
                      <td><?=$v['id']?></td>
                      <td>
                        <a href="<?= site_url('vender/view/update_order/'.$v['id'])?>"><span class="btn btn-success">Update</span>&nbsp;</a>
                        <a href="<?= site_url('vender/delete_order/'.$v['id'])?>"><span class="btn btn-danger">Delete </span>&nbsp;</a>
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

