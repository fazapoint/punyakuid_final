<?php

include '../template/adm_topbar.php';
include '../template/adm_sidebar.php';


$id_user = $_SESSION['id_user'];

$d = mysqli_fetch_array(mysqli_query($koneksi, "select * from user where id_user = '$id_user'"));


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Profil</h1>
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
                <div class="col-lg-8">

                    <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $d['email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $d['username']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $d['nama']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $d['alamat']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $d['no_hp']; ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"><b>Foto</b></div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="../assets/img/user/<?php echo $d['gambar_user']; ?>" class="img-thumbnail" id="uploadPreview" style="width: 150px; height: 150px;"><br>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="uploadImage" type="file" accept=".jpg, .png" name="foto_user" onchange="PreviewImage();" />
                                            <label class="custom-file-label" for="foto_user">Pilih foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_user" value="<?php echo $d['id_user']; ?>">
                        <input type="hidden" name="foto_lama" value="<?php echo $d['gambar_user']; ?>">
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>


                    </form>


                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include '../template/adm_footer.php';


include_once '../koneksi.php';

if (isset($_POST['edit'])) {
    $id_user = mysqli_real_escape_string($koneksi, $_POST['id_user']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $foto_user = $_FILES['foto_user']['name'];
    $foto_lama = $_POST['foto_lama'];

    if ($foto_user != "") {
        $ekstensi_boleh = array('png', 'jpg', 'jpeg');
        $x = explode('.', $foto_user);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto_user']['tmp_name'];
        $ukuran = $_FILES['foto_user']['size'];
        $maxsize = 1044070;
        $angka_acak = rand(1, 999);
        $nama_baru = $angka_acak . '-' . $foto_user;

        if (in_array($ekstensi, $ekstensi_boleh) === false) {
            echo "<script>alert('Ekstensi foto tidak diperbolehkan');window.location='../admin/adm_edit_profil.php';</script>";
        } elseif ($ukuran >= $maxsize || $ukuran == 0) {
            echo "<script>alert('Ukuran foto adalah 1MB');window.location='../admin/adm_edit_profil.php';</script>";
        } elseif ($foto_lama == 'user_dummy.png') {
            move_uploaded_file($file_tmp, '../assets/img/user/' . $nama_baru);
            $query = "update user set nama='$nama', gambar_user='$nama_baru', alamat='$alamat', no_hp='$no_hp' where id_user='$id_user'";
            $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
            echo "<script>alert('Data berhasil diupdate');window.location='../admin/adm_edit_profil.php';</script>";
        } else {
            unlink("../assets/img/user/" . $foto_lama);
            move_uploaded_file($file_tmp, '../assets/img/user/' . $nama_baru);
            $query = "update user set nama='$nama', gambar_user='$nama_baru', alamat='$alamat', no_hp='$no_hp' where id_user='$id_user'";
            $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
            echo "<script>alert('Data berhasil diupdate');window.location='../admin/adm_edit_profil.php';</script>";
        }
    } else {
        $query = "update user set nama='$nama', alamat='$alamat', no_hp='$no_hp' where id_user='$id_user'";
        $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        echo "<script>alert('Data berhasil diupdate');window.location='../admin/adm_edit_profil.php';</script>";
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