<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Đăng nhập</title>
    <link rel = "icon" href ="../img/logo_restaurant.png" type = "image/x-icon">
    <!-- Custom fonts for this template-->
    <link href="assetsForSideBar/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assetsForSideBar/css/sb-admin-2.min.css" rel="stylesheet">

    <style>

    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">ĐĂNG NHẬP</h1>
                                    </div>
                                    <form class="user" action="partials/_handleLogin.php" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="username" aria-describedby="emailHelp" placeholder="Tên đăng nhập">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Mật khẩu">
                                        </div>
                                        
                                        <?php
                                        if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
                                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <strong>Đăng nhập thất bại!</strong> Tên đăng nhập hoặc mật khẩu không trùng khớp.
                                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
                                            </div>';
                                        }
                                        ?>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Đăng nhập</button>
                                       
                                        <hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Đăng nhập với Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Đăng nhập với Facebook
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Quên mật khẩu?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Tạo một tài khoản mới!</a>
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
    <script src="assetsForSideBar/vendor/jquery/jquery.min.js"></script>
    <script src="assetsForSideBar/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assetsForSideBar/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assetsForSideBar/js/sb-admin-2.min.js"></script>

</body>

</html>