<?php //var_dump($login);die; ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Weekly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">   $<?php
                      if($week != null){
                        echo $week;
                      }
                      else{
                       echo " Opps no weekly earning ";
                      }
                        ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      $<?php
                      if($month != null){
                        echo $month;
                      }
                      else{
                       echo " Opps no monthly earning ";
                      }
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                          <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Yearly)</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                                  $<?php
                      if($year != null){
                        echo $year;
                      }
                      else{
                       echo " Opps no year earning ";
                      }
                        ?>
                                  </div>
                              </div>
                              <div class="col-auto">
                                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>

              
            <!-- Earnings (Monthly) Card Example -->
<!--            <div class="col-xl-3 col-md-6 mb-4">-->
<!--              <div class="card border-left-info shadow h-100 py-2">-->
<!--                <div class="card-body">-->
<!--                  <div class="row no-gutters align-items-center">-->
<!--                    <div class="col mr-2">-->
<!--                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>-->
<!--                      <div class="row no-gutters align-items-center">-->
<!--                        <div class="col-auto">-->
<!--                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>-->
<!--                        </div>-->
<!--                        <div class="col">-->
<!--                          <div class="progress progress-sm mr-2">-->
<!--                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>-->
<!--                          </div>-->
<!--                        </div>-->
<!--                      </div>-->
<!--                    </div>-->
<!--                    <div class="col-auto">-->
<!--                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->

            <!-- Pending Requests Card Example -->
<!--            <div class="col-xl-3 col-md-6 mb-4">-->
<!--              <div class="card border-left-warning shadow h-100 py-2">-->
<!--                <div class="card-body">-->
<!--                  <div class="row no-gutters align-items-center">-->
<!--                    <div class="col mr-2">-->
<!--                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>-->
<!--                      <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>-->
<!--                    </div>-->
<!--                    <div class="col-auto">-->
<!--                      <i class="fas fa-comments fa-2x text-gray-300"></i>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!--            </div>-->
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <!-- Pie Chart -->

          </div>
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
            <div class="col-xl-12 col-lg-5 mx-auto">
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

          <!-- Content Row -->
<!--          <div class="row">-->
<!---->
<!--            <!-- Content Column -->
<!--            <div class="col-lg-6 mb-4">-->
<!---->
<!--              <!-- Project Card Example -->
<!--              <div class="card shadow mb-4">-->
<!--                <div class="card-header py-3">-->
<!--                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>-->
<!--                </div>-->
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
<!--              </div>-->
<!---->
<!--              <!-- Color System -->
<!--              <div class="row">-->
<!--                <div class="col-lg-6 mb-4">-->
<!--                  <div class="card bg-primary text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                      Primary-->
<!--                      <div class="text-white-50 small">#4e73df</div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6 mb-4">-->
<!--                  <div class="card bg-success text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                      Success-->
<!--                      <div class="text-white-50 small">#1cc88a</div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6 mb-4">-->
<!--                  <div class="card bg-info text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                      Info-->
<!--                      <div class="text-white-50 small">#36b9cc</div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6 mb-4">-->
<!--                  <div class="card bg-warning text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                      Warning-->
<!--                      <div class="text-white-50 small">#f6c23e</div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6 mb-4">-->
<!--                  <div class="card bg-danger text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                      Danger-->
<!--                      <div class="text-white-50 small">#e74a3b</div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--                <div class="col-lg-6 mb-4">-->
<!--                  <div class="card bg-secondary text-white shadow">-->
<!--                    <div class="card-body">-->
<!--                      Secondary-->
<!--                      <div class="text-white-50 small">#858796</div>-->
<!--                    </div>-->
<!--                  </div>-->
<!--                </div>-->
<!--              </div>-->
<!---->
<!--            </div>-->
<!---->
<!--            <div class="col-lg-6 mb-4">-->
<!---->
<!--               Illustrations -->
<!--              <div class="card shadow mb-4">-->
<!--                <div class="card-header py-3">-->
<!--                  <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                  <div class="text-center">-->
<!--                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="--><?//= base_url();?><!--bootstrap/img/undraw_posting_photo.svg" alt="">-->
<!--                  </div>-->
<!--                  <p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>-->
<!--                  <a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>-->
<!--                </div>-->
<!--              </div>-->
<!---->
<!--              <!-- Approach -->
<!--              <div class="card shadow mb-4">-->
<!--                <div class="card-header py-3">-->
<!--                  <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>-->
<!--                </div>-->
<!--                <div class="card-body">-->
<!--                  <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>-->
<!--                  <p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>-->
<!--                </div>-->
<!--              </div>-->
<!---->
<!--            </div>-->
<!--          </div>-->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

