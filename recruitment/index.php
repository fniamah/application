<?php
include ("../connection/conn.php");
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
	<title>Login - Students Portal</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css" />
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

<body style="background-image: url('assets/images/bg.jpg'); height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover">

	<!-- Main navbar -->
    <div class="navbar navbar-inverse">

        <div class="row">
            <div class="col-md-12" align="center">
                <p style="font-weight: bold; font-size: xx-large;"><?php echo $cname; ?></p>
            </div>
        </div>
    </div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container login-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">
                    <div class="row">
                            <div class="col-md-6">&nbsp;</div>
                            <div class="col-md-6">
                                <form method="post">
                                    <input type="hidden" value="" name="job_id"/>
                                    <div class="panel panel-body login-form">
                                        <div class="alert alert-success alert-styled-left alert-arrow-left alert-bordered">
                                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                                            <span class="text-semibold">Success!</span> Check Your Inbox And Follow The Instructions
                                        </div>
                                        <div class="text-center">
                                            <div class="icon-object border-slate-300 text-slate-300"><img src="../<?php echo $clogo; ?>" class="img-responsive"/></div>
                                            <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
                                        </div>

                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="text" class="form-control" placeholder="E-mail" name="username">
                                            <div class="form-control-feedback">
                                                <i class="icon-user text-muted"></i>
                                            </div>
                                        </div>

                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="password" class="form-control" placeholder="Password" name="pword">
                                            <div class="form-control-feedback">
                                                <i class="icon-lock2 text-muted"></i>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn bg-blue btn-block" value="Login" name="student_login">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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
