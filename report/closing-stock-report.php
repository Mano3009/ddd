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
<div class="col-md-6 text-left"><br><h3 class="card-header">Closing Stock Report</h3></div>
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
<th>Invoice No</th>	
<th>Inventory Date</th>
<th>Supplier Num</th>
<th>Part No</th>	
<th>Part Description</th>
<th>Price</th>
<th>Selling Price</th>	
<th>Qty</th>
</tr>
</thead>
    
<tbody id="dynamic_field">	
	     
	
<?php
	
$selectinventory="SELECT * FROM `inventory` WHERE inventorydate BETWEEN '$startdate' AND '$enddate' AND invoice_qty=0";
$runinventory=mysqli_query($conn,$selectinventory);
$i=1;    
$checkinventorycount=mysqli_num_rows($runinventory);
while($rowinventory=mysqli_fetch_array($runinventory))
{
	
	 ?>
	
	  <tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $rowinventory['inventoryinvoiceno']; ?></td>	
			<td><?php echo $rowinventory['inventorydate']; ?></td>
			<td><?php echo $rowinventory['inventorysupliernum']; ?></td>
			<td><?php echo $rowinventory['code']; ?></td>	
			<td><?php echo $rowinventory['name']; ?></td>
			<td><?php echo $rowinventory['price']; ?></td>	
			<td><?php echo $rowinventory['sellingprice']; ?></td>
			<td><?php echo $rowinventory['inventory_qty']; ?></td>	
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