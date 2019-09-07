<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Official Website Herbarium Collection, Department of Silviculture, Faculty of Forestry, IPB University">
  <meta name="keywords" content="IPB University, Fakultas Kehutanan, Faculty of Forestry, Departemen Silvikultur, Department of Silviculture, Herbarium IPB, Herbarium Collection, Herbarium, Fifi Gus Dwiyanti" />

  <meta property="og:locale" content="id_ID" />
	<meta property="og:title" content="Herbarium Collection" />
	<meta property="og:description" content="Official Website Herbarium Collection, Department of Silviculture, Faculty of Forestry, IPB University" />
	<meta property="og:url" content="http://herbarium.fahutan.ipb.ac.id" />
	<meta property="og:site_name" content="Herbarium Collection" />

  <title>Herbarium - Dashboard</title>
  <link rel="icon" href="<?php echo base_url('img/logo-ipb.svg') ?>" type="image/svg">

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Datepicker -->
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('css/styles.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('/') ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-database"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Herbarium</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?= $isActive == 1 ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('/Dashboard') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Feature
      </div>

      <?php if ($id_role==1): ?>
        <!-- Nav Item - Charts -->
        <li class="nav-item <?= $isActive == 2 ? 'active' : '' ?>">
          <a class="nav-link" href="<?= base_url('/Famili') ?>">
            <i class="fas fa-fw fa-list"></i>
            <span>Famili</span></a>
        </li>
      <?php endif; ?>

      <!-- Nav Item - Tables -->
      <li class="nav-item <?= $isActive == 3  || $isActive == 5 ? 'active' : '' ?>">
        <a class="nav-link" href="<?= base_url('/Herbarium') ?>">
          <i class="fas fa-fw fa-leaf"></i>
          <span>Herbarium</span></a>
      </li>

      <?php if ($id_role==1): ?>
        <!-- Nav Item - Tables -->
        <li class="nav-item <?= $isActive == 4 ? 'active' : '' ?>">
          <a class="nav-link" href="<?= base_url('/User') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span></a>
        </li>
      <?php endif; ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $username ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('img/user.png') ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('Dashboard/logOut') ?>">Logout</a>
              </div>
            </div>
          </div>
        </div>