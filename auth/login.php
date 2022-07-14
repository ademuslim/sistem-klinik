<?php
require_once "../_config/koneksi.php";

if (isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url() . "';</script>";
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Login - AM Klinik</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url('_assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?= base_url('_assets/css/mystyle.css') ?>" rel="stylesheet">
        <link rel="icon" href="<?= base_url('_assets/amlogo.png') ?>">

    </head>

    <body>

        <div id="wrapper">
            <div class="container">
                <div class="center">

                    <form action="" method="post" class="navbar-form">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="user" class="form-control" placeholder="Username" required autofocus>
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="pass" class="form-control" placeholder="Password" required>
                        </div>

                        <div class="input-group">
                            <input type="submit" name="login" class="btn btn-primary" value="Login">
                        </div>

                        <?php
                        if (isset($_POST['login'])) {
                            $user = trim(mysqli_real_escape_string($koneksi, $_POST['user']));
                            $pass = sha1(trim(mysqli_real_escape_string($koneksi, $_POST['pass'])));
                            $sql_login = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$user' AND password = '$pass'") or die(mysqli_error($koneksi));
                            if (mysqli_num_rows($sql_login) > 0) {
                                $_SESSION['user'] = $user;
                                echo "<script>window.location='" . base_url() . "';</script>";
                            } else {
                        ?>
                                <div class="input-group notif">
                                    <div class="alert alert-danger alert-dismissable" role="alert">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                        <strong>Login gagal!</strong> Username atau Password salah.
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </form>

                </div>
            </div>

            <div class="am">
                <h1>
                    <img src="../_assets/amlogo.png" alt="amlogo">
                    UAS SBD - Ade Muslim - 2022
                </h1>
            </div>
        </div>

        <script src="<?= base_url('_assets/js/jquery.js') ?>"></script>
        <script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>
    </body>

    </html>

<?php
}
?>