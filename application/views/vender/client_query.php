
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Client Messages</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Queries</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No#</th>
                      <th>Title</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                  <tr>
                      <th>No#</th>
                      <th>Title</th>
                      <th>Email</th>
                      <th>Message</th>
                      <th>Action</th>
                  </tr>
                  </tfoot>
                  <tbody>
                    <?php $x=1; foreach ($client_query as $k=>$v){  ?>
                    <tr>
                        <td><?= $x;$x++; ?></td>
                        <td><?= $v['title'] ?></td>
                        <td><?= $v['email'] ?></td>
                        <td><?= $v['message'] ?></td>
                        <td>
<!--                            <a href="--><?//= site_url('Vender/feed_back_del/'.$v['id']) ?><!--" class="btn btn-danger btn-sm"><i class="fa fa-trash"> </i></a>-->  
                            <a href="<?= site_url('vender/view/client_query_reply/'.$v['id'])?>"><span class="btn btn-success btn-sm form-control" ><i class="fa fa-reply"></i> reply</span></a>
                            <!-- <button class="btn btn-success btn-sm form-control"  data-toggle="modal" data-target="#reply<?= $x ?>"><i class="fa fa-reply"> </i> reply</button> -->
                        </td>
                    </tr>
                    
                       <!--  <div class="modal" id="reply<?= $x ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Reply Client</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?= form_open('vender/reply_query/'.$v['id']) ?>
                                    <div class="modal-body">
                                            <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Message</span>
                                            </div>
                                            <textarea class="form-control" name="message" aria-label="With textarea"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Reply</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    <?= form_close(); ?>
                                </div>
                            </div>
                        </div> -->

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

