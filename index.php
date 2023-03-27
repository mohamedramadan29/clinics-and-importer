<?php
$pagetitle = '  Login  ';
ob_start();
session_start();
include 'init.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['select_permision'] == 'admin') {
    $username = $_POST['user_name'];
    $password = $_POST['password'];
    $stmt = $connect->prepare(
        'SELECT * FROM admin WHERE user_name=? AND password=?'
    );
    $stmt->execute([$username, $password]);
    $data = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $_SESSION['admin_id'] = $data['id'];
        header('Location:main.php?dir=dashboard&page=dashboard');
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['select_permision'] == 'emp') {
    $username = $_POST['user_name'];
    $password = $_POST['password'];
    $stmt = $connect->prepare(
        'SELECT * FROM emplyees WHERE emp_name=? AND emp_password=?'
    );
    $stmt->execute([$username, $password]);
    $data = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $_SESSION['emp_id'] = $data['id'];
        header('Location:main.php?dir=dashboard&page=emp_dashboard');
        exit();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['select_permision'] == 'supp') {
    $username = $_POST['user_name'];
    $password = $_POST['password'];
    $stmt = $connect->prepare(
        'SELECT * FROM presentions WHERE name=? AND password=?'
    );
    $stmt->execute([$username, $password]);
    $data = $stmt->fetch();
    $count = $stmt->rowCount();
    if ($count > 0) {
        $_SESSION['supp_id'] = $data['id'];
        header('Location:main.php?dir=dashboard&page=sup_dashboard');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in (v2)</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_data">
                    <?php
                    $stmt = $connect->prepare("SELECT * FROM login_page ORDER BY id DESC LIMIT 1");
                    $stmt->execute();
                    $data = $stmt->fetch();
                    ?>
                    <img src="uploads/<?php echo $data['login_image']; ?>" alt="">
                    <p> <?php echo $data['login_desc']; ?></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login-box">
                    <div class="card card-outline card-primary">
                        <div class="card-header text-center">
                            <a href="index" class="h1"><b>Clinic</b>System</a>
                        </div>
                        <div class="card-body">
                            <p class="login-box-msg">Sign in as Admin</p>
                            <form action="" method="post">
                                <div class="input-group mb-3">
                                    <input type="text" name="user_name" class="form-control" placeholder="UserName">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-user"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="fas fa-lock"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <select name="select_permision" id="" class="form-control select2">
                                        <option value=""> -- Select Permission -- </option>
                                        <option value="admin"> Admin </option>
                                        <option value="emp"> Employee </option>
                                        <option value="supp"> Supplier </option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-8">
                                        <div class="icheck-primary">
                                            <input type="checkbox" id="remember">
                                            <label for="remember">
                                                Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>
                            <p class="mb-1">
                                <!-- <a href="forgot-password.html">I forgot my password</a> -->
                            </p>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="dist/js/adminlte.min.js"></script>
</body>

</html>