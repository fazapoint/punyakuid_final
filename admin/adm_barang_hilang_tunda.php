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
                    <h1 class="m-0 text-dark">Daftar Barang Hilang Tertunda</h1>
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
                            <h6 class="m-0 font-weight-bold text-primary">Barang Hilang Tertunda</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%">No</th>
                                            <th>Gambar</th>
                                            <th>Username</th>
                                            <th>Kategori</th>
                                            <th>Kota</th>
                                            <th>Merk dan Nama Barang</th>
                                            <th>Tanggal Hilang</th>
                                            <th>Status</th>

                                            <th style="width: 27%;">Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $no = 1;
                                        $data = mysqli_query(
                                            $koneksi,
                                            "select * from barang_hilang
        inner join kategori_barang on barang_hilang.id_ktg_barang = kategori_barang.id_ktg_barang
        inner join kota on barang_hilang.id_kota = kota.id_kota
        inner join user on barang_hilang.id_user = user.id_user
        inner join status on barang_hilang.id_status = status.id_status
        where status.id_status ='1'"
                                        );

                                        while ($d = mysqli_fetch_array($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><img src="../assets/img/barang_hilang/<?php echo $d['gambar_bh']; ?>" width=" 100px" height="100px"></td>
                                                <td><?php echo $d['username']; ?></td>
                                                <td><?php echo $d['ktg_barang']; ?></td>
                                                <td><?php echo $d['nama_kota']; ?></td>
                                                <td><?php echo $d['nama_bh']; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($d['tgl_bh']));  ?></td>
                                                <td><?php echo $d['ket_status']; ?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-success" href="../adm_barang_hilang/terima_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">TERIMA</a>
                                                    <a class="btn btn-sm btn-warning" href="../adm_barang_hilang/tolak_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">TOLAK</a>
                                                    <a class="btn btn-sm btn-danger" href="../adm_barang_hilang/hapus_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>">HAPUS</a>
                                                    <a class="btn btn-sm btn-primary" href="../detail_barang.php?id_bh=<?php echo $d['id_bh'] ?>">DETAIL</a>
                                                </td>

                                            </tr>
                                        <?php
                                        }
                                        ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../template/adm_footer.php';
?>