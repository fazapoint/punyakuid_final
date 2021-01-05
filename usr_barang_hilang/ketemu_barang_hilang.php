<?php

require '../koneksi.php';

$id_bh = $_GET['id_bh'];

mysqli_query($koneksi, "update barang_hilang set id_status='4' where id_bh='$id_bh'");

echo "<script>alert('Postingan terselesaikan');window.location='../user/usr_barang_hilang.php';</script>";
