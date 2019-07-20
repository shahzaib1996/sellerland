<?php //var_dump($feedback);die; ?>
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
                      <th>NO#</th>
                      <th>User Name</th>
                      <th>User Email</th>
                      <th>Status</th>
<!--                      <th>Package</th>-->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                  <tr>
                      <th>NO#</th>
                      <th>User Name</th>
                      <th>User Email</th>
<!--                      <th>Package</th>-->
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                  </tfoot>
                  <tbody>
<!--                  --><?php //$x=1; for($i=0;$i<count($feedback);$i++) { if($feedback[$i]['vendor_id']==$user[$i]['id']){?>
                    <?php $x=1; foreach ($feedback as $k=>$v){ ?>
                    <tr>
                        <td><?= $x;$x++; ?></td>
                        <td><?= $v['username'] ?></td>
                        <td><?= $v['email'] ?></td>
                        <td><?= $v['status'] ?></td>
                        <td>
                            <?php if($v['status']=='Active'){ ?>
                            <a href="#" class="btn btn-success btn-sm"><i class="fa fa-lock"> </i> Blacklist</a>
                      <?php }else{ ?>
                                <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-unlock"> </i> Un-Blacklist</a>
                            <?php } ?>
                        </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

