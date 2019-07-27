<?php //var_dump($wh_vendor);die; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Sold Products Store</h1>
          </div>

          <!-- Content Row -->

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-6 mx-auto">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Store Profile</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                  </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <h6 class=" font-weight-bold"  style="box-shadow: 0 0 0 1px #ddd;padding-left: 10px;padding-right:10px;border: 1px solid #ddd;margin-top: 15px;margin-bottom: 15px;padding-top: 15px;padding-bottom: 15px"><i class="fa fa-user" style="padding-left: 10px;padding-right: 10px"> </i> User Name<span class="float-right text-info"><?=$wh_vendor[0]['username']?></span></h6>
                    <h6 class=" font-weight-bold"  style="box-shadow: 0 0 0 1px #ddd;padding-left: 10px;padding-right:10px;border: 1px solid #ddd;margin-top: 15px;margin-bottom: 15px;padding-top: 15px;padding-bottom: 15px"><i class="fa fa-user" style="padding-left: 10px;padding-right: 10px"> </i> Email<span class="float-right text-info"><?=$wh_vendor[0]['email']?></span></h6>
                    <h6 class=" font-weight-bold"  style="box-shadow: 0 0 0 1px #ddd;padding-left: 10px;padding-right:10px;border: 1px solid #ddd;margin-top: 15px;margin-bottom: 15px;padding-top: 15px;padding-bottom: 15px"><i class="fa fa-user" style="padding-left: 10px;padding-right: 10px"> </i> Store Name<span class="float-right text-info"><?=$wh_vendor[0]['store_name']?></span></h6>
                    <h6 class=" font-weight-bold"  style="box-shadow: 0 0 0 1px #ddd;padding-left: 10px;padding-right:10px;border: 1px solid #ddd;margin-top: 15px;margin-bottom: 15px;padding-top: 15px;padding-bottom: 15px"><i class="fa fa-user" style="padding-left: 10px;padding-right: 10px"> </i> Package Name<span class="float-right text-info"><?=$wh_vendor[0]['account_type']?></span></h6>
                    <h6 class=" font-weight-bold"  style="box-shadow: 0 0 0 1px #ddd;padding-left: 10px;padding-right:10px;border: 1px solid #ddd;margin-top: 15px;margin-bottom: 15px;padding-top: 15px;padding-bottom: 15px"><i class="fa fa-user" style="padding-left: 10px;padding-right: 10px"> </i> Status<span class="float-right text-info"><?=$wh_vendor[0]['status']?></span></h6>

                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            

          </div>

          <!-- Content Row -->
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">View All Today Sold Products</h6>
                </div>
<!--                <div class="card-body">-->
<!--                  <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>-->
<!--                  <div class="progress mb-4">-->
<!--                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                  <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>-->
<!--                  <div class="progress mb-4">-->
<!--                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                  <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>-->
<!--                  <div class="progress mb-4">-->
<!--                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                  <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>-->
<!--                  <div class="progress mb-4">-->
<!--                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                  <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>-->
<!--                  <div class="progress">-->
<!--                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                  </div>-->
<!--                </div>-->
                  <div class="container">
                  <br>
                  <input id="myInput"  class="form-control" type="text" placeholder="Search..">
                        <br> 
                <table class="table table-striped table-bordered" id="datatable" cellspacing="0" style="margin-top: 20px;">
                    <tr>
                        <th>No#</th>
                        <th>Product Title</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                    </tr>
                    <?php $x=1; if(count($soldperday) != 0) { foreach ($soldperday as $k=>$v) {?>
                        <tr>
                            <td><?=$x; $x++?></td>
                            <td><?=$v['title']?></td>
                            <td><?=$v['price']?></td>
                            <td><?=$v['qty']?></td>
                                <!-- <td>
                                    <span class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#myModal" data-placement="bottom" title="View All"><i class="fa fa-eye"></i></span>&nbsp;

                                </td> -->

                        </tr>

                    <?php } } else { echo "<tr><td colspan='5' style='text-align:center;'> No Products Found! </td></tr> "; } ?>


                </table>
              </div>
              </div>

              <!-- Color System -->

            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->


<!--        Modal -->

        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Product Title</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <img src="<?= site_url('Selly/image/15.jpg')?>" alt="">
                        <p>Lorem ipsum dolor sit amet, </p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>
        <script>
        $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#datatable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>