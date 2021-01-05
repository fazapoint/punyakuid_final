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
                    <h1 class="m-0 text-dark">Daftar Admin</h1>
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
                            <h6 class="m-0 font-weight-bold text-primary">Admin</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <a href="../adm_admin/tambah_admin.php" class="btn btn-success mb-3">Tambah admin</a>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Gambar</th>
                                            <th style="width: 15%">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($koneksi, "select * from user where level='admin'");

                                        while ($d = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $d['nama']; ?></td>
                                                <td><?php echo $d['email']; ?></td>
                                                <td><?php echo $d['username']; ?></td>
                                                <td style="text-align: center;"><img src="../assets/img/user/<?php echo $d['gambar_user']; ?>" alt="" style="width: 60px; height: 60px;"></td>
                                                <td> <a href="../adm_admin/hapus_admin.php?id_user= <?php echo  $d['id_user'] ?>" class="btn btn-danger">Hapus</a></td>
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