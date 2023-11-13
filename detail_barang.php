<?php
include 'template/all_header.php';
$id_bh = $_GET['id_bh'];
$query = mysqli_query(
    $koneksi,
    "select * from barang_hilang
inner join kategori_barang on barang_hilang.id_ktg_barang = kategori_barang.id_ktg_barang
inner join kota on barang_hilang.id_kota = kota.id_kota
inner join user on barang_hilang.id_user = user.id_user
where id_bh='$id_bh'"
);
$d = mysqli_fetch_array($query);

?>

<section class="section" id="trainersdetail">
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <div class="row justify-content-md-center">
            <div class="col justify-content-md-center">

                <div class="trainer-item" style="width: 650px; margin:auto">
                    <div class=" image-thumb">
                        <img src="assets/img/barang_hilang/<?php echo $d['gambar_bh'] ?>" style=" margin:auto; height: 400px" alt="">
                        <table class="table table-bordered my-3">
                            <tbody>
                                <tr>
                                    <td><b>Kategori</b></td>
                                    <td><?php echo $d['ktg_barang'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Kota</b></td>
                                    <td><?php echo $d['nama_kota'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Merk dan Nama Barang</b></td>
                                    <td><?php echo $d['nama_bh'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Tanggal Hilang</b></td>
                                    <td><?php echo date('d-m-Y', strtotime($d['tgl_bh'])); ?></td>
                                </tr>
                                <tr>
                                    <td><b>Lokasi Hilang</b></td>
                                    <td><?php echo $d['lokasi_bh'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Penyebab Kehilangan</b></td>
                                    <td><?php echo $d['penyebab_bh'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nama Pencari</b></td>
                                    <td><?php echo $d['nama'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Alamat Pencari</b></td>
                                    <td><?php echo $d['alamat'] ?></td>
                                </tr>
                                <tr>
                                    <td><b>Nomor HP Pencari</b></td>
                                    <td><?php echo $d['no_hp'] ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>



        </div>
    </div>
</section>

<?php

include 'template/all_footer.php';
?>