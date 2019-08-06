<?php //var_dump($_SESSION['admin_message'][$this->uri->segment(4)]);die; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>STORE ADMIN - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url();?>bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>


<!--     https://code.jquery.com/jquery-3.3.1.js
https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js -->

<!--     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->




       <!--Import jQuery before export.js-->
    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script> -->


    <!--Data Table-->
    <script type="text/javascript"  src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"  src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>

    <!--Export table buttons-->
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js" ></script>
    <script type="text/javascript"  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>

<!--Export table button CSS-->

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">



    <!-- Custom styles for this template-->
    <link href="<?= base_url();?>bootstrap/css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Selly.io <sup></sup></div>
        </a>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?= site_url('vender/view/index')?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

<!--        <div class="sidebar-heading">-->
<!--            Interface-->
<!--        </div>-->

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Product</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= site_url('vender/view/add_product');?>">Add Product</a>
                    <a class="collapse-item" href="<?= site_url('vender/view/view_product');?>">View Product</a>
                </div>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Orders</span>
            </a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Orders:</h6>
                    <a class="collapse-item" href="<?= site_url('vender/view/add_order')?>">Add Order</a>
                    <a class="collapse-item" href="<?=site_url('vender/view/view_order')?>">View Order</a>

                    </div>
            </div>
        </li>
        <li class="nav-item">
            <?php //var_dump($user_info);die; ?>
            <a class="nav-link collapsed" href="<?= site_url('Vender/view/support_messages1/'.$user_info[0]['id']) ?>">
                <i class="fas fa-fw fa-folder"></i>
                <span>Support Message</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Stats</span>
            </a>
            <div id="collapseFour" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Orders:</h6>
                    <a class="collapse-item" href="<?= site_url('vender/view/view_report')?>">Report</a>
                </div>
            </div>
            <a class="nav-link collapsed" href="<?= site_url('vender/view/black-list') ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Black-list</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefive" aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Queries</span>
            </a>
            <div id="collapsefive" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Client Query:</h6>
                    <a class="collapse-item" href="<?= site_url('vender/view/feedback')?>">Feedbacks</a>
                    <a class="collapse-item" href="<?= site_url('vender/view/client_query/'.$login[0]['id'])?>">Client Queries</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <?php //var_dump($user_info);die; ?>
            <a class="nav-link collapsed" href="<?= site_url('Vender/view/product_group') ?>">
                <i class="fas fa-fw fa-folder"></i>
                <span>Product Groups</span>
            </a>
        </li>

        <li class="nav-item">
            <?php //var_dump($user_info);die; ?>
            <a class="nav-link collapsed" href="<?= site_url('Vender/view/vender_settings') ?>">
                <i class="fas fa-fw fa-folder"></i>
                <span>Settings</span>
            </a>
        </li>

        <li class="nav-item">
            <?php //var_dump($user_info);die; ?>
            <a class="nav-link collapsed" href="<?= site_url('Vender/view/view_coupons') ?>">
                <i class="fas fa-fw fa-folder"></i>
                <span>Coupons</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->

        <!-- Nav Item - Pages Collapse Menu -->

        <!-- Nav Item - Charts -->
        <!-- Nav Item - Tables -->

        <!-- Divider -->

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

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

               

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $login[0]['username'] ?> </span>
                            <img class="img-profile rounded-circle" src="<?= base_url();?>/image/profile_image/<?= $login[0]['img'] ?>">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <!-- <a class="dropdown-item" href="">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
