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
function menu_tiga_open($menu1, $menu2, $menu3)
{
    $url = explode('/', $_SERVER['REQUEST_URI']);
    if ($url[3] == $menu1 || $url[3] == $menu2 || $url[3] == $menu3) {
        echo "menu-open";
    }
}

function menu_dua_open($menu1, $menu2)
{
    $url = explode('/', $_SERVER['REQUEST_URI']);
    if ($url[3] == $menu1 || $url[3] == $menu2) {
        echo "menu-open";
    }
}

function menu_dua_active($menu1, $menu2)
{
    $url = explode('/', $_SERVER['REQUEST_URI']);
    if ($url[3] == $menu1 || $url[3] == $menu2) {
        echo "active";
    }
}

//ini fungsi untuk open menu yang active agar dinamis
function menu_tiga_active($menu1, $menu2, $menu3)
{
    $url = explode('/', $_SERVER['REQUEST_URI']);
    if ($url[3] == $menu1 || $url[3] == $menu2 || $url[3] == $menu3) {
        echo "active";
    }
}

//ini fungsi untuk open menu yang active agar dinamis
function menu_empat_open($menu1, $menu2, $menu3, $menu4)
{
    $url = explode('/', $_SERVER['REQUEST_URI']);
    if ($url[3] == $menu1 || $url[3] == $menu2 || $url[3] == $menu3 || $url[3] == $menu4) {
        echo "menu-open";
    }
}

function menu_empat_active($menu1, $menu2, $menu3, $menu4)
{
    $url = explode('/', $_SERVER['REQUEST_URI']);
    if ($url[3] == $menu1 || $url[3] == $menu2 || $url[3] == $menu3 || $url[3] == $menu4) {
        echo "active";
    }
}

require '../koneksi.php';
$id_user = $_SESSION['id_user'];
$d = mysqli_fetch_array(mysqli_query($koneksi, "select * from user where id_user = '$id_user'"));
?>


<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="../assets/img/iconn.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">PUNYAKU<strong>ID</strong></span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../assets/img/user/<?php echo $d['gambar_user']; ?>" class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="../admin/dashboard.php" class="nav-link <?php menu_active("dashboard.php") ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?php menu_tiga_open("adm_profil.php", "adm_edit_profil.php", "adm_edit_pass.php") ?>">
                    <a href="#" class="nav-link <?php menu_tiga_active("adm_profil.php", "adm_edit_profil.php", "adm_edit_pass.php") ?>">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Profil
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../admin/adm_profil.php" class="nav-link <?php menu_active("adm_profil.php") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profil Saya</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/adm_edit_profil.php" class="nav-link <?php menu_active("adm_edit_profil.php") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Edit Profil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/adm_edit_pass.php" class="nav-link <?php menu_active("adm_edit_pass.php") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ganti Password</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../admin/adm_admin.php" class="nav-link  <?php menu_active("adm_admin.php") ?>">
                        <i class="nav-icon fa fa-user-edit"></i>
                        <p>Admin</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../admin/adm_user.php" class="nav-link  <?php menu_active("adm_user.php") ?>">
                        <i class="nav-icon fa fa-users"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item has-treeview <?php menu_dua_open("adm_kategori_barang.php", "adm_kota.php") ?>">
                    <a href="#" class="nav-link <?php menu_dua_active("adm_kategori_barang.php", "adm_kota.php") ?>">
                        <i class="nav-icon fa fa-th-large"></i>
                        <p>
                            Kategori
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../admin/adm_kategori_barang.php" class="nav-link <?php menu_active("adm_kategori_barang.php") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/adm_kota.php" class="nav-link <?php menu_active("adm_kota.php") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kota</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview <?php menu_empat_open("adm_barang_hilang_tunda.php", "adm_barang_hilang_tolak.php", "adm_barang_hilang_selesai.php", "adm_barang_hilang_terbit.php") ?>">
                    <a href="#" class="nav-link <?php menu_empat_active("adm_barang_hilang_tunda.php", "adm_barang_hilang_tolak.php", "adm_barang_hilang_selesai.php", "adm_barang_hilang_terbit.php") ?>">
                        <i class=" nav-icon fa fa-bars"></i>
                        <p>
                            Post Barang Hilang
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="../admin/adm_barang_hilang_tunda.php" class="nav-link <?php menu_active("adm_barang_hilang_tunda.php") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tunda</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/adm_barang_hilang_tolak.php" class="nav-link  <?php menu_active("adm_barang_hilang_tolak.php") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tolak</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/adm_barang_hilang_terbit.php" class="nav-link  <?php menu_active("adm_barang_hilang_terbit.php") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Terbit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../admin/adm_barang_hilang_selesai.php" class="nav-link  <?php menu_active("adm_barang_hilang_selesai.php") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Selesai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="../admin/adm_pesan.php" class="nav-link  <?php menu_active("adm_pesan.php") ?>">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>Daftar Pesan</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>