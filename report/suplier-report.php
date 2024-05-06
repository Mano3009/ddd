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
<div class="col-md-6 text-left"><br><h3 class="card-header">Suplier Report</h3></div>
<div class="col-md-6 text-right"><br>
<?php
    $loginid= $_SESSION["loginid"];
    
    if($loginid == 1)
    {
    ?>
    <button type="button" class="btn btn-success" onclick="tableToCSV()">download CSV
</button>&nbsp;&nbsp;
    <?php
    }
?>    
  </div>    
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
<th>Suplier Name</th>	
<th>Suplier Code</th>
<th>Suplier Phone</th>
<th>Suplier Email Id</th>	
<th>GST Number</th>
<th>Company Address</th>
<th>Place Name</th>	
<th>Pincode</th>
</tr>
</thead>
    
<tbody id="dynamic_field">	
	     
	
<?php
	
$selectsuplier="SELECT * FROM `suplier` WHERE date BETWEEN '$startdate' AND '$enddate'";
$runsuplier=mysqli_query($conn,$selectsuplier);
$i=1;    
$checksupliercount=mysqli_num_rows($runsuplier);
while($rowsuplier=mysqli_fetch_array($runsuplier))
{
	
	 ?>
	
	  <tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $rowsuplier['name']; ?></td>	
			<td><?php echo $rowsuplier['code']; ?></td>
			<td><?php echo $rowsuplier['phono']; ?></td>
			<td><?php echo $rowsuplier['emailid']; ?></td>	
			<td><?php echo $rowsuplier['gstno']; ?></td>
			<td><?php echo $rowsuplier['address']; ?></td>
			<td><?php echo $rowsuplier['place']; ?></td>	
			<td><?php echo $rowsuplier['pincode']; ?></td>
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