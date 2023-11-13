<?php

include '../koneksi.php';

$id_kota = $_GET['id_kota'];

mysqli_query($koneksi, "delete from kota where id_kota='$id_kota'");

echo "<script>alert('Data berhasil dihapus');window.location='../admin/adm_kota.php';</script>";
