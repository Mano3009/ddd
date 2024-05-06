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
<div class="col-md-6 text-left"><br><h3 class="card-header">Jobcard Report</h3></div>
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
<th>Customer</th>	
<th>Card No</th>
<th>Date</th>
<th>Time</th>	
<th>Entry Time</th>
<th>Geeting Time</th>
<th>Job Card Ofter Time</th>	
<th>Phone</th>
<th>Email</th>
<th>Birthday</th>	
<th>Repair</th>
<th>Modal</th>	
<th>Reg No</th>
<th>Chassis No</th>
<th>Engine No</th>
<th>Milage</th>	
<th>Please Ticket</th>
<th>Service Adivisor</th>
<th>Commends</th>	
<th>Additional Commends</th>
<th>Technician</th>
<th>Service Adivisor</th>		
</tr>
</thead>
    
<tbody id="dynamic_field">	
	     
	
<?php
	
$selectjobcardstore="SELECT * FROM `jobcardstore` WHERE date BETWEEN '$startdate' AND '$enddate'";
$runjobcardstore=mysqli_query($conn,$selectjobcardstore);
$i=1;    
$checkjobcardstorecount=mysqli_num_rows($runjobcardstore);
while($rowjobcardstore=mysqli_fetch_array($runjobcardstore))
{
	
	 ?>
	
	  <tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $rowjobcardstore['cusid']; ?></td>	
			<td><?php echo $rowjobcardstore['cardnum']; ?></td>
			<td><?php echo $rowjobcardstore['date']; ?></td>
			<td><?php echo $rowjobcardstore['time']; ?></td>	
			<td><?php echo $rowjobcardstore['entrytime']; ?></td>
			<td><?php echo $rowjobcardstore['greetingtime']; ?></td>
			<td><?php echo $rowjobcardstore['aftertime']; ?></td>	
			<td><?php echo $rowjobcardstore['phonenumber']; ?></td>
			<td><?php echo $rowjobcardstore['email']; ?></td>	
			<td><?php echo $rowjobcardstore['birthday']; ?></td>
			<td><?php echo $rowjobcardstore['repair']; ?></td>	
			<td><?php echo $rowjobcardstore['modal']; ?></td>	
			<td><?php echo $rowjobcardstore['regno']; ?></td>
			<td><?php echo $rowjobcardstore['chassisno']; ?></td>
			<td><?php echo $rowjobcardstore['engineno']; ?></td>
			<td><?php echo $rowjobcardstore['milage']; ?></td>	
			<td><?php echo $rowjobcardstore['ticket']; ?></td>
			<td><?php echo $rowjobcardstore['serviceadvisorcommend']; ?></td>	
			<td><?php echo $rowjobcardstore['commends']; ?></td>
			<td><?php echo $rowjobcardstore['additionalcommends']; ?></td>
			<td><?php echo $rowjobcardstore['technician']; ?></td>	
			<td><?php echo $rowjobcardstore['serviceadivisor']; ?></td>
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