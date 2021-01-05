<?php

include '../template/adm_topbar.php';
include '../template/adm_sidebar.php';

require '../koneksi.php';

$no = 1;
$query = mysqli_query($koneksi, "select * from user where level='user'");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar User</h1>
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
                            <h6 class="m-0 font-weight-bold text-primary">User</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Alamat</th>
                                            <th>No HP</th>
                                            <th>Gambar</th>
                                            <th style="width: 15%">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($koneksi, "select * from user where level='user'");
                                        while ($d = mysqli_fetch_array($query)) {
                                        ?>

                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $d['nama']; ?></td>
                                                <td><?php echo $d['email']; ?></td>
                                                <td><?php echo $d['username']; ?></td>
                                                <td><?php echo $d['alamat']; ?></td>
                                                <td><?php echo $d['no_hp']; ?></td>
                                                <td style="text-align: center;"><img src="../assets/img/user/<?php echo $d['gambar_user']; ?>" alt="" style="width: 60px; height: 60px;"></td>
                                                <td><a href="../adm_user/edit_user.php?id_user= <?php echo  $d['id_user'] ?>" class="btn btn-primary">Edit</a>
                                                    <a href="../adm_user/hapus_user.php?id_user= <?php echo  $d['id_user'] ?>" class="btn btn-danger">Hapus</a>
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