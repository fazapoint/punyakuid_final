<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Daftar</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/vendor/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-10 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Buat Akun Baru!</h1>
                                    </div>
                                    <?php
                                    if (isset($_GET['pesan'])) {
                                        if ($_GET['pesan'] == "username") {
                                            echo "<div class='alert alert-danger'>Username sudah terdaftar</div>";
                                        } else if ($_GET['pesan'] == "email") {
                                            echo "<div class='alert alert-danger'>Email sudah terdaftar</div>";
                                        } else if ($_GET['pesan'] == "password") {
                                            echo "<div class='alert alert-danger'>Password tidak sesuai</div>";
                                        } else if ($_GET['pesan'] == "usernameemail") {
                                            echo "<div class='alert alert-danger'>username dan email sudah terdaftar</div>";
                                        }
                                    }

                                    ?>
                                    <form class="user" method="POST" action="cek_daftar.php">
                                        <div class="form-group">
                                            <input type="text" name="nama" class="form-control form-control-user" id="exampleFirstName" placeholder="Masukkan nama anda">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName" placeholder="Masukkan username baru">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Masukkan email anda">
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="password" name="repassword" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulangi password">
                                            </div>
                                        </div>
                                        <input type="submit" name="daftar" value="Daftar" class="btn btn-primary btn-user btn-block">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <small>Sudah punya akun?</small>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="login.php">Masuk!</a>
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