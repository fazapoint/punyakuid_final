<?php

include '../template/user_nav.php';
include_once '../koneksi.php';
$id_bh = $_GET['id_bh'];
$id_user = $_SESSION['id_user'];
$query = mysqli_query($koneksi, "select * from barang_hilang where id_bh='$id_bh'");

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Barang Hilang</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-6">
                    <?php while ($d = mysqli_fetch_array($query)) {
                    ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <table class="table table-bordered">


                                        <?php
                                        if ($d['pesan_bh'] != "") {
                                        ?>
                                            <div class="form-group">
                                                <label class="alert alert-danger" for="modelbarang">Pesan kesalahan : <?php echo $d['pesan_bh']; ?> </label>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                        <div class="form-group">
                                            <label for="kategori">Kategori Barang</label>
                                            <select class="form-control" name="kategori" id="kategori">
                                                <?php
                                                $query_kategori = "select * from kategori_barang";
                                                $sql_kategori = mysqli_query($koneksi, $query_kategori);

                                                while ($data_kategori = mysqli_fetch_array($sql_kategori)) {
                                                    $nama_kategori = $data_kategori['ktg_barang'];
                                                    $id_ktg_barang = $data_kategori['id_ktg_barang'];
                                                    //pengecekan untuk edit data data mana yang sebelumnya dipilih
                                                    if ($d['id_ktg_barang'] == $data_kategori['id_ktg_barang']) {
                                                        echo "<option value='" . $id_ktg_barang . "' selected>" . $nama_kategori . "</option>";
                                                    } else {
                                                        echo "<option value='" . $id_ktg_barang . "'>" . $nama_kategori . "</option>";
                                                    }
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
                                                    $nama_kota = $data_kota['nama_kota'];
                                                    $id_kota = $data_kota['id_kota'];
                                                    //pengecekan untuk edit data data mana yang sebelumnya dipilih
                                                    if ($d['id_kota'] == $data_kota['id_kota']) {
                                                        echo "<option value='" . $id_kota . "' selected>" . $nama_kota . "</option>";
                                                    } else {
                                                        echo "<option value='" . $id_kota . "'>" . $nama_kota . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>



                                        <div class="form-group">
                                            <label for="modelbarang">Merk dan Nama Barang</label>
                                            <input class="form-control " type="text" name="nama_bh" value="<?php echo $d['nama_bh']; ?>" autocomplete="off" />
                                        </div>


                                        <div class="form-group">
                                            <label for="tanggalhilang">Tanggal Hilang</label>
                                            <fieldset>
                                                <input type="date" name="tgl_bh" value="<?php echo $d['tgl_bh']; ?>">
                                            </fieldset>
                                        </div>

                                        <div class="form-group">
                                            <label for="terakhirhilang">Lokasi Terakhir Hilang</label>
                                            <input class="form-control " type="text" name="lokasi_bh" min="0" value="<?php echo $d['lokasi_bh']; ?>" autocomplete="off" />
                                        </div>
                                    </table>
                                </div>
                                <div class="col-lg-6">
                                    <table class="table table-bordered">

                                        <div class="form-group">
                                            <label for="terakhirhilang">Penyebab</label>
                                            <input class="form-control " type="text" name="penyebab_bh" min="0" value="<?php echo $d['penyebab_bh']; ?>" autocomplete="off" />
                                        </div>

                                        <label>Gambar</label>
                                        <div class="form-group">
                                            <img src="../assets/img/barang_hilang/<?php echo $d['gambar_bh']; ?>" id="uploadPreview" style="width: 150px; height: 150px;" /><br>
                                            <br>
                                            <input class="form-control-file " type="file" id="uploadImage" type="file" accept=".jpg, .png" name="gambar_bh" onchange="PreviewImage();" />
                                        </div>
                                    </table>
                                </div>
                                <input type="hidden" name="id_bh" value="<?php echo $id_bh ?>">
                                <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                                <input type="hidden" name="gambar_lama" value="<?php echo $d['gambar_bh']; ?>">
                                <input class="btn btn-success" type="submit" name="kirim" value="kirim" />
                            </div>
                        </form>
                    <?php
                    }
                    ?>

                </div>

            </div>
        </div>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../template/user_footer.php';

if (isset($_POST['kirim'])) {
    $id_bh = $_POST['id_bh'];
    $kategori = $_POST['kategori'];
    $id_user = $_POST['id_user'];
    $kota = $_POST['kota'];
    $nama_bh = $_POST['nama_bh'];
    $tgl_bh = $_POST['tgl_bh'];
    $lokasi_bh = $_POST['lokasi_bh'];
    $penyebab_bh = $_POST['penyebab_bh'];
    $gambar_bh = $_FILES['gambar_bh']['name'];
    $gambar_lama = $_POST['gambar_lama'];

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
            unlink("../assets/img/barang_hilang/" . $gambar_lama);
            move_uploaded_file($file_tmp, '../assets/img/barang_hilang/' . $nama_baru);
            $query = "update barang_hilang set 
            id_ktg_barang='$kategori', 
            id_user='$id_user',
            id_kota='$kota',
            nama_bh='$nama_bh',
            tgl_bh='$tgl_bh',
            lokasi_bh='$lokasi_bh',
            penyebab_bh='$penyebab_bh',
            id_status='1',
            gambar_bh='$nama_baru',
            pesan_bh=''
            where id_bh='$id_bh'";
            $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
            echo "<script>alert('Data berhasil diupdate');window.location='../user/usr_barang_hilang.php';</script>";
        }
    } else {
        $query = "update barang_hilang set 
        id_ktg_barang='$kategori', 
        id_user='$id_user',
        id_kota='$kota',
        nama_bh='$nama_bh',
        tgl_bh='$tgl_bh',
        lokasi_bh='$lokasi_bh',
        penyebab_bh='$penyebab_bh',
        id_status='1',
        pesan_bh=''
        where id_bh='$id_bh'";
        $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        echo "<script>alert('Data berhasil diupdate');window.location='../user/usr_barang_hilang.php';</script>";
    }
}

?>

<script type="text/javascript">
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);
        oFReader.onload = function(oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };
</script>