<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <li><div align="center"><img src="<?php echo $clogo; ?>" class="img-responsive img-rounded" style="width: 100px; height: 100px;"/></div> </li>
            <li class="navigation-header"><span>Main Menu</span> <i class="icon-menu" title="Main pages"></i></li>
            <li><a href="dashboard.php"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
            <?php
            if($configs == "ADMINISTRATOR"){
            ?>
            <li>
                <a href="#"><i class="icon-piggy-bank"></i> <span>Bank Deposits</span></a>
                <ul>
                    <li><a href="dashboard.php?bank_deposits">Deposits</a></li>
                    <?php if ($stbank == "ADMINISTRATOR"){ ?>
                    <li><a data-toggle="modal" data-target="#bankreport">Report</a></li>
                    <?PHP } ?>
                </ul>
            </li>
            <?php } ?>
            <li>
                <a href="#"><i class="icon-pen6"></i> <span>Examination Management</span></a>
                <ul>
                    <!--<li><a data-toggle="modal" data-target="#examqxtns">Exams Questions</a></li>-->
                    <li><a data-toggle="modal" data-target="#pendingexams">Pending Exams Records</a></li>
                    <li><a data-toggle="modal" data-target="#classexams">View Exams Records</a></li>
                </ul>
            </li>
            <?php if ($fees == "ADMINISTRATOR"){ ?>
            <li>
                <a href="#"><i class="icon-cash3"></i> <span>Invoices Management</span></a>
                <ul>
                    <li><a href="dashboard.php?students_invoices" id="layout1">Invoices</a></li>
                    <li><a data-toggle="modal" data-target="#invoicegen">Invoice Generator</a></li>
                    <li><a  data-toggle="modal" data-target="#searchinvoice">Search Invoice</a></li>
                    <li>
                        <a href="#"><span>Reports</span></a>
                        <ul>

                            <li><a data-toggle="modal" data-target="#classfeesreport">Class Report </a></li>
                            <li><a data-toggle="modal" data-target="#generalfeesreport">Payment Report </a></li>
                            <li><a href="dashboard.php?students_arrears">Arrears Report</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php
            if($configs == "ADMINISTRATOR"){
            ?>
            <li>
                <a href="#"><i class="icon-bubble-notification"></i> <span>Notifications</span></a>
                <ul>
                    <li><a href="dashboard.php?memos">Staff Memo</a></li>
                    <li><a href="dashboard.php?bulksms">Bulk SMS</a></li>
                </ul>
            </li>
            <?php } ?>
            <?php
            if($staff == "ADMINISTRATOR"){
            ?>
            <li>
                <a href="#"><i class="icon-cash2"></i> <span>Payment Vouchers</span></a>
                <ul>

                    <li><a href="dashboard.php?pvcreate">Generate</a></li>
                    <?php if ($pv == "ADMINISTRATOR"){ ?>
                    <li><a href="dashboard.php?pending_pvs">Pending Payment Vouchers</a></li>
                    <li>
                        <a href="#"><span>Reports</span></a>
                        <ul>

                            <li><a data-toggle="modal" data-target="#generalpvreport">General
                                    Report </a></li>
                        </ul>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            <?php
            if($staff == "ADMINISTRATOR"){
            ?>
            <li>
                <a href="#"><i class="icon-user-plus"></i> <span>Staff Management</span></a>
                <ul>
                    <li><a href="dashboard.php?staff_data" id="layout1">Staff</a></li>
                </ul>
            </li>
            <?php } ?>
            <?php
            if($sales == "ADMINISTRATOR"){
            ?>
            <li>
                <a href="#"><i class="icon-cart-add2"></i> <span>Sales Management</span></a>
                <ul>
                    <li><a href="dashboard.php?items_master">Products</a></li>
                    <li><a href="dashboard.php?products_received">Received Products</a></li>
                    <li>
                        <a href="dashboard.php?pos">
                            Cash Sales
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            Report
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub-menu">
                            <li><a data-toggle="modal" href="#sales_report">Sales
                                    Report</a></li>
                            <!--<li><a data-toggle="modal" href="#sales_report"><i class="icon-bell"></i> Product Sales
                                    Report</a></li>-->
                        </ul>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php if($student == "ADMINISTRATOR"){ ?>
            <li>
                <a href="#"><i class="icon-users4"></i> <span>Students Management</span></a>
                <ul>
                        <li><a  data-toggle="modal" data-target="#studentreg">Add New Student</a></li>
                        <li><a data-toggle="modal" data-target="#transferstudents">Students Transfer</a></li>
                    <!--<li><a href="dashboard.php?students_data" id="layout1">Students Records</a></li>-->
                    <li><a data-toggle="modal" data-target="#viewstudents">Students Records</a></li>
                    <!--<li><a href="dashboard.php?graduate_students" id="layout1">Graduate Students</a></li>-->
                    <!--<li><a href="dashboard.php?students_data_pending" id="layout1">Pending Students</a></li>-->
                    <!--<li><a href="dashboard.php?students_data_abandoned" id="layout1">Abandoned Students</a></li>-->
                    <li>
                        <a href="#"><span>Reports</span></a>
                        <!--<ul>

                            <li><a data-toggle="modal" data-target="#programreport">Program Report </a></li>
                            <li><a data-toggle="modal" data-target="#batchreport">Batch Report</a></li>
                            <li><a data-toggle="modal" data-target="#classreport">Class Session Report</a></li>
                        </ul>-->
                    </li>
                </ul>
            </li>
            <?php } ?>
            <?php
                if($configs == "ADMINISTRATOR"){
            ?>
            <li>
                <a href="#"><i class="icon-cog52"></i> <span>Configuration</span></a>
                <ul>
                    <li>
                        <a href="#">Payment Voucher</a>
                        <ul>
                            <li><a href="dashboard.php?banks">Banks</a></li>
                            <li><a href="dashboard.php?expense_cls">Expense Classifications</a></li>
                            <li><a href="dashboard.php?taxes">Taxes</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">School</a>
                        <ul>
                            <li><a onclick="getcompany()">School Details</a></li>
                            <li><a href="dashboard.php?courses">Classes</a></li>
                            <li><a href="dashboard.php?subjects">Subjects</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Invoice Management</a>
                        <ul>
                            <li><a href="dashboard.php?discounts">Invoice Discounts</a></li>
                            <li><a href="dashboard.php?fees_structure">Fees Structure</a></li>
                        </ul>
                    </li>
                    <!--<li>
                        <a href="#">Students</a>
                        <ul>
                            <li><a href="dashboard.php?student_batch">Batches</a></li>
                        </ul>
                    </li>-->
                    <li>
                        <a href="#">Staff</a>
                        <ul>
                            <li><a href="dashboard.php?positions">Staff Positions</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <?php } ?>
            <!--<li>
                <a href="#"><i class="icon-cogs"></i> <span>System</span></a>
                <ul>
                    <li><a onclick="makebackup()">BackUp Database</a></li>
                </ul>
            </li>-->
            <!-- /page kits -->

        </ul>
    </div>
</div>