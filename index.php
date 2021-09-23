<?php
include ("connection/conn.php");
session_unset();
session_destroy();

$cname="SCHOOL NAME";
$clogo="assets/images/defaults/noimage.jpg";

$sel = "SELECT cname, clogo FROM company";
$selrun = $conn->query($dbcon,$sel);
if($conn->sqlnum($selrun) !=0){
    $seldata = $conn->fetch($selrun);
    $clogo = $seldata['clogo'];
    $cname = $seldata['cname'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mednet health College | Login Page</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script type="text/javascript" src="assets/js/core/app.js"></script>
    <script type="text/javascript" src="assets/js/pages/login.js"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
<!-- Main navbar -->
<div class="navbar navbar-inverse">

    <div class="row">
        <div class="col-md-12" align="center">
            <p style="font-weight: bold; font-size: xx-large;"><?php echo $cname; ?></p>
        </div>
    </div>
</div>
<!-- /main navbar -->
<!-- /main navbar -->


<!-- Page container -->
<div class="page-container login-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Advanced login -->
                <form method="post">
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="border-slate-300 text-slate-300" align="center"><img src="<?php echo $clogo; ?>" class="img-responsive" style="width: 150px; height: 150px;"/></div>
                            <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
                        </div>
                        <?php if($exist=="yes"){?>
                            <div class="alert alert-danger alert-styled-left alert-bordered" align="center">
                                <span class="text-semibold">Error!</span> Wrong Log In Details. <a href="#" class="alert-link">Try again</a>.
                            </div>
                        <?php }?>
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="Username" name="username">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted" style="color: #852B30;"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted" style="color: #852B30;"></i>
                            </div>
                        </div>

                        <!--<div class="form-group login-options">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" class="styled" checked="checked">
                                        Remember
                                    </label>
                                </div>

                                <div class="col-sm-6 text-right">
                                    <a href="login_password_recover.php">Forgot password?</a>
                                </div>
                            </div>
                        </div>-->

                        <div class="form-group">
                            <input type="submit" class="btn btn-block" value="Login" name="login" style="background-color: rgba(133,43,48,0.9); color: #FFF;">
                        </div>
                    </div>
                </form>
                <!-- /advanced login -->


                <!-- Footer -->
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>
