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
        <h1 class="h3 mb-0 text-gray-800">Edit Password</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <div class="col-lg-6">
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


    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php


if (isset($_POST['submit'])) {
    $id_user = $_POST['id_user'];
    $current_password = mysqli_real_escape_string($koneksi, $_POST['current_password']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $repassword = mysqli_real_escape_string($koneksi, $_POST['repassword']);



    if ($password == "" && $repassword == "") {
        echo "<script>alert('password tidak boleh kosong');window.location='../user/usr_edit_pass.php';</script>";
    } elseif ($password != $repassword) {
        echo "<script>alert('ulangi password anda dengan benar');window.location='../user/usr_edit_pass.php';</script>";
    } else {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        if (!password_verify($current_password, $d['password'])) {
            echo "<script>alert('password lama anda salah');window.location='../user/usr_edit_pass.php';</script>";
        }else{
			 $query = "update user set password='$password_hash' where id_user='$id_user'";
        $hasil = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        echo "<script>alert('password anda berhasil diupdate');window.location='../user/usr_edit_pass.php';</script>";
		}
    }
}

include '../template/user_footer.php';
?>