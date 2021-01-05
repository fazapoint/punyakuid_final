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
                    <h1 class="m-0 text-dark">Daftar Kota</h1>
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
                            <h6 class="m-0 font-weight-bold text-primary">Kota</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="../adm_kota/tambah_kota.php" class="btn btn-success mb-3">Tambah Kota</a>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th style="text-align: center;">Nama Kota</th>
                                            <th style="width: 15%">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $no = 1;
                                        $query = mysqli_query($koneksi, "select * from kota");

                                        while ($d = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td style="text-align: center;"><?php echo $d['nama_kota'] ?></td>
                                                <td><a href="../adm_kota/edit_kota.php?id_kota= <?php echo  $d['id_kota'] ?>" class="btn btn-primary">Edit</a>
                                                    <a href="../adm_kota/hapus_kota.php?id_kota= <?php echo  $d['id_kota'] ?>" class="btn btn-danger">Hapus</a>
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