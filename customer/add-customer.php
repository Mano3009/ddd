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
<h2 class="pageheader-title">Add Customer</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Add Customer</li>
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
<h3 class="card-header text-center">Add Customer</h3>
<div class="card-body">   
<form id="addcustomer" data-parsley-validate="" novalidate="">
    

    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Customer Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Customer Name" class="form-control" id="customer_name">
<p id="displaycustomer_name" class="errormessage"></p>    
</div>
</div>
    
<?php
  $selectcount="SELECT * FROM `count` WHERE name='customer'";
  $run_count=mysqli_query($conn,$selectcount);
  $row_count=mysqli_fetch_array($run_count);
  $ccount=$row_count['count'];
  $totalid=$ccount+100;
  $displayid=$totalid;    
?>	
	
	
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Customer Code</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Customer Code" class="form-control" id="customer_code" value="<?php echo $displayid; ?>" readonly>
<p id="displaycompany_name" ></p>    
</div>
</div>    
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Customer Phone</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="number"  placeholder="Customer Phone" class="form-control" id="customer_phone">
<p id="displaycustomer_phone" ></p>        
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Customer Email Id</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="email"  placeholder="Customer Email Id" class="form-control" id="customer_email_id">
<p id="displaycustomer_email_id"></p>    
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">GST Number</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text" placeholder="GST Number" class="form-control" id="gst_number">
<p id="displaygst_number"></p>    
</div>
</div>
    
 <div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Company Address</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="text"  placeholder="Company Address" class="form-control" id="company_address">
<p id="displaystreet"></p>    
</div>
</div>
       
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Place Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Place Name" class="form-control" id="place_name">    
  
  <p id="displaydistrict_name" ></p>   
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Pincode</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="number"  placeholder="Pincode" class="form-control" id="pincode">   
   <p id="displaystate"></p>    
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Vehicle No</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="vehicle no" class="form-control" id="addvehicleno">   
   <p id="displaystate"></p>    
</div>
</div>
    
 
	<?php
	
	$date=date('Y-m-d');
	
	?>
	
	
 <div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Date</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="date"  placeholder="Date" class="form-control" id="date" value="<?php echo $date; ?>">   
   <p id="displaystate"></p>    
</div>
</div>   
    
  
<div class="form-group row text-center">
<div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
<button type="submit" class="btn btn-space btn-primary" id="addcustomer">Submit</button>
<button class="btn btn-space btn-secondary" type="reset">Cancel</button>
<div id="add_customer_all"></div>    
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