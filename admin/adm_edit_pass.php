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
                    <h1 class="m-0 text-dark">Ganti Password</h1>
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
                    <form action="" method="post">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="current_password">Current Password</label>
                                <input type="password" class="form-control" id="current_password" name="current_password">
                            </div>
                            <div class="form-group">
                                <label for="new_password1">New Password</label>
                                <input type="password" class="form-control" id="new_password1" name="password">
                            </div>
                            <div class="form-group">
                                <label for="new_password2">Repeat Password</label>
                                <input type="password" class="form-control" id="new_password2" name="repassword">
                            </div>
                            <input type="hidden" name="id_user" value="<?php echo $d['id_user']; ?>">
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-primary">Change Password</button>
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

if (isset($_POST['submit'])) {
    $id_user = $_POST['id_user'];
    $current_password = mysqli_real_escape_string($koneksi, $_POST['current_password']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $repassword = mysqli_real_escape_string($koneksi, $_POST['repassword']);



    if ($password == "" && $repassword == "") {
        echo "<script>alert('password tidak boleh kosong');window.location='../admin/adm_edit_pass.php';</script>";
    } elseif ($password != $repassword) {
        echo "<script>alert('ulangi password anda dengan benar');window.location='../admin/adm_edit_pass.php';</script>";
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        if (!password_verify($current_password, $d['password'])) {
            echo "<script>alert('password lama anda salah');window.location='../admin/adm_edit_pass.php';</script>";
        } else {
            $query = "update user set password='$password_hash' where id_user='$id_user'";
            $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
            echo "<script>alert('password anda berhasil diupdate');window.location='../admin/adm_edit_pass.php';</script>";
        }
    }
}
?>