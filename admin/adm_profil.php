<?php

include '../template/adm_topbar.php';
include '../template/adm_sidebar.php';

$id_user = $_SESSION['id_user'];
$d = mysqli_fetch_array(mysqli_query($koneksi, "select * from user where id_user = '$id_user'"));

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profil admin</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="card mb-3" style="width: 600px;">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="../assets/img/user/<?php echo $d['gambar_user']; ?>" style="width: 200px; height: 220px;" class="-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <table>
                                    <tr>
                                        <th style="width: 30%;">Nama</th>
                                        <td>
                                            <p class="card-text">: <?php echo $d['nama']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Username</th>
                                        <td>
                                            <p class="card-text">: <?php echo $d['username']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Email</th>
                                        <td>
                                            <p class="card-text">: <?php echo $d['email']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">Alamat</th>
                                        <td>
                                            <p class="card-text">: <?php echo $d['alamat']; ?></p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 30%;">No_hp</th>
                                        <td>
                                            <p class="card-text">: <?php echo $d['no_hp']; ?></p>
                                        </td>
                                    </tr>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../template/adm_footer.php';
?>