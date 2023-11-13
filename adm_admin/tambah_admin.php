<?php

include '../template/adm_topbar.php';
include '../template/adm_sidebar.php';

require '../koneksi.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah admin</h1>
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
                    <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-2 col-form-label">No HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="no_hp" name="no_hp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="no_hp" class="col-sm-2 col-form-label">Ulangi password</label>
                            <div class="col-sm-10">
                                <input type="password" name="repassword" class="form-control form-control-user" id="exampleRepeatPassword">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2"><b>Foto</b></div>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <img src="../assets/img/user/user_dummy.png" class="img-thumbnail" id="uploadPreview" style="width: 180px; height: 150px;"><br>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="custom-file">
                                            <input class="custom-file-input" id="uploadImage" type="file" accept=".jpg, .png" name="foto_user" onchange="PreviewImage();" />
                                            <label class="custom-file-label" for="image">Pilih foto</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" name="kirim" class="btn btn-primary">Tambah</button>
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
include '../template/adm_footer.php';

if (isset($_POST['kirim'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $repassword = mysqli_real_escape_string($koneksi, $_POST['repassword']);
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    $foto_user = $_FILES['foto_user']['name'];

    $cek_username = mysqli_query($koneksi, "select * from user where username='$username'");
    $duplikat_username = mysqli_num_rows($cek_username);

    $cek_email = mysqli_query($koneksi, "select * from user where email='$email'");
    $duplikat_email = mysqli_num_rows($cek_email);

    if ($duplikat_username > 0 and $duplikat_email > 0) {
        echo "<script>alert('username dan email tidak bisa dipakai');window.location='tambah_admin.php';</script>";
    } elseif ($duplikat_username > 0) {
        echo "<script>alert('username tidak bisa dipakai');window.location='tambah_admin.php';</script>";
    } elseif ($duplikat_email > 0) {
        echo "<script>alert('email tidak bisa dipakai');window.location='tambah_admin.php';</script>";
    } elseif ($password != $repassword) {
        echo "<script>alert('password tidak sama');window.location='tambah_admin.php';</script>";
    } else {

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
                echo "<script>alert('ekstensi hanya jpg dan png');window.location='tambah_admin.php';</script>";
            } elseif ($ukuran >= $maxsize || $ukuran == 0) {
                echo "<script>alert('ukuran foto max 1MB');window.location='tambah_admin.php';</script>";
            } else {
                move_uploaded_file($file_tmp, '../assets/img/user/' . $nama_baru);
                $query = "insert into user values('','$nama', '$email', '$username','$password_hash','$alamat','$no_hp','admin','$nama_baru')";
                $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
                echo "<script>alert('Data berhasil disimpan');window.location='../admin/adm_admin.php';</script>";
            }
        } else {
            $query = "insert into user values('','$nama', '$email', '$username','$password_hash','$alamat','$no_hp','admin','user_dummy.png')";
            $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
            echo "<script>alert('Data berhasil disimpan');window.location='../admin/adm_admin.php';</script>";
        }
    }
}
?>