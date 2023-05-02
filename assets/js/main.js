function updateprod(id){
    //console.log(id);
    $("#loader").modal("show");
    $("#loadermsg").text("Loading Product Details...");
    //GET THE PRODUCT DETAILS
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getprod=" + id,
        success: function (data) {
            console.log(data);
            var result = $.parseJSON(data);
            var pid = result['pid'];
            var pname = result['pname'];
            var sprice = result['sprice'];
            var cprice = result['cprice'];
            var status = result['status'];

            $("#prodstat").prepend("<option selected value='" + status + "'>" + status + "</option>");
            $("#pname").val(pname);
            $("#updpid").val(pid);
            $("#sprice").val(sprice);
            $("#cprice").val(cprice);
            $("#loader").modal("hide");
            $("#product_edit").modal("show");

        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function singleproduct(){
    $("#loader").modal("show");
    $("#loadermsg").text("Loading Products...");
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getproductselectwh",
        success: function (data) {
            console.log(data);
            $("#sprodtrans").html(data);
            $("#loader").modal("hide");
            $("#product_transfer").modal("show");
        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });
}

function receiveProduct(){
    var pid = $("#selectprod").val();
    var qty = $("#selectqty").val();
    var note = $("#receiptnote").val();
    var stfid = $("#notifyid").val();

    if(pid === null || pid === "" || qty === null || qty === ""){
        alert("Please Ensure That You Have Selected A Product And Entered A Quantity");
    }else{
        var conf = confirm("Are you sure you want to receive the item into stock. This process can not be undone");
        if(conf == true){
            $("#loader").modal("show");
            $("#product_transfer").modal("hide");
            $("#loadermsg").text("Updating the product Quantity...");
            console.log(pid + qty + note);
            $.ajax({
                type: "post",
                url: "ajax/beneficiary.php",
                data: "receiveProduct=" + pid + "&qty=" + qty + "&note=" + note + "&stfid=" + stfid,
                success: function (data) {
                    $("#loader").modal("hide");
                    if(data == "OK"){
                        alert("Stock Quantity Has Been Updated Successfully.");
                    }else{
                        alert("Ooops! Stock Could Not Be Updated. Please Try Again");
                    }
                },
                error: function (xhr, desc, err) {
                    alert(err);
                    return false;
                }
            });
        }
    }


}

function editClass(cid){
    console.log(cid);
    $("#loader").modal("show");
    $("#loadermsg").text("Loading Class Details...");
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getClass=" + cid,
        success: function (data) {
            console.log(data);
            $("#loader").modal("hide");
            $("#csename").val(data);
            $("#cidupd").val(cid);
            $("#updcoursereg").modal("show");
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function editSubject(cid){
    $("#loader").modal("show");
    $("#loadermsg").text("Loading Subject Details...");
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getSubject=" + cid,
        success: function (data) {
            console.log(data);
            $("#loader").modal("hide");
            $("#sbjnameupd").val(data);
            $("#sbjupdid").val(cid);
            $("#subjectupd").modal("show");
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function editDiscount(cid){
    $("#loader").modal("show");
    $("#loadermsg").text("Loading Discount Details...");
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getDiscount=" + cid,
        success: function (data) {
            var result = $.parseJSON(data);
            console.log(data);
            $("#loader").modal("hide");
            $("#discid").val(cid);
            $("#discname").val(result['discname']);
            $("#percent").val(result['percent']);
            $("#dstatus").prepend("<option selected value='" + result['status'] + "'>" + result['status'] + "</option>");
            $("#discountedit").modal("show");
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function logout() {
    $("#logoutmodal").modal("show");
}

function editFees(cid){
    console.log(cid);
    $("#loader").modal("show");
    $("#loadermsg").text("Loading Fees Details...");
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getFee=" + cid,
        success: function (data) {
            console.log(data);
            $("#loader").modal("hide");
            $("#feeupdname").val(data);
            $("#feeupdid").val(cid);
            $("#feesupd").modal("show");
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function attachsubject(cid) {
    $("#loader").modal("show");
    $("#loadermsg").text("Loading Subjects...");
    var counter = $("#rowcounterwh").val();
    var ncounter = Number(counter) + 1;
    $("#rowcounterwh").val(ncounter);
    if(ncounter != 0){
        $("#savesubject").removeClass("hidden");
    }else{
        $("#savesubject").addClass("hidden");
    }
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getSubjectList=" + cid,
        success: function (data) {
            console.log(data);
            $("#loader").modal("hide");
            var new_row = "<tr id='" + ncounter + "'><td>#</td><td>" + data + "</td><td><a onclick='removeRowwh(" + ncounter + ")'><span class='icon icon-trash btn btn-danger'></span></a></td></tr>";
            $(".subjectTable").append(new_row);
            //console.log(new_row);
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function attachfees(cid) {
    $("#loader").modal("show");
    $("#loadermsg").text("Loading Subjects...");
    var counter = $("#rowcounterfee").val();
    var ncounter = Number(counter) + 1;
    $("#rowcounterfee").val(ncounter);
    if(ncounter != 0){
        $("#savefees").removeClass("hidden");
    }else{
        $("#savefees").addClass("hidden");
    }
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getFeesList=" + cid,
        success: function (data) {
            console.log(data);
            $("#loader").modal("hide");
            var new_row = "<tr id='" + ncounter + "'><td>#</td><td>" + data + "</td><td><input class = 'form-control' type = 'number' name = 'myamount[]' min='0' required step='any'></td><td><a onclick='removeRowfees(" + ncounter + ")'><span class='icon icon-trash btn btn-danger'></span></a></td></tr>";
            $(".feeTable").append(new_row);
            //console.log(new_row);
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function studentInvoice() {
    $("#loader").modal("show");
    $("#loadermsg").text("Loading Subjects...");
    var counter = $("#invoicecounter").val();
    var ncounter = Number(counter) + 1;
    $("#invoicecounter").val(ncounter);
    if(ncounter != 0){
        $("#invoicehidden").removeClass("hidden");
    }else{
        $("#invoicehidden").addClass("hidden");
    }
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getFeesListAll",
        success: function (data) {
            console.log(data);
            $("#loader").modal("hide");
            var new_row = "<tr id='" + ncounter + "'><td>#</td><td>" + data + "</td><td><input class = 'form-control' type = 'number' name = 'myamount[]' min='0' required step='any'></td><td><a onclick='removeRowinvoice(" + ncounter + ")'><span class='icon icon-trash btn btn-danger'></span></a></td></tr>";
            $(".dataTables-invoice").append(new_row);
            //console.log(new_row);
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function examScore(cid) {
    $("#loader").modal("show");
    $("#loadermsg").text("Loading Record...");
    var counter = $("#examcounter").val();
    var ncounter = Number(counter) + 1;
    $("#examcounter").val(ncounter);
    if(ncounter != 0){
        $("#examshidden").removeClass("hidden");
    }else{
        $("#examshidden").addClass("hidden");
    }
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getClassSubjects=" + cid,
        success: function (data) {
            console.log(data);
            $("#loader").modal("hide");
            var new_row = "<tr id='" + ncounter + "'><td>#</td><td>" + data + "</td><td><input class = 'form-control' type = 'number' name = 'classScore[]' min='0' required step='any' value='0'></td><td><input value='0' class = 'form-control' type = 'number' name = 'examScore[]' min='0' required step='any'></td><td><a onclick='removeExams(" + ncounter + ")'><span class='icon icon-trash btn btn-danger'></span></a></td></tr>";
            $(".dataTables-exam").append(new_row);
            //console.log(new_row);
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function searchInvoice() {
    $("#loader").modal("show");
    $("#searchinvoice").modal("hide");
    $("#loadermsg").text("Loading Record...");
    var invid = $("#searchinvid").val();

    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "checkinvoice=" + invid,
        success: function (data) {
            $("#loader").modal("hide");
            if(data == "FOUND"){
                var url = "dashboard.php?invoice_details="+invid;
                window.location.replace(url);
            }else{
                alert("Invoice With Invoice ID "+invid+" Dooes Not Exist.");
            }
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

//DISPLAY MODAL FOR NOTIFICATIONS POPUP
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

function updatesales(){
    var pid = $("#pid").val();
    var sid = $("#sid").val();
    var user = $("#usr").val();
    var qty = $("#pqty").val();

    if(qty > 0){


        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "possales=" + pid + "&user=" + user + "&sid=" + sid + "&qty=" + qty,
            success: function (data) {
                //console.log(data);
                var result = $.parseJSON(data);
                var msg = result['msg'];
                var error = result['errorcode'];
                var dtotal = result['total'];
                if(error == "001"){
                    alert(msg);
                }else{
                    $("#pos_qty").modal("hide");
                    $("#pos_total").val(dtotal);
                    document.getElementById("salesdisplay").innerHTML = msg;
                    document.getElementById("pos_totaldisp").innerHTML = "GHC " + dtotal.toFixed(2);
                }

            },
            error: function (xhr, desc, err) {
                alert(err);
                return false;
            }
        });
    }
    else{
        alert("Please Select Quantity Greater Than 0");
    }
}

function remsales(id){
    //console.log(id);
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "remsales=" + id,
        success: function (data) {
            var result = $.parseJSON(data);
            var msg = result['msg'];
            var dtotal = result['total'];
            document.getElementById("salesdisplay").innerHTML = msg;
            document.getElementById("pos_totaldisp").innerHTML = "GHC " + dtotal;
            $("#pos_total").val(dtotal);
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function resetpos(){
    $("#paymentcheckout").addClass("hidden");
    $("#paymentpos").removeClass("hidden");
    $("#posreceipt").addClass("hidden");
    $("#bcodescan").css({
        position: 'absolute',
        top: '-1000px'
    });
    $("#bcodescan").focus();
}

function checkoutpay(){

    var sid = $("#sessionid3").val();
    var tender = $("#paytender").val();
    var bal = $("#pos_bal").val();
    var total = $("#pos_total").val();
    var cname = $("#cname").val();
    var userid = $("#notifyid").val();

    $("#paymentcheckout").addClass("hidden");
    $("#paymentpos").addClass("hidden");
    $("#posreceipt").removeClass("hidden");
    $("#posreceipt").html("<div align='center'><img src='assets/images/spinner.gif' style='width: 100px; height: 100px;'/><br/>Processing Sales...</div>");

    //console.log(sid+" / "+tender+" / "+bal+" / "+total+" / "+cname+" / "+ccontact+" / "+clocation+" / "+cid+" / "+selecttype );
    //CHECK OUT THE PAYMENT
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "checkoutpay&sid="+sid+"&tender="+tender+"&bal="+bal+"&total="+total+"&cname="+cname+"&userid="+userid,
        success: function (data) {
            console.log(data);
            var result = $.parseJSON(data);
            var msg = result['msg'];
            var sid = result['newsid'];
            var sprice = result['newsprice'];
            $("#posreceipt").html(msg);
            //SET NEW SID
            $("#sessionid3").val(sid);
            //RESET POS
            $("#paytender").val("");
            $("#pos_bal").val("");
            $("#pos_total").val("");
            $("#cname").val("");
            $("#salesdisplay").text("Empty Cart");
            $("#pos_totaldisp").text("GHS 0.00");
            $("#pos_baldisp").text("0.00");
            $("#psalestot").text("GHS "+sprice);


        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });
}

function calculatebalance(tendered){
    //GET THE COST
    var dtotal = $("#pos_total").val();
    if(tendered == ""){
        $("#invalidtend").removeClass("hidden");
        $("#validtend").addClass("hidden");
        document.getElementById("pos_baldisp").innerText = "0.00";
    }
    else{
        $("#pos_bal").val((Number(tendered) - Number(dtotal)).toFixed(2));
        document.getElementById("pos_baldisp").innerText = (Number(tendered) - Number(dtotal)).toFixed(2);
        if((Number(tendered) - Number(dtotal)) < 0){
            $("#invalidtend").removeClass("hidden");
            $("#validtend").addClass("hidden");
        }else{
            $("#validtend").removeClass("hidden");
            $("#invalidtend").addClass("hidden");
        }

    }
}

function continuesales(){
    $("#paymentcheckout").addClass('hidden');
    $("#paymentpos").removeClass('hidden');
    $("#validtend").addClass('hidden');
    $("#invalidtend").removeClass('hidden');
    $("#pos_bal").val(0);
    $("#pos_baldisp").text("0.00");
    $("#paytender").val(0);
}

function checkout(){
    $("#paymentcheckout").removeClass('hidden');
    $("#paymentpos").addClass('hidden');
}

function displaysales(pname,id,user,sid){
    //console.log("CLICKED");
    $("#pid").val(id);
    //GET THE SESSION ID
    var dsid = $("#sessionid3").val();
    $("#sid").val(dsid);
    $("#usr").val(user);
    $("#loader").modal("show");
    $("#loadermsg").text("Loading Product Details...");
    $("#pqty").val("");
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getstock=" + id,
        success: function (data) {
            console.log(data);
            $("#pstock").text("Stock Value: "+data);
            $("#loader").modal("hide");
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
    document.getElementById("pnameqty").innerText = pname;
    $("#pos_qty").modal("show");
}

function examTemplate(temp, cid) {
    console.log(cid);
    $("#loader").modal("show");
    $("#loadermsg").text("Applying Examination Template...");
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "examTemplate="+temp+"&classid="+cid,
        success: function (data) {
            console.log(data);
            $("#loader").modal("hide");
            if(data == "DONE"){
                var url = "dashboard.php?class_details="+cid;
                window.location.replace(url);
            }
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function removeRowwh(id) {
    //console.log(id);
    //GET THE COUNT
    var counter = $("#rowcounterwh").val();
    var ncounter = Number(counter) - 1;
    $("#rowcounterwh").val(ncounter);

    if(ncounter != 0){
        $("#savesubject").removeClass("hidden");
    }else{
        $("#savesubject").addClass("hidden");
    }

    var parents = document.getElementById("addsbjbody");
    var childs = document.getElementById(id);
    parents.removeChild(childs);
}
function removeRowpv(id) {
    //console.log(id);
    //GET THE COUNT
    var counter = $("#pvcounter").val();
    var ncounter = Number(counter) - 1;
    $("#pvcounter").val(ncounter);

    var parents = document.getElementById("pvbody2");
    var childs = document.getElementById(id);
    parents.removeChild(childs);
}

function removeRowinvoice(id) {
    //console.log(id);
    //GET THE COUNT
    var counter = $("#invoicecounter").val();
    var ncounter = Number(counter) - 1;
    $("#invoicecounter").val(ncounter);

    var parents = document.getElementById("invoicebody");
    var childs = document.getElementById(id);
    parents.removeChild(childs);
}

function removeExams(id) {
    //console.log(id);
    //GET THE COUNT
    var counter = $("#examcounter").val();
    var ncounter = Number(counter) - 1;
    $("#examcounter").val(ncounter);

    if(ncounter != 0){
        $("#examshidden").removeClass("hidden");
    }else{
        $("#examshidden").addClass("hidden");
    }

    var parents = document.getElementById("exambody");
    var childs = document.getElementById(id);
    parents.removeChild(childs);
}
function removeRowfees(id) {
    //console.log(id);
    //GET THE COUNT
    var counter = $("#rowcounterfees").val();
    var ncounter = Number(counter) - 1;
    $("#rowcounterfees").val(ncounter);

    if(ncounter != 0){
        $("#savefees").removeClass("hidden");
    }else{
        $("#savefees").addClass("hidden");
    }

    var parents = document.getElementById("addfeebody");
    var childs = document.getElementById(id);
    parents.removeChild(childs);
}

function getcompany(){
    $("#loader").modal("show");
    $("#loadermsg").text("Fetching Company Data...");
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "getcompany",
        success: function (data) {
            //console.log(data);
            $("#loader").modal("hide");
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
            $("#company").modal("show");
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function generateExamsReport(){
    console.log("Working oo");

    var term = $("#examterm").val();
    var dclass = $("#examclass").val();
    var stdid = $("#examstdid").val();
    var year = $("#examyear").val();
    //SUBJECT LIST
    if(term === null || term ==="" || year === null || year === ""){
        alert("Please Select The Term And Year From The Dropdowns");
    }else{
        $("#loader").modal("show");
        $("#loadermsg").text("Generating Exams Report. Please Wait...");
        var subjectlist = [];
        var classscore = [];
        var examsscore = [];
        $('input[name="subjectlist[]"]').each(function(){
            subjectlist.push($(this).val());
        });

        $('input[name="classScore[]"]').each(function(){
            classscore.push($(this).val());
        });

        $('input[name="examScore[]"]').each(function(){
            examsscore.push($(this).val());
        });

        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "generateExamReport&subjectlist="+subjectlist+"&classscore="+classscore+"&examsscore="+examsscore+"&stdid="+stdid+"&class="+dclass+"&term="+term+"&year="+year,
            success: function (data) {
                console.log(data);
                $("#loader").modal("hide");
                var result = $.parseJSON(data);
                code = result['errorcode'];
                dmessage = result['msg'];
                if(code == 0){
                    var url = "dashboard.php?generated_exams="+dmessage+"&classid="+dclass+"&stdid="+stdid;
                    window.location.replace(url);
                }else{
                    alert("Exam Results Already Exists For This Student For This Class And Term");
                }
            },
            error: function (xhr, desc, err) {
                alert(err);
                return false;
            }
        });
    }
}

function viewpdf(id){
    //console.log(id);
    var imageshow = "<embed src='"+id+"' type='application/pdf' width='100%' height='600px' />";
    document.getElementById("file_view").innerHTML=imageshow;
    $('#file_display').modal('show');
}

function revealRecipient(id){
    if(id == "Custom"){
        $("#recipienthidden").removeClass("hidden");
    }else{
        $("#recipienthidden").addClass("hidden");
    }
}

function sendSMS(){
    $("#loader").modal("show");
    $("#loadermsg").text("Sending SMS In Progress. Please Wait...");
    var rec = $("#recipients").val();
    var rectype = $("#rectype").val();
    var msg = $("#anmsg").val();
    var stfid = $("#notifyid").val();

    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "sendmysms="+rec+"&type="+rectype+"&msg="+msg+"&stfid="+stfid,
        success: function (data) {
            $("#loader").modal("hide");
            var url = "dashboard.php?bulksms";
            //window.location.replace(url);
            console.log(data);
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });

}

function addnewrow() {
    var counter = $("#rowcounter").val();
    var ncounter = Number(counter) + 1;
    $("#pvcounter").val(ncounter);
    var new_row = "<tr id='" + ncounter + "'><td><textarea class = 'form-control' name = 'description[]' id = 'description' maxlength='300' rows='2' required></textarea></td><td><input class = 'form-control' type = 'number' name = 'amount[]' id = 'amount' step='any' required></td><td><a onclick='removeRowpv(" + ncounter + ")'><span class='icon icon-trash btn btn-danger'></span></a></td></tr>";
    $(".dataTables-pv").append(new_row);
    console.log(new_row);
}

function studentsTransfer(fromClass){
    var studentlist = [];
    $.each($("input[name='check_list']:checked"), function(){
        studentlist.push($(this).val());
    });

    //CHECK IF AT LEAST ONE STUDENT IS SELECTED
    if(studentlist.length == 0){
        alert("Please select at least one student to transfer");
    }else{
        var toClass = $("#toclass").val();
        //CHECK IF CLASS HAS BEEN SELECTED TO TRANSFER STUDENTS TO
        if(toClass === null || toClass === ""){
            alert("Please Select New Class To Transfer Students From The Dropdown");
        }else{
            //
            var conf = confirm("Are you sure you want to transfer students to the selected class?");
            if(conf == true){
                $("#loader").modal("show");
                $("#loadermsg").text("Students Transfer In Progress. Please Wait...");
                $.ajax({
                    type: "post",
                    url: "ajax/beneficiary.php",
                    data: "transferStudents="+studentlist+"&from="+fromClass+"&to="+toClass,
                    success: function (data) {
                        console.log(data);
                        $("#loader").modal("hide");
                        if(data == "DONE"){
                            alert("Students Transfer Completed")
                            var url = "dashboard.php?students_transfer="+fromClass;
                            window.location.replace(url);
                        }
                    },
                    error: function (xhr, desc, err) {
                        alert(err);
                        return false;
                    }
                });
            }
        }
    }
}

function recallInvoice(invid, stdid,list){
    console.log(invid);
    var conf = confirm("Are You Sure You Want To Recall This Invoice? This Process Cannot Be Undone");
    if(conf == true){
        $("#loader").modal("show");
        $("#loadermsg").text("Recalling Invoice. Please Wait...");
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "recallInvoice="+invid,
            success: function (data) {
                console.log(data);
                $("#loader").modal("hide");
                if(data == "DONE"){
                    if(list == "stdlist"){
                        var url = "dashboard.php?student_details="+stdid;
                        window.location.replace(url);
                    }else{
                        var url = "dashboard.php?students_invoices";
                        window.location.replace(url);
                    }


                }
            },
            error: function (xhr, desc, err) {
                alert(err);
                return false;
            }
        });
    }else{
        console.log("false");
    }
}

function removePayment(invid,id,amount){
    console.log(invid + "/"+id+"/"+amount);
    var conf = confirm("Are you sure you want to reverse this payment?");
    if(conf === true){
        $("#loader").modal("show");
        $("#loadermsg").text("Reversing Payment...");
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "reversePayment=" + invid+"&payid="+id+"&amount="+amount,
            success: function (data) {
                $("#loader").modal("hide");
                var url = "dashboard.php?invoice_details="+invid;
                window.location.replace(url);
            },
            error: function (xhr, desc, err) {
                alert(err);
                return false;
            }
        });
    }
}

function getsalesdetails(sid){
    $("#loader").modal("show");

    $("#loadermsg").text("Fetching sales details...");
    document.getElementById("transfershow").innerHTML = "";
    //console.log(sid);
    //PROCESS THE SESSION ID AND GET THE DETAILS
    $.ajax({
        type: "post",
        url: "ajax/beneficiary.php",
        data: "salesdetails=" + sid,
        success: function (data) {
            console.log(data);
            document.getElementById("transfershow").innerHTML = data;
            $("#loader").modal("hide");
            $("#trans_details").modal("show");
        },
        error: function (xhr, desc, err) {
            alert(err);
            return false;
        }
    });
}

function saveSubjects(){
    var conf = confirm("Are you sure you want to save and link subjects to this class?");
    if(conf == true){
        document.getElementById("attachsubjectform").submit();
    }
}
function saveFees(){
    var conf = confirm("Are you sure you want to save and link fee component(s) to this class?");
    if(conf == true){
        document.getElementById("attachfeeform").submit();
    }
}

function invoiceapproval(feedhide,slipid,action,stdid,sliphide,dclass,term,discid){
    //console.log(slipid + "/"+action+ "/"+stdid+ "/"+sliphide+"/"+dclass+"/"+term);

    if(action == "Cancelled"){
        $("#"+sliphide).addClass("hidden");
        $("#"+feedhide).text("Cancelled");
    }else{
        $("#loader").modal("show");
        $("#loadermsg").text("Generating Invoice...");
        $.ajax({
            type: "post",
            url: "ajax/beneficiary.php",
            data: "invoiceapproval=" + slipid + "&stdid=" + stdid +"&dclass="+dclass+"&term="+term+"&discid="+discid,
            success: function (data) {
                $("#loader").modal("hide");
                console.log(data);
                $("#payrollloader").addClass("hidden");
                if(data == "OK"){
                    $("#"+sliphide).addClass("hidden");
                    $("#"+feedhide).text("Approved");
                }
                else{
                    alert("There was an error while generating the Payslip. Kindly contact the system administrators for assistance");
                }

            },
            error: function (xhr, desc, err) {
                alert(err);
                return false;
            }
        });
    }
}

function checkpass(id){
    console.log(id);
    var regexp = /^[0-9a-zA-Z]+$/;
    if (id.match(regexp) && id.length >= 8) {
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
        $("#ssimg").removeClass("hidden");
        $("#chsub").removeClass("hidden");
    } else {
        $("#ssimg").addClass("hidden");
        $("#chsub").addClass("hidden");
    }
}

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
            if (dsize > 5) {
                document.getElementById(did).value = "";
                alert("File Size Is Too Large. File Size Should Not Be More Than 5 MB")
            }
        }
    }
}