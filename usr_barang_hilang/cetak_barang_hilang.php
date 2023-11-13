<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>

<body>

    <?php

    require '../koneksi.php';
    $id_bh = $_GET['id_bh'];

    $data = mysqli_query(
        $koneksi,
        "select * from barang_hilang
    inner join kategori_barang on barang_hilang.id_ktg_barang = kategori_barang.id_ktg_barang
    inner join kota on barang_hilang.id_kota = kota.id_kota
    inner join user on barang_hilang.id_user = user.id_user
    inner join status on barang_hilang.id_status = status.id_status
    where id_bh='$id_bh'"
    );
    $d = mysqli_fetch_array($data);
    ?>

    <center>
        <h1><b>TELAH HILANG</b></h1>
        <img src="../assets/img/barang_hilang/<?php echo $d['gambar_bh'] ?>" style="width: 400px; height: 300px;" alt="">
        <h2>Sebuah barang <?php echo $d['ktg_barang']; ?></h2>
        <h2>Berupa <?php echo $d['nama_bh']; ?></h2>
        <h2>Pada tanggal <?php echo $d['tgl_bh'] ?></h2>
        <h2>Di daerah <?php echo $d['lokasi_bh'] ?></h2>
        <h2>Karena <?php echo $d['penyebab_bh'] ?></h2>
        <h2>Harap hubungi <?php echo $d['nama'] ?> pada nomor <?php echo $d['no_hp'] ?></h2>
        <h2>Alamat rumah : <?php echo $d['alamat'] ?></h2>
    </center>

    <script>
        window.print();
    </script>

</body>

</html>