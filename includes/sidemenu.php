<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <li><div align="center"><img src="<?php echo $clogo; ?>" class="img-responsive img-rounded" style="width: 150px; height: 150px;"/></div> </li>
            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
            <li><a href="dashboard.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
            <?php if($stbank !=""){ ?>
                <li>
                    <a href="#"><i class="icon-piggy-bank"></i> <span>Bank Deposits</span></a>
                    <ul>
                        <li><a href="dashboard.php?bank_deposits">Deposits</a></li>
                        <li><a data-toggle="modal" data-target="#bankreport">Report</a></li>
                    </ul>
                </li>
            <?php } ?>
            <?php if($exams !=""){ ?>
            <li>
                <a href="#"><i class="icon-pen6"></i> <span>Examination Management</span></a>
                <ul>
                    <!--<li><a data-toggle="modal" data-target="#examqxtns">Exams Questions</a></li>-->
                    <li><a data-toggle="modal" data-target="#examcourses">Students</a></li>
                </ul>
            </li>
            <?php } ?>
            <?php if($fees !=""){ ?>
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
            <?php } ?>
            <?php if($internship !=""){ ?>
            <li>
                <a href="#"><i class="icon-user-check"></i> <span>Field / Internship</span></a>
                <ul>
                    <li><a href="dashboard.php?facilities" id="layout1">Facilities</a></li>
                </ul>
            </li>
            <?php } ?>
            <?php if($hostel !=""){ ?>
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
            <?php } ?>
            <?php if($pv !=""){ ?>
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
            <?php } ?>
            <?php if($staff !=""){ ?>
            <li>
                <a href="#"><i class="icon-user-check"></i> <span>Staff Management</span></a>
                <ul>
                    <li><a href="dashboard.php?staff_data" id="layout1">Staff</a></li>
                </ul>
            </li>
            <?php } ?>
            <?php if($payroll !=""){ ?>
            <li>
                <a href="#"><i class="icon-cash3"></i> <span>Staff Payroll</span></a>
                <ul>
                    <li><a href="dashboard.php?mypayslips">My Payslips</a></li>
                    <?php if($payroll =="Administrator"){ ?><li><a data-toggle="modal" data-target="#staffpaystruct">Staff Structure</a></li>
                    <li><a href="dashboard.php?generateslip" id="layout1">Generate Payslip</a></li><?php } ?>
                </ul>
            </li>
            <?php } ?>
            <?php if($student !=""){ ?>
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
            <?php } ?>
            <?php if($configs !=""){ ?>
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
            <?php } ?>
            <!-- /page kits -->

        </ul>
    </div>
</div>