<?php
include '../template/user_nav.php';
require '../koneksi.php';

$id_user = $_SESSION['id_user'];

$d = mysqli_fetch_array(mysqli_query($koneksi, "select * from user where id_user = '$id_user'"));
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Buat Postingan Barang Hilang</h1>
    </div>

    <!-- Content Row -->
    <div class="row">


        <div class="col-lg-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">

                    <?php if ($d['alamat'] == "" || $d['no_hp'] == "") {
                        echo "<p class='alert alert-danger'>Anda harus melengkapi profil terlebih dahulu sebelum membuat postingan</p>";
                    }
                    ?>


                    <div class="col-lg-6">
                        <table class="table table-bordered">


                            <div class="form-group">
                                <label for="kategori">Kategori Barang</label>
                                <select class="form-control" name="kategori" id="kategori">
                                    <?php
                                    $query_kategori = "select * from kategori_barang";
                                    $sql_kategori = mysqli_query($koneksi, $query_kategori);
                                    while ($data_kategori = mysqli_fetch_array($sql_kategori)) {
                                        echo "<option value='" . $data_kategori['id_ktg_barang'] . "'>" . $data_kategori['ktg_barang'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <select class="form-control" name="kota" id="kota">
                                    <?php
                                    $query_kota = "select * from kota";
                                    $sql_kota = mysqli_query($koneksi, $query_kota);
                                    while ($data_kota = mysqli_fetch_array($sql_kota)) {
                                        echo "<option value='" . $data_kota['id_kota'] . "'>" . $data_kota['nama_kota'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>



                            <div class="form-group">
                                <label for="modelbarang">Merk dan Nama Barang</label>
                                <input class="form-control " type="text" name="nama_bh" placeholder="cth : Appel - Iphone 11 Pro Max" autocomplete="off" />
                            </div>


                            <div class="form-group">
                                <label for="tanggalhilang">Tanggal Hilang</label>
                                <fieldset>
                                    <input type="date" name="tgl_bh">
                                </fieldset>
                            </div>

                            <div class="form-group">
                                <label for="terakhirhilang">Lokasi Terakhir Hilang</label>
                                <input class="form-control " type="text" name="lokasi_bh" min="0" placeholder="ex : di malioboro" autocomplete="off" />
                            </div>
                        </table>
                    </div>
                    <div class="col-lg-6">
                        <table class="table table-bordered">

                            <div class="form-group">
                                <label for="terakhirhilang">Penyebab</label>
                                <input class="form-control " type="text" name="penyebab_bh" min="0" placeholder="cth : terjatuh" autocomplete="off" />
                            </div>

                            <label>Gambar</label>
                            <div class="form-group">
                                <img src="../assets/img/barang_hilang/barang_dummy.png" id="uploadPreview" style="width: 150px; height: 150px;" /><br>
                                <br>
                                <input class="form-control-file " type="file" id="uploadImage" type="file" accept=".jpg, .png" name="gambar_bh" onchange="PreviewImage();" />
                            </div>
                        </table>
                    </div>
                    <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
                    <input class="btn btn-success" type="submit" name="kirim" value="kirim" />
                </div>
            </form>

        </div>

    </div>


    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<script type="text/javascript">
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
        oFReader.onload = function(oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
</script>

<?php
include '../template/user_footer.php';



if (isset($_POST['kirim'])) {
    if ($d['alamat'] == "" || $d['no_hp'] == "") {
        echo "<script>alert('Silahkan lengkapi profil anda terlebih dahulu');window.location='../user/usr_edit_profil.php';</script>";
    } else {
        $kategori = $_POST['kategori'];
        $id_user = $_POST['id_user'];
        $kota = $_POST['kota'];
        $nama_bh = $_POST['nama_bh'];
        $tgl_bh = $_POST['tgl_bh'];
        $lokasi_bh = $_POST['lokasi_bh'];
        $penyebab_bh = $_POST['penyebab_bh'];
        $gambar_bh = $_FILES['gambar_bh']['name'];

        if ($gambar_bh != "") {
            $ekstensi_boleh = array('png', 'jpg', 'jpeg');
            $x = explode('.', $gambar_bh);
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['gambar_bh']['tmp_name'];
            $ukuran = $_FILES['gambar_bh']['size'];
            $maxsize = 1044070;
            $angka_acak = rand(1, 999);
            $nama_baru = $angka_acak . '-' . $gambar_bh;

            if (in_array($ekstensi, $ekstensi_boleh) === false) {
                echo "<script>alert('Ekstensi foto tidak diperbolehkan');window.location='../user/usr_edit_profil.php';</script>";
            } elseif ($ukuran >= $maxsize || $ukuran == 0) {
                echo "<script>alert('Ukuran foto adalah 1MB');window.location='../user/usr_edit_profil.php';</script>";
            } else {
                move_uploaded_file($file_tmp, '../assets/img/barang_hilang/' . $nama_baru);
                $query = "insert into barang_hilang (id_ktg_barang, id_user, id_kota, id_status, nama_bh, tgl_bh, lokasi_bh, penyebab_bh, gambar_bh, pesan_bh) values('$kategori','$id_user','$kota','1','$nama_bh','$tgl_bh','$lokasi_bh','$penyebab_bh','$nama_baru','')";
                $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
                echo "<script>alert('Data berhasil ditambahkan');window.location='../user/usr_barang_hilang.php';</script>";
            }
        } else {
            echo "<script>alert('Sertakan gambar barang');window.location='../user/usr_tambah_barang_hilang.php';</script>";
        }
    }
}
?>