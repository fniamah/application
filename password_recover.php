<?php
include ("connection/conn.php");
session_unset();
session_destroy();

$conn=new Db_connect;
$dbcon=$conn->conn();
$cname="SCHOOL NAME";
$clogo="assets/images/defaults/noimage.jpg";

$sel = "SELECT cname, clogo FROM company";
$selrun = $conn->query($dbcon,$sel);
if($conn->sqlnum($selrun) !=0){
    $seldata = $conn->fetch($selrun);
    $clogo = $seldata['clogo'];
    $cname = $seldata['cname'];
}

$otp = $_GET['otp'];
$stfid = $_GET['stfid'];

if(isset($_POST['otp'])){
    $conn=new Db_connect;
    $dbcon=$conn->conn();
    $stfid=$_POST['userid'];
    $otp=$_POST['otp'];
    $newPass=$_POST['password'];

    $newhash = password_hash($newPass, PASSWORD_ARGON2I);
    $update = "UPDATE users SET pword = '$newhash', otp = '' WHERE userid='$stfid' AND otp = '$otp'";
    $conn->query($dbcon,$update);

    $conn->close($dbcon);

    $event=date("Y-m-d H:i:s")."Password Recovered By, ".$stfid.PHP_EOL;
    logrequest($event,"audit_trails");
    header("location: index.php");
}


$conn->close($dbcon);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $cname; ?> | Password Recovery</title>

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
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
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
					 					<!-- Password recovery -->
					<form method="post">
                        <input type="hidden" value="<?php echo $stfid; ?>" name="userid" />
                        <input type="hidden" value="<?php echo $otp; ?>" name="otp" />
						<div class="panel panel-body login-form">
                       

							<div class="text-center">
								<div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
								<h5 class="content-group">Password recovery <small class="display-block">Enter Your New Password</small></h5>
							</div>

							<div class="form-group has-feedback">
								<input type="text" class="form-control" placeholder="New Password" name="password" required>
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
							</div>

							<button type="submit" class="btn bg-blue btn-block" name="reetpassword">Reset password <i class="icon-arrow-right14 position-right"></i></button>
						</div>
					</form>
					<!-- /password recovery -->

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
