<?php

include '../template/adm_topbar.php';
include '../template/adm_sidebar.php';

$id_ktg_barang = $_GET['id_ktg_barang'];

$d = mysqli_fetch_array(mysqli_query($koneksi, "select * from kategori_barang where id_ktg_barang = '$id_ktg_barang'"));
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit kategori barang</h1>
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
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="ktg_barang" value="<?php echo $d['ktg_barang'] ?>">
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-10">
                                <input type="hidden" name="id_ktg_barang" value="<?php echo $d['id_ktg_barang'] ?>">
                                <button type="submit" name="edit" class="btn btn-primary">edit</button>
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

if (isset($_POST['edit'])) {
    $id_ktg_barang = $_POST['id_ktg_barang'];
    $ktg_barang = $_POST['ktg_barang'];
    $query = "update kategori_barang set ktg_barang='$ktg_barang' where id_ktg_barang='$id_ktg_barang'";
    $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
?>

    <script>
        alert("Data berhasil diupdate");
        window.location = '../admin/adm_kategori_barang.php';
    </script>
<?php
}
?>