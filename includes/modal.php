<div class="modal fade" id="company">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">SCHOOL INFORMATION</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <!--<tr>
                            <td align="center" colspan="2" id="compimg"><img id="schoolimg" src="assets/images/defaults/noimage.jpg" style="width: 300px; height: 200px"/><p>Company Logo</p></td>
                        </tr>-->
                        <tr>
                            <td align="center" colspan="2">
                                <label>
                                    <input type="file" class="form-control" style="display:none" name="clogo" onchange="dispimage(this,'schoolimg')"/>
                                    <span id="compimg"><img id="schoolimg" src="assets/images/defaults/noimage.jpg" width="150" height="150" class="img-responsive img-rounded" /></span><br/>
                                    <div class="mainbold">Click To Upload Logo</div>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Name Of School <b class="rqd">*</b></p></td>
                            <td><input type="text" class="form-control" name="cname" id="cname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Phone Number <b class="rqd">*</b></p></td>
                            <td><input type="text" class="form-control" name="ccont" id="ccont" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">E-mail</p></td>
                            <td><input type="text" class="form-control" name="cmail" id="cmail"/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Location</p></td>
                            <td><input type="text" class="form-control" name="cloc" id="cloc" /></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Address</p></td>
                            <td><textarea maxlength="100" name="caddr" rows="3" class="form-control" id="caddr"></textarea></td>
                        </tr>
                        <!--<tr>
                            <td align="right"><p style="font-weight: bold;">Logo</p></td>
                            <td><input type="file" class="form-control" name="clogo" onchange="dispimage(this,'schoolimg')"/></td>
                        </tr>-->
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Tag Line</p></td>
                            <td><input type="text" class="form-control" name="tag" id="tag" /></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="coursereg">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ADD NEW CLASS</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Class Name</p></td>
                            <td><input type="text" class="form-control" name="cname" required/></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="addclass">Save</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="updcoursereg">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <input type="hidden" name="cid" id="cidupd"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">CLASS UPDATE</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Class Name</p></td>
                            <td><input type="text" class="form-control" id="csename" name="cname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Status</p></td>
                            <td>
                                <select class="form-control" name="status">
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="INACTIVE">INACTIVE</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="updclass">Update Class</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

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
                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4" align="center">
                        <img src="assets/images/logout.png" class="img-responsive" style="width: 70px; height: 70px;"/>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8" style="text-align: center;">
                        <div class="row">
                            <div class="col-md-12"><p>Are You Sure You Want To Log Out?</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" align="right"><a class="btn btn-sm btn-danger" href="index.php">YES</a></div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6" align="left"><a class="btn btn-sm btn-success close" data-dismiss="modal">NO</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="trans_details">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div id="transfershow"></div>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div>

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

<div class="modal fade" id="subjectreg">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ADD NEW SUBJECT</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Subject Name</p></td>
                            <td><input type="text" class="form-control" name="sbj" required/></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="addsubject">Save</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="discounts">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ADD NEW DISCOUNT</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Discount Name</p></td>
                            <td><input type="text" class="form-control" name="discname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Percentage</p></td>
                            <td><input type="number" class="form-control" name="percent" step="any" min="0" max="100" required/></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="adddiscount">Save</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="discountedit">
    <div class="modal-dialog">
        <form method="post" id="userreg">
            <input type="hidden" name="discid" id="discid"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">EDIT DISCOUNT</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Discount Name</p></td>
                            <td><input type="text" class="form-control" name="discname" id="discname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Percentage</p></td>
                            <td><input type="number" class="form-control" name="percent" id="percent" step="any" min="0" max="100" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Status</p></td>
                            <td>
                                <select class="form-control" name="dstatus" id="dstatus">
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="INACTIVE">INACTIVE</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="editdiscount">Update</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="staffpost">
    <div class="modal-dialog">
        <form method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ADD STAFF POSITION</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Position Name</p></td>
                            <td><input type="text" class="form-control" name="postname" required/></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="addposition">Save</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="subjectupd">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <input type="hidden" name="sbjid" id="sbjupdid"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">UPDATE SUBJECT</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Subject Name</p></td>
                            <td><input type="text" class="form-control" id="sbjnameupd" name="sbj" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Status</p></td>
                            <td>
                                <select class="form-control" name="status">
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="INACTIVE">INACTIVE</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="updatesubject">Update Subject</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="feesupd">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <input type="hidden" name="feeid" id="feeupdid"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">UPDATE FEES</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">FEE Name</p></td>
                            <td><input type="text" class="form-control" id="feeupdname" name="feename" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Status</p></td>
                            <td>
                                <select class="form-control" name="status">
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="INACTIVE">INACTIVE</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="updatefees">Update Fees</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="feesadd">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ADD NEW FEES COMPONENT</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Fees Name</p></td>
                            <td><input type="text" class="form-control" name="feename" required/></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="addfees">Save</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="invoicegen">
    <div class="modal-dialog">
        <form method="get">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">INVOICE GENERATOR</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Class<b class="rqd">*</b></p></td>
                            <td>
                                <?php
                                $conn=new Db_connect;
                                $dbcon=$conn->conn();
                                $cse = "SELECT id, cname FROM classes WHERE status = 'ACTIVE' ORDER BY cname ASC";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="class" required>
                                    <option value=""></option>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['cname'] ?></option>
                                    <?php }$conn->close($dbcon); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Term<b class="rqd">*</b></p></td>
                            <td>
                                <select class="select2-active form-control" name="term" required>
                                    <option value="1">FIRST TERM</option>
                                    <option value="2">SECOND TERM</option>
                                    <option value="3">THIRD TERM</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="invoice_generator">Generate List</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="classfeesreport">
    <div class="modal-dialog">
        <form method="get">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">CLASS INVOICES REPORT</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Class<b class="rqd">*</b></p></td>
                            <td>
                                <?php
                                $conn=new Db_connect;
                                $dbcon=$conn->conn();
                                $cse = "SELECT id, cname FROM classes WHERE status = 'ACTIVE' ORDER BY cname ASC";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="class" required>
                                    <option value="ALL">ALL</option>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['cname'] ?></option>
                                    <?php }$conn->close($dbcon); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Term<b class="rqd">*</b></p></td>
                            <td>
                                <select class="select2-active form-control" name="term" required>
                                    <option value="1">FIRST TERM</option>
                                    <option value="2">SECOND TERM</option>
                                    <option value="3">THIRD TERM</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Year<b class="rqd">*</b></p></td>
                            <td>
                                <select class="select2-active form-control" name="year" required>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="class_invoice_view">View Records</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="generalpvreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">General Payment Voucher Report</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Start Date:</td>
                                    <td><input type="date" name="pvrepsd" class="form-control" value="<?php echo date('Y-m-d'); ?>" required="required" /></td>
                                </tr>
                                <tr>
                                    <td align="right">End Date:</td>
                                    <td><input type="date" name="pvreped" class="form-control" value="<?php echo date('Y-m-d'); ?>" required="required"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="generalpvreport">View</button></td>
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


<div id="announcer" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p style="font-size: large; font-weight: bold; text-align: center; color: #0a68b4">MEMO</p>
                        <form method="post">
                            <table class="table table-striped">
                                <tr>
                                    <td>Title</td>
                                    <td><input type="text" maxlength="50"  class="form-control" name="title" required placeholder="50 characters maximum"/></td>
                                </tr>
                                <tr>
                                    <td>Message</td>
                                    <td><textarea  class="form-control text" name="anmsg" rows="5" maxlength="300" placeholder="Maximum number of characters is 300" required></textarea></td>
                                </tr>
                                <tr>
                                    <td>Recipient(s)</td>
                                    <td>
                                        <select name="rectype"  class="form-control select-lg" required="required">
                                            <option value="All">All Staff</option>
                                            <?php
                                            $conn=new Db_connect;
                                            $dbcon=$conn->conn();
                                            $exp = "SELECT stfid, fname, lname FROM staff WHERE status='Active' AND stfid <> '$stfID' ORDER BY fname ASC";
                                            $exprun = $conn->query($dbcon, $exp);
                                            while ($expdata = $conn->fetch($exprun)) {
                                                ?>
                                                <option value="<?php echo $expdata['stfid']; ?>"><?php echo checkName($expdata['stfid']); ?></option>
                                            <?php }$conn->close($dbcon); ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr id="listbtn">
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-lg btn-success"><span class="icon icon-next"></span>SEND</button> </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="smsnotify" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p style="font-size: large; font-weight: bold; text-align: center; color: #0a68b4">BULK SMS NOTIFICATIONS</p>
                        <table class="table table-striped">
                            <tr>
                                <td>Message</td>
                                <td><textarea  class="form-control text" id="anmsg" rows="3" maxlength="160" placeholder="Maximum number of characters is 160" required></textarea></td>
                            </tr>
                            <tr>
                                <td>Recipient(s)</td>
                                <td>
                                    <select id="rectype"  class="form-control select-lg" required="required" onchange="revealRecipient(this .value)">
                                        <option value="Staff">Staff</option>
                                        <option value="Parents">Parents</option>
                                        <option value="Custom">Custom</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="hidden" id="recipienthidden">
                                <td>Enter Phone Numbers <br/><b>(Separate phone number with comma)</b></td>
                                <td>
                                    <textarea id="recipients"  class="form-control select-lg" placeholder="Phone numbers separated by a comma" rows="10"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center"><button type="button" class="btn btn-lg btn-success" onclick="sendSMS()"><span class="icon icon-next"></span>SEND</button> </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="bankreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Bank Deposits Report</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Bank</td>
                                    <td>
                                        <select class="form-control" name="bank" required >
                                            <option value="<?php echo 'All*All Banks'; ?>">All Banks</option>
                                            <?php
                                            $conn=new Db_connect;
                                            $dbcon=$conn->conn();
                                            $sel="SELECT * FROM banks WHERE status='ACTIVE' order by name ASC";
                                            $selqry=$conn->query($dbcon,$sel);
                                            while($data=$conn->fetch($selqry)){
                                                ?>
                                                <option value="<?php echo $data['id'].'*'.$data['name']; ?>"><?php echo $data['name']; ?></option>
                                            <?php }$conn->close($dbcon); ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Start Date:</td>
                                    <td><input type="date" name="pvrepsd" class="form-control" value="<?php echo date('Y-m-d'); ?>" /></td>
                                </tr>
                                <tr>
                                    <td align="right">End Date:</td>
                                    <td><input type="date" name="pvreped" class="form-control" value="<?php echo date('Y-m-d'); ?>" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="bankdepositreport">View</button></td>
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

<div class="modal fade" id="pendingexams">
    <div class="modal-dialog">
        <form method="get">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">CLASS EXAMINATION RECORDS</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Class<b class="rqd">*</b></p></td>
                            <td>
                                <?php
                                $conn=new Db_connect;
                                $dbcon=$conn->conn();
                                $cse = "SELECT id, cname FROM classes WHERE status = 'ACTIVE' ORDER BY cname ASC";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="class" required>
                                    <option value=""></option>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['cname'] ?></option>
                                    <?php }$conn->close($dbcon); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Year<b class="rqd">*</b></p></td>
                            <td>
                                <select name="year" class="select2-search form-control">
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Term<b class="rqd">*</b></p></td>
                            <td>
                                <select name="term" class="select2-search form-control">
                                    <option value="1">FIRST TERM</option>
                                    <option value="2">SECOND TERM</option>
                                    <option value="3">THIRD TERM</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="pending_exams">View Records</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="classexams">
    <div class="modal-dialog">
        <form method="get">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">CLASS EXAMINATION RECORDS</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Class<b class="rqd">*</b></p></td>
                            <td>
                                <?php
                                $conn=new Db_connect;
                                $dbcon=$conn->conn();
                                $cse = "SELECT id, cname FROM classes WHERE status = 'ACTIVE' ORDER BY cname ASC";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="class" required>
                                    <option value=""></option>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['cname'] ?></option>
                                    <?php }$conn->close($dbcon); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Year<b class="rqd">*</b></p></td>
                            <td>
                                <select name="year" class="select2-search form-control">
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Term<b class="rqd">*</b></p></td>
                            <td>
                                <select name="term" class="select2-search form-control">
                                    <option value="1">FIRST TERM</option>
                                    <option value="2">SECOND TERM</option>
                                    <option value="3">THIRD TERM</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="student_exams_records">View Records</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="viewstudents">
    <div class="modal-dialog">
        <form method="get">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">STUDENTS RECORDS</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Class<b class="rqd">*</b></p></td>
                            <td>
                                <?php
                                $conn=new Db_connect;
                                $dbcon=$conn->conn();
                                $cse = "SELECT id, cname FROM classes WHERE status = 'ACTIVE' ORDER BY cname ASC";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="students_data" required>
                                    <option value="All">All Classes</option>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['cname'] ?></option>
                                    <?php }$conn->close($dbcon); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Status<b class="rqd">*</b></p></td>
                            <td>
                                <select class="form-control" name="status">
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="INACTIVE">INACTIVE</option>
                                    <option value="PENDING">PENDING</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">View List</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="transferstudents">
    <div class="modal-dialog">
        <form method="get">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">STUDENTS TRANSFER</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Class<b class="rqd">*</b></p></td>
                            <td>
                                <?php
                                $conn=new Db_connect;
                                $dbcon=$conn->conn();
                                $cse = "SELECT id, cname FROM classes WHERE status = 'ACTIVE' ORDER BY cname ASC";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="students_transfer" required>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['cname'] ?></option>
                                    <?php }$conn->close($dbcon); ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">View List</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="product_create">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">PRODUCT CREATION</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Product Name <b style="color: #FF0000; font-weight: bold; font-size: large;">*</b></p></td>
                            <td><input type="text" class="form-control" name="pname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Selling Price <b style="color: #FF0000; font-weight: bold; font-size: large;">*</b></p></td>
                            <td><input type="number" class="form-control" name="sprice" required step="any" min="0.00" placeholder="0.00"/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Cost Price <b style="color: #FF0000; font-weight: bold; font-size: large;">*</b></p></td>
                            <td><input type="number" class="form-control" name="cprice" value="0.00" step="any" min="0.00" placeholder="0.00"/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Quantity</p></td>
                            <td><input type="number" class="form-control" name="qty"  min="0" placeholder="0"/></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Product</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="studentreg">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ADD STUDENT</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <!--<tr>
                            <td align="center" colspan="2"><img id="stdimg" src="assets/images/avatar.png" style="width: 100px; height: 100px"/><p>Student Image</p></td>
                        </tr>-->
                        <tr>
                            <td align="center" colspan="2">
                                <label>
                                    <input type="file" class="form-control" style="display:none" name="stdimg" onchange="dispimage(this,'stdimg')"/>
                                    <span><img id="stdimg" src="assets/images/defaults/noimage.jpg" width="150" height="150" class="img-responsive img-rounded" /></span><br/>
                                    <div class="mainbold">Click To Upload Image</div>
                                </label>
                            </td>
                        </tr>

                        <!--<tr>
                            <td align="right"><p style="font-weight: bold;">Image</p></td>
                            <td><input type="file" class="form-control" name="stdimg" onchange="dispimage(this,'stdimg')" /></td>
                        </tr>-->
                        <tr>
                            <td align="left" colspan="2"><h5>Basic Details</h5></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">First Name<b class="rqd">*</b></p></td>
                            <td><input type="text" class="form-control" name="fname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Last Name<b class="rqd">*</b></p></td>
                            <td><input type="text" class="form-control" name="lname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Date Of Birth<b class="rqd">*</b></p></td>
                            <td><input type="date" class="form-control" name="dob" value="<?php echo date('Y-m-d') ?>" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Gender<b class="rqd">*</b></p></td>
                            <td>
                                <select class="select2-active form-control" name="stsex" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Residential Address<b class="rqd">*</b></p></td>
                            <td><textarea class="form-control" name="resaddr" required rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Contact<b class="rqd">*</b></p></td>
                            <td><input type="text" class="form-control" name="contact" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">E-mail</p></td>
                            <td><input type="text" class="form-control" name="email"/></td>
                        </tr>
                        <tr>
                            <td align="left" colspan="2"><h5>Admission Details</h5></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Class<b class="rqd">*</b></p></td>
                            <td>
                                <?php
                                $conn=new Db_connect;
                                $dbcon=$conn->conn();
                                $cse = "SELECT id, cname FROM classes WHERE status = 'ACTIVE' ORDER BY cname ASC";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="class" required>
                                    <option value=""></option>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['cname'] ?></option>
                                    <?php }$conn->close($dbcon); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Fees Discount</p></td>
                            <td>
                                <?php
                                $conn=new Db_connect;
                                $dbcon=$conn->conn();
                                $cse = "SELECT id, disc_name, percent FROM discounts WHERE status = 'ACTIVE' ORDER BY disc_name ASC";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="discount">
                                    <option value=""></option>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['disc_name']." [".$data['percent']." %]"; ?></option>
                                    <?php }$conn->close($dbcon); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Term<b class="rqd">*</b></p></td>
                            <td>
                                <select name="term" class="select2-search form-control">
                                    <option value="1">FIRST TERM</option>
                                    <option value="2">SECOND TERM</option>
                                    <option value="3">THIRD TERM</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Date Of Admission<b class="rqd">*</b></p></td>
                            <td><input type="date" class="form-control" name="admitdate" value="<?php echo date('Y-m-d') ?>" required/><small style="color: #F00" id="unamefail" class="hidden">Username not available!!</small></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!--<button type="submit" class="btn btn-danger" name="addnewstudent">Save And Exit</button>-->
                    <button type="submit" class="btn btn-primary" name="proceednewstudent">Save Student</button>
                    <button type="submit" class="btn btn-danger" name="pendingstudent">Save Student To Pending</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="staffreg">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ADD STAFF</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="center" colspan="2">
                                <label>
                                    <input type="file" class="form-control" style="display:none" name="stfimg" onchange="dispimage(this,'stfimg')"/>
                                    <span><img id="stfimg" src="assets/images/defaults/noimage.jpg" width="150" height="150" class="img-responsive img-rounded" /></span><br/>
                                    <div class="mainbold">Click To Upload Image</div>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Title<b class="rqd">*</b></p></td>
                            <td>
                                <select class="select2-active form-control" name="sttitle" required>
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Other">Other</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">First Name<b class="rqd">*</b></p></td>
                            <td><input type="text" class="form-control" name="fname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Last Name<b class="rqd">*</b></p></td>
                            <td><input type="text" class="form-control" name="lname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Date Of Birth<b class="rqd">*</b></p></td>
                            <td><input type="date" class="form-control" name="dob" value="<?php echo date('Y-m-d') ?>" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Gender<b class="rqd">*</b></p></td>
                            <td>
                                <select class="select2-active form-control" name="stsex" required>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Residential Address</p></td>
                            <td><textarea class="form-control" name="resaddr" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Contact<b class="rqd">*</b></p></td>
                            <td><input type="text" class="form-control" name="contact" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">E-mail</p></td>
                            <td><input type="text" class="form-control" name="email"/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Position<b class="rqd">*</b></p></td>
                            <td>
                                <?php
                                $conn=new Db_connect;
                                $dbcon=$conn->conn();
                                $cse = "SELECT post_name, id FROM positions WHERE status = 'Active'";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="post" required>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['post_name'] ?></option>
                                    <?php }$conn->close($dbcon); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Date Of Employment<b class="rqd">*</b></p></td>
                            <td><input type="date" class="form-control" name="admitdate" value="<?php echo date('Y-m-d') ?>" required/><small style="color: #F00" id="unamefail" class="hidden">Username not available!!</small></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="proceednewstaff">ADD NEW STAFF</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="searchinvoice" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">SEARCH INVOICE</h3>
            </div>

            <div class="modal-body">
                <form method="get" id="searchinvoiceform">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right"><p style="font-weight: bold;">Invoice Number<b class="rqd">*</b></p></td>
                                    <td><input type="text" name="invid" id="searchinvid" class="form-control" required/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="button" onclick="searchInvoice()" class="btn btn-success" name="searchinvoice"><span class="icon icon-search4"></span>Search Invoice</button></td>
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

<div id="addbank" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">ADD BANK</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right"><p style="font-weight: bold;">Bank Name<b class="rqd">*</b></p></td>
                                    <td><input type="text" name="bankname" class="form-control" required/></td>
                                </tr>
                                <tr>
                                    <td align="right"><p style="font-weight: bold;">Branch<b class="rqd">*</b></p></td>
                                    <td><input type="text" name="branch" required class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right"><p style="font-weight: bold;">Account Number<b class="rqd">*</b></p></td>
                                    <td><input type="text" name="accountnumber" required class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Register</button></td>
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

<div id="expensecls" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">ADD EXPENSE CLASS</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right"><p style="font-weight: bold;">Classification Name<b class="rqd">*</b></p></td>
                                    <td><input type="text" name="classname" class="form-control" required/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" name="addclassification">Add</button></td>
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
<!-- /ADD BANK -->
<!-- EDIT BANK MODAL -->
<div id="editbank" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">EDIT BANK</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <input type="hidden" id="bankid" name="bankid"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Bank Code:</td>
                                    <td><input type="text" name="editbankcode" id="editbankcode" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="editbankname" id="editbankname" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Branch:</td>
                                    <td><input type="text" name="branch" id="editbranchh" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Account:</td>
                                    <td><input type="text" name="accountnumber" id="editaccnum" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="status" id="bankstatus" class="form-control">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Update</button></td>
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

<!-- ADD TAX CONFIG -->
<div id="taxconfig" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Create Tax</h3>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <p style="font-weight: bold; font-style: italic; color: #FD550F; text-align: center;"><b>Note:</b><br>
                                Enter a percentage value in the percentage text box. Use (-) for deducible taxes. Eg: -7.5
                            </p>
                        </div>
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="taxname" class="form-control" required /></td>
                                </tr>
                                <tr>
                                    <td align="right">Percentage Value (%):</td>
                                    <td><input type="number" name="percentage" class="form-control" required step="any"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="taxes">Create</button></td>
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
<!-- /EDIT BANK -->

<div class="modal fade" id="bankdeposit">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">BANK DEPOSIT</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">

                        <td align="center" colspan="2">
                            <label>
                                <input type="file" class="form-control" style="display:none" name="bankimg" onchange="dispimage(this,'depositslip')"/>
                                <span><img id="depositslip" src="assets/images/defaults/noimage.jpg" width="150" height="150" class="img-responsive img-rounded" /></span><br/>
                                <div class="mainbold">Click To Upload Image</div>
                            </label>
                        </td>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Bank</p></td>
                            <td>
                                <?php
                                $conn=new Db_connect;
                                $dbcon=$conn->conn();
                                $cse = "SELECT id, name FROM banks WHERE status = 'Active' ORDER BY name ASC";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="bankid" required>
                                    <option value=""></option>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['id'] ?>"><?php echo $data['name'] ?></option>
                                    <?php }$conn->close($dbcon); ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Cheque Number</p></td>
                            <td>
                                <input type="text" class="form-control" name="chqno" required/>
                                <p style="font-size: smaller; text-align: center; color: #51a947">Enter cheque number if cheque is issued else enter CASH for cash deposits</p>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Description</p></td>
                            <td>
                                <textarea class="form-control" name="chqdesc" rows="3" maxlength="100"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Amount Deposited</p></td>
                            <td><input type="number" class="form-control" name="chqamount" required step="any" min="0"/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Date Of Deposit</p></td>
                            <td><input type="date" class="form-control" name="dod" value="<?php echo date('Y-m-d') ?>" required/></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="bankdeposit">Make Deposit</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="file_display" class="modal fade">
    <div class="modal-dialog" style="width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">FILE DISPLAY</h3>
            </div>

            <div class="modal-body">
                <div class="" id="file_view" align="center">

                </div>
                <div><p id="docnote"></p></div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="generatepv" class="modal fade">
    <div class="modal-dialog" style="width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Payment Voucher</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <div class="table-responsive">
                        <div id="collapse1One" class="accordion-body collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <label>Expense Classification</label>
                                        <select name="exp_cls" class="form-control" required>
                                            <option value=""></option>
                                            <?php
                                            $conn=new Db_connect;
                                            $dbcon=$conn->conn();
                                            $exp = "SELECT * FROM expensecls WHERE status='Active' ORDER BY name ASC";
                                            $exprun = $conn->query($dbcon, $exp);
                                            while ($expdata = $conn->fetch($exprun)) {
                                                ?>
                                                <option value="<?php echo $expdata['id']; ?>"><?php echo $expdata['name']; ?></option>
                                            <?php }$conn->close($dbcon); ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4">
                                        <label>Date Of Request</label>
                                        <input type="date" name="reqDate" class="form-control" required value="<?php echo date('Y-m-d') ?>"/>
                                    </div>
                                    <div class="col-md-4 col-sm-4 col-xs-4" id="supp" align="center">
                                        <label>Beneficiary</label>
                                        <input type="text" name="supplier" class="form-control" required/>

                                    </div>
                                </div>
                                <div class="row clearfix" style="padding-top: 2%">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-pv" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <td><a onclick="addnewrow()"><span class="icon icon-plus-circle2" style="font-weight: bolder; font-size: xx-large;"></span></span></a></td>
                                            </tr>
                                            </thead>
                                            <tbody id="pvbody2">
                                            <tr class="gradeX">
                                                <td><textarea class = "form-control" name = "description[]" id = "waybil" rows="2" maxlength="300" required></textarea></td>
                                                <td><input class = "form-control" type = "number" name = "amount[]" id = "details" step="any" required /></td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row" style="padding: 2%">
                                    <div class = "col-md-12" align="center">
                                        <input type="hidden" value="1" id="pvcounter"/>
                                        <button type="submit" class="btn btn-lg btn-success" name="genpv"><span class="icon icon-next2"></span>Generate PV</button>
                                    </div>

                                </div>
                            </div>
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

<div id="generalfeesreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Fees Payment Report</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Start Date:</td>
                                    <td><input type="date" name="pvrepsd" class="form-control" value="<?php echo date('Y-m-d'); ?>" required="required" /></td>
                                </tr>
                                <tr>
                                    <td align="right">End Date:</td>
                                    <td><input type="date" name="pvreped" class="form-control" value="<?php echo date('Y-m-d'); ?>" required="required"/></td>
                                </tr>
                                <tr>
                                    <td align="right"><p style="font-weight: bold;">Payment Method</p></td>
                                    <td>
                                        <select name="payment_method" class="form-control">
                                            <option value="ALL">ALL</option>
                                            <option value="CASH">CASH</option>
                                            <option value="MOMO">MOMO WALLET</option>
                                            <option value="BANK">BANK TRANSFER</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="generalfeesreport">View</button></td>
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


<div class="modal fade" id="product_transfer">
    <div class="modal-dialog">
        <form method="post" id="prodtrans">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">PRODUCT RECEIPT</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Product <b style="color: #FF0000; font-weight: bold; font-size: large;">*</b></p></td>
                            <td id="sprodtrans"></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Quantity</p></td>
                            <td><input type="number" class="form-control" name="tqty" id="selectqty"  min="0" placeholder="0"/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Receipt Note</p></td>
                            <td><textarea class="form-control" id="receiptnote" maxlength="200" rows="3"></textarea></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="receiveProduct()" class="btn btn-primary" >Receive Product</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<div class="modal fade" id="pos_qty">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">ADD QUANTITY</h4>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <tr>
                        <td colspan="3"><div style="font-weight: bold; text-align: center; font-size: large;" id="pnameqty"></div></td>
                    </tr>
                    <tr>
                        <td colspan="3"><div style="font-weight: bold; text-align: center; color: #f39503; font-size: medium" id="pstock"></div></td>
                    </tr>
                    <tr>
                        <td align="right"><p style="font-weight: bold;">Quantity</p></td>
                        <td>
                            <input type="number" class="form-control" id="pqty" min="1"/>
                            <input type="hidden" class="form-control" id="sid" />
                            <input type="hidden" class="form-control" id="pid" />
                            <input type="hidden" class="form-control" id="usr" />
                        </td>
                        <td><button class="btn btn-sm btn-success" onclick="updatesales()"><span class="icon icon-next">Add to cart</span></button></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="user_sales_report">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">USER SALES REPORT</h4>
            </div>
            <div class="modal-body">
                <form method="get">
                    <table class="table table-striped">

                        <tr>
                            <td align="right"><p style="font-weight: bold;">Sales Officer</p></td>
                            <td>
                                <select class="form-control" name="user_sales_report">
                                    <?php
                                        $conn=new Db_connect;
                                        $dbconnection=$conn->conn();
                                        $seluser = "SELECT stfid, fname, lname FROM staff ORDER BY fname ASC";
                                        $seluserrun = $conn->query($dbconnection,$seluser);
                                        ?>
                                        <option value="All">All Staff</option>
                                        <?php
                                        while($udata = $conn->fetch($seluserrun)){
                                            ?>
                                            <option value="<?php echo $udata['stfid'] ?>"><?php echo $udata['fname']." ".$udata['lname']; ?></option>
                                        <?php }$conn->close($dbconnection);?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Start Date</p></td>
                            <td>
                                <input type="date" name="sdate" class="form-control" value="<?php echo date('Y-m-d') ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">End Date</p></td>
                            <td>
                                <input type="date" name="edate" class="form-control" value="<?php echo date('Y-m-d') ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <button type="submit" class="btn btn-primary">View Report</button>
                            </td>
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

<div class="modal fade" id="sales_report">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">SALES REPORT</h4>
            </div>
            <div class="modal-body">
                <form method="get">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">User</p></td>
                            <td>
                                <select class="form-control" name="salesofficer">
                                    <?php
                                        $conn=new Db_connect;
                                        $dbconnection=$conn->conn();
                                        $seluser = "SELECT stfid, fname, lname FROM staff ORDER BY fname ASC";
                                        $seluserrun = $conn->query($dbconnection,$seluser);
                                        ?>
                                        <option value="All">All Staff</option>
                                        <?php
                                        while($udata = $conn->fetch($seluserrun)){
                                            ?>
                                            <option value="<?php echo $udata['stfid'] ?>"><?php echo $udata['fname']." ".$udata['lname']; ?></option>
                                        <?php }$conn->close($dbconnection);?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Start Date</p></td>
                            <td>
                                <input type="date" name="sdate" class="form-control" value="<?php echo date('Y-m-d') ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">End Date</p></td>
                            <td>
                                <input type="date" name="edate" class="form-control" value="<?php echo date('Y-m-d') ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <button type="submit" name="salesreport" class="btn btn-primary">View Report</button>
                            </td>
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

<div class="modal fade" id="sales_summary_report">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">SALES SUMMARY REPORT</h4>
            </div>
            <div class="modal-body">
                <form method="get">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Start Date</p></td>
                            <td>
                                <input type="date" name="sdate" class="form-control" value="<?php echo date('Y-m-d') ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">End Date</p></td>
                            <td>
                                <input type="date" name="edate" class="form-control" value="<?php echo date('Y-m-d') ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                                <button type="submit" class="btn btn-primary">View Report</button>
                            </td>
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
