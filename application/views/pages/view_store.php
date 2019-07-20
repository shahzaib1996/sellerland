

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">View Store</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Stores </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No#</th>
                      <th>Store Name</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>Password</th>
                      <th>Account Type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $x=1; foreach ($vendor as $k=>$v) {
//                    if($v['status']!='active'){
                      ?>
                    <tr style="<?php if($v['status']!='active'){ ?>background-color: #696969;color: #fff<?php } ?>">
                      <td><?= $x;$x++?></td>
                      <td><?= $v['store_name']?></td>
                      <td><?= $v['username']?></td>
                      <td><?= $v['email']?></td>
                      <td><?= $v['password']?></td>
                      <td><button class="btn btn-success btn-sm"><?= $v['account_type']?></button></td>
                      <td>
                        <?php if($v['status']=='active'){ ?>
                                      <a href="<?= site_url('Selly/lock/'.$v['id'].'/view_store/inactive')?>"><span class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="lock Account"><i class="fa fa-lock"></i></span>&nbsp;</a>
                        <?php }else{ ?>
                                      <a href="<?= site_url('Selly/lock/'.$v['id'].'/view_store/active')?>"><span class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Unlock Account"><i class="fa fa-unlock"></i></span>&nbsp;</a>
                        <?php } ?>
                        <a href="<?= site_url('Selly/del/id/'.$v['id'])?>"><span class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete Account"><i class="fa fa-trash"></i></span>&nbsp;</a>
                        <a href="<?= site_url('Selly/dashboard/view_all/'.$v['id'])?>"><span class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="View All"><i class="fa fa-eye"></i></span>&nbsp;</a>
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

