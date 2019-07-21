<?php //var_dump($wh_vendor);die; ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-success">
                      <i class="fas fa-donate text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 has been deposited into your account!
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="mr-3">
                    <div class="icon-circle bg-warning">
                      <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500">December 2, 2019</div>
                    Spending Alert: We've noticed unusually high spending for your account.
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
            </li>

            <!-- Nav Item - Messages -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                    <div class="small text-gray-500">Emily Fowler · 58m</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                    <div class="status-indicator"></div>
                  </div>
                  <div>
                    <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                    <div class="small text-gray-500">Jae Chun · 1d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                    <div class="status-indicator bg-warning"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                    <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                  </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div>
                    <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                    <div class="small text-gray-500">Chicken the Dog · 2w</div>
                  </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= site_url('selly/dashboard/profile/'.$login[0]['id'])?>">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-6 mx-auto">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Profile</h6>
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
                    <h6 class=" font-weight-bold"  style="box-shadow: 0 0 0 1px #ddd;padding-left: 10px;padding-right:10px;border: 1px solid #ddd;margin-top: 15px;margin-bottom: 15px;padding-top: 15px;padding-bottom: 15px"><i class="fa fa-user" style="padding-left: 10px;padding-right: 10px"> </i> Passord<span class="float-right text-info"><?=$wh_vendor[0]['password']?></span></h6>
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
                  <h6 class="m-0 font-weight-bold text-primary">View All Products</h6>
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
                <table class="table table-bordered" cellspacing="0" style="margin-top: 20px;">
                    <tr>
                        <th>No#</th>
                        <th>Product Title</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Action</th>
                    </tr>
                    <?php $x=1; if(count($product) != 0) { foreach ($product as $k=>$v) {?>
                        <tr>
                            <td><?=$x; $x++?></td>
                            <td><?=$v['title']?></td>
                            <td><?=$v['price']?></td>
                            <td><?=$v['quantity']?></td>
                            <td>
                                <a href="<?= site_url('Selly/del_product/id/'.$v['id'])?>"><span class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete Account"><i class="fa fa-trash"></i></span>&nbsp;</a>
                                <span class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#myModal" data-placement="bottom" title="View All"><i class="fa fa-eye"></i></span>&nbsp;

                            </td>

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