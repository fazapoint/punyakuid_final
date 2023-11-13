<?php

include '../template/adm_topbar.php';
include '../template/adm_sidebar.php';


$id_bh = $_GET['id_bh'];

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tolak postingan</h1>
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
                <div class="col-lg-6">
                    <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">Pesan kesalahan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="pesan_bh">
                            </div>
                            <br>
                            <br>
                            <div class=" col-sm-10">
                                <button type="submit" name="kirim" class="btn btn-primary">kirim</button>
                            </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>



<?php

if (isset($_POST['kirim'])) {
    $pesan_bh = $_POST['pesan_bh'];

    mysqli_query($koneksi, "update barang_hilang set id_status='2', pesan_bh='$pesan_bh' where id_bh='$id_bh'");

    echo "<script>alert('Postingan ditolak');window.location='../admin/adm_barang_hilang_tunda.php';</script>";
}
