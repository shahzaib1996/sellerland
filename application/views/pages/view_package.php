

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
                      <th>Id</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Type</th>
                      <th>Is Default</th>
                      <th>Action</th>

                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Type</th>
                      <th>Is Default</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php foreach ($package as $item) {?>
                    <tr>
                      <td><?= $item['id']?></td>
                      <td><?= $item['title']?></td>
                      <td><?= $item['price']?></td>
                      <td><?= $item['type']?></td>
                      <td> <?php if($item['is_default'] == 0 ) { echo "NO"; } else { echo "YES"; } ?> </td>
                      <td>
                        <a href="<?= site_url('selly/dashboard/update_package/'.$item['id'])?>"><span class="btn btn-success">Update</span>&nbsp;</a>
                        <a href="<?= site_url('selly/delete_package/'.$item['id'])?>"><span class="btn btn-danger">Delete </span>&nbsp;</a>
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

