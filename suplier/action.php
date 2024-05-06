<?php

include("../conn.php");



if(isset($_POST['addsuplier_name']))
{
   
    $addsuplier_name=$_POST['addsuplier_name'];
    $addsuplier_code=$_POST['addsuplier_code'];
    $addsuplier_phone=$_POST['addsuplier_phone'];
    $addsuplier_email_id=$_POST['addsuplier_email_id'];
    $addgst_number=$_POST['addgst_number'];
    $addsuplier_address=$_POST['addsuplier_address'];
    $addplace_name=$_POST['addplace_name'];
    $addpincode=$_POST['addpincode'];
    $adddate=$_POST['adddate'];
	
    
    
    
    
  $insert="INSERT INTO `suplier`(`code`, `name`, `address`, `place`, `pincode`, `phono`, `emailid`, `gstno`, `date`) VALUES ('$addsuplier_code','$addsuplier_name','$addsuplier_address','$addplace_name','$addpincode','$addsuplier_phone','$addsuplier_email_id','$addgst_number','$adddate')";
  $run=mysqli_query($conn,$insert);
    
     if($run)
     {
             $selectcount= "SELECT * FROM `count` WHERE name='Suplier'";
                 $run=mysqli_query($conn,$selectcount);
                   $count =mysqli_fetch_array($run); 
                       
                       $count= $count['count'];
                                                            
                      $discount=$count+1;
                   $update="UPDATE `count` SET `count`='$discount' WHERE name='Suplier'";
         $run=mysqli_query($conn,$update);
          
         $sendurl=$baseurl.'suplier/view-suplier.php';
         
         echo "<script>alert('Suplier details Added Successfully');window.location.href='$sendurl';</script>";
     }
    
    
    
    
}


if(isset($_POST['clickdeletesuplierid']))
{
$clickdeletesuplierid=$_POST['clickdeletesuplierid']; 
    
$deletecusid="DELETE FROM `suplier` WHERE id='$clickdeletesuplierid'";    
$run_cus_id=mysqli_query($conn,$deletecusid);
if($run_cus_id)
{
echo"<script>alert('Suplier Deleted successfully');$('#deletehide$clickdeletesuplierid').hide();</script>";
}
}



if(isset($_POST['updatesuplier_name']))
{
   
    $updatesuplier_name=$_POST['updatesuplier_name'];
    $updatesuplier_code=$_POST['updatesuplier_code'];
    $updatesuplier_phone=$_POST['updatesuplier_phone'];
    $updatesuplier_email_id=$_POST['updatesuplier_email_id'];
    $updategst_number=$_POST['updategst_number'];
    $updatesuplier_address=$_POST['updatesuplier_address'];
    $updateplace_name=$_POST['updateplace_name'];
    $updatepincode=$_POST['updatepincode'];
    $updatedate=$_POST['updatedate'];
	
    $updatesuplierid=$_POST['updatesuplierid'];
    
    
    
  $insert="UPDATE `suplier` SET `code`='$updatesuplier_code',`name`='$updatesuplier_name',`address`='$updatesuplier_address',`place`='$updateplace_name',`pincode`='$updatepincode',`phono`='$updatesuplier_phone',`emailid`='$updatesuplier_email_id',`gstno`='$updategst_number',`date`='$updatedate' WHERE id='$updatesuplierid'";
  $run=mysqli_query($conn,$insert);
    
     if($run)
     {
            
          
         $sendurl=$baseurl.'suplier/view-suplier.php';
         
         echo "<script>alert('Suplier details Updated Successfully');window.location.href='$sendurl';</script>";
     }
    
    
    
    
}



?>
