<!doctype html>
<html lang="en">
 

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  
<?php
  include("../link.php");  
?>    
    
</head>

<body>
    
    <div class="dashboard-main-wrapper">
        
     
        <?php
        
        include("../header.php");
        
        ?>
    
        <?php
        
        include("../nav.php");
        
        ?>
        
  
        
        
     <div class="dashboard-wrapper">
<div class="dashboard-ecommerce">
<div class="container-fluid dashboard-content ">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="page-header">
<h2 class="pageheader-title">Update Customer</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Update Customer</li>
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
<h3 class="card-header text-center">Update Customer</h3>
<div class="card-body">   
    
    
<?php
  $cusupid=$_GET['cusupid'];      
  $selectcuscc="SELECT * FROM `customer` WHERE id='$cusupid'";
  $run_cc=mysqli_query($conn,$selectcuscc);
  $row_cc=mysqli_fetch_array($run_cc);   
?>     
    
    
<form id="updcustomer" data-parsley-validate="" novalidate="">
    
<div class="form-group row">
<!--<label class="col-12 col-sm-3 col-form-label text-sm-right">Customer Code</label>-->
<div class="col-12 col-sm-8 col-lg-6">
     
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Customer Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Customer Name" class="form-control" id="updcustomer_name" value="<?php echo $row_cc['name']; ?>">
<p id="displaycustomer_name" class="errormessage"></p>    
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Customer Code</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Customer Code" class="form-control" id="updcustomer_code" value="<?php echo $row_cc['code']; ?>" readonly>
<p id="displaycompany_name" ></p>    
</div>
</div>    
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Customer Phone</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="number"  placeholder="Customer Phone" class="form-control" id="updcustomer_phone" value="<?php echo $row_cc['phono']; ?>">
<p id="displaycustomer_phone" ></p>        
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Customer Email Id</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="email"  placeholder="Customer Email Id" class="form-control" id="updcustomer_email_id" value="<?php echo $row_cc['emailid']; ?>">
<p id="displaycustomer_email_id"></p>    
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">GST Number</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="GST Number" class="form-control" id="updgst_number" value="<?php echo $row_cc['gstno']; ?>">
<p id="displaygst_number"></p>    
</div>
</div>
    
 <div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Company Address</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="text"  placeholder="Company Address" class="form-control" id="updcompany_address" value="<?php echo $row_cc['address']; ?>">
<p id="displaystreet"></p>    
</div>
</div>
       
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Place Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Place Name" class="form-control" id="updplace_name" value="<?php echo $row_cc['place']; ?>">    
  
  <p id="displaydistrict_name" ></p>   
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Pincode</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="number"  placeholder="Pincode" class="form-control" id="updpincode" value="<?php echo $row_cc['pincode']; ?>">   
   <p id="displaystate"></p>    
</div>
</div>
  
<?php
  
    
    $vehicleno=$row_cc['vehicleno'];
    
	$storevehicleno=str_replace("@@@@",",",$vehicleno);
    
?>    
    
 <div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Vehicle No</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Vehicle No" class="form-control" id="updvehicleno" value="<?php echo $storevehicleno; ?>">   
   <p id="displaystate"></p>    
</div>
</div>   
    
 <div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Date</label>
<div class="col-12 col-sm-8 col-lg-6">
	
<input type="hidden"  class="form-control" id="customerupdateid" value="<?php echo $cusupid; ?>"> 
	
<input type="date"  placeholder="Date" class="form-control" id="upddate"  value="<?php echo  $row_cc['date']; ?>">   
	
   <p id="displaystate"></p>    
</div>
</div>   
    
  
<div class="form-group row text-center">
<div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
<button type="submit" class="btn btn-space btn-primary" id="updcustomer">Submit</button>
<button class="btn btn-space btn-secondary" type="reset">Cancel</button>
<div id="upd_customer_all"></div>    
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
    
  
        
    </div>

    
    <?php
    
    include("../script.php");
    
    ?>
    
     <script src="main.js"></script>  
    
</body>
 

</html>