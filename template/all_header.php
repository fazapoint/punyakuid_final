<?php
require 'koneksi.php';

session_start();




?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>PunyakuID</title>
    <link rel="icon" href="assets/img/iconn1.png">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>




    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo"><em>Punyaku</em>ID</a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Barang</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="barang_hilang.php">Daftar Barang Hilang</a>
                                    <a class="dropdown-item" href="blog.html">Daftar Penemuan Barang</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Orang</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="index.html">Daftar Orang Hilang</a>
                                    <a class="dropdown-item" href="index.html">Daftar Penemuan Orang</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hewan</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="index.html">Daftar Hewan Hilang</a>
                                    <a class="dropdown-item" href="index.html">Daftar Penemuan Hewan</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Kendaraan</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="index.html">Daftar Kendaraan Hilang</a>
                                    <a class="dropdown-item" href="index.html">Daftar Penemuan Kendaraan</a>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="team.php">Team</a>
                                    <a class="dropdown-item" href="faq.php">FAQ</a>
                                    <a class="dropdown-item" href="term.php">Terms</a>
                                </div>
                            </li>
                            <?php
                            if (isset($_SESSION['status'])) {
                            ?>
                                <li><a href="<?php echo $_SESSION['level'] ?>/dashboard.php">Profil</a></li>
                            <?php
                            } else {
                            ?>
                                <li><a href="login.php">Login</a></li>
                                <li><a href="daftar.php">SignUp</a></li>
                            <?php
                            }
                            ?>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->