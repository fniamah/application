<?php
include("connection/conn.php");
if (!isset($_SESSION['userid'])) {
    header("location: index.php");
    exit(0);
} else {
    $stfID = $_SESSION['userid'];
    //SELECT STAFF DETAILS
    $sel="SELECT * FROM staff WHERE stfid='$stfID'";
    $selrun=$conn->query($dbcon,$sel);
    $seldata = $conn->fetch($selrun);
    $fname = $seldata['fname'];
    $lname = $seldata['lname'];
    $img = $seldata['img'];
    $access = $_SESSION['access'];
    $stposition = $seldata['post'];
    $stbank = $seldata['bank'];
    $exams = $seldata['exams'];
    $fees = $seldata['fees'];
    $internship = $seldata['internship'];
    $hostel = $seldata['hostel'];
    $pv = $seldata['pv'];
    $staff = $seldata['stfmgt'];
    $payroll = $seldata['payroll'];
    $student = $seldata['stdmgt'];
    $configs = $seldata['configs'];

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


}

//GET THE CURRENT URL PAGE
$URL = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
//UPDATE THE LOG IN
$updtime = "UPDATE users SET last_login = '$dateTime', last_page = '$URL' WHERE userid = '$stfID'";
$conn->query($dbcon,$updtime);

include("includes/process.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title>MEDNET HEALTH COLLEGE | HOMEPAGE</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
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
    <script type="text/javascript" src="assets/js/plugins/visualization/d3/d3.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/styling/switchery.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
    <script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>
    <script type="text/javascript" src="assets/js/plugins/ui/nicescroll.min.js"></script>

    <script type="text/javascript" src="assets/js/plugins/media/fancybox.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>

    <script type="text/javascript" src="assets/js/pages/gallery_library.js"></script>

    <script type="text/javascript" src="assets/js/core/app.js"></script>
    <script type="text/javascript" src="assets/js/pages/dashboard.js"></script>
    <script type="text/javascript" src="assets/js/pages/layout_fixed_custom.js"></script>

    <script type="text/javascript" src="assets/js/core/app.js"></script>
    <script type="text/javascript" src="assets/js/pages/wizard_stepy.js"></script>

    <!-- /theme JS files -->
    <!-- CK EDITOR-->
    <script src="https://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css"/>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <style>

        .first {
            color: #852B30;
            font-size: x-small;
            font-weight: bold;
        }

        th {
            color: #852B30;
            font-weight: bold;
            text-align: left;
        }

        input[type="checkbox"][readonly] {
            pointer-events: none;
        }

        .second {
            font-size: x-small;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #ptable * {
                visibility: visible;
            }

            #ptable {
                position: absolute;
                width: 100%;
                font-size: small;
                left: 0;
                top: -2%;
            }
        }
        .maincolor, .text-semibold, .modal-title, h1, h2, h3, h4, h5, h6, label, .icon-chk {
            color: #852B30;
        }
        .text-muted{
            color: #06112C;
        }

    </style>
</head>

<body class="navbar-top" onload="displaymodal()">
<input type="hidden" value="<?php echo $test; ?>" id="test"/>
<input type="hidden" value="<?php echo $msg; ?>" id="ddmsg"/>
<input type="hidden" value="<?php echo $stfID; ?>" id="notifyid"/>
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

                <!-- User menu -->
                <!--<div class="sidebar-user">
                    <div class="category-content">
                        <div class="media">
                            <a href="#" class="media-left"><img src="assets/images/logo.jpg" class="img-circle img-sm" alt=""></a>
                            <div class="media-body">
                                <span class="media-heading text-semibold">Victoria Baker</span>
                                <div class="text-size-mini text-muted">
                                    <i class="icon-pin text-size-small"></i> &nbsp;Santa Ana, CA
                                </div>
                            </div>

                            <div class="media-right media-middle">
                                <ul class="icons-list">
                                    <li>
                                        <a href="#"><i class="icon-cog3"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>-->
                <!-- /user menu -->


                <!-- Main navigation -->
                <?php include("includes/sidemenu.php") ?>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->

        <?php
        if (isset($_GET['students_data'])){
            $selstf = "SELECT * FROM students WHERE status = 'Active' ORDER BY fname ASC";
            $selstfrun = $conn->query($dbcon,$selstf);

            $selstf2 = "SELECT fname FROM students WHERE status <> 'Pending'";
            $selstfrun2 = $conn->query($dbcon,$selstf2);

            $selstf3 = "SELECT fname FROM students WHERE status = 'Graduated'";
            $selstfrun3 = $conn->query($dbcon,$selstf3);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users position-left"></i>Students Record</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-users"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Students</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun2); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-visitors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-user-check"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Active Students</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-sessions"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-graduation2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Graduated Students</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun3); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Students Management</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Students</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#studentreg"><i class="icon-add-to-list position-left"></i> Add New Student</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table media-library table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <!--<th>Image</th>-->
                                                    <th>Student ID</th>
                                                    <th>Name</th>
                                                    <th>Gender</th>
                                                    <th>Program</th>
                                                    <th>Batch</th>
                                                    <th>Contact</th>
                                                    <th>Class Session</th>
                                                    <th>Residential Status</th>
                                                    <th>Year</th>
                                                    <th>Admission Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                while($data = $conn->fetch($selstfrun)){
                                                    $sid = $data['stdid'];
                                            ?>
                                                <tr>
                                                    <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                                    <td><a href="dashboard.php?student_details=<?php echo $sid; ?>"><?php echo $data['stdid']; ?></a></td>
                                                    <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                                    <td><?php echo $data['sex']; ?></td>
                                                    <td><?php echo getCourse($data['program']); ?></td>
                                                    <td><?php echo getBatch($data['batchno']); ?></td>
                                                    <td><?php echo $data['contact']; ?></td>
                                                    <td><?php echo $data['stsession']; ?></td>
                                                    <td><?php echo $data['stres']; ?></td>
                                                    <td><?php echo $data['styr']; ?></td>
                                                    <td><?php echo $data['admitdate']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['graduate_students'])){
            $selstf = "SELECT * FROM students WHERE status = 'Graduated' ORDER BY fname ASC";
            $selstfrun = $conn->query($dbcon,$selstf);

            $selstf2 = "SELECT fname FROM students WHERE status <> 'Pending'";
            $selstfrun2 = $conn->query($dbcon,$selstf2);

            $selstf3 = "SELECT fname FROM students WHERE status = 'Graduated'";
            $selstfrun3 = $conn->query($dbcon,$selstf3);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users position-left"></i>Students Record</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-users"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Students</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun2); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-visitors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-user-check"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Active Students</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-sessions"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-graduation2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Graduated Students</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun3); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Students Management</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Students</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#studentreg"><i class="icon-add-to-list position-left"></i> Add New Student</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table media-library table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <!--<th>Image</th>-->
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Program</th>
                                                <th>Batch</th>
                                                <th>Contact</th>
                                                <th>Class Session</th>
                                                <th>Residential Status</th>
                                                <th>Year</th>
                                                <th>Admission Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($data = $conn->fetch($selstfrun)){
                                                $sid = $data['stdid'];
                                                ?>
                                                <tr>
                                                    <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                                    <td><a href="dashboard.php?student_details=<?php echo $sid; ?>"><?php echo $data['stdid']; ?></a></td>
                                                    <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                                    <td><?php echo $data['sex']; ?></td>
                                                    <td><?php echo getCourse($data['program']); ?></td>
                                                    <td><?php echo getBatch($data['batchno']); ?></td>
                                                    <td><?php echo $data['contact']; ?></td>
                                                    <td><?php echo $data['stsession']; ?></td>
                                                    <td><?php echo $data['stres']; ?></td>
                                                    <td><?php echo $data['styr']; ?></td>
                                                    <td><?php echo $data['admitdate']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['students_data_pending'])){
            $selstf = "SELECT * FROM students WHERE status = 'Pending' ORDER BY fname ASC";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users position-left"></i>Pending Students Record</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-users"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Pending Students</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-visitors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Students Management</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Pending Students</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#studentreg"><i class="icon-add-to-list position-left"></i> Add New Student</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table media-library table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <!--<th>Image</th>-->
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Program</th>
                                                <th>Batch</th>
                                                <th>Contact</th>
                                                <th>Class Session</th>
                                                <th>Residential Status</th>
                                                <th>Year</th>
                                                <th>Admission Date</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($data = $conn->fetch($selstfrun)){
                                                $sid = $data['stdid'];
                                                ?>
                                                <tr>
                                                    <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                                    <td><?php echo $data['stdid']; ?></td>
                                                    <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                                    <td><?php echo $data['sex']; ?></td>
                                                    <td><?php echo getCourse($data['program']); ?></td>
                                                    <td><?php echo getBatch($data['batchno']); ?></td>
                                                    <td><?php echo $data['contact']; ?></td>
                                                    <td><?php echo $data['stsession']; ?></td>
                                                    <td><?php echo $data['stres']; ?></td>
                                                    <td><?php echo $data['styr']; ?></td>
                                                    <td><?php echo $data['admitdate']; ?></td>
                                                    <td><a href="dashboard.php?activate_student=<?php echo $data['stdid']; ?>" class="btn btn-sm btn-success"><span class="icon icon-add-to-list"></span>Activate</a></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['batch_details'])){
            $batchno = $_GET['batch_details'];
            $bname = $_GET['bname'];
            $selstf = "SELECT * FROM students WHERE batchno = '$batchno'";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users position-left"></i>BATCH DETAILS</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">New visitors</div>
                                                <div class="text-muted">2,349 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-visitors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">sessions</div>
                                                <div class="text-muted">08:20 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-sessions"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">Total online</div>
                                                <div class="text-muted"><span class="status-mark border-success position-left"></span> 5,378 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li class="maincolor"> <?php echo $bname; ?></li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#studentreg"><i class="icon-add-to-list position-left"></i> Add New Student</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table media-library table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <!--<th>Image</th>-->
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Program</th>
                                                <th>Batch</th>
                                                <th>Contact</th>
                                                <th>Student Type</th>
                                                <th>Residential Status</th>
                                                <th>Level</th>
                                                <th>Admission Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($data = $conn->fetch($selstfrun)){
                                                $sid = $data['stdid'];
                                                ?>
                                                <tr>
                                                    <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                                    <td><a href="dashboard.php?student_details=<?php echo $sid; ?>"><?php echo $data['stdid']; ?></a></td>
                                                    <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                                    <td><?php echo $data['sex']; ?></td>
                                                    <td><?php echo getCourse($data['program']); ?></td>
                                                    <td><?php echo getBatch($data['batchno']); ?></td>
                                                    <td><?php echo $data['contact']; ?></td>
                                                    <td><?php echo $data['sttype']; ?></td>
                                                    <td><?php echo $data['stres']; ?></td>
                                                    <td><?php echo $data['styr']; ?></td>
                                                    <td><?php echo $data['admitdate']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['pvtypes'])){
            $getstf = "SELECT * FROM pvtype ORDER BY name ASC";
            $getstfRun = $conn->query($dbcon, $getstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users position-left"></i>Payment Voucher Types</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-piggy-bank"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total P.V. Types</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($getstfRun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-cog52 position-left"></i> Configuration</li>
                            <li><i class="icon-cash2 position-left"></i> Payment Voucher</li>
                            <li class="maincolor"><i class="icon-piggy-bank position-left"></i> PV Types</li>
                        </ul>
                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pvtype"><i class="icon-add-to-list position-left"></i> Create Payment Voucher</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-lg">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>PV Type</th>
                                                <th>Supervisor Approval</th>
                                                <th>Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            if ($conn->sqlnum($getstfRun) > 0) {
                                                while ($stfdata = $conn->fetch($getstfRun)) {
                                                    $count++;
                                                    $name = $stfdata['name'];
                                                    $status = $stfdata['status'];
                                                    $id = $stfdata['id'];
                                                    $sup = $stfdata['sup'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $name; ?></td>
                                                        <td><?php echo $sup; ?></td>
                                                        <td><?php if ($status == 'Active') { ?><span
                                                                    class="badge bg-success-400">Active</span><?php } else { ?>
                                                                <span class="badge bg-danger-400">Inactive</span><?php } ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <ul class="icons-list">
                                                                <li class="dropdown">
                                                                    <a href="#" class="dropdown-toggle"
                                                                       data-toggle="dropdown">
                                                                        <i class="icon-menu9"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                                        <li>
                                                                            <a onclick="showpvModal('<?php echo $name . '*' . $status . '*' . $id . '*' . $sup; ?>')"
                                                                               data-toggle="modal"
                                                                               data-target="#pvedit"><i
                                                                                        class="icon-pencil7"></i>
                                                                                Edit</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="6">No Records Found</td>
                                                </tr>
                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['stdcourses'])){
            $prog = $_GET['cseprog'];
            $selstf = "SELECT * FROM students WHERE status = 'Active' AND program = '$prog'";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users position-left"></i><?php echo getCourse($prog); ?> STUDENTS</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp; </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Students</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Students Management</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Students</li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-responsive media-library">
                                            <thead>
                                            <tr>
                                                <!--<th>Image</th>-->
                                                <th>#</th>
                                                <th>Student ID</th>
                                                <th>Name</th>
                                                <th>Program</th>
                                                <th>Batch</th>
                                                <th>Contact</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            while($data = $conn->fetch($selstfrun)){
                                                $count++;
                                                $sid = $data['stdid'];
                                                ?>
                                                <tr>
                                                    <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                                    <td><?php echo $count; ?></td>
                                                    <td><a href="dashboard.php?student_details=<?php echo $sid; ?>"><?php echo $data['stdid']; ?></a></td>
                                                    <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                                    <td><?php echo getCourse($data['program']); ?></td>
                                                    <td><?php echo getBatch($data['batchno']); ?></td>
                                                    <td><?php echo $data['contact']; ?></td>
                                                    <td><?php if($exams =="Lecturer"){ ?><a href="dashboard.php?exams_record=<?php echo $data['stdid']; ?>" class="btn btn-success btn-sm"><span class="icon icon-pen6"></span>  Exams Records</a><?php }else{ ?>&nbsp;<?php } ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['exams_record'])){
            $stdid = $_GET['exams_record'];
            $selstf = "SELECT e.id, e.stdid, e.sbjid, e.exam_score, s.fname, s.lname, s.program, s.img, s.contact, s.email FROM std_exams e INNER JOIN students s ON e.stdid = s.stdid WHERE e.stdid = '$stdid' AND e.status = 'Pending'";
            $selstfrun = $conn->query($dbcon,$selstf);
            //$seldata = $conn->fetch($selstfrun);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding: 1%;">

                            <div class="col-md-10 content-group" align="left">
                                <img src="<?php echo $seldata['img']; ?>" class="content-group mt-10 img-rounded" alt="" style="width: 120px;">
                            </div>
                            <div class="col-md-2 content-group" align="left">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $stdid; ?></li>
                                    <!--<li><?php echo getCourse($seldata['program']); ?></li>
                                    <li><?php echo $seldata['contact']; ?></li>
                                    <li><?php echo $seldata['email']; ?></li>-->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <p style="text-align: center; font-weight: bolder; font-size: xx-large"><?php echo $seldata['fname']." ".$seldata['lname']; ?> Examination Records</p>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-responsive table-bordered">
                                            <thead>
                                            <tr>
                                                <!--<th>Image</th>-->
                                                <th>#</th>
                                                <th>Subject</th>
                                                <th>Exams Score</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            $totcls = 0;
                                            $totexams = 0;
                                            $totscore = 0;
                                            while($data = $conn->fetch($selstfrun)){
                                                $count++;
                                                $sid = $data['stdid'];
                                                $sbjid = $data['sbjid'];
                                                $sbj = getSubject($data['sbjid']);
                                                $id = $data['id'];
                                                $totexams+=$data['exam_score'];
                                                ?>
                                                <tr>
                                                    <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo getSubject($data['sbjid']); ?></td>
                                                    <td><?php echo $data['exam_score']; ?></td>
                                                    <!-- CHECK IF STAFF IS AFFILIATED TO SUBJECT -->
                                                    <?php
                                                        $chk = "SELECT id FROM stf_sbj WHERE stfid = '$stfID' AND sbjid = '$sbjid' AND status = 'Active'";
                                                        $chkrun = $conn->query($dbcon, $chk);
                                                        if($conn->sqlnum($chkrun) != 0){
                                                    ?>
                                                    <td><a class="btn btn-sm btn-success" onclick="addExams(<?php echo $id; ?>,'<?php echo $sbj; ?>')"><span class="icon icon-pen6"></span>Update Score</a></td>
                                                    <?php } ?>
                                                </tr>
                                            <?php } ?>
                                                <tr style="background: rgba(232,231,227,0.9); font-weight: bolder; font-size: medium">
                                                    <td>&nbsp;</td>
                                                    <td>Total</td>
                                                    <td><?php echo number_format($totexams,2); ?></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['departments'])){
            $getstf = "SELECT * FROM departments WHERE status ='Active' ORDER BY name ASC";
            $getstfRun = $conn->query($dbcon, $getstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-office position-left"></i>Departments</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-office"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Departments</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($getstfRun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i>Configurations</li>
                            <li><i class="icon-user position-left"></i>School</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Departments</li>
                        </ul>
                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#departments"><i class="icon-add-to-list position-left"></i> Add Department</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-lg">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Manager</th>
                                                <th>Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            while ($stfdata = $conn->fetch($getstfRun)) {
                                                $count++;
                                                $compname = $stfdata['name'];
                                                $sup = $stfdata['stfid'];
                                                $id = $stfdata['id'];
                                                $status = $stfdata['status'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $stfdata['name']; ?></td>
                                                    <td><?php echo checkName($stfdata['stfid']); ?></td>
                                                    <td><?php if ($status == 'Active') { ?><span
                                                                class="badge bg-success-400">Active</span><?php } else { ?>
                                                            <span class="badge bg-danger-400">Inactive</span><?php } ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a onclick="showModal('<?php echo $compname . '*' . $sup . '*' . $id . '*' . $status; ?>')"
                                                           data-toggle="modal" data-target="#companyEdit"
                                                           class="btn btn-sm btn-success"><i
                                                                    class="icon-pencil7"></i> Edit</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['pvcreate'])){
            $qry = "SELECT * FROM pv_detail WHERE stfid='$stfID' ORDER BY app_date DESC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash4 position-left"></i>PAYMENT VOUCHERS</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total PVs</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($qryRun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i>Payment Vouchers</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Generate</li>
                        </ul>
                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#generatepv"><i class="icon-add-to-list position-left"></i> Create Payment Voucher</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <div class="panel panel-white">
                                            <table class="table table-striped table-lg media-library">
                                                <thead>
                                                <tr>
                                                    <th>PV ID</th>
                                                    <th>Type</th>
                                                    <th>Supplier</th>
                                                    <th>Department</th>
                                                    <th>Total Amnt</th>
                                                    <th>Tax Amnt</th>
                                                    <th>Net</th>
                                                    <th>Status</th>
                                                    <th>Expense Class</th>
                                                    <th>Debit Acct.</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $cont = 0;
                                                while ($items = $conn->fetch($qryRun)) {
                                                    $pvid = $items['pv_id'];
                                                    $status = $items['status'];
                                                    $tax = $items['taxamount'];
                                                    $cont++;
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <small><?php echo $items['pv_id']; ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo $items['expType']; ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo $items['supplier']; ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo $items['dept']; ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo $items['total']; ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo $items['taxamount']; ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php if($tax < 0){ echo number_format(($items['total'] + $items['taxamount']), 2);}else{ echo number_format(($items['total'] - $items['taxamount']), 2); } ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo $items['status']; ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo getexp($items['expense_class']); ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo getbank($items['bankCode']); ?></small>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="dashboard.php?viewPV=<?php echo $pvid; ?>"
                                                               class="btn btn-sm btn-success"><i class="icon-pencil7"></i> View</a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['pending_pvs']) || isset($_POST['pending_pvs'])){ ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash4 position-left"></i>PENDING PAYMENT VOUCHERS</h4></div>
                            <!--<div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">New visitors</div>
                                                <div class="text-muted">2,349 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-visitors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">sessions</div>
                                                <div class="text-muted">08:20 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-sessions"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">Total online</div>
                                                <div class="text-muted"><span class="status-mark border-success position-left"></span> 5,378 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i>Payment Vouchers</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Pending PV</li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $cont = 0;
                            $qry = "SELECT * FROM pv_detail WHERE status='Confirmed' ORDER BY app_date ASC";
                            $qryRun = $conn->query($dbcon, $qry);
                            while ($items = $conn->fetch($qryRun)) {
                                $pvid = $items['pv_id'];
                                $cont++;
                                ?>
                                <div class="row">
                                    <div class="col-md-12"
                                         style="padding-left: 1%; padding-right: 1%;">
                                        <div class="panel-group secundary" id="accordion2">
                                            <div class="panel panel-default"
                                                 data-appear-animation="bounceInRight">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo $pvid; ?>">
                                                            <?php echo "<small style='color: #000'>" . $pvid . "  <i style='color: #0a68b4; font-weight: bold; font-size: large;'>| </i><b style='color: #0a68b4;'>  Raised By:</b> " . checkName($items['stfid']) . "  <i style='color: #0a68b4; font-weight: bold; font-size: large;'>|</i><b style='color: #0a68b4;'>  Department:</b>  " . $items['dept'] . "  <i style='color: #0a68b4; font-weight: bold; font-size: large;'>|</i> <b style='color: #0a68b4;'>  Type:</b> " . $items['expType'] . "  <i style='color: #0a68b4; font-weight: bold; font-size: large;'>|</i> <b style='color: #0a68b4;'>  Beneficiary:</b> " . $items['supplier'] . "</small>"; ?>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="<?php echo $pvid; ?>"
                                                     class="accordion-body collapse">
                                                    <div class="panel-body">
                                                        <!-- THE PV DETAILS BEGIN HERE -->
                                                        <?php
                                                        $pvdet = "SELECT * FROM pv_detail WHERE pv_id='$pvid'";
                                                        $pvdetRun = $conn->query($dbcon, $pvdet);
                                                        $pvData = $conn->fetch($pvdetRun);

                                                        $comp = $pvData['dept'];
                                                        $docs = $pvData['documents'];
                                                        $status = $pvData['status'];
                                                        $stfid = $pvData['stfid'];
                                                        ?>
                                                        <!-- Invoice template -->
                                                        <div class="panel panel-white"
                                                             style="margin-left: 5%; margin-right: 5%;">
                                                            <div class="panel-heading">

                                                            </div>

                                                            <div class="panel-body no-padding-bottom">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <label>Documents
                                                                            Uploaded</label>
                                                                    </div>
                                                                    <?php
                                                                    for ($i = 1; $i <= $docs; $i++) {
                                                                        $ref = $pvid . "(" . $i . ")";
                                                                        //ge the name of the file
                                                                        $docget = "SELECT fname FROM pvdoc WHERE ref='$ref'";
                                                                        $docqry = $conn->query($dbcon, $docget);
                                                                        $docdata = $conn->fetch($docqry);
                                                                        $docname = $docdata['fname'];
                                                                        $url = "";
                                                                        if ($conn->sqlnum($docqry) != 0) {
                                                                            $url = $docdata['fname'];
                                                                        } else {
                                                                            $url = "Document" . $i;
                                                                        }
                                                                        $fullurl=$fullurl = "assets/data/pvdocs/" . $docname;
                                                                        ?>
                                                                        <div class="col-md-2">
                                                                            <a onclick="viewpdf('<?php echo $fullurl; ?>')"><?php echo $url; ?></a>

                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6 content-group">
                                                                        <h5>Department</h5>
                                                                        <ul class="list-condensed list-unstyled">
                                                                            <li>
                                                                                <label>Name: </label><?php echo $comp; ?>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="col-md-6 content-group">
                                                                        <div class="invoice-details">
                                                                            <table>
                                                                                <tr>
                                                                                    <td align="left">
                                                                                        <h5 class="text-uppercase text-semibold">
                                                                                            PV#:</h5>
                                                                                    </td>
                                                                                    <td align="left">
                                                                                        <h5 class="text-uppercase text-semibold"><?php echo $pvData['pv_id']; ?></h5>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left">
                                                                                        <label>Date</label>
                                                                                    </td>
                                                                                    <td align="left">
                                                                                                                <span class="text-semibold"><?php $pvdate = $pvData['app_date'];
                                                                                                                    echo date("l, d M, Y H:i:s A", strtotime(date($pvdate))); ?></span>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left">
                                                                                        <label>Currency</label>
                                                                                    </td>
                                                                                    <td align="left"><?php echo $pvData['curr']; ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="left">
                                                                                        <label>Exchange
                                                                                            Rate</label>
                                                                                    </td>
                                                                                    <td align="left"><?php echo $pvData['exchrate']; ?></td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6 col-lg-9 content-group">
                                                                        <span class="text-muted"><h5>Applicant:</h5></span>
                                                                        <ul class="list-condensed list-unstyled">
                                                                            <li><?php echo checkName($pvData['stfid']); ?></li>
                                                                        </ul>
                                                                        <span class="text-muted"><h5>Beneficiary:</h5></span>
                                                                        <ul class="list-condensed list-unstyled">
                                                                            <li><?php echo $pvData['supplier']; ?>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                    <div class="col-md-6 col-lg-3 content-group">
                                                                        <span class="text-muted"><h5>Expense Account:</h5></span>
                                                                        <ul class="list-condensed list-unstyled invoice-payment-details">
                                                                            <li>
                                                                                <label>Status:</label>
                                                                                <span class="text-right text-semibold"><?php echo $status; ?></span>
                                                                            </li>
                                                                            <li>
                                                                                <label>Expense Classification:</label>
                                                                                <span class="text-right text-semibold"><?php echo getexp($pvData['expense_class']); ?></span>
                                                                            </li>
                                                                            <li>
                                                                                <label>Debit Account:</label>
                                                                                <span class="text-right text-semibold"><?php echo getbank($pvData['bankCode']); ?></span>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="table-responsive">
                                                                <table class="table table-lg table-bordered">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Date Of Expense</th>
                                                                        <th>Description</th>
                                                                        <th>Amount</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php
                                                                    $pv = "SELECT * FROM pv WHERE pv_id='$pvid'";
                                                                    $pvRun = $conn->query($dbcon, $pv);
                                                                    $cont = 0;
                                                                    $total = 0;
                                                                    while ($pvdetData = $conn->fetch($pvRun)) {
                                                                        $cont++;
                                                                        $total += $pvdetData['total'];
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $cont; ?></td>
                                                                            <td><?php $id = $pvdetData['exp_date'];
                                                                                echo $rDate = date("d/M/Y", strtotime(date($id))) ?></td>
                                                                            <td><?php echo $pvdetData['description']; ?></td>
                                                                            <td><?php echo number_format($pvdetData['total'], 2); ?></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                        <td>
                                                                            <i style="font-weight: bolder;">Total</i>
                                                                        </td>
                                                                        <td>
                                                                            <i style="font-weight: bolder;"><?php echo number_format($total, 2); ?></i>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                        <td>
                                                                            <i style="font-weight: bolder;">Total
                                                                                Tax</i></td>
                                                                        <td>
                                                                            <i style="font-weight: bolder;"><?php echo number_format($pvData['taxamount'], 2); ?></i>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                        <td>
                                                                            <i style="color:#0a68b4 ; font-weight: bold;">Net
                                                                                Amount</i></td>
                                                                        <td>
                                                                            <i style="color:#0a68b4 ; font-weight: bold;"><?php echo number_format(($total + $pvData['taxamount']), 2); ?></i>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <?php
                                                            $sel = "SELECT tax.pv_id, p.pv_id, tax.itemid, tax.amount, tax.percentage, tax.id, p.total, p.description FROM pvtax AS tax INNER JOIN pv AS p ON tax.itemid=p.id WHERE tax.pv_id=$pvid";
                                                            $selRun = $conn->query($dbcon, $sel);
                                                            $count = 0;
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <table class="table table-hover table-responsive table-bordered"
                                                                           style="color: #000; font-size: small;">
                                                                        <thead>
                                                                        <tr>
                                                                            <th colspan="6"><h3>
                                                                                    Tax
                                                                                    Details</h3>
                                                                            </th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Description</th>
                                                                            <th>Amount</th>
                                                                            <th>Tax %</th>
                                                                            <th>Tax Amount</th>
                                                                            <th>&nbsp;</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        if ($conn->sqlnum($selRun) > 0) {
                                                                            $totaltax = 0;
                                                                            while ($selData = $conn->fetch($selRun)) {
                                                                                $count++;
                                                                                $totaltax += $selData['amount'];
                                                                                ?>
                                                                                <tr>
                                                                                    <td><?php echo $count; ?></td>
                                                                                    <td><?php echo $selData['description']; ?></td>
                                                                                    <td><?php echo $selData['total']; ?></td>
                                                                                    <td><?php echo number_format(($selData['percentage'] * 100), 2) . "%"; ?></td>
                                                                                    <td><?php echo $selData['amount']; ?></td>
                                                                                    <td>
                                                                                        <a href="dashboard.php?pvapproval=<?php echo $pvid; ?>&remtax=<?php echo $selData['id']; ?>&amount=<?php echo $selData['amount']; ?>"
                                                                                           class="btn btn-sm"><i
                                                                                                    class="icon-trash"></i></a>
                                                                                    </td>
                                                                                </tr>

                                                                            <?php } ?>

                                                                            <tr>
                                                                                <td>&nbsp;</td>
                                                                                <td>&nbsp;</td>
                                                                                <td>&nbsp;</td>
                                                                                <td>Total</td>
                                                                                <td><?php echo number_format($totaltax, 2); ?></td>
                                                                            </tr>
                                                                        <?php } else { ?>

                                                                            <tr>
                                                                                <td colspan="6">
                                                                                    No Tax
                                                                                    Components
                                                                                    Added
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <form method="post">
                                                               <!-- <div class="row">
                                                                    <div class="col-md-2" align="right">
                                                                        <?php if ($pvData['chq'] == "no") { ?>

                                                                            &nbsp;&nbsp;<input type="checkbox" onchange="chqadd('chqq')" id='chqq'/>Check issued?
                                                                        <?php } else { ?>
                                                                            <p style="color: #000; font-weight: bold; font-size: large;">
                                                                                Cheque Issued:
                                                                                <i style="color: #0a68b4"><?php echo $pvData['chekno']; ?></i>
                                                                            </p>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="col-md-2" align="left">
                                                                        <input type="text" class="form-control hidden" name='chqno' id='chqno' placeholder="Cheque Number"/>
                                                                    </div>
                                                                </div>-->
                                                                <div class="row" style="margin: 2%">
                                                                    <input type="hidden" name="approveid" value="<?php echo $pvid; ?>" />
                                                                    <input type="hidden" name="stfid" value="<?php echo $stfid; ?>" />
                                                                    <div class="col-md-6"
                                                                         align="center">
                                                                        <label>Comment</label>
                                                                        <textarea name="sup" class="form-control" maxlength="200" rows="3"></textarea><br/>
                                                                        <button type="submit" class="btn btn-lg btn-success" name="pvdirapprove">Approve</button>
                                                                        <button type="submit" class="btn btn-lg btn-danger" name="pvdirreject">Reject</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- PV DETAILS END HERE -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php } ?>
                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
         <?php }elseif (isset($_GET['account_det'])) { ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header no-margin">
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
                    <div class="profile-cover-img" style="background-image: url(<?php echo $clogo; ?>)"></div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#" class="profile-thumb">
                                <img src="<?php echo $img; ?>" alt="" class="img-circle img-responsive">
                            </a>
                        </div>

                        <div class="media-body">
                            <h1 style="color: #852B30; font-weight: bold;"><?php echo $fname . " " . $lname; ?>
                                <small class="display-block" style="color: #06112C"><?php echo $stposition; ?></small>
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

            </div>
            <!-- /main content -->
        <?php }elseif (isset($_GET['departmentpvreport'])) {
            $stdate = $_GET['pvrepsd'];
            $dept = $_GET['company'];
            $enddate = $_GET['pvreped'];
            $qry = "SELECT * FROM pv_detail WHERE dept = '$dept' AND status IN ('Complete','Approved') AND finDate BETWEEN '$stdate 00:00:00' AND '$enddate 23:59:59' ORDER BY finDate DESC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <div class="panel panel-white" id="ptable">
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $caddr; ?></li>
                                    <li><?php echo $cloc; ?></li>
                                    <li><?php echo $ccont; ?></li>
                                    <li><?php echo $cmail; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">Report Of Payment Vouchers Of <b><?php echo $dept; ?> Department</b> From <?php echo date("l, d M, Y", strtotime(date($stdate))); ?>
                                        To <?php echo date("l, d M, Y", strtotime(date($enddate))); ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>PV ID</th>
                                        <th>Expense Class</th>
                                        <th>Supplier</th>
                                        <th>Total Amnt</th>
                                        <th>Tax Amnt</th>
                                        <th>Net</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $cont = 0;
                                    $tottax = 0;
                                    $totamount = 0;
                                    while ($items = $conn->fetch($qryRun)) {
                                        $pvid = $items['pv_id'];
                                        $curr = $items['curr'];
                                        $rate = $items['exchrate'];
                                        $status = $items['status'];
                                        $tax = ($items['taxamount'] * $items['exchrate']);
                                        $netamnt = 0; //This will conain the net amount

                                        $amount = ($items['total'] * $items['exchrate']);
                                        if ($tax < 0) {
                                            $netamnt = $amount + $tax;
                                        } else {
                                            $netamnt = $amount - $tax;
                                        }
                                        $tottax += $tax;
                                        $totamount += $amount;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $items['pv_id']; ?>
                                            </td>
                                            <td>
                                                <small><?php echo $items['expType']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo $items['supplier']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($amount, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($tax, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($netamnt, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php $stDate = $items['app_date'];
                                                    echo date("d M,Y", strtotime(date($stDate))); ?></small>
                                            </td>
                                        </tr>
                                    <?php }
                                    $nettotamnt = 0;
                                    if ($tottax < 0) {
                                        $nettotamnt = $totamount + $tottax;
                                    } else {
                                        $nettotamnt = $totamount - $tottax;
                                    }
                                    ?>
                                    </tbody>
                                    <tbody>
                                    <tr style="background-color: rgba(232,231,227,0.9); font-weight: bold;">
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><?php echo number_format($totamount, 2); ?></td>
                                        <td><?php echo number_format($tottax, 2); ?></td>
                                        <td><?php echo number_format($nettotamnt, 2); ?></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['company_docs'])) { ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h4><i class="icon-home position-left"></i> <span class="text-semibold">Company Documents</span>
                            </h4>
                        </div>
                    </div>
                </div>
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <?php
                    if ($comp == "manager") {
                        ?>
                        <div class="row">
                            <div class="col-md-2" align="center" style="padding: 1%">
                                <a href="#" data-toggle="modal" data-target="#companydocupl" class="btn btn-success">Upload
                                    New Document</a>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- /main charts -->


                    <!-- Dashboard content -->
                    <div class="panel panel-white">
                        <div class="row">
                            <?php
                            $seldoc = "SELECT * FROM policydocs WHERE status='Active' ORDER BY date DESC";
                            $selRun = $conn->query($dbconnection, $seldoc);
                            if ($conn->sqlnum($selRun) < 1) {
                                ?>
                                <p style="text-align: center; color: #0a68b4;">No Documents Available</p>
                            <?php } else {
                                while ($data = $conn->fetch($selRun)) {
                                    $id = $data['id'];
                                    $name = $data['name'];
                                    $status = $data['status'];
                                    $fullurl = "assets/data/companydocs/".$data['url'];
                                    ?>
                                    <div class="col-sm-6 col-lg-2 col-md-2" align="center">
                                        <div class="panel">
                                            <div class=" demo-color">
                                                <a onclick="viewpdfhr('<?php echo $fullurl; ?>')"><img src="assets/images/pdf.jpg"class="img-responsive img-rounded"/></a>

                                                <span style="background-color: #0a68b4;"><?php echo $data["name"]; ?></span>
                                            </div>
                                            <?php
                                            if ($comp == "manager") {
                                                ?>
                                                <div class="p-15">
                                                    <div class="media-right">
                                                        <ul class="icons-list">
                                                            <li>
                                                                <a onclick="editcompupl('<?php echo $id . '*' . $name . '*' . $status; ?>')"
                                                                   href="#" data-toggle="modal"
                                                                   data-target="#editcompanydocupl"><i
                                                                            class="icon-three-bars"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <hr class="tall" style="color: #0a68b4;">
                        <?php
                        if ($comp == "manager") {
                            ?>
                            <div class="row" style="margin:1%">
                                <h3>Archived Documents</h3>
                                <?php
                                $seldoc = "SELECT * FROM policydocs WHERE status='Inactive'";
                                $selRun = $conn->query($dbconnection, $seldoc);
                                if ($conn->sqlnum($selRun) < 1) {
                                    ?>
                                    <p style="text-align: center; color: #0a68b4;">No Documents Available</p>
                                <?php } else {
                                    while ($data = $conn->fetch($selRun)) {
                                        $id = $data['id'];
                                        $name = mysqli_real_escape_string($dbconnection, $data['name']);
                                        $status = $data['status'];
                                        ?>
                                        <div class="col-sm-6 col-lg-2 col-md-2" align="center">
                                            <div class="panel">
                                                <div class=" demo-color">
                                                    <a href="assets/data/companydocs/<?php echo $data['url']; ?>"
                                                       target="new"><img src="assets/images/pdf.jpg"
                                                                         class="img-responsive img-rounded"/></a>

                                                    <span style="background-color: #0a68b4;"><?php echo $data["name"]; ?></span>
                                                </div>

                                                <div class="p-15">
                                                    <div class="media-right">
                                                        <ul class="icons-list">
                                                            <li>
                                                                <a onclick="editcompupl('<?php echo $id . '*' . $name . '*' . $status; ?>')"
                                                                   href="#" data-toggle="modal"
                                                                   data-target="#editcompanydocupl"><i
                                                                            class="icon-three-bars"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['categorypvreport'])) {
            $stdate = $_GET['pvrepsd'];
            $enddate = $_GET['pvreped'];
            $cat = $_GET['category'];
            $array1 = explode("*", $cat);
            $expcode = $array1[0];
            $expname = $array1[1];
            $qry = "SELECT * FROM pv_detail WHERE expense_class='$expcode' AND status IN ('Complete','Approved') AND finDate BETWEEN '$stdate' AND '$enddate' ORDER BY finDate DESC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <div class="panel panel-white" id="ptable">
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $caddr; ?></li>
                                    <li><?php echo $cloc; ?></li>
                                    <li><?php echo $ccont; ?></li>
                                    <li><?php echo $cmail; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">Report Of <b><?php echo $expname; ?></b> Payment Vouchers From <?php echo date("l, d M, Y", strtotime(date($stdate))); ?>
                                        To <?php echo date("l, d M, Y", strtotime(date($enddate))); ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>PV ID</th>
                                        <th>Expense Class</th>
                                        <th>Supplier</th>
                                        <th>Total Amnt</th>
                                        <th>Tax Amnt</th>
                                        <th>Net</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $cont = 0;
                                    $tottax = 0;
                                    $totamount = 0;
                                    while ($items = $conn->fetch($qryRun)) {
                                        $pvid = $items['pv_id'];
                                        $curr = $items['curr'];
                                        $rate = $items['exchrate'];
                                        $status = $items['status'];
                                        $tax = ($items['taxamount'] * $items['exchrate']);
                                        $netamnt = 0; //This will conain the net amount

                                        $amount = ($items['total'] * $items['exchrate']);
                                        if ($tax < 0) {
                                            $netamnt = $amount + $tax;
                                        } else {
                                            $netamnt = $amount - $tax;
                                        }
                                        $tottax += $tax;
                                        $totamount += $amount;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $items['pv_id']; ?>
                                            </td>
                                            <td>
                                                <small><?php echo $items['expType']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo $items['supplier']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($amount, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($tax, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($netamnt, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php $stDate = $items['app_date'];
                                                    echo date("d M,Y", strtotime(date($stDate))); ?></small>
                                            </td>
                                        </tr>
                                    <?php }
                                    $nettotamnt = 0;
                                    if ($tottax < 0) {
                                        $nettotamnt = $totamount + $tottax;
                                    } else {
                                        $nettotamnt = $totamount - $tottax;
                                    }
                                    ?>
                                    </tbody>
                                    <tbody>
                                    <tr style="background-color: rgba(232,231,227,0.9); font-weight: bold;">
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><?php echo number_format($totamount, 2); ?></td>
                                        <td><?php echo number_format($tottax, 2); ?></td>
                                        <td><?php echo number_format($nettotamnt, 2); ?></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['typepvreport'])) {
            $stdate = $_GET['pvrepsd'];
            $enddate = $_GET['pvreped'];
            $type = $_GET['exptype'];
            $qry = "SELECT * FROM pv_detail WHERE expType='$type' AND status IN ('Complete','Approved') AND finDate BETWEEN '$stdate' AND '$enddate' ORDER BY finDate DESC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <div class="panel panel-white" id="ptable">
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $caddr; ?></li>
                                    <li><?php echo $cloc; ?></li>
                                    <li><?php echo $ccont; ?></li>
                                    <li><?php echo $cmail; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">Report Of <b><?php echo $type; ?></b> Payment Vouchers From <?php echo date("l, d M, Y", strtotime(date($stdate))); ?>
                                        To <?php echo date("l, d M, Y", strtotime(date($enddate))); ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>PV ID</th>
                                        <th>Expense Class</th>
                                        <th>Supplier</th>
                                        <th>Total Amnt</th>
                                        <th>Tax Amnt</th>
                                        <th>Net</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $cont = 0;
                                    $tottax = 0;
                                    $totamount = 0;
                                    while ($items = $conn->fetch($qryRun)) {
                                        $pvid = $items['pv_id'];
                                        $curr = $items['curr'];
                                        $rate = $items['exchrate'];
                                        $status = $items['status'];
                                        $tax = ($items['taxamount'] * $items['exchrate']);
                                        $netamnt = 0; //This will conain the net amount

                                        $amount = ($items['total'] * $items['exchrate']);
                                        if ($tax < 0) {
                                            $netamnt = $amount + $tax;
                                        } else {
                                            $netamnt = $amount - $tax;
                                        }
                                        $tottax += $tax;
                                        $totamount += $amount;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $items['pv_id']; ?>
                                            </td>
                                            <td>
                                                <small><?php echo $items['expType']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo $items['supplier']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($amount, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($tax, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($netamnt, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php $stDate = $items['app_date'];
                                                    echo date("d M,Y", strtotime(date($stDate))); ?></small>
                                            </td>
                                        </tr>
                                    <?php }
                                    $nettotamnt = 0;
                                    if ($tottax < 0) {
                                        $nettotamnt = $totamount + $tottax;
                                    } else {
                                        $nettotamnt = $totamount - $tottax;
                                    }
                                    ?>
                                    </tbody>
                                    <tbody>
                                    <tr style="background-color: rgba(232,231,227,0.9); font-weight: bold;">
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><?php echo number_format($totamount, 2); ?></td>
                                        <td><?php echo number_format($tottax, 2); ?></td>
                                        <td><?php echo number_format($nettotamnt, 2); ?></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['bankdepositreport'])) {
            $stdate = $_GET['pvrepsd'];
            $enddate = $_GET['pvreped'];
            $bankdet = $_GET['bank'];
            $array = explode("*", $bankdet);
            $bankname = $array[1];
            $acctnum = $array[0];
            $qry="";
            if($bankname !='All Banks'){
                $qry = "SELECT * FROM bank_deposits WHERE bankCode='$acctnum' AND dod BETWEEN '$stdate' AND '$enddate' ORDER BY dod ASC";
            }
            else{
                $qry = "SELECT * FROM bank_deposits WHERE dod BETWEEN '$stdate' AND '$enddate' ORDER BY dod ASC";
            }

            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <div class="panel panel-white" id="ptable">
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $caddr; ?></li>
                                    <li><?php echo $cloc; ?></li>
                                    <li><?php echo $ccont; ?></li>
                                    <li><?php echo $cmail; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">Report Of Bank Deposits To <b><?php echo strtoupper($bankname); ?></b> From <?php echo date("l, d M, Y", strtotime(date($stdate))); ?>
                                        To <?php echo date("l, d M, Y", strtotime(date($enddate))); ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Bank Code</th>
                                        <th>Bank Name</th>
                                        <th>Cheque N<u>o</u></th>
                                        <th>Amount On Cheque</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $cont = 0;
                                    $totamount = 0;
                                    while ($items = $conn->fetch($qryRun)) {
                                        $dbank = getbank($items['bankcode']);
                                        $amount = $items['chqamount'];
                                        $totamount += $amount;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <small><?php echo $cont; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo $items['bankcode']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo $dbank; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo $items['chq']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($amount, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php $stDate = $items['dod'];
                                                    echo date("d M,Y", strtotime(date($stDate))); ?></small>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tbody>
                                    <tr style="background-color: rgba(232,231,227,0.9); font-weight: bold;">
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>TOTAL</td>
                                        <td><?php echo number_format($totamount, 2); ?></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['bankpvreport'])) {
            $stdate = $_GET['pvrepsd'];
            $enddate = $_GET['pvreped'];
            $bankdet = $_GET['bank'];
            $array = explode("*", $bankdet);
            $bankname = $array[1];
            $acctnum = $array[0];

            $qry = "SELECT * FROM pv_detail WHERE bankCode='$acctnum' AND status IN ('Complete','Approved') AND finDate BETWEEN '$stdate' AND '$enddate' ORDER BY finDate DESC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <div class="panel panel-white" id="ptable">
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $caddr; ?></li>
                                    <li><?php echo $cloc; ?></li>
                                    <li><?php echo $ccont; ?></li>
                                    <li><?php echo $cmail; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">Report Of Payment Vouchers Debited To <b><?php echo $bankname; ?></b> From <?php echo date("l, d M, Y", strtotime(date($stdate))); ?>
                                        To <?php echo date("l, d M, Y", strtotime(date($enddate))); ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>PV ID</th>
                                        <th>Expense Class</th>
                                        <th>Supplier</th>
                                        <th>Total Amnt</th>
                                        <th>Tax Amnt</th>
                                        <th>Net</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $cont = 0;
                                    $tottax = 0;
                                    $totamount = 0;
                                    while ($items = $conn->fetch($qryRun)) {
                                        $pvid = $items['pv_id'];
                                        $curr = $items['curr'];
                                        $rate = $items['exchrate'];
                                        $status = $items['status'];
                                        $tax = ($items['taxamount'] * $items['exchrate']);
                                        $netamnt = 0; //This will conain the net amount

                                        $amount = ($items['total'] * $items['exchrate']);
                                        if ($tax < 0) {
                                            $netamnt = $amount + $tax;
                                        } else {
                                            $netamnt = $amount - $tax;
                                        }
                                        $tottax += $tax;
                                        $totamount += $amount;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="dashboard.php?viewPV=<?php echo $pvid; ?>"><?php echo $items['pv_id']; ?></a>
                                            </td>
                                            <td>
                                                <small><?php echo $items['expType']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo $items['supplier']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($amount, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($tax, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($netamnt, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php $stDate = $items['app_date'];
                                                    echo date("d M,Y", strtotime(date($stDate))); ?></small>
                                            </td>
                                        </tr>
                                    <?php }
                                    $nettotamnt = 0;
                                    if ($tottax < 0) {
                                        $nettotamnt = $totamount + $tottax;
                                    } else {
                                        $nettotamnt = $totamount - $tottax;
                                    }
                                    ?>
                                    </tbody>
                                    <tbody>
                                    <tr style="background-color: rgba(232,231,227,0.9); font-weight: bold;">
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><?php echo number_format($totamount, 2); ?></td>
                                        <td><?php echo number_format($tottax, 2); ?></td>
                                        <td><?php echo number_format($nettotamnt, 2); ?></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['generalfeesreport'])) {
            $stdate = $_GET['pvrepsd'];
            $enddate = $_GET['pvreped'];
            $qry = "SELECT s.stdid, s.totalamount, s.paid, p.paydate, p.amount, p.balance FROM invoice_payment p INNER JOIN student_invoices s ON s.invoiceid = p.invoiceid WHERE p.paydate BETWEEN '$stdate 00:00:00' AND '$enddate 23:59:59' ORDER BY p.paydate, s.stdid ASC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <div class="panel panel-white" id="ptable">
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $caddr; ?></li>
                                    <li><?php echo $cloc; ?></li>
                                    <li><?php echo $ccont; ?></li>
                                    <li><?php echo $cmail; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">Fees Payment From <?php echo date("l, d M, Y", strtotime(date($stdate))); ?>
                                        To <?php echo date("l, d M, Y", strtotime(date($enddate))); ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Amount Paid</th>
                                        <th>Balance</th>
                                        <th>Payment Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $cont = 0;
                                    $totbal = 0;
                                    $totamount = 0;
                                    while ($items = $conn->fetch($qryRun)) {
                                        $amount = $items['amount'];
                                        $balpay = $items['balance'];
                                        $totamount += $amount;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $items['stdid']; ?>
                                            </td>
                                            <td>
                                                <?php echo getstudent($items['stdid']); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($amount, 2); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($balpay, 2); ?>
                                            </td>
                                            <td>
                                                <?php $stDate = $items['paydate'];
                                                    echo date("d M,Y", strtotime(date($stDate))); ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tbody>
                                    <tr style="background-color: rgba(232,231,227,0.9); font-weight: bold;">
                                        <td>&nbsp;</td>
                                        <td>TOTAL</td>
                                        <td><?php echo number_format($totamount, 2); ?></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['generalhostelreport'])) {
            $stdate = $_GET['pvrepsd'];
            $enddate = $_GET['pvreped'];
            $qry = "SELECT s.stdid, s.totalamount, s.paid, p.paydate, p.amount, p.balance FROM invoice_payment p INNER JOIN hostel_invoices s ON s.invoiceid = p.invoiceid WHERE p.paydate BETWEEN '$stdate 00:00:00' AND '$enddate 23:59:59' ORDER BY p.paydate, s.stdid ASC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <div class="panel panel-white" id="ptable">
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $caddr; ?></li>
                                    <li><?php echo $cloc; ?></li>
                                    <li><?php echo $ccont; ?></li>
                                    <li><?php echo $cmail; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">Hostel Fees Payment From <?php echo date("l, d M, Y", strtotime(date($stdate))); ?>
                                        To <?php echo date("l, d M, Y", strtotime(date($enddate))); ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Amount Paid</th>
                                        <th>Payment Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $cont = 0;
                                    $totbal = 0;
                                    $totamount = 0;
                                    while ($items = $conn->fetch($qryRun)) {
                                        $amount = $items['amount'];
                                        $balpay = $items['balance'];
                                        $totamount += $amount;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $items['stdid']; ?>
                                            </td>
                                            <td>
                                                <?php echo getstudent($items['stdid']); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($amount, 2); ?>
                                            </td>
                                            <td>
                                                <?php $stDate = $items['paydate'];
                                                echo date("d M,Y", strtotime(date($stDate))); ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tbody>
                                    <tr style="background-color: rgba(232,231,227,0.9); font-weight: bold;">
                                        <td>&nbsp;</td>
                                        <td>TOTAL</td>
                                        <td><?php echo number_format($totamount, 2); ?></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['students_arrears'])) {
            $qry = "SELECT stdid, totalamount, invoiceid, paid FROM student_invoices WHERE status='Pending'";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <div class="panel panel-white" id="ptable">
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $caddr; ?></li>
                                    <li><?php echo $cloc; ?></li>
                                    <li><?php echo $ccont; ?></li>
                                    <li><?php echo $cmail; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">STUDENTS SCHOOL FEES ARREARS</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Total Amount</th>
                                        <th>Paid</th>
                                        <th>Balance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $cont = 0;
                                    $totbal = 0;
                                    $totamount = 0;
                                    $totpaid = 0;
                                    while ($items = $conn->fetch($qryRun)) {
                                        $amount = $items['totalamount'];
                                        $paid = $items['paid'];
                                        $bal = $amount - $paid;

                                        $totamount+= $amount;
                                        $totbal+= $bal;
                                        $totpaid+= $paid;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $items['stdid']; ?>
                                            </td>
                                            <td>
                                                <?php echo getstudent($items['stdid']); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($amount, 2); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($paid, 2); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($bal, 2); ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tbody>
                                    <tr style="background-color: rgba(232,231,227,0.9); font-weight: bold;">
                                        <td>&nbsp;</td>
                                        <td>TOTAL</td>
                                        <td><?php echo number_format($totamount, 2); ?></td>
                                        <td><?php echo number_format($totpaid, 2); ?></td>
                                        <td><?php echo number_format($totbal, 2); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['hostel_arrears'])) {
            $qry = "SELECT stdid, totalamount, invoiceid, paid FROM hostel_invoices WHERE status='Pending'";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <div class="panel panel-white" id="ptable">
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $caddr; ?></li>
                                    <li><?php echo $cloc; ?></li>
                                    <li><?php echo $ccont; ?></li>
                                    <li><?php echo $cmail; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">HOSTEL FEES ARREARS</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Total Amount</th>
                                        <th>Paid</th>
                                        <th>Balance</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $cont = 0;
                                    $totbal = 0;
                                    $totamount = 0;
                                    $totpaid = 0;
                                    while ($items = $conn->fetch($qryRun)) {
                                        $amount = $items['totalamount'];
                                        $paid = $items['paid'];
                                        $bal = $amount - $paid;

                                        $totamount+= $amount;
                                        $totbal+= $bal;
                                        $totpaid+= $paid;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $items['stdid']; ?>
                                            </td>
                                            <td>
                                                <?php echo getstudent($items['stdid']); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($amount, 2); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($paid, 2); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($bal, 2); ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tbody>
                                    <tr style="background-color: rgba(232,231,227,0.9); font-weight: bold;">
                                        <td>&nbsp;</td>
                                        <td>TOTAL</td>
                                        <td><?php echo number_format($totamount, 2); ?></td>
                                        <td><?php echo number_format($totpaid, 2); ?></td>
                                        <td><?php echo number_format($totbal, 2); ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['generalpvreport'])) {
            $stdate = $_GET['pvrepsd'];
            $enddate = $_GET['pvreped'];
            $qry = "SELECT * FROM pv_detail WHERE status IN ('Complete','Approved') AND finDate BETWEEN '$stdate 00:00:00' AND '$enddate 23:59:59' ORDER BY finDate DESC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                     <div class="panel panel-white" id="ptable">
                         <div class="row">

                             <div class="col-md-12 content-group" align="center">
                                 <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                 <ul class="list-condensed list-unstyled">
                                     <li><?php echo $caddr; ?></li>
                                     <li><?php echo $cloc; ?></li>
                                     <li><?php echo $ccont; ?></li>
                                     <li><?php echo $cmail; ?></li>
                                 </ul>
                             </div>
                         </div>
                         <div class="row">

                             <div class="col-md-12 content-group" align="center">
                                 <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">Report Of Payment Vouchers From <?php echo date("l, d M, Y", strtotime(date($stdate))); ?>
                                         To <?php echo date("l, d M, Y", strtotime(date($enddate))); ?></span></p>
                             </div>
                         </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>PV ID</th>
                                        <th>Expense Class</th>
                                        <th>Supplier</th>
                                        <th>Total Amnt</th>
                                        <th>Tax Amnt</th>
                                        <th>Net</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $cont = 0;
                                    $tottax = 0;
                                    $totamount = 0;
                                    while ($items = $conn->fetch($qryRun)) {
                                        $pvid = $items['pv_id'];
                                        $curr = $items['curr'];
                                        $rate = $items['exchrate'];
                                        $status = $items['status'];
                                        $tax = ($items['taxamount'] * $items['exchrate']);
                                        $netamnt = 0; //This will conain the net amount

                                        $amount = ($items['total'] * $items['exchrate']);
                                        if ($tax < 0) {
                                            $netamnt = $amount + $tax;
                                        } else {
                                            $netamnt = $amount - $tax;
                                        }
                                        $tottax += $tax;
                                        $totamount += $amount;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $items['pv_id']; ?>
                                            </td>
                                            <td>
                                                <small><?php echo $items['expType']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo $items['supplier']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($amount, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($tax, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($netamnt, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php $stDate = $items['app_date'];
                                                    echo date("d M,Y", strtotime(date($stDate))); ?></small>
                                            </td>
                                        </tr>
                                    <?php }
                                    $nettotamnt = 0;
                                    if ($tottax < 0) {
                                        $nettotamnt = $totamount + $tottax;
                                    } else {
                                        $nettotamnt = $totamount - $tottax;
                                    }
                                    ?>
                                    </tbody>
                                    <tbody>
                                    <tr style="background-color: rgba(232,231,227,0.9); font-weight: bold;">
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td><?php echo number_format($totamount, 2); ?></td>
                                        <td><?php echo number_format($tottax, 2); ?></td>
                                        <td><?php echo number_format($nettotamnt, 2); ?></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['sessionreport'])) {
            $session = $_GET['stsession'];
            $status = $_GET['ststatus'];
            $qry = "SELECT * FROM students WHERE stsession = '$session' AND status = '$status' ORDER BY fname ASC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <div class="panel panel-white" id="ptable">
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $caddr; ?></li>
                                    <li><?php echo $cloc; ?></li>
                                    <li><?php echo $ccont; ?></li>
                                    <li><?php echo $cmail; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">Report Of <b><?php echo $status ?></b> Students In The <b><?php echo $session; ?></b> Session</span></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-responsive">
                                    <thead>
                                    <tr>
                                        <!--<th>Image</th>-->
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Batch</th>
                                        <th>Contact</th>
                                        <th>Program</th>
                                        <th>Residential Status</th>
                                        <th>Year</th>
                                        <th>Admission Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 0;
                                    while($data = $conn->fetch($qryRun)){
                                        $count++;
                                        $sid = $data['stdid'];
                                        ?>
                                        <tr>
                                            <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $data['stdid']; ?></td>
                                            <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                            <td><?php echo $data['sex']; ?></td>
                                            <td><?php echo getBatch($data['batchno']); ?></td>
                                            <td><?php echo $data['contact']; ?></td>
                                            <td><?php echo getCourse($data['program']); ?></td>
                                            <td><?php echo $data['stres']; ?></td>
                                            <td><?php echo $data['styr']; ?></td>
                                            <td><?php echo $data['admitdate']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['programreport'])) {
            $program = $_GET['program'];
            $status = $_GET['ststatus'];
            $qry = "SELECT * FROM students WHERE program = '$program' AND status = '$status' ORDER BY fname ASC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <div class="panel panel-white" id="ptable">
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $caddr; ?></li>
                                    <li><?php echo $cloc; ?></li>
                                    <li><?php echo $ccont; ?></li>
                                    <li><?php echo $cmail; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">Report Of <b><?php echo $status ?></b> Students Offering <b><?php echo getCourse($program); ?></b></span></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-responsive">
                                    <thead>
                                    <tr>
                                        <!--<th>Image</th>-->
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Batch</th>
                                        <th>Contact</th>
                                        <th>Class Session</th>
                                        <th>Residential Status</th>
                                        <th>Year</th>
                                        <th>Admission Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 0;
                                    while($data = $conn->fetch($qryRun)){
                                        $count++;
                                        $sid = $data['stdid'];
                                        ?>
                                        <tr>
                                            <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $data['stdid']; ?></td>
                                            <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                            <td><?php echo $data['sex']; ?></td>
                                            <td><?php echo getBatch($data['batchno']); ?></td>
                                            <td><?php echo $data['contact']; ?></td>
                                            <td><?php echo $data['stsession']; ?></td>
                                            <td><?php echo $data['stres']; ?></td>
                                            <td><?php echo $data['styr']; ?></td>
                                            <td><?php echo $data['admitdate']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['batchreport'])) {
            $batch = $_GET['batchno'];
            $status = $_GET['ststatus'];
            $qry = "SELECT * FROM students WHERE batchno = '$batch' AND status = '$status' ORDER BY fname ASC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">

                    <div class="panel panel-white" id="ptable">
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                <ul class="list-condensed list-unstyled">
                                    <li><?php echo $caddr; ?></li>
                                    <li><?php echo $cloc; ?></li>
                                    <li><?php echo $ccont; ?></li>
                                    <li><?php echo $cmail; ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-md-12 content-group" align="center">
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">Report Of <b><?php echo $status ?></b> Students In Batch <b><?php echo getbatch($batch); ?></b></span></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-responsive">
                                    <thead>
                                    <tr>
                                        <!--<th>Image</th>-->
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Program</th>
                                        <th>Contact</th>
                                        <th>Class Session</th>
                                        <th>Residential Status</th>
                                        <th>Year</th>
                                        <th>Admission Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 0;
                                    while($data = $conn->fetch($qryRun)){
                                        $count++;
                                        $sid = $data['stdid'];
                                        ?>
                                        <tr>
                                            <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $data['stdid']; ?></td>
                                            <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                            <td><?php echo $data['sex']; ?></td>
                                            <td><?php echo getCourse($data['program']); ?></td>
                                            <td><?php echo $data['contact']; ?></td>
                                            <td><?php echo $data['stsession']; ?></td>
                                            <td><?php echo $data['stres']; ?></td>
                                            <td><?php echo $data['styr']; ?></td>
                                            <td><?php echo $data['admitdate']; ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="right"><button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button></div>
                    </div>
                </div>
            </div>
            <!-- /staff -->
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['staff_data'])){
            $selstf = "SELECT * FROM staff WHERE status = 'Active'";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users position-left"></i>Staff Record</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp; </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-user-tie"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Staff</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Staff Management</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Staff</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#staffreg"><i class="icon-add-to-list position-left"></i> Add New Staff</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table media-library table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <!--<th>Image</th>-->
                                                <th>Staff ID</th>
                                                <th>Name</th>
                                                <th>Gender</th>
                                                <th>Position</th>
                                                <th>Contact</th>
                                                <th>E-mail</th>
                                                <th>Employment Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($data = $conn->fetch($selstfrun)){
                                                $sid = $data['stfid'];
                                                ?>
                                                <tr>
                                                    <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                                    <td><a href="dashboard.php?staff_details=<?php echo $sid; ?>"><?php echo $data['stfid']; ?></a></td>
                                                    <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                                    <td><?php echo $data['sex']; ?></td>
                                                    <td><?php echo $data['post']; ?></td>
                                                    <td><?php echo $data['contact']; ?></td>
                                                    <td><?php echo $data['email']; ?></td>
                                                    <td><?php echo $data['admitdate']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['banks'])){
                $qry = "SELECT * FROM banks ORDER BY name,status DESC";
                $qryRun = $conn->query($dbcon, $qry);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-piggy-bank position-left"></i>BANKS RECORDS</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-piggy-bank"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Banks</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($qryRun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Configurations</li>
                            <li><i class="icon-user position-left"></i> Payment Vouchers</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Banks</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addbank"><i class="icon-add-to-list position-left"></i> Add New Bank</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-lg media-library">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Bank Code</th>
                                                <th>Account Number</th>
                                                <th>Branch</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $cont = 0;
                                            while ($getData = $conn->fetch($qryRun)) {
                                                $did = $getData['id'];
                                                $name = $getData['name'];
                                                $branch = $getData['branch'];
                                                $acc = $getData['account'];
                                                $status = $getData['status'];
                                                $code = $getData['bankcode'];
                                                $cont++;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <small><?php echo $cont; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $name; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $code; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $acc; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $branch; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $status; ?></small>
                                                    </td>
                                                    <td class="text-center">
                                                        <a onclick="showbankModal('<?php echo $did . '*' . $name . '*' . $branch . '*' . $acc . '*' . $status . '*' . $code; ?>')"
                                                           data-toggle="modal"
                                                           data-target="#editbank"
                                                           class="btn btn-sm btn-success"><i
                                                                    class="icon-copy"></i> View/Edit</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['expense_cls'])){
            $qry = "SELECT * FROM expensecls ORDER BY name ASC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-piggy-bank position-left"></i>EXPENSE CLASSIFICATIONS</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-piggy-bank"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Expense Classes</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($qryRun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Configurations</li>
                            <li><i class="icon-user position-left"></i> Payment Vouchers</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Expense Classifications</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#expcls"><i class="icon-add-to-list position-left"></i> Add Expense Class</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-lg">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $cont = 0;
                                            while ($getData = $conn->fetch($qryRun)) {
                                                $did = $getData['id'];
                                                $name = $getData['name'];
                                                $code = $getData['expcode'];
                                                $status = $getData['status'];
                                                $cont++;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <small><?php echo $cont; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $code; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $name; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $status; ?></small>
                                                    </td>
                                                    <td>
                                                        <a onclick="showexpclsModal('<?php echo $did . '*' . $name . '*' . $code . '*' . $status; ?>')"
                                                           data-toggle="modal"
                                                           data-target="#editexpcls"
                                                           class="btn btn-sm btn-success">View/Edit</a></li>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['previouspvs'])){
            //$qry="SELECT * FROM pv_detail WHERE status IN ('supApproved','cfoApproved','Approved','Complete') AND (supervisor='$vokaId' OR accounts='$vokaId' OR finDir='$vokaId') ORDER BY app_date DESC";
            //$qryRun=$conn->query($dbcon,$qry);

            $qry3 = "SELECT * FROM pv_detail WHERE finDir='$stfID' AND finDate !='0000-00-00 00:00:00' ORDER BY finDate DESC";
            $qryRun3 = $conn->query($dbcon, $qry3);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users position-left"></i>Staff Record</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">New visitors</div>
                                                <div class="text-muted">2,349 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-visitors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">sessions</div>
                                                <div class="text-muted">08:20 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-sessions"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">Total online</div>
                                                <div class="text-muted"><span class="status-mark border-success position-left"></span> 5,378 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Staff Management</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Staff</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#staffreg"><i class="icon-add-to-list position-left"></i> Add New Staff</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-lg media-library">
                                            <thead>
                                            <tr>
                                                <th>PV ID</th>
                                                <th>Type</th>
                                                <th>Supplier</th>
                                                <th>Department</th>
                                                <th>Total Amnt</th>
                                                <th>Tax Amnt</th>
                                                <th>Net</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>View</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while ($items3 = $conn->fetch($qryRun3)) {
                                                $pvid = $items3['pv_id'];
                                                $status = $items3['status'];
                                                $tax = $items3['taxamount'];
                                                ?>
                                                <tr>
                                                    <td>
                                                        <small><?php echo $items3['pv_id']; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $items3['expType']; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $items3['supplier']; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $items3['dept']; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $items3['total']; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $items3['taxamount']; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php if($tax < 0){ echo number_format(($items3['total'] + $items3['taxamount']), 2);}else{ echo number_format(($items3['total'] - $items3['taxamount']), 2);} ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php echo $items3['status']; ?></small>
                                                    </td>
                                                    <td>
                                                        <small><?php $stDate = $items3['finDate'];
                                                            echo date("Y-m-d", strtotime(date($stDate))); ?></small>
                                                    </td>
                                                    <td class="text-center"><a class="btn btn-success"
                                                                               href="dashboard.php?viewPV=<?php echo $pvid; ?>"><i
                                                                    class="icon-eye"></i></a></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['facilities'])){
            $selstf = "SELECT * FROM facilities WHERE status = 'Active'";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users position-left"></i>Facilitites / Pharmacies</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-office"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Number Of Facilities</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Field / Internships</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Facilities</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#facility"><i class="icon-add-to-list position-left"></i> Add New Facility</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table media-library table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <!--<th>Image</th>-->
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Address</th>
                                                <th>Location</th>
                                                <th>Contact</th>
                                                <th>E-mail</th>
                                                <th>Status</th>
                                                <th>View Students</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($data = $conn->fetch($selstfrun)){
                                                $id = $data['id'];
                                                ?>
                                                <tr>
                                                    <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                                    <td><?php echo $data['pname']; ?></td>
                                                    <td><?php echo $data['ptype']; ?></td>
                                                    <td><?php echo $data['paddr']; ?></td>
                                                    <td><?php echo $data['ploc']; ?></td>
                                                    <td><?php echo $data['pcont']; ?></td>
                                                    <td><?php echo $data['pmail']; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                    <td><a class="btn btn-sm btn-success" onclick="getattachees(<?php echo $id; ?>)">View Attachees</a></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['exchange_rate'])){
            $getstf = "SELECT * FROM exch_rate ORDER BY currency ASC";
            $getstfRun = $conn->query($dbcon, $getstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash2 position-left"></i>Exchange Rates</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Exchange Rates</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($getstfRun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Configurations</li>
                            <li><i class="icon-user position-left"></i> Payment Vouchers</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Exchange Rates</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exchrate"><i class="icon-add-to-list position-left"></i> Add New Exchange Rate</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-lg">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Currency</th>
                                                <th>Exchange Rate</th>
                                                <th class="text-center">Edit</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            while ($stfdata = $conn->fetch($getstfRun)) {
                                                $count++;
                                                $currency = $stfdata['currency'];
                                                $rate = $stfdata['drate'];
                                                $id = $stfdata['id'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $currency; ?></td>
                                                    <td><?php echo $rate; ?></td>
                                                    <td class="text-center">
                                                        <a onclick="editexchrate('<?php echo $currency ?>',<?php echo $rate ?>,<?php echo $id ?>)" class="btn btn-sm btn-success"><i class="icon-pencil7"></i> Edit</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['taxes'])){
            $getstf = "SELECT * FROM taxconfig ORDER BY name ASC";
            $getstfRun = $conn->query($dbcon, $getstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash2 position-left"></i>Taxations</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-piggy-bank"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Taxes</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($getstfRun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Configurations</li>
                            <li><i class="icon-user position-left"></i> Payment Vouchers</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Taxes</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#taxconfig"><i class="icon-add-to-list position-left"></i> Add Tax</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-lg">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tax ID</th>
                                                <th>Name</th>
                                                <th>Percentage (%)</th>
                                                <th>Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            if ($conn->sqlnum($getstfRun) > 0) {
                                                while ($stfdata = $conn->fetch($getstfRun)) {
                                                    $count++;
                                                    $taxid = $stfdata['taxid'];
                                                    $name = $stfdata['name'];
                                                    $val = $stfdata['val'];
                                                    $status = $stfdata['status'];

                                                    //get the name
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $taxid; ?></td>
                                                        <td><?php echo $name; ?></td>
                                                        <td><?php echo($val * 100); ?></td>
                                                        <td><?php if ($status == 'Active') { ?><span
                                                                    class="badge bg-success-400">Active</span><?php } else { ?>
                                                                <span class="badge bg-danger-400">Inactive</span><?php } ?>
                                                        </td>
                                                        <td class="text-center">
                                                            <ul class="icons-list">
                                                                <li class="dropdown">
                                                                    <a href="#" class="dropdown-toggle"
                                                                       data-toggle="dropdown">
                                                                        <i class="icon-menu9"></i>
                                                                    </a>

                                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                                        <li>
                                                                            <a onclick="showtaxModal('<?php echo $taxid . '*' . $name . '*' . ($val * 100) . '*' . $status; ?>')"
                                                                               data-toggle="modal"
                                                                               data-target="#taxedit"><i
                                                                                        class="icon-pencil7"></i>
                                                                                Edit</a></li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="5">No Records Found</td>
                                                </tr>
                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['genpaystruct'])){
            $stfid = $_GET['stfid'];
            $pvdet = "SELECT * FROM staff WHERE stfid='$stfid'";
            $pvdetRun = $conn->query($dbcon, $pvdet);
            $pvData = $conn->fetch($pvdetRun);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users position-left"></i>Staff Salary Structure</h4></div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Staff Payroll</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Staff Structure</li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-white" style="margin: 1%">
                                <div class="panel-heading">
                                    <h5>Staff Salary Structure</h5>
                                </div>

                                <div class="panel-body no-padding-bottom">
                                    <div class="row">
                                        <div class="col-md-6 content-group">
                                            <h5>STAFF DETAILS</h5>
                                            <ul class="list-condensed list-unstyled">
                                                <li><label>Name: </label><?php echo $pvData['fname'] . " " . $pvData['lname']; ?>
                                                </li>
                                                <li><label>Position: </label><?php echo $pvData['post']; ?></li>
                                                <li><label>Contact: </label><?php echo $pvData['contact']; ?></li>
                                                <li><label>E-mail: </label><?php echo $pvData['email']; ?></li>
                                            </ul>
                                        </div>

                                        <div class="col-md-6 content-group">
                                            <div class="invoice-details">
                                                <h5 class="text-uppercase text-semibold">STAFF #: <?php echo $stfid; ?></h5>
                                                <ul class="list-condensed list-unstyled">
                                                    <li>
                                                        <img src="<?php echo $pvData['img']; ?>" class="img-responsive img-rounded" style="width: 150px;"/>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tabbable">
                                        <ul class="nav nav-lg nav-tabs nav-tabs-solid nav-tabs-component nav-justified">
                                            <li class="active"><a href="#stfbasic" data-toggle="tab"><i
                                                            class="icon-cash position-left"></i>Basic Salary</a></li>
                                            <li><a href="#stfallowance" data-toggle="tab"><i class="icon-cash4 position-left"></i>Earnings</a>
                                            </li>
                                            <li><a href="#reimb" data-toggle="tab"><i class="icon-cash2 position-left"></i>Reimbursement</a>
                                            </li>
                                            <li><a href="#stfdeduction" data-toggle="tab"><i class="icon-cash3 position-left"></i>Deductions</a>
                                            </li>
                                            <li><a href="#payslip" data-toggle="tab"><i class="icon-cash4 position-left"></i>Generated
                                                    Payslips</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="stfbasic">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Basic Salary</h6>
                                                        <div class="panel panel-white">
                                                            <table class="table-striped table" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Value</th>
                                                                    <th>Status</th>
                                                                    <th>Detach</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                $cont = 0;
                                                                $qry = "SELECT * FROM payslip WHERE stfid='$stfid' AND type='Basic'";
                                                                $qryRun = $conn->query($dbcon, $qry);
                                                                if ($conn->sqlnum($qryRun) > 0) {
                                                                    while ($items = $conn->fetch($qryRun)) {
                                                                        $cont++;
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <small><?php echo $cont; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <small><?php echo $items['name']; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <small><?php echo $items['dvalue']; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <small><?php echo $items['status']; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <a href="dashboard.php?stfid=<?php echo $stfid ?>&genpaystruct&slipremuvid=<?php echo $items['id']; ?>"><i
                                                                                            class="icon-trash"></i></a></td>
                                                                        </tr>

                                                                    <?php }
                                                                } else { ?>
                                                                    <tr>
                                                                        <td colspan="9">No Record Available</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><a data-toggle="modal" data-target="#basicsalary"
                                                                               onclick="addbasic('<?php echo $stfid; ?>')">Add Basic
                                                                                Salary</a></td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="reimb">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Reimbursements</h6>
                                                        <div class="panel panel-white">
                                                            <table class="table-striped table" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Value</th>
                                                                    <th>Status</th>
                                                                    <th>Detach</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                $cont = 0;
                                                                $totalearning = 0;
                                                                $qry = "SELECT * FROM payslip WHERE stfid='$stfid' AND type='Reimbursement'";
                                                                $qryRun = $conn->query($dbcon, $qry);
                                                                if ($conn->sqlnum($qryRun) > 0) {
                                                                    while ($items = $conn->fetch($qryRun)) {
                                                                        $totalearning += $items['dvalue'];
                                                                        $cont++;
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <small><?php echo $cont; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <small><?php echo $items['name']; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <small><?php echo $items['dvalue']; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <small><?php echo $items['status']; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <a href="dashboard.php?stfid=<?php echo $stfid ?>&genpaystruct&slipremuvid=<?php echo $items['id']; ?>"><i
                                                                                            class="icon-trash"></i></a></td>
                                                                        </tr>

                                                                    <?php } ?>
                                                                    <tr style="background-color: #CCC; font-weight: bold; font-size: large">
                                                                        <td>&nbsp;</td>
                                                                        <td>Total</td>
                                                                        <td><?php echo number_format($totalearning, 2); ?></td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                <?php } else { ?>
                                                                    <tr>
                                                                        <td colspan="5">No Record Available</td>
                                                                    </tr>
                                                                <?php } ?>
                                                                <tr>
                                                                    <td><a data-toggle="modal" data-target="#reimbursement"
                                                                           onclick="addreimb('<?php echo $stfid; ?>')">Add
                                                                            Reimbursement</a></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="stfallowance">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Earnings</h6>
                                                        <div class="panel panel-white">
                                                            <table class="table-striped table" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Value</th>
                                                                    <th>Status</th>
                                                                    <th>Detach</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                $cont = 0;
                                                                $totalearning = 0;
                                                                $qry = "SELECT * FROM payslip WHERE stfid='$stfid' AND type='Earning'";
                                                                $qryRun = $conn->query($dbcon, $qry);
                                                                if ($conn->sqlnum($qryRun) > 0) {
                                                                    while ($items = $conn->fetch($qryRun)) {
                                                                        $totalearning += $items['dvalue'];
                                                                        $cont++;
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <small><?php echo $cont; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <small><?php echo $items['name']; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <small><?php echo $items['dvalue']; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <small><?php echo $items['status']; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <a href="dashboard.php?stfid=<?php echo $stfid ?>&genpaystruct&slipremuvid=<?php echo $items['id']; ?>"><i
                                                                                            class="icon-trash"></i></a></td>
                                                                        </tr>

                                                                    <?php } ?>
                                                                    <tr style="background-color: #CCC; font-weight: bold; font-size: large">
                                                                        <td>&nbsp;</td>
                                                                        <td>Total</td>
                                                                        <td><?php echo number_format($totalearning, 2); ?></td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                <?php } else { ?>
                                                                    <tr>
                                                                        <td colspan="5">No Record Available</td>
                                                                    </tr>
                                                                <?php } ?>
                                                                <tr>
                                                                    <td><a data-toggle="modal" data-target="#earning"
                                                                           onclick="addearn('<?php echo $stfid; ?>')">Add Earning</a>
                                                                    </td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="tab-pane" id="stfdeduction">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Deductions</h6>
                                                        <div class="panel panel-white">
                                                            <table class="table-striped table" width="100%">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Name</th>
                                                                    <th>Value</th>
                                                                    <th>Status</th>
                                                                    <th>Detach</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                $cont = 0;
                                                                $totalearning = 0;
                                                                $qry = "SELECT * FROM payslip WHERE stfid='$stfid' AND type='Deduction'";
                                                                $qryRun = $conn->query($dbcon, $qry);
                                                                if ($conn->sqlnum($qryRun) > 0) {
                                                                    while ($items = $conn->fetch($qryRun)) {
                                                                        $totalearning += $items['dvalue'];
                                                                        $cont++;
                                                                        ?>
                                                                        <tr>
                                                                            <td>
                                                                                <small><?php echo $cont; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <small><?php echo $items['name']; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <small><?php echo $items['dvalue']; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <small><?php echo $items['status']; ?></small>
                                                                            </td>
                                                                            <td>
                                                                                <a href="dashboard.php?stfid=<?php echo $stfid ?>&genpaystruct&slipremuvid=<?php echo $items['id']; ?>"><i
                                                                                            class="icon-trash"></i></a></td>
                                                                        </tr>

                                                                    <?php } ?>
                                                                    <tr style="background-color: #CCC; font-weight: bold; font-size: large">
                                                                        <td>&nbsp;</td>
                                                                        <td>Total</td>
                                                                        <td><?php echo number_format($totalearning, 2); ?></td>
                                                                        <td>&nbsp;</td>
                                                                        <td>&nbsp;</td>
                                                                    </tr>
                                                                <?php } else { ?>
                                                                    <tr>
                                                                        <td colspan="5">No Record Available</td>
                                                                    </tr>
                                                                <?php } ?>
                                                                <tr>
                                                                    <td><a data-toggle="modal" data-target="#deduction"
                                                                           onclick="adddeduct('<?php echo $stfid; ?>')">Add
                                                                            Deduction</a></td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                    <td>&nbsp;</td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="payslip">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Staff Generated Payslips</h6>
                                                        <div class="panel panel-white">
                                                            <table class="table table-striped media-library table-lg">
                                                                <thead>
                                                                <tr>
                                                                    <th>Payslip #</th>
                                                                    <th>Basic Salary</th>
                                                                    <th style="color:#0CC03D">Gross Salary</th>
                                                                    <th style="color:#217BE1">Total Deductions</th>
                                                                    <th style="color:#D9E300">Net Salary</th>
                                                                    <th style="color:#D9E300">Bank Deposit</th>
                                                                    <th style="color:#D9E300">Reimbursement</th>
                                                                    <th>View</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                $cont = 0;
                                                                //$qry="SELECT s.slipid,s.voka_id,s.name,s.type,s.value, sm.slipid, sm.basic, sm.totded, sm.totearn, sm.sdate, sm.edate FROM stfpayslip AS s INNER JOIN payslipsummary AS sm ON s.slipid=sm.slipid";
                                                                $qry = "SELECT * FROM payslipsummary WHERE status='Approved' AND stfid='$stfid' ORDER BY timestamp DESC";
                                                                $qryRun = $conn->query($dbcon, $qry);
                                                                while ($getData = $conn->fetch($qryRun)) {
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <small><?php echo $getData['slipid']; ?></small>
                                                                        </td>
                                                                        <td>
                                                                            <small><?php echo $getData['basic']; ?></small>
                                                                        </td>
                                                                        <td style="color:#0CC03D">
                                                                            <small><?php echo number_format($getData['totearn'], 2) ?></small>
                                                                        </td>
                                                                        <td style="color:#217BE1">
                                                                            <small><?php echo $getData['totded']; ?></small>
                                                                        </td>
                                                                        <td style="color:#D9E300">
                                                                            <small><?php echo number_format(($getData['totearn'] - $getData['totded']), 2); ?></small>
                                                                        </td>
                                                                        <td style="color:#D9E300">
                                                                            <small><?php echo number_format(($getData['totearn'] - ($getData['totded'] + $getData['totreimb'])), 2); ?></small>
                                                                        </td>
                                                                        <td style="color:#D9E300">
                                                                            <small><?php echo number_format($getData['totreimb'], 2) ?></small>
                                                                        </td>
                                                                        <td>
                                                                            <a href="dashboard.php?viewpayslip=<?php echo $getData['slipid']; ?>"
                                                                               class="btn btn-sm btn-success"><i
                                                                                        class="icon icon-eye"></i></a></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['generateslip'])){
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users position-left"></i>Generate Staff Pay Slips</h4></div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Staff Payroll</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Generate Payslip</li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <!-- /main charts -->
                    <form method="get">
                        <div class="row" align="left">
                            <div class="col-md-12">
                                <h5>Select Staff To Generate Payslip</h5>
                                <div class="panel panel-white">
                                    <table class="table-striped table-bordered table" width="100%">
                                        <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Basic</th>
                                            <th>Total Earnings</th>
                                            <th>Reimbursements</th>
                                            <th>Gross Salary</th>
                                            <th>Total Deductions</th>
                                            <th>Net Amount</th>

                                            <th>View</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $qry = "SELECT * FROM staff WHERE status='Active' ORDER BY fname ASC";
                                        $qryRun = $conn->query($dbcon, $qry);
                                        while ($getData = $conn->fetch($qryRun)) {
                                            $stfid = $getData['stfid'];
                                            $name = $getData['fname'] . " " . $getData['lname'];
                                            $position = $getData['post'];
                                            //GETTING THE DETAILS OF THEIR PAY STRUCTURE
                                            $getbasic = "SELECT dvalue FROM payslip WHERE stfid='$stfid' AND type='Basic'";
                                            $getbasicrun = $conn->query($dbcon, $getbasic);
                                            $getbasicdata = $conn->fetch($getbasicrun);
                                            $basicamnt = $getbasicdata['dvalue'];//BASIC AMOUNT

                                            $getearn = "SELECT SUM(dvalue) AS totearn FROM payslip WHERE stfid='$stfid' AND type = 'Earning'";
                                            $getearnrun = $conn->query($dbcon, $getearn);
                                            $getearndata = $conn->fetch($getearnrun);
                                            $earnamnt = $getearndata['totearn'];//EARNINGS AMOUNT

                                            $getded = "SELECT SUM(dvalue) AS totded FROM payslip WHERE stfid='$stfid' AND type='Deduction'";
                                            $getdedrun = $conn->query($dbcon, $getded);
                                            $getdeddata = $conn->fetch($getdedrun);
                                            $dedamnt = $getdeddata['totded'];//EARNINGS AMOUNT

                                            $getreimb = "SELECT SUM(dvalue) AS totreimb FROM payslip WHERE stfid='$stfid' AND type='Reimbursement'";
                                            $getreimbrun = $conn->query($dbcon, $getreimb);
                                            $getreimbdata = $conn->fetch($getreimbrun);
                                            $reimbamnt = $getreimbdata['totreimb'];//EARNINGS AMOUNT
                                            $totalearning = ($basicamnt + $earnamnt + $reimbamnt);
                                            ?>
                                            <tr>
                                                <td align="center"><input type="checkbox" class="uniform"
                                                                          name="check_list[]"
                                                                          value="<?php echo $stfid; ?>"></td>
                                                <td>
                                                    <small><?php echo $name; ?></small>
                                                </td>
                                                <td>
                                                    <small><?php echo $position; ?></small>
                                                </td>
                                                <td>
                                                    <small><?php echo number_format($basicamnt, 2) ?></small>
                                                </td>
                                                <td>
                                                    <small><?php echo number_format($earnamnt, 2); ?></small>
                                                </td>
                                                <td>
                                                    <small><?php echo number_format($reimbamnt, 2); ?></small>
                                                </td>
                                                <td>
                                                    <small><?php echo number_format($totalearning, 2); ?></small>
                                                </td>
                                                <td>
                                                    <small><?php echo number_format($dedamnt, 2); ?></small>
                                                </td>
                                                <td>
                                                    <small><?php echo number_format(($totalearning - $dedamnt), 2); ?></small>
                                                </td>

                                                <td class="text-center"><a
                                                            href="dashboard.php?genpaystruct&stfid=<?php echo $stfid; ?>"
                                                            class="btn btn-sm btn-success"><i class="icon icon-eye"></i> View Structure</a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row" align="center" style="border: thin groove #06112C; margin: 2%;">
                            <div class="col-md-4"><label>From</label><input type="date" required class="form-control" name="startdate" value="<?php echo date('Y-m-d'); ?>"/></div>
                            <div class="col-md-4"><label>To</label><input type="date" class="form-control" required name="enddate" value="<?php echo date('Y-m-d'); ?>"/></div>
                            <div class="col-md-4"><label>Click To Generate Payslip</label><br>
                                <input type="submit" class="btn btn-lg btn-primary" name="createpayslip" value="Generate Payslips">
                            </div>
                        </div>
                    </form>
                 </div>
              </div>
        <?php }elseif (isset($_GET['createpayslip'])) {
            $vokas = $_GET['check_list'];
            $sdate = $_GET['startdate'];
            $edate = $_GET['enddate'];
            if (!empty($vokas)) {?>
            <div id="ptable">
                <?php
                foreach ($_GET['check_list'] as $selected) {
                    //CHECK IF PAYSLIP HAS BEEN PRODUCED ALREADY
                    $stfid = $selected;
                    //getting the staff details
                    $selstf = "SELECT stfid, img, contact, email, fname, lname, post FROM staff WHERE stfid='$stfid'";
                    $selrun = $conn->query($dbcon, $selstf);
                    $stfdata = $conn->fetch($selrun);

                    //GET THE TOTAL NUMBER OF GENERATED PAYSLIPS
                    $selchk = "SELECT slipid FROM payslipsummary WHERE stfid = '$stfid'";
                    $selchkrun = $conn->query($dbcon,$selchk);
                    $selnum = $conn->sqlnum($selchkrun);

                    //PAYSLIP ID
                    $slipid = str_replace("/","",$stfid)."/".$Curryear."/".str_pad(($selnum + 1),4,"0",STR_PAD_LEFT);

                    //GETTING THE BASIC SALARY AND INSERTING IT
                    $basic = "SELECT dvalue FROM payslip WHERE stfid='$stfid' AND type='Basic'";
                    $basicrun = $conn->query($dbcon, $basic);
                    $basicdata = $conn->fetch($basicrun);
                    $baseamnt = $basicdata['dvalue'];

                    $insbasic = "INSERT INTO stfpayslip SET slipid='$slipid',stfid='$stfid', name='Basic', type='Basic', dvalue='$baseamnt'";
                    $conn->query($dbcon, $insbasic);
                    //get the payment voucher component
                    $stfslip = "SELECT * FROM payslip WHERE stfid='$stfid' AND status='Active' ORDER BY type ASC";
                    $stfslipqry = $conn->query($dbcon, $stfslip);
                    $stfslipdata = $conn->fetch($stfslipqry);
                    while ($items = $conn->fetch($stfslipqry)) {
                        $name = $items['name'];
                        $type = $items['type'];
                        $amnt = $items['dvalue'];
                        //INSERT INTO THE CREATE PAYSLIP Table
                        $ins = "INSERT INTO stfpayslip SET slipid='$slipid',stfid='$stfid', name='$name', type='$type', dvalue='$amnt'";
                        $conn->query($dbcon, $ins);
                    }
                    ?>
                    <div class="panel panel-white" style="margin: 1%; border: thick groove #06112C" id="ptable">

                        <div class="panel-body no-padding-bottom">
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="color: #000; font-weight: bold; text-align: center; background-color: #06112C; font-size: x-large; color: #FFF;"><?php echo strtoupper($cname); ?></p>
                                    <p style="color: #000; font-weight: bold; text-align: center; font-size: large;">
                                        Employee Payslip</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <table width="50%">
                                        <tr>
                                            <td align="left"><p style="font-weight: bold; color: #000;">Employee
                                                    Name:</p></td>
                                            <td align="center"><p
                                                        style="font-weight: bold; color: #06112C;"><?php echo checkName($stfid); ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"><p style="font-weight: bold; color: #000;">Employee #:</p>
                                            </td>
                                            <td align="center"><p
                                                        style="font-weight: bold; color: #06112C;"><?php echo $stfid; ?></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table width="50%">
                                        <tr>
                                            <td align="left"><p style="font-weight: bold; color: #000;">
                                                    Period:</p></td>
                                            <td align="center"><p
                                                        style="font-weight: bold; color: #06112C;"><?php echo date("d M,Y", strtotime(date($sdate))) . "  -  " . date("d M,Y", strtotime(date($edate))); ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"><p style="font-weight: bold; color: #000;">Payslip No:</p></td>
                                            <td align="center"><p
                                                        style="font-weight: bold; color: #06112C;"><?php echo $slipid; ?></p>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 2%;">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table width="100%">
                                            <thead>
                                            <tr>
                                                <th><p style="font-weight: bold; font-size: large">Earnings</p></th>
                                                <th><p style="font-weight: bold; font-size: large">Amount</p></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $earn = "SELECT * FROM payslip WHERE stfid='$stfid' AND type IN ('Earning','Reimbursement','Basic') AND status='Active' ORDER BY type ASC";
                                            $earnRun = $conn->query($dbcon, $earn);
                                            $total = 0;
                                            while ($earnData = $conn->fetch($earnRun)) {
                                                $total += $earnData['dvalue'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $earnData['name']; ?></td>
                                                    <td><?php echo $earnData['dvalue']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td><i style="color:#06112C ; font-weight: bold;">Gross Salary (GS)</i>
                                                </td>
                                                <td>
                                                    <i style="color:#06112C ; font-weight: bold;">GH&cent; <?php echo number_format($total, 2); ?></i>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table width="100%">
                                            <thead>
                                            <tr>
                                                <th><p style="font-weight: bold; font-size: large">Deduction</p></th>
                                                <th><p style="font-weight: bold; font-size: large">Amount</p></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $ded = "SELECT * FROM payslip WHERE stfid='$stfid' AND type='Deduction' AND status='Active'";
                                            $dedRun = $conn->query($dbcon, $ded);
                                            $totalded = 0;
                                            while ($dedData = $conn->fetch($dedRun)) {
                                                //$cont++;
                                                $totalded += $dedData['dvalue'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $dedData['name']; ?></td>
                                                    <td><?php echo $dedData['dvalue']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td><i style="color:#06112C ; font-weight: bold;">Total Deductions
                                                        (TD)</i></td>
                                                <td>
                                                    <i style="color:#06112C ; font-weight: bold;">GH&cent; <?php echo number_format($totalded, 2); ?></i>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><i style="color:#06112C ; font-weight: bold;">Net Salary (GS -
                                                        TD)</i></td>
                                                <td>
                                                    <i style="color:#06112C ; font-weight: bold;">GH&cent; <?php echo number_format(($total - $totalded), 2); ?></i>
                                                </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 2%;">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table width="100%">
                                            <thead>
                                            <tr>
                                                <th><p style="font-weight: bold; font-size: large">Appropriation</p>
                                                </th>
                                                <th><p style="font-weight: bold; font-size: large">Amount</p></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $ded = "SELECT * FROM payslip WHERE stfid='$stfid' AND type='Reimbursement' AND status='Active'";
                                            $dedRun = $conn->query($dbcon, $ded);
                                            $cont = 0;
                                            $totalreimb = 0;
                                            while ($dedData = $conn->fetch($dedRun)) {
                                                $totalreimb += $dedData['dvalue'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $dedData['name']; ?></td>
                                                    <td><?php echo number_format($dedData['dvalue'], 2); ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td>Bank Deposit</td>
                                                <td><?php echo number_format((($total - $totalreimb) - $totalded), 2); ?></td>
                                            </tr>
                                            <!--<tr>
													<td><i style="color:#06112C ; font-weight: bold;">Total</i></td>
													<td><i style="color:#06112C ; font-weight: bold;">GH&cent; <?php echo number_format((($total - $totalded) + $totalreimb), 2); ?></i></td>
												</tr>-->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    //INSERTING THE SUMMARY RECORD
                    $ins = "INSERT INTO payslipsummary SET totreimb=$totalreimb, stfid='$stfid', slipid='$slipid', totded=$totalded, totearn=$total , basic=$baseamnt, status='Approved', sdate='$sdate', edate='$edate'";
                    $conn->query($dbcon, $ins);
                }?>
            </div>
                <?php
            } else {
                $test = "no";
                $msg = "You Did Not Select Any Staff";
            }
            ?>
            <!-- Dashboard -->
        <?php }elseif (isset($_GET['students_invoices'])){
            $selstf = "SELECT * FROM student_invoices ORDER BY created_date DESC";
            $selstfrun = $conn->query($dbcon,$selstf);

            $paid="SELECT SUM(totalamount) as totalamount, SUM(paid) AS totalpaid, SUM(totalamount - paid) AS totalarrears FROM student_invoices";
            $paidrun = $conn->query($dbcon,$paid);
            $paiddata = $conn->fetch($paidrun);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash2 position-left"></i>Student Invoices</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash4"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Amount</div>
                                                <div class="text-muted"><?php echo number_format($paiddata['totalamount'],2); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-visitors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash3"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Paid</div>
                                                <div class="text-muted"><?php echo number_format($paiddata['totalpaid'],2); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-sessions"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Arrears</div>
                                                <div class="text-muted"><?php echo number_format($paiddata['totalarrears'],2); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Fees Management</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Invoices</li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table media-library table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <!--<th>Image</th>-->
                                                <th>Student ID</th>
                                                <th>Invoice ID</th>
                                                <th>Name</th>
                                                <th>Invoice Date</th>
                                                <th>Amount</th>
                                                <th>Paid</th>
                                                <th>Arrears</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($data = $conn->fetch($selstfrun)){
                                                $invid = $data['invoiceid'];
                                                $stdid = $data['stdid'];
                                                ?>
                                                <tr>
                                                    <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                                    <td><?php echo $data['stdid']; ?></td>
                                                    <td><a href="dashboard.php?student_invoice=<?php echo $invid; ?>"><?php echo $data['invoiceid']; ?></a></td>
                                                    <td><a href="dashboard.php?student_details=<?php echo $stdid; ?>"><?php echo getstudent($stdid); ?></a></td>
                                                    <td><?php echo $data['invdate']; ?></td>
                                                    <td><?php echo $data['totalamount']; ?></td>
                                                    <td><?php echo $data['paid']; ?></td>
                                                    <td><?php echo number_format(($data['totalamount'] - $data['paid']),2,'.',','); ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['occupants'])){
            $selstf = "SELECT * FROM hostel_invoices ORDER BY created_date DESC";
            $selstfrun = $conn->query($dbcon,$selstf);

            $paid="SELECT SUM(totalamount) as totalamount, SUM(paid) AS totalpaid, SUM(totalamount - paid) AS totalarrears FROM hostel_invoices";
            $paidrun = $conn->query($dbcon,$paid);
            $paiddata = $conn->fetch($paidrun);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-home9 position-left"></i>Hostel Management</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash4"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Amount</div>
                                                <div class="text-muted"><?php echo number_format($paiddata['totalamount'],2); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-visitors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash3"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Paid</div>
                                                <div class="text-muted"><?php echo number_format($paiddata['totalpaid'],2); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-sessions"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Arrears</div>
                                                <div class="text-muted"><?php echo number_format($paiddata['totalarrears'],2); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Hostel Management</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Invoices</li>
                        </ul>
                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addoccupant"><i class="icon-add-to-list position-left"></i> Add New Occupant</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table media-library table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <!--<th>Image</th>-->
                                                <th>Invoice ID</th>
                                                <th>Name</th>
                                                <th>Invoice Date</th>
                                                <th>Amount</th>
                                                <th>Paid</th>
                                                <th>Arrears</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Room</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            while($data = $conn->fetch($selstfrun)){
                                                $invid = $data['invoiceid'];
                                                $stdid = $data['stdid'];
                                                ?>
                                                <tr>
                                                    <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                                    <td><a href="dashboard.php?hostel_invoice=<?php echo $invid; ?>"><?php echo $data['invoiceid']; ?></a></td>
                                                    <td><a href="dashboard.php?student_details=<?php echo $stdid; ?>"><?php echo getstudent($stdid); ?></a></td>
                                                    <td><?php echo $data['invdate']; ?></td>
                                                    <td><?php echo $data['totalamount']; ?></td>
                                                    <td><?php echo $data['paid']; ?></td>
                                                    <td><?php echo number_format(($data['totalamount'] - $data['paid']),2,'.',','); ?></td>
                                                    <td><?php echo $data['sdate']; ?></td>
                                                    <td><?php echo $data['edate']; ?></td>
                                                    <td><?php echo $data['room']; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['bank_deposits'])){
            $selstf = "SELECT * FROM bank_deposits ORDER BY dod DESC";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-piggy-bank position-left"></i>Bank Deposits</h4></div>
                            <div class="col-md-6">
                                <div class="row">

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>
                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-piggy-bank"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Number Of Deposits</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-visitors"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-user position-left"></i> Bank Deposits</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Deposits</li>
                        </ul>
                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#bankdeposit"><i class="icon-add-to-list position-left"></i> Bank Deposit</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table media-library table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Bank Code</th>
                                                <th>Bank Name</th>
                                                <th>Cheque Number</th>
                                                <th>Amount On Cheque</th>
                                                <th>Date Of Deposit</th>
                                                <th>Slip</th>
                                                <th>Description</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count= 0;
                                            while($data = $conn->fetch($selstfrun)){
                                                $depid = $data['id'];
                                                $fullurl = $data['slip'];
                                                $count++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $data['bankcode']; ?></td>
                                                    <td><?php echo getbank($data['bankcode']); ?></td>
                                                    <td><?php echo $data['chq']; ?></td>
                                                    <td><?php echo number_format($data['chqamount'],2,'.',','); ?></td>
                                                    <td><?php echo $data['dod']; ?></td>
                                                    <td><a onclick="viewpdf('<?php echo $fullurl; ?>')">View Slip</a></td>
                                                    <td><?php echo $data['description']; ?></td>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['viewpayslip'])){
            $slipid = $_GET['viewpayslip'];
            //get the payment voucher component
            $stfslip = "SELECT * FROM payslipsummary WHERE slipid='$slipid'";
            $stfslipqry = $conn->query($dbcon, $stfslip);
            $stfslipdata = $conn->fetch($stfslipqry);
            $voka = $stfslipdata['stfid'];
            $slipid = $stfslipdata['slipid'];

            //GETTING THE STAFF INFORMATION
            $stf = "SELECT contact, email FROM staff WHERE stfid = '$voka'";
            $stfqry = $conn->query($dbcon, $stf);
            $stfdata = $conn->fetch($stfqry);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash2 position-left"></i>Staff Payslip</h4></div>
                        </div>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-white" style="margin: 1%; border: thick groove #06112C" id="ptable">

                                <div class="panel-body no-padding-bottom">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p style="color: #000; font-weight: bold; text-align: center; background-color: #06112C; font-size: x-large; color: #FFF;"><?php echo strtoupper($cname); ?></p>
                                            <p style="color: #000; font-weight: bold; text-align: center; font-size: large;">Employee
                                                Payslip</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <table width="50%">
                                                <tr>
                                                    <td align="left"><p style="font-weight: bold; color: #000;">Name:</p></td>
                                                    <td align="center"><p style="color: #06112C;"><?php echo checkName($voka); ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left"><p style="font-weight: bold; color: #000;">ID:</p></td>
                                                    <td align="center"><p style="color: #06112C;"><?php echo $voka; ?></p></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table width="50%">
                                                <tr>
                                                    <td align="left"><p style="font-weight: bold; color: #000;">Payslip Period:</p></td>
                                                    <td align="center"><p
                                                                style="color: #06112C;"><?php echo date("d M,Y", strtotime(date($stfslipdata['sdate']))) . "  -  " . date("d M,Y", strtotime(date($stfslipdata['edate']))); ?></p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="left"><p style="font-weight: bold; color: #000;">Payslip No:</p></td>
                                                    <td align="center"><p style="color: #06112C;"><?php echo $slipid; ?></p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 2%;">
                                        <div class="col-md-6">
                                            <div class="table-responsive">
                                                <table width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th><p style="font-weight: bold; font-size: large">Earnings</p></th>
                                                        <th><p style="font-weight: bold; font-size: large">Amount</p></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $earn = "SELECT * FROM stfpayslip WHERE slipid='$slipid' AND type IN ('Earning','Reimbursement','Basic') ORDER BY type ASC";
                                                    $earnRun = $conn->query($dbcon, $earn);
                                                    $total = 0;
                                                    while ($earnData = $conn->fetch($earnRun)) {
                                                        $total += $earnData['dvalue'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $earnData['name']; ?></td>
                                                            <td><?php echo $earnData['dvalue']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td><i style="color:#06112C ; font-weight: bold;">Gross Salary (GS)</i></td>
                                                        <td>
                                                            <i style="color:#06112C ; font-weight: bold;">GH&cent; <?php echo number_format($total, 2); ?></i>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="table-responsive">
                                                <table width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th><p style="font-weight: bold; font-size: large">Deduction</p></th>
                                                        <th><p style="font-weight: bold; font-size: large">Amount</p></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $ded = "SELECT * FROM stfpayslip WHERE slipid='$slipid' AND type='Deduction'";
                                                    $dedRun = $conn->query($dbcon, $ded);
                                                    $totalded = 0;
                                                    while ($dedData = $conn->fetch($dedRun)) {
                                                        //$cont++;
                                                        $totalded += $dedData['dvalue'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $dedData['name']; ?></td>
                                                            <td><?php echo $dedData['dvalue']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td><i style="color:#06112C ; font-weight: bold;">Total Deductions (TD)</i></td>
                                                        <td>
                                                            <i style="color:#06112C ; font-weight: bold;">GH&cent; <?php echo number_format($totalded, 2); ?></i>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><i style="color:#06112C ; font-weight: bold;">Net Salary (GS - TD)</i></td>
                                                        <td>
                                                            <i style="color:#06112C ; font-weight: bold;">GH&cent; <?php echo number_format(($total - $totalded), 2); ?></i>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 2%;">
                                        <div class="col-md-6">
                                            <div class="table-responsive">
                                                <table width="100%">
                                                    <thead>
                                                    <tr>
                                                        <th><p style="font-weight: bold; font-size: large">Appropriation</p></th>
                                                        <th><p style="font-weight: bold; font-size: large">Amount</p></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $ded = "SELECT * FROM payslip WHERE stfid='$voka' AND type='Reimbursement' AND status='Active'";
                                                    $dedRun = $conn->query($dbcon, $ded);
                                                    $cont = 0;
                                                    $totalreimb = 0;
                                                    while ($dedData = $conn->fetch($dedRun)) {
                                                        $totalreimb += $dedData['dvalue'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $dedData['name']; ?></td>
                                                            <td><?php echo number_format($dedData['dvalue'], 2); ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td>Bank Deposit</td>
                                                        <td><?php echo number_format((($total - $totalreimb) - $totalded), 2); ?></td>
                                                    </tr>
                                                    <!--<tr>
													<td><i style="color:#06112C ; font-weight: bold;">Total</i></td>
													<td><i style="color:#06112C ; font-weight: bold;">GH&cent; <?php echo number_format((($total - $totalded) + $totalreimb), 2); ?></i></td>
												</tr>-->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" align="center">
                                    <a class="btn btn-lg" href="javascript:void(0);" onclick="javascript:window.print();"
                                       style="background-color: #000; color: #FFF;"><i class="icon icon-printer"></i> Print</a>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['viewPV'])) {
                 $pvid = $_GET['viewPV'];
                 $pvdet = "SELECT * FROM pv_detail WHERE pv_id='$pvid'";
                 $pvdetRun = $conn->query($dbcon, $pvdet);
                 $pvData = $conn->fetch($pvdetRun);

                 $comp = $pvData['dept'];
                 $docs = $pvData['documents'];
                 $chekno = $pvData['chekno'];
                 $status = $pvData['status'];
                 $dsupply = $pvData['supplier'];
                 //GETTING THE COMMENTS
                 $getcomm = "SELECT * FROM pv_comment WHERE pv_id='$pvid'";
                 $getcommrun = $conn->query($dbcon, $getcomm);
                 $getcommdata = $conn->fetch($getcommrun);
                 ?>
                 <!-- Invoice template -->
                 <div class="panel panel-white" style="margin: 2%">
                     <div class="panel-heading">
                         <h5 class="text-uppercase text-semibold">PV#: <?php echo $pvData['pv_id']; ?></h5>
                     </div>

                     <div class="panel-body no-padding-bottom">
                         <div class="row">
                             <div class="col-md-2"><label>Documents Uploaded</label></div>
                             <?php
                             for ($i = 1; $i <= $docs; $i++) {
                                 $ref = $pvid . "(" . $i . ")";
                                 //ge the name of the file
                                 $docget = "SELECT fname FROM pvdoc WHERE ref='$ref'";
                                 $docqry = $conn->query($dbcon, $docget);
                                 $docdata = $conn->fetch($docqry);
                                 $docname = $docdata['fname'];
                                 $url = "";
                                 if ($conn->sqlnum($docqry) != 0) {
                                     $url = $docdata['fname'];
                                     $fullurl = "assets/data/pvdocs/" . $docname;
                                     ?>
                                     <div class="col-md-2">
                                         <!--<a href="javascript:void(0)"
                                       onclick="window.location.href='<?php /*echo "assets/data/pvdocs/" . $pvid . '(' . $i . ').pdf'; */?>'"
                                       target="new"><?php /*echo $url */?></a>-->
                                         <a onclick="viewpdf('<?php echo $fullurl; ?>')"><?php echo $url; ?></a>
                                         <!--<a href="<?php echo "assets/data/pvdocs/" . $pvid . '(' . $i . ').pdf'; ?>" target="new"><?php echo $url ?></a>-->
                                     </div>
                                 <?php }
                             } ?>
                         </div>
                         <div class="row">
                             <div class="col-md-12">
                                 <?php
                                 if ($pvData['chq'] == "yes") {
                                     echo "<label>Cheque No: </label>" . $pvData['chekno'];
                                 }
                                 ?>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-6 content-group">
                                 <h5>Department</h5>
                                 <ul class="list-condensed list-unstyled">
                                     <li><label>Name: </label><?php echo $comp; ?></li>
                                 </ul>
                             </div>

                             <div class="col-md-6 content-group">
                                 <div class="invoice-details">
                                     <ul class="list-condensed list-unstyled">
                                         <li><label>Date:</label> <span
                                                     class="text-semibold"><?php $pvdate = $pvData['app_date'];
                                                 echo date("l, d M, Y H:i:s A", strtotime(date($pvdate))); ?></span></li>
                                         <li><label>Currency: </label><?php echo $pvData['curr']; ?></li>
                                         <li><label>Exchange Rate: </label><?php echo $pvData['exchrate']; ?></li>
                                     </ul>
                                 </div>
                             </div>
                         </div>

                         <div class="row">
                             <div class="col-md-6 col-lg-9 content-group">
                                 <span class="text-muted"><h5>Applicant:</h5></span>
                                 <ul class="list-condensed list-unstyled">
                                     <li><?php echo checkName($pvData['stfid']); ?></li>
                                 </ul>
                                 <span class="text-muted"><h5>Beneficiary:</h5></span>
                                 <ul class="list-condensed list-unstyled">
                                     <li><?php echo $dsupply; ?>
                                     </li>
                                 </ul>
                             </div>

                             <div class="col-md-6 col-lg-3 content-group">
                                 <ul class="list-condensed list-unstyled invoice-payment-details">
                                     <li><label>Status:</label> <span class="text-right text-semibold"><?php echo $status; ?></span></li>
                                     <li>Expense Classification: <span class="text-left text-semibold"><?php echo getexp($pvData['expense_class']); ?></span></li>
                                     <li>Debit Account: <span class="text-left text-semibold"><?php echo getBank($pvData['bankCode']); ?></span></li>
                                 </ul>

                             </div>
                         </div>
                     </div>

                     <div class="table-responsive">
                         <table class="table table-lg table-bordered">
                             <thead>
                             <tr>
                                 <th>#</th>
                                 <th>Date Of Expense</th>
                                 <th>Description</th>
                                 <th>Amount</th>
                             </tr>
                             </thead>
                             <tbody>
                             <?php
                             $pv = "SELECT * FROM pv WHERE pv_id='$pvid'";
                             $pvRun = $conn->query($dbcon, $pv);
                             $cont = 0;
                             $total = 0;
                             while ($pvdetData = $conn->fetch($pvRun)) {
                                 $cont++;
                                 $total += $pvdetData['total'];
                                 ?>
                                 <tr>
                                     <td><?php echo $cont; ?></td>
                                     <td><?php $id = $pvdetData['exp_date'];
                                         echo $rDate = date("d/M/Y", strtotime(date($id))) ?></td>
                                     <td><?php echo $pvdetData['description']; ?></td>
                                     <td><?php echo number_format($pvdetData['total'], 2); ?></td>
                                 </tr>
                             <?php } ?>
                             <tr>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td><i style="color:#0a68b4 ; font-weight: bold;">Total</i></td>
                                 <td>
                                     <i style="color:#0a68b4 ; font-weight: bold;"><?php if ($pvData['curr'] == 'cedis'){ ?>&cent;<?php }else{ ?>&dollar;<?php } ?> <?php echo number_format($total, 2); ?></i>
                                 </td>
                             </tr>
                             <tr>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td><i style="font-weight: bolder;">Total Tax</i></td>
                                 <td>
                                     <i style="font-weight: bolder;"><?php if ($pvData['curr'] == 'cedis'){ ?>&cent;<?php }else{ ?>&dollar;<?php } ?><?php echo number_format($pvData['taxamount'], 2); ?></i>
                                 </td>
                             </tr>
                             <tr>
                                 <td>&nbsp;</td>
                                 <td>&nbsp;</td>
                                 <td><i style="color:#a21309 ; font-weight: bold;">Net Amount</i></td>
                                 <td>
                                     <i style="color:#a21309 ; font-weight: bold;"><?php if ($pvData['curr'] == 'cedis'){ ?>&cent;<?php }else{ ?>&dollar;<?php } ?> <?php echo number_format(($total + $pvData['taxamount']), 2); ?></i>
                                 </td>
                             </tr>
                             </tbody>
                         </table>
                     </div>
                     <?php
                     $sel = "SELECT tax.pv_id, p.pv_id, tax.itemid, tax.amount, tax.percentage, p.id, p.total, p.description FROM pvtax AS tax INNER JOIN pv AS p ON tax.itemid=p.id WHERE tax.pv_id=$pvid";
                     $selRun = $conn->query($dbcon, $sel);
                     $count = 0;
                     ?>
                     <div class="row">
                         <div class="col-md-12">
                             <table class="table table-hover table-responsive table-bordered"
                                    style="color: #000; font-size: small;">
                                 <thead>
                                 <tr>
                                     <th colspan="6"><h3>Tax Details</h3></th>
                                 </tr>
                                 <tr>
                                     <th>#</th>
                                     <th>Description</th>
                                     <th>Amount</th>
                                     <th>Tax %</th>
                                     <th>Tax Amount</th>
                                 </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 if ($conn->sqlnum($selRun) > 0) {
                                     $totaltax = 0;
                                     while ($selData = $conn->fetch($selRun)) {
                                         $count++;
                                         $totaltax += $selData['amount'];
                                         ?>
                                         <tr>
                                             <td><?php echo $count; ?></td>
                                             <td><?php echo $selData['description']; ?></td>
                                             <td><?php echo $selData['total']; ?></td>
                                             <td><?php echo number_format(($selData['percentage'] * 100), 2) . "%"; ?></td>
                                             <td><?php echo $selData['amount']; ?></td>
                                         </tr>

                                     <?php } ?>

                                     <tr>
                                         <td>&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td>&nbsp;</td>
                                         <td>Total</td>
                                         <td><?php echo number_format($totaltax, 2); ?></td>
                                     </tr>
                                 <?php } else { ?>

                                     <tr>
                                         <td colspan="6">No Tax Components Added</td>
                                     </tr>
                                 <?php } ?>

                                 </tbody>
                             </table>
                         </div>
                     </div>
                     <?php
                     if ($status == "Approved") { ?>
                         <div class="row" style="margin: 2%">
                             <div class="col-md-6">
                                 <h5>Approved By</h5>
                                 <p><label>Name:</label><?php echo checkName($pvData['finDir']); ?><br>
                                     <label>Date:</label><?php $adate = $pvData['finDate'];
                                     echo date("d/M/Y H:i:s A", strtotime(date($adate))); ?><br>
                                     <label>Comment:</label><?php echo $getcommdata['director']; ?><br>
                                 </p>
                             </div>
                         </div>
                     <?php }
                     if ($status == "dirReject") {
                         ?>
                         <div class="row" style="margin: 2%">
                             <div class="col-md-6">
                                 <h5>REJECTION DETAILS</h5>
                                 <p><label>Name:</label><?php echo checkName($pvData['finDir']); ?><br>
                                     <label>Date:</label><?php $adate = $pvData['finDate'];
                                     echo date("d/M/Y H:i:s A", strtotime(date($adate))); ?><br>
                                     <label>Comment:</label><?php echo $getcommdata['director']; ?><br>
                                 </p>
                             </div>
                         </div>
                     <?php } ?>
                 </div>

                 <!-- /invoice template -->
             <?php }elseif (isset($_GET['showPV'])) {
            $pvid = $_GET['showPV'];
            $pvdet = "SELECT * FROM pv_detail WHERE pv_id='$pvid'";
            $pvdetRun = $conn->query($dbcon, $pvdet);
            $pvData = $conn->fetch($pvdetRun);
            $docs = $pvData['documents'];
            $dept = $pvData['dept'];
            ?>
            <!-- Invoice template -->
            <div class="panel panel-white" style="margin: 2%">
                <div class="panel-heading">
                    <h6 class="panel-title">Payment Voucher</h6>
                    <div class="heading-elements">
                        <form method="post">
                            <input type="hidden" name="confpvid" value="<?php echo $pvid; ?>"/>
                            <input type="hidden" name="chq" id='dchq' value="no"/>
                            <input type="hidden" name="supp" value="<?php echo $pvData['supervisor']; ?>"/>
                            &nbsp;&nbsp;<!--<input type="checkbox" onchange="chqadd('chqinit')" id='chqinit'/>Issue Cheque-->
                            <!--<input type="text" name="chqno" placeholder="Cheque Number" class="hidden" id="chqno"/>-->
                            <button type="submit" class="btn btn-warning btn-xs heading-btn" name="confirmpv"><i
                                        class="icon-file-check position-left"></i> Proceed
                            </button>
                            <button type="submit" class="btn btn-success btn-xs heading-btn" name="cancelpv"><i
                                        class="icon-cancel-square position-left"></i> Cancel
                            </button>
                            <button type="button" class="btn btn-primary btn-xs heading-btn" data-toggle="modal"
                                    data-target="#pvdocument"><i class="icon-upload10 position-left"></i> Upload Document
                            </button>
                            <button type="button" class="btn btn-danger btn-xs heading-btn" data-toggle="modal"
                                    data-target="#taxadd"><i class="icon-add-to-list position-left"></i> Add Tax
                            </button>
                        </form>
                    </div>
                </div>

                <div class="panel-body no-padding-bottom">
                    <div class="row">
                        <div class="col-md-2"><label>Documents Uploaded</label></div>
                        <?php
                        for ($i = 1; $i <= $docs; $i++) {
                            $ref = $pvid . "(" . $i . ")";
                            //ge the name of the file
                            $docget = "SELECT fname FROM pvdoc WHERE ref='$ref'";
                            $docqry = $conn->query($dbcon, $docget);
                            $docdata = $conn->fetch($docqry);
                            $docname = $docdata['fname'];
                            $url = "";
                            if ($conn->sqlnum($docqry) != 0) {
                                $url = $docdata['fname'];
                                $fullurl=$fullurl = "assets/data/pvdocs/".$docname;
                                ?>
                                <div class="col-md-2">
                                    <div class="navbar-right">
                                        <ul class="nav navbar-nav">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle"
                                                   data-toggle="dropdown"><?php echo $url ?></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li>
                                                        <a onclick="viewpdf('<?php echo $fullurl; ?>')">View</a></li>
                                                    <li>
                                                        <a href="dashboard.php?showPV=<?php echo $pvid; ?>&remattach=<?php echo $ref; ?>"><i
                                                                    class="icon-trash"></i> Detach</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6 content-group">
                            <h5>Department</h5>
                            <ul class="list-condensed list-unstyled">
                                <li><label>Name: </label>  <?php echo $dept; ?></li>
                            </ul>
                        </div>

                        <div class="col-md-6 content-group" align="left">
                            <div class="invoice-details">
                                <h5 class="text-uppercase text-semibold">PV#: <?php echo $pvData['pv_id']; ?></h5>
                                <ul class="list-condensed list-unstyled">
                                    <li><label>Date:</label> <span
                                                class="text-semibold"><?php $pvdate = $pvData['app_date'];
                                            echo date("l, d M, Y H:i:s A", strtotime(date($pvdate))); ?></span></li>
                                    <li><label>Currency: </label><?php echo $pvData['curr']; ?></li>
                                    <li><label>Exchange Rate: </label><?php echo $pvData['exchrate']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7 content-group">
                            <span class="text-muted"><h5>Applicant:</h5></span>
                            <ul class="list-condensed list-unstyled">
                                <li><?php echo checkName($pvData['stfid']); ?></li>
                            </ul>
                            <span class="text-muted"><h5>Beneficiary:</h5></span>
                            <ul class="list-condensed list-unstyled">
                                <li><?php echo $pvData['supplier']; ?>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-5 content-group">
                            <span class="text-muted"><h5>Payment Details:</h5></span>
                            <ul class="list-condensed list-unstyled invoice-payment-details">
                                <li>Total Amount: <span class="text-left text-semibold"><?php echo $pvData['total']; ?></span></li>
                                <li>Expense Classification: <span class="text-left text-semibold"><?php echo getexp($pvData['expense_class']); ?></span></li>
                                <li>Debit Account: <span class="text-left text-semibold"><?php echo getBank($pvData['bankCode']); ?></span></li>
                            </ul>

                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-lg table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Date Of Expense</th>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $pv = "SELECT * FROM pv WHERE pv_id='$pvid'";
                        $pvRun = $conn->query($dbcon, $pv);
                        $cont = 0;
                        $total = 0;
                        while ($pvdetData = $conn->fetch($pvRun)) {
                            $cont++;
                            $total += $pvdetData['total'];
                            ?>
                            <tr>
                                <td><?php echo $cont; ?></td>
                                <td><?php $id = $pvdetData['exp_date'];
                                    echo $rDate = date("d/M/Y", strtotime(date($id))) ?></td>
                                <td><?php echo $pvdetData['description']; ?></td>
                                <td><?php echo number_format($pvdetData['total'], 2); ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><i style="font-weight: bolder;">Total</i></td>
                            <td><i style="font-weight: bolder;"><?php echo number_format($total, 2); ?></i></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><i style="font-weight: bolder;">Total Tax</i></td>
                            <td>
                                <i style="font-weight: bolder;"><?php echo number_format($pvData['taxamount'], 2); ?></i>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td><i style="color:#0a68b4 ; font-weight: bold;">Net Amount</i></td>
                            <td>
                                <i style="color:#0a68b4 ; font-weight: bold;"><?php echo number_format(($total + $pvData['taxamount']), 2) . ' ' . $pvData['curr']; ?></i>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <?php
                $sel = "SELECT tax.pv_id, p.pv_id, tax.itemid, tax.amount, tax.percentage, tax.id, p.total, p.description FROM pvtax AS tax INNER JOIN pv AS p ON tax.itemid=p.id WHERE tax.pv_id=$pvid";
                $selRun = $conn->query($dbcon, $sel);
                $count = 0;
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-responsive table-bordered"
                               style="color: #000; font-size: small;">
                            <thead>
                            <tr>
                                <th colspan="6"><h3>Tax Details</h3></th>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Tax %</th>
                                <th>Tax Amount</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ($conn->sqlnum($selRun) > 0) {
                                $totaltax = 0;
                                while ($selData = $conn->fetch($selRun)) {
                                    $count++;
                                    $totaltax += $selData['amount'];
                                    ?>
                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $selData['description']; ?></td>
                                        <td><?php echo $selData['total']; ?></td>
                                        <td><?php echo number_format(($selData['percentage'] * 100), 2) . "%"; ?></td>
                                        <td><?php echo $selData['amount']; ?></td>
                                        <td>
                                            <a href="dashboard.php?showPV=<?php echo $pvid; ?>&remtax=<?php echo $selData['id']; ?>&amount=<?php echo $selData['amount']; ?>"
                                               class="btn btn-sm"><i class="icon-trash"></i></a></td>
                                    </tr>

                                <?php } ?>

                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>Total</td>
                                    <td><?php echo number_format($totaltax, 2); ?></td>
                                </tr>
                            <?php } else { ?>

                                <tr>
                                    <td colspan="6">No Tax Components Added</td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- MODAL -->
            <div id="pvdocument" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h5 class="modal-title">UPLOAD DOCUMENT</h5>
                        </div>

                        <div class="modal-body">
                            <form method="post" enctype="multipart/form-data" onsubmit="return checkpdf(this);">
                                <input type="hidden" name="showPV" value="<?php echo $pvid; ?>"/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table width="100%" class="table">
                                            <tr>
                                                <label>Upload Document</label>
                                                <td><input type="file" name="pvdocuments" class="form-control"
                                                           id="pvdocument" onchange="generalfileSize('pvdocument')"
                                                           required/>
                                                    <p id="uplresp"
                                                       style="font-size: small; color: #0a68b4;text-align: center;"><i>File
                                                            should not be more than 5 MB.</i></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="center">
                                                    <button type="submit" class="btn btn-success">Upload</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MODAL -->
            <!-- TAX ADDITION MODAL  -->
                 <div id="taxadd" class="modal fade">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal">&times;</button>
                                 <h6 class="modal-title">ADD TAX COMPONENT</h6>
                             </div>

                             <div class="modal-body">
                                 <form method="post">
                                     <input type="hidden" name="pvvid" value="<?php echo $pvid ?>"/>
                                     <div class="row" id="hidethis">
                                         <div class="col-md-12">
                                             <table width="100%" class="table">
                                                 <tr>
                                                     <td align="right">Item:</td>
                                                     <td>
                                                         <select name="itemid" class="select form-control" required>
                                                             <option value=""></option>
                                                             <?php
                                                             $qry = "SELECT * FROM pv WHERE pv_id='$pvid'";
                                                             $qryrun = $conn->query($dbcon, $qry);
                                                             while ($taxdata = $conn->fetch($qryrun)) {
                                                                 ?>
                                                                 <option value="<?php echo $taxdata['id'] . '*' . $taxdata['total']; ?>"><?php echo $taxdata['description'] . " (" . $taxdata['total'] . ")"; ?></option>
                                                             <?php } ?>
                                                         </select>

                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td align="right">Tax:</td>
                                                     <td>
                                                         <select name="tax" class="select form-control">
                                                             <option value=""></option>
                                                             <?php
                                                             $qry = "SELECT * FROM taxconfig WHERE status='Active'";
                                                             $qryrun = $conn->query($dbcon, $qry);
                                                             while ($taxdata = $conn->fetch($qryrun)) {
                                                                 ?>
                                                                 <option value="<?php echo $taxdata['val']; ?>"><?php echo $taxdata['name'] . " (" . ($taxdata['val'] * 100) . "%)"; ?></option>
                                                             <?php } ?>
                                                         </select>

                                                     </td>
                                                 </tr>
                                                 <tr>
                                                     <td colspan="2" align="center">
                                                         <button type="submit" class="btn btn-success"
                                                                 onchange="showLoader()">Add
                                                         </button>
                                                     </td>
                                                 </tr>
                                             </table>
                                         </div>
                                     </div>
                                 </form>
                                 
                             </div>

                             <div class="modal-footer">
                                 <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- /TAX -->
            <!-- /invoice template -->
        <?php }elseif(isset($_GET['courses'])){
            $selstf = "SELECT * FROM course WHERE status = 'Active'";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-book3 position-left"></i>COURSES / PROGRAMS</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Courses</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-cog52 position-left"></i> Configuration</li>
                            <li><i class="icon-book2 position-left"></i> School</li>
                            <li class="maincolor"><i class="icon-book3 position-left"></i> Courses</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#coursereg"><i class="icon-add-to-list position-left"></i> Add New Course</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Course ID</th>
                                                <th>Name</th>
                                                <th>Subjects</th>
                                                <th>Fees (GHS)</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            while($data = $conn->fetch($selstfrun)){
                                                $count+=1;
                                                $cid = $data['cid'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $data['cid']; ?></td>
                                                    <td><?php echo $data['cname']; ?></td>
                                                    <td><?php echo getSubjects($cid); ?></td>
                                                    <td><?php echo $data['fees']; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif(isset($_GET['student_batch'])){
            $selstf = "SELECT * FROM batches";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-graduation position-left"></i>STUDENT BATCHES</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-graduation"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Batches</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-cog52 position-left"></i> Configuration</li>
                            <li><i class="icon-book2 position-left"></i> Students</li>
                            <li class="maincolor"><i class="icon-book3 position-left"></i> Batches</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#batches"><i class="icon-add-to-list position-left"></i> Add New Batch</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped media-library table-responsive">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Batch ID</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Year</th>
                                                <th>Total Students</th>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            while($data = $conn->fetch($selstfrun)){
                                                $count+=1;
                                                $batchno = $data['batchno'];
                                                $bname = $data['bname'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><a href="dashboard.php?batch_details=<?php echo $batchno; ?>&bname=<?php echo $bname; ?>"><?php echo $data['batchno']; ?></a></td>
                                                    <td><?php echo $data['bname']; ?></td>
                                                    <td><?php echo $data['bdesc']; ?></td>
                                                    <td><?php echo $data['dyear']; ?></td>
                                                    <td><?php echo gettotalstd($data['batchno']); ?></td>
                                                    <td><?php echo $data['sdate']; ?></td>
                                                    <td><?php echo $data['edate']; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif(isset($_GET['subjects'])){
            $selstf = "SELECT * FROM subject WHERE status = 'Active'";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-book3 position-left"></i>SUBJECTS</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book-play"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Subjects</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-cog52 position-left"></i> Configuration</li>
                            <li><i class="icon-book2 position-left"></i> School</li>
                            <li class="maincolor"><i class="icon-book3 position-left"></i> Subjects</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#subjectreg"><i class="icon-add-to-list position-left"></i> Add New Subject</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Subject ID</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            while($data = $conn->fetch($selstfrun)){
                                                $count+=1;
                                                ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $data['sbjid']; ?></td>
                                                    <td><?php echo $data['sbj']; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif(isset($_GET['mypayslips'])){
            $qry = "SELECT * FROM payslipsummary WHERE status='Approved' AND stfid='$stfID' ORDER BY timestamp DESC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash4 position-left"></i>My PaySlips</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book-play"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Payslips</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($qryRun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-cog52 position-left"></i> Staff Payroll</li>
                            <li class="maincolor"><i class="icon-cash4 position-left"></i> My Payslips</li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6>Payslips</h6>
                                            <div class="panel panel-white">
                                                <table class="table table-striped media-library table-lg">
                                                    <thead>
                                                    <tr>
                                                        <th>Payslip #</th>
                                                        <th>Basic Salary</th>
                                                        <th style="color:#0CC03D">Gross Salary</th>
                                                        <th style="color:#217BE1">Total Deductions</th>
                                                        <th style="color:#D9E300">Net Salary</th>
                                                        <th style="color:#D9E300">Bank Deposit</th>
                                                        <th style="color:#D9E300">Reimbursement</th>
                                                        <th>View</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $cont = 0;
                                                    while ($getData = $conn->fetch($qryRun)) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <small><?php echo $getData['slipid']; ?></small>
                                                            </td>
                                                            <td>
                                                                <small><?php echo $getData['basic']; ?></small>
                                                            </td>
                                                            <td style="color:#0CC03D">
                                                                <small><?php echo number_format($getData['totearn'], 2) ?></small>
                                                            </td>
                                                            <td style="color:#217BE1">
                                                                <small><?php echo $getData['totded']; ?></small>
                                                            </td>
                                                            <td style="color:#D9E300">
                                                                <small><?php echo number_format(($getData['totearn'] - $getData['totded']), 2); ?></small>
                                                            </td>
                                                            <td style="color:#D9E300">
                                                                <small><?php echo number_format(($getData['totearn'] - ($getData['totded'] + $getData['totreimb'])), 2); ?></small>
                                                            </td>
                                                            <td style="color:#D9E300">
                                                                <small><?php echo number_format($getData['totreimb'], 2) ?></small>
                                                            </td>
                                                            <td>
                                                                <a href="dashboard.php?viewpayslip=<?php echo $getData['slipid']; ?>"
                                                                   class="btn btn-sm btn-success"><i
                                                                            class="icon icon-eye"></i></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php }elseif (isset($_GET['salary_rules'])) {
            $getstf = "SELECT * FROM sal_rules ORDER BY name ASC";
            $getstfRun = $conn->query($dbcon, $getstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-book3 position-left"></i>SALARY RULES</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-books"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Salary Rules</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($getstfRun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-cog52 position-left"></i> Configuration</li>
                            <li><i class="icon-book2 position-left"></i> Payroll</li>
                            <li class="maincolor"><i class="icon-book3 position-left"></i> Salary Rules</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#salrule"><i class="icon-add-to-list position-left"></i> Add Salary Rule</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-lg">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Transaction Type</th>
                                                <th>Basic %</th>
                                                <th class="text-center">Detach</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                                while ($stfdata = $conn->fetch($getstfRun)) {
                                                    $count++;
                                                    $id = $stfdata['id'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $stfdata['name']; ?></td>
                                                        <td><?php echo $stfdata['type']; ?></td>
                                                        <td><?php echo $stfdata['baseval']; ?></td>
                                                        <td class="text-center">
                                                            <a href="dashboard.php?salary_rules&remrule=<?php echo $id; ?>"><i
                                                                        class="icon-trash"></i></a></li>
                                                        </td>
                                                    </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>

        <?php }elseif(isset($_GET['positions'])){
            $selstf = "SELECT * FROM positions WHERE status = 'Active'";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-book3 position-left"></i>STAFF POSITIONS</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">&nbsp;</div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-piggy-bank"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Positions</div>
                                                <div class="text-muted"><?php echo $conn->sqlnum($selstfrun); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-cog52 position-left"></i> Configuration</li>
                            <li><i class="icon-book2 position-left"></i> Staff</li>
                            <li class="maincolor"><i class="icon-book3 position-left"></i> Positions</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#stfpost"><i class="icon-add-to-list position-left"></i> Add New Position</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Traffic sources -->
                            <div class="panel panel-flat">
                                <div class="container-fluid">
                                    <div class="row" style="padding: 1%;">
                                        <table class="table table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Position</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            while($data = $conn->fetch($selstfrun)){
                                                $count+=1;
                                                ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $data['post']; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /traffic sources -->

                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
        <?php } elseif (isset($_GET['student_details'])) {
            $stdid = $_GET['student_details'];
            $sel = "SELECT * FROM students WHERE stdid = '$stdid'";
            $selrun = $conn->query($dbcon,$sel);
            $seldata = $conn->fetch($selrun);

            //GET THE GUARDIAN INFORMATION
            $gud = "SELECT fname, lname, contact FROM std_par WHERE stdid = '$stdid'";
            $gudrun = $conn->query($dbcon,$gud);

            //GET THE INVOICE INFORMATION
            $inv = "SELECT invoiceid, invdate, totalamount, paid, status, created_date FROM student_invoices WHERE stdid='$stdid'";
            $invrun = $conn->query($dbcon,$inv);

            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-user position-left"></i>Student Details</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">Fees</div>
                                                <div class="text-muted"><?php echo $seldata['fees']; ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-visitors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash2"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">Paid</div>
                                                <div class="text-muted"><?php echo $seldata['fees_paid']; ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-sessions"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <aclass="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash3"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">Arrears</div>
                                                <div class="text-muted"><span class="status-mark border-success position-left"></span> <?php echo number_format(($seldata['fees'] - $seldata['fees_paid']),2); ?></div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-users position-left"></i> Students Management</li>
                            <li><a href="dashboard.php?students_data"><i class="icon-user position-left"></i> Students</a></li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Student Details</li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <div class="thumb thumb-slide">
                                    <img src="<?php echo $seldata['img']; ?>" alt="" class="img-responsive img-rounded">
                                </div>

                                <div class="caption text-center">
                                    <h6 class="text-semibold no-margin"><?php echo $seldata['stdid']; ?> <small class="display-block" style="color: #06112C;"><?php echo getCourse($seldata['program']); ?></small></h6>
                                    <ul class="icons-list mt-15">
                                        <li><a data-popup="tooltip" title="<?php echo $seldata['contact']; ?>"><i class="icon-phone2"></i></a></li>
                                        <li><a data-popup="tooltip" title="<?php echo $seldata['email']; ?>"><i class="icon-mail5"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Basic information</h6>
                                </div>

                                <div class="panel-body">
                                    <form method="post">
                                        <input type="hidden" name="stdid" value="<?php echo $seldata['stdid'] ?>" />
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>First Name</label>
                                                    <input type="text" name="fname" value="<?php echo $seldata['fname']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Last name</label>
                                                    <input type="text" name="lname" value="<?php echo $seldata['lname']; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Date Of Birth</label>
                                                    <input type="date" name="dob" value="<?php echo $seldata['dob']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Residential Address</label>
                                                    <input type="text" name="resaddr" value="<?php echo $seldata['resaddr']; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Gender</label>
                                                    <select name="gender" class="select form-control">
                                                        <option value="<?php echo $seldata['sex']; ?>" selected="selected"><?php echo $seldata['sex']; ?></option>
                                                        <option value="Female">Female</option>
                                                        <option value="Male">Male</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Contact</label>
                                                    <input name="contact" type="text" value="<?php echo $seldata['contact']; ?>" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                    <input name="email" type="text" value="<?php echo $seldata['email']; ?>" class="form-control">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Student Type</label>
                                                    <select name="sttype" class="select form-control">
                                                        <option value="<?php echo $seldata['sttype']; ?>" selected="selected"><?php echo $seldata['sttype']; ?></option>
                                                        <option value="Full time">Full Time</option>
                                                        <option value="Top up">Top Up</option>
                                                        <option value="Online">Online</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Course</label>
                                                    <select name="prog" class="select form-control">
                                                        <option value="<?php echo $seldata['program']; ?>" selected="selected"><?php echo getCourse($seldata['program']); ?></option>
                                                        <?php
                                                        while($data = $conn->fetch($cserun)){
                                                            ?>
                                                            <option value="<?php echo $data['cid']; ?>"><?php echo $data['cname']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Residential Status</label>
                                                    <select name="stdres" class="select form-control">
                                                        <option value="<?php echo $seldata['stres']; ?>" selected="selected"><?php echo $seldata['stres']; ?></option>
                                                        <option value="Hostel">Hostel</option>
                                                        <option value="Non-hostel">Non-hostel</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Batch</label>
                                                    <?php
                                                    $cse = "SELECT batchno, bdesc FROM batches WHERE status = 'Active'";
                                                    $cserun = $conn->query($dbcon,$cse);
                                                    ?>
                                                    <select class="select2-active form-control" name="batchno">
                                                        <option value="<?php echo $seldata['batchno']; ?>"><?php echo getbatch($seldata['batchno']); ?></option>
                                                        <?php
                                                        while($data = $conn->fetch($cserun)){
                                                            ?>
                                                            <option value="<?php echo $data['batchno'] ?>"><?php echo $data['bdesc'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Status</label>
                                                    <select name="ststatus" class="select form-control">
                                                        <option value="<?php echo $seldata['status']; ?>" selected="selected"><?php echo $seldata['status']; ?></option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                        <option value="Graduated">Graduated</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary" name="updatestudent">Update Basic Records <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">

                                <div class="panel-body">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs nav-tabs-highlight">
                                            <li class="active"><a href="#course" data-toggle="tab"><i class="icon-books position-left"></i>Course Details</a></li>
                                            <li><a href="#internships" data-toggle="tab"><i class="icon-movie position-left"></i> Internships</a></li>
                                            <li><a href="#academics" data-toggle="tab"><i class="icon-book3 position-left"></i> Examination Records</a></li>
                                            <li><a href="#fees_mgt" data-toggle="tab"><i class="icon-cash4 position-left"></i> Fees Management</a></li>
                                            <li><a href="#parents" data-toggle="tab"><i class="icon-user-tie position-left"></i>Parent / Guardian Information</a></li>

                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="course">
                                                <table class="table table-responsive table-bordered">
                                                    <thead>
                                                        <tr><th colspan="3">STUDENT COURSE DETAILS</th></tr>
                                                        <tr>
                                                            <th>COURSE CODE</th>
                                                            <th>COURSE TITLE</th>
                                                            <th>SUBJECTS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><?php echo $seldata['program']; ?></td>
                                                            <td><?php echo getCourse($seldata['program']); ?></td>
                                                            <td><?php echo getSubjects($seldata['program']); ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="internships">
                                                <table class="table table-responsive table-bordered">
                                                    <thead>
                                                    <tr><th colspan="7">INTERNSHIP DETAILS</th></tr>
                                                    <tr>
                                                        <th>FACILITY NAME</th>
                                                        <th>FACILITY CONTACT</th>
                                                        <th>SUPERVISOR</th>
                                                        <th>SUPERVISOR CONT.</th>
                                                        <th>START DATE</th>
                                                        <th>END DATE</th>
                                                        <th>STATUS</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    //GET THE INTERNSHIP DETAILS OF THE STUDENT
                                                    $int = "SELECT * FROM std_intern WHERE stdid = '$stdid'";
                                                    $intrun = $conn->query($dbcon,$int);
                                                    while($data = $conn->fetch($intrun)){
                                                        ?>
                                                        <tr>
                                                            <td><?php echo getfacility($data['factid']); ?></td>
                                                            <td><?php echo $data['contact']; ?></td>
                                                            <td><?php echo $data['supervisor']; ?></td>
                                                            <td><?php echo $data['contact']; ?></td>
                                                            <td><?php echo $data['start_date']; ?></td>
                                                            <td><?php echo $data['end_date']; ?></td>
                                                            <td><?php echo $data['status']; ?></td>

                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="2"><a data-toggle="modal" href="#addinternship">New Internship</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="fees_mgt">
                                                <table class="table table-responsive table-bordered">
                                                    <thead>
                                                    <tr><th colspan="3">STUDENT FEES DETAILS</th></tr>
                                                    <tr>
                                                        <th>Invoice ID</th>
                                                        <th>Amount</th>
                                                        <th>Paid</th>
                                                        <th>Arrears</th>
                                                        <th>Invoice date</th>
                                                        <th>Created Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        while($data = $conn->fetch($invrun)){
                                                            $invid = $data['invoiceid'];
                                                    ?>
                                                    <tr>
                                                        <td><a href="dashboard.php?student_invoice=<?php echo $invid; ?>"><?php echo $data['invoiceid']; ?></a></td>
                                                        <td><?php echo number_format($data['totalamount'],2,".",","); ?></td>
                                                        <td><?php echo number_format($data['paid'],2,".",","); ?></td>
                                                        <td><?php echo number_format(($data['totalamount'] - $data['paid']),2,".",","); ?></td>
                                                        <td><?php echo $data['invdate']; ?></td>
                                                        <td><?php echo $data['created_date']; ?></td>
                                                        <td><?php echo $data['status']; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="academics">
                                                <table class="table table-striped table-responsive table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Subject</th>
                                                        <th>Exams Score</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $selexams = "SELECT * FROM std_exams WHERE stdid = '$stdid'";
                                                    $selexamsrun = $conn->query($dbcon,$selexams);
                                                    $count = 0;
                                                    $totcls = 0;
                                                    $totexams = 0;
                                                    $totscore = 0;
                                                    while($data = $conn->fetch($selexamsrun)){
                                                        $count++;
                                                        $sid = $data['stdid'];
                                                        $sbj = getSubject($data['sbjid']);
                                                        $id = $data['id'];
                                                        $totexams+=$data['exam_score'];
                                                        ?>
                                                        <tr>
                                                            <!--<td><img src="<?php echo $data['img']; ?>" class="img-responsive img-rounded" style="width: 100px; height: 50px" /></td>-->
                                                            <td><?php echo $count; ?></td>
                                                            <td><?php echo getSubject($data['sbjid']); ?></td>
                                                            <td><?php echo $data['exam_score']; ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr style="background: rgba(232,231,227,0.9); font-weight: bolder; font-size: medium">
                                                        <td>&nbsp;</td>
                                                        <td>Total</td>
                                                        <td><?php echo number_format($totexams,2); ?></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="parents">
                                                <table class="table table-responsive table-bordered">
                                                    <thead>
                                                    <tr><th colspan="3">PARENT(S) / GUARDIAN(S) DETAILS</th></tr>
                                                    <tr>
                                                        <th>NAME</th>
                                                        <th>CONTACT</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    while($data = $conn->fetch($gudrun)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                                        <td><?php echo $data['contact']; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="2"><a data-toggle="modal" href="#guardian">Add New Guardian</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
            <div class="modal fade" id="guardian">
                <div class="modal-dialog">
                    <form method="post">
                        <input type="hidden" class="form-control" name="stdid" value="<?php echo $stdid; ?>"/>
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">ADD NEW GUARDIAN INFO</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped">
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">First Name</p></td>
                                        <td><input type="text" class="form-control" name="fname" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Last Name</p></td>
                                        <td><input type="text" class="form-control" name="lname" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Contact</p></td>
                                        <td><input type="text" class="form-control" name="contact" required/></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="addguardian">Save</button>
                            </div>
                        </div>
                    </form><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="addinternship">
                <div class="modal-dialog">
                    <form method="post">
                        <input type="hidden" class="form-control" name="stdid" value="<?php echo $stdid; ?>"/>
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">ADD NEW INTERNSHIP RECORD</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped">
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Facility Name</p></td>
                                        <td>
                                            <?php
                                            $cse = "SELECT id, pname FROM facilities WHERE status = 'Active'";
                                            $cserun = $conn->query($dbcon,$cse);
                                            ?>
                                            <select class="select2-active form-control" name="pname">
                                                <?php
                                                while($data = $conn->fetch($cserun)){
                                                    ?>
                                                    <option value="<?php echo $data['id'] ?>"><?php echo $data['pname'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Start Date</p></td>
                                        <td><input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="psdate" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">End Date</p></td>
                                        <td><input type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" name="pedate" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Name Of Supervisor</p></td>
                                        <td><input type="text" class="form-control" name="supname" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Supervisor's Contact</p></td>
                                        <td><input type="text" class="form-control" name="supcont" required/></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name="addinternship">Save</button>
                            </div>
                        </div>
                    </form><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        <?php }elseif (isset($_GET['staff_details'])) {
            $stdid = $_GET['staff_details'];
            $sel = "SELECT * FROM staff WHERE stfid = '$stdid'";
            $selrun = $conn->query($dbcon,$sel);
            $seldata = $conn->fetch($selrun);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-user position-left"></i>Staff Details</h4></div>
                            <!--<div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-plus3"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">New visitors</div>
                                                <div class="text-muted">2,349 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-visitors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-watch2"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">sessions</div>
                                                <div class="text-muted">08:20 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="new-sessions"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-people"></i></a>
                                            </li>
                                            <li class="text-left">
                                                <div class="text-semibold">Total online</div>
                                                <div class="text-muted"><span class="status-mark border-success position-left"></span> 5,378 avg</div>
                                            </li>
                                        </ul>

                                        <div class="col-lg-10 col-lg-offset-1">
                                            <div class="content-group" id="total-online"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    </div>

                    <div class="breadcrumb-line">
                        <ul class="breadcrumb">
                            <li><i class="icon-users position-left"></i> Staff Management</li>
                            <li><a href="dashboard.php?students_data"><i class="icon-user position-left"></i> Staff</a></li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Staff Details</li>
                        </ul>
                    </div>
                </div>
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="thumbnail">
                                <div class="thumb thumb-slide">
                                    <img src="<?php echo $seldata['img']; ?>" alt="" class="img-responsive img-rounded">
                                </div>

                                <div class="caption text-center">
                                    <h6 class="text-semibold no-margin"><?php echo $seldata['stfid']; ?> <small class="display-block" style="color: #06112C;"><?php echo $seldata['post']; ?></small></h6>
                                    <ul class="icons-list mt-15">
                                        <li><a data-popup="tooltip" title="<?php echo $seldata['contact']; ?>"><i class="icon-phone2"></i></a></li>
                                        <li><a data-popup="tooltip" title="<?php echo $seldata['email']; ?>"><i class="icon-mail5"></i></a></li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                        <div class="col-md-8">
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Basic information</h6>
                                </div>

                                <div class="panel-body">
                                    <form method="post">
                                        <input type="hidden" value="<?php echo $seldata['stfid']; ?>" class="form-control" name="stfid">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>First Name</label>
                                                    <input type="text" value="<?php echo $seldata['fname']; ?>" class="form-control" name="fname">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Last name</label>
                                                    <input type="text" value="<?php echo $seldata['lname']; ?>" class="form-control" name="lname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Date Of Birth</label>
                                                    <input type="date" value="<?php echo $seldata['dob']; ?>" class="form-control" name="dob">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Residential Address</label>
                                                    <input type="text" value="<?php echo $seldata['resaddr']; ?>" class="form-control" name="resaddr">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Gender</label>
                                                    <select class="select form-control" name="sex">
                                                        <option value="<?php echo $seldata['sex']; ?>" selected="selected"><?php echo $seldata['sex']; ?></option>
                                                        <option value="Female">Female</option>
                                                        <option value="Male">Male</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Contact</label>
                                                    <input type="text" value="<?php echo $seldata['contact']; ?>" class="form-control" name="cont">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                    <input type="text" value="<?php echo $seldata['email']; ?>" class="form-control" name="email">
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Position</label>
                                                    <select class="select form-control" name="position">
                                                        <option value="<?php echo $seldata['post']; ?>" selected="selected"><?php echo $seldata['post']; ?></option>
                                                        <?php
                                                            $cse = "SELECT post FROM positions WHERE status = 'Active'";
                                                            $cserun = $conn->query($dbcon,$cse);
                                                            while($data = $conn->fetch($cserun)){
                                                                ?>
                                                                <option value="<?php echo $data['post'] ?>"><?php echo $data['post'] ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Employment Date</label>
                                                    <input type="date" class="form-control" name="empdate" value="<?php echo $seldata['admitdate']; ?>"/>
                                                </div>
                                                <div class="col-md-6">
                                                    <label>Title</label>
                                                    <select class="select2-active form-control" name="sttitle">
                                                        <option value="<?php echo $seldata['sttitle']; ?>"><?php echo $seldata['sttitle']; ?></option>
                                                        <option value="Mr">Mr</option>
                                                        <option value="Mrs">Mrs</option>
                                                        <option value="Miss">Miss</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>STAFF STATUS</label>
                                                    <select class="select2-active form-control" name="ststatus">
                                                        <option value="<?php echo $seldata['status']; ?>"><?php echo $seldata['status']; ?></option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary" name="updatestaff">Update Basic Records <i class="icon-arrow-right14 position-right"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Main charts -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-flat">

                                <div class="panel-body">
                                    <div class="tabbable">
                                        <ul class="nav nav-tabs nav-tabs-highlight">
                                            <li class="active"><a href="#accesses" data-toggle="tab"><i class="icon-cog52 position-left"></i>Access Rights</a></li>
                                            <li><a href="#payslips" data-toggle="tab"><i class="icon-cash3 position-left"></i>Pay Slips</a></li>
                                            <li><a href="#stfsbjs" data-toggle="tab"><i class="icon-books position-left"></i>Staff Subjects</a></li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane" id="stfsbjs">
                                                <table class="table table-responsive table-bordered">
                                                    <thead>
                                                    <tr><th colspan="7">SUBJECTS TAUGHT (IF ANY)</th></tr>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>SUBJECT CODE</th>
                                                        <th>SUBJECT NAME</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    //GET THE INTERNSHIP DETAILS OF THE STUDENT
                                                    $count = 0;
                                                    $int = "SELECT * FROM stf_sbj WHERE stfid = '$stdid' AND status = 'Active'";
                                                    $intrun = $conn->query($dbcon,$int);
                                                    while($data = $conn->fetch($intrun)){
                                                        $count++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $count; ?></td>
                                                            <td><?php echo $data['sbjid']; ?></td>
                                                            <td><?php echo getSubject($data['sbjid']); ?></td>
                                                            <td><a href="dashboard.php?detachsbj=<?php echo $data['id']; ?>&staff_details=<?php echo $stdid; ?>" class="btn btn-sm btn-success"> Detach</a></td>

                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="2"><a data-toggle="modal" href="#addstfsbj">Add Subject</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane" id="payslips">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6>Payslips</h6>
                                                        <div class="panel panel-white">
                                                            <table class="table table-striped media-library table-lg">
                                                                <thead>
                                                                <tr>
                                                                    <th>Payslip #</th>
                                                                    <th>Basic Salary</th>
                                                                    <th style="color:#0CC03D">Gross Salary</th>
                                                                    <th style="color:#217BE1">Total Deductions</th>
                                                                    <th style="color:#D9E300">Net Salary</th>
                                                                    <th style="color:#D9E300">Bank Deposit</th>
                                                                    <th style="color:#D9E300">Reimbursement</th>
                                                                    <th>View</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                $cont = 0;
                                                                //$qry="SELECT s.slipid,s.voka_id,s.name,s.type,s.value, sm.slipid, sm.basic, sm.totded, sm.totearn, sm.sdate, sm.edate FROM stfpayslip AS s INNER JOIN payslipsummary AS sm ON s.slipid=sm.slipid";
                                                                $qry = "SELECT * FROM payslipsummary WHERE status='Approved' AND stfid='$stdid' ORDER BY timestamp DESC";
                                                                $qryRun = $conn->query($dbcon, $qry);
                                                                while ($getData = $conn->fetch($qryRun)) {
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <small><?php echo $getData['slipid']; ?></small>
                                                                        </td>
                                                                        <td>
                                                                            <small><?php echo $getData['basic']; ?></small>
                                                                        </td>
                                                                        <td style="color:#0CC03D">
                                                                            <small><?php echo number_format($getData['totearn'], 2) ?></small>
                                                                        </td>
                                                                        <td style="color:#217BE1">
                                                                            <small><?php echo $getData['totded']; ?></small>
                                                                        </td>
                                                                        <td style="color:#D9E300">
                                                                            <small><?php echo number_format(($getData['totearn'] - $getData['totded']), 2); ?></small>
                                                                        </td>
                                                                        <td style="color:#D9E300">
                                                                            <small><?php echo number_format(($getData['totearn'] - ($getData['totded'] + $getData['totreimb'])), 2); ?></small>
                                                                        </td>
                                                                        <td style="color:#D9E300">
                                                                            <small><?php echo number_format($getData['totreimb'], 2) ?></small>
                                                                        </td>
                                                                        <td>
                                                                            <a href="dashboard.php?viewpayslip=<?php echo $getData['slipid']; ?>"
                                                                               class="btn btn-sm btn-success"><i
                                                                                        class="icon icon-eye"></i></a></td>
                                                                    </tr>
                                                                <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane active" id="accesses">
                                                <form method="post">
                                                    <input type="hidden" name="stfaccess" value="<?php echo $stdid ?>" />
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h6>Accesses</h6>
                                                            <div class="panel panel-white">
                                                                <div class="row" style="margin: 1%;">
                                                                    <div class="col-md-3">
                                                                        Bank Deposits
                                                                        <div class="form-group has-feedback has-feedback-left">
                                                                            <select class="form-control input-lg" name="bank">
                                                                                <option value="<?php echo $seldata['bank']; ?>"><?php echo $seldata['bank']; ?></option>
                                                                                <option value=""></option>
                                                                                <option value="Manager">Manager</option>
                                                                            </select>
                                                                            <div class="form-control-feedback" style="background-color: #852B30; color: #FFF">
                                                                                <i class="icon-pen6"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        Examination Management
                                                                        <div class="form-group has-feedback has-feedback-left">
                                                                            <select class="form-control input-lg" name="exams">
                                                                                <option value="<?php echo $seldata['exams']; ?>"><?php echo $seldata['exams']; ?></option>
                                                                                <option value=""></option>
                                                                                <option value="Administrator">Administrator</option>
                                                                                <option value="Lecturer">Lecturer</option>
                                                                            </select>
                                                                            <div class="form-control-feedback" style="background-color: #852B30; color: #FFF">
                                                                                <i class="icon-pen6"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        Fees Management
                                                                        <div class="form-group has-feedback has-feedback-left">
                                                                            <select class="form-control input-lg" name="fees">
                                                                                <option value="<?php echo $seldata['fees']; ?>"><?php echo $seldata['fees']; ?></option>
                                                                                <option value=""></option>
                                                                                <option value="Administrator">Administrator</option>
                                                                            </select>
                                                                            <div class="form-control-feedback" style="background-color: #852B30; color: #FFF">
                                                                                <i class="icon-cash4"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        Field / Internship
                                                                        <div class="form-group has-feedback has-feedback-left">
                                                                            <select class="form-control input-lg" name="internship">
                                                                                <option value="<?php echo $seldata['internship']; ?>"><?php echo $seldata['internship']; ?></option>
                                                                                <option value=""></option>
                                                                                <option value="Administrator">Administrator</option>
                                                                            </select>
                                                                            <div class="form-control-feedback" style="background-color: #852B30; color: #FFF">
                                                                                <i class="icon-graduation"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        Payment Voucher
                                                                        <div class="form-group has-feedback has-feedback-left">
                                                                            <select class="form-control input-lg" name="pv">
                                                                                <option value="<?php echo $seldata['pv']; ?>"><?php echo $seldata['pv']; ?></option>
                                                                                <option value=""></option>
                                                                                <option value="User">User</option>
                                                                                <option value="Accountant">Accountant</option>
                                                                                <option value="Director">Director</option>
                                                                            </select>
                                                                            <div class="form-control-feedback" style="background-color: #852B30; color: #FFF">
                                                                                <i class="icon-cash"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        Staff Management
                                                                        <div class="form-group has-feedback has-feedback-left">
                                                                            <select class="form-control input-lg" name="stfmgt">
                                                                                <option value="<?php echo $seldata['stfmgt']; ?>"><?php echo $seldata['stfmgt']; ?></option>
                                                                                <option value=""></option>
                                                                                <option value="Administrator">Administrator</option>
                                                                            </select>
                                                                            <div class="form-control-feedback" style="background-color: #852B30; color: #FFF">
                                                                                <i class="icon-users2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        Staff Payroll
                                                                        <div class="form-group has-feedback has-feedback-left">
                                                                            <select class="form-control input-lg" name="payroll">
                                                                                <option value="<?php echo $seldata['payroll']; ?>"><?php echo $seldata['payroll']; ?></option>
                                                                                <option value=""></option>
                                                                                <option value="Administrator">Administrator</option>
                                                                            </select>
                                                                            <div class="form-control-feedback" style="background-color: #852B30; color: #FFF">
                                                                                <i class="icon-paypal2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        Students Management
                                                                        <div class="form-group has-feedback has-feedback-left">
                                                                            <select class="form-control input-lg" name="stdmgt">
                                                                                <option value="<?php echo $seldata['stdmgt']; ?>"><?php echo $seldata['stdmgt']; ?></option>
                                                                                <option value=""></option>
                                                                                <option value="Administrator">Administrator</option>
                                                                            </select>
                                                                            <div class="form-control-feedback" style="background-color: #852B30; color: #FFF">
                                                                                <i class="icon-users2"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        Configurations
                                                                        <div class="form-group has-feedback has-feedback-left">
                                                                            <select class="form-control input-lg" name="configs">
                                                                                <option value="<?php echo $seldata['configs']; ?>"><?php echo $seldata['configs']; ?></option>
                                                                                <option value=""></option>
                                                                                <option value="Administrator">Administrator</option>
                                                                            </select>
                                                                            <div class="form-control-feedback" style="background-color: #852B30; color: #FFF">
                                                                                <i class="icon-cog52"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        Hostel Management
                                                                        <div class="form-group has-feedback has-feedback-left">
                                                                            <select class="form-control input-lg" name="hostel">
                                                                                <option value="<?php echo $seldata['hostel']; ?>"><?php echo $seldata['hostel']; ?></option>
                                                                                <option value=""></option>
                                                                                <option value="Adminstrator">Administrator</option>
                                                                            </select>
                                                                            <div class="form-control-feedback" style="background-color: #852B30; color: #FFF">
                                                                                <i class="icon-cog52"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="text-right">
                                                                <button type="submit" class="btn btn-primary">Update Access Rights <i class="icon-arrow-right14 position-right"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /main charts -->

                </div>
                <!-- /content area -->

            </div>
            <div id="addstfsbj" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">ADD SUBJECT TO STAFF</h3>
                        </div>

                        <div class="modal-body">
                            <form method="post">
                                <input type="hidden" name="stfid" value="<?php echo $stdid ?>" />
                                <div class="row" id="hidethis">
                                    <div class="col-md-8">
                                        <select name="sbjid" class="form-control" required>
                                            <option value=""></option>
                                            <?php
                                            echo $sel = "SELECT sbj, sbjid FROM subject WHERE status = 'Active' AND sbjid NOT IN (SELECT sbjid FROM stf_sbj WHERE stfid = '$stdid' AND status = 'Active')";
                                            $selrun = $conn->query($dbcon,$sel);
                                            while($data = $conn->fetch($selrun)){
                                                $sbj = $data['sbj'];
                                                $sbjid = $data['sbjid'];
                                                echo "<option value='".$sbjid."'>".$sbj."</option>";
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4"><button type="submit" name="attachsbj" class="btn btn-sm btn-success">ATTACH SUBJECT</button> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php }elseif (isset($_GET['student_invoice'])) {
            $invid = $_GET['student_invoice'];
            //GET THE INVOICE DETAILS
            $get = "SELECT * FROM student_invoices WHERE invoiceid = '$invid'";
            $getrun = $conn->query($dbcon,$get);
            $getdata = $conn->fetch($getrun);
            $stdid = $getdata['stdid'];

            //GET THE STUDENT DETAILS
            $sel = "SELECT fname, lname, program, contact, email FROM students WHERE stdid='$stdid'";
            $selrun = $conn->query($dbcon,$sel);
            $seldata = $conn->fetch($selrun);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-user position-left"></i>Student Invoice</h4></div>
                        </div>
                    </div>
                </div>
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h6 class="panel-title">&nbsp;</h6>
                            <div class="heading-elements">
                                <button type="button" class="btn btn-default btn-xs heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button>
                                <?php if(($getdata['totalamount'] - $getdata['paid']) > 0){ ?><a class="btn btn-success btn-xs heading-btn"  data-toggle="modal" href="#payinvoice">Proceed to Payment <i class="icon-angle-right"></i></a><?php } ?>
                            </div>
                        </div>

                        <div class="panel-body no-padding-bottom" id="ptable">
                            <div class="row">
                                <div class="col-md-4 col-sm-4 content-group" align="left">
                                    <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                    <ul class="list-condensed list-unstyled">
                                        <li><?php echo $caddr; ?></li>
                                        <li><?php echo $cloc; ?></li>
                                        <li><?php echo $ccont; ?></li>
                                        <li><?php echo $cmail; ?></li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-sm-4 content-group">
                                        <h5 class="text-uppercase text-semibold">Invoice #:&nbsp;&nbsp;<?php echo $invid; ?></h5>
                                        <ul class="list-condensed list-unstyled">
                                            <li>Invoice Date: <span class="text-semibold"><?php echo $getdata['invdate']; ?></span></li>
                                            <li>Created date: <span class="text-semibold"><?php echo $getdata['created_date']; ?></span></li>
                                        </ul>
                                </div>
                                <div class="col-md-4 col-sm-4 content-group">
                                    <span class="text-muted">Invoice To:</span>
                                    <ul class="list-condensed list-unstyled" align="left">
                                        <li><h5><?php echo $seldata['fname']." ".$seldata['lname']; ?></h5></li>
                                        <li><span class="text-semibold"><?php echo getCourse($seldata['program']); ?></span></li>
                                        <li><?php echo $seldata['contact']; ?></li>
                                        <li><?php echo $seldata['email']; ?></li>
                                    </ul>
                                </div>

                                <!--<div class="col-md-3 col-lg-3 content-group" align="left">
                                    <span class="text-muted">Payment Details:</span>
                                    <ul class="list-condensed list-unstyled invoice-payment-details">
                                        <li><h5>Total Due: <span class="text-right text-semibold"><?php echo $getdata['totalamount']; ?></span></h5></li>
                                    </ul>
                                </div>-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-lg table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th class="col-sm-1">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <h6 class="no-margin" style="color: #06112C;">Tuition Fee For Offering <?php echo getCourse($seldata['program']); ?> Course For Six Months</h6>
                                                </td>
                                                <td><?php echo number_format(($getdata['totalamount'] - 100),2); ?></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="no-margin" style="color: #06112C;">Cost Of Application Form</h6>
                                                </td>
                                                <td>100.00</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-payment" style="margin-top: 1%">
                                <div class="col-sm-4">
                                    <table class="table table-bordered table-striped">
                                        <thead><tr style="font-weight: bold;"><td align="center" colspan="2">PAYMENTS</td></tr><tr><th>Payment Date</th><th>Amount</th></tr></thead>
                                        <tbody>
                                        <?php
                                        $selpay = "SELECT * FROM invoice_payment WHERE invoiceid = '$invid' ORDER BY paydate ASC";
                                        $selpayrun = $conn->query($dbcon,$selpay);
                                        $tot=0;
                                        while($paydata = $conn->fetch($selpayrun)){
                                            $tot+=$paydata['amount'];
                                            ?>
                                            <tr><td><?php echo date("d M, Y h:i:s A",strtotime(date($paydata['paydate']))); ?></td><td><?php echo $paydata['amount']; ?></td></tr>
                                        <?php } ?>
                                        <tr style="font-weight: bold"><td>TOTAL</td><td>&cent;<?php echo number_format($tot,2); ?></td></tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-3">&nbsp;</div>
                                <div class="col-sm-5">
                                    <div class="content-group">
                                        <h6>Total due</h6>
                                        <div class="table-responsive no-border">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th>Subtotal:</th>
                                                    <td class="text-right"><?php echo $getdata['totalamount']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Paid:</th>
                                                    <td class="text-right"><?php echo $getdata['paid']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Arrears:</th>
                                                    <td class="text-right text-primary"><h5 class="text-semibold"><?php echo number_format(($getdata['totalamount'] - $getdata['paid']),2,'.',','); ?></h5></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /content area -->
            </div>
            <div class="modal fade" id="payinvoice">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">REGISTER PAYMENT</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <input type="hidden" name="viewinvoice" value="<?php echo $invid; ?>" />
                                <table class="table table-striped">
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Payment Amount</p></td>
                                        <td>
                                            <input type="number" class="form-control" name="payamount" min="0.1" step="any"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Payment Date</p></td>
                                        <td>
                                            <input type="date" class="form-control" name="paydate" value="<?php echo date('Y-m-d') ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"><button type="submit" name="makepayment" class="btn btn-sm btn-success" ><span class="icon icon-next">Make Payment</span></button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div><!-- /.modal-dialog -->
            </div>
        <?php }elseif (isset($_GET['hostel_invoice'])) {
            $invid = $_GET['hostel_invoice'];
            //GET THE INVOICE DETAILS
            $get = "SELECT * FROM hostel_invoices WHERE invoiceid = '$invid'";
            $getrun = $conn->query($dbcon,$get);
            $getdata = $conn->fetch($getrun);
            $stdid = $getdata['stdid'];

            //GET THE STUDENT DETAILS
            $sel = "SELECT fname, lname, program, contact, email FROM students WHERE stdid='$stdid'";
            $selrun = $conn->query($dbcon,$sel);
            $seldata = $conn->fetch($selrun);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-user position-left"></i>Hostel Invoice</h4></div>
                        </div>
                    </div>
                </div>
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <h6 class="panel-title">&nbsp;</h6>
                            <div class="heading-elements">
                                <button type="button" class="btn btn-default btn-xs heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-printer position-left"></i> Print</button>
                                <?php if(($getdata['totalamount'] - $getdata['paid']) > 0){ ?><a class="btn btn-success btn-xs heading-btn"  data-toggle="modal" href="#payinvoicehostel">Proceed to Payment <i class="icon-angle-right"></i></a><?php } ?>
                            </div>
                        </div>

                        <div class="panel-body no-padding-bottom" id="ptable">
                            <div class="row">
                                <div class="col-md-3 col-sm-3 content-group" align="left">
                                    <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 120px;">
                                    <ul class="list-condensed list-unstyled">
                                        <li><?php echo $caddr; ?></li>
                                        <li><?php echo $cloc; ?></li>
                                        <li><?php echo $ccont; ?></li>
                                        <li><?php echo $cmail; ?></li>
                                    </ul>
                                </div>

                                <div class="col-md-3 col-sm-3 content-group">
                                    <h5 class="text-uppercase text-semibold">Invoice #:&nbsp;&nbsp;<?php echo $invid; ?></h5>
                                    <ul class="list-condensed list-unstyled">
                                        <li>Invoice Date: <span class="text-semibold"><?php echo $getdata['invdate']; ?></span></li>
                                        <li>Created date: <span class="text-semibold"><?php echo $getdata['created_date']; ?></span></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-3 content-group">
                                    <span class="text-muted">Invoice To:</span>
                                    <ul class="list-condensed list-unstyled" align="left">
                                        <li><h5><?php echo $seldata['fname']." ".$seldata['lname']; ?></h5></li>
                                        <li><span class="text-semibold"><?php echo getCourse($seldata['program']); ?></span></li>
                                        <li><?php echo $seldata['contact']; ?></li>
                                        <li><?php echo $seldata['email']; ?></li>
                                    </ul>
                                </div>

                                <div class="col-md-3 col-lg-3 content-group" align="left">
                                    <span class="text-muted">Payment Details:</span>
                                    <ul class="list-condensed list-unstyled invoice-payment-details">
                                        <li><h5>Total Due: <span class="text-right text-semibold"><?php echo $getdata['totalamount']; ?></span></h5></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-lg table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th class="col-sm-1">Total</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <h6 class="no-margin" style="color: #06112C;">Cost Of Hostel Fees From <?php echo date("M d, Y",strtotime(date($getdata['sdate']))); ?> To <?php echo date("M d, Y",strtotime(date($getdata['edate']))); ?></h6>
                                                </td>
                                                <td><?php echo $getdata['totalamount']; ?></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-payment" style="margin-top: 1%">
                                <div class="col-sm-4">
                                    <div class="well">
                                        <p>
                                        <table class="table table-bordered table-striped">
                                            <thead><tr style="font-weight: bold;"><td align="center" colspan="2">PAYMENTS</td></tr><tr><th>Payment Date</th><th>Amount</th></tr></thead>
                                            <tbody>
                                            <?php
                                            $selpay = "SELECT * FROM invoice_payment WHERE invoiceid = '$invid' ORDER BY paydate ASC";
                                            $selpayrun = $conn->query($dbcon,$selpay);
                                            $tot=0;
                                            while($paydata = $conn->fetch($selpayrun)){
                                                $tot+=$paydata['amount'];
                                                ?>
                                                <tr><td><?php echo date("d M, Y h:i:s A",strtotime(date($paydata['paydate']))); ?></td><td><?php echo $paydata['amount']; ?></td></tr>
                                            <?php } ?>
                                            <tr style="font-weight: bold"><td>TOTAL</td><td>&cent;<?php echo number_format($tot,2); ?></td></tr>
                                            </tbody>
                                        </table>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-3">&nbsp;</div>
                                <div class="col-sm-5">
                                    <div class="content-group">
                                        <h6>Total due</h6>
                                        <div class="table-responsive no-border">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th>Subtotal:</th>
                                                    <td class="text-right"><?php echo $getdata['totalamount']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Paid:</th>
                                                    <td class="text-right"><?php echo $getdata['paid']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Arrears:</th>
                                                    <td class="text-right text-primary"><h5 class="text-semibold"><?php echo number_format(($getdata['totalamount'] - $getdata['paid']),2,'.',','); ?></h5></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /content area -->
            </div>
            <div class="modal fade" id="payinvoicehostel">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">REGISTER PAYMENT</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <input type="hidden" name="viewinvoice" value="<?php echo $invid; ?>" />
                                <table class="table table-striped">
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Payment Amount</p></td>
                                        <td>
                                            <input type="number" class="form-control" name="payamount" min="0.1" step="any"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Payment Date</p></td>
                                        <td>
                                            <input type="date" class="form-control" name="paydate" value="<?php echo date('Y-m-d') ?>"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center"><button type="submit" name="makepaymenthostel" class="btn btn-sm btn-success" ><span class="icon icon-next">Make Payment</span></button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div><!-- /.modal-dialog -->
            </div>
        <?php }elseif(isset($_GET['exam_questions'])) {
        $sbjid = $_GET['subject'];
        $qry = "SELECT * FROM exam_qxtns WHERE sbjid = '$sbjid' ORDER BY status ASC";
        $qryRun = $conn->query($dbcon, $qry);

        $qryact = "SELECT * FROM exam_qxtns WHERE sbjid = '$sbjid' AND status = 'Active'";
        $qryRunact = $conn->query($dbcon, $qryact);

        $qrydeact = "SELECT * FROM exam_qxtns WHERE sbjid = '$sbjid' AND status = 'Inactive'";
        $qryRundeact = $conn->query($dbcon, $qrydeact);
        ?>
        <!-- Main content -->
        <div class="content-wrapper">
            <!-- Page header -->
            <div class="page-header">
                <div class="page-header-content">
                    <div class="row" style="padding-top: 2%;">
                        <div class="col-md-6"><h4 class="maincolor" style="font-size: xx-large"><i class="icon-book3 position-left"></i><?php echo getSubject($sbjid); ?></h4></div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-4">
                                    <ul class="list-inline text-center">
                                        <li>
                                            <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash4"></i></a>
                                        </li>
                                        <li class="text-center">
                                            <div class="text-semibold">Total Questions</div>
                                            <div class="text-muted"><?php echo $conn->sqlnum($qryRun); ?></div>
                                        </li>
                                    </ul>

                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="content-group" id="new-visitors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <ul class="list-inline text-center">
                                        <li>
                                            <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash3"></i></a>
                                        </li>
                                        <li class="text-center">
                                            <div class="text-semibold">Selected Questions</div>
                                            <div class="text-muted"><?php echo $conn->sqlnum($qryRunact); ?></div>
                                        </li>
                                    </ul>

                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="content-group" id="new-sessions"></div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <ul class="list-inline text-center">
                                        <li>
                                            <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash2"></i></a>
                                        </li>
                                        <li class="text-center">
                                            <div class="text-semibold">Unselected Questions</div>
                                            <div class="text-muted"><?php echo $conn->sqlnum($qryRundeact); ?></div>
                                        </li>
                                    </ul>

                                    <div class="col-lg-10 col-lg-offset-1">
                                        <div class="content-group" id="total-online"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><i class="icon-graduation2 position-left"></i> Examination</li>
                        <li class="maincolor"><i class="icon-book3 position-left"></i> Exams Questions</li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->
            <!-- Content area -->
            <div class="content">

                <!-- Main charts -->
                <div class="row">
                    <div class="col-md-3" align="center" style="padding: 1%">
                        <a href="#" data-toggle="modal" data-target="#aptitude" class="btn btn-success">ADD New
                            Question</a>
                    </div>
                    <div class="col-md-3" align="center" style="padding: 1%">
                        <a href="#" data-toggle="modal" data-target="#scheduletest" class="btn btn-warning">Schedule Test</a>
                    </div>
                </div>
                <!-- /main charts -->


                <!-- Dashboard content -->
                <div class="panel panel-white">
                    <table class="table table-striped table-lg">
                        <thead>
                        <tr>
                            <th>QUESTION</th>
                            <th>IMAGE</th>
                            <th>ANSWER</th>
                            <th>Section Type</th>
                            <th>&nbsp;STATUS</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $cont = 0;
                        while ($items = $conn->fetch($qryRun)) {
                            $cont++;
                            ?>
                            <tr>
                                <td>
                                    <p><?php echo $items['qxtn'];?></p>
                                </td>
                                <td>
                                    <?php if(!empty($items['imgurl'])){ ?>
                                        <img src="<?php echo $items['imgurl'] ?>" class="img-responsive" style="width: 200px; height: 100px"/>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php echo $items['answer']; ?>
                                </td>
                                <td>
                                    <?php echo $items['sectiontype']; ?>
                                </td>
                                <td class="text-center">
                                    <div class="row">
                                        <?php if ($items['status'] == 'Active') { ?>
                                            <div class="col-md-6">
                                                <a href="dashboard.php?deactivate_apt=<?php echo $items['id'] ?>&exam_questions&subject=<?php echo $sbjid; ?>"
                                                   class="btn btn-sm btn-danger">Deactivate</a>
                                            </div>
                                        <?php } else { ?>
                                            <div class="col-md-6">
                                                <a href="dashboard.php?activate_apt=<?php echo $items['id'] ?>&exam_questions&subject=<?php echo $sbjid; ?>"
                                                   class="btn btn-sm btn-primary">Activate</a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <!-- APTITUDE TEST -->
        <div id="aptitude" class="modal fade">
            <form class="modal-dialog modal-lg" method="post" enctype="multipart/form-data">
                <input type="hidden" name="sbjid" value="<?php echo $sbjid; ?>" />
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Students Examination Questiions</h3>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" id="leavenote">
                                <div class="col-md-12">
                                    <label style="color: #09933e; font-weight: bold">Check To Upload Image</label><input type="checkbox" id="qxtnimg" onclick="showqxtnimg()"/>
                                </div>
                                <div class="col-md-6 hidden" id="dqxtnimg">
                                    <label>Upload Image: </label><input type="file" name="dqxtnimg" class="form-control" id="imgqxtn"/>
                                </div>
                                <div class="col-md-6">
                                    <label style="color: #09933e; font-weight: bold">Section Type</label>
                                    <select class="form-control " name="section" required onchange="questiontype(this.value)">
                                        <option value="Objectives">Objectives</option>
                                        <option value="Theory">Theory</option>
                                        <option value="Practical">Practical</option>
                                    </select>
                                </div>
                                <div class="col-md-6" id="options">
                                    <label style="color: #09933e; font-weight: bold">ANSWER</label>
                                    <select class="form-control " name="answer" required>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                    </select>
                                </div>
                                <div class="col-md-12" style="margin: 10px">
                                    <label style="color: #09933e; font-weight: bold">QUESTION</label>
                                    <textarea class="form-control " rows="10" maxlength="500" name="qxtn"></textarea>
                                </div>
                                <script type="text/javascript">
                                    CKEDITOR.replace( 'qxtn' );
                                </script>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary" name="create_qxtn">ADD QUESTIONS</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- SCHEDULE TEST MODAL -->
        <div id="scheduletest" class="modal fade">
            <form class="modal-dialog modal-sm" method="get">
                <input type="hidden" name="sbjid" value="<?php echo $sbjid; ?>" />
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h3 class="modal-title">Schedule Exams For Students</h3>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="schanswer" style="color: #09933e; font-weight: bold">COURSE</label>
                                <select class="form-control " name="schcourse" required id="schanswer">
                                    <option value=""></option>
                                    <option value="All">All Courses</option>
                                    <?php
                                        $sel = "SELECT cid FROM sbj_course WHERE sbjid = '$sbjid'";
                                        $selrun = $conn->query($dbcon, $sel);
                                        while($data = $conn->fetch($selrun)){
                                    ?>
                                    <option value="<?php echo $data['cid']; ?>"><?php echo getCourse($data['cid']); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="schdate" style="color: #09933e; font-weight: bold">DATE</label>
                                <input id="schdate" name="schdate" type="date" value="<?php echo date('Y-m-d'); ?>" class="form-control" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="schtime" style="color: #09933e; font-weight: bold">Start Time</label>
                                <input id="schtime" name="schtime" type="time" value="<?php echo date('H:i:s'); ?>" class="form-control" required/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="schdur" style="color: #09933e; font-weight: bold">DURATION IN MINUTES</label>
                                <input id="schdur" name="schdur" type="number"  class="form-control" required/>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-primary" name="schedule_exams">SCHEDULE EXAMS</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- END OF SCHEDULE TEST -->
    </div>
    <!-- END OF APTITUDE TEST -->
    <?php }elseif(isset($_GET['schedule_exams'])) {
    $sbjid = $_GET['sbjid'];
    $course = $_GET['schcourse'];
    $date = $_GET['schdate'];
    $time = $_GET['schtime'];
    $duration = $_GET['schdur'];

    $qryact = "SELECT * FROM exam_qxtns WHERE sbjid = '$sbjid' AND status = 'Active' AND sectiontype = 'Objectives'";
    $qryRunact = $conn->query($dbcon, $qryact);

    $qrypract = "SELECT * FROM exam_qxtns WHERE sbjid = '$sbjid' AND status = 'Active' AND sectiontype = 'Practical'";
    $qryRunpract = $conn->query($dbcon, $qrypract);

    $qrytheory = "SELECT * FROM exam_qxtns WHERE sbjid = '$sbjid' AND status = 'Active' AND sectiontype = 'Theory'";
    $qryRuntheory = $conn->query($dbcon, $qrytheory);

    $qrydeact = "SELECT * FROM exam_qxtns WHERE sbjid = '$sbjid' AND status = 'Inactive'";
    $qryRundeact = $conn->query($dbcon, $qrydeact);
    ?>
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header">
            <div class="page-header-content">
                <div class="row" style="padding-top: 2%;">
                    <div class="col-md-6"><h4 class="maincolor" style="font-size: x-large"><i class="icon-book3 position-left"></i> SCHEDULE TEST FOR <?php echo strtoupper(getSubject($sbjid)); ?> COURSES</h4></div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-lg-4">
                                <ul class="list-inline text-center">
                                    <li>
                                        <a href="#" class="btn border-teal text-teal btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash4"></i></a>
                                    </li>
                                    <li class="text-center">
                                        <div class="text-semibold">Objective Questions</div>
                                        <div class="text-muted"><?php echo $conn->sqlnum($qryRunact); ?></div>
                                    </li>
                                </ul>

                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="content-group" id="new-visitors"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <ul class="list-inline text-center">
                                    <li>
                                        <a href="#" class="btn border-warning-400 text-warning-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash3"></i></a>
                                    </li>
                                    <li class="text-center">
                                        <div class="text-semibold">Theory Questions</div>
                                        <div class="text-muted"><?php echo $conn->sqlnum($qryRuntheory); ?></div>
                                    </li>
                                </ul>

                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="content-group" id="new-sessions"></div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <ul class="list-inline text-center">
                                    <li>
                                        <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-cash2"></i></a>
                                    </li>
                                    <li class="text-center">
                                        <div class="text-semibold">Practical Questions</div>
                                        <div class="text-muted"><?php echo $conn->sqlnum($qryRunpract); ?></div>
                                    </li>
                                </ul>

                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="content-group" id="total-online"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><i class="icon-graduation2 position-left"></i> Examination Management</li>
                    <li class="maincolor"><i class="icon-book3 position-left"></i> Schedule Exams</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->
        <!-- Content area -->
        <div class="content">
            <!-- Dashboard content -->
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <p style="font-weight: bold; font-size: large" class="panel-title maincolor">OBJECTIVES</p>
                        </div>
                        <table class="table table-striped table-lg">
                            <thead>
                            <tr>
                                <th>QUESTION</th>
                                <th>ANSWER</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cont = 0;
                            while ($items = $conn->fetch($qryRunact)) {
                                $cont++;
                                ?>
                                <tr>
                                    <td>
                                        <?php if(!empty($items['imgurl'])){ ?>
                                            <img src="<?php echo $items['imgurl'] ?>" class="img-responsive" style="width: 200px; height: 100px"/>
                                        <?php } ?>
                                        <p><?php echo $items['qxtn'];?></p>
                                    </td>
                                    <td>
                                        <?php echo $items['answer']; ?>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <p style="font-weight: bold; font-size: large" class="panel-title maincolor">PRACTICAL QUESTIONS</p>
                        </div>
                        <table class="table table-striped table-lg">
                            <thead>
                            <tr>
                                <th>QUESTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cont = 0;
                            while ($items = $conn->fetch($qryRunpract)) {
                                $cont++;
                                ?>
                                <tr>
                                    <td>
                                        <?php if(!empty($items['imgurl'])){ ?>
                                            <img src="<?php echo $items['imgurl'] ?>" class="img-responsive" style="width: 200px; height: 100px"/>
                                        <?php } ?>
                                        <p><?php echo $items['qxtn'];?></p>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-white">
                        <div class="panel-heading">
                            <p style="font-weight: bold; font-size: large" class="panel-title maincolor">THEORY QUESTIONS</p>
                        </div>
                        <table class="table table-striped table-lg">
                            <thead>
                            <tr>
                                <th>QUESTION</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $cont = 0;
                            while ($items = $conn->fetch($qryRuntheory)) {
                                $cont++;
                                ?>
                                <tr>
                                    <td>
                                        <?php if(!empty($items['imgurl'])){ ?>
                                            <img src="<?php echo $items['imgurl'] ?>" class="img-responsive" style="width: 200px; height: 100px"/>
                                        <?php } ?>
                                        <p><?php echo $items['qxtn'];?></p>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- END OF APTITUDE TEST -->
<?php }else { ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-md-3">
                                    <h3> Dashboard</h3>
                                </div>
                                <div class="col-md-9">
                                    <!-- <img src="assets/images/bday.png" class="img-responsive" />-->
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

            </div>
        <?php } ?>
                                <!-- /page content -->
                                <!-- ERROR MODAL-->
        <div id="errormodal" class="modal fade">
            <div class="modal-dialog" style="width: 400px; height: 50px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;
                        </button>
                        <h3 class="modal-title">Sorry!!!</h3>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2" align="center">
                                <img src="assets/images/failed.jpg" class="img-responsive"/>
                            </div>
                            <div class="col-md-10" style="text-align: center;" id="errormsg">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /ERROR MODALS -->
        <!-- ERROR MODAL-->
        <div id="successmodal" class="modal fade">
            <div class="modal-dialog" style="width: 400px; height: 50px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;
                        </button>
                        <h3 class="modal-title">Success!!!</h3>
                    </div>

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2" align="center">
                                <img src="assets/images/success.jpg" class="img-responsive"/>
                            </div>
                            <div class="col-md-10" style="text-align: center;" id="successmsg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="logoutmodal" class="modal fade">
            <div class="modal-dialog" style="width: 400px; height: 50px;">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-5" align="center">
                                <img src="assets/images/logout.png" class="img-responsive"/>
                            </div>
                            <div class="col-md-7" style="text-align: center;">
                                <div class="row">
                                    <div class="col-md-12"><p>Are You Sure You Want To Log Out?</p></div>
                                    <div class="col-md-6" align="right"><a class="btn btn-lg btn-danger" href="index.php">YES</a></div>
                                    <div class="col-md-6" align="left"><a class="btn btn-lg btn-success close" data-dismiss="modal">NO</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="backupmodal" class="modal fade" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" style="width: 400px; height: 50px;">
                <div class="modal-content">

                    <div class="modal-body" da>
                        <div class="row">
                            <div class="col-md-12" align="center">
                                <img src="assets/images/spinner.gif" class="img-responsive"/>
                                <p style="text-align: center; font-weight: bold; font-size: large">Database Backup In Progress...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="backupcompletemodal" class="modal fade">
            <div class="modal-dialog" style="width: 400px; height: 50px;">
                <div class="modal-content">

                    <div class="modal-body" da>
                        <div class="row">
                            <div class="col-md-12" align="center">
                                <img src="assets/images/tenor.gif" class="img-responsive"/>
                                <p style="text-align: center; font-weight: bold; font-size: large">Database Backup Completed...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /ERROR MODALS -->
    </div>
    <!-- /page container -->
    <?php include("includes/modal.php"); ?>
    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
                            <!-- DESKTOP NOTIFICATION DEPENDENCIES -->
                            <!-- <script src="//code.jquery.com/jquery-3.1.0.min.js"></script>-->
<script src="assets/js/easyNotify.js"></script>

<script>
    /* SCHOOL MANAGEMENT JS */
    function dispimageOLD(input,id){
        //console.log(id);
        var imgid = "#" + id;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(imgid)
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    /*schedfunction generateurl(){
        var fileName = document.getElementById('imgqxtn').files[0].name;
        var tstamp = "assets/data/questions/" + Math.floor(Date.now() / 1000) + ".jpg";
        $("#dimgurl").val(tstamp);
        console.log(tstamp);
    }*/

    function getattachees(id){
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "getattachees=" + id,
            success: function (data) {
                console.log(data);
                $("#attacheesview").modal("show");
                document.getElementById("attacheesmodal").innerHTML = data;
            },
            error: function (xhr, desc, err) {
                alert(err);
                return false;
            }
        });
    }

    function questiontype(id){
        console.log(id);
        if(id == "Objectives"){
            $("#options").removeClass("hidden");
        }else{
            $("#options").addClass("hidden");
        }
    }

    function dispimage(input,id) {
        //console.log("hsfjhdfasghdfasghfdhasfdhasd");
        //var fileInput =
            //document.getElementById('file');
        var imgid = "#" + id;
        var filePath = input.value;

        // Allowing file type
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type');
            input.value = '';
            return false;
        }
        else
        {
            // Image preview
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(imgid)
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    }

    function editexchrate(currency, rate, exchid){
        //console.log(currency + rate + exchid);
        $("#currencyadd").val(currency);
        $("#exchratee").val(rate);
        $("#exchrate_id").val(exchid);
        $("#editexchrate").modal("show");
    }

    function getcompany(){
        $.ajax({
            type: "post",
            url: "ajax/ajax.php",
            data: "getcompany",
            success: function (data) {
                //console.log(data);
                var result = $.parseJSON(data);
                var cname = result['cname'];
                var ccont = result['ccont'];
                var cmail = result['cmail'];
                var cloc = result['cloc'];
                var caddr = result['caddr'];
                var clogo = result['clogo'];
                var tag = result['tag'];
                //console.log(clogo);
                document.getElementById("compimg").innerHTML = "<img id='schoolimg' src='"+clogo+"' class='img-response' style='width: 100px; height: 100px' />";
                $("#cname").val(cname);
                $("#ccont").val(ccont);
                $("#cmail").val(cmail);
                $("#cloc").val(cloc);
                $("#caddr").val(caddr);
                $("#tag").val(tag);
            },
            error: function (xhr, desc, err) {
                alert(err);
                return false;
            }
        });
    }


    function makebackup(){
        $("#backupmodal").modal("show");
        $.ajax({
            type: "post",
            url: "ajax/ajax.php",
            data: "backup",
            success: function (data) {
                //console.log(data);
                $("#backupmodal").modal("hide");
                $("#backupcompletemodal").modal("show");

            },
            error: function (xhr, desc, err) {
                alert(err);
                return false;
            }
        });
    }
    /* END OF SCHOOL MANAGEMENT JS */
    var title = "";
    var dmessage = "";
    var notifyid = $("#notifyid").val();

    //PLAY BDAY TUNE IF TODAY IS BIRTHDAY


    function shownotify() {
        //$("#errormodal").modal("show");
        //onclick function on the popup
        var myFunction = function () {
            // alert('Click function');
            //console.log(url)
        };
        var myImg = "assets/images/logo.jpg";
        var uRl = "signout.php?userid=" + notifyid;
        //GET THE MESSAGES FOR THE
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "getNotify=" + notifyid,
            success: function (data) {
                //console.log(data);
                var result = $.parseJSON(data);
                title = result['title'];
                dmessage = result['msg'];
                var lastlogin = result['lastlogin'];
                document.getElementById("activityCount").innerHTML = result['actcount'];
                document.getElementById("activityalert").innerHTML = result['actmsg'];
                document.getElementById("memoCount").innerHTML = result['memcount'];
                document.getElementById("memomsg").innerHTML = result['memmsg'];

                if(lastlogin < 1200){
                    if (dmessage != "No Memo Available" && title != "") {
                        var audio = new Audio('assets/audio/notify.mp3');
                        audio.play();
                        var options = {
                            title: title,
                            options: {
                                body: dmessage,
                                icon: myImg,
                                lang: 'en-US',
                                onClick: myFunction,
                                onClose: "",
                                onError: ""
                            }
                        };
                        $("#easyNotify").easyNotify(options);
                    }

                    if(title == "HAPPY BIRTHDAY"){
                        $("#bdaymodal").modal('show');
                    }
                }else{
                    location.replace(uRl);
                }

            },
            error: function (xhr, desc, err) {
            }
        });

        //console.log(options);
    }
    //setTimeout(function(){ shownotify(); }, 000);
    setInterval(function () { shownotify();}, 1000);
    //STAFF BIRTHDAY

    function addExams(id,sbj){
        $("#examid").val(id);
        document.getElementById('sbjname').innerText = sbj + " SCORE";
        $("#addexamsmodal").modal('show');
    }

    function playBday() {
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "getBday="+notifyid,
            success: function (data) {
                //console.log(data);
                if(data == '1'){
                    var bdayaudio = new Audio('assets/audio/bday.mp3');
                    bdayaudio.play();
                }
            },
            error: function (xhr, desc, err) {
            }
        });
        //console.log(options);
    }
    //setTimeout(function(){ playBday(); }, 2000);
</script>
<script type="text/javascript">
function handleClick() {
    if (document.getElementById("lecturer").checked != true) {
        //console.log("unchecked");
        $("#basicval").addClass("hidden");
    }
    else {
        //console.log("checked");
        $("#basicval").removeClass("hidden");
    }
}

function compimgupl() {
    var decision = $("#doceditchkbox").val();
    if (decision == "yes") {
        $("#imghidedoc").removeClass("hidden");
    } else {
        $("#imghidedoc").addClass("hidden");
    }
}

function editcompupl(id) {
    var val = id;
    var strArray = val.split("*");
    var docid = strArray[0];
    var name = strArray[1];
    var status = strArray[2];
    document.getElementById("docid").value = docid;
    document.getElementById("poledittitle").value = name;
    $("#docstatus").prepend("<option selected value='" + status + "'>" + status + "</option>");
}

//CALCULATING END AND RESUME DATE FOR ANNUAL LEAVE
function updateLeave() {
    var lvdays = "";
    var type = $("#leaveType").val();
    if (type == "Compassionate" || type == "Sick") {
        lvdays = $("#hiddencompassion").val();
    } else if (type == "Maternity") {
        lvdays = $("#hiddenmatLeaves").val();
    } else if (type == "Paternity") {
        lvdays = $("#hiddenpatLeaves").val();
    } else if (type == "Study") {
        lvdays = $("#hiddenstdLeaves").val();
    } else {
        lvdays = $("#leavesTaken").val();
    }

    var stdate = $("#lvstartDate").val();

    //console.log(lvdays + " / "+type);
    //Check to ensure that leave type and days are present
    if (lvdays == "" || type == "") {
        alert("Kindly Select Leave Type And Leave Days And Click Again");
    }
    else {
        $.ajax({
            type: "post",
            url: "ajax/leave_calc.php",
            data: "lvdays=" + lvdays + "&stdate=" + stdate + "&type=" + type,
            success: function (data) {
                var result = $.parseJSON(data);
                $comment = result['comment'];
                if ($comment == "OK") {
                    $("#resumeDate").val(result['rsend']);
                    $("#lvendDate").val(result['rsdate']);
                    $("#submitbtn").removeClass("hidden");
                    return false;
                }
                else {
                    alert($comment);
                    $("#submitbtn").addClass("hidden");
                    return false;
                }

            },
            error: function (xhr, desc, err) {
                alert(err);
                return false;
            }
        });
    }
    return false;
}

//Getting the allowed leave days based on leave type selected
function decideLeaveDays() {
    var leavetype = $("#leaveType").val();
    $("#updatebtn").removeClass("hidden");
    $("#submitbtn").addClass("hidden");
    if (leavetype == "Maternity") {
        $("#hiddenmatLeaves").attr("disabled", false);
        $("#hiddenpatLeaves").attr("disabled", true);
        $("#leavesTaken").attr("disabled", true);
        $("#hiddencompassion").attr("disabled", true);
        $("#hiddencompassion").addClass("hidden");

        $("#hiddenmatLeaves").removeClass("hidden");
        $("#hiddenpatLeaves").addClass("hidden");
        $("#leavesTaken").addClass("hidden");
    }
    else if (leavetype == "Paternity") {
        $("#hiddenpatLeaves").attr("disabled", false);
        $("#hiddenmatLeaves").attr("disabled", true);
        $("#leavesTaken").attr("disabled", true);

        $("#hiddenpatLeaves").removeClass("hidden");
        $("#hiddenmatLeaves").addClass("hidden");
        $("#leavesTaken").addClass("hidden");
        $("#hiddencompassion").attr("disabled", true);
        $("#hiddencompassion").addClass("hidden");
    }
    else if (leavetype == "Compassionate") {
        $("#hiddenpatLeaves").attr("disabled", true);
        $("#hiddenmatLeaves").attr("disabled", true);
        $("#leavesTaken").attr("disabled", true);

        $("#hiddenpatLeaves").addClass("hidden");
        $("#hiddenmatLeaves").addClass("hidden");
        $("#leavesTaken").addClass("hidden");
        $("#hiddencompassion").attr("disabled", false);
        $("#hiddencompassion").removeClass("hidden");
    }
    else if (leavetype == "") {
        $("#hiddenpatLeaves").attr("disabled", true);
        $("#hiddenmatLeaves").attr("disabled", true);
        $("#leavesTaken").attr("disabled", true);

        $("#leavesTaken").removeClass("hidden");
        $("#hiddenmatLeaves").addClass("hidden");
        $("#hiddenpatLeaves").addClass("hidden");
        $("#hiddencompassion").attr("disabled", true);
        $("#hiddencompassion").addClass("hidden");

        alert("Please Select A leave Type")
    }
    else {
        $("#hiddenpatLeaves").attr("disabled", true);
        $("#hiddenmatLeaves").attr("disabled", true);
        $("#leavesTaken").attr("disabled", false);

        $("#leavesTaken").removeClass("hidden");
        $("#hiddenmatLeaves").addClass("hidden");
        $("#hiddenpatLeaves").addClass("hidden");
        $("#hiddencompassion").attr("disabled", true);
        $("#hiddencompassion").addClass("hidden");
    }
}

function resetbtn() {
    $("#updatebtn").removeClass("hidden");
    $("#submitbtn").addClass("hidden");
}

function checkdate() {//validate the start and end dates
    var date1 = new Date(document.getElementById("startDate").value);
    var date2 = new Date(document.getElementById("endDate").value);
    if (date1 > date2) {
        alert("Start Date Cannot Be Greater Than End Date.");
        return false
    }
    else {
        return true;
    }
}

function confirmLeave() {
    var conf = confirm("Do you want to proceed with the leave application?");
    if (conf == "true") {
        return true;
    }
    else {
        return false;
    }
}

function displaymodal() {
    var val = $("#test").val();
    var msg = $("#ddmsg").val();
    if (val == "yes") {
        $('#successmodal').modal('show');
        document.getElementById('successmsg').innerHTML = msg;
    }
    else if (val == "no") {
        $('#errormodal').modal('show');
        document.getElementById('errormsg').innerHTML = msg;
    }

}


var _validFileExt = [".jpg", ".png"];

function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExt.length; j++) {
                    var sCurExtension = _validFileExt[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Sorry, " + sFileName + " Is Invalid. Only Images With Extensions; " + _validFileExt.join(", ") + " Can Be Uploaded");
                    return false;
                }
            }
        }
    }

    return true;
}

//EXCEL CHECK
var _validFile = [".xlsx", ".xlsm"];

function checkexcel(oForm) {
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
                    alert("The file you have uploaded is not valid. Make sure to upload the excel sheet provided by the HR Department");
                    return false;

                }
            }
        }
    }


    return true;
}

///EXCEL CHECK

//PDF CHECK
var _validpdfFile = [".pdf",".jpg",".png",".JPG",".PNG",".xslx"];

function checkpdf(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validpdfFile.length; j++) {
                    var sCurExtension = _validpdfFile[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("The file you have uploaded is not valid. Make sure to upload PDF Files");
                    return false;
                }
            }
        }
    }
    return true;
}

//IMAGE CHECK
var _validpdfFileimg = [".jpg",".png",".JPG",".PNG"];

function checkimg(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validpdfFileimg.length; j++) {
                    var sCurExtension = _validpdfFileimg[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("The file you have uploaded is not valid. Make sure to upload Image Files");
                    return false;
                }
            }
        }
    }
    return true;
}
///PDF CHECK
function generalfileSize(id) {
    var did = id;
    //console.log(did);
    var fi = document.getElementById(did); // GET THE FILE INPUT.
    // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
    if (fi.files.length > 0) {
        // RUN A LOOP TO CHECK EACH SELECTED FILE.
        for (var i = 0; i <= fi.files.length - 1; i++) {

            var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
            var dsize = (fsize / 1024000);//Size in MB
            if (dsize > 10) {
                document.getElementById(did).value = "";
                document.getElementById("uplresp").innerHTML = "File is too large";
            }
            else {
                document.getElementById("uplresp").innerHTML = "File Size Acceptable";
            }
        }
    }
}

function GetFileSize() {
    var fi = document.getElementById('stimg'); // GET THE FILE INPUT.

    // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
    if (fi.files.length > 0) {
        // RUN A LOOP TO CHECK EACH SELECTED FILE.
        for (var i = 0; i <= fi.files.length - 1; i++) {

            var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
            var dsize = (fsize / 1024000);//Size in MB
            if (dsize > 3) {
                document.getElementById('fp').innerHTML =
                    document.getElementById('fp').innerHTML + "<br /><font style='color: #F00'>File Size is too large!</font></b>";
                document.getElementById("hide").style.visibility = "hidden";
            }
            else {
                document.getElementById('fp').innerHTML =
                    document.getElementById('fp').innerHTML + '<br /> ' +
                    "<font style='color: green'>Image Is Valid</font>";
                document.getElementById("hide").style.visibility = "visible";
            }

        }
    }
}

function showModal(id) {
    var val = id;
    var strArray = val.split("*");
    var comp = strArray[0];
    var sup = strArray[1];
    var tin = strArray[2];
    var url = strArray[3];
    var compid = strArray[4];
    var status = strArray[5];
    var imgurl;
    if (url == "") {
        imgurl = "assets/images/noimage.png";
    }
    else {
        imgurl = url;
    }

    $("#compstatus").prepend("<option selected value='" + status + "'>" + status + "</option>");
    document.getElementById("companyID").value = compid;
    document.getElementById("compname").value = comp;//
}

function shownoteModal(id) {
    var val = id;
    //console.log(val);
    document.getElementById("leavenote").innerHTML = val;
}

function showpostModal(id) {
    var val = id;
    var strArray = val.split("*");
    var post = strArray[0];
    var status = strArray[1];
    var postid = strArray[2];

    $("#poststatus").prepend("<option selected value='" + status + "'>" + status + "</option>");
    document.getElementById("posted").value = post;
    document.getElementById("positionID").value = postid;
}

//EDIT Target
function edittarget(id) {
    //console.log(id);
    var val = id;
    var strArray = val.split("*");
    var id = strArray[0];
    var descript = strArray[1];
    var rate = strArray[2];
    var quarter = strArray[3];
    var year = strArray[5];
    var stfid = strArray[4];
    var g1 = strArray[6];
    var g2 = strArray[7];
    var g3 = strArray[8];
    var g4 = strArray[9];
    $("#editquarter").prepend("<option selected value='" + quarter + "'>" + quarter + "</option>");
    document.getElementById("targetid").value = id;
    document.getElementById("targetsttfid").value = stfid;
    document.getElementById("edittargetrating").value = rate;
    document.getElementById("edittargetyear").value = year;
    document.getElementById("editdescript").innerHTML = "<textarea name='descript' class='form-control' required >" + descript + "</textarea>";
    document.getElementById("grade1").innerHTML = "<textarea name='grade0' class='form-control' required >" + g1 + "</textarea>";
    document.getElementById("grade2").innerHTML = "<textarea name='grade1' class='form-control' required >" + g2 + "</textarea>";
    document.getElementById("grade3").innerHTML = "<textarea name='grade2' class='form-control' required >" + g3 + "</textarea>";
    document.getElementById("grade4").innerHTML = "<textarea name='grade3' class='form-control' required >" + g4 + "</textarea>";
}

function edittargets(id) {
    //console.log(id);
    var yr = $("#edittyear").val();
    var rate = $("#edittrate").val();
    var tgid = $("#editdescyr").val();
    //console.log(yr);
    $("#editdescription").prepend("<option selected value='" + tgid + "'>" + tgid + "</option>");
    document.getElementById("editdescyr").value = yr;
    document.getElementById("editrate").value = rate;
    /*var strArray=val.split("*");
var id=strArray[0];
var descript=strArray[1];
var rate=strArray[2];
var quarter=strArray[3];
var year=strArray[5];
var stfid=strArray[4];
var g1=strArray[6];
var g2=strArray[7];
var g3=strArray[8];
var g4=strArray[9];*/
}

function showsalruleModal(id) {
    var val = id;
    var strArray = val.split("*");
    var name = strArray[0];
    var status = strArray[1];
    var did = strArray[2];

    $("#salrulestatus").prepend("<option selected value='" + status + "'>" + status + "</option>");
    document.getElementById("salaryruleedit").value = name;
    document.getElementById("salaryruleid").value = did;
}

//PV TYPE MODAL--
function showpvModal(id) {
    var val = id;
    var strArray = val.split("*");
    var name = strArray[0];
    var status = strArray[1];
    var did = strArray[2];
    var sup = strArray[3];

    $("#pvstatus").prepend("<option selected value='" + status + "'>" + status + "</option>");
    $("#supedit").prepend("<option selected value='" + sup + "'>" + sup + "</option>");
    document.getElementById("pvedittypes").value = name;
    document.getElementById("pveditid").value = did;
}

//EXPENSE ACCOUNT MODAL--
function showexpaccModal(id) {
    var val = id;
    var strArray = val.split("*");
    var name = strArray[0];
    var status = strArray[1];
    var stfname = strArray[2];
    var sup = strArray[3];
    var did = strArray[4];
    var img = strArray[5];
    var tin = strArray[6];
    $("#expacctstatus").prepend("<option selected value='" + status + "'>" + status + "</option>");
    $("#signatoryedit").prepend("<option selected value='" + sup + "'>" + stfname + "</option>");
    document.getElementById("accountedit").value = name;
    document.getElementById("did").value = did;
    document.getElementById("tinedit").value = tin;
    if (img == "yes") {
        document.getElementById("explogoimg").innerHTML = "<img src='assets/data/expcomp/" + name + ".jpg' class='img-responsive' width='100'/>";
    }
    else {
        document.getElementById("explogoimg").innerHTML = "<img src='assets/images/noimage.png' class='img-responsive' width='100'/>";
    }
}

//TAX CONFIG MODAL--
function showtaxModal(id) {
    var val = id;
    var strArray = val.split("*");
    var taxid = strArray[0];
    var name = strArray[1];
    var dval = strArray[2];
    var status = strArray[3];

    $("#taxstatus").prepend("<option selected value='" + status + "'>" + status + "</option>");
    document.getElementById("taxid").value = taxid;
    document.getElementById("taxname").value = name;
    document.getElementById("percentage").value = dval;
}

//STAFF REC
function showhospitalModal(id) {
    var val = id;
    var strArray = val.split("*");
    var did = strArray[0];
    var name = strArray[1];
    var location = strArray[2];
    var address = strArray[3];
    var email = strArray[4];
    var website = strArray[5];
    var mobile = strArray[6];
    var status = strArray[7];
    document.getElementById("hospid").value = did;
    document.getElementById("hospnameedit").value = name;
    document.getElementById("locationedit").value = location;
    document.getElementById("addressedit").value = address;
    document.getElementById("contactedit").value = mobile;
    document.getElementById("hospemailedit").value = email;
    document.getElementById("websiteedit").value = website;
    $("#hospstatus").prepend("<option selected value='" + status + "'>" + status + "</option>");

}


//BANK
function showbankModal(id) {
    var val = id;
    //console.log(val);
    var strArray = val.split("*");
    var did = strArray[0];
    var name = strArray[1];
    var branch = strArray[2];
    var acc = strArray[3];
    var status = strArray[4];
    var code = strArray[5];
    document.getElementById("bankid").value = did;
    document.getElementById("editbankname").value = name;
    document.getElementById("editbranchh").value = branch;
    document.getElementById("editaccnum").value = acc;
    document.getElementById("editbankcode").value = code;
    $("#bankstatus").prepend("<option selected value='" + status + "'>" + status + "</option>");
}

//STAFF REC
function showexpclsModal(id) {
    var val = id;
    //console.log(val);
    var strArray = val.split("*");
    var did = strArray[0];
    var name = strArray[1];
    var code = strArray[2];
    var status = strArray[3];
    document.getElementById("expclsid").value = did;
    document.getElementById("expcode").value = code;
    document.getElementById("expname").value = name;
    $("#expclsstatus").prepend("<option selected value='" + status + "'>" + status + "</option>");
}


//STAFF REC
function stfgencomModal(id) {
    var val = id;
    //console.log(val);
    var strArray = val.split("*");
    var did = strArray[0];
    var per = strArray[1];
    var yr = strArray[2];
    document.getElementById("cmtyear").value = yr;
    document.getElementById("cmtid").value = did;
    document.getElementById("cmtperiod").value = per;
    //$("#expclsstatus").prepend("<option selected value='"+status+"'>"+status+"</option>");
}

//REJECT TARGET
function rejecttarget(id) {
    var val = id;
    //console.log(val);
    var strArray = val.split("*");
    var did = strArray[0];
    var yr = strArray[1];
    var qt = strArray[2];
    document.getElementById("stfrefid").value = did;
    document.getElementById("dtargetyear").value = yr;
    document.getElementById("dtargetqt").value = qt;
}

function showstaffModal(id) {
    var val = id;
    //console.log(val);
    //GETTING THE STAFF DETAILS
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getStaffInfo=" + val,
        success: function (data) {
            $("#staffedit").modal();
            var result = $.parseJSON(data);
            //console.log(data);
            document.getElementById("stid").value = val;
            document.getElementById("stlst_name").value = result['lname'];
            document.getElementById("stfst_name").value = result['fname'];
            document.getElementById("stcontact").value = result['contact'];
            document.getElementById("stemail").value = result['email'];
            document.getElementById("stfinance").value = result['finance'];
            document.getElementById("stfinance").innerHTML = result['finance'];
            document.getElementById("imgedit").innerHTML = "<img src='" + result['img'] + "' width='100' height='100' />";
            document.getElementById("stcompany").value = result['supervisor'] + "*" + result['company'];
            document.getElementById("stcompany").innerHTML = result['company'];
            document.getElementById("stposition").value = result['position'];
            document.getElementById("stposition").innerHTML = result['position'];
            document.getElementById("ststart_time").value = result['stime'];
            document.getElementById("stend_time").value = result['etime'];
            document.getElementById("stattendance").value = result['attendance'];
            document.getElementById("stattendance").innerHTML = result['attendance'];
            document.getElementById("ststaff").value = result['staff'];
            document.getElementById("ststaff").innerHTML = result['staff'];
            document.getElementById("stpermit").value = result['permit'];
            document.getElementById("stpermit").innerHTML = result['permit'];
            document.getElementById("stmedical").value = result['medical'];
            document.getElementById("stmedical").innerHTML = result['medical'];
            document.getElementById("stleave").value = result['leave'];
            document.getElementById("stleave").innerHTML = result['leave'];
            document.getElementById("stcomp").value = result['comp'];
            document.getElementById("stcomp").innerHTML = result['comp'];
            document.getElementById("sttutorial").value = result['tutorial'];
            document.getElementById("sttutorial").innerHTML = result['tutorial'];
            document.getElementById("stsettings").value = result['settings'];
            document.getElementById("stsettings").innerHTML = result['settings'];
            document.getElementById("loansedit").value = result['loans'];
            document.getElementById("loansedit").innerHTML = result['loans'];
            document.getElementById("ststatus").value = result['status'];
            document.getElementById("ststatus").innerHTML = result['status'];
        },
        error: function (xhr, desc, err) {

        }
    });

}


function showreversal(id) {
    var val = id;
    var strArray = val.split("*");
    var did = strArray[0];
    var type = strArray[1];
    var date = strArray[2];
    var penalty = strArray[3];
    var gensup = strArray[4];
    var stDate = strArray[5];
    var endDate = strArray[6];
    var time = strArray[7];
    var transID = strArray[8];
    document.getElementById("revstfid").value = did;
    document.getElementById("revdate").value = date;
    document.getElementById("revsup").value = gensup;
    document.getElementById("revpen").value = penalty;
    document.getElementById("revstart").value = stDate;
    document.getElementById("revend").value = endDate;
    document.getElementById("dtype").value = type;
    document.getElementById("rtime").value = time;
    document.getElementById("transID").value = transID;

    if (type == "clock_in") {
        $("#hiddentype").prepend("<input type='hidden' name='clockinrpt' />");
    } else {
        $("#hiddentype").prepend("<input type='hidden' name='clockoutrpt' />");
    }
    //console.log(val);
}

function showLoader() {
    $("#hidethis").addClass("hidden");
    $("#loadr").removeClass("hidden");
}

//CHECKING BALANCE OF STAFF MEDICAL RECORD BEFORE INSERTING
function checkmedrec() {
    var stfid = $("#medrecid").val();
    var amount = $("#medamount").val();
    var type = $("#medtype").val();
    var date = $("#meddate").val();
    var user = $("#meduser").val();

    $.ajax({
        type: "post",
        url: "ajax/checkmedRecord.php",
        data: "vokaId=" + stfid + "&amount=" + amount + "&type=" + type + "&date=" + date + "&user=" + user,
        success: function (data) {
            var result = data;
            //console.log(data);
            if (result == "no") {
                alert("Insufficient Funds");
                $("#medsubmit").addClass("hidden");
                $("#checkmed").removeClass("hidden");
                return false;
            } else {
                //console.log(result);
                document.getElementById("medbalance").value = result;
                $("#checkmed").addClass("hidden");
                $("#medsubmit").removeClass("hidden");
                return false;
            }

        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });
    return false;
}

function reverseupdate() {
    $("#medsubmit").addClass("hidden");
    $("#checkmed").removeClass("hidden");
    $("#medbalance").val("0");
}

function addcerttype(id) {
    //console.log(id);
    document.getElementById("certtype").value = id;
}

//DISPLAYING SUPPLIER BASED ON EXPENSE TYPE
function changeSup() {
    var expType = $("#expType").val();
    var strArray = expType.split("*");
    var did = strArray[1];
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "expType=" + did,
        success: function (data) {
            document.getElementById("supp").innerHTML = data;
            //console.log(data);
        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });

}

function addnewrow() {
    var counter = $("#rowcounter").val();
    var ncounter = Number(counter) + 1;
    $("#rowcounter").val(ncounter);
    var new_row = "<tr id='" + ncounter + "'><td><input class = 'form-control' type = 'date' name = 'expdate[]' id = 'expdate' value='<?php echo date("Y-m-d"); ?>'></td><td><textarea class = 'form-control' name = 'description[]' id = 'description' maxlength='300' rows='2'></textarea></td><td><input class = 'form-control' type = 'number' name = 'amount[]' id = 'amount' step='any'></td><td><a onclick='removeRow(" + ncounter + ")'><span class='icon icon-trash btn btn-danger'></span></a></td></tr>";
    $(".dataTables-example").append(new_row);
    //console.log(new_row);
}

function removeRow(id) {
    //console.log(id);
    var parent = document.getElementById("pvbody2");
    var child = document.getElementById(id);
    parent.removeChild(child);
}

function addbasic(val) {
    $("#basicstfid").val(val);
}

function addtarget(val) {
    $("#targetstfid").val(val);
}

function addnewtarget(val) {
    //console.log(val);
    var strArray = val.split("*");
    var yr = strArray[0];
    var comp = strArray[1];
    var qt = strArray[2];
    $("#apprnewyrid").val(yr);
    $("#quarterid").val(qt);
    $("#apprnewcompid").val(comp);
}

function addearn(val) {
    $("#earnstfid").val(val);
}

function addreimb(val) {
    $("#reimbstfid").val(val);
}

function adddeduct(val) {
    $("#deductstfid").val(val);
}

function checkbasic() {
    var val = $("#itemvalue").val();
    var strArray = val.split("*");
    var dval = strArray[1];
    if (dval == "0.00" || dval == "") {
        $("#payitemhide").removeClass("hidden");
    } else {
        $("#payitemhide").addClass("hidden");
    }
}

function checkbasic2() {
    var val = $("#itemvalue2").val();
    var strArray = val.split("*");
    var dval = strArray[1];
    if (dval == "0.00" || dval == "") {
        $("#payitemhide2").removeClass("hidden");
    } else {
        $("#payitemhide2").addClass("hidden");
    }
}

function checkbasic3() {
    var val = $("#itemvalue3").val();
    var strArray = val.split("*");
    var dval = strArray[1];
    if (dval == "0.00" || dval == "") {
        $("#payitemhide3").removeClass("hidden");
    } else {
        $("#payitemhide3").addClass("hidden");
    }
}

//CHECKING THE TARGET RATE FOR A STAFF
function checkrate() {
    var rate = $("#targetrating").val();
    var year = $("#targetyear").val();
    var stfid = $("#targetstfid").val();
    if (rate != null && year != null) {
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "year=" + year + "&rate=" + rate + "&stfid=" + stfid,
            success: function (data) {
                //console.log(data);
                var result = data;
                if (result <= 100) {
                    $("#hidesubmit").removeClass("hidden");
                    $("#hidevalidate").addClass("hidden");
                }
                else {
                    alert("Target Ratings Will Exceed 100%. Please review the targets");
                }
            },
            error: function (xhr, desc, err) {
                alert(err);
            }
        });
    }
}

//WILL WORK ON IT LATER
function checkappraisal() {
    var period = $("#revperiod").val();
    var year = $("#apprformyear").val();
    var stfid = $("#apprstfid").val();
    //console.log(period+"/"+year+"/"+stfid);
    if (year == "") {
        alert("Select The Year");
        $("#revperiod").prepend("<option value='' selected></option>");
    }
    else if (period == "") {
        alert("Select The Review Period");
        $("#apprformhide").addClass("hidden");
    }
    else {
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "apprformyear=" + year + "&period=" + period + "&stfid=" + stfid,
            success: function (data) {

                var result = data;
                //console.log(result);
                if (result == "OK") {
                    $("#apprformhide").removeClass("hidden");
                }
                else if (result == "NoTgt") {
                    alert("Target Not Ready");
                    $("#apprformhide").addClass("hidden");
                }
                else if (result == "MidDone") {
                    alert("Ooops!! Mid Year Review Has Already Been Done");
                    $("#apprformhide").addClass("hidden");
                }
                else if (result == "NomYear") {
                    alert("Ooops!! Cannot Proceed! Check From Your Supervisor To Make Sure You Have Targets Available And Mid Year Review Has Been Completed");
                    $("#apprformhide").addClass("hidden");
                }
            },
            error: function (xhr, desc, err) {
                alert(err);
            }
        });
    }
}

function checkstaffrev() {
    var period = $("#suprevperiod").val();
    var year = $("#supappryear").val();
    var stfid = $("#supstfid").val();
    if (year == "") {
        alert("Select The Year");
        $("#suprevperiod").prepend("<option value='' selected></option>");
    }
    else if (period == "") {
        alert("Select The Review Period");
    }
    else {
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "supappryear=" + year + "&period=" + period + "&stfid=" + stfid,
            success: function (data) {
                var result = data;
                if (result == "end" || result == "mid") {
                    $("#suprevhide").removeClass("hidden");
                }
                else if (result == "NoTgt") {
                    alert("Target For " + year + " Has Not Been Set For Staff");
                    $("#suprevhide").addClass("hidden");
                }
                else if (result == "no_mid") {
                    alert(year + " Mid-Year Review Is Not Ready. It is because review is not completed by staff");
                    $("#suprevhide").addClass("hidden");
                }
                else if (result == "nomidDone") {
                    alert(year + " Mid-Year Review Has Not Been Done. Do That Before End Of Year Review");
                    $("#suprevhide").addClass("hidden");
                }
            },
            error: function (xhr, desc, err) {
                alert(err);
            }
        });
    }
    /*
if(rate !=null && year !=null){

}*/
}

//CONFIRMATIONS
function confirmtrans(val) {
    var msg = val;
    var response = confirm(msg);
    if (response == true) {
        return true;
    }
    else {
        return false;
    }
}

function logout() {
    $("#logoutmodal").modal("show");
}

//
function chqadd() {
    if (document.getElementById("chqq").checked == true) {
        $("#chqno").removeClass("hidden");
        $("#chqno").addClass("required");
    }
    else {
        document.getElementById("dchq").value == "no"
        $("#dchq").val("no");
        $("#chqno").addClass("hidden");
    }
}

function exchrate(val) {
    var curr = val;
    //console.log(val);
    if(val == ''){
        alert('Please Select A Currency From The Drop Down');
        $("#exchhide1").val('');
    }
    else if(val == 'cedis'){
        $("#exchhide1").val('1.0');
    }else{
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "getexchrate=" + val,
            success: function (data) {
                //console.log(data);
                $("#exchhide1").val(data);
                //document.getElementById("staffpopulate").innerHTML = result;
                //$("#db").attr("disabled", false);

            },
            error: function (xhr, desc, err) {
                alert(err);
            }
        });
    }
}

function showtut(val) {
    var curr = val;
    //console.log(curr);
    if (curr == "link" || curr == "youtube") {
        $("#tutdl").attr("disabled", false);
        $("#tuthide").removeClass("hidden");
        $("#ttext").removeClass("hidden");
        //$("#ttext").attr("disabled", false);
        $("#tfile").addClass("hidden");
        //$("#tfile").attr("disabled", true);
    }
    else if (curr == "file") {
        $("#tutdl").attr("disabled", false);
        $("#tuthide").removeClass("hidden");

        $("#tfile").removeClass("hidden");
        //$("#tfile").attr("disabled", false);

        $("#ttext").addClass("hidden");
        //$("#ttext").attr("disabled", true);
    }
    else {
        $("#tutdl").attr("disabled", true);
        $("#tuthide").addClass("hidden");
        $("#tfile").addClass("hidden");
        $("#ttext").addClass("hidden");
        //$("#ttext").attr("disabled", true);
        //$("#tfile").attr("disabled", true);
    }
}


function showstaff(val) {
    var valu = val;
    //console.log(valu);
    if (valu == "") {
        $("#stfrec").addClass("hidden");
    }
    else {
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "companyid=" + valu,
            success: function (data) {
                var result = data;
                //console.log(result);
                document.getElementById("staffpopulate").innerHTML = result;
                $("#db").attr("disabled", false);

            },
            error: function (xhr, desc, err) {
                alert(err);
            }
        });
    }
}

function showstaff2(val) {
    var valu = val;
    if (valu == "") {
        $("#stfrec").addClass("hidden");
    }
    else {
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "companyid=" + valu,
            success: function (data) {
                var result = data;
                //console.log(result);
                document.getElementById("staffpopulatee").innerHTML = result;
                $("#db").attr("disabled", false);

            },
            error: function (xhr, desc, err) {
                alert(err);
            }
        });
    }
}

function tuttargets(id) {
    var val = id;
    if (val == "All") {
        $("#tuttarget").val("Unit");
    }
    else {
        $("#tuttarget").val(id);
    }
}

function checkcomptarget(id) {
    var date = id;
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "companytargetdate=" + date,
        success: function (data) {
            var result = data;
            //console.log(result);
            //$("#db").attr("disabled", false);

        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });
}

//check if staff has target for a specific year
function checkapprstat(year) {
    var voka = $("#chkapprstf").val();
    if (year != "") {
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "checkapprstat=" + year + "&voka=" + voka,
            success: function (data) {
                var result = data;
                //console.log(result);
                if (result == "yes") {
                    $("#chkapprbtn").removeClass("hidden");
                } else if (result == "no") {
                    $("#chkapprbtn").addClass("hidden");
                    alert("Target Already Set For The Year " + year);
                }
                //$("#db").attr("disabled", false);

            },
            error: function (xhr, desc, err) {
            }
        });
    }
    else {
        $("#chkapprbtn").addClass("hidden");
        alert("Please Select A Date");
    }
}

//CHECKING THE IDLE COUNTDOWN
var result = 600;

function generalCountDown() {
    result = result - 1;
    //VARIABLE DECLARATIONS FOR THE COUNTDOWN
    var min = 0;
    var sec = 0;

    min = parseInt((result / 60));
    sec = parseInt((result) % 60);
    document.getElementById("timer").innerHTML = min + " minutes " + sec + " seconds ";

    if (result == 0) {
        window.location.href = 'unlock.php';
    }
}

//setInterval(function(){generalCountDown();}, 1000);
function showleave(dval) {
    //console.log(dval);
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getLeave=" + dval,
        success: function (data) {
            var result = data;
            //console.log(result);
            var result = $.parseJSON(data);
            document.getElementById("alvid").innerHTML = dval;
            document.getElementById("lvappl").innerHTML = result['app'];
            document.getElementById("lvdate").innerHTML = result['doreg'];
            document.getElementById("lvtype").innerHTML = result['ltype'];
            document.getElementById("lvdays").innerHTML = result['ldays'];
            document.getElementById("lvsdate").innerHTML = result['sdate'];
            document.getElementById("lvedate").innerHTML = result['edate'];
            document.getElementById("lvrdate").innerHTML = result['rdate'];
            document.getElementById("lvnote").innerHTML = result['note'];
            document.getElementById("lvrep").innerHTML = result['repby'];
            $("#lvstatus").val(result['status']);
            $("#dlivid").val(dval);
            $("#dlivdays").val(result['ldays']);
            $("#vokID").val(result['appid']);

            $("#leaveApprove").modal();
        },
        error: function (xhr, desc, err) {
        }
    });
}

function checkpass(dval) {
    var entry = $("#npass").val();
    var regexp = /^[0-9a-zA-Z]+$/;
    if (entry.match(regexp) && entry.length >= 8) {
        //console.log(entry + " is accepted")
        $("#npassimg").removeClass("hidden");
    } else {
        $("#npassimg").addClass("hidden");
    }
}

function confpass() {
    var npass = $("#npass").val();
    var rpass = $("#rpass").val();
    if (rpass == npass) {
        $("#rpassimg").removeClass("hidden");
        $("#chsub").removeClass("hidden");
    } else {
        $("#rpassimg").addClass("hidden");
        $("#chsub").addClass("hidden");
    }
}

function getList(dval) {
    if (dval == "" || dval == "Student") {
        document.getElementById("listdisp").innerHTML = "";
        $("#listbtn").addClass("hidden");
    } else {
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "getList=" + dval,
            success: function (data) {
                document.getElementById("listdisp").innerHTML = data;
                $("#listbtn").removeClass("hidden");
            },
            error: function (xhr, desc, err) {
            }
        });
    }
}

function edit_career(id) {
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "editcareer=" + id,
        success: function (data) {
            //console.log(data);
            var result = $.parseJSON(data);
            $("#ejobtitle").val(result['title']);
            $("#careerid").val(id);
            $("#edeadline").val(result['deadline']);
            document.getElementById("ecareer_note").innerHTML = result['description'];
            $("#ecompany").prepend("<option selected value='" + result['company'] + "'>" + result['company'] + "</option>");
            $("#ejobtype").prepend("<option selected value='" + result['type'] + "'>" + result['type'] + "</option>");

        },
        error: function (xhr, desc, err) {
        }
    });
}

function getJobDet(jobid, email) {
    //console.log(jobid + " / " + email);
    $("#aptjobemail").val(jobid);
    $("#aptjobid").val(email);
}

function showqxtnimg() {
    // Get the checkbox
    var checkBox = document.getElementById("qxtnimg");

    // If the checkbox is checked, display the output text
    if (checkBox.checked == true) {
        $("#dqxtnimg").removeClass("hidden");
        $("#imgurl").removeClass("hidden");
    } else {
        $("#dqxtnimg").addClass("hidden");
        $("#imgurl").addClass("hidden");
    }
}

function chequeValidate() {
    var chk = $("#checkno").val(),
        template = $("#template").val(),
        date = $("#chequedate").val();
    var error = $("#error");
    if (!chk || !template || !date) {
        error.html('<span class="text-danger">Please Provide both cheque number and template type</span>');
        setTimeout(function () {
            error.html("");
        }, 2000);
        return false;
    }
    //console.log(chk);
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "checknumber=" + chk + "&template=" + template + "&date=" + date + "&type=chequevalidate",
        success: function (data) {
            //console.log(data)
            data = JSON.parse(data);
            if (data.success == true) {

            }
            else {
                error.html('<span class="text-danger">' + data.message + '</span>');
                setTimeout(function () {
                    error.html("");
                }, 5000);
            }
        },
        error: function (xhr, desc, err) {

        }
    });
}

function addCheque(id){
    //console.log(id);
    $('#chqpvid').val(id);
    $('#addcheque').modal('show');
}

function showuat(id){

    $('#rev_project').modal('show');
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getuat=" + id,
        success: function (data) {
            var result = $.parseJSON(data);
            document.getElementById("prevtitle").innerHTML=result['title'];
            document.getElementById("prevdesc").innerHTML=result['desc'];
            $("#previd").val(id);
            $("#prevform").removeClass("hidden");
            $("#loadrnew").addClass("hidden");
        },
        error: function (xhr, desc, err) {

        }
    });
}
function viewuat(id){

    $('#rev_project_view').modal('show');
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getuatfback=" + id,
        success: function (data) {
            var result = $.parseJSON(data);
            document.getElementById("prevtitle_view").innerHTML=result['title'];
            document.getElementById("prevdesc_view").innerHTML=result['desc'];
            document.getElementById("prevfback_view").innerHTML=result['fback'];
            $("#prevform_view").removeClass("hidden");
            $("#pviewloadr").addClass("hidden");
        },
        error: function (xhr, desc, err) {

        }
    });
}

function previewfile(id,note){
    var imageshow="<img src='"+id+"' class='img-responsive' />";
    document.getElementById("file_view").innerHTML=imageshow;
    document.getElementById("docnote").innerHTML=note;
    $('#file_display').modal('show');
}

function viewpdf(id){
    //console.log(id);
    var imageshow = "<embed src='"+id+"' type='application/pdf' width='100%' height='600px' />";
    document.getElementById("file_view").innerHTML=imageshow;
    $('#file_display').modal('show');
}

function viewpdfhr(id){
    //console.log(id);
    var imageshow = "<embed src='"+id+"#toolbar=0' type='application/pdf' width='100%' height='600px'/>";
    document.getElementById("file_view").innerHTML=imageshow;
    $('#file_display').modal('show');
}



function upDate(id){
    var ddate = $("#chdate").val();
    var voka = id;
    //console.log(ddate);
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "updatedob=" + ddate+"&voka="+voka,
        success: function (data) {
            //console.log(data);
            if(data == "OK"){
                alert("Date Of Birth Updated Successfully");
            }
            else{
                alert("Date Of Birth Not Updated");
            }
        },
        error: function (xhr, desc, err) {

        }
    });
}
</script>
<script>
    printDivCSS = new String ('<link href="myprintstyle.css" rel="stylesheet" type="text/css">')
    function printDiv(divId) {
        window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
    }
</script>
</body>
</html>

