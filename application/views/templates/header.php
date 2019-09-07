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

  <title>Herbarium</title>
  <link rel="icon" href="<?php echo base_url('img/logo-ipb.svg') ?>" type="image/svg">

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('css/sb-admin-2.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('css/styles.css') ?>" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button> -->

          <!-- Topbar Header -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('') ?>">
            <!-- <div class="sidebar-brand-text mx-3">Herbarium</div> -->
            <img class="img-logo mx-3" src="<?php echo base_url('img/Herbarium-ipb.png') ?>">
          </a>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item no-arrow">
              <?php if ($username): ?>
                <a class="nav-link" href="<?= base_url('Dashboard') ;?>">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?= $username; ?></span>
                  <img class="img-profile rounded-circle" src="<?php echo base_url('img/user.png') ?>">
                </a>
              <?php else : ?>
                <a class="nav-link" href="<?= base_url('Login') ;?>">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">Login</span>
                  <img class="img-profile rounded-circle" src="<?php echo base_url('img/user.png') ?>">
                </a>
              <?php endif; ?>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->