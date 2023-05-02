<?php
include("connection/conn.php");
$conn=new Db_connect;
$dbcon=$conn->conn();
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
    $pv = $seldata['pv'];
    $staff = $seldata['stfmgt'];
    $student = $seldata['stdmgt'];
    $configs = $seldata['configs'];
    $sales = $seldata['sales'];

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
$conn->close($dbcon);
include("includes/process.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <title><?php echo $cname; ?> | HOMEPAGE</title>

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
    <!--<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">-->
    <style>

        .first {
            color: #032372;
            font-size: x-small;
            font-weight: bold;
        }

        th {
            color: #032372;
            font-weight: bold;
            text-align: left;
        }

        .temphead{
            background-color: #032372;
            color: #ffffff;
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

            .printhide{
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
            color: #032372;
        }
        .text-muted{
            color: #06112C;
        }
        .rqd{
            color: #ff0000;
            font-weight: bold;
            font-size: large;
        }

        .no-margin{
            font-size: x-large;
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
                <!-- Main navigation -->
                <?php include("includes/sidemenu.php") ?>
                <!-- /main navigation -->

            </div>
        </div>
        <!-- /main sidebar -->

        <?php
        if(isset($_GET['courses'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM classes";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-book3 position-left"></i>CLASSES</h4></div>
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
                                                <div class="text-semibold">Total Classes</div>
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
                            <li class="maincolor"><i class="icon-book3 position-left"></i> Classes</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#coursereg"><i class="icon-add-to-list position-left"></i> Add New Class</a></li>
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
                                                <th>Name</th>
                                                <th>Exams Template</th>
                                                <th>Status</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($conn->sqlnum($selstfrun) != 0){
                                                $count = 0;
                                                while($data = $conn->fetch($selstfrun)){
                                                    $count+=1;
                                                    $cid = $data['id'];
                                                    $status = $data['status'];
                                                    $decor="none";
                                                    $color="#000";
                                                    if($status == "INACTIVE"){
                                                        $decor="line-through";
                                                        $color="#CCC";
                                                    }
                                                    ?>
                                                    <tr style="text-decoration: <?php echo $decor; ?>; color: <?php echo $color; ?>">
                                                        <td><?php echo $count; ?></td>
                                                        <td><a href="dashboard.php?class_details=<?php echo $cid; ?>"><?php echo $data['cname']; ?></a></td>
                                                        <td><?php echo $data['template']; ?></td>
                                                        <td><?php echo $data['status']; ?></td>
                                                        <td><button class="btn btn-warning" onclick="editClass(<?php echo $cid; ?>)"><span class="icon icon-database-edit2"></span>Edit</button></td>
                                                    </tr>
                                                <?php }}else{ ?>
                                                <tr><td colspan="3">No Records Found</td></tr>
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
            <?php $conn->close($dbcon);}elseif(isset($_GET['banks'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM banks ORDER BY name ASC";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-piggy-bank position-left"></i>BANKS</h4></div>
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
                                                <div class="text-semibold">Total Banks</div>
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
                            <li><i class="icon-book2 position-left"></i> Payment Voucher</li>
                            <li class="maincolor"><i class="icon-book3 position-left"></i> Banks</li>
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
                                        <table class="table table-striped table-responsive">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Bank Name</th>
                                                <th>Account Number</th>
                                                <th>Branch</th>
                                                <th>Status</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($conn->sqlnum($selstfrun) != 0){
                                                $count = 0;
                                                while($data = $conn->fetch($selstfrun)){
                                                    $count+=1;
                                                    $bid = $data['id'];
                                                    $status = $data['status'];
                                                    $decor="none";
                                                    $color="#000";
                                                    if($status == "INACTIVE"){
                                                        $decor="line-through";
                                                        $color="#CCC";
                                                    }
                                                    ?>
                                                    <tr style="text-decoration: <?php echo $decor; ?>; color: <?php echo $color; ?>">
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $data['name']; ?></td>
                                                        <td><?php echo $data['account']; ?></td>
                                                        <td><?php echo $data['branch']; ?></td>
                                                        <td><button class="btn btn-warning" onclick="editClass(<?php echo $cid; ?>)"><span class="icon icon-database-edit2"></span>Edit</button></td>
                                                    </tr>
                                                <?php }}else{ ?>
                                                <tr><td colspan="6">No Records Found</td></tr>
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
            <?php $conn->close($dbcon);}elseif (isset($_GET['taxes'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
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
                                                    $taxid = $stfdata['id'];
                                                    $name = $stfdata['name'];
                                                    $val = $stfdata['val'];
                                                    $status = $stfdata['status'];

                                                    //get the name
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $name; ?></td>
                                                        <td><?php echo($val * 100); ?></td>
                                                        <td><?php echo $stfdata['status']; ?></td>
                                                        <td><button class="btn btn-warning" onclick="editClass(<?php echo $taxid; ?>)"><span class="icon icon-database-edit2"></span>Edit</button></td>

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
        <?php $conn->close($dbcon);}elseif(isset($_GET['pos'])){
            $conn=new Db_connect;
            $dbconnection=$conn->conn();
            $sel = "SELECT pname, sprice, pid, qty FROM products_master WHERE status = 'ACTIVE' AND qty > 0";
            $selrun = $conn->query($dbconnection,$sel);
            //GENERATE SESSION ID
            $sessionid = $stfID.$currDateTime;
            //DELETE UNPROCESSED TRANSACTIONS
            $del = "DELETE FROM pos_temp WHERE userid = '$stfID'";
            $conn->query($dbconnection,$del);

            $seltot = "SELECT SUM(tot_sales) AS totalsales FROM sales_summary WHERE transdate BETWEEN '$sdate' AND '$edate' AND userid = '$stfID'";
            $seltotrun = $conn->query($dbconnection,$seltot);
            $seltotdata = $conn->fetch($seltotrun);
            ?>
            <div id="content">
                <div class="container">
                    <div class="page-header">
                        <div class="page-header-content">
                            <div class="row" style="">
                                <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash2 position-left"></i>CASH SALES</h4></div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-lg-3">&nbsp;</div>

                                        <div class="col-lg-3">&nbsp;</div>

                                        <div class="col-lg-6">
                                            <ul class="list-inline text-center">
                                                <li>
                                                    <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-piggy-bank"></i></a>
                                                </li>
                                                <li class="text-center">
                                                    <div class="text-muted">
                                                        <h3 align="center" id="psalestot"><?php $tot = $seltotdata['totalsales']; if($tot != 0){ echo "GHS ".number_format($tot,2);}else{ echo "GHS 0.00"; } ?></h3>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="breadcrumb-line">
                            <ul class="breadcrumb">
                                <li><i class="icon-user position-left"></i> Sales Management</li>
                                <li class="maincolor"><i class="icon-users position-left"></i> Cash Sales</li>
                            </ul>
                        </div>
                    </div>

                    <!--=== Page Content ===-->
                    <!--=== Statboxes ===--><!-- /.row -->
                    <!-- PAYMENTS RECEIPT -->
                    <input type="hidden" name="sessionid" id="sessionid3" value="<?php echo $sessionid; ?>" />
                    <div class="row hidden" style="margin-top: 20px; background-color: #e8e7e3" id="paymentcheckout">
                        <div class="col-md-8" style="margin-bottom: 20px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="text-align: center; color: #000; font-weight: bold; font-size: x-large">PAYMENT</p>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <p style="font-weight: bold; text-align: center; font-size: large">Total Cost</p>
                                            <input type="hidden" class="form-control" readonly style="background-color: #b3e891" id="pos_total" value="0.00" name="paytotal"/>
                                            <div style="color: #00e247; font-weight: bolder; font-size: xx-large; text-align: center;" id="pos_totaldisp"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <p style="font-weight: bold; text-align: center; font-size: large">Tendered</p>
                                            <input type="number" class="form-control" min="0" step="any" onkeyup="calculatebalance(this.value)" id="paytender"/><br>
                                            <div align="center"><button type="button" class="btn btn-lg btn-primary" onclick="continuesales()"><< CONTINUE SELLING</button></div>
                                        </div>
                                        <div class="col-md-4">
                                            <p style="font-weight: bold; text-align: center; font-size: large">Change</p>
                                            <input type="hidden" class="form-control" readonly style="background-color: #b3e891" id="pos_bal" name="paybal"/>
                                            <div style="color: #00e247; font-weight: bolder; font-size: xx-large; text-align: center;" id="pos_baldisp">0.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-12" style="margin-top: 20px;">
                                    <div class="row">
                                        <div class="col-md-12" id="new_customer">
                                            <table class="table">
                                                <tr>
                                                    <td align="center" colspan="2"><p style="font-weight: bold;">Buyer Details</p></td>
                                                </tr>
                                                <tr>
                                                    <td align="right"><p style="font-weight: bold;">Name</p></td>
                                                    <td><input type="text" class="form-control" id="cname" placeholder="Name Of Buyer"/></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12" align="center" style="margin-top: 20px">
                                    <button type="button" class="btn btn-lg" id="invalidtend">VALIDATE</button>&nbsp;&nbsp;&nbsp;
                                    <button type="button" class="btn btn-lg btn-success hidden" id="validtend"  onclick = "checkoutpay()">VALIDATE</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="paymentpos">

                        <div class="col-md-6">
                            <div class="panel panel-flat" style="border: 3px solid #ff0000;">
                                <div class="panel-heading">
                                    <h4><i class="icon-reorder"></i> PRODUCTS LIST</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="panel-body">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Selling Price</th>
                                                    <th>Quantity</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                if($conn->sqlnum($selrun) != 0){
                                                $count = 0;
                                                while($data = $conn->fetch($selrun)){
                                                    $pid = $data['pid'];
                                                    $pname = $data['pname'];
                                                    $count ++;
                                                    /*GET THE PRODUCT DETAILS
                                                    $get="SELECT * FROM products_master WHERE pid = '$pid'";
                                                    $getrun = $conn->query($dbconnection,$get);
                                                    $gdata = $conn->fetch($getrun);*/
                                                    ?>
                                                    <tr>
                                                        <td><a onclick="displaysales('<?php echo $pname; ?>','<?php echo $pid; ?>','<?php echo $stfID ?>','')" href="#"><?php echo $data['pname']; ?></a></td>
                                                        <td><a onclick="displaysales('<?php echo $pname; ?>','<?php echo $pid; ?>','<?php echo $stfID ?>','')" href="#"><?php echo $data['sprice']; ?></a></td>
                                                        <td><a onclick="displaysales('<?php echo $pname; ?>','<?php echo $pid; ?>','<?php echo $stfID ?>','')" href="#"><?php echo $data['qty']; ?></a></td>
                                                    </tr>
                                                <?php }}else{ ?>
                                                    <tr><td colspan="3">No Products Available In Stock</td></tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Validation Example 1 -->
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-flat" style="border: 3px solid #ff0000;">
                                <div class="panel-heading">
                                    <h4><i class="icon-shopping-cart"></i> SHOPPING CART</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-12"  id="salesdisplay">Empty Cart</div>
                                </div>
                            </div>
                            <!-- /Validation Example 1 -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="posreceipt">

                        </div>
                    </div>
                    <!-- /Page Content -->
                </div>
                <!-- /.container -->

            </div>

            <?php $conn->close($dbconnection);}elseif (isset($_GET['bank_deposits'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM bank_deposits WHERE stfid = '$stfID' ORDER BY dod DESC";
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
                                                <th>Bank Name</th>
                                                <th>Cheque Number</th>
                                                <th>Amount On Cheque</th>
                                                <th>Date Of Deposit</th>
                                                <th>Slip</th>
                                                <th>Description</th>
                                                <th>Entered By</th>
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
                                                <td><?php echo getbank($data['id']); ?></td>
                                                <td><?php echo $data['chq']; ?></td>
                                                <td><?php echo number_format($data['chqamount'],2,'.',','); ?></td>
                                                <td><?php echo $data['dod']; ?></td>
                                                <td><a onclick="viewpdf('<?php echo $fullurl; ?>')">View Slip</a></td>
                                                <td><?php echo $data['description']; ?></td>
                                                <td><?php echo getStaff($data['stfid']); ?></td>
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
        <?php $conn->close($dbcon);}elseif (isset($_GET['products_received'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM transfers ORDER BY tstamp DESC";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-piggy-bank position-left"></i>Product Transfers</h4></div>
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
                                                <div class="text-semibold">Number Of Transfers</div>
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
                            <li><i class="icon-user position-left"></i> Sales Management</li>
                            <li class="maincolor"><i class="icon-users position-left"></i> Received Products</li>
                        </ul>
                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a  onclick="singleproduct()" class="btn btn-primary"><i class="icon-add-to-list position-left"></i>Receive Products</a></li>
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
                                                <th>Product</th>
                                                <th>Previous Stock</th>
                                                <th>Received Quantity</th>
                                                <th>Total Stock</th>
                                                <th>Date Received</th>
                                                <th>Received By</th>
                                                <th>Description</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                 $count= 0;
                                                 while($data = $conn->fetch($selstfrun)){
                                            ?>
                                            <tr>
                                                <td><?php echo getProduct($data['pid']); ?></td>
                                                <td><?php echo $data['prev']; ?></td>
                                                <td><?php echo $data['cur']; ?></td>
                                                <td><?php echo $data['prev'] + $data['cur']; ?></td>
                                                <td><?php echo $data['tstamp']; ?></td>
                                                <td><?php echo getStaff($data['stfid']); ?></td>
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
            <?php $conn->close($dbcon);}elseif (isset($_GET['bankdepositreport'])) {
            $conn=new Db_connect;
            $dbcon=$conn->conn();
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
        <?php $conn->close($dbcon);}elseif (isset($_GET['generalpvreport'])) {
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $stdate = $_GET['pvrepsd'];
            $enddate = $_GET['pvreped'];
            $qry = "SELECT * FROM pv_detail WHERE status IN ('Complete','Approved') AND app_date BETWEEN '$stdate 00:00:00' AND '$enddate 23:59:59' ORDER BY app_date DESC";
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
                                        $rate = $items['exchrate'];
                                        $status = $items['status'];

                                        $amount = $items['total'];
                                        $totamount += $amount;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $items['pv_id']; ?>
                                            </td>
                                            <td>
                                                <small><?php echo getExp($items['expense_class']); ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo $items['supplier']; ?></small>
                                            </td>
                                            <td>
                                                <small><?php echo number_format($amount, 2); ?></small>
                                            </td>
                                            <td>
                                                <small><?php $stDate = $items['app_date'];
                                                    echo date("d M,Y", strtotime(date($stDate))); ?></small>
                                            </td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                    <tbody>
                                    <tr style="background-color: rgba(232,231,227,0.9); font-weight: bold;">
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
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
        <?php $conn->close($dbcon);}elseif (isset($_GET['pvcreate'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
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
                                                    <th>Date</th>
                                                    <th>Expense Classification</th>
                                                    <th>Supplier</th>
                                                    <th>Total Amnt</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>&nbsp;</th>
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
                                                            <small><?php echo $items['app_date']; ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo getExp($items['expense_class']); ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo $items['supplier']; ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo $items['total']; ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo $items['status']; ?></small>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="dashboard.php?viewPV=<?php echo $pvid; ?>"
                                                               class="btn btn-sm btn-success"><i class="icon-pencil7"></i> View</a>
                                                        </td>
                                                        <td>
                                                            &nbsp;
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
        <?php $conn->close($dbcon);}elseif (isset($_GET['pending_pvs'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $qry = "SELECT * FROM pv_detail WHERE status='CONFIRMED' ORDER BY app_date DESC";
            $qryRun = $conn->query($dbcon, $qry);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash4 position-left"></i>PENDING PAYMENT VOUCHERS</h4></div>
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
                            <li class="maincolor"><i class="icon-users position-left"></i> Pending Payment Vouchers</li>
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
                                                    <th>Expense Classification</th>
                                                    <th>Supplier</th>
                                                    <th>Total Amnt</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                    <th>&nbsp;</th>
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
                                                            <small><?php echo getExp($items['expense_class']); ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo $items['supplier']; ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo $items['total']; ?></small>
                                                        </td>
                                                        <td>
                                                            <small><?php echo $items['status']; ?></small>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="dashboard.php?viewPV=<?php echo $pvid; ?>"
                                                               class="btn btn-sm btn-success"><i class="icon-pencil7"></i> View</a>
                                                        </td>
                                                        <td>
                                                            &nbsp;
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
            <?php $conn->close($dbcon);}elseif (isset($_GET['viewPV'])) {
            $conn=new Db_connect;
            $dbcon=$conn->conn();
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
            <div class="page-header">

                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><i class="icon-bookmark position-left"></i>Payment Vouchers</li>
                        <li class="maincolor"><a href="dashboard.php?pvcreate"><i class="icon-book3 position-left"></i> My PVs</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-white" style="margin: 2%">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h6>PV#: <?php echo $pvid; ?></h6>
                        </div>
                        <div class="col-md-6"><p style="color: #d23f32; font-weight: bold; font-size: x-large;"><?php echo $pvData['status']; ?></p>
                        </div>
                    </div>
                </div>

                <div class="panel-body no-padding-bottom">
                    <div class="row" style="border: thin #0D47A1 solid; margin: 1%; padding: 1%; background-color: #fff5df">
                        <div class="col-md-12">
                            <div class="row">
                                <label>DOCUMENT(S)</label><br/>
                                <?php
                                $docqry = "SELECT fname, id FROM pvdoc WHERE pv_id='$pvid' AND doctype='doc'";
                                $docrun = $conn->query($dbcon,$docqry);

                                while ($data = $conn->fetch($docrun)) {
                                    $url = $data['fname'];
                                    $id = $data['id'];
                                    $fullurl= "assets/data/pvdocs/".$url;
                                    ?>
                                    <div class="col-md-4">
                                        <a onclick="viewpdf('<?php echo $fullurl; ?>')"><?php echo $url; ?></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="border: thin #0D47A1 solid; margin: 1%; padding: 1%; background-color: #d7ffcd">

                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6 content-group" style="border-right: #ff0000 thin solid">
                            <span class="text-muted"><h5>Applicant:</h5></span>
                            <ul class="list-condensed list-unstyled">
                                <li><?php echo checkName($pvData['stfid']); ?></li>
                            </ul>
                            <span class="text-muted"><h5>Beneficiary:</h5></span>
                            <ul class="list-condensed list-unstyled">
                                <li><?php echo $pvData['supplier'];?>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6  content-group">
                            <ul class="list-condensed list-unstyled invoice-payment-details">
                                <li>Date: <span class="text-right text-semibold"><?php $pvdate = $pvData['app_date'];
                                        echo date("l, d M, Y H:i:s A", strtotime(date($pvdate))); ?></span></li>
                            </ul>
                            <ul class="list-condensed list-unstyled invoice-payment-details">

                                <li>Total Amount: <span
                                            class="text-right text-semibold">&cent;<?php echo number_format($pvData['total'],2); ?></span>
                                </li>
                                <li>Cheque Number: <span class="text-right text-semibold"><?php echo $pvData['chekno']; ?></span>
                                </li>
                                <li>Expense Class: <span class="text-right text-semibold"><?php  echo getExp($pvData['expense_class']); ?></span>
                                </li>
                            </ul>

                        </div>

                    </div>

                    <div class="row" style="border: thin #0D47A1 solid; margin: 1%; padding: 1%;">
                        <div class="col-md-12">
                            <h4>ITEMS LIST</h4>
                            <div class="table-responsive">
                                <table class="table table-lg table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
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
                                            <td><?php echo $pvdetData['description']; ?></td>
                                            <td>&cent;<?php echo number_format($pvdetData['total'], 2); ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><p style="color:#0a68b4 ; font-weight: bold; text-align: right;">Total</p></td>
                                        <td>
                                            <p style="color:#0a68b4 ; font-weight: bold;">&cent;<?php echo number_format($total, 2); ?></p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <?php
                    if ($status == "CONFIRMED" && $pv != "") {
                        ?>
                        <form method="post">
                            <input type="hidden" name="pvid" value="<?php echo $pvid; ?>"/>
                            <div class="row" style="margin: 2%">
                                <div class="col-md-4">
                                    <h5>Approval Request</h5>
                                    <p><textarea class="form-control" maxlength="100" placeholder="Comment" name="pvcomment"></textarea></p>
                                    <p><button class="btn btn-success" name="pvapproval">Approve PV</button>&nbsp;&nbsp;
                                        <button class="btn btn-danger" name="pvreject">Reject PV</button></p>
                                </div>
                            </div>
                        </form>
                    <?php }elseif($status == "APPROVED" || $status == "REJECTED"){?>
                        <div class="row" style="margin: 2%">
                            <div class="col-md-6">
                                <h5>Approval Details</h5>
                                <p><label>Name:</label><?php echo checkName($pvData['supervisor']); ?><br>
                                    <label>Date:</label><?php $adate = $pvData['supdate'];
                                    echo date("d/M/Y H:i:s A", strtotime(date($adate))); ?><br>
                                    <label>Comment:</label><?php echo $pvData['comment']; ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>

            <!-- /invoice template -->
        <?php $conn->close($dbcon); }elseif(isset($_GET['expense_cls'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM expensecls ORDER BY name ASC";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-piggy-bank position-left"></i>EXPENSE CLASSIFICATION</h4></div>
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
                                                <div class="text-semibold">Total Classifications</div>
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
                            <li><i class="icon-book2 position-left"></i> Payment Voucher</li>
                            <li class="maincolor"><i class="icon-book3 position-left"></i> Expense Class</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#expensecls"><i class="icon-add-to-list position-left"></i> Add New Expense Class</a></li>
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
                                                <th>Classification Name</th>
                                                <th>Status</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($conn->sqlnum($selstfrun) != 0){
                                                $count = 0;
                                                while($data = $conn->fetch($selstfrun)){
                                                    $count+=1;
                                                    $bid = $data['id'];
                                                    $status = $data['status'];
                                                    $decor="none";
                                                    $color="#000";
                                                    if($status == "INACTIVE"){
                                                        $decor="line-through";
                                                        $color="#CCC";
                                                    }
                                                    ?>
                                                    <tr style="text-decoration: <?php echo $decor; ?>; color: <?php echo $color; ?>">
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $data['name']; ?></td>
                                                        <td><button class="btn btn-warning" onclick="editClass(<?php echo $bid; ?>)"><span class="icon icon-database-edit2"></span>Edit</button></td>
                                                    </tr>
                                                <?php }}else{ ?>
                                                <tr><td colspan="6">No Records Found</td></tr>
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
            <?php $conn->close($dbcon);}elseif(isset($_GET['positions'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM positions WHERE status='ACTIVE'";
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
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
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
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#staffpost"><i class="icon-add-to-list position-left"></i> Add New Position</a></li>
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
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($conn->sqlnum($selstfrun) != 0){
                                                $count = 0;
                                                while($data = $conn->fetch($selstfrun)){
                                                    $count+=1;
                                                    $cid = $data['id'];
                                                    $status = $data['status'];
                                                    $decor="none";
                                                    $color="#000";
                                                    if($status == "INACTIVE"){
                                                        $decor="line-through";
                                                        $color="#CCC";
                                                    }
                                                    ?>
                                                    <tr style="text-decoration: <?php echo $decor; ?>; color: <?php echo $color; ?>">
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $data['post_name']; ?></td>
                                                        <td><?php echo $data['status']; ?></td>
                                                        <td><button class="btn btn-warning" onclick="editClass(<?php echo $cid; ?>)"><span class="icon icon-database-edit2"></span>Edit</button></td>
                                                    </tr>
                                                <?php }}else{ ?>
                                                <tr><td colspan="3">No Records Found</td></tr>
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
            <?php $conn->close($dbcon);}elseif(isset($_GET['subjects'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM subject ORDER BY sbj ASC";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-address-book position-left"></i>SUBJECTS</h4></div>
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
                                                <th>Subject Name</th>
                                                <th>Status</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($conn->sqlnum($selstfrun) != 0){
                                                $count = 0;
                                                while($data = $conn->fetch($selstfrun)){
                                                    $count+=1;
                                                    $cid = $data['id'];
                                                    $status = $data['status'];
                                                    $decor="none";
                                                    $color="#000";
                                                    if($status == "INACTIVE"){
                                                        $decor="line-through";
                                                        $color="#CCC";
                                                    }
                                                    ?>
                                                    <tr style="text-decoration: <?php echo $decor; ?>; color: <?php echo $color; ?>">
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $data['sbj']; ?></td>
                                                        <td><?php echo $data['status']; ?></td>
                                                        <td><button class="btn btn-warning" onclick="editSubject(<?php echo $cid; ?>)"><span class="icon icon-database-edit2"></span> Edit</button></td>
                                                    </tr>
                                                <?php }}else{ ?>
                                                <tr><td colspan="3">No Records Found</td></tr>
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
            <?php $conn->close($dbcon);}elseif(isset($_GET['discounts'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM discounts ORDER BY disc_name ASC";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-address-book position-left"></i>INVOICE DISCOUNTS</h4></div>
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
                                                <div class="text-semibold">Total Discounts</div>
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
                            <li class="maincolor"><i class="icon-book3 position-left"></i> Invoice Discounts</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#discounts"><i class="icon-add-to-list position-left"></i> Add New Discount</a></li>
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
                                                <th>Discount Name</th>
                                                <th>Percentage (%)</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($conn->sqlnum($selstfrun) != 0){
                                                $count = 0;
                                                while($data = $conn->fetch($selstfrun)){
                                                    $count+=1;
                                                    $cid = $data['id'];
                                                    $status = $data['status'];
                                                    $decor="none";
                                                    $color="#000";
                                                    if($status == "INACTIVE"){
                                                        $decor="line-through";
                                                        $color="#CCC";
                                                    }
                                                    ?>
                                                    <tr style="text-decoration: <?php echo $decor; ?>; color: <?php echo $color; ?>">
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $data['disc_name']; ?></td>
                                                        <td><?php echo $data['percent']; ?></td>
                                                        <td><?php echo $data['status']; ?></td>
                                                        <td><button class="btn btn-warning" onclick="editDiscount(<?php echo $cid; ?>)"><span class="icon icon-database-edit2"></span> Edit</button></td>
                                                    </tr>
                                                <?php }}else{ ?>
                                                <tr><td colspan="3">No Records Found</td></tr>
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
            <?php $conn->close($dbcon);}elseif(isset($_GET['fees_structure'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM fees_struct ORDER BY fee_name ASC";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash4 position-left"></i>FEES STRUCTURE</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-6">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Fees Components</div>
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
                            <li class="maincolor"><i class="icon-cash3 position-left"></i> Fees Structure</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#feesadd"><i class="icon-add-to-list position-left"></i> Add New Fees</a></li>
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
                                                <th>Fee Name</th>
                                                <th>Status</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if($conn->sqlnum($selstfrun) != 0){
                                                $count = 0;
                                                while($data = $conn->fetch($selstfrun)){
                                                    $count+=1;
                                                    $cid = $data['id'];
                                                    $status = $data['status'];
                                                    $decor="none";
                                                    $color="#000";
                                                    if($status == "INACTIVE"){
                                                        $decor="line-through";
                                                        $color="#CCC";
                                                    }
                                                    ?>
                                                    <tr style="text-decoration: <?php echo $decor; ?>; color: <?php echo $color; ?>">
                                                        <td><?php echo $count; ?></td>
                                                        <td><?php echo $data['fee_name']; ?></td>
                                                        <td><?php echo $data['status']; ?></td>
                                                        <td><button class="btn btn-warning" onclick="editFees(<?php echo $cid; ?>)"><span class="icon icon-database-edit2"></span> Edit</button></td>
                                                    </tr>
                                                <?php }}else{ ?>
                                                <tr><td colspan="3">No Records Found</td></tr>
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
            <?php $conn->close($dbcon);}elseif(isset($_GET['items_master'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $sel = "SELECT * FROM products_master ORDER BY pname ASC";
            $selrun = $conn->query($dbcon,$sel);
            $totcount = $conn->sqlnum($selrun);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash4 position-left"></i>Products</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-6">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Products</div>
                                                <div class="text-muted"><?php echo $totcount; ?></div>
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
                            <li><i class="icon-cog52 position-left"></i> Sales Management</li>
                            <li class="maincolor"><i class="icon-cash3 position-left"></i> Products</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#product_create"><i class="icon-add-to-list position-left"></i> Add New Product</a></li>
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
                                        <table class="table table-striped table-bordered table-hover table-checkable table-responsive dataTable media-library">
                                            <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Selling Price</th>
                                                <th>Cost Price</th>
                                                <th>Quantity</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $count = 0;
                                            $totalsprice = 0;
                                            $totalcprice = 0;
                                            while($data = $conn->fetch($selrun)){
                                                $count++;
                                                $status = $data['status'];
                                                $pid = $data['pid'];
                                                $qty = $data['qty'];
                                                $totalsprice+= ($data['sprice'] * $data['qty']);
                                                $totalcprice+= ($data['cprice'] * $data['qty']);
                                                $color = "#000";
                                                if($qty <= 0){
                                                    $color = "#F00";
                                                }

                                                if($status == "INACTIVE"){
                                                    $color = "#99B3AE";
                                                }
                                                ?>
                                                <tr style="color: <?php echo $color; ?>">
                                                    <td><?php echo $data['pid']; ?></td>
                                                    <td><?php echo $data['pname']; ?></td>
                                                    <td><?php echo $data['sprice']; ?></td>
                                                    <td><?php echo $data['cprice']; ?></td>
                                                    <td><?php echo $qty; ?></td>
                                                    <td><?php echo $data['status']; ?></td>
                                                    <td><a onclick="updateprod('<?php echo $pid; ?>')" class="btn btn-lg btn-primary icon icon-upload-alt">&nbsp;Update</a></td>
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
                <div class="modal fade" id="product_edit">
                    <div class="modal-dialog">
                        <form method="post">
                            <input type="hidden" id="updpid" name="updpid" />
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">UPDATE PRODUCT DETAILS</h4>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-striped">
                                        <tr>
                                            <td align="right"><p style="font-weight: bold;">Product Name</p></td>
                                            <td><input type="text" class="form-control" id="pname" name="pdname" required/></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><p style="font-weight: bold;">Selling Price</p></td>
                                            <td><input type="number" class="form-control" id="sprice" name="sprice" required step="any" min="0.00" placeholder="0.00"/></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><p style="font-weight: bold;">Cost Price</p></td>
                                            <td><input type="number" class="form-control" id="cprice" name="cprice" required step="any" min="0.00" placeholder="0.00"/></td>
                                        </tr>
                                        <tr>
                                            <td align="right"><p style="font-weight: bold;">Status</p></td>
                                            <td>
                                                <select id="prodstat" class="form-control select" name="prodstat">
                                                    <option value="ACTIVE">ACTIVE</option>
                                                    <option value="INACTIVE">INACTIVE</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </div>
                            </div>
                        </form><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>

            </div>
            <?php $conn->close($dbcon);}elseif (isset($_GET['students_arrears'])) {

            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $qry = "SELECT stdid, totalamount, invoiceid, paid, classid, term, yr, discount FROM student_invoices WHERE (totalamount - (paid + discount)) > 0";
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
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 90px;">
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
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Class</th>
                                        <th>Year</th>
                                        <th>Term</th>
                                        <th>Invoice ID</th>
                                        <th>Total Amount</th>
                                        <th>Discount Amount</th>
                                        <th>Fees Payable</th>
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
                                    $totdisc = 0;
                                    while ($items = $conn->fetch($qryRun)) {
                                        $amount = $items['totalamount'];
                                        $discount = $items['discount'];
                                        $paid = $items['paid'];

                                        $bal = $amount - ($paid + $discount);

                                        $totamount+= $amount;
                                        $totdisc+= $discount;
                                        $totbal+= $bal;
                                        $totpaid+= $paid;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $cont; ?>
                                            </td>
                                            <td>
                                                <?php echo $items['stdid']; ?>
                                            </td>
                                            <td>
                                                <?php echo getStudent($items['stdid']); ?>
                                            </td>
                                            <td><?php echo getClass($items['classid']); ?></td>
                                            <td><?php echo $items['yr']; ?></td>
                                            <td><?php echo $items['term']; ?></td>
                                            <td><?php echo $items['invoiceid']; ?></td>
                                            <td>
                                                <?php echo number_format($amount, 2); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($discount, 2); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($amount - $discount, 2); ?>
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
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>TOTAL</td>
                                        <td><?php echo number_format($totamount, 2); ?></td>
                                        <td><?php echo number_format($totdisc, 2); ?></td>
                                        <td><?php echo number_format($totamount - $totdisc, 2); ?></td>
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
        <?php $conn->close($dbcon);}elseif (isset($_GET['salesreport'])) {

            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $user = $_GET['salesofficer'];
            $sdate = $_GET['sdate'];
            $startdate = $sdate." 00:00:00";
            $edate = $_GET['edate'];
            $enddate = $edate." 23:59:59";
            $sel = "";
            if($user == "All"){
                $sel = "SELECT s.customer, s.tot_tax, s.sid, s.tot_sales, s.tot_cost, s.profit, s.transdate, u.fname, u.lname FROM sales_summary s INNER JOIN staff u ON s.userid = u.stfid WHERE transdate BETWEEN '$startdate' AND '$enddate' ORDER BY transdate DESC";
            }elseif($user != "All"){
                $sel = "SELECT s.customer, s.tot_tax, s.sid, s.tot_sales, s.tot_cost, s.profit, s.transdate, u.fname, u.lname FROM sales_summary s INNER JOIN staff u ON s.userid = u.stfid WHERE s.userid ='$user' AND transdate BETWEEN '$startdate' AND '$enddate' ORDER BY transdate DESC";
            }
            $selrun = $conn->query($dbcon,$sel);
            $totcount = $conn->sqlnum($selrun);
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
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 90px;">
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
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold">SALES REPORT</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered table-hover table-checkable table-responsive">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th data-class="expand">Session ID</th>
                                        <th>Sales Officer</th>
                                        <th data-hide="phone">Total Sales <b>(S)</b></th>
                                        <th data-hide="phone">Total Tax<b>(T)</b></th>
                                        <th data-hide="phone">Total Cost Price<b>(C)</b></th>
                                        <th data-hide="phone">Total Profit<b>(P = [ S-C-T ])</b></th>
                                        <th data-hide="phone">Transaction Date</th>
                                        <th data-hide="phone">Customer</th>
                                        <th data-hide="phone">View Slip</th>
                                        <!--<th data-hide="phone,tablet">Action</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $count = 0;
                                    $overallsprice = 0;
                                    $overallcprice = 0;
                                    $overallprofit = 0;
                                    $overalltax = 0;
                                    if($totcount == 0){
                                        ?>
                                        <tr>
                                            <td colspan="7">NO RECORDS FOUND</td>
                                        </tr>
                                    <?php }else{
                                        while($data = $conn->fetch($selrun)){
                                            $count++;
                                            $overallsprice = $overallsprice + $data['tot_sales'];
                                            $overallcprice = $overallcprice + $data['tot_cost'];
                                            $overallprofit = $overallprofit + $data['profit'];
                                            $overalltax = $overalltax + $data['tot_tax'];
                                            $sid = $data['sid'];
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><a onclick="getsalesdetails('<?php echo $sid; ?>')"><?php echo $sid; ?></a></td>
                                                <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                                <td><?php echo $data['tot_sales']; ?></td>
                                                <td><?php echo $data['tot_tax']; ?></td>
                                                <td><?php echo $data['tot_cost']; ?></td>
                                                <td><?php echo $data['profit']; ?></td>
                                                <td><?php echo date("d M, Y H:i:s", strtotime(date($data['transdate']))); ?></td>
                                                <td><?php echo $data['customer']; ?></td>
                                                <td><a href="dashboard.php?viewslip=<?php echo $sid; ?>">View Slip</a></td>
                                            </tr>
                                        <?php }} ?>
                                    <tr style="color: #ff630d; font-weight: bold; font-size: medium">
                                        <td>&nbsp;</td><td>&nbsp;</td><td>TOTAL (GHS)</td><td><?php echo number_format($overallsprice, 2, '.', ','); ?></td><td><?php echo number_format($overalltax, 2, '.', ','); ?></td><td><?php echo number_format($overallcprice, 2, '.', ','); ?></td><td><?php echo number_format($overallprofit, 2, '.', ','); ?></td>
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
            <?php $conn->close($dbcon);}elseif(isset($_GET['viewslip'])){
            $conn=new Db_connect;
            $dbconnection=$conn->conn();
            $sid = $_GET['viewslip'];
            $sel = "SELECT userid, customer FROM sales_summary WHERE sid = '$sid'";
            $selrun = $conn->query($dbconnection,$sel);

            ?>
            <div id="content">
                <?php if($conn->sqlnum($selrun) != 0){
                    $seldata = $conn->fetch($selrun);
                    ?>
                    <div class="container" style="margin: 20px;">
                        <div class="row" style="font-family: monospace, serif" id="ptable">
                            <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <address>
                                            <strong><?php echo $cname; ?></strong>
                                            <br>
                                            <?php echo $caddr; ?>
                                            <br>
                                            <?php echo $cloc; ?>
                                            <br>
                                            <abbr title="Phone">P:</abbr> <?php echo $ccont; ?>
                                        </address>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                                        <p>
                                            <em>Date: <?php echo date("d M, Y"); ?></em>
                                        </p>
                                        <p>
                                            <em>#:<?php echo strtoupper($sid); ?></em>
                                        </p>
                                        <p>
                                            <em>Officer:<?php echo getstaff($seldata['userid']); ?></em>
                                        </p>
                                        <p>
                                            <em>Customer:<?php echo $seldata['customer']; ?></em>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="text-center">
                                        <h1>Receipt</h1>
                                    </div>
                                    </span>
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sel = "SELECT pid, qty, sprice FROM pos_sales WHERE sid = '$sid'";
                                        $selrun = $conn->query($dbconnection,$sel);
                                        $overalltotal = 0;
                                        while($saledata = $conn->fetch($selrun)){
                                            $overalltotal+=($saledata['qty'] * $saledata['sprice']);
                                            ?>
                                            <tr>
                                                <td class="col-md-9"><em><?php echo getproduct($saledata['pid']); ?></em></h4></td>
                                                <td class="col-md-1" style="text-align: center"> <?php echo $saledata['qty'] ?> </td>
                                                <td class="col-md-1 text-center"><?php echo $saledata['sprice'] ?></td>
                                                <td class="col-md-1 text-center"><?php echo ($saledata['qty'] * $saledata['sprice']) ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr style="font-weight: bold;">
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>TOTAL</td>
                                            <td class="col-md-1 text-center"><?php echo number_format($overalltotal,2); ?></td>
                                        </tr>

                                        <!--TAX COMPONENT -->
                                        <?php
                                        $seltax = "SELECT taxid, dval FROM pos_tax WHERE sid = '$sid'";
                                        $seltaxrun = $conn->query($dbconnection,$seltax);
                                        $overalltax = 0;
                                        while($saletaxdata = $conn->fetch($seltaxrun)){
                                            $dtax=($overalltotal * $saletaxdata['dval']) / 100;
                                            $overalltax+=$dtax;
                                            ?>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td colspan="2"><?php echo gettax($saletaxdata['taxid'])." [".$saletaxdata['dval']."%]"; ?></td>
                                                <td><?php echo number_format($dtax,2) ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td>   </td>
                                            <td>   </td>
                                            <td class="text-right">
                                                <p>
                                                    <strong>Subtotal: </strong>
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <p>
                                                    <strong><?php echo number_format($overalltotal + $overalltax,2); ?></strong>
                                                </p>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="font-style: italic; font-size: small; text-align: center"><?php echo $ctag; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" align="center">
                                <button type="button" class="btn btn-default btn-lg heading-btn" href="javascript:void(0);" onclick="javascript:window.print();"><i class="icon-print position-left"></i> Print</button>
                            </div>
                        </div>
                        <!-- /.container -->
                    </div>
                <?php }else{ ?>
                    <div class="container" style="margin: 20px;">
                        No Records Found For Receipt Number, <?php echo $sid; ?>.
                    </div>
                <?php } ?>
            </div>

            <?php $conn->close($dbconnection); }elseif (isset($_GET['class_invoice_view'])) {
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $class = $_GET['class'];
            $term = $_GET['term'];
            $year = $_GET['year'];
            $qry = "";
            $desc="";
            if($class == "ALL"){
                $qry = "SELECT i.stdid, i.totalamount, i.invoiceid, i.paid,i.discount, s.fname, s.lname, i.classid FROM student_invoices i INNER JOIN students s ON i.stdid = s.stdid WHERE i.term = '$term' AND i.yr = '$year' ORDER BY s.fname ASC";
                $desc = "Invoice Report Of All Students For The Year $year And Term $term";
            }else{
                $qry = "SELECT i.stdid, i.totalamount, i.invoiceid, i.paid,i.discount, s.fname, s.lname, i.classid FROM student_invoices i INNER JOIN students s ON i.stdid = s.stdid WHERE i.term = '$term' AND i.yr = '$year' AND i.classid = '$class' ORDER BY s.fname ASC";
                $desc = "Invoice Report Of Students In ".getClass($class)." For The Year $year And Term $term";
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
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 90px;">
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
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold"><?php echo $desc; ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Class</th>
                                        <th>Invoice ID</th>
                                        <th>Total Amount</th>
                                        <th>Discount Amount</th>
                                        <th>Fees Payable</th>
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
                                    $totdisc = 0;
                                    while ($items = $conn->fetch($qryRun)) {
                                        $amount = $items['totalamount'];
                                        $discount = $items['discount'];
                                        $paid = $items['paid'];

                                        $bal = $amount - ($paid + $discount);

                                        $totamount+= $amount;
                                        $totdisc+= $discount;
                                        $totbal+= $bal;
                                        $totpaid+= $paid;
                                        $cont++;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $cont; ?>
                                            </td>
                                            <td>
                                                <?php echo $items['stdid']; ?>
                                            </td>
                                            <td>
                                                <?php echo $items['fname']." ".$items['lname']; ?>
                                            </td>
                                            <td><?php echo getClass($items['classid']); ?></td>
                                            <td><?php echo $items['invoiceid']; ?></td>
                                            <td>
                                                <?php echo number_format($amount, 2); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($discount, 2); ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($amount - $discount, 2); ?>
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
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>TOTAL</td>
                                        <td><?php echo number_format($totamount, 2); ?></td>
                                        <td><?php echo number_format($totdisc, 2); ?></td>
                                        <td><?php echo number_format($totamount - $totdisc, 2); ?></td>
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
            <?php $conn->close($dbcon);}elseif(isset($_GET['students_data'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $class=$_GET['students_data'];
            $status=$_GET['status'];
            $description="LIST OF ALL $status STUDENTS";
            if($class == "All"){
                $selstf = "SELECT * FROM students WHERE status = '$status' ORDER BY fname ASC";
            }else{
                $description = "LIST OF $status STUDENTS IN ".getClass($class);
                $selstf = "SELECT * FROM students WHERE status = '$status' AND class='$class' ORDER BY fname ASC";
            }

            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users4 position-left"></i>STUDENTS RECORDS</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-6">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
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
                            <li><i class="icon-cog52 position-left"></i> Students Management</li>
                            <li class="maincolor"><a data-toggle="modal" data-target="#viewstudents"><i class="icon-user-tie position-left"></i> Students Records</a></li>
                        </ul>
                        <?php if($student == "ADMINISTRATOR"){ ?>
                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#studentreg"><i class="icon-add-to-list position-left"></i> Admit New Student</a></li>
                        </ul>
                        <?php } ?>
                    </div>
                    <div class="row"><div class="col-md-12"><h4 style="text-align: center;"><?php echo $description; ?></h4></div></div>
                    <!-- /header content -->


                    <!-- Toolbar -->
                    <div class="navbar navbar-default navbar-xs">
                        <ul class="nav navbar-nav visible-xs-block">
                            <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
                        </ul>

                        <div class="navbar-collapse collapse" id="navbar-filter">
                            <ul class="nav navbar-nav element-active-slate-400">
                                <li class="active"><a href="#gridView" data-toggle="tab"><i class="icon-grid52 position-left"></i> GRID  <span class="badge badge-success badge-inline position-right"><?php echo $conn->sqlnum($selstfrun); ?></span></a></li>
                                <li><a href="#listView" data-toggle="tab"><i class="icon-list position-left"></i> LIST VIEW <span class="badge badge-info badge-inline position-right"><?php echo $conn->sqlnum($selstfrun); ?></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /toolbar -->

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- User profile -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabbable">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="gridView">
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                            </div>

                                            <div class="panel-body">

                                                <!-- Main charts -->
                                                <div class="row">
                                                    <div class="col-lg-12">

                                                        <!-- Traffic sources -->
                                                        <div class="panel panel-flat">
                                                            <div class="container-fluid">
                                                                <div class="row" style="margin-top: 2%">
                                                                    <?php
                                                                    if($conn->sqlnum($selstfrun) !=0){
                                                                        while($data=$conn->fetch($selstfrun)){
                                                                            ?>
                                                                            <div class="col-lg-4 col-md-4">
                                                                                <div class="panel panel-body">
                                                                                    <div class="media">
                                                                                        <div class="media-left">
                                                                                            <a href="<?php echo $data['img']; ?>" data-popup="lightbox">
                                                                                                <img src="<?php echo $data['img']; ?>" style="width: 70px; height: 70px;" class="img-circle" alt="">
                                                                                            </a>
                                                                                        </div>

                                                                                        <div class="media-body">
                                                                                            <h6 class="media-heading"><a href="dashboard.php?student_details=<?php echo $data['stdid']; ?>"><?php echo $data['fname']." ".$data['lname']; ?></a></h6>
                                                                                            <p class="text-muted"><?php echo $data['stdid']; ?></p>
                                                                                            <div><p style="color: #FF0000; font-weight: bold;"><?php echo getClass($data['class']); ?></p></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php }}else{ ?>
                                                                        <div class="col-md-12">
                                                                            <h3>No Student Records Found</h3>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /traffic sources -->

                                                    </div>
                                                </div>
                                                <!-- /main charts -->
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="listView">

                                        <!-- Profile info -->
                                        <div class="panel panel-flat">

                                            <div class="panel-body">
                                                <table class="table table-responsive table-bordered media-library">
                                                    <thead>
                                                    <tr>
                                                        <th>Student ID</th>
                                                        <th>Name</th>
                                                        <th>Gender</th>
                                                        <th>Class</th>
                                                        <th>Contact</th>
                                                        <th>Date Of Birth</th>
                                                        <th>Admission Date</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    if($class == "All"){
                                                        $selstf2 = "SELECT * FROM students WHERE status = '$status' ORDER BY fname ASC";
                                                    }else{
                                                        $selstf2 = "SELECT * FROM students WHERE class='$class' AND status = '$status' ORDER BY fname ASC";
                                                    }
                                                    $selstfrun2 = $conn->query($dbcon,$selstf2);
                                                    if($conn->sqlnum($selstfrun2) != 0){
                                                        while($data = $conn->fetch($selstfrun2)){
                                                            ?>
                                                            <tr>
                                                                <td><a href="dashboard.php?student_details=<?php echo $data['stdid']; ?>"><?php echo $data['stdid']; ?></a></td>
                                                                <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                                                <td><?php echo $data['sex']; ?></td>
                                                                <td><?php echo getClass($data['class']); ?></td>
                                                                <td><?php echo $data['contact']; ?></td>
                                                                <td><?php echo $data['dob']; ?></td>
                                                                <td><?php echo $data['admitdate']; ?></td>

                                                            </tr>
                                                        <?php }}else{ ?>
                                                        <tr><td colspan="3">No Records Found</td></tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /profile info -->

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /user profile -->

                </div>
                <!-- /content area -->

            </div>
            <?php $conn->close($dbcon);}elseif(isset($_GET['staff_data'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM staff WHERE status = 'ACTIVE' ORDER BY fname ASC";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users4 position-left"></i>STAFF RECORDS</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-6">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
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
                            <li><i class="icon-cog52 position-left"></i> Staff Management</li>
                            <li class="maincolor"><i class="icon-user-tie position-left"></i> Staff Records</li>
                        </ul>

                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#staffreg"><i class="icon-add-to-list position-left"></i> Add New Staff</a></li>
                        </ul>
                    </div>
                    <!-- /header content -->


                    <!-- Toolbar -->
                    <div class="navbar navbar-default navbar-xs">
                        <ul class="nav navbar-nav visible-xs-block">
                            <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
                        </ul>

                        <div class="navbar-collapse collapse" id="navbar-filter">
                            <ul class="nav navbar-nav element-active-slate-400">
                                <li class="active"><a href="#gridView" data-toggle="tab"><i class="icon-grid52 position-left"></i> GRID  <span class="badge badge-success badge-inline position-right"><?php echo $conn->sqlnum($selstfrun); ?></span></a></li>
                                <li><a href="#listView" data-toggle="tab"><i class="icon-list position-left"></i> LIST VIEW <span class="badge badge-info badge-inline position-right"><?php echo $conn->sqlnum($selstfrun); ?></span></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /toolbar -->

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- User profile -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabbable">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="gridView">
                                        <!-- Main charts -->
                                        <div class="row">
                                            <div class="col-lg-12">

                                                <!-- Traffic sources -->
                                                <div class="panel panel-flat">
                                                    <div class="container-fluid">
                                                        <div class="row" style="margin-top: 2%">
                                                            <?php
                                                            if($conn->sqlnum($selstfrun) !=0){
                                                                while($data=$conn->fetch($selstfrun)){
                                                                    ?>
                                                                    <div class="col-lg-4 col-md-6">
                                                                        <div class="panel panel-body">
                                                                            <div class="media">
                                                                                <div class="media-left">
                                                                                    <a href="<?php echo $data['img']; ?>" data-popup="lightbox">
                                                                                        <img src="<?php echo $data['img']; ?>" style="width: 70px; height: 70px;" class="img-circle" alt="">
                                                                                    </a>
                                                                                </div>

                                                                                <div class="media-body">
                                                                                    <h6 class="media-heading"><a href="dashboard.php?staff_details=<?php echo $data['stfid']; ?>"><?php echo $data['sttitle']." ".$data['fname']." ".$data['lname']; ?></a></h6>
                                                                                    <p class="text-muted"><?php echo $data['stfid']; ?></p>
                                                                                    <div><p style="color: #FF0000; font-weight: bold;"><?php echo getPosition($data['post']); ?></p></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php }} ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /traffic sources -->

                                            </div>
                                        </div>
                                        <!-- /main charts -->

                                    </div>

                                    <div class="tab-pane fade" id="listView">

                                        <!-- Profile info -->
                                        <div class="panel panel-flat">

                                            <div class="panel-body">
                                                <table class="table table-responsive table-bordered media-library">
                                                    <thead>
                                                    <tr>
                                                        <th>Staff ID</th>
                                                        <th>Name</th>
                                                        <th>Gender</th>
                                                        <th>Position</th>
                                                        <th>Contact</th>
                                                        <th>Date Of Birth</th>
                                                        <th>Employment Date</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $selstf2 = "SELECT * FROM staff WHERE status = 'ACTIVE' ORDER BY fname ASC";
                                                    $selstfrun2 = $conn->query($dbcon,$selstf2);
                                                    if($conn->sqlnum($selstfrun2) != 0){
                                                        while($data = $conn->fetch($selstfrun2)){
                                                            ?>
                                                            <tr>
                                                                <td><a href="dashboard.php?staff_details=<?php echo $data['stfid']; ?>"><?php echo $data['stfid']; ?></a></td>
                                                                <td><?php echo $data['sttitle']." ".$data['fname']." ".$data['lname']; ?></td>
                                                                <td><?php echo $data['sex']; ?></td>
                                                                <td><?php echo getPosition($data['post']); ?></td>
                                                                <td><?php echo $data['contact']; ?></td>
                                                                <td><?php echo $data['dob']; ?></td>
                                                                <td><?php echo $data['admitdate']; ?></td>

                                                            </tr>
                                                        <?php }}else{ ?>
                                                        <tr><td colspan="3">No Records Found</td></tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /profile info -->

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /user profile -->

                </div>
                <!-- /content area -->

            </div>
            <?php $conn->close($dbcon);}elseif(isset($_GET['students_invoices'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM student_invoices WHERE status !='REJECTED'";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash3 position-left"></i>STUDENT INVOICES</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-6">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Invoices</div>
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
                            <li><i class="icon-cog52 position-left"></i> Fees Management</li>
                            <li class="maincolor"><i class="icon-user-tie position-left"></i> Invoices</li>
                        </ul>
                    </div>
                    <!-- /header content -->

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- User profile -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered media-library">
                                <thead>
                                <tr>
                                    <th>Invoice ID</th>
                                    <th>Student Name</th>
                                    <th>Invoice Date</th>
                                    <th>Total Amount</th>
                                    <th>Discount</th>
                                    <th>Fee Payable</th>
                                    <th>Amount Paid</th>
                                    <th>Balance</th>
                                    <th>Class</th>
                                    <th>Term</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($conn->sqlnum($selstfrun) != 0){
                                    $count=0;
                                    $totalamount=0;
                                    $totalpaid=0;
                                    while($data = $conn->fetch($selstfrun)){
                                        $count++;
                                        $totalamount+=$data['totalamount'];
                                        $totalpaid+=$data['paid'];
                                        $invid=$data['invoiceid'];
                                        $cid=$data['classid'];
                                        ?>
                                        <tr>
                                            <td><a href="dashboard.php?invoice_details=<?php echo $invid; ?>"><?php echo $data['invoiceid']; ?></a></td>
                                            <td><?php echo getStudent($data['stdid']); ?></td>
                                            <td><?php echo $data['invdate']; ?></td>
                                            <td><?php echo number_format($data['totalamount'],2); ?></td>
                                            <td><?php echo number_format($data['discount'],2); ?></td>
                                            <td><?php echo number_format($data['totalamount'] - $data['discount'],2); ?></td>
                                            <td><?php echo number_format($data['paid'],2); ?></td>
                                            <td><?php echo number_format($data['totalamount'] - ($data['paid'] + $data['discount']),2); ?></td>
                                            <td><?php echo getClass($data['classid']); ?></td>
                                            <td><?php echo $data['term']; ?></td>
                                            <td><?php echo $data['yr']; ?></td>
                                            <td><?php echo $data['status']; ?></td>
                                            <?php if($data['paid'] == 0){ ?><td><a class="btn btn-danger" onclick="recallInvoice('<?php echo $invid; ?>','<?php echo $cid; ?>','mainlist')"><span class="icon icon-trash"></span></a></td><?php }else{?>
                                            <td>kikiki</td><?php } ?>

                                        </tr>
                                    <?php }?>
                                    <!--<tr style="font-weight: bold; color: #FF0000;">
                                        <td colspan="4" align="right">Total</td>
                                        <td><?php echo number_format($totalamount,2); ?></td>
                                        <td><?php echo number_format($totalpaid,2); ?></td>
                                        <td><?php echo number_format($totalamount - $totalpaid,2); ?></td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>-->
                                <?php }else{ ?>
                                    <tr><td colspan="10">No Records Found</td></tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-4" align="right">
                            <p style="font-weight: bold; font-size: large; color: #0D47A1">Total Amount: &cent; <?php echo number_format($totalamount,2); ?></p>
                        </div>
                        <div class="col-md-4" align="right">
                            <p style="font-weight: bold; font-size: large; color: #0D47A1">Total Paid: &cent; <?php echo number_format($totalpaid,2); ?></p>
                        </div>
                        <div class="col-md-4" align="right">
                            <p style="font-weight: bold; font-size: large; color: #0D47A1">Total Arrears: &cent; <?php echo number_format($totalamount - $totalpaid,2); ?></p>
                        </div>

                    </div>
                    <!-- /user profile -->

                </div>
                <!-- /content area -->

            </div>
            <?php $conn->close($dbcon);}elseif(isset($_GET['memos'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM memo_log";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash3 position-left"></i>STAFF MEMOS</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-6">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Memos</div>
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
                            <li><i class="icon-cog52 position-left"></i> Notifications</li>
                            <li class="maincolor"><i class="icon-user-tie position-left"></i> Memos</li>
                        </ul>
                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#announcer"><i class="icon-bubble-notification position-left"></i> Send Memo</a></li>
                        </ul>
                    </div>
                    <!-- /header content -->

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- User profile -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sender</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Timestamp</th>
                                    <th>Recipient</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($conn->sqlnum($selstfrun) != 0){
                                    $count=0;
                                    while($data = $conn->fetch($selstfrun)){
                                        $count++;
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo getStaff($data['usr']); ?></td>
                                            <td><?php echo $data['title']; ?></td>
                                            <td><?php echo $data['msg']; ?></td>
                                            <td><?php echo $data['tstamp']; ?></td>
                                            <td><?php echo $data['recipient']; ?></td>

                                        </tr>
                                    <?php }}else{ ?>
                                    <tr><td colspan="10">No Records Found</td></tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <!-- /user profile -->

                </div>
                <!-- /content area -->

            </div>
            <?php $conn->close($dbcon);}elseif(isset($_GET['bulksms'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $selstf = "SELECT * FROM sms_log";
            $selstfrun = $conn->query($dbcon,$selstf);

            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-cash3 position-left"></i>BULK SMS</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-6">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total SMS Sent</div>
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
                            <li><i class="icon-cog52 position-left"></i> Notifications</li>
                            <li class="maincolor"><i class="icon-user-tie position-left"></i> Bulk SMS</li>
                        </ul>
                        <ul class="breadcrumb-elements">
                            <li style="margin: 2.0px"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#smsnotify"><i class="icon-bubble-notification position-left"></i> Send SMS</a></li>
                        </ul>
                    </div>
                    <!-- /header content -->

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- User profile -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sender</th>
                                    <th>Title</th>
                                    <th>Message</th>
                                    <th>Timestamp</th>
                                    <th>Total Recipient</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($conn->sqlnum($selstfrun) != 0){
                                    $count=0;
                                    while($data = $conn->fetch($selstfrun)){
                                        $count++;
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo getStaff($data['stfid']); ?></td>
                                            <td><?php echo $data['msg']; ?></td>
                                            <td><?php echo $data['tstamp']; ?></td>
                                            <td><?php echo $data['recipient']; ?></td>

                                        </tr>
                                    <?php }}else{ ?>
                                    <tr><td colspan="10">No Records Found</td></tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <!-- /user profile -->

                </div>
                <!-- /content area -->

            </div>
            <?php $conn->close($dbcon);}elseif(isset($_GET['pending_exams'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $class=$_GET['class'];
            $year=$_GET['year'];
            $term=$_GET['term'];
            $selstf = "SELECT * FROM exams_records WHERE class='$class' AND dyear='$year' AND term='$term' AND status='CONFIRMED'";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-book3 position-left"></i><?php echo getClass($class); ?> Examination Records For <?php echo $year; ?>, Term <?php echo $term; ?></h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-6">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Records</div>
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
                            <li><i class="icon-cog52 position-left"></i> Examination Management</li>
                            <li class="maincolor"><i class="icon-user-tie position-left"></i> Class Exams Records</li>
                        </ul>
                    </div>
                    <!-- /header content -->

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- User profile -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h6 style="text-align: center;">PENDING EXAMINATION RECORDS</h6>
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Examination ID</th>
                                    <th>Student Name</th>
                                    <th>Year</th>
                                    <th>Class</th>
                                    <th>Term</th>
                                    <th>Date Created</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($conn->sqlnum($selstfrun) != 0){
                                    $count=0;
                                    while($data = $conn->fetch($selstfrun)){
                                        $count++;
                                        $cid=$data['class'];
                                        $examid=$data['examid'];
                                        $status=$data['status'];
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><a href="dashboard.php?generated_exams=<?php echo $examid; ?>&status=pending"><?php echo $data['examid']; ?></a></td>
                                            <td><?php echo getStudent($data['stdid']); ?></td>
                                            <td><?php echo $data['dyear']; ?></td>
                                            <td><?php echo getClass($data['class']); ?></td>
                                            <td><?php echo $data['term']; ?></td>
                                            <td><?php echo $data['datecreated']; ?></td>
                                            <td><?php echo $data['status']; ?></td>
                                        </tr>
                                    <?php }?>
                                <?php }else{ ?>
                                    <tr><td colspan="10">No Records Found</td></tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /user profile -->

                </div>
                <!-- /content area -->

            </div>
            <?php $conn->close($dbcon);}elseif(isset($_GET['student_exams_records'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $class=$_GET['class'];
            $year=$_GET['year'];
            $term=$_GET['term'];
            $selstf = "SELECT * FROM exams_records WHERE class='$class' AND dyear='$year' AND term='$term' AND status='APPROVED'";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-book3 position-left"></i><?php echo getClass($class); ?> Examination Records For <?php echo $year; ?>, Term <?php echo $term; ?></h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-6">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
                                            </li>
                                            <li class="text-center">
                                                <div class="text-semibold">Total Records</div>
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
                            <li><i class="icon-cog52 position-left"></i> Examination Management</li>
                            <li class="maincolor"><i class="icon-user-tie position-left"></i> Class Exams Records</li>
                        </ul>
                    </div>
                    <!-- /header content -->

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- User profile -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Examination ID</th>
                                    <th>Student Name</th>
                                    <th>Year</th>
                                    <th>Class</th>
                                    <th>Term</th>
                                    <th>Date Created</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if($conn->sqlnum($selstfrun) != 0){
                                    $count=0;
                                    while($data = $conn->fetch($selstfrun)){
                                        $count++;
                                        $cid=$data['class'];
                                        $examid=$data['examid'];
                                        $status=$data['status'];
                                        ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><a href="dashboard.php?student_exams_details=<?php echo $examid; ?>"><?php echo $data['examid']; ?></a></td>
                                            <td><?php echo getStudent($data['stdid']); ?></td>
                                            <td><?php echo $data['dyear']; ?></td>
                                            <td><?php echo getClass($data['class']); ?></td>
                                            <td><?php echo $data['term']; ?></td>
                                            <td><?php echo $data['datecreated']; ?></td>
                                            <td><?php echo $data['status']; ?></td>
                                        </tr>
                                    <?php }?>
                                <?php }else{ ?>
                                    <tr><td colspan="10">No Records Found</td></tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /user profile -->

                </div>
                <!-- /content area -->

            </div>
            <?php $conn->close($dbcon);}elseif(isset($_GET['invoice_generator'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $class=$_GET['class'];
            $term=$_GET['term'];
            $selstf = "SELECT * FROM students WHERE class = '$class'";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users4 position-left"></i><?php echo getClass($class); ?>  Invoice Generator</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-6">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
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
                            <li><i class="icon-cog52 position-left"></i> Fees Management</li>
                            <li class="maincolor"><a data-toggle="modal" data-target="#invoicegen"><i class="icon-user-tie position-left"></i> Invoice Generator</a></li>
                        </ul>
                    </div>
                    <!-- /header content -->

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- User profile -->
                    <div class="row">
                        <div class="col-lg-4">
                                        <!-- Available hours -->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title">FEES STRUCTURE</h6>
                                </div>

                                <div class="panel-body">
                                    <table class="table table-responsive table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Fee</th>
                                            <th>Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        //GET THE INTERNSHIP DETAILS OF THE STUDENT
                                        $int = "SELECT c.amount, f.fee_name FROM fees_struct f INNER JOIN fees_class c ON f.id = c.feeid WHERE c.cid = '$class' ORDER BY f.fee_name ASC";
                                        $intrun = $conn->query($dbcon,$int);
                                        if($conn->sqlnum($intrun) != 0){
                                            $count=0;
                                            $totalamount=0;
                                            while($data = $conn->fetch($intrun)){
                                                $count++;
                                                $totalamount+=$data['amount'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $data['fee_name']; ?></td>
                                                    <td><?php echo number_format($data['amount'],2); ?></td>
                                                </tr>
                                            <?php }?>
                                            <tr style="font-weight: bold; color: #FF0000;">
                                                <td colspan="2">Total</td>
                                                <td><?php echo number_format($totalamount,2); ?></td>
                                            </tr>
                                        <?php }else{ ?>
                                            <tr><td colspan="3">No Records Found</td></tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <form method="get">
                            <input type="hidden" name="class" value="<?php echo $class; ?>" />
                            <input type="hidden" name="term" value="<?php echo $term; ?>" />
                            <div class="col-lg-8">
                            <!-- Available hours -->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title">STUDENTS LIST</h6>
                                </div>

                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-5" align="right" style="border-right: #2b2bac solid thin">
                                            <h2><?php echo getClass($class); ?></h2>
                                        </div>
                                        <div class="col-md-5" align="left">
                                            <h2>TERM <?php echo $term; ?></h2>
                                        </div>
                                        <div class="col-md-2" align="left">
                                            <button class="btn btn-success" name="createinvoices">Generate Invoice</button>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-hover table-checkable table-responsive">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th><input type="checkbox" name="select-all" id="select-all" /> Select All </th>
                                            <!--<th>Image</th>-->
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Gender</th>
                                            <th>Date Of Birth</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $sel="SELECT stdid, fname, lname, dob, sex FROM students WHERE class='$class'";
                                        $selrun=$conn->query($dbcon,$sel);
                                        $count = 0;
                                        if($conn->sqlnum($selrun) != 0){
                                        while($data = $conn->fetch($selrun)){
                                            $count++;
                                            $sid=$data['stdid'];
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><input type="checkbox" name="check_list[]" value="<?php echo $sid; ?>" id="<?php echo $count; ?>"/>&nbsp;&nbsp;<label for="<?php echo $count; ?>"><?php echo $sid; ?></label></td>
                                                <td><?php echo $data['fname']; ?></td>
                                                <td><?php echo $data['lname']; ?></td>
                                                <td><?php echo $data['sex']; ?></td>
                                                <td><?php echo $data['dob']; ?></td>
                                            </tr>
                                        <?php }}else{ ?>
                                            <tr><td colspan="6">No Records Found</td></tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <!-- /user profile -->

                </div>
                <!-- /content area -->

            </div>
            <?php $conn->close($dbcon);}elseif(isset($_GET['students_transfer'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $class=$_GET['students_transfer'];
            $selstf = "SELECT * FROM students WHERE class = '$class'";
            $selstfrun = $conn->query($dbcon,$selstf);
            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-users4 position-left"></i><?php echo getClass($class); ?>  Students Transfer</h4></div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-3">&nbsp;</div>

                                    <div class="col-lg-6">
                                        <ul class="list-inline text-center">
                                            <li>
                                                <a href="#" class="btn border-indigo-400 text-indigo-400 btn-flat btn-rounded btn-icon btn-xs valign-text-bottom"><i class="icon-book2"></i></a>
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
                            <li><i class="icon-cog52 position-left"></i> Students Management</li>
                            <li class="maincolor"><a data-toggle="modal" data-target="#transferstudents"><i class="icon-user-tie position-left"></i> Students Transfer</a></li>
                        </ul>
                    </div>
                    <!-- /header content -->

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- User profile -->
                    <div class="row">
                            <input type="hidden" id="classtransfer" value="<?php echo $class; ?>" />
                            <div class="col-lg-12">
                                <!-- Available hours -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">STUDENTS LIST</h6>
                                    </div>

                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-6" align="left">
                                                <h2><?php echo getClass($class); ?></h2>
                                            </div>
                                            <div class="col-md-2" align="right">
                                                <button class="btn btn-success" onclick="studentsTransfer('<?php echo $class; ?>')">Transfer Students</button>
                                            </div>
                                            <div class="col-md-1"><p style="font-weight: bold; font-size: x-large;">TO</p></div>
                                            <div class="col-md-3">
                                                <?php
                                                $cse = "SELECT id, cname FROM classes WHERE status = 'ACTIVE' AND id <> $class ORDER BY cname ASC";
                                                $cserun = $conn->query($dbcon,$cse);
                                                ?>
                                                <select class="select2-active form-control" id="toclass" required>
                                                    <option value="">Select Class</option>
                                                    <?php
                                                    while($data = $conn->fetch($cserun)){
                                                        ?>
                                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['cname'] ?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-bordered table-hover table-checkable table-responsive">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><input type="checkbox" name="select-all" id="select-all" /> Select All </th>
                                                <!--<th>Image</th>-->
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Gender</th>
                                                <th>Date Of Birth</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sel="SELECT stdid, fname, lname, dob, sex FROM students WHERE class='$class'";
                                            $selrun=$conn->query($dbcon,$sel);
                                            $count = 0;
                                            if($conn->sqlnum($selrun) != 0){
                                                while($data = $conn->fetch($selrun)){
                                                    $count++;
                                                    $sid=$data['stdid'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><input type="checkbox" name="check_list" value="<?php echo $sid; ?>" id="<?php echo $count; ?>"/>&nbsp;&nbsp;<label for="<?php echo $count; ?>"><?php echo $sid; ?></label></td>
                                                        <td><?php echo $data['fname']; ?></td>
                                                        <td><?php echo $data['lname']; ?></td>
                                                        <td><?php echo $data['sex']; ?></td>
                                                        <td><?php echo $data['dob']; ?></td>
                                                    </tr>
                                                <?php }}else{ ?>
                                                <tr><td colspan="6">No Records Found</td></tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /user profile -->

                </div>
                <!-- /content area -->

            </div>
            <?php $conn->close($dbcon);}elseif (isset($_GET['createinvoices'])) {
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $stdid = $_GET['check_list'];
            $term = $_GET['term'];
            $class = $_GET['class'];



            ?>
            <div class="row">
                <div class="col-md-12" style="margin: 2%;">
                    <a class="btn btn-lg btn-info" href="dashboard.php?class=<?php echo $class; ?>&term=<?php echo $term; ?>&invoice_generator="><<< BACK</a>
                </div>
            </div>

            <?php
            //CHECK IF FEES STRUCTURE EXISTS FOR THE CLASS
            $chkexist = "SELECT amount FROM fees_class WHERE cid='$class'";
            $chkexistrun = $conn->query($dbcon,$chkexist);
            if($conn->sqlnum($chkexistrun) != 0) {
                if (!empty($stdid)) { ?>
                    <div id="ptable">
                        <?php
                        $count = 0;
                        foreach ($_GET['check_list'] as $selected) {
                            $count++;
                            $sliphideid = "invoicehide" . $count;
                            $feedhide = "feedhide" . $count;
                            $stdid = $selected;
                            //CHECK IF INVOICE HAS BEEN PRODUCED ALREADY
                            $chk = "SELECT COUNT(invoiceid) AS totslip FROM student_invoices WHERE stdid='$stdid' AND classid='$class' AND term='$term' AND status !='REJECTED'";
                            $chkrun = $conn->query($dbcon, $chk);
                            $chkdata = $conn->fetch($chkrun);
                            if ($chkdata['totslip'] == 0) {
                                //getting the staff details
                                $selstf = "SELECT fname, lname, discid FROM students WHERE stdid='$stdid'";
                                $selrun = $conn->query($dbcon, $selstf);
                                $stfdata = $conn->fetch($selrun);
                                $discid = $stfdata['discid'];

                                //GET THE LAST FOUR DIGITS OF A STRING
                                $lastfour = substr($stdid, -4);
                                $year = date("Y");

                                $invid = "INV" . $year . str_pad($class, 2, "0", STR_PAD_LEFT) . str_pad($term, 2, "0", STR_PAD_LEFT) . $lastfour;

                                ?>
                                <div class="panel panel-flat"
                                     style="margin-left: 5%; margin-right: 5%; margin-top: 2%;">
                                    <div class="panel-body no-padding-bottom">
                                        <div class="row" id="<?php echo $sliphideid; ?>">
                                            <div class="col-md-6" align="right">
                                                <button class="btn btn-lg btn-danger"
                                                        onclick="invoiceapproval('<?php echo $feedhide; ?>','<?php echo $invid; ?>','Cancelled','<?php echo $stdid; ?>','<?php echo $sliphideid; ?>','<?php echo $class; ?>','<?php echo $term; ?>','<?php echo $discid; ?>')">
                                                    <span class="icon icon-minus-circle2"></span> Cancel Payslip
                                                </button>
                                            </div>
                                            <div class="col-md-6" align="left">
                                                <button class="btn btn-lg btn-primary"
                                                        onclick="invoiceapproval('<?php echo $feedhide; ?>','<?php echo $invid ?>','Approved','<?php echo $stdid; ?>','<?php echo $sliphideid; ?>','<?php echo $class; ?>','<?php echo $term; ?>','<?php echo $discid; ?>')">
                                                    <span class="icon icon-plus-circle2"></span> Approve Payslip
                                                </button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12" align="center" id="<?php echo $feedhide; ?>"
                                                 style="font-size: x-large; font-weight: bold; color: #d97513">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body no-padding-bottom" id="ptable">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 content-group" align="left">
                                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt=""
                                                     style="width: 70px;">
                                                <ul class="list-condensed list-unstyled">
                                                    <li><?php echo $caddr; ?></li>
                                                    <li><?php echo $cloc; ?></li>
                                                    <li><?php echo $ccont; ?></li>
                                                    <li><?php echo $cmail; ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 content-group"
                                                 align="right">
                                                <h5 class="text-uppercase text-semibold">Invoice
                                                    #:&nbsp;&nbsp;<?php echo $invid; ?></h5>
                                                <ul class="list-condensed list-unstyled">
                                                    <li>Created date: <span
                                                                class="text-semibold"><?php echo $ddate; ?></span></li>
                                                </ul>
                                                <h5>Invoice To:</h5>
                                                <ul class="list-condensed list-unstyled" align="left">
                                                    <li><?php echo getStudent($stdid); ?></li>
                                                    <li>
                                                        <span class="text-semibold"><?php echo getClass($class); ?></span>
                                                    </li>
                                                    <li><span class="text-semibold">Term <?php echo $term; ?></span>
                                                    </li>
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
                                                            <th>Item Description</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php
                                                        $get = "SELECT c.amount, f.fee_name FROM fees_class c INNER JOIN fees_struct f ON f.id = c.feeid WHERE c.cid='$class' ORDER BY f.fee_name ASC";
                                                        $getrun = $conn->query($dbcon, $get);
                                                        $totalamount = 0;
                                                        while ($data = $conn->fetch($getrun)) {
                                                            $totalamount += $data['amount'];
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $data['fee_name']; ?>
                                                                </td>
                                                                <td>
                                                                    &cent;<?php echo number_format($data['amount'], 2); ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row invoice-payment" style="margin-top: 1%">

                                            <div class="col-sm-8 col-xs-8 col-md-8 col-lg-8">&nbsp;</div>
                                            <div class="col-sm-4 col-xs-4 col-md-4 col-lg-4">
                                                <div class="content-group">
                                                    <div class="table-responsive no-border">
                                                        <table class="table">
                                                            <tbody>
                                                            <tr>
                                                                <th align="right">Subtotal:</th>
                                                                <td class="text-right" style="font-weight: bold">
                                                                    &cent;<?php echo number_format($totalamount, 2); ?></td>
                                                            </tr>
                                                            <?php
                                                                $getdisc = getDiscountDetails($discid);
                                                                $obj = json_decode($getdisc);
                                                                $msg = $obj->msg;
                                                                if($msg != "NO"){
                                                                    $name = $obj->name;
                                                                    $percent = $obj->percent;
                                                                    $discount =($totalamount * $percent)/100;
                                                            ?>
                                                            <tr style="color: #ff0000;">
                                                                <td align="right"><?php echo strtolower($name)." discount"; ?> (<?php echo $percent; ?> %):</td>
                                                                <td class="text-right" style="font-weight: bold">
                                                                    &cent;<?php echo number_format($discount, 2); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td align="right">Fees Payable:</td>
                                                                <td class="text-right" style="font-weight: bold">
                                                                    &cent;<?php echo number_format($totalamount - $discount, 2); ?></td>
                                                            </tr>
                                                            <?php }else{ ?>
                                                                    <tr>
                                                                        <td align="right">Fees Payable:</td>
                                                                        <td class="text-right" style="font-weight: bold">
                                                                            &cent;<?php echo number_format($totalamount, 2); ?></td>
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
                                <?php
                                //INSERTING THE SUMMARY RECORD
                                //$ins = "INSERT INTO payslipsummary SET totpaye=".calculatePaye(($totalreimb + $total),$stfid).",totreimb=$totalreimb, voka_id='$stfid', slipid='$slipid', totded=$totalded, totearn=$totalearn , basic=$baseamnt, status='Approved', sdate='$sdate', edate='$edate'";
                                //$conn->query($dbcon, $ins);
                            } else {
                                ?>
                                <div class="row" style="margin-left: 20%; margin-right: 20%">
                                    <div class="col-md-12">
                                        <div class="alert bg-danger" align="center">
                                            <button type="button" class="close" data-dismiss="alert">
                                                <span>&times;</span><span class="sr-only">Close</span></button>
                                            <span style="font-weight: bold; font-size: large;">OOPS!!</span> Student
                                            Invoice Already Generated For <?php echo getStudent($stdid); ?> For
                                            Class <?php echo getClass($class) ?> AND Term<?php echo $term; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <hr style="color: #2b2bac;"/>
                        <?php } ?>

                    </div>
                    <?php
                } else {
                    $test = "no";
                    $msg = "You Did Not Select Any Staff";
                }
            }else{?>
                <div class="row" style="margin-left: 20%; margin-right: 20%">
                    <div class="col-md-12">
                        <div class="alert bg-danger" align="center">
                            <button type="button" class="close" data-dismiss="alert">
                                <span>&times;</span><span class="sr-only">Close</span></button>
                            <span style="font-weight: bold; font-size: large;">OOPS!!</span> Invoices Could Not Be Generated Because No Fees Structure Exists For The Class <?php echo getClass($class); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- Dashboard -->
        <?php }elseif(isset($_GET['class_details'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $cid=$_GET['class_details'];
            $selstf = "SELECT * FROM classes WHERE id=$cid";
            $selstfrun = $conn->query($dbcon,$selstf);
            $seldata = $conn->fetch($selstfrun);
            $template=$seldata['template'];
            $cid=$seldata['id'];

            $selstd="SELECT * FROM students WHERE status = 'ACTIVE' AND class='$cid'";
            $selstdrun=$conn->query($dbcon,$selstd);
            $selcount=$conn->sqlnum($selstdrun);
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="page-title">
                            <h3><i class="icon-users4 position-left"></i> <span class="text-semibold"><?php echo $seldata['cname'] ?></span> - Details</h3>

                            <ul class="breadcrumb position-right">
                                <li><a>Configuration</a></li>
                                <li class="active"><a href="dashboard.php?courses">Classes</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /header content -->


                    <!-- Toolbar -->
                    <div class="navbar navbar-default navbar-xs">
                        <ul class="nav navbar-nav visible-xs-block">
                            <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
                        </ul>

                        <div class="navbar-collapse collapse" id="navbar-filter">
                            <ul class="nav navbar-nav element-active-slate-400">
                                <li class="active"><a href="#classstudents" data-toggle="tab"><i class="icon-users2 position-left"></i> Students <span class="badge badge-success badge-inline position-right"><?php echo $selcount; ?></span></a></li>
                                <li><a href="#classsubjects" data-toggle="tab"><i class="icon-calendar3 position-left"></i> Subjects</a></li>
                                <li><a href="#feesstructure" data-toggle="tab"><i class="icon-cash4 position-left"></i> Fees Structure</a></li>
                                <li><a href="#staff" data-toggle="tab"><i class="icon-user-tie position-left"></i> Class Teacher(s)</a></li>
                                <li><a href="#template" data-toggle="tab"><i class="icon-user-tie position-left"></i> Examination Template</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /toolbar -->

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- User profile -->
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="tabbable">
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="classstudents">
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Students List</h6>
                                            </div>

                                            <div class="panel-body">

                                                <div class="row" style="margin-top: 2%">
                                                    <div class="col-md-12">
                                                        <table class="table table-striped media-library table-lg">
                                                            <thead>
                                                            <tr>
                                                                <th>Image</th>
                                                                <th>Student ID</th>
                                                                <th>Name</th>
                                                                <th>Sex</th>
                                                                <th>Date Of Birth</th>
                                                                <th>Contact</th>
                                                                <th class="text-center">Actions</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                            if($conn->sqlnum($selstdrun) !=0){
                                                            while($data=$conn->fetch($selstdrun)){
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    <a href="<?php echo $data['img']; ?>" data-popup="lightbox">
                                                                        <img src="<?php echo $data['img']; ?>" alt="" class="img-rounded img-preview">
                                                                    </a>
                                                                </td>
                                                                <td><?php echo $data['stdid']; ?></td>
                                                                <td><?php echo $data['fname']." ".$data['lname']; ?></td>
                                                                <td><?php echo $data['sex']; ?></td>
                                                                <td><?php echo $data['dob']; ?></td>
                                                                <td><?php echo $data['contact']; ?></td>
                                                                <td class="text-center">
                                                                    <ul class="icons-list">
                                                                        <li class="dropdown">
                                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                                                <i class="icon-menu9"></i>
                                                                            </a>

                                                                            <ul class="dropdown-menu dropdown-menu-right">
                                                                                <li><a href="#"><i class="icon-pencil7"></i> Edit Info</a></li>
                                                                                <li><a href="dashboard.php?student_details=<?php echo $data['stdid']; ?>"><i class="icon-copy"></i> View Info</a></li>
                                                                                <li class="divider"></li>
                                                                                <li><a href="#"><i class="icon-bin"></i>Remove Student</a></li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            <?php }}?>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                        <!-- /horizontal icons -->
                                            </div>
                                        </div>

                                    </div>


                                    <div class="tab-pane fade" id="classsubjects">

                                        <!-- Available hours -->
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Class Subjects</h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li><a data-action="collapse"></a></li>
                                                        <li><a data-action="reload"></a></li>
                                                        <li><a data-action="close"></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body" id="classsubjectdet">
                                                <input type="hidden" value="0" id="rowcounterwh"/>
                                                <form method="post" id="attachsubjectform">
                                                    <input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
                                                     <table class="table table-responsive table-bordered subjectTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>SUBJECT NAME</th>
                                                            <th>&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="addsbjbody">
                                                    <?php
                                                    //GET THE INTERNSHIP DETAILS OF THE STUDENT
                                                    $int = "SELECT d.sbj, s.id FROM subject_class s INNER JOIN subject d ON s.sbjid = d.id WHERE s.cid = '$cid'";
                                                    $intrun = $conn->query($dbcon,$int);
                                                    if($conn->sqlnum($intrun) != 0){
                                                    $count=0;
                                                    while($data = $conn->fetch($intrun)){
                                                        $id = $data['id'];
                                                        $count++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $count; ?></td>
                                                            <td><?php echo $data['sbj']; ?></td>
                                                            <td><a href="dashboard.php?class_details=<?php echo $cid; ?>&detach_subject=<?php echo $id; ?>"><span class='icon icon-trash btn btn-danger'></span></a></td>
                                                        </tr>
                                                    <?php }}else{ ?>
                                                        <tr><td colspan="3">No Records Found</td></tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                                    <div class="row" style="padding-top: 30px; padding-right: 10px;">
                                                        <div class="col-md-12">
                                                            <a class="btn btn-primary" onclick="attachsubject(<?php echo $cid; ?>)">Attach Subject</a>
                                                            <a class="btn btn-warning hidden" id="savesubject" onclick="saveSubjects()">Save Subject</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="staff">

                                        <!-- Available hours -->
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Class Teacher(s)</h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li><a data-action="collapse"></a></li>
                                                        <li><a data-action="reload"></a></li>
                                                        <li><a data-action="close"></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body" id="classsubjectdet">
                                                <input type="hidden" value="0" id="rowcounterwh"/>
                                                <form method="post" id="attachsubjectform">
                                                    <input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
                                                     <table class="table table-responsive table-bordered subjectTable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>STAFF NAME</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="addsbjbody">
                                                    <?php
                                                    //GET THE INTERNSHIP DETAILS OF THE STUDENT
                                                    $int = "SELECT stfid,id FROM class_staff WHERE classid = '$cid'";
                                                    $intrun = $conn->query($dbcon,$int);
                                                    if($conn->sqlnum($intrun) != 0){
                                                    $count=0;
                                                    while($data = $conn->fetch($intrun)){
                                                        $count++;
                                                        $did=$data['id'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $count; ?></td>
                                                            <td><?php echo getStaff($data['stfid']); ?></td>
                                                            <td><a href="dashboard.php?class_details=<?php echo $cid; ?>&detach_staff=<?php echo $did; ?>"><span class='icon icon-trash btn btn-danger'></span></a></td>
                                                        </tr>
                                                    <?php }}else{ ?>
                                                        <tr><td colspan="2">No Records Found</td></tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                                    <div class="row" style="padding-top: 30px; padding-right: 10px;">
                                                        <div class="col-md-12">
                                                            <a data-toggle="modal" data-target="#classstaff">Attach staff</a>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="tab-pane fade" id="feesstructure">

                                        <!-- Profile info -->
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Fees Structure</h6>
                                            </div>

                                            <div class="panel-body">
                                                <div class="panel-body" id="classfeedet">
                                                    <input type="hidden" value="0" id="rowcounterfee"/>
                                                    <form method="post" id="attachfeeform">
                                                        <input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
                                                        <table class="table table-responsive table-bordered feeTable">
                                                            <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>FEE NAME</th>
                                                                <th>AMOUNT</th>
                                                                <th>&nbsp;</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="addfeebody">
                                                            <?php
                                                            //GET THE INTERNSHIP DETAILS OF THE STUDENT
                                                            $int = "SELECT d.fee_name, s.id, s.amount FROM fees_class s INNER JOIN fees_struct d ON s.feeid = d.id WHERE s.cid = '$cid'";
                                                            $intrun = $conn->query($dbcon,$int);
                                                            if($conn->sqlnum($intrun) != 0){
                                                                $count=0;
                                                                $total=0;
                                                                while($data = $conn->fetch($intrun)){
                                                                    $id = $data['id'];
                                                                    $total+= $data['amount'];
                                                                    $count++;
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $count; ?></td>
                                                                        <td><?php echo $data['fee_name']; ?></td>
                                                                        <td><?php echo $data['amount']; ?></td>
                                                                        <td><a href="dashboard.php?class_details=<?php echo $cid; ?>&detach_fees=<?php echo $id; ?>"><span class='icon icon-trash btn btn-danger'></span></a></td>
                                                                    </tr>
                                                                <?php }?>
                                                                    <tr style="color: #FF0000; font-weight: bold; font-size: large;"><td colspan="2" align="right">Total</td><td align="left"><?php echo number_format($total,2); ?></td></tr>
                                                            <?php }else{ ?>
                                                                <tr><td colspan="4">No Records Found</td></tr>
                                                            <?php } ?>
                                                            </tbody>
                                                        </table>
                                                        <div class="row" style="padding-top: 30px; padding-right: 10px;">
                                                            <div class="col-md-12">
                                                                <a class="btn btn-primary" onclick="attachfees(<?php echo $cid; ?>)">Attach Fees Component</a>
                                                                <a class="btn btn-warning hidden" id="savefees" onclick="saveFees()">Save Fees</a>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /profile info -->

                                    </div>
                                    <div class="tab-pane fade" id="template">

                                        <!-- Profile info -->
                                        <div class="row">
                                            <a onclick="examTemplate('NO','<?php echo $cid; ?>')">
                                                <div class="col-md-4">
                                                <div class="panel panel-flat" <?php if($template == 'NO'){ ?>style="border: #032372 solid thick"<?php }?>>
                                                    <div class="panel-heading">
                                                        <h6 class="panel-title">No Template</h6>
                                                    </div>

                                                    <div class="panel-body">
                                                        <div class="panel-body" id="classfeedet">
                                                            <div class="thumbnail">
                                                                <div class="thumb thumb-slide">
                                                                    <img src="assets/images/defaults/notemp.png" alt="">
                                                                    <div class="caption">
                                                                        <span>
                                                                            <a href="assets/images/defaults/notemp.png" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                            <a onclick="examTemplate('NURSERY','<?php echo $cid; ?>')">
                                                <div class="col-md-4">
                                                <div class="panel panel-flat"<?php if($template == 'NURSERY'){ ?>style="border: #032372 solid thick"<?php }?>>
                                                    <div class="panel-heading">
                                                        <h6 class="panel-title">Nursery Template</h6>
                                                    </div>

                                                    <div class="panel-body">
                                                        <div class="panel-body" id="classfeedet">
                                                            <div class="thumbnail">
                                                                <div class="thumb thumb-slide">
                                                                    <img src="assets/images/defaults/nursery.png" alt="">
                                                                    <div class="caption">
                                                                        <span>
                                                                            <a href="assets/images/defaults/nursery.png" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                            <a onclick="examTemplate('KG','<?php echo $cid; ?>')">
                                                <div class="col-md-4">
                                                    <div class="panel panel-flat"<?php if($template == 'KG'){ ?>style="border: #032372 solid thick"<?php }?>>
                                                        <div class="panel-heading">
                                                            <h6 class="panel-title">KG Template</h6>
                                                        </div>

                                                        <div class="panel-body">
                                                            <div class="panel-body" id="classfeedet">
                                                                <div class="thumbnail">
                                                                    <div class="thumb thumb-slide">
                                                                        <img src="assets/images/defaults/kg.png" alt="">
                                                                        <div class="caption">
                                                                            <span>
                                                                                <a href="assets/images/defaults/kg.png" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <!-- /profile info -->

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">

                            <!-- User thumbnail -->
                            <?php
                                $sel="SELECT c.stfid, s.sttitle, s.fname, s.lname, s.post, s.img FROM class_staff c INNER JOIN staff s ON c.stfid = s.stfid WHERE c.classid = '$cid' AND s.status = 'ACTIVE'";
                                $selrun=$conn->query($dbcon,$sel);
                                while($data = $conn->fetch($selrun)){
                            ?>

                            <div class="thumbnail">
                                <p style="text-align: center; font-size: large;" class="maincolor">Class Teacher</p>
                                <div class="thumb thumb-rounded thumb-slide">
                                    <img src="<?php echo $data['img']; ?>" alt="">
                                    <div class="caption">
										<span>
											<a href="#" class="btn bg-success-400 btn-icon btn-xs" data-popup="lightbox"><i class="icon-plus2"></i></a>
										</span>
                                    </div>
                                </div>

                                <div class="caption text-center">
                                    <h6 class="text-semibold no-margin"><?php echo $data['sttitle']." ".$data['fname']." ".$data['lname']; ?> <small class="display-block" style="color: #ff0000"><?php echo getPosition($data['post']); ?></small></h6>
                                </div>
                            </div>
                            <?php } ?>


                            <!-- /user thumbnail -->

                        </div>
                    </div>
                    <!-- /user profile -->

                </div>
                <!-- /content area -->

            </div>
            <div class="modal fade" id="classstaff">
                <div class="modal-dialog">
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">STAFF</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped">


                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Staff</p></td>
                                        <td>
                                            <?php
                                            $conn=new Db_connect;
                                            $dbcon=$conn->conn();
                                            $cse = "SELECT stfid, fname, lname, sttitle FROM staff WHERE status = 'ACTIVE' ORDER BY fname ASC";
                                            $cserun = $conn->query($dbcon,$cse);
                                            ?>
                                            <select class="select2-active form-control" name="staffid" required>
                                                <option value=""></option>
                                                <?php
                                                while($data = $conn->fetch($cserun)){
                                                    ?>
                                                    <option value="<?php echo $data['stfid'] ?>"><?php echo $data['sttitle']." ".$data['fname']." ".$data['lname'] ?></option>
                                                <?php }$conn->close($dbcon); ?>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" name="attachstaff">Attach Staff</button>
                            </div>
                        </div>
                    </form><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <!-- /main content -->
            <?php $conn->close($dbcon);}elseif (isset($_GET['invoice_details'])) {
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $invid = $_GET['invoice_details'];
            //GET THE INVOICE DETAILS
            $get = "SELECT * FROM student_invoices WHERE invoiceid = '$invid'";
            $getrun = $conn->query($dbcon,$get);
            $getdata = $conn->fetch($getrun);
            $stdid = $getdata['stdid'];

            //GET THE STUDENT DETAILS
            $sel = "SELECT fname, lname, class, contact, email, discid FROM students WHERE stdid='$stdid'";
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
                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 content-group" align="left">
                                    <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 70px;">
                                    <ul class="list-condensed list-unstyled">
                                        <li><?php echo $caddr; ?></li>
                                        <li><?php echo $cloc; ?></li>
                                        <li><?php echo $ccont; ?></li>
                                        <li><?php echo $cmail; ?></li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6 content-group" align="right">
                                    <h5 class="text-uppercase text-semibold">Invoice #:&nbsp;&nbsp;<?php echo $invid; ?></h5>
                                    <ul class="list-condensed list-unstyled">
                                        <li>Created date: <span class="text-semibold"><?php echo $getdata['created_date']; ?></span></li>
                                    </ul>
                                    <h5>Invoice To:</h5>
                                    <ul class="list-condensed list-unstyled" align="left">
                                        <li><?php echo $seldata['fname']." ".$seldata['lname']; ?></li>
                                        <li><span class="text-semibold"><?php echo getClass($getdata['classid']); ?></span></li>
                                        <li><span class="text-semibold">Term <?php echo $getdata['term']; ?></span></li>
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
                                                <th>Item Description</th>
                                                <th>Amount</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $get="SELECT * FROM student_invoice_details WHERE invoiceid='$invid' ORDER BY feename ASC";
                                            $getrun = $conn->query($dbcon,$get);
                                            while($data = $conn->fetch($getrun)){
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $data['feename']; ?>
                                                </td>
                                                <td>&cent;<?php echo number_format($data['amount'],2); ?></td>
                                            </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row invoice-payment" style="margin-top: 1%">

                                <div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
                                    <?php
                                    $selpay = "SELECT * FROM invoice_payment WHERE invoiceid = '$invid' ORDER BY paydate ASC";
                                    $selpayrun = $conn->query($dbcon,$selpay);
                                    if($conn->sqlnum($selpayrun) != 0){
                                    ?>
                                    <table class="table table-bordered table-striped">
                                        <thead><tr style="font-weight: bold;"><td align="center" colspan="4">PAYMENTS HISTORY</td></tr><tr><th>Date</th><th>Amount</th><th>Method</th></tr></thead>
                                        <tbody>
                                        <?php
                                        $tot=0;
                                        while($paydata = $conn->fetch($selpayrun)){
                                            $tot+=$paydata['amount'];
                                            $payid=$paydata['id'];
                                            $amount=$paydata['amount'];
                                            ?>
                                            <tr><td><?php echo date("d M, Y",strtotime(date($paydata['paydate']))); ?></td><td>&cent;<?php echo $paydata['amount']; ?></td>
                                                <td><?php echo $paydata['pay_method']; ?></td><td class="printhide"><button onclick="removePayment('<?php echo $invid; ?>',<?php echo $payid; ?>,<?php echo $amount; ?>)" class="btn btn-sm btn-danger"><span class="icon icon-trash"></span></button></td></tr>
                                        <?php } ?>
                                        <tr style="font-weight: bold"><td>TOTAL</td><td>&cent;<?php echo number_format($tot,2); ?></td></tr>
                                        </tbody>
                                    </table>
                                    <?php } ?>
                                </div>

                                <div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
                                    <div class="content-group">
                                        <div class="table-responsive no-border">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th align="right">Total Amount:</th>
                                                    <td class="text-right">&cent;<?php echo $getdata['totalamount']; ?></td>
                                                </tr>
                                                <?php
                                                if($getdata['discount'] !=0){
                                                    $discid = $seldata['discid'];
                                                    $discdetails = getDiscountDetails($discid);
                                                    $obj = json_decode($discdetails);
                                                    $dname = $obj->name;
                                                    $percent = $obj->percent;

                                                ?>
                                                <tr style="color: #ff0000; font-weight: bold;">
                                                    <td align="left">Discount (<?php echo $dname." [".$percent." %]"; ?>):</td>
                                                    <td class="text-right">&cent;<?php echo $getdata['discount']; ?></td>
                                                </tr>
                                                <?php } ?>
                                                <tr>
                                                    <th align="right">Paid:</th>
                                                    <td class="text-right">&cent;<?php echo $getdata['paid']; ?></td>
                                                </tr>
                                                <tr>
                                                    <th align="right">Arrears:</th>
                                                    <td class="text-right text-primary"><h5 class="text-semibold">&cent;<?php echo number_format(($getdata['totalamount'] - ($getdata['paid'] + $getdata['discount'])),2,'.',','); ?></h5></td>
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
                                <input type="hidden" name="invoice_details" value="<?php echo $invid; ?>" />
                                <table class="table table-striped">
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Payment Amount</p></td>
                                        <td>
                                            <input type="number" required class="form-control" value="<?php echo $getdata['totalamount'] - ($getdata['paid'] + $getdata['discount']); ?>" max="<?php echo $getdata['totalamount'] - ($getdata['paid']+$getdata['discount']) ?>" name="payamount" min="0.0" step="any"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Payment Method</p></td>
                                        <td>
                                            <select name="payment_method" class="form-control">
                                                <option value="CASH">CASH</option>
                                                <option value="MOMO">MOMO WALLET</option>
                                                <option value="BANK">BANK TRANSFER</option>
                                            </select>
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
        <?php  $conn->close($dbcon);}elseif (isset($_GET['student_exams_details'])) {
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $examid = $_GET['student_exams_details'];
            $get = "SELECT * FROM exams_records WHERE examid = '$examid'";
            $getrun = $conn->query($dbcon,$get);
            $getdata = $conn->fetch($getrun);
            $stdid = $getdata['stdid'];
            $class = $getdata['class'];
            $status = $getdata['status'];
            $year = $getdata['dyear'];
            $term = $getdata['term'];

            //GET THE STUDENT DETAILS
            $sel = "SELECT fname, lname, contact, email, img FROM students WHERE stdid='$stdid'";
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
                            </div>
                        </div>

                        <div class="panel-body no-padding-bottom" id="ptable">
                            <div class="row">
                                <div class="col-md-12">
                                    <p style="font-weight: bold; text-decoration: underline; font-size: large; text-align: center;">END OF TERM <?php echo $term ?> ASSESSMENT REPORT <br/> <?php  echo getClass($class); ?></p>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 content-group" align="left">
                                    <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 70px;">
                                    <ul class="list-condensed list-unstyled">
                                        <li><?php echo $caddr; ?></li>
                                        <li><?php echo $cloc; ?></li>
                                        <li><?php echo $ccont; ?></li>
                                        <li><?php echo $cmail; ?></li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4 content-group">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="text-uppercase text-semibold">Examination #:&nbsp;&nbsp;<?php echo $examid; ?></h5>
                                            <div><p><b>Number On Roll:</b> <?php echo $getdata['roll_num']; ?></p></div>
                                            <div><p><b>Vacation Date:</b> <?php echo $getdata['vacation']; ?></p></div>
                                            <div><p><b>Reopening Date:</b> <?php echo $getdata['reopening']; ?></p></div>
                                            <div><b>Attendance:</b> <?php echo $getdata['attendance']." Out Of ".$getdata['outof']; ?></p></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-sm-3 col-xs-3 col-lg-3 content-group">
                                    <div class="media">
                                        <div class="media-body">
                                            <h6 class="media-heading"><?php echo $seldata['fname']." ".$seldata['lname']; ?></h6>
                                            <p class="text-muted"><?php echo $stdid; ?></p>
                                            <div><p>Class: <?php echo getClass($class); ?></p></div>
                                            <div><p>Term: <?php echo $term; ?></p></div>
                                            <div><p>Year: <?php echo $year; ?></p></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-1 col-lg-1 content-group" align="left">
                                    <img src="<?php echo $seldata['img']; ?>" class="content-group mt-10" alt="" style="width: 70px;">
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
                                    <div class="panel panel-flat">
                                        <div class="table-responsive">
                                            <table class="table table-lg table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>SBA Score (50)</th>
                                                    <th>Exam Score(50)</th>
                                                    <th>Total Score(100)</th>
                                                    <th>Grade</th>
                                                    <th>Remarks</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $get="SELECT * FROM exams_details WHERE examid='$examid'";
                                                $getrun = $conn->query($dbcon,$get);
                                                $totalexam=0;
                                                $totalclass=0;
                                                while($data = $conn->fetch($getrun)){
                                                    $totalclass+= $data['cls_score'];
                                                    $totalexam+= $data['exam_score'];
                                                    $total = $data['exam_score'] + $data['cls_score'];
                                                    $json = getComment($total);
                                                    $obj = json_decode($json);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo getSubject($data['sbj']); ?></td>
                                                        <td><?php echo $data['cls_score']; ?></td>
                                                        <td><?php echo $data['exam_score']; ?></td>
                                                        <td><?php echo $total; ?></td>
                                                        <td><?php echo $obj->grade; ?></td>
                                                        <td><?php echo $obj->comment; ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr style="color: #ff0000; font-weight: bold;">
                                                    <td align="right">Total</td>
                                                    <td><?php echo $totalclass; ?></td>
                                                    <td><?php echo $totalexam; ?></td>
                                                    <td><?php echo $totalexam + $totalclass; ?></td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $sel2="SELECT talents, teacher, principal FROM exams_remarks WHERE examid='$examid'";
                            $selrun2=$conn->query($dbcon,$sel2);
                            $seldata2=$conn->fetch($selrun2);
                            ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <h6>Talent And Interests: <span style="color: #000;"><?php echo $seldata2['talents']; ?></span></h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <h6>Class Teacher's Remarks: <span style="color: #000;"><?php echo $seldata2['teacher']; ?></span></h6>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-4" align="center">_________________________________________________<br/>Class Teacher's Signature</div>
                            </div>
                            <div class="row" style="margin-top: 2%;">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <h6>Principal's Remarks: <span style="color: #000;"><?php echo $seldata2['principal']; ?></span></h6>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-3" align="center">___________________________________<br/>Principal's Signature</div>
                                <div class="col-md-3 col-sm-3 col-xs-3" align="center">___________________________________<br/> Date</div>
                            </div>
                            <div class="row" style="margin-top: 2%;">
                                <div class="col-md-4 col-sm-4 col-xs-4" align="center">_________________________________________________<br/>Director's Signature</div>
                                <div class="col-md-4 col-sm-4 col-xs-4" align="center">_________________________________________________<br/> Date</div>
                            </div>
                            <div class="row" style="margin-top: 4%;">
                                <div class="col-md-12">
                                    <p style="font-weight: bold; font-size: large; text-align: center">GRADING SCALE</p>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>PERCENTAGE(%)</th>
                                                <th>GRADE</th>
                                                <th>VALUE</th>
                                                <th>INTERPRETATION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>90-100</td>
                                                <td>AA+</td>
                                                <td>1</td>
                                                <td>HIGHEST</td>
                                            </tr>
                                            <tr>
                                                <td>80-89</td>
                                                <td>A</td>
                                                <td>2</td>
                                                <td>HIGHER</td>
                                            </tr>
                                            <tr>
                                                <td>70-79</td>
                                                <td>B+</td>
                                                <td>3</td>
                                                <td>HIGH</td>
                                            </tr>
                                            <tr>
                                                <td>60-69</td>
                                                <td>B</td>
                                                <td>4</td>
                                                <td>HIGH AVERAGE</td>
                                            </tr>
                                            <tr>
                                                <td>55-59</td>
                                                <td>C+</td>
                                                <td>5</td>
                                                <td>AVERAGE</td>
                                            </tr>
                                            <tr>
                                                <td>50-54</td>
                                                <td>C</td>
                                                <td>6</td>
                                                <td>LOW AVERAGE</td>
                                            </tr>
                                            <tr>
                                                <td>40-49</td>
                                                <td>D+</td>
                                                <td>7</td>
                                                <td>LOW</td>
                                            </tr>
                                            <tr>
                                                <td>35-39</td>
                                                <td>D</td>
                                                <td>8</td>
                                                <td>LOWER</td>
                                            </tr>
                                            <tr>
                                                <td>00-34</td>
                                                <td>E</td>
                                                <td>9</td>
                                                <td>LOWER</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /content area -->
            </div>
            <?php  $conn->close($dbcon);}elseif (isset($_GET['generated_exams'])) {
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $examid = $_GET['generated_exams'];
            //GET THE INVOICE DETAILS
            $get = "SELECT * FROM exams_records WHERE examid = '$examid'";
            $getrun = $conn->query($dbcon,$get);
            $getdata = $conn->fetch($getrun);
            $stdid = $getdata['stdid'];
            $class = $getdata['class'];
            $status = $getdata['status'];
            $year = $getdata['dyear'];
            $term = $getdata['term'];

            //GET THE STUDENT DETAILS
            $sel = "SELECT fname, lname, contact, email, img FROM students WHERE stdid='$stdid'";
            $selrun = $conn->query($dbcon,$sel);
            $seldata = $conn->fetch($selrun);

            ?>
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="row" style="padding-top: 2%;">
                            <div class="col-md-6"><h4 class="maincolor"><i class="icon-book-play position-left"></i>Examination Score Sheet</h4></div>
                            <div class="col-md-6"><h4 class="maincolor" style="text-align: right;">Examination #: <?php echo $examid; ?></h4></div>
                        </div>
                    </div>
                </div>
                <!-- /page header -->
                <!-- Content area -->
                <div class="content">
                    <div class="panel panel-white">
                        <div class="panel-body no-padding-bottom" id="ptable">
                            <div class="row">
                                <div class="col-md-3">
                                        <!-- User thumbnail -->
                                    <div class="thumbnail">
                                        <div class="thumb thumb-rounded thumb-slide" align="center">
                                            <img src="<?php echo $seldata['img']; ?>" style="width: 100px; height: 100px;" alt="">
                                        </div>

                                        <div class="caption text-center">
                                            <h6 class="text-semibold no-margin"><?php echo $seldata['fname']." ".$seldata['lname']; ?> <small class="display-block">STD ID: <?php echo $stdid; ?></small></h6>
                                            <div style="margin-top: 10px;"><h6 class="text-semibold no-margin" style="font-weight: bold; font-size: medium;">CLASS: <?php echo getClass($class); ?></h6></div>
                                            <div style="margin-top: 10px;"><h6 class="text-semibold no-margin" style="font-weight: bold; font-size: medium;">YEAR: <?php echo $year; ?></h6></div>
                                            <div style="margin-top: 10px;"><h6 class="text-semibold no-margin" style="font-weight: bold; font-size: medium;">TERM: <?php echo $term; ?></h6></div>
                                        </div>
                                    </div>
                                        <!-- /user thumbnail -->
                                    <?php
                                    if($status == "PENDING"){
                                        ?>
                                        <form method="post">
                                            <input type="hidden" name="examid" value="<?php echo $examid; ?>" />
                                            <input type="hidden" name="classid" value="<?php echo $class; ?>" />
                                            <div class="panel panel-flat" style="margin-top: 2%; padding: 2%;">
                                                <h4>REMARKS</h4>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Students In Class</label>
                                                        <input type="number" readonly class="form-control" name="rollnum" min="0" value="<?php echo getRollCount($class); ?>" required>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 2%;">
                                                        <label>Vacation Date</label>
                                                        <input type="date" class="form-control" name="vacation" value="<?php echo date("Y-m-d"); ?>" required>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 2%;">
                                                        <label>Re-Opening Date</label>
                                                        <input type="date" class="form-control" name="reopen" value="<?php echo date("Y-m-d"); ?>" required>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 2%;">
                                                        <label>Attendance</label>
                                                        <input type="number" class="form-control" min="0" name="attendance" value="" required>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 2%;">
                                                        <label>Out Of</label>
                                                        <input type="number" class="form-control" min="0" name="outof" value="" required>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 2%;">
                                                        <textarea class="form-control" name="talents" maxlength="200" placeholder="Talents And Interests" required></textarea>
                                                    </div>
                                                    <div class="col-md-12" style="margin-top: 2%;">
                                                        <textarea class="form-control" name="remarks" maxlength="200" placeholder="Class Teacher's Remarks" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 2%;">
                                                    <div class="col-md-6" align="center">
                                                        <button type="submit" name="submitresult" class="btn btn-sm btn-success"><span class="icon icon-markup"></span>Complete Report</button>
                                                    </div>
                                                    <div class="col-md-6" align="center">
                                                        <button type="submit" name="rejectresult" class="btn btn-sm btn-danger"><span class="icon icon-cancel-circle2"></span>Cancel Report</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    <?php }else{
                                        $sel2="SELECT talents, teacher, principal FROM exams_remarks WHERE examid='$examid'";
                                        $selrun2=$conn->query($dbcon,$sel2);
                                        $seldata2=$conn->fetch($selrun2);
                                        ?>
                                        <table class="table table-responsive table-bordered">
                                            <tr>
                                                <th>Talents And Interests</th>
                                                <td><?php echo $seldata2['talents']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Teacher's Remarks</th>
                                                <td><?php echo $seldata2['teacher']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Number On Roll</th>
                                                <td><?php echo $getdata['roll_num']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Vacation Date</th>
                                                <td><?php echo $getdata['vacation']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Reopening Date</th>
                                                <td><?php echo $getdata['reopening']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Attendance</th>
                                                <td><?php echo $getdata['attendance']." Out Of ".$getdata['outof']; ?></td>
                                            </tr>
                                            <?php
                                                if($status == "APPROVED"){
                                            ?>
                                            <tr>
                                                <th>Teacher's Remarks</th>
                                                <td><?php echo $seldata2['principal']; ?></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="center"><a class="btn btn-warning" href="dashboard.php?class=<?php echo $class; ?>&year=<?php echo $year; ?>&term=<?php echo $term; ?>&pending_exams">APPROVE NEW EXAMS RECORDS</a></td>
                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <td colspan="2" align="center"><a class="btn btn-success" href="dashboard.php?students_data=<?php echo $class; ?>&status=ACTIVE">ADD NEW EXAMS RECORDS</a></td>
                                            </tr>
                                        </table>

                                    <?php } ?>
                                    <?php
                                    if($status == "CONFIRMED"){
                                    ?>
                                    <form method="post">
                                        <input type="hidden" name="examid" value="<?php echo $examid; ?>" />
                                        <input type="hidden" name="classid" value="<?php echo $class; ?>" />
                                        <div class="panel panel-flat" style="margin-top: 2%; padding: 2%;">
                                            <h4>PRINCIPAL'S REMARKS</h4>
                                            <div class="row">
                                                <div class="col-md-12" style="margin-top: 2%;">
                                                    <textarea class="form-control" name="remarks" maxlength="200" placeholder="Principal's Remarks"></textarea>
                                                </div>
                                            </div>
                                            <div class="row" style="margin-top: 2%;">
                                                <div class="col-md-12" align="center">
                                                    <button type="submit" name="approveresult" class="btn btn-sm btn-success"><span class="icon icon-markup"></span>Approve Report</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php } ?>
                                </div>
                                <div class="col-md-9">
                                    <div class="panel panel-flat">
                                        <h4>EXAM SCORE</h4>
                                        <div class="table-responsive">
                                            <table class="table table-lg table-bordered">
                                                <thead>
                                                <tr>
                                                    <th>Subject</th>
                                                    <th>Class Score</th>
                                                    <th>Exams Score</th>
                                                    <th>Total Score</th>
                                                    <th>Grade</th>
                                                    <th>Comment</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $get="SELECT * FROM exams_details WHERE examid='$examid'";
                                                $getrun = $conn->query($dbcon,$get);
                                                $totalexam=0;
                                                $totalclass=0;
                                                while($data = $conn->fetch($getrun)){
                                                    $totalclass+= $data['cls_score'];
                                                    $totalexam+= $data['exam_score'];
                                                    $total = $data['exam_score'] + $data['cls_score'];
                                                    $json = getComment($total);
                                                    $obj = json_decode($json);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo getSubject($data['sbj']); ?></td>
                                                        <td><?php echo $data['cls_score']; ?></td>
                                                        <td><?php echo $data['exam_score']; ?></td>
                                                        <td><?php echo $total; ?></td>
                                                        <td><?php echo $obj->grade; ?></td>
                                                        <td><?php echo $obj->comment; ?></td>
                                                    </tr>
                                                <?php } ?>
                                                <tr style="color: #ff0000; font-weight: bold;">
                                                    <td align="right">Total</td>
                                                    <td><?php echo $totalclass; ?></td>
                                                    <td><?php echo $totalexam; ?></td>
                                                    <td><?php echo $totalexam + $totalclass; ?></td>
                                                    <td>&nbsp;</td>
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
            <?php  $conn->close($dbcon);}elseif(isset($_GET['student_details'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $cid=$_GET['student_details'];
            $selstf = "SELECT * FROM students WHERE stdid='$cid'";
            $selstfrun = $conn->query($dbcon,$selstf);
            $seldata = $conn->fetch($selstfrun);
            $class=$seldata['class'];
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="page-title">
                            <h3><i class="icon-user position-left"></i> <span class="text-semibold">STUDENT</span> DETAILS</h3>

                            <ul class="breadcrumb position-right">
                                <li><a>Students Management</a></li>
                                <li class="active"><a href="dashboard.php?students_data=All&status=ACTIVE">Students Records</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /header content -->


                    <!-- Toolbar -->
                    <div class="navbar navbar-default navbar-xs">
                        <ul class="nav navbar-nav visible-xs-block">
                            <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
                        </ul>

                        <div class="navbar-collapse collapse" id="navbar-filter">
                            <ul class="nav navbar-nav element-active-slate-400">
                                <?php if($fees == "ADMINISTRATOR"){ ?><li class="active"><a href="#studentfees" data-toggle="tab"><i class="icon-cash position-left"></i> Fees Invoices</a></li><?php } ?>
                                <!--<?php if(isClassTeacher($class,$stfID) == "YES"){ ?><li><a href="#studentexams" data-toggle="tab"><i class="icon-books position-left"></i> Exams Records </a></li><?php } ?>-->
                                <li><a href="#studentexams" data-toggle="tab"><i class="icon-books position-left"></i> Exams Records </a></li>
                                <li><a href="#studentparents" data-toggle="tab"><i class="icon-user-tie position-left"></i> Parents / Emergency Contacts</a></li>
                                <?php if($student == "ADMINISTRATOR"){ ?><li><a href="#updateparents" data-toggle="tab"><i class="icon-user-tie position-left"></i> Update Basic Records</a></li><?php } ?>
                            </ul>
                        </div>
                    </div>
                    <!-- /toolbar -->

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- User profile -->
                    <div class="row">
                        <div class="col-lg-2">

                            <!-- User thumbnail -->
                            <div class="thumbnail">
                                <div class="thumb thumb-rounded thumb-slide">
                                    <img src="<?php echo $seldata['img']; ?>" style="width: 100px; height: 100px;" alt="">
                                </div>

                                <div class="caption text-center">
                                    <h6 class="text-semibold no-margin"><?php echo $seldata['fname']." ".$seldata['lname']; ?> <small class="display-block"><?php echo $cid; ?></small></h6>
                                    <div style="margin-top: 10px;"><h6 class="text-semibold no-margin" style="font-weight: bold; font-size: large; color: #ff0000"><?php echo getClass($seldata['class']); ?></h6></div>
                                </div>
                            </div>
                            <!-- /user thumbnail -->

                        </div>
                        <div class="col-lg-10">
                            <div class="tabbable">
                                <div class="tab-content">
                                        <div class="tab-pane fade" id="studentexams">
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Exams Records</h6>
                                            </div>

                                            <div class="panel-body">

                                                <table class="table table-responsive table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Exam ID</th>
                                                        <th>Class</th>
                                                        <th>Term</th>
                                                        <th>Created Date</th>
                                                        <th>Status</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    //GET THE INTERNSHIP DETAILS OF THE STUDENT
                                                    $int = "SELECT * FROM exams_records WHERE stdid = '$cid'";
                                                    $intrun = $conn->query($dbcon,$int);
                                                    if($conn->sqlnum($intrun) != 0){
                                                    while($data = $conn->fetch($intrun)){
                                                        $examid = $data['examid'];
                                                        ?>
                                                        <tr>
                                                            <td><a href="dashboard.php?generated_exams=<?php echo $examid;  ?>"><?php echo $data['examid']; ?></a></td>
                                                            <td><?php echo getClass($data['class']); ?></td>
                                                            <td><?php echo $data['term']; ?></td>
                                                            <td><?php echo $data['datecreated']; ?></td>
                                                            <td><?php echo $data['status']; ?></td>

                                                        </tr>
                                                    <?php }}else{?>
                                                        <tr><td colspan="5">No Records Found</td></tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="5"><a data-toggle="modal" href="#examsheet">Generate Score Sheet</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                                <!-- /horizontal icons -->
                                            </div>
                                        </div>

                                    </div>

                                    <?php if($student == "ADMINISTRATOR"){ ?><div class="tab-pane fade" id="updateparents">
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Student Basic Information</h6>
                                            </div>

                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form method="post" enctype="multipart/form-data">
                                                            <input type="hidden" name="stdid" value="<?php echo $cid; ?>" />
                                                            <table class="table table-striped">
                                                                <tr>
                                                                    <td align="center" colspan="4">
                                                                        <label>
                                                                            <input type="file" class="form-control" style="display:none" name="stdimgupd" onchange="dispimage(this,'stdimgupd')"/>
                                                                            <span><img id="stdimgupd" src="<?php echo $seldata['img']; ?>" width="150" height="150" class="img-responsive img-rounded" /></span><br/>
                                                                            <div class="mainbold">Click To Update Image</div>
                                                                        </label>
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td align="left" colspan="4"><h5>Student Basic Details</h5></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><p style="font-weight: bold;">First Name<b class="rqd">*</b></p></td>
                                                                    <td><input type="text" class="form-control" value="<?php echo $seldata['fname']; ?>" name="fname" required/></td>
                                                                    <td align="right"><p style="font-weight: bold;">Last Name<b class="rqd">*</b></p></td>
                                                                    <td><input type="text" class="form-control" name="lname" required value="<?php echo $seldata['lname']; ?>"/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><p style="font-weight: bold;">Date Of Birth<b class="rqd">*</b></p></td>
                                                                    <td><input type="date" class="form-control" name="dob" value="<?php echo $seldata['dob']; ?>" required/></td>
                                                                    <td align="right"><p style="font-weight: bold;">Gender<b class="rqd">*</b></p></td>
                                                                    <td>
                                                                        <select class="select2-active form-control" name="stsex" required>
                                                                            <option value="<?php echo $seldata['sex']; ?>"><?php echo $seldata['sex']; ?></option>
                                                                            <option value="MALE">MALE</option>
                                                                            <option value="FEMALE">FEMALE</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><p style="font-weight: bold;">Residential Address<b class="rqd">*</b></p></td>
                                                                    <td><textarea class="form-control" name="resaddr" required rows="2"><?php echo $seldata['resaddr']; ?></textarea></td>
                                                                    <td align="right"><p style="font-weight: bold;">Contact<b class="rqd">*</b></p></td>
                                                                    <td><input type="text" class="form-control" name="contact" required value="<?php echo $seldata['contact']; ?>"/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><p style="font-weight: bold;">Fees Discount</p></td>
                                                                    <td>
                                                                        <?php $cse = "SELECT id, disc_name, percent FROM discounts WHERE status = 'ACTIVE' ORDER BY disc_name ASC";
                                                                        $cserun = $conn->query($dbcon,$cse);
                                                                        ?>
                                                                        <select class="select2-active form-control" name="discount">
                                                                            <option value="<?php echo $seldata['discid']; ?>"><?php echo getdiscname($seldata['discid']); ?></option>
                                                                            <option value=""></option>
                                                                            <?php
                                                                            while($data = $conn->fetch($cserun)){
                                                                                ?>
                                                                                <option value="<?php echo $data['id'] ?>"><?php echo $data['disc_name']." [".$data['percent']." %]"; ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </td>
                                                                    <td align="right"><p style="font-weight: bold;">E-mail</p></td>
                                                                    <td><input type="text" class="form-control" name="email" value="<?php echo $seldata['email']; ?>"/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><p style="font-weight: bold;">Status</p></td>
                                                                    <td>
                                                                        <select class="select2-active form-control" name="status" required>
                                                                            <option value="<?php echo $seldata['status']; ?>"><?php echo $seldata['status']; ?></option>
                                                                            <option value="ACTIVE">ACTIVE</option>
                                                                            <option value="INACTIVE">INACTIVE</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="4" align="center">
                                                                        <button type="submit" class="btn btn-primary" name="updatestudent">Update Student</button>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </form>

                                                    </div>
                                                </div>

                                                <!-- /horizontal icons -->
                                            </div>
                                        </div>

                                    </div><?php } ?>

                                    <?php if($fees == "ADMINISTRATOR"){ ?><div class="tab-pane fade in active" id="studentfees">

                                        <!-- Available hours -->
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Student Invoices</h6>
                                                <div class="heading-elements">
                                                    <ul class="icons-list">
                                                        <li><a data-action="collapse"></a></li>
                                                        <li><a data-action="reload"></a></li>
                                                        <li><a data-action="close"></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="panel-body">
                                                <table class="table table-responsive table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Invoice ID</th>
                                                            <th>Total Amount</th>
                                                            <th>Discount Amount</th>
                                                            <th>Fees Payable</th>
                                                            <th>Amount Paid</th>
                                                            <th>Balance</th>
                                                            <th>Class</th>
                                                            <th>Term</th>
                                                            <th>Status</th>
                                                            <th>&nbsp;</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    //GET THE INTERNSHIP DETAILS OF THE STUDENT
                                                    $int = "SELECT * FROM student_invoices WHERE stdid = '$cid' AND status !='REJECTED' ORDER BY invdate DESC";
                                                    $intrun = $conn->query($dbcon,$int);
                                                    if($conn->sqlnum($intrun) != 0){
                                                        $count=0;
                                                        $totalamount=0;
                                                        $totalpaid=0;
                                                        $totaldisc=0;
                                                    while($data = $conn->fetch($intrun)){
                                                        $count++;
                                                        $totalamount+=$data['totalamount'];
                                                        $totalpaid+=$data['paid'];
                                                        $totaldisc+=$data['discount'];
                                                        $invid=$data['invoiceid'];
                                                        ?>
                                                        <tr>
                                                            <td><a href="dashboard.php?invoice_details=<?php echo $invid; ?>"><?php echo $data['invoiceid']; ?></a></td>
                                                            <td><?php echo number_format($data['totalamount'],2); ?></td>
                                                            <td><?php echo number_format($data['discount'],2); ?></td>
                                                            <td><?php echo number_format($data['totalamount'] - $data['discount'],2); ?></td>
                                                            <td><?php echo number_format($data['paid'],2); ?></td>
                                                            <td><?php echo number_format($data['totalamount'] - ($data['paid']+$data['discount']),2); ?></td>
                                                            <td><?php echo getClass($data['classid']); ?></td>
                                                            <td><?php echo $data['term']; ?></td>
                                                            <td><?php echo $data['status']; ?></td>
                                                            <?php if($data['paid'] == 0){ ?><td><a class="btn btn-danger" onclick="recallInvoice('<?php echo $invid; ?>','<?php echo $cid; ?>','stdlist')"><span class="icon icon-trash"></span></a></td><?php } ?>

                                                        </tr>
                                                    <?php }?>
                                                        <tr style="font-weight: bold; color: #FF0000;">
                                                            <td align="right">Total</td>
                                                            <td><?php echo number_format($totalamount,2); ?></td>
                                                            <td><?php echo number_format($totaldisc,2); ?></td>
                                                            <td><?php echo number_format($totalamount - $totaldisc,2); ?></td>
                                                            <td><?php echo number_format($totalpaid,2); ?></td>
                                                            <td><?php echo number_format($totalamount - ($totalpaid+$totaldisc),2); ?></td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                            <td>&nbsp;</td>
                                                        </tr>
                                                        <?php }else{ ?>
                                                        <tr><td colspan="10">No Records Found</td></tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="10"><a data-toggle="modal" href="#studentinvoice">Generate Student Invoice</a></td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div><?php } ?>

                                    <div class="tab-pane fade" id="studentparents">

                                        <!-- Profile info -->
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Parents / Guardian Information</h6>
                                            </div>

                                            <div class="panel-body">
                                                <table class="table table-responsive table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Parent Name</th>
                                                        <th>Contact</th>
                                                        <th>Address</th>
                                                        <th>Occupation</th>
                                                        <th>Relationship</th>
                                                        <th>&nbsp;</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    //GET THE INTERNSHIP DETAILS OF THE STUDENT
                                                    $int = "SELECT * FROM student_parents WHERE stdid = '$cid'";
                                                    $intrun = $conn->query($dbcon,$int);
                                                    if($conn->sqlnum($intrun) != 0){
                                                    while($data = $conn->fetch($intrun)){
                                                        $id=$data['id'];
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $data['fname']; ?></td>
                                                            <td><?php echo $data['contact']; ?></td>
                                                            <td><?php echo $data['address']; ?></td>
                                                            <td><?php echo $data['occupation']; ?></td>
                                                            <td><?php echo $data['relation']; ?></td>
                                                            <td><?php if($student == "ADMINISTRATOR"){ ?><a class="btn btn-danger" href="dashboard.php?student_details=<?php echo $cid; ?>&removeparent=<?php echo $id; ?>"><span class="icon icon-trash"></span></a><?php } ?></td>
                                                        </tr>
                                                    <?php }}else{ ?>
                                                        <tr><td colspan="6">No Records Found</td></tr>
                                                    <?php } ?>
                                                    <?php if($student == "ADMINISTRATOR"){ ?><tr>
                                                        <td colspan="6"><a data-toggle="modal" href="#addparent">Add New Parent Record</a></td>
                                                    </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Emergency Contact Details</h6>
                                            </div>

                                            <div class="panel-body">
                                                <table class="table table-responsive table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Contact</th>
                                                        <th>Address</th>
                                                        <th>Occupation</th>
                                                        <th>&nbsp;</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    //GET THE INTERNSHIP DETAILS OF THE STUDENT
                                                    $int = "SELECT * FROM student_emergency WHERE stdid = '$cid'";
                                                    $intrun = $conn->query($dbcon,$int);
                                                    if($conn->sqlnum($intrun) != 0){
                                                        while($data = $conn->fetch($intrun)){
                                                            $id=$data['id'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $data['fname']; ?></td>
                                                                <td><?php echo $data['contact']; ?></td>
                                                                <td><?php echo $data['address']; ?></td>
                                                                <td><?php echo $data['occupation']; ?></td>
                                                                <td><?php if($student == "ADMINISTRATOR"){ ?><a class="btn btn-danger" href="dashboard.php?student_details=<?php echo $cid; ?>&removeparent=<?php echo $id; ?>"><span class="icon icon-trash"></span></a><?php } ?></td>
                                                            </tr>
                                                        <?php }}else{ ?>
                                                        <tr><td colspan="5">No Records Found</td></tr>
                                                    <?php } ?>
                                                    <?php if($student == "ADMINISTRATOR"){ ?><tr>
                                                        <td colspan="5"><a data-toggle="modal" href="#addemergency">Add Emergency Contact</a></td>
                                                    </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /profile info -->

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- /user profile -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->
            <div class="modal fade" id="addparent">
                <div class="modal-dialog">
                    <form method="post">
                        <input type="hidden" value="<?php echo $cid; ?>" name="stdid" />
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">ADD PARENT RECORD</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped">
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Full Name<b class="rqd">*</b></p></td>
                                        <td><input type="text" class="form-control" name="fname" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Contact<b class="rqd">*</b></p></td>
                                        <td><input type="text" class="form-control" name="contact" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Occupation</p></td>
                                        <td><input type="text" class="form-control" name="occupation" /></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Relationship With Child</p></td>
                                        <td>
                                            <select class="select2-search form-control" name="relation">
                                                <option value=""></option>
                                                <option value="FATHER">FATHER</option>
                                                <option value="MOTHER">MOTHER</option>
                                                <option value="GRANDPARENT">GRANDPARENT</option>
                                                <option value="GUARDIAN">GUARDIAN</option>

                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Residential Address<b class="rqd">*</b></p></td>
                                        <td><textarea class="form-control" name="resaddr" required rows="2"></textarea></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addparent">Save</button>
                            </div>
                        </div>
                    </form><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="addemergency">
                <div class="modal-dialog">
                    <form method="post">
                        <input type="hidden" value="<?php echo $cid; ?>" name="stdid" />
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">ADD EMERGENCY RECORD</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped">
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Full Name<b class="rqd">*</b></p></td>
                                        <td><input type="text" class="form-control" name="fname" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Contact<b class="rqd">*</b></p></td>
                                        <td><input type="text" class="form-control" name="contact" required/></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Occupation</p></td>
                                        <td><input type="text" class="form-control" name="occupation" /></td>
                                    </tr>
                                    <tr>
                                        <td align="right"><p style="font-weight: bold;">Residential Address<b class="rqd">*</b></p></td>
                                        <td><textarea class="form-control" name="resaddr" required rows="2"></textarea></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addemergency">Save</button>
                            </div>
                        </div>
                    </form><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>

            <div class="modal fade" id="examsheet">
                <div class="modal-dialog" style="width: 1000px">
                    <input type="hidden" id="examclass" value="<?php echo $class; ?>" />
                    <input type="hidden" id="examstdid" value="<?php echo $cid; ?>" />
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">EXAMINATION SCORE SHEET</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="maincolor" style="font-weight: bold; font-size: x-large; text-align: left;"><?php echo getClass($class); ?></p>
                                </div>
                                <div class="col-md-4">
                                    <select class="select2-active form-control" name="term" id="examyear" required>
                                        <option value="">--SELECT YEAR --</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select class="select2-active form-control" name="term" id="examterm" required>
                                        <option value="">--SELECT TERM --</option>
                                        <option value="1">FIRST TERM</option>
                                        <option value="2">SECOND TERM</option>
                                        <option value="3">THIRD TERM</option>
                                    </select>
                                </div>
                            </div>

                            <!--<div class="row" style="margin-top: 10px">
                                <div class="col-md-12">
                                    <input type="hidden" value="0" id="examcounter"/>
                                    <table class="table table-bordered dataTables-exam">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject</th>
                                            <th>Class Score</th>
                                            <th>Exam Score</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                        </thead>
                                        <tbody id="exambody">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-12"><a onclick="examScore('<?php echo $class; ?>')">Add New Scores</a> </div>
                            </div>-->
                            <div class="row" style="margin-top: 10px">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>SUBJECT</th>
                                                <th>SBA SCORE (50%)</th>
                                                <th>EXAM SCORE (50%)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $getsbj = "SELECT c.sbjid, s.sbj FROM subject_class c INNER JOIN subject s ON s.id = c.sbjid WHERE c.cid = '$class' AND s.status = 'ACTIVE'";
                                            $getsbj = $conn->query($dbcon,$getsbj);
                                            $count = 0;
                                            while($data = $conn->fetch($getsbj)){
                                                $count++;
                                        ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><input type="text" name="subjectlist[]" value="<?php echo $data['sbjid']; ?>" class="form-control hidden" readonly /> <?php echo $data['sbj']; ?> </td>
                                                <td><input type="number" name="classScore[]" value="" class="form-control" max="50.00" min="0.00" step="any" /></td>
                                                <td><input type="number" name="examScore[]" value="" class="form-control" max="50.00" min="0.00" step="any" /></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary " id="examshidden" onclick="generateExamsReport()">Generate Report</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <div class="modal fade" id="studentinvoice">
                <div class="modal-dialog" style="width: 1000px">
                    <form method="post">
                        <input type="hidden" name="cid" value="<?php echo $class; ?>" />
                        <input type="hidden" name="stdid" value="<?php echo $cid; ?>" />
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">STUDENT INVOICE</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p class="maincolor" style="font-weight: bold; font-size: x-large; text-align: left;"><?php echo getClass($class); ?></p>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="select2-active form-control" name="year" required>
                                            <option value="<?php echo date('Y'); ?>"><?php echo date("Y"); ?></option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select class="select2-active form-control" name="term"  required>
                                            <option value="">--SELECT TERM --</option>
                                            <option value="1">FIRST TERM</option>
                                            <option value="2">SECOND TERM</option>
                                            <option value="3">THIRD TERM</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row" style="margin-top: 10px">
                                    <div class="col-md-12">
                                        <input type="hidden" value="0" id="invoicecounter"/>
                                        <table class="table table-bordered dataTables-invoice">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Fees</th>
                                                <th>Amount</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody id="invoicebody">

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12"><a onclick="studentInvoice()">Add New Fees</a> </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary hidden" id="invoicehidden" name="generatestudentinvoice">Generate Invoice</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
            <?php $conn->close($dbcon);}elseif (isset($_GET['account_det'])) {
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            ?>
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
                    <div class="profile-cover-img" style="background-image: url('assets/images/backgrounds/bg.jpg')"></div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#" class="profile-thumb">
                                <img src="<?php echo $img; ?>" alt="" class="img-circle img-responsive">
                            </a>
                        </div>

                        <div class="media-body">
                            <h1 style="color: #ffffff; font-weight: bold;"><?php echo $fname . " " . $lname; ?>
                                <small class="display-block" style="color: #ffffff"><?php echo getPosition($stposition); ?></small>
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
                                                                               name="newPass" onkeyup="checkpass(this.value)"
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
        <?php }elseif (isset($_GET['showPV'])) {
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $pvid = $_GET['showPV'];
            $pvdet = "SELECT * FROM pv_detail WHERE pv_id='$pvid'";
            $pvdetRun = $conn->query($dbcon, $pvdet);
            $pvData = $conn->fetch($pvdetRun);
            $status = $pvData['status'];
            ?>
            <!-- Invoice template -->
            <div class="panel panel-white" style="margin: 2%">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6"><h6>Payment Voucher</h6>
                        </div>
                        <div class="col-md-6" align="right"><h6>PV#: <?php echo $pvid; ?></h6>
                        </div>
                    </div>
                </div>

                <div class="panel-body no-padding-bottom">
                    <form method="post">
                        <div class="row" style="border: thin #0D47A1 solid; margin: 1%; padding: 1%; background-color: #e4f5ff">
                            <div class="col-md-6">
                                <input type="hidden" name="confpvid" value="<?php echo $pvid; ?>"/>
                                <input type="hidden" name="chq" id='dchq' value="no"/>
                                <button type="button" class="btn btn-primary btn-xs heading-btn" data-toggle="modal"
                                        data-target="#pvdocument"><i class="icon-printer position-left"></i> Upload Document
                                </button>
                                &nbsp;<!--&nbsp;<input type="checkbox" onchange="chqadd()" id='chqq'/>Cheque Issued?-->
                                <input type="text" name="chqno" placeholder="Cheque Number" class="hidden" id="chqno"/>

                            </div>
                            <div class="col-md-6" align="right">
                                <button type="submit" class="btn btn-warning btn-xs heading-btn" name="confirmpv"><i
                                            class="icon-file-check position-left"></i> Proceed
                                </button>
                                <button type="submit" class="btn btn-success btn-xs heading-btn" name="cancelpv"><i
                                            class="icon-printer position-left"></i> Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="row" style="border: thin #0D47A1 solid; margin: 1%; padding: 1%; background-color: #fff5df">
                        <div class="col-md-12">
                            <div class="row">
                                <label>DOCUMENT(S)</label><br/>
                                <?php
                                $docqry = "SELECT fname, id FROM pvdoc WHERE pv_id='$pvid' AND doctype='doc'";
                                $docrun = $conn->query($dbcon,$docqry);

                                while ($data = $conn->fetch($docrun)) {
                                    $url = $data['fname'];
                                    $id = $data['id'];
                                    $fullurl= "assets/data/pvdocs/".$url;
                                    ?>
                                    <div class="col-md-4">
                                        <a onclick="viewpdf('<?php echo $fullurl; ?>')"><?php echo $url; ?></a>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="border: thin #0D47A1 solid; margin: 1%; padding: 1%; background-color: #d7ffcd">

                        <div class="col-md-8 col-lg-8 col-sm-6 col-xs-6 content-group" style="border-right: #ff0000 thin solid">
                            <span class="text-muted"><h5>Applicant:</h5></span>
                            <ul class="list-condensed list-unstyled">
                                <li><?php echo checkName($pvData['stfid']); ?></li>
                            </ul>
                            <span class="text-muted"><h5>Beneficiary:</h5></span>
                            <ul class="list-condensed list-unstyled">
                                <li><?php echo $pvData['supplier'];?>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xs-6  content-group">
                            <ul class="list-condensed list-unstyled invoice-payment-details">
                                <li>Date: <span class="text-right text-semibold"><?php $pvdate = $pvData['app_date'];
                                        echo date("l, d M, Y H:i:s A", strtotime(date($pvdate))); ?></span></li>
                            </ul>
                            <ul class="list-condensed list-unstyled invoice-payment-details">

                                <li>Total Amount: <span
                                            class="text-right text-semibold">&cent;<?php echo number_format($pvData['total'],2); ?></span>
                                </li>
                                <li>Cheque Number: <span class="text-right text-semibold"><?php echo $pvData['chekno']; ?></span>
                                </li>
                                <li>Expense Class: <span class="text-right text-semibold"><?php  echo getExp($pvData['expense_class']); ?></span>
                                </li>
                            </ul>

                        </div>

                    </div>

                    <div class="row" style="border: thin #0D47A1 solid; margin: 1%; padding: 1%;">
                        <div class="col-md-12">
                            <h4>ITEMS LIST</h4>
                            <div class="table-responsive">
                                <table class="table table-lg table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
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
                                            <td><?php echo $pvdetData['description']; ?></td>
                                            <td>&cent;<?php echo number_format($pvdetData['total'], 2); ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><p style="color:#0a68b4 ; font-weight: bold;">Total</p></td>
                                        <td>
                                            <p style="color:#0a68b4 ; font-weight: bold;">&cent;<?php echo number_format($total, 2); ?></p>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                            <form method="post" enctype="multipart/form-data" onsubmit="return checkpdf(this)">
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
                                                       style="font-size: small; color: #0a68b4;text-align: center;"><i>File should be in pdf or image formats and not more than 5 MB.</i></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" align="center">
                                                    <button type="submit" class="btn btn-success"><span class="icon icon-upload10"></span>Upload</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </form>
                            <div id="loadr" class="hidden" align="center">
                                <img src="assets/images/loader.gif" class="img-responsive"/>
                                <p>Processing Company Information.....</p>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MODAL -->
            <!-- /invoice template -->
        <?php $conn->close($dbcon);}elseif (isset($_GET['generalfeesreport'])) {
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $stdate = $_GET['pvrepsd'];
            $enddate = $_GET['pvreped'];
            $method = $_GET['payment_method'];
            $desc = "";
            $qry="";
            if($method == "ALL"){
                $desc="Fees Payment From ".date("l, d M, Y", strtotime(date($stdate)))." To ".date("l, d M, Y", strtotime(date($enddate)));
                $qry = "SELECT s.stdid, s.totalamount, s.paid, p.paydate, p.amount, p.balance, p.invoiceid, p.pay_method FROM invoice_payment p INNER JOIN student_invoices s ON s.invoiceid = p.invoiceid WHERE p.paydate BETWEEN '$stdate 00:00:00' AND '$enddate 23:59:59' ORDER BY p.paydate, s.stdid ASC";
            }else{
                $desc="$method Payment From ".date("l, d M, Y", strtotime(date($stdate)))." To ".date("l, d M, Y", strtotime(date($enddate)));
                $qry = "SELECT s.stdid, s.totalamount, s.paid, p.paydate, p.amount, p.balance, p.invoiceid, p.pay_method FROM invoice_payment p INNER JOIN student_invoices s ON s.invoiceid = p.invoiceid WHERE p.pay_method = '$method' AND p.paydate BETWEEN '$stdate 00:00:00' AND '$enddate 23:59:59' ORDER BY p.paydate, s.stdid ASC";
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
                                <img src="<?php echo $clogo; ?>" class="content-group mt-10" alt="" style="width: 90px;">
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
                                <p style='text-align: center; font-weight: bolder; font-size: medium; text-decoration: underline'><span class="text-semibold"><?php echo $desc; ?></span></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Student ID</th>
                                        <th>Student Name</th>
                                        <th>Invoice</th>
                                        <th>Amount Paid</th>
                                        <th>Payment Method</th>
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
                                                <?php echo $items['invoiceid']; ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($amount, 2); ?>
                                            </td>
                                            <td>
                                                <?php echo $items['pay_method']; ?>
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
        <?php $conn->close($dbcon);}elseif(isset($_GET['staff_details'])){
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            $cid=$_GET['staff_details'];
            $selstf = "SELECT * FROM staff WHERE stfid='$cid'";
            $selstfrun = $conn->query($dbcon,$selstf);
            $seldata = $conn->fetch($selstfrun);
            $stfid = $seldata['stfid'];
            $img = $seldata['img'];
            ?>
            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">

                    <!-- Header content -->
                    <div class="page-header-content">
                        <div class="page-title">
                            <h3><i class="icon-user position-left"></i> <span class="text-semibold">STAFF</span> DETAILS</h3>

                            <ul class="breadcrumb position-right">
                                <li><a>Staff Management</a></li>
                                <li class="active"><a href="dashboard.php?staff_data">Staff Record</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /header content -->


                    <!-- Toolbar -->
                    <div class="navbar navbar-default navbar-xs">
                        <ul class="nav navbar-nav visible-xs-block">
                            <li class="full-width text-center"><a data-toggle="collapse" data-target="#navbar-filter"><i class="icon-menu7"></i></a></li>
                        </ul>

                        <div class="navbar-collapse collapse" id="navbar-filter">
                            <ul class="nav navbar-nav element-active-slate-400">
                                <li class="active"><a href="#accessrights" data-toggle="tab"><i class="icon-cash position-left"></i> Access Rights</a></li>
                                <li><a href="#staffupdate" data-toggle="tab"><i class="icon-cash position-left"></i> Update Records</a></li>
                                <!--<li><a href="#staffpayroll" data-toggle="tab"><i class="icon-books position-left"></i> Payslips <span class="badge badge-success badge-inline position-right">32</span></a></li>-->
                            </ul>
                        </div>
                    </div>
                    <!-- /toolbar -->

                </div>
                <!-- /page header -->


                <!-- Content area -->
                <div class="content">

                    <!-- User profile -->
                    <div class="row">
                        <div class="col-lg-3">

                            <!-- User thumbnail -->
                            <div class="thumbnail">
                                <div class="thumb thumb-rounded thumb-slide">
                                    <img src="<?php echo $seldata['img']; ?>" alt="">
                                </div>

                                <div class="caption text-center">
                                    <h6 class="text-semibold no-margin"><?php echo $seldata['fname']." ".$seldata['lname']; ?> <small class="display-block"><?php echo $cid; ?></small></h6>
                                    <div style="margin-top: 10px;"><h6 class="text-semibold no-margin" style="font-weight: bold; font-size: large; color: #ff0000"><?php echo getPosition($seldata['post']); ?></h6></div>
                                </div>
                            </div>
                            <!-- /user thumbnail -->

                        </div>
                        <div class="col-lg-9">
                            <div class="tabbable">
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="staffupdate">
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Staff Records Update</h6>
                                            </div>

                                            <div class="panel-body">

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-white">
                                                            <form method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="stfid" value="<?php echo $seldata['stfid']; ?>" />
                                                                <table class="table table-striped">
                                                                <tr>
                                                                    <td align="center" colspan="4">
                                                                        <label>
                                                                            <input type="file" class="form-control" style="display:none" name="stfimgupd" onchange="dispimage(this,'stfimgupd')"/>
                                                                            <span><img id="stfimgupd" src="<?php echo $img; ?>" width="150" height="150" class="img-responsive img-rounded" /></span><br/>
                                                                            <div class="mainbold">Click To Update Image</div>
                                                                        </label>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><p style="font-weight: bold;">Title<b class="rqd">*</b></p></td>
                                                                    <td>
                                                                        <select class="select2-active form-control" name="sttitle" required>
                                                                            <option value="<?php echo $seldata['sttitle']; ?>"><?php echo $seldata['sttitle']; ?></option>
                                                                            <option value="MR">MR</option>
                                                                            <option value="MRS">MRS</option>
                                                                            <option value="MISS">MISS</option>
                                                                            <option value="OTHER">OTHER</option>
                                                                        </select>
                                                                    </td>
                                                                    <td align="right"><p style="font-weight: bold;">First Name<b class="rqd">*</b></p></td>
                                                                    <td><input type="text" class="form-control" name="fname" required value="<?php echo $seldata['fname']; ?>" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><p style="font-weight: bold;">Last Name<b class="rqd">*</b></p></td>
                                                                    <td><input type="text" class="form-control" name="lname" required value="<?php echo $seldata['lname']; ?>"/></td>
                                                                    <td align="right"><p style="font-weight: bold;">Date Of Birth<b class="rqd">*</b></p></td>
                                                                    <td><input type="date" class="form-control" name="dob" value="<?php echo $seldata['dob']; ?>" required/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><p style="font-weight: bold;">Gender<b class="rqd">*</b></p></td>
                                                                    <td>
                                                                        <select class="select2-active form-control" name="stsex"  required>
                                                                            <option value="<?php echo $seldata['sex']; ?>"><?php echo $seldata['sex']; ?></option>
                                                                            <option value="MALE">MALE</option>
                                                                            <option value="FEMALE">FEMALE</option>
                                                                        </select>
                                                                    </td>
                                                                    <td align="right"><p style="font-weight: bold;">Residential Address</p></td>
                                                                    <td><textarea class="form-control" name="resaddr" rows="2""><?php echo $seldata['resaddr']; ?></textarea></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><p style="font-weight: bold;">Contact<b class="rqd">*</b></p></td>
                                                                    <td><input type="text" class="form-control" name="contact" required value="<?php echo $seldata['contact']; ?>" /></td>
                                                                    <td align="right"><p style="font-weight: bold;">E-mail</p></td>
                                                                    <td><input type="text" class="form-control" name="email" value="<?php echo $seldata['email']; ?>"/></td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="right"><p style="font-weight: bold;">Position<b class="rqd">*</b></p></td>
                                                                    <td>
                                                                        <?php
                                                                        $cse = "SELECT post_name, id FROM positions WHERE status = 'Active'";
                                                                        $cserun = $conn->query($dbcon,$cse);
                                                                        ?>
                                                                        <select class="select2-active form-control" name="post" required>
                                                                            <option value="<?php echo $seldata['post']; ?>"><?php echo getPosition($seldata['post']); ?></option>
                                                                            <?php
                                                                            while($data = $conn->fetch($cserun)){
                                                                                ?>
                                                                                <option value="<?php echo $data['id'] ?>"><?php echo $data['post_name'] ?></option>
                                                                            <?php }$conn->close($dbcon); ?>
                                                                        </select>
                                                                    </td>
                                                                    <td align="right"><p style="font-weight: bold;">Status<b class="rqd">*</b></p></td>
                                                                    <td>
                                                                        <select class="select2-active form-control" name="status" required>
                                                                            <option value="<?php echo $seldata['status']; ?>"><?php echo $seldata['status']; ?></option>
                                                                            <option value="ACTIVE">ACTIVE</option>
                                                                            <option value="INACTIVE">INACTIVE</option>
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td align="center" colspan="4"><button type="submit" class="btn btn-primary" name="updatestaff">UPDATE STAFF</button></td>
                                                                </tr>
                                                            </table>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /horizontal icons -->
                                            </div>
                                        </div>

                                    </div>


                                    <div class="tab-pane fade in active" id="accessrights">

                                        <!-- Available hours -->
                                        <div class="panel panel-flat">
                                            <div class="panel-heading">
                                                <h6 class="panel-title">Staff Access Control</h6>
                                            </div>

                                            <div class="panel-body">
                                                <form method="post">
                                                    <input type="hidden" name="stfaccess" value="<?php echo $seldata['stfid']; ?>" />
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-white">
                                                            <div class="row" style="margin: 1%;">
                                                                <div class="col-md-3">
                                                                    Bank Deposits
                                                                    <div class="form-group has-feedback has-feedback-left">
                                                                        <select class="form-control input-lg" name="bank">
                                                                            <option value="<?php echo $seldata['bank']; ?>"><?php echo $seldata['bank']; ?></option>
                                                                            <option value=""></option>
                                                                            <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                                                        </select>
                                                                        <div class="form-control-feedback" style="background-color: #032372; color: #FFF">
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
                                                                            <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                                                        </select>
                                                                        <div class="form-control-feedback" style="background-color: #032372; color: #FFF">
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
                                                                            <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                                                        </select>
                                                                        <div class="form-control-feedback" style="background-color: #032372; color: #FFF">
                                                                            <i class="icon-cash4"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Payment Voucher
                                                                    <div class="form-group has-feedback has-feedback-left">
                                                                        <select class="form-control input-lg" name="pv">
                                                                            <option value="<?php echo $seldata['pv']; ?>"><?php echo $seldata['pv']; ?></option>
                                                                            <option value=""></option>
                                                                            <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                                                        </select>
                                                                        <div class="form-control-feedback" style="background-color: #032372; color: #FFF">
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
                                                                            <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                                                        </select>
                                                                        <div class="form-control-feedback" style="background-color: #032372; color: #FFF">
                                                                            <i class="icon-users2"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Students Management
                                                                    <div class="form-group has-feedback has-feedback-left">
                                                                        <select class="form-control input-lg" name="stdmgt">
                                                                            <option value="<?php echo $seldata['stdmgt']; ?>"><?php echo $seldata['stdmgt']; ?></option>
                                                                            <option value=""></option>
                                                                            <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                                                        </select>
                                                                        <div class="form-control-feedback" style="background-color: #032372; color: #FFF">
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
                                                                            <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                                                        </select>
                                                                        <div class="form-control-feedback" style="background-color: #032372; color: #FFF">
                                                                            <i class="icon-cog52"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    Sales Management
                                                                    <div class="form-group has-feedback has-feedback-left">
                                                                        <select class="form-control input-lg" name="sales">
                                                                            <option value="<?php echo $seldata['sales']; ?>"><?php echo $seldata['sales']; ?></option>
                                                                            <option value=""></option>
                                                                            <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                                                        </select>
                                                                        <div class="form-control-feedback" style="background-color: #032372; color: #FFF">
                                                                            <i class="icon-cog52"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row" style="margin: 2%;">
                                                                <div class="col-md-12" align="center">
                                                                    <button class="btn btn-lg btn-success" type="submit"><span class="icon icon-database-upload"></span> Update Access Right</button>
                                                                </div>
                                                            </div>
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
                    <!-- /user profile -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->
            <?php $conn->close($dbcon);}else {
            $conn=new Db_connect;
            $dbcon=$conn->conn();
            ?>
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
                        <?php if($student == "ADMINISTRATOR"){ ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <!-- Current server load -->
                            <div class="panel bg-pink-400">
                                <div class="panel-body">
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="dashboard.php?students_data=All&status=ACTIVE"><i class="icon-sync"></i> View Records</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="no-margin"><?php echo getActiveStudents(); ?></h3>
                                    Total Active Students
                                </div>
                            </div>
                            <!-- /current server load -->
                        </div>
                        <?php } ?>
                        <?php if($staff == "ADMINISTRATOR"){ ?>


                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <!-- Current server load -->
                            <div class="panel bg-danger-400">
                                <div class="panel-body">
                                    <div class="heading-elements">
                                        <?php
                                        ?> <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="dashboard.php?staff_data"><i class="icon-sync"></i> View Records</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="no-margin"><?php echo getActiveStaff(); ?></h3>
                                    Total Staff
                                </div>

                                <div id="server-load"></div>
                            </div>
                            <!-- /current server load -->
                        </div>
                        <?php } ?>
                        <?php
                        if($fees == "ADMINISTRATOR"){
                        ?>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <!-- Current server load -->
                            <div class="panel bg-blue-400">
                                <div class="panel-body">
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="#"><i class="icon-sync"></i> View Records</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="no-margin">&cent; <?php echo getTotalPayments(); ?></h3>
                                    Total Payments
                                </div>
                            </div>
                            <!-- /current server load -->
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <!-- Current server load -->
                            <div class="panel bg-brown-400">
                                <div class="panel-body">
                                    <div class="heading-elements">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    <li><a href="dashboard.php?students_arrears"><i class="icon-sync"></i> View Records</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <h3 class="no-margin">&cent; <?php echo getTotalArrears(); ?></h3>
                                    Total Arrears
                                </div>
                            </div>
                            <!-- /current server load -->
                        </div>

                            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                <!-- Current server load -->
                                <div class="panel bg-green-300">
                                    <div class="panel-body">
                                        <div class="heading-elements">
                                            <ul class="icons-list">
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog3"></i> <span class="caret"></span></a>
                                                    <ul class="dropdown-menu dropdown-menu-right">
                                                        <li><a href="#"><i class="icon-sync"></i> View Records</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                        <h3 class="no-margin">&cent; <?php echo getDailySales(); ?></h3>
                                        Daily Cash Sales
                                    </div>
                                </div>
                                <!-- /current server load -->
                            </div>
                        <?php }?>
                    </div>
                    <!-- /quick stats boxes -->
                    <div class="row">
                        <?php if ($fees == "ADMINISTRATOR"){ ?>
                            <div class="col-md-12">
                                <!-- Daily sales -->
                                <div class="panel panel-flat">
                                    <div class="panel-heading">
                                        <h6 class="panel-title">Daily Fees Payment Chart</h6>
                                    </div>

                                    <div class="panel-body">
                                        <?php
                                        $filename = barGraph($stfID);
                                        if(!empty($filename)){
                                            ?>
                                            <div class="row row-bg">
                                                <div class="col-md-12">
                                                    <img src="<?php echo $filename; ?>" class="img-responsive"/>
                                                </div>
                                            </div>
                                            <?php
                                        }?>
                                    </div>
                                </div>
                                <!-- /daily sales -->
                            </div>
                        <?php } ?>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Staff Birthdays -->
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">Staff Birthdays This Month</h6>
                                        </div>

                                        <div class="table-responsive">

                                            <table class="table text-nowrap">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Image</th>
                                                    <th>Staff Name</th>
                                                    <th>Position</th>
                                                    <th>Date Of Birth</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $rQry = "SELECT stfid, fname, lname, dob, img, post FROM staff WHERE  status  ='ACTIVE' AND dob LIKE '%-$Currmonth-%' ORDER BY DAY(dob) ASC";
                                                $rQryRun = $conn->query($dbcon, $rQry);
                                                $count=0;
                                                while ($data = mysqli_fetch_array($rQryRun)) {
                                                    $count++;
                                                    $stdid = $data['stfid'];
                                                    $fname = $data['fname'];
                                                    $lname = $data['lname'];
                                                    $dob = $data['dob'];
                                                    $img = $data['img'];
                                                    $post = $data['post'];
                                                    $strdob = strtotime(date($dob));
                                                    $mmdob = date("d M", $strdob);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $count; ?></td>
                                                        <td><img src="<?php echo $img; ?>" class="img-responsive img-circle" style="width: 50px; height: 50px" /></td>
                                                        <td><?php echo $fname . ' ' . $lname; ?></td>
                                                        <td><?php echo getPosition($post); ?></td>
                                                        <td><?php echo $mmdob; ?></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /staff birthdays -->
                                </div>
                                <div class="col-md-12">
                                    <!-- Staff Birthdays -->
                                    <div class="panel panel-flat">
                                        <div class="panel-heading">
                                            <h6 class="panel-title">Total Students Per Class</h6>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table text-nowrap">
                                                <thead>
                                                <tr>
                                                    <th>Class Name</th>
                                                    <th>Total Students</th>
                                                    <th>Class Teacher</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sel="SELECT cname, id FROM classes ORDER BY cname ASC";
                                                $selrun=$conn->query($dbcon,$sel);
                                                if($conn->sqlnum($selrun) != 0){
                                                    while($data = $conn->fetch($selrun)){
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <span class="text-muted text-size-small"><?php echo getClass($data['id']); ?></span>
                                                            </td>
                                                            <td>
                                                                <h6 class="text-semibold no-margin"><?php echo getStudentCount($data['id']); ?></h6>
                                                            </td>
                                                            <td><?php echo getStaff(getClassTeacher($data['id'])); ?></td>

                                                        </tr>
                                                    <?php }}else{ ?>
                                                    <tr>
                                                        <td colspan="3">No Records Found</td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /staff birthdays -->
                                </div>
                            </div>
                            <!-- Daily sales -->

                        </div>
                        <?php
                        if($student == "ADMINISTRATOR"){
                        ?>
                        <div class="col-md-6">
                            <!-- Daily sales -->
                            <!-- Staff Birthdays -->
                            <div class="panel panel-flat">
                                <div class="panel-heading">
                                    <h6 class="panel-title">Student Birthdays This Month</h6>
                                </div>

                                <div class="table-responsive">

                                    <table class="table text-nowrap">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Student Name</th>
                                            <th>Class</th>
                                            <th>Date Of Birth</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $rQry = "SELECT stdid, fname, lname, dob, img, class FROM students WHERE  status  ='ACTIVE' AND dob LIKE '%-$Currmonth-%' ORDER BY DAY(dob) ASC";
                                        $rQryRun = $conn->query($dbcon, $rQry);
                                        $count=0;
                                        while ($data = mysqli_fetch_array($rQryRun)) {
                                            $count++;
                                            $stdid = $data['stdid'];
                                            $fname = $data['fname'];
                                            $lname = $data['lname'];
                                            $dob = $data['dob'];
                                            $img = $data['img'];
                                            $class = $data['class'];
                                            $strdob = strtotime(date($dob));
                                            $mmdob = date("d M", $strdob);
                                            ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td><img src="<?php echo $img; ?>" class="img-responsive img-circle" style="width: 50px; height: 50px" /></td>
                                                <td><?php echo $fname . ' ' . $lname; ?></td>
                                                <td><?php echo getClass($class); ?></td>
                                                <td><?php echo $mmdob; ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /daily sales -->
                        </div>
                        <?php } ?>
                    </div>

                </div>
                <!-- /content area -->

            </div>
        <?php $conn->close($dbcon);} ?>
        <!-- /ERROR MODALS -->
    </div>
    <!-- /page container -->
    <?php include("includes/modal.php"); ?>
    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
                            <!-- DESKTOP NOTIFICATION DEPENDENCIES -->
                            <!-- <script src="//code.jquery.com/jquery-3.1.0.min.js"></script>-->
<script src="assets/js/easyNotify.js"></script>
<script src="assets/js/main.js"></script>

<script>

    $("#select-all").click(function(event){
        if(this.checked){
            $(':checkbox').each(function(){
                this.checked = true;
            });
        }else{
            $(':checkbox').each(function(){
                this.checked = false;
            });
        }
    });

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


    /* END OF SCHOOL MANAGEMENT JS */
    var title = "";
    var dmessage = "";
    var notifyid = $("#notifyid").val();

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

                if(lastlogin < 1800){
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



    printDivCSS = new String ('<link href="myprintstyle.css" rel="stylesheet" type="text/css">')
    function printDiv(divId) {
        window.frames["print_frame"].document.body.innerHTML=printDivCSS + document.getElementById(divId).innerHTML;
        window.frames["print_frame"].window.focus();
        window.frames["print_frame"].window.print();
    }
</script>
</body>
</html>

