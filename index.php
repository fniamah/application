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
$conn->close($dbcon);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $cname; ?> | Login Page</title>

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

<body style="background-image: url('assets/images/backgrounds/bgg.jpg'); background-repeat: no-repeat; height: 100%; background-position: center; background-size: cover">

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
                    <div class="panel panel-body login-form" style="border: solid #ff0000">
                        <div class="text-center">
                            <div class="border-slate-300 text-slate-300" align="center"><img src="<?php echo $clogo; ?>" class="img-responsive" style="width: 100px; height: 100px;"/></div>
                            <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>
                        </div>
                        <?php if($exist=="yes"){?>
                            <div class="alert alert-danger alert-styled-left alert-bordered" align="center">
                                <span class="text-semibold">Error!</span> Wrong Log In Details. <a class="alert-link">Try again</a>.
                            </div>
                        <?php }?>
                        <div class="form-group has-feedback has-feedback-left">
                            <input type="text" class="form-control" placeholder="Username" name="username" id="username">
                            <div class="form-control-feedback">
                                <i class="icon-user text-muted" style="color: #FF0000;"></i>
                            </div>
                        </div>

                        <div class="form-group has-feedback has-feedback-left">
                            <input type="password" class="form-control" placeholder="Password" name="password">
                            <div class="form-control-feedback">
                                <i class="icon-lock2 text-muted" style="color: #FF0000;"></i>
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
                            <input type="submit" class="btn btn-block" value="Login" name="login" style="background-color: #FF0000; color: #FFF;">
                        </div>
                        <div class="text-center">
                            <a onclick="validateStfid()">Forgot password?</a>
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
    <div id="loader" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" style="width: 400px; height: 50px;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <img src="assets/images/spinner.gif" class="img-responsive" style="width: 50px; height: 50px;"/>
                        </div>
                        <div class="col-md-12" style="text-align: center;">
                            <p id="loadermsg"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="otp" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" style="width: 400px; height: 50px;">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <input type="text" class="form-control hidden" id="validid"/>
                            Enter Your 4 Digit Numbers Sent To Your Phone <input type="text" class="form-control" id="otpp"/>
                            <button class="btn btn-success" onclick="validateotp()">Validate</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page container -->
<script type="text/javascript">

    function validateotp() {
        $("#loader").modal("show");
        $("#loadermsg").text("Validating OTP...");
        var otp = $("#otpp").val();
        var stfid = $("#validid").val();
        console.log(otp);
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "validateOtp="+otp+"&stfid="+stfid,
            success: function (data) {
                $("#loader").modal("hide");
                var result = $.parseJSON(data);
                var msg = result['msg'];
                var code = result['code'];
                if(code == 0){
                    var url = "password_recover.php?otp="+otp+"&stfid="+stfid;
                    window.location.replace(url);
                }else{
                    alert("Wrong OTP Entered. Please enter the 4 digit numbers sent to your phone");
                }
            },
            error: function (xhr, desc, err) {
                alert(err);
                return false;
            }
        });

    }

    function validateStfid(){
        var stfid = $("#username").val();
        if(stfid === null || stfid ===""){
            alert("Please enter your username and click the forgot password button again");
        }else{
            $("#loader").modal("show");
            $("#loadermsg").text("Sending Four Digit Reset Code Via SMS. Please Wait...");
            $.ajax({
                type: "post",
                url: "ajax/beneficiary.php",
                data: "validateStfid="+stfid,
                success: function (data) {
                    $("#loader").modal("hide");
                    console.log(data);
                    var result = $.parseJSON(data);
                    var msg = result['msg'];
                    var code = result['code'];
                    if(code == 0){
                        //DISPLAY OTP MODAL
                        $("#otp").modal("show");
                        $("#validid").val(stfid);
                    }else{
                        alert("The username does not exist.");
                    }
                    /*var url = "dashboard.php?bulksms";
                    window.location.replace(url);
                    console.log(data);*/
                },
                error: function (xhr, desc, err) {
                    alert(err);
                    return false;
                }
            });
        }
    }
</script>

</body>
</html>
