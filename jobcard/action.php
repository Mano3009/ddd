<?php

include("../conn.php"); 

if(isset($_POST['addservicetypenameval']))
{
	
  $addservicetypenameval = $_POST['addservicetypenameval'];
	
	 $insert="INSERT INTO `servicetype`(`servicetype`) VALUES ('$addservicetypenameval')";
	 $runinsert=mysqli_query($conn,$insert);
	
	 echo "<script>alert('Service Type Added successfully'); window.location.href='view-servicetype.php';</script>";
	
	
}

if(isset($_POST['updateservicetypename']))
{
	
  $updateservicetypename = $_POST['updateservicetypename'];
  $servicetypeupdateid=$_POST['servicetypeupdateid'];    
	
	 $insert="UPDATE `servicetype` SET `servicetype`='$updateservicetypename' WHERE id='$servicetypeupdateid'";
	 $runinsert=mysqli_query($conn,$insert);
	
	 echo "<script>alert('Service Type Updated successfully'); window.location.href='view-servicetype.php';</script>";
	
	
}

if(isset($_POST['servicetyperemovegetid']))
{
    $servicetyperemovegetid=$_POST['servicetyperemovegetid'];
    $delete="DELETE FROM `servicetype` WHERE id='$servicetyperemovegetid'";
    $run=mysqli_query($conn,$delete);
    if($run)
    {
    echo "<script>alert('Service Type deleted successfully'); window.location.href='view-servicetype.php';</script>";
    }
}


if(isset($_POST['addcardno']))
{
	
  $addcustomernameid = $_POST['addcustomernameid'];
  $addcustomer_vehickenumbernum = $_POST['addcustomer_vehickenumbernum'];    
  $addcardno = $_POST['addcardno'];
  $addjobcarddate = $_POST['addjobcarddate'];
  $addjobcardtime = $_POST['addjobcardtime'];
  $addentrytime = $_POST['addentrytime'];
  $addgreetingtime = $_POST['addgreetingtime'];
  $addaftertime = $_POST['addaftertime'];
  $addjobcardphonenumber = $_POST['addjobcardphonenumber'];
  $addjobcardemail = $_POST['addjobcardemail'];
  $addjobcardbirthday = $_POST['addjobcardbirthday'];
  $addjobcardrepair = $_POST['addjobcardrepair'];
  $addjobcardmodal = $_POST['addjobcardmodal'];
  $addjobcardregno = $_POST['addjobcardregno'];
  $addjobcardchassisno = $_POST['addjobcardchassisno'];
  $addjobcardengineno = $_POST['addjobcardengineno'];
  $addjobcardmilage = $_POST['addjobcardmilage'];
  $addservicetypenumid = $_POST['addservicetypenumid'];
  $addjobcardserviceadvisorcommend = $_POST['addjobcardserviceadvisorcommend'];
  $addjobcardcommends = $_POST['addjobcardcommends'];
  $addjobcardadditionalcommends = $_POST['addjobcardadditionalcommends'];
  $addjobcardtechnician = $_POST['addjobcardtechnician'];
  $addjobcardserviceadivisor = $_POST['addjobcardserviceadivisor'];
  $addvehiclepickup = $_POST['addvehiclepickup'];
  $addvehicledrop = $_POST['addvehicledrop'];    
	
	
$insert="INSERT INTO `jobcardstore`(`cusid`,`vehicleno`, `cardnum`, `date`, `time`, `entrytime`, `greetingtime`, `aftertime`, `phonenumber`, `email`, `birthday`, `repair`, `modal`, `regno`, `chassisno`, `engineno`, `milage`, `servicetype`, `serviceadvisorcommend`, `commends`, `additionalcommends`, `technician`, `serviceadivisor`, `vehiclepickup`, `vehicledrop`) VALUES ('$addcustomernameid','$addcustomer_vehickenumbernum','$addcardno','$addjobcarddate','$addjobcardtime','$addentrytime','$addgreetingtime','$addaftertime','$addjobcardphonenumber','$addjobcardemail','$addjobcardbirthday','$addjobcardrepair','$addjobcardmodal','$addjobcardregno','$addjobcardchassisno','$addjobcardengineno','$addjobcardmilage','$addservicetypenumid','$addjobcardserviceadvisorcommend','$addjobcardcommends','$addjobcardadditionalcommends','$addjobcardtechnician','$addjobcardserviceadivisor','$addvehiclepickup','$addvehicledrop')";
	 $runinsert=mysqli_query($conn,$insert);
	
	 echo "<script>alert('Jobcard Added successfully'); window.location.href='viewjobcard.php';</script>";
	
	
}


if(isset($_POST['jobcardremovegetid']))
{
			$jobcardremovegetid=$_POST['jobcardremovegetid'];
			$delete="DELETE FROM `jobcardstore` WHERE id='$jobcardremovegetid'";
			$run=mysqli_query($conn,$delete);
			if($run)
			{
			echo "<script>alert('jobcard deleted successfully'); window.location.href='viewjobcard.php';</script>";
			}
}


if(isset($_POST['updatejobcardupdateid']))
{
	
	 $updatejobcardupdateid=$_POST['updatejobcardupdateid'];
  $updatecustomer_vehickenumbernum = $_POST['updatecustomer_vehickenumbernum'];
	 $addcustomernameid = $_POST['updatecustomernameid'];
  $addcardno = $_POST['updatecardno'];
  $addjobcarddate = $_POST['updatejobcarddate'];
  $addjobcardtime = $_POST['updatejobcardtime'];
  $addentrytime = $_POST['updateentrytime'];
	 $addgreetingtime = $_POST['updategreetingtime'];
  $addaftertime = $_POST['updateaftertime'];
  $addjobcardphonenumber = $_POST['updatejobcardphonenumber'];
  $addjobcardemail = $_POST['updatejobcardemail'];
  $addjobcardbirthday = $_POST['updatejobcardbirthday'];
	 $addjobcardrepair = $_POST['updatejobcardrepair'];
  $addjobcardmodal = $_POST['updatejobcardmodal'];
  $addjobcardregno = $_POST['updatejobcardregno'];
  $addjobcardchassisno = $_POST['updatejobcardchassisno'];
  $addjobcardengineno = $_POST['updatejobcardengineno'];
	 $addjobcardmilage = $_POST['updatejobcardmilage'];
  $updateservicetypenumid = $_POST['updateservicetypenumid'];
  $addjobcardserviceadvisorcommend = $_POST['updatejobcardserviceadvisorcommend'];
  $addjobcardcommends = $_POST['updatejobcardcommends'];
	 $addjobcardadditionalcommends = $_POST['updatejobcardadditionalcommends'];
  $addjobcardtechnician = $_POST['updatejobcardtechnician'];
  $addjobcardserviceadivisor = $_POST['updatejobcardserviceadivisor'];
  $updatevehiclepickup = $_POST['updatevehiclepickup'];
  $updatevehicledrop = $_POST['updatevehicledrop'];    
	
	
 $update="UPDATE `jobcardstore` SET `cusid`='$addcustomernameid',`vehicleno`='$updatecustomer_vehickenumbernum',`cardnum`='$addcardno',`date`='$addjobcarddate',`time`='$addjobcardtime',`entrytime`='$addgreetingtime',`greetingtime`='$addgreetingtime',`aftertime`='$addaftertime',`phonenumber`='$addjobcardphonenumber',`email`='$addjobcardemail',`birthday`='$addjobcardbirthday',`repair`='$addjobcardrepair',`modal`='$addjobcardmodal',`regno`='$addjobcardregno',`chassisno`='$addjobcardchassisno',`engineno`='$addjobcardengineno',`milage`='$addjobcardmilage',`servicetype`='$updateservicetypenumid',`serviceadvisorcommend`='$addjobcardserviceadvisorcommend',`commends`='$addjobcardcommends',`additionalcommends`='$addjobcardadditionalcommends',`technician`='$addjobcardtechnician',`serviceadivisor`='$addjobcardserviceadivisor',`vehiclepickup`='$updatevehiclepickup',`vehicledrop`='$updatevehicledrop' WHERE id='$updatejobcardupdateid'";
	
	 $runinsert=mysqli_query($conn,$update);
	
	 echo "<script>alert('Jobcard Updated successfully'); window.location.href='viewjobcard.php';</script>";
	
	
}

if(isset($_POST['addcustomer_name']))
{
    $addcustomer_name=$_POST['addcustomer_name'];
	
    $selectgoo="SELECT * FROM `customer` WHERE name='$addcustomer_name'";
    $run_goo=mysqli_query($conn,$selectgoo);
    while($row_goo=mysqli_fetch_array($run_goo))
    {
        
      $customer_vehicleno=$row_goo['vehicleno'];
          
        $str_customer_vehicleno =explode("@@@@",$customer_vehicleno);    
       
        $itemcount=count($str_customer_vehicleno);  
        
        for($i=0;$i<$itemcount;$i++)
		{     
        
    ?>
    
    <option value="<?php echo $str_customer_vehicleno[$i]; ?>" data-cusid="<?php echo $row_goo['id']; ?>"></option>

    <?php 
            
        }
            
    }
	
}


if(isset($_POST['addcustomer_vehickenumbernumid']))
{
    $addcustomer_vehickenumbernumid=$_POST['addcustomer_vehickenumbernumid'];
	
    $selectgoo="SELECT * FROM `customer` WHERE id='$addcustomer_vehickenumbernumid'";
    $run_goo=mysqli_query($conn,$selectgoo);
    $row_goo=mysqli_fetch_array($run_goo);
	
    $name=$row_goo['name'];
    $phono=$row_goo['phono'];
    $emailid=$row_goo['emailid'];
	
    echo "<script>$('#addcustomer_name').val('$name');</script>";
    echo "<script>$('#addjobcardphonenumber').val('$phono');</script>";
    echo "<script>$('#addjobcardemail').val('$emailid');</script>";
}




?>