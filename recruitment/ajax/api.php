<?php
class Db_connect{
    private $lhost="localhost";
    private $user="root";
    private $pword="matter";
    private $db="hwemudua";

    public function conn(){
        try{
            $conn=mysqli_connect($this->lhost,$this->user,$this->pword,$this->db);
            if(!$conn){
                throw new Exception("Database Connection Error");
            }
            else{
                return $conn;
            }
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    //QUERY STRING
    public function query($con,$queryString){
        try{
            if(!empty($queryString)){
                return mysqli_query($con,$queryString);
            }
            else{
                throw new Exception("You Are Submitting An Empty Query");
            }

        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }

    }
    //FETCHING FROM DATABASE
    public function fetch($mysqli_num_rowsqry){
        return mysqli_fetch_assoc($mysqli_num_rowsqry);
    }
    //SQL NUM
    public function sqlnum($num){
        return mysqli_num_rows($num);
    }
}
$conn=new Db_connect;
$dbconnection=$conn->conn();
$curdate=date("Y-m-d");
if(isset($_POST['getCareer'])){
    $sel="SELECT * FROM careers WHERE deadline >='$curdate' AND status='Active'";
    $selrun=$conn->query($dbconnection,$sel);
    if($conn->sqlnum($selrun) ==0){
        print "NO JOB VACANCY AVAILABLE. PLEASE CHECK BACK LATER";
    }else{
        while($rows=$conn->fetch($selrun)) {

            print "<div class='featured-box featured-box-secundary' style='text-align: left'>
						<div class='box-content'>
                        <strong>JOB TITLE:</strong><b style='color: #000'> " . $rows['title'] . "</b>
                        <p><strong>Company:</strong><b style='color: #000'>" . $rows['company'] . "</b></p>
                        <p>" . $rows['description'] . "</p>
                        <p><a class='btn btn-primary push-bottom' href='https://vokacomhq.vokacom.net/recruitment/index.php?job_id=".$rows['id']."' target='new'>Apply Now</a></p>
                    </div></div>";
        }
    }
}

//CHECK ANSWERS FROM APTITUDE TEST
if(isset($_POST['testAnswered'])){
    $ans=$_POST['testAnswered'];
    $result=explode('*',$ans);
    $email=$result[0];
    $jobid=$result[2];
    $qxtnid=$result[1];
    $ans=$result[3];

    //CHECK FOR THE ANSWER TO THE QUESTION
    $chk="SELECT answer FROM aptitude_test_qxtns WHERE id=$qxtnid";
    $chkrun=$conn->query($dbconnection,$chk);
    $chkdata=$conn->fetch($chkrun);
    $dans=$chkdata['answer'];
    $upd="";
    if($dans==$ans){
        $upd="UPDATE career_test SET ans='$ans', cmt='1', status='Yes' WHERE email='$email' AND job_id='$jobid' AND qxtnid='$qxtnid'";
    }
    else{
        $upd="UPDATE career_test SET ans='$ans', cmt='0', status='Yes' WHERE email='$email' AND job_id='$jobid' AND qxtnid='$qxtnid'";
    }
    $conn->query($dbconnection,$upd);
}

//HANDLE APPLICANT TEST
//CHECK ANSWERS FROM APTITUDE TEST
if(isset($_POST['startTest'])){
    $email=$_POST['startTest'];
    $jobid=$_POST['jobid'];
    $upd="UPDATE career_app SET status='Test Completed' WHERE email='$email' AND job_id='$jobid'";
    $conn->query($dbconnection,$upd);

    $upd2="UPDATE career_test SET check_stat='Done' WHERE email='$email' AND job_id='$jobid'";
    $conn->query($dbconnection,$upd2);
}
?>