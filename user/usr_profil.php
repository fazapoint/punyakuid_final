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
        <h1 class="h3 mb-0 text-gray-800">Profil Saya</h1>
    </div>

    <!-- Content Row -->
    <div>
        <?php if ($d['alamat'] == "" || $d['no_hp'] == "") {
            echo "<p class='alert alert-danger'>Silahkan lengkapi profil anda terlebih dahulu</p>";
        }
        ?>
    </div>
    <div class="row">



        <div class="card mb-3" style=" width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="../assets/img/user/<?php echo $d['gambar_user']; ?>" style="width: 170px; height: 200px;" class="card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <table>
                            <tr>
                                <th style="width: 40%;">Nama</th>
                                <td>
                                    <p class="card-text">: <?php echo $d['nama']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 40%;">Username</th>
                                <td>
                                    <p class="card-text">: <?php echo $d['username']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 40%;">Email</th>
                                <td>
                                    <p class="card-text">: <?php echo $d['email']; ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 40%;">Alamat</th>
                                <td>
                                    <p class="card-text">: <?php if ($d['alamat'] != "") {
                                                                echo $d['alamat'];
                                                            } else {
                                                                echo "Alamat belum diatur";
                                                            } ?></p>
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 40%;">Nomer HP</th>
                                <td>
                                    <p class="card-text">: <?php if ($d['no_hp'] != "") {
                                                                echo $d['no_hp'];
                                                            } else {
                                                                echo "nomor HP belum diatur";
                                                            } ?></p>
                                </td>
                            </tr>
                        </table>


                    </div>
                </div>
            </div>



        </div>




        <!-- Content Row -->


    </div>
    <div class="row">
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include '../template/user_footer.php';
?>