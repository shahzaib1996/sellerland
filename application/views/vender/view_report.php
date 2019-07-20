

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Sale Stats</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Overall </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Title</th>
                      <th>Price</th>
                        <th>Date</th>
                        <th>User Id</th>
                        <th>Username</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>S.No</th>
                      <th>Title</th>
                      <th>Price</th>
                        <th>Date</th>
                        <th>User Id</th>
                        <th>Username</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php $x; $x=1;  foreach ($report as $k=>$v) {?>
                    <tr>
                      <td><?= $x++ ?></td>
                      <td><?= $v['title']?></td>
                      <td><?= $v['price']?></td>
                        <td><?=date("d-m-Y",strtotime($v['date']))?></td>
                        <td><?=$v['id']?></td>
                        <td><?=$v['username']?></td>

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

