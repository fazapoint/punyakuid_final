<?php

include '../template/adm_topbar.php';
include '../template/adm_sidebar.php';


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah kota</h1>
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
                            <label for="kategori" class="col-sm-2 col-form-label">kota</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="kota">
                            </div>
                            <br>
                            <br>


                            <div class="col-sm-10">
                                <button type="submit" name="kirim" class="btn btn-primary">Tambah</button>
                            </div>

                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../template/adm_footer.php';

if (isset($_POST['kirim'])) {
    $kota = $_POST['kota'];
    $query = "insert into kota (nama_kota) values('$kota')";
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
?>

    <script>
        alert("Data berhasil ditambahkan");
        window.location = '../admin/adm_kota.php';
    </script>
<?php
}
?>
?>