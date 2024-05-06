<?php session_start(); ?>
<!doctype html>
<html lang="en">
 

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  
<?php
  include("../link.php");  
	
	 if(isset($_SESSION["invoicetotal"]))    
		{
		unset($_SESSION["invoicetotal"]);    
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
    
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="page-header">
<h2 class="pageheader-title">Update Proforma Invoice</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Update Proforma Invoice</li>
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
    
<h3 class="card-header text-center">Update  Proforma Invoice</h3>
<div class="card-body" id="new_inventory">
  
	
<?php
  $invoiceupid=$_GET['invoiceupid'];
	
  $selectinvoice="SELECT * FROM `perfoma-invoice` WHERE id='$invoiceupid'";
  $run_invoice=mysqli_query($conn,$selectinvoice);
  $row_invoice=mysqli_fetch_array($run_invoice);   
?>  	
	
	
<form id="updateperfomainvoiceform" method="post">
      
<div class="form-group row">
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
	
<label class="col-12 col-lg-3 col-form-label">Proforma Invoice No</label>
<div class="col-12 col-sm-9 col-lg-9">  
<input type="text" placeholder="Invoice No" class="form-control" id="invoice_invoice_no" value="<?php echo $row_invoice['invoicenum']; ?>" readonly> 
<input type="hidden"  id="invoice_update_id" value="<?php echo $invoiceupid; ?>" readonly> 	
<p id="displayinvoice_no" class="errormessage"></p>    
</div>   
</div>    
</div>
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">Customer</label>
<div class="col-12 col-sm-9 col-lg-9">
<input list="listcustomer" type="text" placeholder="Customer No" class="form-control changelocalcustomernum" id="invoicecustomercode" value="<?php echo $row_invoice['customer']; ?>">    
<datalist id="listcustomer">
  <?php
      $selectsubli="SELECT * FROM `customer` WHERE date BETWEEN '$startdate' AND '$enddate'";
      $run_subli=mysqli_query($conn,$selectsubli);
      $row_count=mysqli_num_rows($run_subli);
      while($row_subli=mysqli_fetch_array($run_subli))
      {
      $customer_num=$row_subli['code'];     
      ?>
      <option value="<?php echo $customer_num; ?>"></option>
     <?php
     }
    ?>
</datalist>    
 
<p id="displayinvoice_no" class="errormessage"></p>    
</div>   
</div>    
</div>
	
</div> 
    
<div class="form-group row">
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">Proforma Invoice Date</label>
<div class="col-12 col-sm-9 col-lg-9">
<?php
$date=date("Y-m-d");    
?>    
<input type="date" placeholder="invoice Date" class="form-control changelogalinv" id="inven_date"  value="<?php echo $row_invoice['invoicedate']; ?>"> 
<p id="displayinvoice_no" class="errormessage"></p>    
</div>   
</div>    
</div>
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">Customer Name</label>
<div class="col-12 col-sm-9 col-lg-9">  
<input type="text" placeholder="Customer Name" class="form-control" id="invoicecustomername" > 
<p id="displayinvoice_no" class="errormessage"></p>    
</div>   
</div>    
</div>
	
</div>    
   
<div class="form-group row">
<div class="table-responsive">
<table  class="table table-striped table-bordered">
	
<thead>
<tr>
<th>Part Description</th>
<th>HSN</th>  	
<th>Price</th>
<th>Gst</th>
<th>Qty</th>	  
<th>Total</th>    
<th>Cancel</th>    
</tr>
</thead>
    
<tbody id="dynamic_field">
	
<?php

	$part_name=$row_invoice['name'];
	$part_price=$row_invoice['price'];
	$part_gst=$row_invoice['gst'];
	$part_qty=$row_invoice['qty'];      
	$part_hsn=$row_invoice['hsn'];
	$part_total=$row_invoice['total'];
	
	
	$str_pro_inventory_name =explode("@@@@",$part_name);      
	$str_pro_price =explode("@@@@",$part_price);      
	$str_part_gst =explode("@@@@",$part_gst);
	$str_part_qty =explode("@@@@",$part_qty);
	$str_part_hsn =explode("@@@@",$part_hsn);
	$str_part_total =explode("@@@@",$part_total);
	
	$itemcount=count($str_pro_inventory_name);

	for($i=0;$i<$itemcount;$i++)
 {    
	
		$invoiceproductchangecoderowid=$i+1;
		
		
		$item = array(
			'rowid' => $invoiceproductchangecoderowid,
			'price' => $str_pro_price[$i],
			'gst' => $str_part_gst[$i],
			'qty' => $str_part_qty[$i]
	);


 $_SESSION["invoicetotal"][$invoiceproductchangecoderowid] = $item;
		
?>	
	
<tr count="<?php echo $invoiceproductchangecoderowid; ?>" id="display_invoice<?php echo $invoiceproductchangecoderowid; ?>">
<td>
<input  type="text" placeholder="Part Description" class="form-control1" id="product_name" name="product_name[]" value="<?php echo $str_pro_inventory_name[$i]; ?>" readonly>   
</td>
<td>
<input type="text" placeholder="HSN" class="form-control1" name="inven_hsn[]" value="<?php echo $str_part_hsn[$i]; ?>" readonly>
</td>	
<td>
<input type="number" placeholder="Price" class="form-control1 changeinvoicecalculation"  name="product_price[]" invoiceid="<?php echo $invoiceproductchangecoderowid; ?>" value="<?php echo $str_pro_price[$i]; ?>" id="price<?php echo $invoiceproductchangecoderowid; ?>">
</td>    
<td>
<input type="number" placeholder="Gst" class="form-control1 changeinvoicecalculation"  name="product_gst[]" invoiceid="<?php echo $invoiceproductchangecoderowid; ?>" value="<?php echo $str_part_gst[$i]; ?>" id="gst<?php echo $invoiceproductchangecoderowid; ?>">
</td> 
<td>
<input type="number" placeholder="Qty" class="form-control1 changeinvoicecalculation" name="product_Qty[]" invoiceid="<?php echo $invoiceproductchangecoderowid; ?>" id="qty<?php echo $invoiceproductchangecoderowid; ?>" value="<?php echo $str_part_qty[$i]; ?>">
</td>

<td>
<input type="number" placeholder="Total" class="form-control1" name="inven_total[]" readonly id="totalinvoice<?php echo $invoiceproductchangecoderowid; ?>">
</td>
<td>
<button type="button" name="remove" id="<?php echo $invoiceproductchangecoderowid; ?>" class="btn btn-danger removeinvoicerowval remove">X</button>
</td>

</tr>    
 
<?php
		
		echo "<script>$('.changeinvoicecalculation').keyup();</script>";
		
	}
?>		
	
</tbody>
    
</table>
</div>  
</div>    
    
<div class="form-group row">
<div class="col-12 col-sm-8 col-lg-6">
<button type="button" class="btn btn-space btn-primary" id="addinvoicerowid">Add</button>   
</div>
	
<div class="col-12 col-sm-8 col-lg-6">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">Invoice Type</label>
<div class="col-12 col-sm-9 col-lg-9">  
<input type="text" placeholder="Invoice Type" class="form-control" id="updateinvoicetypename" value="<?php echo $row_invoice['type']; ?>"> 
<p id="displayinvoice_no" class="errormessage"></p>    
</div>   
</div>
</div>	
	
</div>
 
<div class="form-group row">
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
 <label class="col-12 col-lg-3 col-form-label">₹ Sub Total</label>
<div class="col-12 col-sm-9 col-lg-9">
<input type="text" placeholder="Sub Total" class="form-control" id="invoice_sub_total" readonly="">    
</div>   
</div>        
</div>  

<div class="col-md-6 col-lg-6 text-right">
<div class="row">
 <label class="col-12 col-lg-3 col-form-label text-left">₹ Gst Amount</label>
<div class="col-12 col-sm-9 col-lg-9">
<input type="text" placeholder="Gst Amount" class="form-control" id="invoice_gst_amount" readonly=""> 
<p id="displaygst_amount" class="errormessage"></p>    
</div>   
</div>    
</div>        
</div>
    
<div class="form-group row">
    
   
    
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
 <label class="col-12 col-lg-3 col-form-label">₹ Grand Total</label>
<div class="col-12 col-sm-9 col-lg-9">
<input type="text" placeholder="Grand Total" class="form-control" id="invoice_grand_total" readonly="">    
</div>   
</div>        
</div>
	
    
</div>

    
    
<div class="form-group row text-center">
<div class="col col-sm-12 col-lg-12 offset-sm-1 offset-lg-0">
<button type="submit" class="btn btn-space btn-primary invoicesubmit pageloadcheck">Submit</button>
<button class="btn btn-space btn-secondary" type="reset">Cancel</button>    
<div id="display_invoice_all"></div>    
</div>
</div>
    
</form>

	
	
</div>
</div>
</div>

<div id="displayinvoice"></div>

					
					
					
					
					
					
					
  
        
    </div>

    
	    <?php
    
    include("../script.php");
    
    ?>
   
  <script src="main.js"></script>  
    
</body>
 

</html>
	
	
	<script>
		$(document).ready(function()
			{
			$('.changelocalcustomernum').change();
			$('.changeinvoicecalculation').keyup();
			loadinvetntorytotal();
			
			
		});
		
		</script>