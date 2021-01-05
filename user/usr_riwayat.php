<?php
include '../template/user_nav.php';
require '../koneksi.php';

$id_user = $_SESSION['id_user'];

$no = 1;
$data = mysqli_query(
    $koneksi,
    "select * from barang_hilang
        inner join kategori_barang on barang_hilang.id_ktg_barang = kategori_barang.id_ktg_barang
        inner join status on barang_hilang.id_status = status.id_status
        where status.id_status ='4' and id_user='$id_user'"
);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Riwayat</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Riwayat</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Merk dan Nama Barang</th>
                            <th>Tgl Hilang</th>
                            <th>Status</th>
                            <th style="width: 17%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($d = mysqli_fetch_array($data)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><img src="../assets/img/barang_hilang/<?php echo $d['gambar_bh'] ?>" alt="" style="width: 60px; height: 60px;"></td>
                                <td><?php echo $d['ktg_barang']; ?></td>
                                <td><?php echo $d['nama_bh']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($d['tgl_bh']));  ?></td>
                                <td><?php echo $d['ket_status']; ?></td>
                                <td><a href="" class="btn btn-success">Detail</a>
                                    <a href="../usr_riwayat/hapus_riwayat.php?id_bh= <?php echo $d['id_bh']; ?>"" class=" btn btn-danger">Hapus</a>
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


    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<?php
include '../template/user_footer.php';
?>