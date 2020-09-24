
<?php

include "databaseconn.php";


$se_id = $_REQUEST['seid'];
$se_cr=  $_REQUEST['secr'];
$re_id = $_REQUEST['uid'];
$cr_am= $_REQUEST['amount'];
$se_fcr=$se_cr-$cr_am;

// Attempt insert query execution
$sql = "INSERT INTO transfer VALUES (null,$se_id, $re_id, $cr_am,current_date())";
//$sql = "INSERT INTO transfer VALUES ($se_id, $re_id, $cr_am,current_date(),null)";
$sql1 = "update user set current_credit=$se_fcr where id=$se_id";
$sql2="select current_credit from user where id=$re_id";
$result=mysqli_query($db, $sql2);
$filed=mysqli_fetch_array($result);
$re_cr=$filed['current_credit'];
$re_fcr=$re_cr+$cr_am;
$sql2 = "update user set current_credit=$re_fcr where id=$re_id";

if(mysqli_query($db, $sql) && mysqli_query($db, $sql1)  && mysqli_query($db, $sql2) && $cr_am<$se_cr &&$re_fcr>0){
    echo "<script>
               alert('Credit Transferred successfully !');
               window.location.href='index.php';
               </script>";  
} else{
    echo "<script>
               alert('Please check your credit amount again!');
               window.location.href='transfer.php';
               </script>";  
}



// Close connection
mysqli_close($db);

  




?>