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
<h2 class="pageheader-title">Update Jobcard</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Update Jobcard</li>
</ol>
</nav>
</div>
</div>
</div>
</div>


	<?php
  $jobcardupid=$_GET['jobcardupid'];
	
  $selectjobcardstore="SELECT * FROM `jobcardstore` WHERE id='$jobcardupid'";
  $run_jobcardstore=mysqli_query($conn,$selectjobcardstore);
  $row_jobcardstore=mysqli_fetch_array($run_jobcardstore);   
?> 
	
	

<div class="ecommerce-widget">
<div class="row">
    
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="card">
<h3 class="card-header text-center">Update Jobcard</h3>
<div class="card-body">   
	
<form  data-parsley-validate="" novalidate="">
    

	<?php
	
	$customerid=$row_jobcardstore['cusid'];
	
	$selectcus="SELECT * FROM `customer` WHERE id='$customerid'";
 $run_cus=mysqli_query($conn,$selectcus);
	$row_cus=mysqli_fetch_array($run_cus);
	
	$customername=$row_cus['name'];
	
	?>
	
    
<div class="form-group row">

<label class="col-12 col-lg-3 col-form-label text-sm-right">Customer</label>
<div class="col-12 col-sm-8 col-lg-6">
<input list="listcustomer" type="text" placeholder="Customer No" class="form-control changelocalcustomernum" id="addcustomer_name" value="<?php echo $customername; ?>">    
<datalist id="listcustomer">
  <?php
      $selectsubli="SELECT * FROM `customer` WHERE date BETWEEN '$startdate' AND '$enddate'";
      $run_subli=mysqli_query($conn,$selectsubli);
      $row_count=mysqli_num_rows($run_subli);
      while($row_subli=mysqli_fetch_array($run_subli))
      {
      $customer_name=$row_subli['name'];     
      ?>
      <option value="<?php echo $customer_name; ?>" data-cusid="<?php echo $row_subli['id']; ?>"></option>
     <?php
     }
    ?>
</datalist>    
 
<p id="displayinvoice_no" class="errormessage"></p>    
</div>
	</div>	
	
    
    
<div class="form-group row">

<label class="col-12 col-lg-3 col-form-label text-sm-right">Vehicle No</label>
<div class="col-12 col-sm-8 col-lg-6">
<input list="listcustomervehicleno" type="text" placeholder="Vehicle No" class="form-control changejobcardvehickenumbernum" id="addcustomer_vehickenumbernum" value="<?php echo $row_jobcardstore['vehicleno']; ?>">    
<datalist id="listcustomervehicleno">
  <?php
      $selectsubli="SELECT * FROM `customer` WHERE date BETWEEN '$startdate' AND '$enddate'";
      $run_subli=mysqli_query($conn,$selectsubli);
      $row_count=mysqli_num_rows($run_subli);
      while($row_subli=mysqli_fetch_array($run_subli))
      {
      $customer_vehicleno=$row_subli['vehicleno'];
          
      $str_customer_vehicleno =explode("@@@@",$customer_vehicleno);    
       
      $itemcount=count($str_customer_vehicleno);

		for($i=0;$i<$itemcount;$i++)
		{      
          
      ?>
      <option value="<?php echo $str_customer_vehicleno[$i]; ?>" data-cusid="<?php echo $row_subli['id']; ?>"></option>
     <?php
     }
      }
    ?>
</datalist>    

<div id="displaycusdetails"></div>	
   
</div>
	</div>	
    
    
    
       
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Card No</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Card No" class="form-control" id="addcardno" value="<?php echo $row_jobcardstore['cardnum']; ?>">
<p id="displaycustomer_name" class="errormessage"></p>    
</div>
</div>
 
   
    
    
    
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Date / Time</label>
<div class="col-12 col-sm-8 col-lg-3">
<input type="date"  placeholder="Date" class="form-control" id="jobcarddate" value="<?php echo $row_jobcardstore['date']; ?>">
<p id="displaycustomer_phone" ></p>        
</div>
    <div class="col-12 col-sm-8 col-lg-3">
<input type="time"  placeholder="Time" class="form-control" id="jobcardtime" value="<?php echo $row_jobcardstore['time']; ?>">
<p id="displaycustomer_phone" ></p>        
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Entry Time</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="time"  placeholder="Entry Time" class="form-control" id="entrytime" value="<?php echo $row_jobcardstore['entrytime']; ?>">
<p id="displaycustomer_email_id"></p>    
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Geeting Time</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="time"  placeholder="Geeting Time" class="form-control" id="greetingtime" value="<?php echo $row_jobcardstore['greetingtime']; ?>">
<p id="displaygst_number"></p>    
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Job Card Ofter Time</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="time"  placeholder="Job Card Ofter Time" class="form-control" id="aftertime" value="<?php echo $row_jobcardstore['aftertime']; ?>">   
</div>
</div>
	
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Phone</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="number"  placeholder="Phone" class="form-control" id="addjobcardphonenumber" value="<?php echo $row_jobcardstore['phonenumber']; ?>">   
</div>
</div>
	
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Email</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="email"  placeholder="Email" class="form-control" id="addjobcardemail" value="<?php echo $row_jobcardstore['email']; ?>">   
</div>
</div>
	
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Birthday</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="date"  placeholder="Birthday" class="form-control" id="addjobcardbirthday" value="<?php echo $row_jobcardstore['birthday']; ?>">   
</div>
</div>	
	
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">demanded & Repair</label>
<div class="col-12 col-sm-8 col-lg-6">
<textarea class="form-control" placeholder="Repair" id="addjobcardrepair" value="<?php echo $row_jobcardstore['repair']; ?>"></textarea>	  
</div>
</div>	

<div class="form-group row">
<h3 class="col-12 col-sm-3 col-form-label text-sm-right">Vehicle</h3>
</div>	
	
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Modal</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="text"  placeholder="Modal" class="form-control" id="addjobcardmodal" value="<?php echo $row_jobcardstore['modal']; ?>">   
</div>
</div>	

<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Reg No</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="text"  placeholder="Reg No" class="form-control" id="addjobcardregno" value="<?php echo $row_jobcardstore['regno']; ?>">   
</div>
</div>	

<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Chassis No</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="text"  placeholder="Chassis No" class="form-control" id="addjobcardchassisno" value="<?php echo $row_jobcardstore['chassisno']; ?>">   
</div>
</div>	

<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Milage</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="text"  placeholder="Milage" class="form-control" id="addjobcardmilage" value="<?php echo $row_jobcardstore['milage']; ?>">   
</div>
</div>	
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Engine No</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="text"  placeholder="Engine No" class="form-control" id="addjobcardengineno" value="<?php echo $row_jobcardstore['engineno']; ?>">   
</div>
</div>	    

<?php
    
 $servicetypeid=$row_jobcardstore['servicetype'];    
    
 $selectservicetype="SELECT * FROM `servicetype` where id='$servicetypeid'";
 $run_servicetype=mysqli_query($conn,$selectservicetype);
 $row_servicetype=mysqli_fetch_array($run_servicetype);   
?>    
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Service Type</label>
<div class="col-12 col-sm-8 col-lg-6">
<input list="listservicetype" type="text" placeholder="Service Type" class="form-control changeservicetypenum" id="updateservicetypenum" value="<?php echo $row_servicetype['servicetype']; ?>">    
<datalist id="listservicetype">
  <?php
      $selectservicetype="SELECT * FROM `servicetype`";
      $run_servicetype=mysqli_query($conn,$selectservicetype);
      while($row_servicetype=mysqli_fetch_array($run_servicetype))
      {
      ?>
      <option value="<?php echo $row_servicetype['servicetype']; ?>" data-cusid="<?php echo $row_servicetype['id']; ?>"></option>
     <?php
     }
    ?>
</datalist>    
   
</div>
</div>	
    

<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Service Adivisor</label>
<div class="col-12 col-sm-8 col-lg-6">
<textarea class="form-control" placeholder="Service Adivisor" id="addjobcardserviceadvisorcommend" value="<?php echo $row_jobcardstore['serviceadvisorcommend']; ?>"></textarea>	   
</div>
</div>	
	
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Commends</label>
<div class="col-12 col-sm-8 col-lg-6">
<textarea class="form-control" placeholder="Commends" id="addjobcardcommends" value="<?php echo $row_jobcardstore['commends']; ?>"></textarea>	   
</div>
</div>	

<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Additional Commends</label>
<div class="col-12 col-sm-8 col-lg-6">
<textarea class="form-control" placeholder="Additional Commends" id="addjobcardadditionalcommends" value="<?php echo $row_jobcardstore['additionalcommends']; ?>"></textarea>	   
</div>
</div>	
	
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Technician</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="text"  placeholder="Technician" class="form-control" id="addjobcardtechnician" value="<?php echo $row_jobcardstore['technician']; ?>">   
</div>
</div>

<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Service Adivisor</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="text"  placeholder="Service Adivisor" class="form-control" id="addjobcardserviceadivisor"  value="<?php echo $row_jobcardstore['serviceadivisor']; ?>">   
</div>
</div>

<?php
   $checkvehiclepickup=$row_jobcardstore['vehiclepickup']; 
?>     
	
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Vehicle Pick up</label>
<div class="col-12 col-sm-8 col-lg-6">
 
<?php
   if($checkvehiclepickup == 'Yes')
   {
   ?>
    <input type="checkbox"  name="vehiclepickup" id="vehiclepickupyes" value="Yes" checked />
    <label for="vehiclepickupyes"> &nbsp; &nbsp;
Yes &nbsp; &nbsp;</label>
    <input type="checkbox"  name="vehiclepickup" id="vehiclepickupno" value="No"  />
    <label for="vehiclepickupno"> &nbsp; &nbsp;
No</label>  
   <?php    
   }
   else
   {
    ?>
    <input type="checkbox"  name="vehiclepickup" id="vehiclepickupyes" value="Yes"  />
    <label for="vehiclepickupyes"> &nbsp; &nbsp;
Yes &nbsp; &nbsp;</label>
    <input type="checkbox"  name="vehiclepickup" id="vehiclepickupno" value="No" checked />
    <label for="vehiclepickupno"> &nbsp; &nbsp;
No</label> 
   <?php 
   }
?>    
     
</div>
</div>
    
<?php
   $checkvehicledrop=$row_jobcardstore['vehicledrop']; 
?>     
	
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Vehicle Drop</label>
<div class="col-12 col-sm-8 col-lg-6">
 
<?php
   if($checkvehicledrop == 'Yes')
   {
   ?>
    <input type="checkbox"  name="vehicledrop" id="vehicledropyes" value="Yes" checked />
    <label for="vehicledropyes"> &nbsp; &nbsp;
Yes &nbsp; &nbsp;</label>
    <input type="checkbox"  name="vehicledrop" id="vehicledropno" value="No"  />
    <label for="vehicledropno"> &nbsp; &nbsp;
No</label>  
   <?php    
   }
   else
   {
    ?>
    <input type="checkbox"  name="vehicledrop" id="vehicledropyes" value="Yes"  />
    <label for="vehicledropyes"> &nbsp; &nbsp;
Yes &nbsp; &nbsp;</label>
    <input type="checkbox"  name="vehicledrop" id="vehicledropno" value="No" checked />
    <label for="vehicledropno"> &nbsp; &nbsp;
No</label> 
   <?php 
   }
?>    
     
</div>
</div>	
    
    
       

	<?php
	
	$date=date('Y-m-d');
	
	?>
	
<div class="form-group row text-center">
<div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
<input type="hidden"  class="form-control" id="jobcardupdateid" value="<?php echo $jobcardupid; ?>">	
<button type="button" class="btn btn-space btn-primary" id="updatejobcardsubmit">Submit</button>
<button class="btn btn-space btn-secondary" type="reset">Cancel</button>
<div id="add_jobcard_all"></div>    
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




<script>
$(document).ready(function(){
    
    var addcustomer_vehickenumbernum=$("#addcustomer_vehickenumbernum").val();
    
    if(addcustomer_vehickenumbernum == '')
    {    
        changejobcardcustomernum();
    }
    else
    {
        changejobcardvehickenumbernum();
    }
    
});
</script>