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
<div class="col-md-6 text-left"><br><h3 class="card-header">Sales Report</h3></div>
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
<th>Invoice Date</th>
<th>Customer Num</th>
<th>Part No</th>	
<th>Part Description</th>
<th>Unit</th>
<th>Unittype</th>	
<th>Category</th>
<th>Price</th>
<th>Selling Price</th>	
<th>Gst</th>
<th>Qty</th>
<th>HSN</th>	
<th>Total</th>
</tr>
</thead>
    
<tbody id="dynamic_field">	
	     
	
<?php
	
$selectinvoice="SELECT * FROM `invoice` WHERE invoicedate BETWEEN '$startdate' AND '$enddate'";
$runinvoice=mysqli_query($conn,$selectinvoice);
$snum=1;    
$checkinvoicecount=mysqli_num_rows($runinvoice);
while($rowinvoice=mysqli_fetch_array($runinvoice))
{
	
	 $part_code=$rowinvoice['code'];
		$part_inventoryinvoicenum=$rowinvoice['inventoryinvoicenum'];
		$part_name=$rowinvoice['name'];
		$part_unit=$rowinvoice['unit'];      
		$part_unittype=$rowinvoice['unittype'];
		$part_category=$rowinvoice['category'];
		$part_price=$rowinvoice['price'];
		$part_sellingprice=$rowinvoice['sellingprice'];
		$part_gst=$rowinvoice['gst'];
		$part_qty=$rowinvoice['qty'];      
		$part_hsn=$rowinvoice['hsn'];
		$part_total=$rowinvoice['total'];
	
	
	 $str_pro_inventory_code =explode("@@@@",$part_code);
		$str_pro_inventory_name =explode("@@@@",$part_name);
		$str_pro_unit =explode("@@@@",$part_unit);
		$str_pro_unittype =explode("@@@@",$part_unittype);
		$str_pro_category =explode("@@@@",$part_category);      
		$str_pro_price =explode("@@@@",$part_price);
		$str_pro_sellingprice =explode("@@@@",$part_sellingprice);      
		$str_part_gst =explode("@@@@",$part_gst);
		$str_part_qty =explode("@@@@",$part_qty);
		$str_part_hsn =explode("@@@@",$part_hsn);
		$str_part_total =explode("@@@@",$part_total);
	
	 $itemcount=count($str_pro_inventory_code);

		for($i=0;$i<$itemcount;$i++)
		{
	
	 ?>
	
	  <tr>
			<td><?php echo $snum; ?></td>
			<td><?php echo $rowinvoice['invoicenum']; ?></td>	
			<td><?php echo $rowinvoice['invoicedate']; ?></td>
			<td><?php echo $rowinvoice['customer']; ?></td>
			<td><?php echo $str_pro_inventory_code[$i]; ?></td>	
			<td><?php echo $str_pro_inventory_name[$i]; ?></td>
			<td><?php echo $str_pro_unit[$i]; ?></td>
			<td><?php echo $str_pro_unittype[$i]; ?></td>	
			<td><?php echo $str_pro_category[$i]; ?></td>
			<td><?php echo $str_pro_price[$i]; ?></td>	
			<td><?php echo $str_pro_sellingprice[$i]; ?></td>
			<td><?php echo $str_part_gst[$i]; ?></td>
			<td><?php echo $str_part_qty[$i]; ?></td>	
			<td><?php echo $str_part_hsn[$i]; ?></td>
			<td><?php echo $str_part_total[$i]; ?></td>
			</tr>
	
	 <?php
	
	 $snum=$snum+1;
		}
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