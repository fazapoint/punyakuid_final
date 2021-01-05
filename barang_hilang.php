<?php
include 'template/all_header.php';

?>
<!-- ***** Call to Action Start ***** -->
<div class="main-banner" id="top">
    <img src="assets/images/fleetoo.jpg" id="jumbotron">
    <div class="jumbotron-overlay header-text">
        <div class="caption">
            <h2><em>Temukan</em> Barang Hilang Disini</h2>
        </div>
    </div>
</div>
<!-- ***** Call to Action End ***** -->

<section class="section" id="trainers">
    <div class="container">
        <br>
        <br>
        <div class="row">
            <?php
            $query = mysqli_query($koneksi, "select * from barang_hilang
            inner join kategori_barang on barang_hilang.id_ktg_barang = kategori_barang.id_ktg_barang
            inner join kota on barang_hilang.id_kota = kota.id_kota
            where id_status ='3'");

            while ($d = mysqli_fetch_array($query)) {
            ?>

                <div class="col-lg-4 col-md-4">
                    <div class="trainer-item">
                        <div class="image-thumb">
                            <img src="assets/img/barang_hilang/<?php echo $d['gambar_bh'] ?>" style="width: 250px; height: 250px;" alt="">
                        </div>
                        <div class="down-content">
                            <span><?php echo $d['nama_kota'] ?></span>
                            <p><?php echo $d['ktg_barang'] ?></p>
                            <h4><?php echo $d['nama_bh'] ?></h4>
                            <ul class="social-icons">
                                <li><a href="detail_barang.php?id_bh=<?php echo $d['id_bh'] ?>">+ Detail</a></li>
                            </ul>
                        </div>
                    </div>
                </div>



            <?php
            }
            ?>




        </div>

        <br>



    </div>
</section>

<?php

include 'template/all_footer.php';
?>