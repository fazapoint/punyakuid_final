<?php
include 'template/all_header.php';

?>
<main>
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner" id="top">
        <img src="assets/images/jumbo.png" id="jumbotron">
        <div class="jumbotron-overlay header-text">
            <div class="caption">
                <h2><em>Temukan</em> Milikmu disini</h2>
                <div class="main-button">
                    <a href="daftar.php">Daftar sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Offers Starts ***** -->
    <section class="section" id="trainers">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Apa Itu <em>Punyaku ID</em>?</h2>
                        <div class="row justify-content-center">
                            <div class="col justify-content-center">
                                <hr class="garis">
                            </div>
                        </div>
                        <p>PunyakuID merupakan sebuah platform berbasis website yang menyediakan kemudahan bagi orang banyak yang kesusahan untuk mencari barangnya yang hilang maupun orang-orang yang mengalami kesusahan untuk mengembalikan barang yang mereka temukan. </p>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Offers Ends ***** -->

    <!-- Ini Section Mengapa pilih-->
    <section id="secmengapa" class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading dark-bg">
                        <h2>Mengapa <em>Punyaku Id</em>?</h2>
                        <div class="row justify-content-center">
                            <div class="col justify-content-center">
                                <hr class="garis">
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <h3 style="color: white;"><em>Mudah Digunakan</em></h3>
                                <p class="mt-3">PunyakuID memiliki alur sistem yang mudah untuk dipahami, sehingga semua orang bisa menggunakannya dengan nyaman</p>
                            </div>
                            <div class="col">
                                <h3 style="color: white;"><em>Aman dan Terpercaya</em></h3>
                                <p class="mt-3">PunyakuID aman dan terpercaya karena setiap postingan dipantau oleh admin sehingga meminimalisir postingan yang bersifat tidak benar</p>
                            </div>
                            <div class="col">
                                <h3 style="color: white;"><em>Jangkauan Luas</em></h3>
                                <p class="mt-3">PunyakuID aman dan terpercaya karena setiap postingan dipantau oleh admin sehingga meminimalisir postingan yang bersifat tidak benar</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ini Section Hubungi Kami -->
    <section id="sechubungikami" class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="section-heading">
                    <h2>Hubungi <em>Kami</em></h2>
                    <div class="row justify-content-center">
                        <div class="col justify-content-center">
                            <hr class="garis">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center konten">
                    <div class="col-md-6">
                        <div class="mapouter">
                            <div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2818903068933!2d110.40685741436636!3d-7.759899579105981!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a599bd3bdc4ef%3A0x6f1714b0c4544586!2sUniversitas%20Amikom%20Yogyakarta!5e0!3m2!1sid!2sid!4v1609749255487!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe><a href="https://www.embedgooglemap.net">embedgooglemap.net</a></div>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 500px;
                                    width: 520px;
                                }

                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 500px;
                                    width: 520px;
                                }
                            </style>
                        </div>
                    </div>

                    <div class="col-md-6 ">
                        <h5 class="mb-4"><i class="mr-5 fa fa-2x fa-envelope-square"></i>amikom@amikom.ac.id</h5>
                        <h5 class="mb-4"><i class="mr-5 fa fa-3x fa-map-marker"></i>Jl. Ring Road Utara, Ngringin, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta</h5>
                        <h5 class="mb-4"><i class="mr-5 fa fa-2x fa-phone-square"></i>0274-223415</h5>
                        <h5><i class="mr-5 fa fa-2x fa-fax"></i>0274-3112876</h5>
                        <form class="mt-5">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" id="inputName" placeholder="Nama">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" id="inputTextArea" rows="3" placeholder="Masukkan Pesan Anda"></textarea>
                            </div>
                            <button type="submit" class="btn btn-outline-primary">Kirim</button>
                        </form>
                    </div>
                </div>
                <br>
            </div>
    </section>
</main>

<?php

include 'template/all_footer.php';
?>