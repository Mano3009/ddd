<?php
include("../conn.php"); 

if(isset($_POST['addcustomercode']))
{
   
     $addcustomercode=$_POST['addcustomercode'];
    $addgstno=$_POST['addgstno'];
    $addcompanyname=$_POST['addcompanyname'];
    $addcustomerphoneno=$_POST['addcustomerphoneno'];
    $addcustomeremailid=$_POST['addcustomeremailid'];
    $addcompanyaddress=$_POST['addcompanyaddress'];
  
    $addcusstate=$_POST['addcusstate'];
    $addpincode=$_POST['addpincode'];
    $addvehicleno=$_POST['addvehicleno'];
    
	$storevehicleno=str_replace(",","@@@@",$addvehicleno);
	   	    
	
     $date=date("Y-m-d");
    
   
   $insert="INSERT INTO `customer`(`code`, `name`, `address`, `place`, `pincode`, `phono`, `emailid`, `gstno`,`vehicleno`, `date`) VALUES ('$addcustomercode','$addcompanyname','$addcompanyaddress','$addcusstate','$addpincode','$addcustomerphoneno','$addcustomeremailid','$addgstno','$storevehicleno','$date')";
    
     $run=mysqli_query($conn,$insert);
    
     if($run)
     {
            
						
        $selectcount= "SELECT * FROM `count` WHERE name='customer'";
        $run=mysqli_query($conn,$selectcount);
        $count =mysqli_fetch_array($run); 

        $count= $count['count'];

        $discount=$count+1;
        $update="UPDATE `count` SET `count`='$discount' WHERE name='customer'";
        $run=mysqli_query($conn,$update);
						
        echo "<script>alert('Customer details Added Successfully');window.location.href='view-customer.php';</script>";
     }
        
    
}


if(isset($_POST['removegetid2']))
{
       $removegetid2=$_POST['removegetid2'];
       $delete="DELETE FROM `customer` WHERE id='$removegetid2'";
       $run=mysqli_query($conn,$delete);
       if($run)
       {
           echo "<script>alert('deleted successfully'); window.location.href='view-customer.php';</script>";
       }
   }



if(isset($_POST['updcustomercode']))
{
   
    $updcustomercode=$_POST['updcustomercode'];
    $customerupdateid=$_POST['customerupdateid'];
    $updgstno=$_POST['updgstno'];
    $updcompanyname=$_POST['updcompanyname'];
    $updcustomerphoneno=$_POST['updcustomerphoneno'];
    $updcustomeremailid=$_POST['updcustomeremailid'];
    $updcompanyupdress=$_POST['updcompanyupdress'];
    $updvehicleno=$_POST['updvehicleno'];
  
    $updcusstate=$_POST['updcusstate'];
    $updpincode=$_POST['updpincode'];
	
     $date=date("Y-m-d");
    
    $storevehicleno=str_replace(",","@@@@",$updvehicleno);
   
   $update="UPDATE `customer` SET `code`='$updcustomercode',`name`='$updcompanyname',`address`='$updcompanyupdress',`place`='$updcusstate',`pincode`='$updpincode',`phono`='$updcustomerphoneno',`emailid`='$updcustomeremailid',`gstno`='$updgstno',`date`='$date',`vehicleno`='$updvehicleno' WHERE '$customerupdateid'";
    
     $run=mysqli_query($conn,$update);
    
     if($run)
     {
            
        echo "<script>alert('Customer details Updated Successfully');window.location.href='update-customer.php?cusupid=$customerupdateid';</script>";
     }
        
    
}









?>
