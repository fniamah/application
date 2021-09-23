<div id="examqxtns" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Select <b>SUBJECT</b> To View Examination Questions</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Course:</td>
                                    <td>
                                        <select name="subject" class="form-control" required>
                                            <option value="">--SELECT SUBJECT--</option>
                                            <?php
                                            $selstf="SELECT sbjid, sbj FROM subject WHERE status = 'Active' ORDER BY sbj ASC";
                                            $selrun=$conn->query($dbcon,$selstf);
                                            while($seldata=$conn->fetch($selrun)){
                                                ?>
                                                <option value="<?php echo $seldata['sbjid']; ?>"><?php echo $seldata['sbj']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" name="exam_questions" class="btn btn-success">View Questions</button></td>
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
<div id="classreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">CLASS SESSION REPORT</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Session:</td>
                                    <td>
                                        <select class="select2-active form-control" name="stsession" required>
                                            <option value=""></option>
                                            <option value="Morning">Morning</option>
                                            <option value="Evening">Evening</option>
                                            <option value="Weekend">Weekend</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="ststatus" class="select form-control" required>
                                            <option value=""></option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Graduated">Graduated</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="sessionreport">View</button></td>
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

<div id="attacheesview" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">STUDENT ATTACHEES</h3>
            </div>

            <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" id="attacheesmodal">

                        </div>
                    </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="batchreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">BATCH REPORT</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Batch:</td>
                                    <td>
                                        <?php
                                        $cse = "SELECT batchno, bdesc FROM batches WHERE status = 'Active'";
                                        $cserun = $conn->query($dbcon,$cse);
                                        ?>
                                        <select class="select2-active form-control" name="batchno">
                                            <option value=""></option>
                                            <?php
                                            while($data = $conn->fetch($cserun)){
                                                ?>
                                                <option value="<?php echo $data['batchno'] ?>"><?php echo $data['bdesc'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="ststatus" class="select form-control">
                                            <option value=""></option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Graduated">Graduated</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="batchreport">View</button></td>
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

<div id="programreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">PROGRAM OR COURSE REPORT</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Course /  Program:</td>
                                    <td>
                                        <?php
                                        $cse = "SELECT cid, cname FROM course WHERE status = 'Active'";
                                        $cserun = $conn->query($dbcon,$cse);
                                        ?>
                                        <select class="select2-active form-control" name="program">
                                            <option value=""></option>
                                            <?php
                                            while($data = $conn->fetch($cserun)){
                                                ?>
                                                <option value="<?php echo $data['cid'] ?>"><?php echo $data['cname'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="ststatus" class="select form-control">
                                            <option value=""></option>
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Graduated">Graduated</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="programreport">View</button></td>
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

<!-- PV REPORT MODAL -->
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

<div id="generalhostelreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Hostel Fees Payment Report</h3>
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
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="generalhostelreport">View</button></td>
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

<!-- ADD EXPENSE CLASS MODAL -->
<div id="expcls" class="modal fade">
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
                                    <td align="right">Code:</td>
                                    <td><input type="text" name="expcode" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="expname" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Create</button></td>
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
<!-- /ADD EXPENSE CLASS -->
<div id="editexpcls" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">EDIT EXPENSE CLASS</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name='expclsid' id='expclsid'/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Code:</td>
                                    <td><input type="text" name="expcodee" id="expcode" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="expname" id="expname" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="expclsstatus" id="expclsstatus" class="form-control">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Create</button></td>
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
<!-- /EDIT EXPENSE CLASS -->
<!-- ADD BANK MODAL -->
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
                                    <td align="right">Bank Code:</td>
                                    <td><input type="text" name="bankCode" class="form-control"/></td>
                                </tr>
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="bankname" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Branch:</td>
                                    <td><input type="text" name="branch" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Account:</td>
                                    <td><input type="text" name="accountnumber" class="form-control" /></td>
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
<!-- /EDIT BANK -->

<!-- BANK DEPOSIT -->
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
                        <tr>
                            <td align="center" colspan="2"><img id="depositslip" src="assets/images/defaults/noimage.jpg" style="width: 100px; height: 100px"/><p>Deposit Slip</p></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Deposit Slip</p></td>
                            <td><input type="file" class="form-control" name="bankimg" onchange="dispimage(this,'depositslip')" /></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Bank</p></td>
                            <td>
                                <?php
                                $cse = "SELECT name, bankcode FROM banks WHERE status = 'Active' ORDER BY name ASC";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="bankid">
                                    <option value=""></option>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['bankcode'] ?>"><?php echo $data['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Cheque Number</p></td>
                            <td>
                                <input type="text" class="form-control" name="chqno" required/>
                                <p style="font-size: smaller; text-align: center; color: #51a947">Enter cheque number if checque is issued else enter CASH for cash deposits</p>
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
<!-- END BANK DEPOSIT -->
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
                        <tr>
                            <td align="center" colspan="2"><img id="stdimg" src="assets/images/avatar.png" style="width: 100px; height: 100px"/><p>Student Image</p></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Image</p></td>
                            <td><input type="file" class="form-control" name="stdimg" onchange="dispimage(this,'stdimg')" /></td>
                        </tr>
                        <tr>
                            <td align="left" colspan="2"><h5>Basic Details</h5></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">First Name</p></td>
                            <td><input type="text" class="form-control" name="fname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Last Name</p></td>
                            <td><input type="text" class="form-control" name="lname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Date Of Birth</p></td>
                            <td><input type="date" class="form-control" name="dob" value="<?php echo date('Y-m-d') ?>" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Gender</p></td>
                            <td>
                                <select class="select2-active form-control" name="stsex">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Residential Address</p></td>
                            <td><textarea class="form-control" name="resaddr" required rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Contact</p></td>
                            <td><input type="text" class="form-control" name="contact" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">E-mail</p></td>
                            <td><input type="text" class="form-control" name="email" required/></td>
                        </tr>
                        <tr>
                            <td align="left" colspan="2"><h5>Admission Details</h5></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Class Session</p></td>
                            <td>
                                <select class="select2-active form-control" name="stsession">
                                    <option value="Morning">Morning</option>
                                    <option value="Evening">Evening</option>
                                    <option value="Weekend">Weekend</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Student Type</p></td>
                            <td>
                                <select class="select2-active form-control" name="sttype">
                                    <option value="Full time">Full Time</option>
                                    <option value="Top up">Top Up</option>
                                    <option value="Online">Online</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Course</p></td>
                            <td>
                                <?php
                                $cse = "SELECT cid, cname FROM course WHERE status = 'Active'";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="program">
                                    <option value=""></option>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                    ?>
                                    <option value="<?php echo $data['cid'] ?>"><?php echo $data['cname'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Batch</p></td>
                            <td>
                                <?php
                                $cse = "SELECT batchno, bdesc FROM batches WHERE status = 'Active'";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="batchno">
                                    <option value=""></option>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['batchno'] ?>"><?php echo $data['bdesc'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Residential Status</p></td>
                            <td>
                                <select class="select2-active form-control" name="stres">
                                    <option value="Hostel">Hostel</option>
                                    <option value="Non-hostel">Non-hostel</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Date Of Admission</p></td>
                            <td><input type="date" class="form-control" name="admitdate" value="<?php echo date('Y-m-d') ?>" required/><small style="color: #F00" id="unamefail" class="hidden">Username not available!!</small></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="addnewstudent">Save And Exit</button>
                    <button type="submit" class="btn btn-primary" name="proceednewstudent">Save And Admit</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="addoccupant">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ADD HOSTEL OCCUPANT</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Student</p></td>
                            <td>
                                <?php
                                $cse = "SELECT stdid, fname, lname FROM students WHERE status = 'Active' ORDER BY fname ASC";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="stdid">
                                    <option value=""></option>
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['stdid'] ?>"><?php echo $data['fname']." ".$data['lname']; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Room Description</p></td>
                            <td><textarea class="form-control" name="room" required rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Amount</p></td>
                            <td><input type="number" class="form-control" name="amount" required step="any" min="0.00"/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Start Date</p></td>
                            <td><input type="date" class="form-control" name="sdate" value="<?php echo date('Y-m-d') ?>" required/><small style="color: #F00" id="unamefail" class="hidden">Username not available!!</small></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">End Date</p></td>
                            <td><input type="date" class="form-control" name="edate" value="<?php echo date('Y-m-d') ?>" required/><small style="color: #F00" id="unamefail" class="hidden">Username not available!!</small></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="hosteloccupant">Add Occupant</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- PV EDIT MODAL -->
<div id="pvedit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">EDIT Payment Voucher Type</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="pvtypes" id='pveditid' />
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="pvedittypes" class="form-control" required id="pvedittypes"/></td>
                                </tr>
                                <tr>
                                    <td align="right">Supervisor Approval:</td>
                                    <td>
                                        <select name="supedit" class="form-control" id="supedit">
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="pvstatus" class="form-control" id="pvstatus">
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
<!-- /PV EDIT -->

<!-- ADD PV TYPE MODAL -->
<div id="pvtype" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Add Payment Voucher Type</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="pvtypes" class="form-control" required /></td>
                                </tr>
                                <tr>
                                    <td align="right">Supervisor Approval:</td>
                                    <td>
                                        <select name="super" class="form-control" >
                                            <option value="no">No</option>
                                            <option value="yes">Yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Create</button></td>
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
<!-- /ADD PV TYPE -->

<!-- ADD CURRENCY MODAL -->
<div id="exchrate" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">ADD CURRENCY EXCHANGE RATES</h3>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Currency:</td>
                                    <td><input type="text" name="currencyadd" class="form-control" required/></td>
                                </tr>
                                <tr>
                                    <td align="right">Exchange Rate:</td>
                                    <td><input type="number" name="exchrate" class="form-control" step="any" min="0.1" required /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success">Create</button></td>
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
<div id="editexchrate" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">EDIT CURRENCY EXCHANGE RATES</h3>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" id="exchrate_id" name="exchrate_id"/>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Currency:</td>
                                    <td><input type="text" name="currencynew" id="currencyadd" class="form-control" required readonly/></td>
                                </tr>
                                <tr>
                                    <td align="right">Exchange Rate:</td>
                                    <td><input type="number" name="exchrate" id="exchratee" class="form-control" step="any" min="0.1" required /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success">Update</button></td>
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
<!-- /ADD CURRENCY -->

<!-- GENERATE PV -->
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
                                    <div class="col-md-3">
                                        <label>Currency</label>
                                        <select name="currency" class="select form-control" onchange="exchrate(this.value)" required>
                                            <option value="">--SELECT CURRENCY--</option>
                                            <option value="cedis">Cedis</option>
                                            <?php
                                            $sel="SELECT currency, drate FROM exch_rate ORDER BY currency ASC";
                                            $selqry=$conn->query($dbcon,$sel);
                                            while($data=$conn->fetch($selqry)){
                                                ?>
                                                <option value="<?php echo $data['currency']; ?>"><?php echo $data['currency']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Exchange Rate</label>
                                        <input type="text" name="exchgrate" class="form-control" id="exchhide1" readonly required/>
                                    </div>
                                    <div class="col-md-3">
                                        <label>PV Type</label>
                                        <select class="form-control" name="expType" id="expType" required>
                                            <option value=""></option>
                                            <?php
                                            $sel="SELECT * FROM pvtype WHERE status='Active' ORDER BY name ASC";
                                            $selqry=$conn->query($dbcon,$sel);
                                            while($data=$conn->fetch($selqry)){
                                                ?>
                                                <option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Expense Classification</label>
                                        <select name="exp_cls" class="form-control" required>
                                            <option value=""></option>
                                            <?php
                                            $exp = "SELECT * FROM expensecls WHERE status='Active' ORDER BY name ASC";
                                            $exprun = $conn->query($dbcon, $exp);
                                            while ($expdata = $conn->fetch($exprun)) {
                                                ?>
                                                <option value="<?php echo $expdata['expcode']; ?>"><?php echo $expdata['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" align="center">
                                    <div class="col-md-3 col-sm-6 col-xs-12">

                                        <label>Department</label>
                                        <select class="form-control" name="dept" required>
                                            <option value=""></option>
                                            <?php
                                            $selComp="SELECT * FROM departments WHERE status='Active' ORDER BY name ASC";
                                            $selCompRun=$conn->query($dbcon,$selComp);
                                            while($data=$conn->fetch($selCompRun)){
                                                ?>
                                                <option value="<?php echo $data['name'].'*'.$data['stfid'];?>"><?php echo $data['name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <label>Date Of Request</label>
                                        <input type="date" name="reqDate" class="form-control" required value="<?php echo date('Y-m-d') ?>"/>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12" id="supp" align="center">
                                        <label>Beneficiary</label>
                                        <input type="text" name="supplier" class="form-control" required/>

                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">

                                        <label>Bank Account To Debit</label>
                                        <select name="bk_code" class="form-control" required>
                                            <option value=""></option>
                                            <?php
                                            $exp = "SELECT * FROM banks WHERE status='Active' ORDER BY name ASC";
                                            $exprun = $conn->query($dbcon, $exp);
                                            while ($expdata = $conn->fetch($exprun)) {
                                                ?>
                                                <option value="<?php echo $expdata['bankcode']; ?>"><?php echo $expdata['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix" style="padding-top: 2%">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example" width="100%">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Description</th>
                                                <th>Amount</th>
                                                <td><a onclick="addnewrow()"><span class="icon icon-plus-circle2" style="font-weight: bolder; font-size: xx-large;"></span></span></a></td>
                                            </tr>
                                            </thead>
                                            <tbody id="pvbody2">
                                            <tr class="gradeX">
                                                <td><input class = "form-control" type = "date" name = "expdate[]" id = "itemname" value="<?php echo date('Y-m-d') ?>" required /></td>
                                                <td><textarea class = "form-control" name = "description[]" id = "waybil" rows="2" maxlength="300" required></textarea></td>
                                                <td><input class = "form-control" type = "number" name = "amount[]" id = "details" step="any" required /></td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row" style="padding: 2%">
                                    <div class = "col-md-12" align="center">
                                        <input type="hidden" value="1" id="rowcounter"/>
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
<!-- END PV GENERATION -->
<!-- END PV GENERATION -->

<!-- ANNOUNCER MODAL -->
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
                                            $exp = "SELECT stfid, fname, lname FROM staff WHERE status='Active' ORDER BY fname ASC";
                                            $exprun = $conn->query($dbcon, $exp);
                                            while ($expdata = $conn->fetch($exprun)) {
                                                ?>
                                                <option value="<?php echo $expdata['stfid']; ?>"><?php echo checkName($expdata['stfid']); ?></option>
                                            <?php } ?>
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

<div id="basicsalary" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Add Basic Salary</h5>
            </div>

            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="stfid" id="basicstfid"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Amount:</td>
                                    <td>
                                        <input type="number" name="basicamount" class="form-control" step="any" min="0"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" name="addbasic" class="btn btn-success">Add Basic Salary</button></td>
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
                            <td align="center" colspan="2"><img id="stfimg" src="assets/images/avatar.png" style="width: 100px; height: 100px"/><p>Staff Image</p></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Image</p></td>
                            <td><input type="file" class="form-control" name="stfimg" onchange="dispimage(this,'stfimg')" /></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Title</p></td>
                            <td>
                                <select class="select2-active form-control" name="sttitle">
                                    <option value="Mr">Mr</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Other">Other</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">First Name</p></td>
                            <td><input type="text" class="form-control" name="fname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Last Name</p></td>
                            <td><input type="text" class="form-control" name="lname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Date Of Birth</p></td>
                            <td><input type="date" class="form-control" name="dob" value="<?php echo date('Y-m-d') ?>" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Gender</p></td>
                            <td>
                                <select class="select2-active form-control" name="stsex">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Residential Address</p></td>
                            <td><textarea class="form-control" name="resaddr" required rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Contact</p></td>
                            <td><input type="text" class="form-control" name="contact" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">E-mail</p></td>
                            <td><input type="text" class="form-control" name="email" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Position</p></td>
                            <td>
                                <?php
                                $cse = "SELECT post FROM positions WHERE status = 'Active'";
                                $cserun = $conn->query($dbcon,$cse);
                                ?>
                                <select class="select2-active form-control" name="post">
                                    <?php
                                    while($data = $conn->fetch($cserun)){
                                        ?>
                                        <option value="<?php echo $data['post'] ?>"><?php echo $data['post'] ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Date Of Employment</p></td>
                            <td><input type="date" class="form-control" name="admitdate" value="<?php echo date('Y-m-d') ?>" required/><small style="color: #F00" id="unamefail" class="hidden">Username not available!!</small></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="addnewstaff">Save And Exit</button>
                    <button type="submit" class="btn btn-primary" name="proceednewstaff">Save And Proceed</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div id="salrule" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">ADD SALARY RULE</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="salary_rules" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Rule Type:</td>
                                    <td>
                                        <select name="ruletype" class="form-control">
                                            <option value="Earning">Earning</option>
                                            <option value="Deduction">Deduction</option>
                                            <option value="Reimbursement">Reimbursement</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <label><input type='checkbox' onchange='handleClick(this);' id="basicbox"> Dependent On Basic?</label>
                                    </td>
                                    <td align="left">
                                        <input type='number' step="any" min="0" class="form-control hidden" name="baseval" id="basicval" value="0"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success">Add Rule</button></td>
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

<div class="modal fade" id="coursereg">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ADD NEW COURSE OR PROGRAM</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Course ID</p></td>
                            <td><input type="text" class="form-control" name="cseid" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Course Name</p></td>
                            <td><input type="text" class="form-control" name="cname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Subject(s)</p></td>
                            <td>
                                <table border="0">
                                    <?php
                                    $sel = "SELECT sbj, sbjid FROM subject WHERE status = 'Active'";
                                    $selrun = $conn->query($dbcon,$sel);
                                    while($data = $conn->fetch($selrun)){
                                        $sbj = $data['sbj'];
                                        $sbjid = $data['sbjid'];
                                        echo "<tr><td><input type='checkbox' class='checkbox' name='subjects[]' value='$sbjid' /></td><td>$sbj</td></tr>";
                                    } ?>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Course Fees</p></td>
                            <td><input type="number" class="form-control" name="fees" required step="any" min="0"/></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="addcourse">Save</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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
                            <td align="right"><p style="font-weight: bold;">Subject ID</p></td>
                            <td><input type="text" class="form-control" name="sbjid" required/></td>
                        </tr>
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

<div id="staffpaystruct" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">View Staff Salary Structure</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td>
                                        <select name="stfid" class="form-control" required>
                                            <option value="">--SELECT STAFF--</option>
                                            <?php
                                            $selstf="SELECT stfid, fname, lname FROM staff WHERE status IN ('Active','Inactive') ORDER BY fname ASC";
                                            $selrun=$conn->query($dbcon,$selstf);
                                            while($seldata=$conn->fetch($selrun)){
                                                ?>
                                                <option value="<?php echo $seldata['stfid']; ?>"><?php echo $seldata['fname']." ".$seldata['lname']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" name="genpaystruct" class="btn btn-success">View Pay Structure</button></td>
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

<div id="examcourses" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Select Course To View Students</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Course:</td>
                                    <td>
                                        <select name="cseprog" class="form-control" required>
                                            <option value="">--SELECT COURSE--</option>
                                            <?php
                                            $selstf="SELECT cid, cname FROM course WHERE status = 'Active' ORDER BY cname ASC";
                                            $selrun=$conn->query($dbcon,$selstf);
                                            while($seldata=$conn->fetch($selrun)){
                                                ?>
                                                <option value="<?php echo $seldata['cid']; ?>"><?php echo $seldata['cname']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" name="stdcourses" class="btn btn-success">View Students</button></td>
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

<div class="modal fade" id="facility">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ADD NEW FACILITY / PHARMACY</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Name</p></td>
                            <td><input type="text" class="form-control" name="pname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Type</p></td>
                            <td>
                                <select name="ptype" class="form-control">
                                    <option value="pharmacy">Pharmacy</option>
                                    <option value="hospital">Hospital / Clinic</option>
                                    <option value="other">Other</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Address</p></td>
                            <td><textarea class="form-control" name="paddr" required></textarea></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Contact</p></td>
                            <td><input type="text" class="form-control" name="pcont" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">E-mail</p></td>
                            <td><input type="text" class="form-control" name="pmail" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Location</p></td>
                            <td><input type="text" class="form-control" name="ploc" required/></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="addpharmacy">Save</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="stfpost">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ADD NEW POSITION</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Position</p></td>
                            <td><input type="text" class="form-control" name="dpost" required/></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="addpost">Save</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="company">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="branch" value="<?php echo $branch ?>" />
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">SCHOOL DETAILS</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="center" colspan="2" id="compimg"><img id="schoolimg" src="assets/images/defaults/noimage.jpg" style="width: 300px; height: 200px"/><p>Company Logo</p></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Company Name</p></td>
                            <td><input type="text" class="form-control" name="cname" id="cname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Phone Number</p></td>
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
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Logo</p></td>
                            <td><input type="file" class="form-control" name="clogo" onchange="dispimage(this,'schoolimg')"/></td>
                        </tr>
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

<div id="earning" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Add Earning</h5>
            </div>

            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="stfid" id="earnstfid"/>
                    <input type="hidden" name="genpaystruct"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Item:</td>
                                    <td>
                                        <select name="earningname" class="form-control" required onchange="checkbasic()" id="itemvalue">
                                            <option value=""></option>
                                            <?php
                                            $selitem="SELECT * FROM sal_rules WHERE type='Earning' AND status='Active'";
                                            $selitemqry=$conn->query($dbcon,$selitem);
                                            while($item=$conn->fetch($selitemqry)){
                                                ?>
                                                <option value="<?php echo $item['name'].'*'.$item['baseval']; ?>"><?php echo $item['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="hidden" id="payitemhide">
                                    <td align="right">Amount:</td>
                                    <td><input type="number" step="any" class="form-control" min="0" value="0" name="amount"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" name="addearning" class="btn btn-success" >Add Earning</button></td>
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
<div id="reimbursement" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Add Reimbursement</h5>
            </div>

            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="stfid" id="reimbstfid"/>
                    <input type="hidden" name="genpaystruct"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Item:</td>
                                    <td>
                                        <select name="reimbname" class="form-control" required onchange="checkbasic3()" id="itemvalue3">
                                            <option value=""></option>
                                            <?php
                                            $selitem="SELECT * FROM sal_rules WHERE type='Reimbursement' AND status='Active'";
                                            $selitemqry=$conn->query($dbcon,$selitem);
                                            while($item=$conn->fetch($selitemqry)){
                                                ?>
                                                <option value="<?php echo $item['name'].'*'.$item['baseval']; ?>"><?php echo $item['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="hidden" id="payitemhide3">
                                    <td align="right">Amount:</td>
                                    <td><input type="number" step="any" class="form-control" min="0" value="0" name="amount"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" name="reimburse" class="btn btn-success">Add Reimbursement</button></td>
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
<div id="deduction" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Add Deduction</h5>
            </div>

            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="stfid" id="deductstfid"/>
                    <input type="hidden" name="genpaystruct"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Item:</td>
                                    <td>
                                        <select name="deductname" class="form-control" required onchange="checkbasic2()" id="itemvalue2">
                                            <option value=""></option>
                                            <?php
                                            $selitem="SELECT * FROM sal_rules WHERE type='Deduction' AND status='Active'";
                                            $selitemqry=$conn->query($dbcon,$selitem);
                                            while($item=$conn->fetch($selitemqry)){
                                                ?>
                                                <option value="<?php echo $item['name'].'*'.$item['baseval']; ?>"><?php echo $item['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="hidden" id="payitemhide2">
                                    <td align="right">Amount:</td>
                                    <td><input type="number" step="any" class="form-control" min="0" value="0" name="amount"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" name="adddeduct" class="btn btn-success">Add Deduction</button></td>
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

<!-- EDIT STAFF MODAL -->
<div id="staffedit" class="modal fade">
    <div class="modal-dialog" style="width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">EDIT STAFF INFORMATION</h3>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-12" align="center" id="imgedit">

                                </div>
                            </div>
                            <h4>Personal Information</h4>
                            <table width="100%" class="table table-bordered">
                                <tr>
                                    <td align="right">Staff ID:</td>
                                    <td><input type="text" name="staffeditid" class="form-control" id="stid" readonly /></td>
                                </tr>
                                <tr>
                                    <td align="right">Surname:</td>
                                    <td><input type="text" name="lst_name" class="form-control" id="stlst_name"/></td>
                                </tr>
                                <tr>
                                    <td align="right">Other Names:</td>
                                    <td><input type="text" name="fst_name" class="form-control" id="stfst_name"/></td>
                                </tr>
                                <tr>
                                    <td align="right">Unit:</td>
                                    <td>
                                        <select name="company" class="select form-control" required>
                                            <option value="" id="stcompany"></option>
                                            <?php
                                            $lststf="SELECT * FROM company WHERE status='Active' ORDER BY name ASC";
                                            $stfRun=$conn->query($dbcon,$lststf);
                                            while($data=$conn->fetch($stfRun)){
                                                ?>
                                                <option value="<?php echo $data['voka_id'].'*'.$data['name']; ?>"><?php echo $data['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Position:</td>
                                    <td>
                                        <select name="position" class="select form-control" required >
                                            <option value="" id="stposition"></option>
                                            <?php
                                            $lststf="SELECT * FROM position WHERE status='Active' ORDER BY post ASC";
                                            $stfRun=$conn->query($dbcon,$lststf);
                                            while($data=$conn->fetch($stfRun)){
                                                ?>
                                                <option value="<?php echo $data['post']; ?>"><?php echo $data['post']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Start Time:</td>
                                    <td>
                                        <input time="time" name="stTym" class="select form-control" required id="ststart_time">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">End Time:</td>
                                    <td>
                                        <input time="time" name="endTym" class="select form-control" required id="stend_time">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Contact:</td>:
                                    <td><input type="text" name="contact" class="form-control" placeholder="233554923322" id="stcontact"/></td>
                                </tr>
                                <tr>
                                    <td align="right">E-mail:</td>:
                                    <td><input type="email" name="email" class="form-control" placeholder="" id="stemail"/></td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="status" class="select form-control" required>
                                            <option value="" id="ststatus"></option>
                                            <option value="Active" selected>Active</option>
                                            <option value="Inactive">Inactive</option>
                                            <option value="Detach">Detach</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>

                            <div class="row" id="hide">
                                <div class="col-md-12" align="center" style="margin-top: 20%">
                                    <button class="btn btn-lg btn-success" type="submit">Edit Staff</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h4>User Access Rights</h4>
                            <table width="100%" class="table table-bordered">
                                <tr>
                                    <td>
                                        <label>Staff Appraisal</label>
                                        <select class="select form-control" name="stattendance">
                                            <option value="" id="stattendance"></option>
                                            <option value=""></option>
                                            <option value="manager">manager</option>
                                            <option value="administrator">administrator</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Staff Records</label>
                                        <select class="select form-control" name="staff">
                                            <option value="" id="ststaff"></option>
                                            <option value=""></option>
                                            <option value="administrator">administrator</option>
                                            <option value="manager">manager</option>
                                            <option value="director">director</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Permissions/Reversals</label>
                                        <select class="select form-control" name="permit">
                                            <option value="" id="stpermit"></option>
                                            <option value=""></option>
                                            <option value="manager">manager</option>
                                            <option value="administrator">administrator</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Finance</label>
                                        <select class="select form-control" name="finance">
                                            <option value="" id="stfinance"></option>
                                            <option value=""></option>
                                            <option value="accountant">accountant</option>
                                            <option value="administrator">administrator</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Loan Application</label>
                                        <select class="select form-control" name="loans">
                                            <option value="" id="loansedit"></option>
                                            <option value=""></option>
                                            <option value="manager">manager</option>
                                            <option value="accounts">accounts</option>
                                            <option value="director">director</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Medical</label>
                                        <select class="select form-control" name="medical">
                                            <option value="" id="stmedical"></option>
                                            <option value=""></option>
                                            <option value="manager">manager</option>
                                            <option value="accounts">accounts</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Leave Management</label>
                                        <select class="select form-control" name="leave">
                                            <option value="" id="stleave"></option>
                                            <option value=""></option>
                                            <option value="manager">manager</option>
                                            <option value="administrator">administrator</option>
                                            <option value="director">director</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Company</label>
                                        <select class="select form-control" name="comp">
                                            <option value="" id="stcomp"></option>
                                            <option value=""></option>
                                            <option value=""></option>
                                            <option value="manager">manager</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <!-- supervisor has been changed to pv -->
                                        <label>Payment Voucher</label>
                                        <select class="select form-control" name="tutorial">
                                            <option value="" id="sttutorial"></option>
                                            <option value=""></option>
                                            <option value="manager">manager</option>
                                            <option value="accounts">accounts</option>
                                            <option value="director">director</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Project Management</label>
                                        <select class="select form-control" name="projectmgt">
                                            <option value=""></option>
                                            <option value="manager">manager</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Settings</label>
                                        <select class="select form-control" name="settings">
                                            <option value="" id="stsettings"></option>
                                            <option value=""></option>
                                            <option value="administrator">administrator</option>
                                        </select>
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
<!-- /EDIT STAFF -->
<div class="modal fade" id="batches">
    <div class="modal-dialog">
        <form method="post" enctype="multipart/form-data" id="userreg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">CREATE STUDENT BATCH</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Batch Name</p></td>
                            <td><input type="text" class="form-control" name="bname" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Description</p></td>
                            <td><textarea class="form-control" name="bdesc" required rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Year</p></td>
                            <td>
                                <select class="select2-active form-control" name="byear">
                                    <option value="2020">2020</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">Start Date</p></td>
                            <td><input type="date" class="form-control" name="sdate" value="<?php echo date('Y-m-d') ?>" required/></td>
                        </tr>
                        <tr>
                            <td align="right"><p style="font-weight: bold;">End Date</p></td>
                            <td><input type="date" class="form-control" name="edate" value="<?php echo date('Y-m-d') ?>" required/></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger" name="addbatch">Save</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- ADD COMPANY MODAL -->
<div id="departments" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">ADD DEPARTMENT</h3>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="deptname" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Manager:</td>
                                    <td>
                                        <select name="deptsup" class="select form-control">
                                            <option value="">Select Manager</option>
                                            <?php
                                            $lststf="SELECT stfid, fname, lname FROM staff WHERE status ='Active' ORDER BY fname ASC";
                                            $stfRun=$conn->query($dbcon,$lststf);
                                            while($data=$conn->fetch($stfRun)){
                                                ?>
                                                <option value="<?php echo $data['stfid']; ?>"><?php echo $data['fname']." ".$data['lname']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Create</button></td>
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
<!-- /ADD COMPANY -->
<!-- EDIT COMPANY MODAL -->
<div id="companyEdit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">EDIT COMPANY / DEPARTMENT</h3>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="companyID" class="form-control" id="companyID"/>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="table">

                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="compnameed" class="form-control" id="compname"/></td>
                                </tr>
                                <tr>
                                    <td align="right">Manager:</td>
                                    <td>
                                        <select name="supervisored" class="select form-control">
                                            <option value="">Select Manager</option>
                                            <?php
                                            $lststf="SELECT voka_id, fst_name, lst_name FROM staff_rec WHERE status !='Removed' ORDER BY fst_name ASC";
                                            $stfRun=$conn->query($dbcon,$lststf);
                                            while($data=$conn->fetch($stfRun)){
                                                ?>
                                                <option value="<?php echo $data['voka_id']; ?>"><?php echo $data['fst_name']." ".$data['lst_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="statused" class="select form-control" id="compstatus">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success">Edit Company</button></td>
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
<!-- /EDIT COMPANY -->
<!-- ADD POSITION MODAL -->
<div id="position" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">ADD POSITION</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Position:</td>
                                    <td><input type="text" name="positionadd" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Create</button></td>
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
<!-- /ADD POSITION -->
<!-- ADD SALARY RULE -->
<div id="salrule" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">ADD SALARY RULE</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="salary_rules" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Rule Type:</td>
                                    <td>
                                        <select name="ruletype" class="form-control">
                                            <option value="Earning">Earning</option>
                                            <option value="Deduction">Deduction</option>
                                            <option value="Reimbursement">Reimbursement</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">
                                        <label><input type='checkbox' onchange='handleClick(this);' id="basicbox"> Dependent On Basic?</label>
                                    </td>
                                    <td align="left">
                                        <input type='number' step="any" min="0" class="form-control hidden" name="baseval" id="basicval" value="0"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Create</button></td>
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
<div id="salruleedit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">EDIT SALARY RULE</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="salaryruleid" class="form-control" id="salaryruleid"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="salary_ruleedit" class="form-control" id="salaryruleedit"/></td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="status" class="form-control" id="salrulestatus">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Create</button></td>
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
<!-- /ADD SALARY RULE -->
<!-- STAFF SALARY STRUCTURE -->



<!-- /STAFF SALARY STRUCTURE -->
<!-- ADD ACCOUNT TYPE MODAL -->
<div id="expenseaccount" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">ADD Expense Account Type</h3>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Account Name:</td>
                                    <td><input type="text" name="expaccounts" class="form-control" required /></td>
                                </tr>
                                <tr>
                                    <td align="right">Tax Identification Number (TIN):</td>
                                    <td><input type="text" name="tin" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Signatory:</td>
                                    <td>
                                        <select name="signatory" class="form-control" required >
                                            <option value=""></option>
                                            <?php
                                            $sign="SELECT * FROM staff_rec WHERE position !='Staff' ORDER BY fst_name ASC";
                                            $signqry=$conn->query($dbcon,$sign);
                                            while($data=$conn->fetch($signqry)){
                                                ?>
                                                <option value="<?php echo $data['voka_id']; ?>"><?php echo $data['fst_name']." ".$data['lst_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Logo:</td>
                                    <td>
                                        <input type="file" name="explogo" class="form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Create</button></td>
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
<!-- /ADD ACCOUNT TYPE -->
<!-- EDIT ACCOUNT TYPE MODAL -->
<div id="expenseaccountedit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Update Expense Account</h3>
            </div>
            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name="did" value="" id="did" />
                    <div class="row" id="hidethis">
                        <div class="col-md-12" id="explogoimg" align="center">

                        </div>
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Account Name:</td>
                                    <td><input type="text" name="expaccounts" class="form-control" required id='accountedit'/></td>
                                </tr>
                                <tr>
                                    <td align="right">Tax Identification Number (TIN):</td>
                                    <td><input type="text" name="tin" class="form-control" id="tinedit"/></td>
                                </tr>
                                <tr>
                                    <td align="right">Signatory:</td>
                                    <td>
                                        <select name="signatoryedit" class="form-control" required id='signatoryedit'>
                                            <?php
                                            $sign="SELECT * FROM staff_rec WHERE position !='Staff' ORDER BY fst_name ASC";
                                            $signqry=$conn->query($dbcon,$sign);
                                            while($data=$conn->fetch($signqry)){
                                                ?>
                                                <option value="<?php echo $data['voka_id']; ?>"><?php echo $data['fst_name']." ".$data['lst_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="expacctstatus" class="form-control" id="expacctstatus">
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
<!-- /EDIT ACCOUNT TYPE -->
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
                            <p style="font-weight: bold; font-style: italics; color: #FD550F; text-align: center;"><b>Note:</b><br>
                                Enter a percentage value in the percentage text box. Use (-) for deducible taxes. Eg: -7.5
                            </p>
                        </div>
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Tax ID:</td>
                                    <td><input type="text" name="taxid" class="form-control" required placeholder="Eg: VAT,NHIA" maxlength="5"/></td>
                                </tr>
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
<!-- /TAX CONFIG -->
<!-- EDIT TAX CONFIG -->
<div id="taxedit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Edit Tax</h3>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <p style="font-weight: bold; font-style: italics; color: #FD550F; text-align: center;"><b>Note:</b><br>
                                Enter a percentage value in the percentage text box. Use (-) for deducible taxes. Eg: -7.5%
                            </p>
                        </div>
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Tax ID:</td>
                                    <td><input type="text" name="taxid" class="form-control" required placeholder="Eg: VAT,NHIA" maxlength="5" id='taxid' readonly /></td>
                                </tr>
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="taxnameedit" class="form-control" required id='taxname'/></td>
                                </tr>
                                <tr>
                                    <td align="right">Percentage Value (%):</td>
                                    <td><input type="number" name="percentage" class="form-control" required step="any" id='percentage'/></td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="status" class="form-control" id="taxstatus">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </td>
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
<!-- /EDIT TAX CONFIG -->


<!-- ADD HOSPITAL MODAL -->
<div id="hospital" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">REGISTER HOSPITAL iconCILITY</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="hospname" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Location:</td>
                                    <td><input type="text" name="location" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Address:</td>
                                    <td><input type="text" name="address" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Contact:</td>
                                    <td><input type="text" name="contact" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">E-mail:</td>
                                    <td><input type="email" name="hospemail" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Website:</td>
                                    <td><input type="text" name="website" class="form-control" /></td>
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
<!-- /ADD HOSPITAL -->
<!-- ADD HOLIDAY MODAL -->
<div id="addholiday" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">ADD HOLIDAY</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="holiday" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Date:</td>
                                    <td><input type="date" name="hdate" class="form-control" placeholder="Date"/></td>
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
<!-- /ADD HOLIDAY -->


<!-- PV REPORT MODAL -->
<div id="interview" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Invite Applicant For Interview</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <input type="hidden"  id='aptjobid' name="aptjobemail"/>
                    <input type="hidden"  id='aptjobemail' name="aptjobid"/>
                    <input type="hidden"  name="career_app"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Date:</td>
                                    <td><input type="date" name="intdate" class="form-control" value="<?php echo date('Y-m-d'); ?>" required="required" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Time:</td>
                                    <td><input type="time" name="inttime" class="form-control" required="required"/></td>
                                </tr>
                                <tr>
                                    <td align="right">Digital Address:</td>
                                    <td><input type="text" name="intloc" class="form-control" required="required"/></td>
                                </tr>
                                <tr>
                                    <td align="right">Other Details:</td>
                                    <td><textarea class="form-control" maxlength="200" rows="5" required="required" name="intoth"></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Invite</button></td>
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

<div id="statuspvreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">General Payment Voucher Report</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <input type="hidden" name='expclsid' id='expclsid'/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td>PV Status</td>
                                    <td>
                                        <select name="pvstatus" class="form-control" required>
                                            <option value=""></option>
                                            <option value="Confirmed">Confirmed</option>
                                            <option value="supApproved">Supervisor Approvals</option>
                                            <option value="supReject">Supervisor Rejections</option>
                                            <option value="cfoApproved">Accounts Department Approvals</option>
                                            <option value="cfoReject">Accounts Department Rejections</option>
                                            <option value="Approved">Managing Director Approvals</option>
                                            <option value="dirReject">Managing Director Rejections</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Start Date:</td>
                                    <td><input type="date" name="sdate" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">End Date:</td>
                                    <td><input type="date" name="edate" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="statuspvreport">View</button></td>
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
<!-- PV REPORT MODAL -->
<!-- PV REPORT MODAL -->
<div id="expensepvreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Expense Account Payment Voucher Report</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <input type="hidden" name='expclsid' id='expclsid'/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Expense Account</td>
                                    <td>
                                        <select class="form-control" name="compExp" required >
                                            <option value=""></option>
                                            <?php
                                            $sel="SELECT * FROM pvexpense WHERE status='Active'";
                                            $selqry=$conn->query($dbcon,$sel);
                                            while($data=$conn->fetch($selqry)){
                                                ?>
                                                <option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Start Date:</td>
                                    <td><input type="date" name="pvrepsd" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">End Date:</td>
                                    <td><input type="date" name="pvreped" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="expensepvreport">View</button></td>
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

<div id="bankpvreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Bank Payment Voucher Report</h3>
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
                                            <option value=""></option>
                                            <?php
                                            $sel="SELECT * FROM banks WHERE status='Active' ORDER BY name ASC";
                                            $selqry=$conn->query($dbcon,$sel);
                                            while($data=$conn->fetch($selqry)){
                                                ?>
                                                <option value="<?php echo $data['bankcode'].'*'.$data['name']; ?>"><?php echo $data['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Start Date:</td>
                                    <td><input type="date" name="pvrepsd" class="form-control" value="<?php echo date('Y-m-d') ?>" /></td>
                                </tr>
                                <tr>
                                    <td align="right">End Date:</td>
                                    <td><input type="date" name="pvreped" class="form-control" value="<?php echo date('Y-m-d') ?>" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="bankpvreport">View</button></td>
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
                                            <option value=""></option>
                                            <option value="<?php echo 'All*All Banks'; ?>">All Banks</option>
                                            <?php
                                            $sel="SELECT * FROM banks WHERE status='Active' order by name ASC";
                                            $selqry=$conn->query($dbcon,$sel);
                                            while($data=$conn->fetch($selqry)){
                                                ?>
                                                <option value="<?php echo $data['bankcode'].'*'.$data['name']; ?>"><?php echo $data['name']; ?></option>
                                            <?php } ?>
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

<div id="categorypvreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Expense Category Payment Voucher Report</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Expense Category</td>
                                    <td>
                                        <select class="form-control" name="category" required >
                                            <option value=""></option>
                                            <?php
                                            $sel="SELECT * FROM expensecls WHERE status='Active' ORDER BY name ASC";
                                            $selqry=$conn->query($dbcon,$sel);
                                            while($data=$conn->fetch($selqry)){
                                                ?>
                                                <option value="<?php echo $data['expcode'].'*'.$data['name']; ?>"><?php echo $data['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Start Date:</td>
                                    <td><input type="date" name="pvrepsd" class="form-control" value="<?php echo date('Y-m-d') ?>" /></td>
                                </tr>
                                <tr>
                                    <td align="right">End Date:</td>
                                    <td><input type="date" name="pvreped" class="form-control" value="<?php echo date('Y-m-d') ?>" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="categorypvreport">View</button></td>
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
<div id="typepvreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Payment Voucher Type Report</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <input type="hidden" name='expclsid' id='expclsid'/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">PV Type</td>
                                    <td>
                                        <select class="form-control" name="exptype" required >
                                            <option value=""></option>
                                            <?php
                                            $sel="SELECT * FROM pvtype WHERE status='Active'";
                                            $selqry=$conn->query($dbcon,$sel);
                                            while($data=$conn->fetch($selqry)){
                                                ?>
                                                <option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Start Date:</td>
                                    <td><input type="date" name="pvrepsd" class="form-control" value="<?php echo date('Y-m-d') ?>" /></td>
                                </tr>
                                <tr>
                                    <td align="right">End Date:</td>
                                    <td><input type="date" name="pvreped" class="form-control" value="<?php echo date('Y-m-d') ?>" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="typepvreport">View</button></td>
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
<div id="addexamsmodal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title" id="sbjname"></h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <input type="hidden" name='examid' id='examid'/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Exams Score:</td>
                                    <td><input type="number" name="score" class="form-control" step="any" min="0" value="0"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="addexams"><span class="icon icon-graduation2"></span>   ADD SCORE</button></td>
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
<div id="companypvreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Departmental Payment Voucher Report</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Department</td>
                                    <td>
                                        <select class="form-control" name="company" required >
                                            <option value=""></option>
                                            <?php
                                            $sel="SELECT * FROM departments WHERE status='Active'";
                                            $selqry=$conn->query($dbcon,$sel);
                                            while($data=$conn->fetch($selqry)){
                                                ?>
                                                <option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Start Date:</td>
                                    <td><input type="date" name="pvrepsd" class="form-control" value="<?php echo date('Y-m-d') ?>" /></td>
                                </tr>
                                <tr>
                                    <td align="right">End Date:</td>
                                    <td><input type="date" name="pvreped" class="form-control" value="<?php echo date('Y-m-d') ?>" /></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="departmentpvreport">View</button></td>
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
<!-- PV REPORT MODAL -->

<!-- EDIT HOSPITAL MODAL -->
<div id="hospitaledit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">EDIT HOSPITAL iconCILITY</h3>
            </div>

            <div class="modal-body">
                <form method="post">
                    <input type="hidden" id="hospid" name="hospid"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td><input type="text" name="hospnameedit" id="hospnameedit" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Location:</td>
                                    <td><input type="text" name="locationedit" id="locationedit" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Address:</td>
                                    <td><input type="text" name="addressedit" id="addressedit" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Contact:</td>
                                    <td><input type="text" name="contactedit" id="contactedit" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">E-mail:</td>
                                    <td><input type="email" name="hospemailedit" id="hospemailedit" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Website:</td>
                                    <td><input type="text" name="websiteedit" id="websiteedit" class="form-control" /></td>
                                </tr>
                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="status" id="hospstatus" class="form-control">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Update Hospital Records</button></td>
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
<!-- /EDIT HOSPITAL -->
<!-- EDIT POSITION-->
<div id="positionEdit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">EDIT POSITION</h3>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="positionID" class="form-control" id="positionID"/>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="table">

                                <tr>
                                    <td align="right">Position:</td>
                                    <td><input type="text" name="posted" class="form-control" id="posted"/></td>
                                </tr>

                                <tr>
                                    <td align="right">Status:</td>
                                    <td>
                                        <select name="statused" class="select form-control" id="poststatus">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success">Edit Position</button></td>
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
<!-- /EDIT POSITION -->
<!-- ERROR MODAL-->
<div id="errormodal" class="modal fade">
    <div class="modal-dialog" style="width: 400px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Ooops!!!</h3>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="text" name="positionID" class="form-control" id="positionID"/>
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">
                            <?php echo $errorMsg; ?>
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
<!-- /ERROR MODALS -->
<!-- BIO DATA MODAL -->
<div id="biodata" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Upload Biodata</h3>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" onsubmit="return checkexcel(this);">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <label>Upload Excel File</label>
                                    <td><input type="file" name="biodata" class="form-control" id="biodata"/>
                                        <p style="font-size: small; color: #FD550F;text-align: center;"><i>File should be in excel format and not more than 4 MB.</i></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success btn-lg"><span class="icon icon-upload10"></span> Upload</button></td>
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
<!-- /BIODATA -->
<!-- EDUCATIONAL CERTIFICATES -->
<div id="uploadcert" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">UPLOAD CERTIFICATE</h3>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" onsubmit="return checkpdf(this);">
                    <input type="hidden" name="certtype" id="certtype" />
                    <input type="hidden" name="profile"/>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <label>Upload PDF File</label>
                                    <td><input type="file" name="educcert" class="form-control" id="certificate" onchange="generalfileSize('certificate')" required />
                                        <p id="uplresp" style="font-size: small; color: #FD550F;text-align: center;"><i>File should be in pdf format and not more than 10 MB.</i></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success">Upload</button></td>
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
<!-- /EDUCATIONAL CERTIFICATE -->
<!--EDIT BIO DATA MODAL -->
<div id="editbiodata" class="modal fade">
    <div class="modal-dialog" style="width: 1200px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Edit Staff Biodata</h3>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <!--BEGINNING-->
                            <div class="col-md-12" align="center">
                                <img src="<?php echo $myImg; ?>" width="100" height="100" class="img-rounded"/>
                            </div>
                            <div class="col-md-12">
                                <div class="tabs">
                                    <ul class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#employee" data-toggle="tab"><i class="icon icon-user icon-chk">Personal</i></a>
                                        </li>
                                        <li>
                                            <a href="#contact" data-toggle="tab"><i class="icon icon-phone icon-chk">Contact</i></a>
                                        </li>
                                        <li>
                                            <a href="#family" data-toggle="tab"><i class="icon icon-users icon-chk">Family</i> </a>
                                        </li>
                                        <li>
                                            <a href="#kin" data-toggle="tab"><i class="icon icon-rocket icon-chk">Next Of Kin/Dependant</i></a>
                                        </li>
                                        <li>
                                            <a href="#emergency" data-toggle="tab"><i class="icon icon-chopper icon-chk">Emergency</i> </a>
                                        </li>
                                        <li>
                                            <a href="#education" data-toggle="tab"><i class="icon icon-book icon-chk">Academics</i> </a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">

                                        <div id="employee" class="tab-pane active">
                                            <p class="primary">Employee Personal Details</p>
                                            <div class="row" align="center">
                                                <div class="col-md-12">
                                                    <table width="100%" class="table table-responsive">
                                                        <tbody>
                                                        <tr>
                                                            <td align="right" class="first">Surname:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="lst_name"/></td>
                                                            <td align="right" class="first">First Name:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="fst_name"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Other Names:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="oname"/></td>
                                                            <td align="right" class="first">Previous Name:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="prevname"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Title:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="title"/></td>
                                                            <td align="right" class="first">Date Of Birth:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="dob"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Gender:</td>
                                                            <td align="left" class="second"><select name="gender" class="form-control">
                                                                    <option value="male">Male</option>
                                                                    <option value="female">Female</option>
                                                                </select>
                                                            </td>
                                                            <td align="right" class="first">Marital Status:</td>
                                                            <td align="left" class="second">
                                                                <select name="mar_status" class="form-control">
                                                                    <option value="single">Single</option>
                                                                    <option value="married">Married</option>
                                                                    <option value="divorced">Divorced</option>
                                                                    <option value="widow">Widow</option>
                                                                    <option value="widower">Widower</option>
                                                                </select></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Spouse Name:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="spouse"/></td>
                                                            <td align="right" class="first">Spouse's Date Of Birth:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="spousedob"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Place Of Birth:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="pob"/></td>
                                                            <td align="right" class="first">Religion:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="religion"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">SSNIT Number:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="ssnit"/></td>
                                                            <td align="right" class="first">Bank Account Number:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="bankacct"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Bank Name:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="bankname"/></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="contact" class="tab-pane">
                                            <p>Contact Details</p>
                                            <div class="row" align="center">
                                                <div class="col-md-12">
                                                    <table width="100%" class="table table-responsive">
                                                        <tbody>
                                                        <tr>
                                                            <td align="right" class="first">Address:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="addrs"/></td>
                                                            <td align="right" class="first">City / Town:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="town"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Region:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="region"/></td>
                                                            <td align="right" class="first">Country:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="country"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Phone:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="phone"/></td>
                                                            <td align="right" class="first">Mobile:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="mobile"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Email:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="email"/></td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="family" class="tab-pane">
                                            <p>Family Details</p>
                                            <div class="row" align="center">
                                                <div class="col-md-12">
                                                    <table width="100%" class="table table-responsive">
                                                        <tbody>
                                                        <tr>
                                                            <td align="right" class="first">iconther's Name:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="iconther"/></td>
                                                            <td align="right" class="first">iconther's Date Of Birth:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="icontherdob"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Mother's Name:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="mother"/></td>
                                                            <td align="right" class="first">Mother's Date Of Birth:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="motherdob"/></td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="kin" class="tab-pane">
                                            <p>Next Of Kin / Dependant Details</p>
                                            <div class="row" align="center">
                                                <div class="col-md-12">
                                                    <table width="100%" class="table table-responsive">
                                                        <tbody>
                                                        <tr>
                                                            <td colspan="4"><h3>Next Of Kin</h3></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Name:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="kinname"/></td>
                                                            <td align="right" class="first">Relationship With Employee:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="kinrel"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Residential Address:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="kinaddr"/></td>
                                                            <td align="right" class="first">Business Address:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="kinbus"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Phone:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="kinphone"/></td>
                                                            <td align="right" class="first">Mobile 1:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="kinmob1"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Mobile 2:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="kinmob2"/></td>
                                                            <td align="right" class="first">Email Address:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="kinmail"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="4"><h3>Dependant Details</h3></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Name:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="depname"/></td>
                                                            <td align="right" class="first">Relationship:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="deprel"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Date Of Birth:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="depdob"/></td>
                                                            <td align="right" class="first">Address:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="depaddr"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Phone Number:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="depphone"/></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="emergency" class="tab-pane">
                                            <p>Emergency Details</p>
                                            <div class="row" align="center">
                                                <div class="col-md-12">
                                                    <table width="100%" class="table table-responsive">
                                                        <tbody>
                                                        <tr>
                                                            <td align="right" class="first">Name:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="emgname"/></td>
                                                            <td align="right" class="first">Relationship With Employee:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="emgrel"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Residential Address:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="emgres"/></td>
                                                            <td align="right" class="first">Business Address:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="emgbus"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Phone:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="emgphone"/></td>
                                                            <td align="right" class="first">Mobile 1:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="emgmob1"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Mobile 2:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="emgmob2"/></td>
                                                            <td align="right" class="first">Personal Email:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="emgmail"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Work Email:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="emgworkmail"/></td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="education" class="tab-pane">
                                            <p>Education / Academic Details</p>
                                            <div class="row" align="center">
                                                <div class="col-md-12">
                                                    <table width="100%" class="table table-responsive">
                                                        <tbody>
                                                        <tr>
                                                            <td align="left" class="first" colspan="4" style="font-weight: bold; font-size:medium">Educational Details (1)</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Qualification:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="hqual"/></td>
                                                            <td align="right" class="first">Institution:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="hinst"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Date Completed:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="hcompl"/></td>
                                                            <td align="right" class="first">Duration:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="hdur"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Professional Qualification:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="hprof"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" class="first" colspan="4" style="font-weight: bold; font-size:medium">Educational Details (2)</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Qualification:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="mqual"/></td>
                                                            <td align="right" class="first">Institution:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="minst"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Date Completed:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="mcompl"/></td>
                                                            <td align="right" class="first">Duration:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="mdur"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left" class="first" colspan="4" style="font-weight: bold; font-size:medium">Educational Details (3)</td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Qualification:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="lqual"/></td>
                                                            <td align="right" class="first">Institution:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="linst"/></td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="first">Date Completed:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="lcompl"/></td>
                                                            <td align="right" class="first">Duration:</td>
                                                            <td align="left" class="second"><input type="text" value="" class="form-control" name="ldur"/></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end-->
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
<!-- /EDIT BIODATA -->
<!-- COMPANY DOCS -->
<div id="companydocupl" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Company Policy Document Upload</h3>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" onsubmit="return checkpdf(this);">
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>

                                    <td><label>Title</label><input type="text" name="title" class="form-control" required /></td>
                                </tr>
                                <tr>

                                    <td><label>Upload Document</label><input type="file" name="compdoc" class="form-control" id="compdoc" onchange="generalfileSize('compdoc')" required />
                                        <p id="uplresp" style="font-size: small; color: #FD550F;text-align: center;"><i>File should not be more than 5 MB.</i></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success">Upload</button></td>
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
<!-- /COMPANY DOCS -->
<!-- EDIT COMPANY DOCS -->
<div id="editcompanydocupl" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Company Policy Document Edit</h3>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data" onsubmit="return checkpdf(this);">
                    <input type="hidden" name="docid" id="docid"/>
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>

                                    <td><label>Title</label><input type="text" name="title" class="form-control" required id="poledittitle"/></td>
                                </tr>
                                <tr>

                                    <td> <label>Change Document?</label>
                                        <select id="doceditchkbox" class="form-control" onchange="compimgupl()">
                                            <option value="no">no</option>
                                            <option value="yes">yes</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>

                                    <td> <label>Status</label>
                                        <select id="docstatus" name="docstatus" class="form-control">
                                            <option value="Active">Active</option>
                                            <option value="Inactive">Inactive</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="hidden" id="imghidedoc">

                                    <td><label>Upload Document</label><input type="file" name="compeditdoc" class="form-control" id="compdoc" onchange="generalfileSize('compdoc')" />
                                        <p id="uplresp" style="font-size: small; color: #FD550F;text-align: center;"><i>File should be in pdf format and not more than 10 MB.</i></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success">Update</button></td>
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
<!-- /EDIT COMPANY DOCS -->
<!-- ATTENDANCE REPORT -->
<div id="clockinrpt" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Attendance Report</h3>
            </div>

            <div class="modal-body">
                <form method="get" onsubmit="return checkdate()">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Staff</label>
                            <select name="staffIDrpt" class="select form-control" required>
                                <?php if($dstaff !="" || $accounts !=""){ ?><option value="All">All</option><?php }?>
                                <?php
                                if($dstaff !="" || $accounts !=""){
                                    $sel="SELECT * FROM staff_rec ORDER BY fst_name ASC";
                                }
                                else{
                                    $sel="SELECT * FROM staff_rec WHERE staff_id='$stfID'";
                                }
                                $selRun=$conn->query($dbcon,$sel);
                                while($row=$conn->fetch($selRun)){
                                    ?>
                                    <option value="<?php echo $row['staff_id'] ?>"><?php echo $row['fst_name']." ".$row['lst_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Start Date</label>
                            <input type="date" name="startDate" class="form-control" id="startDate" value="<?php echo date("Y-m-d"); ?>" required />
                        </div>
                        <div class="col-md-4">
                            <label>End Date</label>
                            <input type="date" name="endDate" class="form-control" id="endDate" required  value="<?php echo date("Y-m-d"); ?>" />
                        </div>
                    </div>
                    <div class="row" style="padding-top: 2%">
                        <div class="col-md-12" align="center">
                            <button type="submit" class="btn btn-success btn-lg" name="clockinrpt" onclick="showLoadr()"> View Clock In Report</button>
                            <button type="submit" class="btn btn-warning btn-lg" name="clockoutrpt" onclick="showLoadr()">View Clock Out Report</button>
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

<div id="stfattendance" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Staff Attendance Report</h3>
            </div>

            <div class="modal-body">
                <form method="get" onsubmit="return checkdate()">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Staff</label>
                            <select name="staffid" class="select form-control" required>
                                <?php if($dstaff !="" || $accounts !=""){ ?><option value="All">All</option><?php }?>
                                <?php
                                if($dstaff !="" || $accounts !=""){
                                    $sel="SELECT * FROM staff_rec ORDER BY fst_name ASC";
                                }
                                else{
                                    $sel="SELECT * FROM staff_rec WHERE staff_id='$stfID'";
                                }
                                $selRun=$conn->query($dbcon,$sel);
                                while($row=$conn->fetch($selRun)){
                                    ?>
                                    <option value="<?php echo $row['staff_id'] ?>"><?php echo $row['fst_name']." ".$row['lst_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Start Date</label>
                            <input type="date" name="startDate" class="form-control" id="startDate" required value="<?php echo date('Y-m-d'); ?>"/>
                        </div>
                        <div class="col-md-4">
                            <label>End Date</label>
                            <input type="date" name="endDate" class="form-control" id="endDate" required value="<?php echo date('Y-m-d'); ?>"/>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 2%">
                        <div class="col-md-12" align="center">
                            <button type="submit" class="btn btn-success btn-lg" name="attendancerpt"> View Attendance Report</button>
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
<!-- /CLOCKIN -->
<!-- MEDICAL HISTORY-->
<div id="medhistory" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">VIEW MEDICAL HISTORY</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Select Period</label>
                            <select name="medperiod" class="select form-control" required>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 2%">
                        <div class="col-md-12" align="center">
                            <button type="submit" class="btn btn-success btn-lg"> View History</button>
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
<!-- / MEDICAL HISTORY-->
<!--  MEDICAL REPORT-->
<div id="medreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">STAFF MEDICAL REPORT</h5>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Staff</label>
                            <select name="staffid" class="select form-control" required>
                                <option value="All">All</option>
                                <?php
                                $selstf="SELECT voka_id, fst_name, lst_name FROM staff_rec ORDER BY fst_name ASC";
                                $selRun=$conn->query($dbcon,$selstf);
                                while($data=$conn->fetch($selRun)){
                                    ?>
                                    <option value="<?php echo $data['voka_id']; ?>"><?php echo $data['fst_name']." ".$data['lst_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>User Type</label>
                            <select name="meduser" class="form-control" required>
                                <option value="All">All</option>
                                <option value="staff">staff</option>
                                <option value="dependant">dependant</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Expense Type</label>
                            <select name="medexp" class="form-control" required>
                                <option value="All">All</option>
                                <option value="In Patient">In Patient</option>
                                <option value="Out Patient">Out Patient</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Facility</label>
                            <select name="medfacility" class="form-control" required>
                                <option value="All">All</option>
                                <?php
                                $selComp="SELECT * FROM hospital WHERE status='Active'";
                                $selCompQry=$conn->query($dbcon,$selComp);
                                while($list=$conn->fetch($selCompQry)){
                                    ?>
                                    <option value="<?php echo $list['name']; ?>"><?php echo $list['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>Period</label>
                            <select name="meddperiod" class="select form-control" required>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 2%">
                        <div class="col-md-12" align="center">
                            <input type="submit" class="btn btn-success btn-lg" name="meddhistory" value="Check Report">
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
<!-- /MEDICAL REPORT-->
<!--  ADD MEDICAL REPORT-->
<div id="addmedical" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">ADD MEDICAL RECORD</h5>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Staff Name</label>
                            <select name="staffid" class="select form-control" required>
                                <?php
                                $selstf="SELECT voka_id, fst_name, lst_name FROM staff_rec WHERE status IN ('Active','Inactive') ORDER BY fst_name ASC";
                                $selRun=$conn->query($dbcon,$selstf);
                                while($data=$conn->fetch($selRun)){
                                    ?>
                                    <option value="<?php echo $data['voka_id']; ?>"><?php echo $data['fst_name']." ".$data['lst_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 2%">
                        <div class="col-md-12" align="center">
                            <input type="submit" class="btn btn-success btn-lg" name="viewmedical" value="View Report">
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
<!-- /ADD MEDICAL REPORT-->

<!-- REVERSAL -->
<div id="reversal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">APPLY FOR REVERSAL</h3>
            </div>

            <div class="modal-body">
                <form method="get" enctype="multipart/form-data">
                    <input type="hidden" name="stafID" class="form-control" id="revstfid"/>
                    <input type="hidden" name="revdate" class="form-control" id="revdate"/>
                    <input type="hidden" name="supervisor" class="form-control" id="revsup"/>
                    <input type="hidden" name="startDate" class="form-control" id="revstart"/>
                    <input type="hidden" name="endDate" class="form-control" id="revend"/>
                    <input type="hidden" name="dtype" class="form-control" id="dtype"/>
                    <input type="hidden" name="rtime" class="form-control" id="rtime"/>
                    <input type="hidden" name="staffIDrpt" class="form-control" id="transID"/>
                    <input type="hidden" name="revedit"/>

                    <div class="row">
                        <div class="col-md-12" id="hiddentype">
                            <table width="100%" class="table">

                                <tr>
                                    <td align="right">Penalty:</td>
                                    <td><input type="number" name="penalty" class="form-control" id="revpen" step="any"/></td>
                                </tr>
                                <tr>
                                    <td align="right">Reason:</td>
                                    <td><textarea rows="3" maxlength="100" class="form-control" name="description"></textarea></td>
                                </tr>

                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success">Apply</button></td>
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
<!-- /REVERSAL -->
<!-- SUMMARY REPORT -->
<div id="summaryrpt" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Attendance Report</h3>
            </div>

            <div class="modal-body">
                <form method="get" onsubmit="return checkdate()">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Month</label>
                            <select class="form-control" name="dmonth">
                                <option value="1">January</option>
                                <option value="2">February</option>
                                <option value="3">March</option>
                                <option value="4">April</option>
                                <option value="5">May</option>
                                <option value="6">June</option>
                                <option value="7">July</option>
                                <option value="8">August</option>
                                <option value="9">September</option>
                                <option value="10">October</option>
                                <option value="11">November</option>
                                <option value="12">December</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Year</label>
                            <select class="form-control" name="dyear">
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding-top: 2%">
                        <div class="col-md-12" align="center">
                            <button type="submit" class="btn btn-success btn-lg" name="summaryrpt"> View Summary</button>
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
<!-- /SUMMARY -->

<!--SAFF RECRUITMENT -->
<div id="recruit" class="modal fade">
    <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Staff Recruitment Need</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="table-responsive">
                        <div id="collapse1One" class="accordion-body collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Expense Account</label>
                                        <select class="form-control" name="expacct" required >
                                            <option value=""></option>
                                            <?php
                                            $sel="SELECT * FROM pvexpense WHERE status='Active'";
                                            $selqry=$conn->query($dbcon,$sel);
                                            while($data=$conn->fetch($selqry)){
                                                ?>
                                                <option value="<?php echo $data['name']; ?>"><?php echo $data['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin: 2%;">
                                    <div class = "col-lg-12" align="center">
                                        <input type="submit" value="PROCEED" class="btn btn-lg btn-success" name="applyrecruit"/>
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
<!-- END RECRUITMENT -->
<!-- LOAN APPLICATION -->
<div id="generateloan" class="modal fade">
    <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Loan Application Form</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="table-responsive">
                        <div id="collapse1One" class="accordion-body collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Loan Amount:</label>
                                        <input type="number" step="any" class="form-control" name="loanamount" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Reason For Loan</label>
                                        <textarea name="reason" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Duration Of Loan</label>
                                        <select class="form-control" name="duration" required>
                                            <option value=""></option>
                                            <option value="6">6 Months</option>
                                            <option value="12">12 Months</option>
                                            <option value="18">18 Months</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row" style="margin: 2%">
                                    <div class = "col-lg-12" align="center">
                                        <input type="submit" value="Proceed With Loan Application" class="btn btn-lg btn-success" name="loancreate"/>
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
<!-- END LOAN APPLICATION -->
<!-- PERMISSIONL -->
<div id="permit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">PERMISSION</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <input type="hidden" name="permitid" value="<?php echo $vokaId; ?>" />
                    <input type="hidden" name="permissions" />
                    <div class="row">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Type:</td>
                                    <td>
                                        <select name="type" class="select form-control" required>
                                            <option value=""></option>
                                            <option value="clock_in">Clock In</option>
                                            <option value="clockout">Clock Out</option>
                                            <option value="both">Both</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Reason:</td>
                                    <td>
                                        <textarea name="reason" class="form-control" maxlength="100" rows="2"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Start Date:</td>
                                    <td><input type="date" name="date" min="<?php echo date("Y-m-d",(strtotime(date("Y-m-d")) + 86400)); ?>" class="form-control" value="<?php echo date("Y-m-d",(strtotime(date("Y-m-d")) + 86400)); ?>"/></td>
                                </tr>
                                <tr>
                                    <td align="right">End Date:</td>
                                    <td><input type="date" name="enddate" min="<?php echo date("Y-m-d",(strtotime(date("Y-m-d")) + 86400)); ?>" class="form-control" value="<?php echo date("Y-m-d",(strtotime(date("Y-m-d")) + 86400)); ?>"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success">Apply</button></td>
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
<!-- /ADD PERMISSION -->
<!-- LEAVE APPLICATION -->
<div id="leave_application" class="modal fade">
    <div class="modal-dialog" style="width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">LEAVE APPLICATION</h3>
            </div>

            <div class="modal-body">
                <?php
                $chklv="SELECT * FROM staff_leave WHERE voka_id='$vokaId' AND status IN ('Pending','HR Pending','Authorized','Approved')";
                $chklvRun=$conn->query($dbcon,$chklv);
                if($conn->sqlnum($chklvRun) < 1){
                    ?>
                    <form method="post">
                        <input type="hidden" name="leave_application" />
                        <div class="row">
                            <div class="col-md-6">
                                <label>Leave Type:</label><select class="form-control" name="leaveType" id="leaveType" required onchange="decideLeaveDays()">
                                    <option value='' selected></option>
                                    <option value='Annual'>Annual</option>
                                    <option value='Compassionate'>Compassionate</option>
                                    <option value='Maternity'>Maternity</option>
                                    <option value='Paternity'>Paternity</option>
                                    <option value='Sick'>Sick</option>
                                    <option value='Study'>Study</option>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Leave Days Taken:</label>
                                <input type="text" name="leavesTaken" value="10" readonly disabled id="hiddenpatLeaves" class="form-control hidden"/>
                                <input type="text" name="leavesTaken" value="88" readonly disabled id="hiddenmatLeaves" class="form-control hidden"/>
                                <input type="text" name="leavesTaken" value="5" readonly disabled id="hiddenstdLeaves" class="form-control hidden"/>
                                <select class="form-control" name="leavesTaken" id="leavesTaken" disabled required onchange="resetbtn()">
                                    <option value="">--Select Leave Days --</option>
                                    <?php for ($x = 1; $x <= $leavedays; $x++) {?>
                                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                    <?php } ?>
                                </select>
                                <select class="form-control hidden" name="leavesTaken" id="hiddencompassion" disabled required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <label>Start Date:</label><input type="date" value="<?php echo date('Y-m-d',strtotime(date('Y-m-d'))+86400); ?>"  min="<?php echo date('Y-m-d',strtotime(date('Y-m-d'))+86400); ?>" class="form-control" name="startDate" id="lvstartDate"/>
                            </div>
                            <div class="col-md-1" align="left">
                                <label>Click</label><br>
                                <a onclick="return updateLeave()" id="updatebtn"><span class="icon icon-calendar" style="color: #1B5E20; font-weight: bolder; font-size: xx-large"></span></a>
                            </div>
                            <div class="col-md-6">
                                <label>Replaced By:</label>

                                <select class="form-control" name="replacedBy" id="replacedBy">
                                    <option value='' selected></option>
                                    <?php
                                    $getStf="SELECT voka_id, fst_name, lst_name FROM staff_rec WHERE voka_id !='$vokaId' AND status !='Detached' ORDER BY fst_name ASC";
                                    $getStfQry=$conn->query($dbcon,$getStf);
                                    while($data=$conn->fetch($getStfQry)){
                                        ?>
                                        <option value='<?php echo $data['voka_id']; ?>'><?php echo $data['fst_name']." ".$data['lst_name']; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>End Date:</label><input type="text" class="form-control" name="endDate" id="lvendDate" readonly />
                            </div>
                            <div class="col-md-6">
                                <label>Resumed Date:</label><input type="text"  class="form-control" name="resumedDate" id="resumeDate" readonly/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Handing Over Note:</label><textarea name="note"  class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" align="center" style="padding: 2%">
                                <input type="submit" value="Apply For Leave" name="leave_application" class="hidden btn btn-lg btn-success" id="submitbtn"/>
                            </div>
                        </div>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'note' );
                        </script>
                    </form>
                <?php }else{ ?>
                    <h5>Sorry! You Already Have Pending Leave Applications</h5>
                <?php } ?>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<!-- PROJECT CREATION -->
<div id="create_project" class="modal fade">
    <div class="modal-dialog" style="width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">PROJECT CREATION</h3>
            </div>

            <div class="modal-body">
                    <form method="get">
                        <input type="hidden" name="project_create" />
                        <div class="row" style="padding: 1%">
                            <div class="col-md-4" align="right"><label>TITLE</label></div>
                            <div class="col-md-8" align="left"><input type="text" name="pro_title" class="form form-control" /> </div>
                        </div>
                        <div class="row" style="padding: 1%">
                            <div class="col-md-4" align="right"><label>DESCRIPTION</label></div>
                            <div class="col-md-8" align="left"><textarea name="pro_descr" class="form form-control" rows="4" maxlength="300"></textarea> </div>
                        </div>
                        <div class="row" style="padding: 1%">
                            <div class="col-md-4" align="right"><label>START DATE</label></div>
                            <div class="col-md-8" align="left"><input type="date" name="pro_sdate" class="form form-control" value="<?php echo date('Y-m-d') ?>" min="<?php echo date('Y-m-d') ?>"/> </div>
                        </div>
                        <div class="row" style="padding: 1%">
                            <div class="col-md-4" align="right"><label>END DATE</label></div>
                            <div class="col-md-8" align="left"><input type="date" name="pro_edate" class="form form-control" value="<?php echo date('Y-m-d') ?>" min="<?php echo date('Y-m-d') ?>" /> </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" align="center" style="padding: 2%">
                                <input type="submit" value="Create Projet" name="create_project" class="btn btn-lg btn-success"/>
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

<!-- PROJECT REVIEW -->
<div id="rev_project" class="modal fade">
    <div class="modal-dialog" style="width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">REVIEW PROJECT</h3>
            </div>

            <div class="modal-body">
                
                <div class="hidden" id="prevform">
                    <form method="get">
                        <input type="hidden" id="previd" name="previd" />
                        <input type="hidden"  name="view_project" />
                        <input type="hidden" name="revstf" value="<?php echo $vokaId; ?>"/>
                        <table class="table">
                            <tr>
                                <td><p style="text-align: right; font-weight: bold; color: #FD550F">TITLE</p></td>
                                <td><p id="prevtitle" style="text-align: left; color: #8e080d"></p></td>
                            </tr>
                            <tr>
                                <td><p style="text-align: right; font-weight: bold; color: #FD550F">DESCRIPTION</p></td>
                                <td><p id="prevdesc" style="text-align: left; color: #8e080d"></p></td>
                            </tr>
                            <tr>
                                <td colspan="2"><p style="text-align: center; font-weight: bold; color: #FD550F">PLEASE PROVIDE YOUR FEEDBACK</p></td>
                            </tr>
                            <tr>
                                <td colspan="2"><textarea class="form-control" maxlength="500" rows="50" name="previewnote"></textarea> </td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right"><button type="submit" name="submit_uat" class="btn btn-lg btn-primary"><span class="icon icon-move-right"></span>Submit Feedback</button></td>
                            </tr>
                        </table>
                    </form>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'previewnote' );
                    </script>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="rev_project_view" class="modal fade">
    <div class="modal-dialog" style="width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">REVIEW PROJECT</h3>
            </div>

            <div class="modal-body">
                <div class="hidden" id="prevform_view">
                    <table class="table">
                        <tr>
                            <td><p style="text-align: right; font-weight: bold; color: #FD550F">TITLE</p></td>
                            <td><p id="prevtitle_view" style="text-align: left; color: #8e080d"></p></td>
                        </tr>
                        <tr>
                            <td><p style="text-align: right; font-weight: bold; color: #FD550F">DESCRIPTION</p></td>
                            <td><p id="prevdesc_view" style="text-align: left; color: #8e080d"></p></td>
                        </tr>
                        <tr>
                            <td><p style="text-align: right; font-weight: bold; color: #FD550F">FEEDBACK</p></td>
                            <td><p id="prevfback_view" style="text-align: left; color: #8e080d"></p></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- CAREER CREATION -->
<div id="careers" class="modal fade">
    <div class="modal-dialog" style="width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">CAREER CREATION</h3>
            </div>

            <div class="modal-body">
                    <form method="get">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Job Title:</label><input type="text" required name="jobtitle" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label>Company:</label>
                                <select class="form-control" name="company" required>
                                    <option value="Undisclosed">Undisclosed</option>
                                    <?php
                                    $sel="SELECT name,status FROM company WHERE status='Active'";
                                    $selrun=$conn->query($dbcon,$sel);
                                    while($rows=$conn->fetch($selrun)) {?>
                                        <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Job Type:</label>

                                <select class="form-control" name="jobtype">
                                    <option value='' selected></option>
                                    <option value='Full Time'>Full Time</option>
                                    <option value='Part Time'>Part Time</option>
                                    <option value='Contract'>Contract</option>

                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>Deadline:</label><input type="date" class="form-control" name="deadline" value="<?php echo date("Y-m-d"); ?>" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Job Description:</label><textarea name="career_note"  class="form-control" required></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" align="center" style="padding: 2%">
                                <input type="submit" value="Create Career" class="btn btn-lg btn-success" name="careers" />
                            </div>
                        </div>
                        <script type="text/javascript">
                            CKEDITOR.replace( 'career_note' );
                        </script>
                    </form>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<div id="career_edit" class="modal fade">
    <div class="modal-dialog" style="width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">CAREER UPDATE</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <input type="hidden" name="careerid" id="careerid" />
                    <div class="row">
                        <div class="col-md-6">
                            <label>Job Title:</label><input type="text" required name="jobtitle" id="ejobtitle" class="form-control" />
                        </div>
                        <div class="col-md-6">
                            <label>Company:</label>
                            <select class="form-control" name="company" required id="ecompany">
                                <option value="Undisclosed">Undisclosed</option>
                                <?php
                                $sel="SELECT name,status FROM company WHERE status='Active'";
                                $selrun=$conn->query($dbcon,$sel);
                                while($rows=$conn->fetch($selrun)) {?>
                                    <option value="<?php echo $rows['name']; ?>"><?php echo $rows['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Job Type:</label>

                            <select class="form-control" name="jobtype" id="ejobtype">
                                <option value='Full Time'>Full Time</option>
                                <option value='Part Time'>Part Time</option>
                                <option value='Contract'>Contract</option>

                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Deadline:</label><input type="date" class="form-control" name="deadline" value="" id="edeadline" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Status:</label>

                            <select class="form-control" name="careerstatus">
                                <option value='Active'>Active</option>
                                <option value='Inactive'>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="padding: 20px;">
                        <div class="col-md-12" id="ecareer_note">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" align="center" style="padding: 2%">
                            <input type="submit" value="Update Career" class="btn btn-lg btn-success" name="careers" />
                        </div>
                    </div>
                    <script type="text/javascript">
                        CKEDITOR.replace( 'ecareer_edit' );
                    </script>
                </form>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- END OF CAREER -->

<div id="leave_note" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">HAND OVER NOTE</h3>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12" id="leavenote">

                    </div>
                </div>
                <script type="text/javascript">
                    CKEDITOR.replace( 'dnote' );
                </script>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- /END LEAVE APPLICATION -->
<!-- STAFF TARGETS -->
<!-- STAFF SALARY STRUCTURE -->
<div id="stafftargets" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Staff Appraisal Details</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td>
                                        <select name="stafftarget" class="form-control">
                                            <?php
                                            $selstf="SELECT voka_id, fst_name, lst_name FROM staff_rec WHERE supervisor='$vokaId' AND voka_id !='$vokaId' AND status !='Detached'";
                                            $selrun=$conn->query($dbcon,$selstf);
                                            while($seldata=$conn->fetch($selrun)){
                                                ?>
                                                <option value="<?php echo $seldata['voka_id']; ?>"><?php echo $seldata['fst_name']." ".$seldata['lst_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >View Appraisal Targets</button></td>
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
<div id="viewtargets" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Staff Appraisal Details</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td>
                                        <select name="viewtarget" class="form-control">
                                            <?php
                                            $selstf="SELECT voka_id, fst_name, lst_name FROM staff_rec";
                                            $selrun=$conn->query($dbcon,$selstf);
                                            while($seldata=$conn->fetch($selrun)){
                                                ?>
                                                <option value="<?php echo $seldata['voka_id']; ?>"><?php echo $seldata['fst_name']." ".$seldata['lst_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >View Appraisal Targets</button></td>
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
<!-- END STAFF TARGETS -->
<!-- COMPANY TARGETS -->
<div id="companytargets" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Company Target Setting</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Select Date:</td>
                                    <td>
                                        <select name="compdate" class="form-control" required onchange="checkcomptarget(this.value)">

                                            <option value=""></option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="hide" id="comptargethide">
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Create Company Targets</button></td>
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
<!-- END STAFF TARGETS -->
<!--  COMPANY TARGETS -->
<div id="dept_target" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Add Department Target</h5>
            </div>

            <div class="modal-body">
                <form method="get">
                    <?php
                    $qryy="SELECT name FROM company WHERE voka_id='$vokaId'";
                    $qryyrun=$conn->query($dbcon,$qryy);
                    $ddata=$conn->fetch($qryyrun);
                    ?>
                    <input type="hidden" name="comp" value="<?php echo $ddata['name']; ?>" />
                    <input type="hidden" name="company_target" />
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Target Description:</td>
                                    <td>
                                        <textarea class="form-control" name="descript" required></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><p style="color: #FD550F; font-weight: bold; font-size: medium;">Target Grading</p></td>
                                </tr>
                                <tr>
                                    <td align="right">Grade 1 Description:</td>
                                    <td>
                                        <textarea class="form-control" name="grade[]"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Grade 2 Description:</td>
                                    <td>
                                        <textarea class="form-control" name="grade[]"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Grade 3 Description:</td>
                                    <td>
                                        <textarea class="form-control" name="grade[]"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Grade 4 Description:</td>
                                    <td>
                                        <textarea class="form-control" name="grade[]"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" name="depttarget" class="btn btn-success" >Add Department Target</button></td>
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

<!--//END OF COMPANY TARGET -->

<!-- EDIT TARGET-->
<div id="edittarget" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Edit Target</h5>
            </div>

            <div class="modal-body">
                <form method="get">
                    <input type="text" name="stafftarget" id="targetsttfid"/>
                    <input type="text" name="targetid" id="targetid"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Target Description:</td>
                                    <td id="editdescript">
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">% Rating:</td>
                                    <td>
                                        <input type="number" name="rating" id="edittargetrating" class="form-control" step="any" min="0.01" max="100" placeholder="0.01" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Year:</td>
                                    <td>
                                        <input type="number" name="year"  id="edittargetyear" class="form-control" min="2018" required />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Complete Within:</td>
                                    <td>
                                        <select name="quarter" class="form-control select" required id="editquarter">
                                            <option value="Q1">Q1</option>
                                            <option value="Q2">Q2</option>
                                            <option value="Q3">Q3</option>
                                            <option value="Q4">Q4</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><p style="color: #FD550F; font-weight: bold; font-size: medium;">Target Grading</p></td>
                                </tr>
                                <tr>
                                    <td align="right">Grade 1 Description:</td>
                                    <td id="grade1">

                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Grade 2 Description:</td>
                                    <td id="grade2">

                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Grade 3 Description:</td>
                                    <td id="grade3">

                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Grade 4 Description:</td>
                                    <td id="grade4">

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >Update Staff Target</button></td>
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
<!-- REJECT TARGET -->
<div id="rejecttarget" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Refuse Target</h5>
            </div>

            <div class="modal-body">
                <form method="get">
                    <input type="hidden" name="voka" id="stfrefid"/>
                    <input type="hidden" name="my_target" />
                    <input type="hidden" name="targetyear" id="dtargetyear"/>
                    <input type="hidden" name="targetqt" id="dtargetqt"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td>
                                        <label>State Reason For Disagreeing With Your Target:</label>
                                        <textarea name="staff_reject_target" class="form-control" maxlength="300" rows="4"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center"><button type="submit" class="btn btn-success" >Refuse Target</button></td>
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

<!-- ADD APPRAISAL DATE RECORD -->
<div id="appraisal_date" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Appraisal Date</h5>
            </div>
            <div class="modal-body">
                <form method="get">
                    <input type="hidden" name="appraisal_date" />
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right"><label>Year</label></td>
                                    <td>
                                        <select name="appryear" class="select form-control">
                                            <option value=""></option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>Mid-Year Review Date</label></td>
                                    <td>
                                        <input type="date" name="middate" class="form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>End-Year Review Date</label></td>
                                    <td>
                                        <input type="date" name="enddate" class="form-control" />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2"><button type="submit" class="btn btn-success" >Add Date</button></td>
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

<div id="staff_appraisal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">View Staff Appraisal</h5>
            </div>
            <div class="modal-body">
                <form method="get">
                    <input type="hidden" name="apprstfid" id="apprstfid" value="<?php echo $vokaId; ?>"/>
                    <input type="hidden" name="comp" value="<?php echo $company; ?>"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right"><label>Year</label></td>
                                    <td>
                                        <select name="apprformyear" class="select form-control" id="apprformyear" required>
                                            <option value=""></option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>Review Period</label></td>
                                    <td>
                                        <select name="revperiod" class="form-control" required onchange="checkappraisal()" id="revperiod">
                                            <option value=""></option>
                                            <option value="mid_yr">Mid-Year</option>
                                            <option value="end_yr">End Of Year</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="hidden" id="apprformhide">
                                    <td align="center" colspan="2"><button type="submit" class="btn btn-success" >Proceed</button></td>
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

<!-- SUPERVISOR SELECTS STAFF TO APPRAISE -->
<div id="staffappraise" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Staff Appraisal</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td>
                                        <select name="supervisor_review" class="form-control" id="supstfid">
                                            <?php
                                            $selstf="SELECT voka_id, fst_name, lst_name FROM staff_rec WHERE supervisor='$vokaId' AND status !='Detached'";
                                            $selrun=$conn->query($dbcon,$selstf);
                                            while($seldata=$conn->fetch($selrun)){
                                                ?>
                                                <option value="<?php echo $seldata['voka_id']; ?>"><?php echo $seldata['fst_name']." ".$seldata['lst_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>Year</label></td>
                                    <td>
                                        <select name="apprformyear" class="select form-control" id="supappryear">
                                            <option value=""></option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>Review Period</label></td>
                                    <td>
                                        <select name="revperiod" class="form-control" required onchange="checkstaffrev()" id="suprevperiod">
                                            <option value=""></option>
                                            <option value="mid_yr">Mid-Year</option>
                                            <option value="end_yr">End Of Year</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="hidden" id='suprevhide'>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >View Appraisal</button></td>
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

<!-- HR VIEW STAFF APPRAISALS -->
<div id="appraisecheck" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">View Staff Appraisal</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <input type="hidden" name="midyearappraise" />
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right">Name:</td>
                                    <td>
                                        <select name="voka" class="form-control" required>
                                            <?php
                                            $selstf="SELECT voka_id, fst_name, lst_name FROM staff_rec";
                                            $selrun=$conn->query($dbcon,$selstf);
                                            while($seldata=$conn->fetch($selrun)){
                                                ?>
                                                <option value="<?php echo $seldata['voka_id']; ?>"><?php echo $seldata['fst_name']." ".$seldata['lst_name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>Year</label></td>
                                    <td>
                                        <select name="year" class="select form-control">
                                            <option value=""></option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>Review Period</label></td>
                                    <td>
                                        <select name="period" class="form-control" required>
                                            <option value=""></option>
                                            <option value="mid_yr">Mid-Year</option>
                                            <option value="end_yr">End Of Year</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" >View Appraisal</button></td>
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

<div id="comptreport" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">View Department Appraisal Summary</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right"><label>Unit / Department:</label></td>
                                    <td>
                                        <select name="comp" class="form-control" required>
                                            <?php
                                            $selstf="SELECT name FROM company WHERE status='Active' ORDER BY name ASC";
                                            $selrun=$conn->query($dbcon,$selstf);
                                            while($seldata=$conn->fetch($selrun)){
                                                ?>
                                                <option value="<?php echo $seldata['name']; ?>"><?php echo $seldata['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>Year</label></td>
                                    <td>
                                        <select name="year" class="select form-control">
                                            <option value=""></option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>Review Period</label></td>
                                    <td>
                                        <select name="period" class="form-control" required>
                                            <option value=""></option>
                                            <option value="mid">Mid-Year</option>
                                            <option value="end">End Of Year</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="showcomptarget">View Appraisal</button></td>
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


<div id="compgpoint" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">View Company Staff Grades</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right"><label>Unit / Department:</label></td>
                                    <td>
                                        <select name="comp" class="form-control" required>
                                            <?php
                                            $selstf="SELECT name FROM company WHERE status='Active' ORDER BY name ASC";
                                            $selrun=$conn->query($dbcon,$selstf);
                                            while($seldata=$conn->fetch($selrun)){
                                                ?>
                                                <option value="<?php echo $seldata['name']; ?>"><?php echo $seldata['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>Year</label></td>
                                    <td>
                                        <select name="year" class="select form-control">
                                            <option value=""></option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>Review Period</label></td>
                                    <td>
                                        <select name="period" class="form-control" required>
                                            <option value=""></option>
                                            <option value="mid">Mid-Year</option>
                                            <option value="end">End Of Year</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="compgpoint">View Appraisal</button></td>
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
<div id="compassmt" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Company Staff Grades</h3>
            </div>

            <div class="modal-body">
                <form method="get">
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td align="right"><label>Unit / Department:</label></td>
                                    <td>
                                        <select name="comp" class="form-control" required>
                                            <?php
                                            $selstf="SELECT name FROM company WHERE status='Active' AND voka_id='$vokaId' ORDER BY name ASC";
                                            $selrun=$conn->query($dbcon,$selstf);
                                            while($seldata=$conn->fetch($selrun)){
                                                ?>
                                                <option value="<?php echo $seldata['name']; ?>"><?php echo $seldata['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>Year</label></td>
                                    <td>
                                        <select name="year" class="select form-control">
                                            <option value=""></option>
                                            <option value="2018">2018</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right"><label>Review Period</label></td>
                                    <td>
                                        <select name="period" class="form-control" required>
                                            <option value=""></option>
                                            <option value="mid">Mid-Year</option>
                                            <option value="end">End Of Year</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="compgpoint">View Appraisal</button></td>
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
<!-- REJECT TARGET -->
<div id="stfgencomment" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Add Your General Comment</h5>
            </div>

            <div class="modal-body">
                <form method="get">
                    <input type="text" name="targetid" id="stfrefid"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">
                                <tr>
                                    <td>
                                        <label>State Your General Comment. This will not be seen by your supervisor, so be frank with your view:</label>
                                        <textarea name="staff_reject_target" class="form-control" maxlength="300" rows="4"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center"><button type="submit" class="btn btn-success" >Refuse Target</button></td>
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



<!-- TUTORIALS -->
<div id="tutorials" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Tutorial Upload</h3>
            </div>

            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="dtarget" id="tuttarget" value="Unit"/>
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" border="0">
                                <tr>
                                    <td>
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Description</label>
                                        <textarea name="description" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label>Document Type:</label>
                                        <select name="doctype" class="form-control select" onchange="showtut(this.value)" required>
                                            <option value=""></option>
                                            <option value="file">File</option>
                                            <option value="link">Link</option>
                                            <option value="youtube">Youtube</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="hidden" id="tuthide">
                                        <label>Upload</label>
                                        <input type="file" name="tutfile" class="form-control hidden" id="tfile"/>
                                        <input type="text" name="tuttext" class="form-control hidden"  id="ttext"/>
                                    </td>
                                </tr>
                                <tr>

                                    <td>
                                        <label>Company:</label>
                                        <select name="company" class="form-control select" onchange="showstaff2(this.value)" required>
                                            <option value="All">All</option>
                                            <?php
                                            $sel="SELECT name FROM company WHERE status='Active'";
                                            $selrun=$conn->query($dbcon,$sel);
                                            while($items=$conn->fetch($selrun)){
                                                ?>
                                                <option value="<?php echo $items['name']; ?>"><?php echo $items['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td id="staffpopulatee">

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success" disabled  id="tutdl" name="stutorial">ADD TUTORIAL</button></td>
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

<!-- STAFF PRESENT -->
<div id="staffpresent" class="modal fade">
    <div class="modal-dialog" style="width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="row" id="ptable">
                    <div class="col-md-12">
                        <p style="color: #000; font-weight: bold; text-align: center; font-size: large;">STAFF PRESENT ON <?php echo strtoupper(date("l, d M, Y ",strtotime(date($ddate)))); ?></p>
                        <table class="table-bordered table-striped" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Real Time</th>
                                <th>Rep. Time</th>
                                <th>Time Diff</th>
                                <th>Penalty (GH&cent;)</th>
                                <th>Altered?</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sel="SELECT * FROM clock_in WHERE date='$ddate' AND status='present' ORDER BY time ASC";
                            $selrun=$conn->query($dbcon,$sel);
                            $cont=0;
                            $tot_penalty=0;
                            $minLate="";
                            if($conn->sqlnum($selrun) ==0){
                                echo "No Records Available";
                            }else{
                                while($items=$conn->fetch($selrun)){
                                    $mid=$items['staff_id'];
                                    $penalty=$items['penalty'];
                                    $rdate=$items['date'];
                                    $cont++;
                                    if($items['status']=="absent" || $items['status']=="unsigned"){
                                        $minLate="-";
                                    }
                                    else{
                                        $minLate=$items['time_diff'];
                                    }
                                    $tot_penalty= $tot_penalty + $items['penalty'];
                                    $id= $items['staff_id'];
                                    $selQry="SELECT fst_name, lst_name, start_time, voka_id FROM staff_rec WHERE staff_id='$id'";
                                    $selQryRun=$conn->query($dbcon,$selQry);
                                    $selQryData=$conn->fetch($selQryRun);
                                    $start_time=$selQryData['start_time'];



                                    ?>
                                    <tr>
                                        <td><small><?php echo $cont; ?></small></td>
                                        <td><small><?php echo $selQryData['fst_name']." ".$selQryData['lst_name'];?></small></td>
                                        <td><small><?php echo date("H:i:s A",strtotime(date($start_time)));?></small></td>
                                        <td><small><?php $time=$items['time'];if($time=="00:00:00"){echo "Not Reported";}else{$time=strtotime($time);echo date("H:i:s A",$time);}?></small></td>
                                        <td><small><?php if($minLate < 0){echo 0;}else{echo $minLate;} ?></small></td>
                                        <td><small><?php echo number_format($items['penalty'],2); ?></small></td>
                                        <td><small><?php echo $items['altered'];?></small></td>
                                    </tr>
                                <?php }} ?>
                            </tbody>
                            <tbody>
                            <tr style="background-color:#CCC; color: #FFF; font-weight: bold;">
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td align="right"><strong>Total</strong></td>
                                <td><strong><?php echo number_format($tot_penalty,2); ?></strong></td>
                                <td>&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" align="center">
                        <a class="btn btn-lg" href="javascript:void(0);" onclick="javascript:window.print();" style="background-color: #000; color: #FFF;"><i class="icon icon-printer"></i> Print</a>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- STAFF ABSENT -->
<!-- STAFF ABSENT -->
<div id="staffabsent" class="modal fade">
    <div class="modal-dialog" style="width: 1000px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>

            <div class="modal-body">
                <div class="row" id="ptable">
                    <div class="col-md-12">
                        <p style="color: #000; font-weight: bold; text-align: center; font-size: large;">STAFF ABSENT ON <?php echo strtoupper(date("l, d M, Y ",strtotime(date($ddate)))); ?></p>
                        <table class="table-bordered table-striped" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Real Time</th>
                                <th>Rep. Time</th>
                                <th>Time Diff</th>
                                <th>Penalty (GH&cent;)</th>
                                <th>Altered?</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sel="SELECT * FROM clock_in WHERE date='$ddate' AND status='absent' ORDER BY time ASC";
                            $selrun=$conn->query($dbcon,$sel);
                            $cont=0;
                            $tot_penalty=0;
                            $minLate="";
                            if($conn->sqlnum($selrun) ==0){
                                echo "No Records Available";
                            }else{
                                while($items=$conn->fetch($selrun)){
                                    $mid=$items['staff_id'];
                                    $penalty=$items['penalty'];
                                    $rdate=$items['date'];
                                    $cont++;
                                    if($items['status']=="absent" || $items['status']=="unsigned"){
                                        $minLate="-";
                                    }
                                    else{
                                        $minLate=$items['time_diff'];
                                    }
                                    $tot_penalty= $tot_penalty + $items['penalty'];
                                    $id= $items['staff_id'];
                                    $selQry="SELECT fst_name, lst_name, start_time, voka_id FROM staff_rec WHERE staff_id='$id'";
                                    $selQryRun=$conn->query($dbcon,$selQry);
                                    $selQryData=$conn->fetch($selQryRun);
                                    $start_time=$selQryData['start_time'];



                                    ?>
                                    <tr>
                                        <td><small><?php echo $cont; ?></small></td>
                                        <td><small><?php echo $selQryData['fst_name']." ".$selQryData['lst_name'];?></small></td>
                                        <td><small><?php $sttime=strtotime($start_time);echo date("H:i:s A",$sttime);?></small></td>
                                        <td><small><?php $time=$items['time'];if($time=="00:00:00"){echo "Not Reported";}else{$time=strtotime($time);echo date("H:i:s A",$time);}?></small></td>
                                        <td><small><?php if($minLate < 0){echo 0;}else{echo $minLate;} ?></small></td>
                                        <td><small><?php echo number_format($items['penalty'],2); ?></small></td>
                                        <td><small><?php echo $items['altered'];?></small></td>
                                    </tr>
                                <?php }} ?>
                            </tbody>
                            <tbody>
                            <tr style="background-color:#CCC; color: #FFF; font-weight: bold;">
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td align="right"><strong>Total</strong></td>
                                <td><strong><?php echo number_format($tot_penalty,2); ?></strong></td>
                                <td>&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" align="center">
                        <a class="btn btn-lg" href="javascript:void(0);" onclick="javascript:window.print();" style="background-color: #000; color: #FFF;"><i class="icon icon-printer"></i> Print</a>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- STAFF ABSENT -->
<div id="staffinactive" class="modal fade">
    <div class="modal-dialog" style="width: 700px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="row" id="ptable">
                    <div class="col-md-12">
                        <p style="color: #000; font-weight: bold; text-align: center; font-size: large;">INACTIVE STAFF AS AT <?php echo strtoupper(date("l, d M, Y ",strtotime(date($ddate)))); ?></p>
                        <table class="table-bordered table-striped" width="100%">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Unit</th>
                                <th>Position</th>
                                <th>Job Title</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sel="SELECT * FROM staff_rec WHERE status='Inactive' ORDER BY fst_name DESC";
                            $selrun=$conn->query($dbcon,$sel);
                            $cont=0;
                            if($conn->sqlnum($selrun) ==0){
                                echo "No Records Available";
                            }else{
                                while($items=$conn->fetch($selrun)){
                                    $cont++;
                                    ?>
                                    <tr>
                                        <td><small><?php echo $cont; ?></small></td>
                                        <td><small><?php echo $items['fst_name']." ".$items['lst_name'];?></small></td>
                                        <td><small><?php echo $items['company'];?></small></td>
                                        <td><small><?php echo $items['position'];?></small></td>
                                        <td><small><?php echo $items['jobtitle'];?></small></td>
                                    </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" align="center">
                        <a class="btn btn-lg" href="javascript:void(0);" onclick="javascript:window.print();" style="background-color: #000; color: #FFF;"><i class="icon icon-printer"></i> Print</a>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- STAFF GENERAL COMMENT ON APPRAISAL -->
<div id="gencomment" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">General Comment</h3>
            </div>

            <div class="modal-body">
                <p style="color: #FD550F; text-decoration: underline; font-weight: bold;">NOTE</p>
                <p style="color: #FD550F; font-style: italics; font-size: small;">The comments you post here will not be displayed to your supervisor.</p>
                <form method="get">
                    <input type="hidden" name="year" id="cmtyear" />
                    <input type="hidden" name="voka" id="cmtid" />
                    <input type="hidden" name="period" id="cmtperiod" />
                    <input type="hidden" name="midyearappraise" />
                    <div class="row" id="hidethis">
                        <div class="col-md-12">
                            <table width="100%" class="table">

                                <tr>
                                    <td align="right"><label>Comment</label></td>
                                    <td>
                                        <textarea name="gencomment" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-success"  name="addgencomment">Add Comment</button></td>
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

<!-- LEAVE APPROVALS -->
<div id="leaveApprove" class="modal fade">
    <div class="modal-dialog" style="width: 800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Leave Approvals</h5>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <tr>
                                <td class="first">Leave ID:</td>
                                <td id="alvid"></td>
                            </tr>
                            <tr>
                                <td class="first">Applicant:</td>
                                <td id="lvappl"></td>
                            </tr>
                            <tr>
                                <td class="first">Application Date:</td>
                                <td id="lvdate"></td>
                            </tr>
                            <tr>
                                <td class="first">Leave Type:</td>
                                <td id="lvtype"></td>
                            </tr>
                            <tr>
                                <td class="first">Replaced By:</td>
                                <td id="lvrep"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-striped">
                            <tr>
                                <td class="first">Days Taken:</td>
                                <td id="lvdays"></td>
                            </tr>
                            <tr>
                                <td class="first">Start Date:</td>
                                <td id="lvsdate"></td>
                            </tr>
                            <tr>
                                <td class="first">End Date:</td>
                                <td id="lvedate"></td>
                            </tr>
                            <tr>
                                <td class="first">Resumed Date:</td>
                                <td id="lvrdate"></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row" style="padding-top: 1%; border: #0a68b4 thick 3px">
                    <div class="col-md-6">
                        <label>Handing Over Note</label>
                        <p id="lvnote"></p>
                    </div>
                    <form method="get">
                        <input type="hidden" name="status" id="lvstatus"/>
                        <input type="hidden" name="lvid" id="dlivid"/>
                        <input type="hidden" name="vokID" id="vokID"/>
                        <input type="hidden" name="ldays" id="dlivdays"/>
                        <input type="hidden" name="pending_leave" />
                        <div class="col-md-6">
                            <label>Comment</label>
                            <textarea rows="4" class="form-control" name="lvcomment">

                                </textarea><br>
                            <button type="submit" name="apprleave" class="btn btn-success btn-lg"><span class="icon icon-thumbs-up3"></span>Approve</button>
                            &nbsp;<button type="submit" name="rejleave" class="btn btn-danger btn-lg"><span class="icon icon-thumbs-down3"></span>Reject</button>

                        </div>
                    </form>
                </div>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="addcheque" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <p style="font-size: large; font-weight: bold; text-align: center; color: #0a68b4">ADD PAYMENT VOUCHER DETAILS</p>
                        <form method="get">
                            <input type="hidden" name="pending_pvs"/>
                            <input type="hidden" class="form-control" name="chqpvid" required id="chqpvid" readonly/>
                            <table class="table table-striped">
                                <tr>
                                    <td>CHEQUE NUMBER</td>
                                    <td><input type="text" class="form-control" name="chqnumber"/></td>
                                </tr>
                                <tr>
                                    <td>BANK CODE</td>
                                    <td>
                                        <select name="chqbk_code" class="form-control">
                                            <option value=""></option>
                                            <?php
                                            $exp = "SELECT * FROM banks WHERE status='Active'";
                                            $exprun = $conn->query($dbcon, $exp);
                                            while ($expdata = $conn->fetch($exprun)) {
                                                ?>
                                                <option value="<?php echo $expdata['account']; ?>"><?php echo $expdata['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>EXPENSE CLASSIFICATION</td>
                                    <td>
                                        <select name="chqexp_cls" class="form-control">
                                            <option value=""></option>
                                            <?php
                                            $exp = "SELECT * FROM expensecls WHERE status='Active'";
                                            $exprun = $conn->query($dbcon, $exp);
                                            while ($expdata = $conn->fetch($exprun)) {
                                                ?>
                                                <option value="<?php echo $expdata['expcode']; ?>"><?php echo $expdata['name']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="center"><button type="submit" class="btn btn-lg btn-success"><span class="icon icon-add"></span>ADD DETAILS</button> </td>
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


<!-- IMAGE DISPLAY -->
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

<!-- BIRTHDAY -->
<div id="bdaymodal" class="modal fade">
    <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title">Happy Birthday Wishes</h3>
            </div>

            <div class="modal-body">
                <?php
                    $bdaycalc = date("m-d");
                    echo $seldet="SELECT bd.fst_name, bd.lst_name, st.position, st.img FROM biodata bd INNER JOIN staff_rec st ON bd.voka_id = st.voka_id WHERE bd.dob LIKE '%$bdaycalc'";
                    $seldetrun=$conn->query($dbcon,$seldet);
                    while($data=$conn->fetch($seldetrun)){
                        $dimg = $data['img'];
                        $fname = $data['fst_name'];
                        $lname = $data['lst_name'];
                        $pos = $data['position'];
                ?>
                <div class="row">
                    <div class="col-md-4" style="background-image: url('../assets/images/coverOLDDDD.jpg'); background-repeat: no-repeat; background-position: center; position: relative">
                        <img src="<?php echo $dimg; ?>" class="img-responsive"/>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-9">
                                <textarea class="form-control" max="300" rows="3"></textarea>
                            </div>
                            <div class="col-md-3"><i class="icon icon-attachment"></i></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" align="center">
                                <button type="submit" class="icon icon-next2 btn btn-primary">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="imggallery" class="modal fade">
    <form method="get">
        <input type="hidden" name="view_images"/>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Album Creation</h3>
                </div>

                <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" align="center">
                                <table class="table">
                                    <tr>
                                        <th align="right">Album Name</th>
                                        <th align="left"><input type="text" name="gliname" maxlength="50" class="form-control"/> </th>
                                    </tr>
                                    <tr>
                                        <th align="right">Description</th>
                                        <th align="left"><textarea class="form-control" name="descr" rows="4" maxlength="100"></textarea> </th>
                                    </tr>
                                    <tr>
                                        <th align="right">Content Type</th>
                                        <th align="left">
                                            <select class="form-control" name="ctype">
                                                <option value="image">Image</option>
                                                <option value="video">Video</option>
                                                <option value="both">Both</option>

                                            </select>
                                        </th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-lg btn-primary"><span class="icon icon-next2"></span>Create</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- MEDICAL CLAIM APPLICATION -->
<div id="medclaim" class="modal fade">
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="medclaim"/>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">MEDICAL CLAIM</h3>
                </div>

                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" align="center">
                            <table class="table">
                                <tr>
                                    <th align="right">Facility</th>
                                    <th align="left">
                                        <select class="form-control" name="claim_fac" required>
                                            <?php
                                                $hosp = "SELECT name, id FROM hospital WHERE status = 'Active' ORDER BY name ASC";
                                                $hosprun = $conn->query($dbcon,$hosp);
                                                while($hospdata = $conn->fetch($hosprun)){
                                            ?>
                                            <option value="<?php echo $hospdata['id'] ?>"><?php echo $hospdata['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </th>
                                </tr>
                                <tr>
                                    <th align="right">Notes</th>
                                    <th align="left"><textarea class="form-control" name="claim_desc" rows="2" maxlength="100"></textarea> </th>
                                </tr>
                                <tr>
                                    <th>Upload Documents</th>
                                    <th>
                                        <input type="file" name="claim_file[]" multiple accept="image/x-png,image/jpeg"/>
                                    </th>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-lg btn-primary"><span class="icon icon-next2"></span>Send</button>
                </div>
            </div>
        </div>
    </form>
</div>