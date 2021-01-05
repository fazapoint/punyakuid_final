<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Punyakuid | user</title>
    <link rel="icon" href="../assets/img/iconn1.png">
    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/vendor/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <?php

    //ini fungsi untuk select menu yang active agar dinamis
    function menu_active($menu)
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        if ($url[3] == $menu) {
            echo "active";
        }
    }

    //ini fungsi untuk open menu yang active agar dinamis
    function menu_show($menu1)
    {
        $url = explode('/', $_SERVER['REQUEST_URI']);
        if ($url[3] == $menu1) {
            echo "show";
        }
    }


    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] != "user") {
        header("location:../login.php?pesan=bukan_user");
    }

    if ($_SESSION['status'] != "login") {
        header("location:../login.php?pesan=belum_login");
    }

    require '../koneksi.php';
    $id_user = $_SESSION['id_user'];
    $d = mysqli_fetch_array(mysqli_query($koneksi, "select * from user where id_user = '$id_user'"));


    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

                <div class="sidebar-brand-text mx-3">PunyakuID</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php menu_active("dashboard.php"); ?>">
                <a class="nav-link" href="../user/dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



            <!-- Heading -->
            <div class="sidebar-heading">
                Profil
            </div>

            <li class="nav-item <?php menu_active("usr_profil.php"); ?>">
                <a class="nav-link" href="../user/usr_profil.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil Saya</span></a>
            </li>
            <li class="nav-item <?php menu_active("usr_edit_profil.php"); ?>">
                <a class="nav-link" href="../user/usr_edit_profil.php">
                    <i class="fas fa-fw fa-user-edit"></i>
                    <span>Edit Profil</span></a>
            </li>
            <li class="nav-item <?php menu_active("usr_edit_pass.php"); ?>">
                <a class="nav-link" href="../user/usr_edit_pass.php">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Ganti Password</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php menu_active("usr_barang_hilang.php"); ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDaftar" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-bars"></i>
                    <span>Daftar Postingan</span>
                </a>
                <div id="collapseDaftar" class="collapse <?php menu_show("usr_barang_hilang.php"); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item active" href="../user/usr_barang_hilang.php">Daftar Barang Hilang</a>
                    </div>
            </li>
            <li class="nav-item <?php menu_active("usr_tambah_barang_hilang.php"); ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBuat" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-plus-circle"></i>
                    <span>Buat Postingan</span>
                </a>
                <div id="collapseBuat" class="collapse <?php menu_show("usr_tambah_barang_hilang.php"); ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php menu_active("usr_tambah_barang_hilang.php"); ?>" href="../user/usr_tambah_barang_hilang.php">Buat Barang Hilang</a>
                    </div>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item <?php menu_active("usr_pesan.php"); ?>">
                <a class="nav-link" href="../user/usr_pesan.php">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Kirim pesan ke admin</span></a>
            </li>

            <li class="nav-item <?php menu_active("usr_riwayat.php"); ?>">
                <a class="nav-link" href="../user/usr_riwayat.php">
                    <i class="fas fa-fw  fa-history"></i>
                    <span>Riwayat</span></a>
            </li>


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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="../assets/img/user/<?php echo $d['gambar_user']; ?>">
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