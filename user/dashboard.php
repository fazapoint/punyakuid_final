<?php
include '../template/user_nav.php';
require '../koneksi.php';

$id_user = $_SESSION['id_user'];

$data_selesai = mysqli_query($koneksi, "select id_bh from barang_hilang where id_status='4' and id_user='$id_user'");
$jml_selesai = mysqli_num_rows($data_selesai);

$data_cari = mysqli_query($koneksi, "select id_bh from barang_hilang where id_status='3' and id_user='$id_user'");
$jml_cari = mysqli_num_rows($data_cari);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah postingan Kehilanganmu</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_cari ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-search fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-6 col-md-12 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah postingan kehilangan terselesaikan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jml_selesai ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-check fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include '../template/user_footer.php';
?>