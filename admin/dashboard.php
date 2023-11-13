<?php

include '../template/adm_topbar.php';
include '../template/adm_sidebar.php';

$data_admin = mysqli_query($koneksi, "select id_user from user where level='admin'");
$jml_admin = mysqli_num_rows($data_admin);

$data_user = mysqli_query($koneksi, "select id_user from user where level='user'");
$jml_user = mysqli_num_rows($data_user);

$data_tunda = mysqli_query($koneksi, "select id_bh from barang_hilang where id_status='1'");
$jml_tunda = mysqli_num_rows($data_tunda);

$data_terbit = mysqli_query($koneksi, "select id_bh from barang_hilang where id_status='3'");
$jml_terbit = mysqli_num_rows($data_terbit);

$data_tolak = mysqli_query($koneksi, "select id_bh from barang_hilang where id_status='2'");
$jml_tolak = mysqli_num_rows($data_tolak);

$data_selesai = mysqli_query($koneksi, "select id_bh from barang_hilang where id_status='4'");
$jml_selesai = mysqli_num_rows($data_selesai);

$data_pesan = mysqli_query($koneksi, "select id_pesan from pesan");
$jml_pesan = mysqli_num_rows($data_pesan);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard Admin</h1>
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
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-indigo">
                        <div class="inner">
                            <h3><?php echo $jml_admin ?></h3>

                            <p>Admin</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-key"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-teal">
                        <div class="inner">
                            <h3><?php echo $jml_user ?></h3>

                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-olive">
                        <div class="inner">
                            <h3> <?php echo $jml_pesan ?></h3>

                            <p>Pesan Masuk</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-email"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3> <?php echo $jml_tunda ?></h3>

                            <p>Postingan tertunda</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-help-circled"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3> <?php echo $jml_tolak ?></h3>

                            <p>Postingan ditolak</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-close-circled"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3> <?php echo $jml_terbit ?></h3>

                            <p>Postingan terbit</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-speakerphone"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3> <?php echo $jml_selesai ?></h3>

                            <p>Postingan terselesaikan</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-checkmark-circled"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../template/adm_footer.php';
?>