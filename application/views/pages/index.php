<?php //var_dump($login);die; ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

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
                       echo " Opps no yearly earning ";
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

              

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Product Sold Per Day</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">All Stores </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="myDT" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No#</th>
                      <th>Store Name</th>
                      <th>User Name</th>
                      <th>Products</th>
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
                      <td>
                        <?php if($v['status']=='active'){ ?>
                      <?php }else{ ?>
                       <?php } ?>
                        <a href="<?= site_url('Selly/dashboard/productsSoldPerday/'.$v['id'])?>"><span class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="View All"><i class="fa fa-eye"></i></span>&nbsp;</a>
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
      <script>
$(document).ready(function(){
    
    $('#myDT').dataTable();

});
</script>





          </div>

          <!-- Content Row -->

          <div class="row">

      

          </div>

          <!-- Content Row -->
          <div class="row">

 

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

