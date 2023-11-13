<?php
include '../template/user_nav.php';
require '../koneksi.php';
$id_user = $_SESSION['id_user'];
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Daftar Barang Hilang</h1>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Barang Hilang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Kategori</th>
                            <th>Kota</th>
                            <th>Merk dan Nama Barang</th>
                            <th>Tgl Hilang</th>
                            <th>Lokasi Hilang</th>
                            <th>Penyebab</th>
                            <th>Status</th>
                            <th style="width: 10%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query(
                            $koneksi,
                            "select * from barang_hilang 
        inner join kategori_barang on barang_hilang.id_ktg_barang = kategori_barang.id_ktg_barang 
        inner join kota on barang_hilang.id_kota = kota.id_kota 
        inner join status on barang_hilang.id_status = status.id_status 
        where id_user='$id_user' and status.id_status <= 3 
        order by case
        when status.id_status = '2' then 1
        when status.id_status = '1' then 2
        when status.id_status = '3' then 3
        else 4
        end asc"
                        );

                        while ($d = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><img src="../assets/img/barang_hilang/<?php echo $d['gambar_bh']; ?>" alt="" style="width: 60px; height: 60px;"></td>
                                <td><?php echo $d['ktg_barang']; ?></td>
                                <td><?php echo $d['nama_kota']; ?></td>
                                <td><?php echo $d['nama_bh']; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($d['tgl_bh'])); ?></td>
                                <td><?php echo $d['lokasi_bh']; ?></td>
                                <td><?php echo $d['penyebab_bh']; ?></td>
                                <td><?php echo $d['ket_status']; ?></td>
                                <td>
                                    <?php
                                    if ($d['id_status'] == "1") {
                                    ?>
                                        <a href="../usr_barang_hilang/edit_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>" class="btn btn-sm btn-primary">EDIT</a>
                                        <a href="../usr_barang_hilang/hapus_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>" class="btn btn-sm btn-danger">HAPUS</a>
                                    <?php
                                    } elseif ($d['id_status'] == "2") {
                                    ?>
                                        <a href="../usr_barang_hilang/edit_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>" class="btn btn-sm btn-warning">PERBAIKI</a>
                                        <a href="../usr_barang_hilang/hapus_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>" class="btn btn-sm btn-danger">HAPUS</a>
                                    <?php
                                    } elseif ($d['id_status'] == "3") {
                                    ?>
                                        <a href="../usr_barang_hilang/ketemu_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>" class="btn btn-sm btn-success">KETEMU</a>
                                        <a target="_blank" href="../usr_barang_hilang/cetak_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>" class="btn btn-sm btn-success">CETAK</a>
                                        <a href="../usr_barang_hilang/hapus_barang_hilang.php?id_bh= <?php echo $d['id_bh']; ?>" class="btn btn-sm btn-danger">HAPUS</a>
                                <?php
                                    }
                                }
                                ?>

                                </td>
                            </tr>
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