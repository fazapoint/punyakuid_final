<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Punyakuid | login
    </title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/vendor/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-10 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row  justify-content-center">
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                                    </div>
                                    <div>
                                        <?php
                                        if (isset($_GET['pesan'])) {
                                            if ($_GET['pesan'] == "gagal") {
                                                echo "<div class='alert alert-danger'>Username atau Password tidak sesuai !</div>";
                                            } else if ($_GET['pesan'] == "belum_login") {
                                                echo "<div class='alert alert-danger'>Anda belum login</div>";
                                            } else if ($_GET['pesan'] == "bukan_user") {
                                                echo "<div class='alert alert-danger'>Anda bukan user</div>";
                                            } else if ($_GET['pesan'] == "bukan_admin") {
                                                echo "<div class='alert alert-danger'>Anda bukan admin</div>";
                                            } else if ($_GET['pesan'] == "logout") {
                                                echo "<div class='alert alert-primary'>Anda berhasil logout</div>";
                                            } else if ($_GET['pesan'] == "daftar_sukses") {
                                                echo "<div class='alert alert-success'>Daftar sukses silahkan login</div>";
                                            }
                                        }
                                        ?>
                                    </div>
                                    <form class="user" action="cek_login.php" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username atau email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <input type="submit" name="login" value="Masuk" class="btn btn-primary btn-user btn-block">
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="index.php">Home</a>
                                    </div>
                                    <div class="text-center">
                                        <small>belum punya akun ?</small>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="daftar.php">Buat akun baru!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/vendor/sbadmin/js/sb-admin-2.min.js"></script>

</body>

</html>