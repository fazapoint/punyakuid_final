<?php

require '../koneksi.php';

$id_bh = $_GET['id_bh'];

//ambil data dari tabel
$d = mysqli_fetch_array(mysqli_query($koneksi, "select * from barang_hilang where id_bh = '$id_bh'"));






$hapus = mysqli_query($koneksi, "delete from barang_hilang where id_bh='$id_bh'");
if ($hapus) {
    unlink("../assets/img/barang_hilang/$d[gambar_bh]");
    echo "<script>alert('Data berhasil dihapus');window.location='../admin/adm_barang_hilang_tunda.php';</script>";
} else {
    echo "<script>alert('Data Gagal Di Hapus, Coba ulangi lagi');window.location='../admin/adm_barang_hilang_tunda.php';</script>";
}
