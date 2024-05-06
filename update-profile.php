<html>
<head>
<title>Account</title>
<?php
  include("link.php"); 
?>    
    
</head>
<body>

<div class="dashboard-main-wrapper">

	
	  
        <?php
        
        include("header.php");
        
        ?>
    
        <?php
        
        include("nav.php");
        
        ?>
	
 
<div class="dashboard-wrapper">
<div class="dashboard-ecommerce">
<div class="container-fluid dashboard-content ">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="page-header">
<h2 class="pageheader-title">Account</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Account</li>
</ol>
</nav>
</div>
</div>
</div>
</div>



<div class="ecommerce-widget">
<div class="row">



<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="card">
<h3 class="card-header text-center">Account</h3>
<div class="card-body">
    
<?php
  	  if(isset($_SESSION["loginid"]))
     {
         $loginid= $_SESSION["loginid"];
     } 
      
	    $selctlogin="SELECT * FROM `login` WHERE id='$loginid'";
	    $runlogin=mysqli_query($conn,$selctlogin);
	    $rowlogin=mysqli_fetch_array($runlogin);
	
	    $currentloginusername=$rowlogin['username'];
	
	    $select="SELECT * FROM `account` where id='1'";
     $run=mysqli_query($conn,$select);
     $rowdata=mysqli_fetch_array($run);
	
	
    
?>    
    
<form id="accountdetails" method="post" enctype="multipart/form-data">
 
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Logo</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="file" name="companylogo" class="companylogo form-control">   
<p id="displaycompanylogo" class="errormessage"></p>   
</div>
</div>    
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">User Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="User Name" class="form-control" id="auser_name" value="<?php 
echo $username=$rowlogin['username']; ?>"> 
<p id="displayuser_name" class="errormessage"></p>   
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="Password" class="form-control" id="apassword" value="<?php 
echo $password=$rowlogin['password']; ?>"> 
<p id="displaypassword" class="errormessage"></p>    
</div>
</div>    
    
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Company Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="Company Name" class="form-control" id="acompany_name" value="<?php 
echo $com_name=$rowdata['companyname'];   ?>">
<p id="displaycompany_name" class="errormessage"></p>    
</div>
</div>    
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Phone</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="Phone" class="form-control" id="aphone" value="<?php 
echo $Phone=$rowdata['phoneno'];   ?>">
<p id="displaycustomer_phone" class="errormessage"></p>        
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Email Id</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="email" placeholder="Email Id" class="form-control" id="aemail_id" value="<?php 
echo $email_id=$rowdata['emailid'];    ?>">
<p id="displaycustomer_email_id" class="errormessage"></p>    
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Gst Number</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="Gst Number" class="form-control" id="agst_number" value="<?php 
echo $gst_num=$rowdata['gstnumber'];    ?>">
<p id="displaygst_number" class="errormessage"></p>    
</div>
</div>
    
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Village Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="Village Name" class="form-control" id="avillage_name" value="<?php 
echo $v_name=$rowdata['address'];  ?>">
 <p id="displayvillage_name" class="errormessage"></p>   
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">District Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="District Name" class="form-control" id="adistrict_name" value="<?php 
echo $d_name=$rowdata['district'];  ?>">    
  
  <p id="displaydistrict_name" class="errormessage"></p>   
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">State</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="State" class="form-control" id="astate" value="<?php 
echo $state=$rowdata['state'];   ?>">   
   <p id="displaystate" class="errormessage"></p>    
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Pin Code</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="number" placeholder="Pin code" class="form-control" id="apin_code" value="<?php 
echo $pin_code=$rowdata['pincode'];    ?>">
<p id="displaypin_code" class="errormessage"></p>    
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Bank Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="Pin code" class="form-control" id="bank_name" value="<?php 
echo $bank_name=$rowdata['bankname'];    ?>">
<p id="displaybank_name" class="errormessage"></p>    
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">A/c No </label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="Pin code" class="form-control" id="acno" value="<?php 
echo $a_c_no=$rowdata['bankno']; ?>">
<p id="displayacno" class="errormessage"></p>    
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">IFC Code </label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="Pin code" class="form-control" id="ifc_code" value="<?php 
echo $ifc_code=$rowdata['ifsccode'];    ?>">
<p id="displayifc_code" class="errormessage"></p>    
</div>
</div>    
    
<div class="form-group row text-center">
<div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
<button type="submit" class="btn btn-space btn-primary">Submit</button>
<button class="btn btn-space btn-secondary" type="reset">Cancel</button>
<div id="displayaccountdetailsupdate"></div>    
</div>
</div>
    
</form>
</div>
</div>
</div>



</div>
</div>
</div>
</div>
</div>    
    
    
    
<?php
include("script.php");

?>  
	
<script src="main.js" type="application/javascript"></script>	
	
	
</div>    
    
</body>
</html>