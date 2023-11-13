<?php

include '../template/adm_topbar.php';
include '../template/adm_sidebar.php';

require '../koneksi.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Kategori Barang</h1>
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
                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Kategori Barang</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="../adm_kategori_barang/tambah_kategori_barang.php" class="btn btn-success mb-3">Tambah Kategori Barang</a>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th style="text-align: center;">Nama Kategori</th>
                                            <th style="width: 15%">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $no = 1;
                                        $query = mysqli_query($koneksi, "select * from kategori_barang");

                                        while ($d = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td style="text-align: center;"><?php echo $d['ktg_barang'] ?></td>
                                                <td><a href="../adm_kategori_barang/edit_kategori_barang.php?id_ktg_barang= <?php echo  $d['id_ktg_barang'] ?>" class="btn btn-primary">Edit</a>
                                                    <a href="../adm_kategori_barang/hapus_kategori_barang.php?id_ktg_barang= <?php echo  $d['id_ktg_barang'] ?>" class="btn btn-danger">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
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