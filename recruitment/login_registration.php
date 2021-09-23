<?php
include ("connection/conn.php");
session_unset();
session_destroy();
if(isset($_POST['email'])){
    $email=$_POST['email'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $contact=$_POST['contact'];
    $pword=$_POST['pword'];
    $jobid=$_POST['job_id'];
    //CHECK IF EMAIL EXISTS
    $chk="SELECT * FROM career_reg WHERE email='$email'";
    $chkrun=$conn->query($dbconnection,$chk);
    if($conn->sqlnum($chkrun)==0){
        $ins="INSERT INTO career_reg (fname,lname,email,pword,status,contact) VALUES('$fname','$lname','$email','$pword','Active','$contact')";
        $conn->query($dbconnection,$ins);

        header("location: index.php?job_id=$jobid&status");
        exit(0);
    }
    else{
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>

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
	<div class="navbar navbar-inverse">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.html"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a href="#">
						<i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
					</a>
				</li>

				<li>
					<a href="#">
						<i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
					</a>
				</li>

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-cog3"></i>
						<span class="visible-xs-inline-block position-right"> Options</span>
					</a>
				</li>
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
                    <?php
                    if(isset($_GET['job_id']) && !empty($_GET['job_id'])){
                    $id=$_GET['job_id'];
                    $sel="SELECT * FROM careers WHERE id=$id";
                    $selrun=$conn->query($dbconnection,$sel);
                    $seldata=$conn->fetch($selrun);

                    ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Daily financials -->

                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">CAREER DETAILS</h6>
                                        </div>

                                        <div class="panel-body">
                                            <div class="content-group-xs" id="bullets"></div>
                                            <h3><?php echo $seldata['title']; ?></h3>
                                            <p>
                                                <span><i class="icon icon-home8"></i> <a href="#"><?php echo $seldata['company']; ?></a> </span>
                                                <span><i class="icon icon-price-tag"></i> <a href="#"><?php echo $seldata['jobtype']; ?></a> </span>
                                            </p>
                                            <p>
                                                <?php echo $seldata['description']; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- /daily financials -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h6 class="panel-title" style="color:#09933e; font-weight: bold; font-size: x-large">Welcome To Vokacom Limited Career Services Portal</h6>
                                        </div>

                                        <div class="panel-body">
                                            <h1>Instructions</h1>
                                            Kindly follow the following instructions to create an account
                                            <ul>
                                                <li>Enter your log in credentials; E-mail address and password</li>
                                                <li>Enter your first name, other names and contacts details</li>
                                                    <br><h3><u>NOTE</u></h3>
                                                    An email address cannot be used for more than two sign up details. Also, ensure that emails are active so that no correspondence from
                                                    our recruitment bodies will be lost.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <!-- Advanced login -->
                            <form method="post">
                                <input type="hidden" value="<?php echo $id; ?>" name="job_id" />
                                <div class="panel panel-body login-form">
                                    <div class="text-center">
                                        <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                                        <h5 class="content-group">Create account <small class="display-block">All fields are required</small></h5>
                                    </div>

                                    <div class="content-divider text-muted form-group"><span>Log in credentials</span></div>

                                    <div class="form-group has-feedback has-feedback-left">
                                        <input type="text" class="form-control" placeholder="E-mail" name="email">
                                        <div class="form-control-feedback">
                                            <i class="icon-user-check text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback has-feedback-left">
                                        <input type="password" class="form-control" placeholder="Create password" name="pword">
                                        <div class="form-control-feedback">
                                            <i class="icon-user-lock text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="content-divider text-muted form-group"><span>Other Details</span></div>

                                    <div class="form-group has-feedback has-feedback-left">
                                        <input type="text" class="form-control" placeholder="First Name" name="fname">
                                        <div class="form-control-feedback">
                                            <i class="icon-user text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback has-feedback-left">
                                        <input type="text" class="form-control" placeholder="Last Name" name="lname">
                                        <div class="form-control-feedback">
                                            <i class="icon-user text-muted"></i>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback has-feedback-left">
                                        <input type="text" class="form-control" placeholder="Contact" name="contact">
                                        <div class="form-control-feedback">
                                            <i class="icon-phone text-muted"></i>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn bg-teal btn-block btn-lg">Register <i class="icon-circle-right2 position-right"></i></button>
                                    <div class="content-divider text-muted form-group"><span>Already Have An Account?</span></div>
                                    <a href="index.php?job_id=<?php echo $id; ?>" class="btn btn-default btn-block content-group">Log in</a>
                                </div>
                            </form>
                            <!-- /advanced login -->
                        </div>
                    </div>
                    <?php }else{ ?>
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Daily financials -->
                                Some thing will be here
                                <!-- /daily financials -->
                            </div>
                            <div class="col-md-6">
                                <!-- Advanced login -->
                                <form method="post">
                                    <input type="hidden" value="" name="job_id" />
                                    <div class="panel panel-body login-form">
                                        <div class="text-center">
                                            <div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
                                            <h5 class="content-group">Create account <small class="display-block">All fields are required</small></h5>
                                        </div>

                                        <div class="content-divider text-muted form-group"><span>Log in credentials</span></div>

                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="text" class="form-control" placeholder="E-mail" name="email">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-check text-muted"></i>
                                            </div>
                                        </div>

                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="password" class="form-control" placeholder="Create password" name="pword">
                                            <div class="form-control-feedback">
                                                <i class="icon-user-lock text-muted"></i>
                                            </div>
                                        </div>

                                        <div class="content-divider text-muted form-group"><span>Other Details</span></div>

                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="text" class="form-control" placeholder="First Name" name="fname">
                                            <div class="form-control-feedback">
                                                <i class="icon-user text-muted"></i>
                                            </div>
                                        </div>

                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="text" class="form-control" placeholder="Last Name" name="lname">
                                            <div class="form-control-feedback">
                                                <i class="icon-user text-muted"></i>
                                            </div>
                                        </div>

                                        <div class="form-group has-feedback has-feedback-left">
                                            <input type="text" class="form-control" placeholder="Contact" name="contact">
                                            <div class="form-control-feedback">
                                                <i class="icon-phone text-muted"></i>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn bg-teal btn-block btn-lg">Register <i class="icon-circle-right2 position-right"></i></button>
                                        <div class="content-divider text-muted form-group"><span>Already Have An Account?</span></div>
                                        <a href="index.php" class="btn btn-default btn-block content-group">Log in</a>
                                    </div>
                                </form>
                                <!-- /advanced login -->
                            </div>
                        </div>
                    <?php } ?>
					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
					</div>
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
