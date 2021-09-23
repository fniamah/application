<?php
include("../connection/conn.php");
if(!isset($_SESSION['userid'])){
    header ("location: index.php");
    exit(0);
}
else {
    $stfID = $_SESSION['userid'];
    $sel="SELECT fname, lname, img, program FROM students WHERE stdid='$stfID'";
    $selrun=$conn->query($dbcon,$sel);
    $seldata=$conn->fetch($selrun);

    $fname = $seldata['fname'];
    $lname = $seldata['lname'];
    $img = $seldata['img'];
    $program = $seldata['program'];

    $cname="SCHOOL NAME";
    $clogo="assets/images/defaults/noimage.jpg";
    $ccont="";
    $cmail="";
    $cloc="";
    $caddr="";
    $ctag="";
    //GET THE SCHOOL INFORMATION / DETAILS
    $getcomp = "SELECT * FROM company";
    $getcomprun = $conn->query($dbcon,$getcomp);
    if($conn->sqlnum($getcomprun) != 0){
        $getcompdata = $conn->fetch($getcomprun);
        $cname = $getcompdata['cname'];
        $clogo = $getcompdata['clogo'];
        $ccont = $getcompdata['ccont'];
        $cmail = $getcompdata['cmail'];
        $cloc = $getcompdata['cloc'];
        $caddr = $getcompdata['caddr'];
        $ctag = $getcompdata['tag'];
    }
    $authentic="";
    $msg="";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>MHC | Students Portal</title>

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
	<script type="text/javascript" src="assets/js/plugins/ui/prism.min.js"></script>
	
	<script type="text/javascript" src="assets/js/core/app.js"></script>
    <script type="text/javascript" src="assets/js/pages/layout_fixed_custom.js"></script>
    <!-- Theme JS files -->
    <script type="text/javascript" src="assets/js/plugins/forms/wizards/stepy.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>

    <script type="text/javascript" src="assets/js/core/app.js"></script>
    <script type="text/javascript" src="assets/js/pages/wizard_stepy.js"></script>
    <!-- /theme JS files -->
	<!-- /theme JS files -->
    <style type="text/css">
        .panel-title{
            color: #09933e;
        }
    </style>

</head>

<body>

	<!-- Main navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
            <a class="navbar-brand" data-toggle="modal" data-target="#map"><img src="assets/images/logo_light.png" alt=""></a>

            <ul class="nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-git-compare"></i>
                        <span class="visible-xs-inline-block position-right">Your Activities</span>
                        <span class="badge bg-success-400" id="activityCount"></span>
                    </a>

                    <div class="dropdown-menu dropdown-content">
                        <div class="dropdown-content-heading">
                            My Activities
                        </div>

                        <ul class="media-list dropdown-content-body width-350" id="activityalert">

                        </ul>

                        <div class="dropdown-content-footer">

                        </div>
                    </div>
                </li>
            </ul>

            <p class="navbar-text"><span class="label bg-success-400">Online</span></p>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown language-switch">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/images/flags/gh.png" class="position-left" alt="">
                        English
                    </a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon-bubbles4"></i>
                        <span class="visible-xs-inline-block position-right">Memo</span>
                        <span class="badge bg-warning-400" id="memoCount"></span>
                    </a>

                    <div class="dropdown-menu dropdown-content width-350">
                        <div class="dropdown-content-heading">
                            Memo
                            <ul class="icons-list">
                                <li><a data-toggle="modal" data-target="#announcer"><i class="icon-compose"></i></a></li>
                            </ul>
                        </div>

                        <ul class="media-list dropdown-content-body" id="memomsg"></ul>

                        <div class="dropdown-content-footer">
                            <!--<a href="#" data-popup="tooltip" title="All messages"><i class="icon-menu display-block"></i></a>-->
                        </div>
                    </div>
                </li>

                <li class="dropdown dropdown-user">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo $img; ?>" alt="">
                        <span><?php echo $fname." ".$lname; ?></span>
                        <i class="caret"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li><a href="dashboard.php?account_det"><i class="icon-cog5"></i> Account settings</a></li>
                        <li><a href="#" onclick="logout()"><i class="icon-switch2"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
	<!-- /main navbar -->


	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
            <div class="sidebar sidebar-main sidebar-fixed">
                <div class="sidebar-content">

                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-content no-padding">
                            <ul class="navigation navigation-main navigation-accordion">

                                <!-- Main -->
                                <li><div align="center"><img src="../<?php echo $clogo; ?>" class="img-responsive img-rounded" style="width: 150px; height: 150px;"/></div> </li>
                                <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                                <li><a href="dashboard.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
                                    <li>
                                        <a href="#"><i class="icon-piggy-bank"></i> <span>Bank Deposits</span></a>
                                        <ul>
                                            <li><a href="dashboard.php?bank_deposits">Deposits</a></li>
                                            <li><a data-toggle="modal" data-target="#bankreport">Report</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-pen6"></i> <span>Examination Management</span></a>
                                        <ul>
                                            <li><a data-toggle="modal" data-target="#examqxtns">Exams Questions</a></li>
                                            <li><a data-toggle="modal" data-target="#examcourses">Students</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-cash3"></i> <span>Fees Management</span></a>
                                        <ul>
                                            <li><a href="dashboard.php?students_invoices" id="layout1">Invoices</a></li>
                                            <li>
                                                <a href="#"><span>Reports</span></a>
                                                <ul>

                                                    <li><a data-toggle="modal" data-target="#generalfeesreport">Payment Report </a></li>
                                                    <li><a href="dashboard.php?students_arrears">Arrears Report</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-user-check"></i> <span>Field / Internship</span></a>
                                        <ul>
                                            <li><a href="dashboard.php?facilities" id="layout1">Facilities</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-home9"></i> <span>Hostel Management</span></a>
                                        <ul>
                                            <li><a href="dashboard.php?occupants">Invoices</a></li>
                                            <li>
                                                <a href="#"><span>Reports</span></a>
                                                <ul>

                                                    <li><a data-toggle="modal" data-target="#generalhostelreport">Payment Report </a></li>
                                                    <li><a href="dashboard.php?hostel_arrears">Arrears Report</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-cash2"></i> <span>Payment Vouchers</span></a>
                                        <ul>

                                            <li><a href="dashboard.php?pvcreate">Generate</a></li>
                                            <?php if($pv =="Director"){ ?><li><a href="dashboard.php?pending_pvs">Pending Payment Vouchers</a></li><?php } ?>
                                            <li><a href="dashboard.php?previouspvs">Previous Approvals</a></li>
                                            <li>
                                                <a href="#"><span>Reports</span></a>
                                                <ul>

                                                    <li><a data-toggle="modal" data-target="#generalpvreport">General
                                                            Report </a></li>
                                                    <li><a data-toggle="modal" data-target="#companypvreport">Department
                                                            Report</a></li>
                                                    <li><a data-toggle="modal" data-target="#bankpvreport">Bank
                                                            Report</a></li>
                                                    <li><a data-toggle="modal" data-target="#categorypvreport">Expense
                                                            Category Report</a></li>
                                                    <li><a data-toggle="modal" data-target="#typepvreport">PV Type
                                                            Report</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-user-check"></i> <span>Staff Management</span></a>
                                        <ul>
                                            <li><a href="dashboard.php?staff_data" id="layout1">Staff</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-cash3"></i> <span>Staff Payroll</span></a>
                                        <ul>
                                            <li><a href="dashboard.php?mypayslips">My Payslips</a></li>
                                            <?php if($payroll =="Administrator"){ ?><li><a data-toggle="modal" data-target="#staffpaystruct">Staff Structure</a></li>
                                                <li><a href="dashboard.php?generateslip" id="layout1">Generate Payslip</a></li><?php } ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-user"></i> <span>Students Management</span></a>
                                        <ul>
                                            <li><a  data-toggle="modal" data-target="#studentreg">Register Student</a></li>
                                            <li><a href="dashboard.php?students_data" id="layout1">Active Students</a></li>
                                            <li><a href="dashboard.php?graduate_students" id="layout1">Graduate Students</a></li>
                                            <li><a href="dashboard.php?students_data_pending" id="layout1">Pending Students</a></li>
                                            <li>
                                                <a href="#"><span>Reports</span></a>
                                                <ul>

                                                    <li><a data-toggle="modal" data-target="#programreport">Program Report </a></li>
                                                    <li><a data-toggle="modal" data-target="#batchreport">Batch Report</a></li>
                                                    <li><a data-toggle="modal" data-target="#classreport">Class Session Report</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-cog52"></i> <span>Configuration</span></a>
                                        <ul>
                                            <li>
                                                <a href="#">Payment Voucher</a>
                                                <ul>
                                                    <li><a href="dashboard.php?banks">Banks</a></li>
                                                    <li><a href="dashboard.php?exchange_rate">Exchange Rates</a></li>
                                                    <li><a href="dashboard.php?expense_cls">Expense Classifications</a></li>
                                                    <li><a href="dashboard.php?pvtypes">Expense Types Types</a></li>
                                                    <li><a href="dashboard.php?taxes">Taxes</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Payroll</a>
                                                <ul>
                                                    <li><a href="dashboard.php?salary_rules">Salary Rules</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">School</a>
                                                <ul>
                                                    <li><a data-toggle="modal" href="#company" onclick="getcompany()">Company Details</a></li>
                                                    <li><a href="dashboard.php?courses">Courses</a></li>
                                                    <li><a href="dashboard.php?departments">Departments</a></li>
                                                    <li><a href="dashboard.php?subjects">Subjects</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Students</a>
                                                <ul>
                                                    <li><a href="dashboard.php?student_batch">Batches</a></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <a href="#">Staff</a>
                                                <ul>
                                                    <li><a href="dashboard.php?positions"">Positions</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-cogs"></i> <span>System</span></a>
                                        <ul>
                                            <li><a onclick="makebackup()">BackUp Database</a></li>
                                        </ul>
                                    </li>
                                <!-- /page kits -->

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
			<!-- /main sidebar -->


			<!-- Main content -->
			<div class="content-wrapper">
                <?php if(isset($_GET['apttest'])){
                    $chk="SELECT * FROM career_app WHERE email='$stfID' AND status='Accepted'";
                    $chkrun=$conn->query($dbcon,$chk);
                    if($conn->sqlnum($chkrun) == 0){
                        $chkdata=$conn->fetch($chkrun);
                        $mjobid=$chkdata['job_id'];
                        ?>
                        <!-- Page header -->
                        <div class="page-header">
                            <div class="page-header-content">
                                <div class="page-title">
                                    <h4 style="text-align: center"><span class="text-semibold">Time: </span> <span style="font-weight: bold; font-size: xx-large; color: #09933e" id="timedisp">01:00:00</span></h4>
                                </div>

                                <div class="heading-elements">
                                    <div class="heading-btn-group">
                                        <a href="#" onclick="startTest(<?php echo $mjobid; ?>,'<?php echo $stfID ?>')" class="btn btn-lg btn-success" id="startbtn"></i><span>START</span></a>
                                        <a href="dashboard.php?test_result&applicant=<?php echo $stfID ?>&jobid=<?php echo $mjobid ?>" class="btn btn-lg btn-danger hidden" id="endbtn" onclick="endTest()"></i> <span>END</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /page header -->


                        <!-- Content area -->
                        <div class="content" id="testcontent">
                            <!-- Clickable title -->
                            <div class="panel panel-white" id="apptest">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Aptitude Test Questions</h6>
                                </div>
                                <form class="stepy-clickable" action="#">
                                    <?php
                                    $selqxtn="SELECT * FROM career_test WHERE email='$stfID' AND check_stat !='Done' ORDER BY RAND()";
                                    $selqxtnrun=$conn->query($dbcon,$selqxtn);
                                    $count=0;
                                    while($data=$conn->fetch($selqxtnrun)){
                                        $count++;
                                        $qxtnid=$data['qxtnid'];
                                        $jobid=$data['job_id'];

                                        $rbtn=$stfID."*".$qxtnid."*".$jobid;
                                        //GET THE QUESTION
                                        $get="SELECT * FROM exam_qxtns";
                                        $getrun=$conn->query($dbcon,$get);
                                        $getData=$conn->fetch($getrun);
                                        ?>
                                        <fieldset title="<?php echo $count; ?>">
                                            <legend class="text-semibold"></legend>
                                            <div class="row">
                                                <div class="col-md-6" align="right">
                                                    <div class="row">
                                                        <?php if(!empty($getData['imgurl'])){?>
                                                            <div class="col-md-12">
                                                                <img src="../hwemudua/<?php echo $getData['imgurl']; ?>" class="img-responsive" width="50%"/>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="col-md-12">
                                                            <?php echo $getData['qxtn']; ?>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-md-6" align="left">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="group<?php echo $count; ?>" id="<?php echo $data['opta']; ?>" value="<?php echo $rbtn.'*A'; ?>" onclick="checkAnswer(this.value)">
                                                                <label class="custom-control-label" for="<?php echo $getData['opta']; ?>">A)  <?php echo $getData['opta']; ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="group<?php echo $count; ?>" id="<?php echo $data['optb']; ?>" value="<?php echo $rbtn.'*B'; ?>" onclick="checkAnswer(this.value)">
                                                                <label class="custom-control-label" for="<?php echo $getData['optb']; ?>">B)  <?php echo $getData['optb']; ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="group<?php echo $count; ?>" id="<?php echo $data['optc']; ?>" value="<?php echo $rbtn.'*C'; ?>"  onclick="checkAnswer(this.value)">
                                                                <label class="custom-control-label" for="<?php echo $getData['optc']; ?>">C)  <?php echo $getData['optc']; ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="custom-control custom-radio">
                                                                <input type="radio" class="custom-control-input" name="group<?php echo $count; ?>" id="<?php echo $data['optd']; ?>" value="<?php echo $rbtn.'*D'; ?>" onclick="checkAnswer(this.value)">
                                                                <label class="custom-control-label" for="<?php echo $getData['optd']; ?>">D)  <?php echo $getData['optd']; ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </fieldset>
                                    <?php } ?>
                                    <button class="btn btn-primary stepy-finish" disabled>Finish <i class="icon-check position-right"></i></button>
                                </form>
                            </div>
                            <!-- /clickable title -->
                            <!-- GENERAL INFORMATION TO APPLICANT -->
                            <div class="panel panel-white" id="generalinfo">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Aptitude Test Questions</h6>
                                </div>
                                <div class="panel-body">
                                    This is the panel bosy that will contain the instructions
                                </div>

                            </div>
                        </div>
                        <div class="content hidden" id="endtestcontent">
                            <div class="panel panel-white" id="generalinfo">
                                <div class="panel-heading">
                                    <h6 class="panel-title">End Of Test</h6>
                                </div>
                                
                                <div class="panel-body">
                                    <p style="color: #09933e; font-size: large; font-weight: bold; text-align: center">Thank you for taking this aptitude test. <br>Your Performance will be reviewed by the Human Resource Department
                                        and response sent to you.
                                        <br><i>You can view the result of your test by clicking the link below</i></p>
                                </div>

                            </div>
                            <div align="center"><a href="dashboard.php?test_result&applicant=<?php echo $stfID ?>&jobid=<?php echo $mjobid ?>" class="btn btn-lg btn-danger"></i> <span>VIEW TEST RESULT</span></a></div>
                        </div>
                    <?php }else{ ?>
                        <div class="panel panel-white" id="generalinfo">
                            <div class="panel-heading">
                                <h6 class="panel-title">APTITUDE TEST NOT READY</h6>
                            </div>
                            <div class="panel-body">
                                You Have No Pending Aptitude Test to undertake.<br>
                                If you have already applied for a job, then it is awaiting
                                the approval of the human resource department.<br> You will be notified via SMS on te contact you supplied during
                                your registration on the status of your application.<br>
                                If you are seeing this, then it also means that your application has not been approved.
                            </div>

                        </div>
                        <!-- /content area -->
                    <?php }}elseif (isset($_GET['account_det'])) { ?>
                    <!-- Main content -->
                        <!-- Page header -->
                        <div class="page-header" style="margin-top: 2%;">
                            <div class="page-header-content">
                                <div class="page-title">
                                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">User</span>
                                        - Account Details</h4>
                                </div>
                            </div>
                        </div>
                        <!-- /page header -->


                        <!-- Cover area -->
                        <div class="profile-cover">
                            <div class="profile-cover-img" style="background-image: url(<?php echo '../'.$clogo; ?>)"></div>
                            <div class="media">
                                <div class="media-left">
                                    <a href="#" class="profile-thumb">
                                        <img src="../<?php echo $img; ?>" alt="" class="img-circle img-responsive">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h1 style="color: #852B30; font-weight: bold;"><?php echo $fname . " " . $lname; ?>
                                        <small class="display-block" style="color: #06112C"><?php echo getCourse($program); ?></small>
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <!-- /cover area -->


                        <!-- Toolbar -->
                        <div class="navbar navbar-default navbar-xs content-group">
                            <ul class="nav navbar-nav visible-xs-block">
                                <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i
                                                class="icon-menu7"></i></a></li>
                            </ul>

                            <div class="navbar-collapse collapse" id="navbar-filter">
                                <ul class="nav navbar-nav element-active-slate-400">
                                    <li class="active"><a href="#settings" data-toggle="tab"><i
                                                    class="icon-menu7 position-left"></i> Account Settings</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- /toolbar -->


                        <!-- Content area -->
                        <div class="content">

                            <!-- User profile -->
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="tabbable">
                                        <div class="tab-content">

                                            <div class="tab-pane fade in active" id="settings">
                                                <div class="panel panel-flat">
                                                    <div class="panel-heading">
                                                        <h6 class="panel-title">Account settings</h6>
                                                    </div>

                                                    <div class="panel-body">
                                                        <form method="post">
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Username</label>
                                                                        <input type="text" value="<?php echo $stfID; ?>"
                                                                               readonly="readonly" class="form-control"
                                                                               name="chvoka">
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-11">
                                                                                <label>New password</label>
                                                                                <input type="password" class="form-control"
                                                                                       name="newPass" onkeyup="checkpass()"
                                                                                       id="npass">
                                                                            </div>
                                                                            <div class="col-md-1 hidden" align="left"
                                                                                 id="npassimg"><label>&nbsp;</label><img
                                                                                        src="assets/images/success.jpg"
                                                                                        width="20px"/></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label>Current password</label>
                                                                        <input type="password" placeholder="Enter new password"  class="form-control" name="currPass">
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="row">
                                                                            <div class="col-md-11">
                                                                                <label>Repeat password</label>
                                                                                <input type="password" class="form-control" name="repPass" id="rpass" onkeyup="confpass()">
                                                                            </div>
                                                                            <div class="col-md-1 hidden" align="left"
                                                                                 id="rpassimg"><label>&nbsp;</label><img
                                                                                        src="assets/images/success.jpg"
                                                                                        width="20px"/></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="text-right hidden" id="chsub">
                                                                <button type="submit" class="btn btn-primary">Update Password <i
                                                                            class="icon-arrow-right14 position-right"></i>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- /account settings -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /content area -->
                    <!-- /main content -->
                <?php }else { ?>
                    <!-- Page header -->
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="page-title">
                                <div class="row" style="padding-top: 2%">
                                    <div class="col-md-3">
                                        <h3> Dashboard</h3>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="breadcrumb-line">

                        </div>
                    </div>
                    <!-- /page header -->


                    <!-- Content area -->
                    <div class="content">
                        <!-- MORAL VALUES -->
                        <!-- Main charts -->
                        <div class="row">
                            <div class="col-lg-6">

                                <!-- Traffic sources -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">&nbsp;</h6>
                                    </div>

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <ul class="list-inline text-center">
                                                    <li>
                                                        <a class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-users2"></i></a>
                                                    </li>
                                                    <li class="text-left">
                                                        <div class="text-bold">TOTAL STUDENTS</div>
                                                        <div style="text-align: center; font-weight: bolder; font-size: xx-large; color: #852B30;"><?php
                                                            $selpre = "SELECT stdid FROM students WHERE status='Active'";
                                                            $selrunpre = $conn->query($dbcon, $selpre);
                                                            echo $conn->sqlnum($selrunpre);
                                                            ?></div>
                                                    </li>
                                                </ul>

                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="content-group" id="new-visitors"></div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <ul class="list-inline text-center">
                                                    <li>
                                                        <a class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-user-tie"></i></a>
                                                    </li>
                                                    <li class="text-left">
                                                        <div class="text-bold">TOTAL STAFF</div>
                                                        <div style="text-align: center; font-weight: bolder; font-size: xx-large; color: #852B30;"><?php
                                                            $selpre = "SELECT stfid FROM staff WHERE status='Active'";
                                                            $selrunpre = $conn->query($dbcon, $selpre);
                                                            echo $conn->sqlnum($selrunpre);
                                                            ?></div>
                                                    </li>
                                                </ul>

                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="content-group"
                                                         id="new-visitors"></div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <ul class="list-inline text-center">
                                                    <li>
                                                        <a class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-office"></i></a>
                                                    </li>
                                                    <li class="text-left">
                                                        <div class="text-bold">BANK ACCOUNTS</div>
                                                        <div style="text-align: center; font-weight: bolder; font-size: xx-large; color: #852B30;"><?php
                                                            $selpre = "SELECT bankcode FROM banks WHERE status='Active'";
                                                            $selrunpre = $conn->query($dbcon, $selpre);
                                                            echo $conn->sqlnum($selrunpre);
                                                            ?></div>
                                                    </li>
                                                </ul>

                                                <div class="col-lg-10 col-lg-offset-1">
                                                    <div class="content-group"
                                                         id="new-visitors"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /traffic sources -->
                            </div>
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-lg-6">

                                        <!-- Members online -->
                                        <div class="panel bg-teal-400">
                                            <div class="panel-body">
                                                <div class="heading-elements">
                                                    <span class="heading-text badge bg-teal-800 icon icon-cash"></span>
                                                </div>

                                                <h3 class="no-margin" style="color: #FFF; font-weight: bold;">
                                                    GH&cent; <?php
                                                    $selfee = "SELECT SUM((totalamount-paid)) AS arrears FROM student_invoices WHERE status='Pending'";
                                                    $selfeerun = $conn->query($dbcon,$selfee);
                                                    $selfeedata = $conn->fetch($selfeerun);
                                                    echo number_format($selfeedata['arrears'], 2);

                                                    ?>
                                                </h3>
                                                FEES ARREARS
                                                <div class="text-muted text-size-small">
                                                    &nbsp;
                                                </div>
                                            </div>

                                            <div class="container-fluid">
                                                <div id="members-online"></div>
                                            </div>
                                        </div>
                                        <!-- /members online -->

                                    </div>

                                    <div class="col-lg-6">

                                        <!-- Members online -->
                                        <div class="panel bg-pink-700">
                                            <div class="panel-body">
                                                <div class="heading-elements">
                                                    <span class="heading-text badge bg-teal-800 icon icon-cash"></span>
                                                </div>

                                                <h3 class="no-margin" style="color: #FFF; font-weight: bold;">
                                                    GH&cent; <?php
                                                    $selfee = "SELECT SUM((totalamount-paid)) AS arrears FROM hostel_invoices WHERE status='Pending'";
                                                    $selfeerun = $conn->query($dbcon,$selfee);
                                                    $selfeedata = $conn->fetch($selfeerun);
                                                    echo number_format($selfeedata['arrears'], 2);

                                                    ?>
                                                </h3>
                                                HOSTEL ARREARS
                                                <div class="text-muted text-size-small">
                                                    &nbsp;
                                                </div>
                                            </div>

                                            <div class="container-fluid">
                                                <div id="members-online"></div>
                                            </div>
                                        </div>
                                        <!-- /members online -->

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <!-- Marketing campaigns -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <div style="font-weight: bold; font-size: large; color: #06112C">Course Fees Summary Report </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Total Fees</th>
                                                <th>Total Paid</th>
                                                <th>Arrears</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $get = "SELECT SUM(totalamount) AS totalamount, SUM(paid) AS totalpaid, SUM(totalamount - paid) AS totalarrears FROM student_invoices";
                                            $getrun = $conn->query($dbcon, $get);
                                            while ($data = $conn->fetch($getrun)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo number_format($data['totalamount'],2); ?></td>
                                                    <td><?php echo number_format($data['totalpaid'],2); ?></td>
                                                    <td><?php echo number_format($data['totalarrears'],2); ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <!-- Marketing campaigns -->
                                <!-- /marketing campaigns -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <div style="font-weight: bold; font-size: large; color: #06112C">Hostel Fees Summary Report </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Total Fees</th>
                                                <th>Total Paid</th>
                                                <th>Arrears</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $get = "SELECT SUM(totalamount) AS totalamount, SUM(paid) AS totalpaid, SUM(totalamount - paid) AS totalarrears FROM hostel_invoices";
                                            $getrun = $conn->query($dbcon, $get);
                                            while ($data = $conn->fetch($getrun)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo number_format($data['totalamount'],2); ?></td>
                                                    <td><?php echo number_format($data['totalpaid'],2); ?></td>
                                                    <td><?php echo number_format($data['totalarrears'],2); ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /content area -->
                <?php } ?>
			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
    <script type="text/javascript">
        var x;
        function startTest(id,email){
            //console.log(id+email);
            $("#apptest").removeClass("hidden");
            $("#endbtn").removeClass("hidden");
            $("#generalinfo").addClass("hidden");
            $("#startbtn").addClass("hidden");
            $.ajax({
                type:"post",
                url:"ajax/api.php",
                data:"startTest="+email+"&jobid="+id,
                success:function(data){
                    //console.log(data);
                },
                error:function(xhr, desc, err)
                {
                }
            });
            x = setInterval(function(){countDown();}, 1000);
        }

       // var timer=3600;
        var timer=3600;
        function countDown(){
            timer = (timer -1);
            if(timer <=600){
                document.getElementById("timedisp").style.color='#F00';
            }
            if(timer==0){
                clearInterval(x);
                $("#endtestcontent").removeClass('hidden');
                $("#testcontent").addClass('hidden');
            }

            var minutes = Math.floor(timer / 60);
            var seconds = timer - minutes * 60;
            var hours = Math.floor(timer / 3600);
            document.getElementById("timedisp").innerHTML=hours+":"+minutes+":"+seconds;
        }
    function checkAnswer(id) {
        $.ajax({
            type:"post",
            url:"ajax/api.php",
            data:"testAnswered="+id,
            success:function(data){
                //console.log(data);
            },
            error:function(xhr, desc, err)
            {

            }
        });
    }

    function endTest(){
        $.ajax({
            type:"post",
            url:"ajax/api.php",
            data:"testAnswered="+id,
            success:function(data){
                //console.log(data);
            },
            error:function(xhr, desc, err)
            {

            }
        });
    }

        //PDF CHECK
        var _validFile = [".pdf"];
        function checkpdf(oForm) {
            var arrInputs = oForm.getElementsByTagName("input");
            for (var i = 0; i < arrInputs.length; i++) {
                var oInput = arrInputs[i];
                if (oInput.type == "file") {
                    var sFileName = oInput.value;
                    if (sFileName.length > 0) {
                        var blnValid = false;
                        for (var j = 0; j < _validFile.length; j++) {
                            var sCurExtension = _validFile[j];
                            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                blnValid = true;
                                break;
                            }
                        }

                        if (!blnValid) {
                            alert("The file you have uploaded is not a valid pdf file");
                            return false;
                        }
                    }
                }
            }


            return true;
        }
        ///PDF CHECK
        function generalfileSize(id) {
            var did=id;
            //console.log(did);
            var fi = document.getElementById(did); // GET THE FILE INPUT.
            // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
            if (fi.files.length > 0) {
                // RUN A LOOP TO CHECK EACH SELECTED FILE.
                for (var i = 0; i <= fi.files.length - 1; i++) {

                    var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
                    var dsize=(fsize / 1024000);//Size in MB
                    if(dsize > 1){
                        document.getElementById(did).value="";
                        document.getElementById("uplresp").innerHTML="File is too large";
                    }
                    else{
                        document.getElementById("uplresp").innerHTML="File Size Acceptable";
                    }
                }
            }
        }
    </script>
</body>
</html>
