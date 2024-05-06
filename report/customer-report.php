<!doctype html>
<html lang="en">
 

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  
<?php
  include("../link.php");  
	
	 if(isset($_SESSION["checkexpense"]))    
		{
		unset($_SESSION["checkexpense"]);    
		}
	
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
    
    
<div class="ecommerce-widget">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="card">
    
<div class="row">
<div class="col-md-6 text-left"><br><h3 class="card-header">Customer Report</h3></div>
<div class="col-md-6 text-right"><br><?php
    $loginid= $_SESSION["loginid"];
    
    if($loginid == 1)
    {
    ?>
    <button type="button" class="btn btn-success" onclick="tableToCSV()">download CSV
</button>&nbsp;&nbsp;
    <?php
    }
?>   </div>    
</div>    
    

    
<div class="card-body" id="new_invoice">
    

<form id="addexpensesform" method="post" data-parsley-validate="" novalidate="">
   	
	<?php
	
	$date=date('Y-m-d');
	
	?>
       

 
<div class="form-group row">
<div class="table-responsive">
<table  class="table table-striped table-bordered">
<thead>
<tr>
<th>S.No</th>
<th>Customer Name</th>	
<th>Customer Code</th>
<th>Customer Phone</th>
<th>Customer Email Id</th>	
<th>GST Number</th>
<th>Company Address</th>
<th>Place Name</th>	
<th>Pincode</th>
</tr>
</thead>
    
<tbody id="dynamic_field">	
	     
	
<?php
	
$selectcustomer="SELECT * FROM `customer` WHERE date BETWEEN '$startdate' AND '$enddate'";
$runcustomer=mysqli_query($conn,$selectcustomer);
$i=1;    
$checkcustomercount=mysqli_num_rows($runcustomer);
while($rowcustomer=mysqli_fetch_array($runcustomer))
{
	
	 ?>
	
	  <tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $rowcustomer['name']; ?></td>	
			<td><?php echo $rowcustomer['code']; ?></td>
			<td><?php echo $rowcustomer['phono']; ?></td>
			<td><?php echo $rowcustomer['emailid']; ?></td>	
			<td><?php echo $rowcustomer['gstno']; ?></td>
			<td><?php echo $rowcustomer['address']; ?></td>
			<td><?php echo $rowcustomer['place']; ?></td>	
			<td><?php echo $rowcustomer['pincode']; ?></td>
			</tr>
	
	 <?php
	
	 $i=$i+1;
	
}	
	
?>	
	
	
</tbody>
    
</table>
</div>  
</div>    


    
</form>
	
	
	
</div>
</div>
</div>



					
					
					
					
					
					
					
  
        
    </div>

    
    <?php
    
    include("../script.php");
    
    ?>
	</div>
	</div>
							</div>
					</div>
	</div>
  <script src="main.js"></script>  
    
</body>
 

</html>






