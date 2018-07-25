<?php
if (SessionControl::session_started()) {
    Redirection::redirect1(PROFILE);
}

include_once 'templates/validation_login.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>

        <link rel="stylesheet" href="<?php echo PLUGINS; ?>/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo DIST; ?>css/adminlte.min.css">
        <link rel="stylesheet" href="<?php echo CSS; ?>styles.css">
        <link rel="stylesheet" href="<?php echo PLUGINS; ?>iCheck/square/blue.css">
        <link rel="Shortcut Icon" href="<?php echo IMG; ?>favicon_e.png" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    </head>
    <body class="hold-transition login-page" style="font-family: 'Roboto', sans-serif;">
        <div class="login-box">
            <div class="login-logo">
                <img class="mb-4" src="<?php echo IMG; ?>e_logo_home.png" alt="logo_home" width="100" height="100">
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg" style="color: #BDC5CF !important;">Please log in</p>

                    <form action="<?php echo SERVER; ?>" method="post">
                        <div class="form-group has-feedback">
                            <input type="text" class="form-control <?php if(isset($_POST['log_in'])){echo 'is-invalid';} ?>" name="username" placeholder="Username" autofocus required
                            <?php
                            if (isset($_POST['log_in']) && isset($_POST['username']) && !empty($_POST['username'])) {
                                echo 'value="' . $_POST['username'] . '"';
                            }
                            ?>
                                   >
                            <span class="fa fa-user form-control-feedback" style="color: #BDC5CF !important;"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input type="password" class="form-control <?php if(isset($_POST['log_in'])){echo 'is-invalid';} ?>" name="password" placeholder="Password" required>
                            <span class="fa fa-lock form-control-feedback" style="color: #BDC5CF !important;"></span>
                            <?php
                            if (isset($_POST['log_in'])) {
                                $validator->show_error();
                            }
                            ?>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat" name="log_in">Log in</button>
                            </div>
                        </div>
                    </form>
                    <div class="social-auth-links text-center">
                      <p>- OR -</p>
                      <a href="http://www.elogicportal.com" class="btn btn_home btn-block btn-flat"><i class="fa fa-home"></i> Home</a>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo PLUGINS; ?>jquery/jquery.min.js"></script>
        <script src="<?php echo PLUGINS; ?>bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo PLUGINS; ?>iCheck/icheck.min.js"></script>
    </body>
</html>
