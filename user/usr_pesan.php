<?php
include '../template/user_nav.php';
require '../koneksi.php';

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Kirim Pesan</h1>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <form method="POST" action="">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Perihal</label>
                    <textarea class="form-control" name="perihal_pesan" id="exampleFormControlTextarea1" rows="1"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Masukkan pesan anda</label>
                    <textarea class="form-control" name="isi_pesan" id="exampleFormControlTextarea1" rows="10" cols="50"></textarea>
                </div>
                <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
                <input class="btn btn-success" type="submit" name="kirim" value="Kirim" />
            </form>
        </div>



    </div>
    <div class="row">
        <br>
        <br>
        <br>
        <br>
    </div>

    <!-- Content Row -->



</div>
<!-- End of Main Content -->

<?php
include '../template/user_footer.php';

if (isset($_POST['kirim'])) {
    $perihal_pesan = mysqli_real_escape_string($koneksi, $_POST['perihal_pesan']);
    $isi_pesan = mysqli_real_escape_string($koneksi, $_POST['isi_pesan']);
    $id_user = mysqli_real_escape_string($koneksi, $_POST['id_user']);
    if ($perihal_pesan == "" || $isi_pesan == "") {
        echo "<script>alert('Harap isi perihal dan pesan');window.location='../user/usr_pesan.php';</script>";
    } else {
        $query = "insert into pesan values('','$id_user','$perihal_pesan','$isi_pesan')";
        $hasil =  mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
        echo "<script>alert('Pesan berhasil dikirim');window.location='../user/usr_pesan.php';</script>";
    }
}
?>