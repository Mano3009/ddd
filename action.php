<?php
session_start();
include("conn.php"); 

if(isset($_POST['loginusername']))
{
	
$loginusername=$_POST['loginusername'];
$loginpassword=$_POST['loginpassword'];
	
	
$select = "SELECT * FROM `login` WHERE username='$loginusername' AND password='$loginpassword'";
$run = mysqli_query($conn, $select);
$userloginget = mysqli_fetch_assoc($run);
	
$oldusername = $userloginget['username'];
$oldpassword = $userloginget['password'];
$oldloginid = $userloginget['id'];	
	
if ($oldusername != $loginusername && $oldpassword !=$loginpassword)
{
echo "<script>alert('Please check Username and Password');</script>";
}	
else
{
   echo $_SESSION["loginid"] = $oldloginid;
   echo "<script>alert('Login Sucessfully'); window.location.href='index.php';</script>";
}	
	
	
}


if(isset($_POST['auser_name']))
{
	
	 $auser_name=$_POST['auser_name'];
	 $apassword=$_POST['apassword'];
	 $acompany_name=$_POST['acompany_name'];
	 $aphone=$_POST['aphone'];
	 $aemail_id=$_POST['aemail_id'];
	 $agst_number=$_POST['agst_number'];
	 $avillage_name=$_POST['avillage_name'];
	 $adistrict_name=$_POST['adistrict_name'];
	 $astate=$_POST['astate'];
	 $apin_code=$_POST['apin_code'];
	 $abank_name=$_POST['abank_name'];
	 $abank_nameacno=$_POST['abank_nameacno'];
	 $abank_nameifc_code=$_POST['abank_nameifc_code'];
	
	 $update="UPDATE `login` SET `username`='$auser_name',`password`='$apassword' WHERE  id='1'";
	 $run = mysqli_query($conn, $update);
	
	 $update="UPDATE `account` SET `companyname`='$acompany_name',`phoneno`='$aphone',`emailid`='$aemail_id',`gstnumber`='$agst_number',`address`='$avillage_name',`district`='$adistrict_name',`state`='$astate',`pincode`='$apin_code',`bankname`='$abank_name',`bankno`='$abank_nameacno',`ifsccode`='$abank_nameifc_code' WHERE id='1'";
	 $run = mysqli_query($conn, $update);
	
	
	 $selectimage = $_FILES['companylogo']['name'];
	
	 if($selectimage != '')
		{
		
			  $location = "assets/images/logo/".$selectimage;
			
			  if(move_uploaded_file($_FILES['companylogo']['tmp_name'],$location))
					{
						
						$update="UPDATE `account` SET `logo`='$selectimage' WHERE id='1'";
						$run = mysqli_query($conn, $update);
						
					}
		
		}

	 
	
	
	echo "<script>alert('Profile Update Sucessfully'); window.location.href='update-profile.php';</script>";
	
	
}
	
	
	

?>