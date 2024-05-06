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
<h2 class="pageheader-title">Update  Invoice</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Update  Invoice</li>
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
    
<h3 class="card-header text-center">Update  Invoice</h3>
<div class="card-body" id="new_inventory">
  
	
<?php
  $invoiceupid=$_GET['invoiceupid'];
	
  $selectinvoice="SELECT * FROM `invoice` WHERE id='$invoiceupid'";
  $run_invoice=mysqli_query($conn,$selectinvoice);
  $row_invoice=mysqli_fetch_array($run_invoice);   
?>  	
	
	
<form id="updateinvoiceform" method="post">
      
<div class="form-group row">
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
	
<label class="col-12 col-lg-3 col-form-label">Invoice No</label>
<div class="col-12 col-sm-9 col-lg-9">  
<input type="text" placeholder="Invoice No" class="form-control" id="invoice_invoice_no" value="<?php echo $row_invoice['invoicenum']; ?>" readonly> 
<input type="hidden"  id="invoice_update_id" value="<?php echo $invoiceupid; ?>" readonly> 	
<p id="displayinvoice_no" class="errormessage"></p>    
</div>   
</div>    
</div>
	
	
<?php
    
      $customerid=$row_invoice['customer'];
 
      $selectsubli="SELECT * FROM `customer` WHERE id='$customerid'";
      $run_subli=mysqli_query($conn,$selectsubli);
      $row_count=mysqli_num_rows($run_subli);
      $row_subli=mysqli_fetch_array($run_subli);
    
?>    
    
    
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">Customer Name</label>
<div class="col-12 col-sm-9 col-lg-9">
<input list="listcustomername" type="text" placeholder="Customer Name" class="form-control changelocalcustomername" id="invoicecustomername" value="<?php echo $row_subli['name']; ?>">    
<datalist id="listcustomername">
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
</div>
    
    
</div> 
    
<div class="form-group row">
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">invoice Date</label>
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
<label class="col-12 col-lg-3 col-form-label">Vehicle Number</label>
<div class="col-12 col-sm-9 col-lg-9">  
<input list="listcustomervehiclenumber" type="text" placeholder="Vehicle Number" class="form-control changeinvoicecustomervehiclenumber" id="invoicecustomervehiclenumber" value="<?php echo $row_invoice['vehiclenumber']; ?>"> 
<datalist id="listcustomervehiclenumber">
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
<th>Part No</th>
<th>Invoice No</th>	
<th>Part Description</th>
<th>Unit</th>
<th>Unittype</th>
<th>Category</th>	
<th>Price</th>
<th>Selling Price</th>	
<th>Gst</th>
<th>Inventory Qty</th>	
<th>Qty</th>	
<th>HSN</th>    
<th>Total</th>    
<th>Cancel</th>    
</tr>
</thead>
    
<tbody id="dynamic_field">
 
<datalist id="part_code">
  <?php
      $selectpart_name="SELECT * FROM `productdetails` WHERE date BETWEEN '$startdate' AND '$enddate'";
      $run_query=mysqli_query($conn,$selectpart_name);
      $row_count=mysqli_num_rows($run_query);
      while($row_part_name=mysqli_fetch_array($run_query))
      {
      $pro_codee=$row_part_name['code'];
      $pro_id=$row_part_name['id'];      
      ?>
    <option value="<?php echo $pro_codee; ?>"  data-proid="<?php echo $pro_id; ?>">
    </option>
     <?php
      }
    ?>
</datalist> 	
	
<?php
	
	$part_id=$row_invoice['inventory_pro_id'];
	
	$part_code=$row_invoice['code'];
	$part_inventoryinvoicenum=$row_invoice['inventoryinvoicenum'];
	$part_name=$row_invoice['name'];
	$part_unit=$row_invoice['unit'];      
	$part_unittype=$row_invoice['unittype'];
	$part_category=$row_invoice['category'];
	$part_price=$row_invoice['price'];
	$part_sellingprice=$row_invoice['sellingprice'];
	$part_gst=$row_invoice['gst'];
	$part_qty=$row_invoice['qty'];      
	$part_hsn=$row_invoice['hsn'];
	$part_total=$row_invoice['total'];
	
	
	$str_pro_id =explode("@@@@",$part_id);
	$str_pro_inventoryinvoicenum =explode("@@@@",$part_inventoryinvoicenum); 
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
	
	$itemcount=count($str_pro_id);

	for($i=0;$i<$itemcount;$i++)
 {    
	
		$invoiceproductchangecoderowid=$i+1;
		
		$inv_id=$str_pro_id[$i];

		$selectinvno="SELECT * FROM `inventory` WHERE id='$inv_id'";
		$run_invno=mysqli_query($conn,$selectinvno);
		$row_inventory=mysqli_fetch_array($run_invno); 

		$checkqty=$row_inventory['invoice_qty']+$str_part_qty[$i];
		
		$item = array(
			'rowid' => $invoiceproductchangecoderowid,
			'price' => $str_pro_sellingprice[$i],
			'gst' => $str_part_gst[$i],
			'qty' => $str_part_qty[$i]
	);


 $_SESSION["invoicetotal"][$invoiceproductchangecoderowid] = $item;
		
?>	
	
<tr count="<?php echo $invoiceproductchangecoderowid; ?>" id="display_invoice<?php echo $invoiceproductchangecoderowid; ?>">
<td>
<input type="text" placeholder="Part No" class="form-control1"  name="product_code[]" value="<?php echo $str_pro_inventory_code[$i]; ?>" readonly>   
</td>
<td>
<input type="text" placeholder="Part No" class="form-control1"  name="product_invoicenumber[]" value="<?php echo $str_pro_inventoryinvoicenum[$i]; ?>" readonly>   
</td>
<td>
<input  type="text" placeholder="Part Description" class="form-control1" id="product_name" name="product_name[]" value="<?php echo $str_pro_inventory_name[$i]; ?>" readonly>   
<input type="hidden" class="form-control2" name="inventory_part_id[]" value="<?php echo $str_pro_id[$i]; ?>">	
</td>    
<td>
<input type="text" placeholder="Unit" class="form-control1"  name="product_unit[]" value="<?php echo $str_pro_unit[$i]; ?>" readonly>    
</td>
<td>
<input type="text" placeholder="Unit Type" class="form-control1"  name="product_unittype[]" value="<?php echo $str_pro_unittype[$i]; ?>" readonly>    
</td>	
<td>
<input type="text" placeholder="Category" class="form-control1"  name="product_category[]" value="<?php echo $str_pro_category[$i]; ?>" readonly>  
</td>	
<td>
<input type="number" placeholder="Price" class="form-control1"  name="product_price[]"  value="<?php echo $str_pro_price[$i]; ?>"  readonly>  
</td>   
<td>
<input type="number" placeholder="Selling Price" class="form-control1 changeinvoicecalculation"  name="product_selling_price[]" invoiceid="<?php echo $invoiceproductchangecoderowid; ?>" value="<?php echo $str_pro_sellingprice[$i]; ?>" id="sellingprice<?php echo $invoiceproductchangecoderowid; ?>">
</td>    
<td>
<input type="number" placeholder="Gst" class="form-control1 changeinvoicecalculation"  name="product_gst[]" invoiceid="<?php echo $invoiceproductchangecoderowid; ?>" value="<?php echo $str_part_gst[$i]; ?>" id="gst<?php echo $invoiceproductchangecoderowid; ?>">
</td> 
<td>
<input type="number" placeholder="Inventory Qty" class="form-control1"  id="inventoryqty<?php echo $invoiceproductchangecoderowid; ?>" value="<?php echo $checkqty; ?>" readonly>
</td>
<td>
<input type="number" placeholder="Qty" class="form-control1 changeinvoicecalculation" name="inven_qty[]" invoiceid="<?php echo $invoiceproductchangecoderowid; ?>" id="qty<?php echo $invoiceproductchangecoderowid; ?>" value="<?php echo $str_part_qty[$i]; ?>">
</td>
<td>
<input type="text" placeholder="HSN" class="form-control1" name="inven_hsn[]" value="<?php echo $str_part_hsn[$i]; ?>" readonly>
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
<div class="table-responsive">
<table  class="table table-striped table-bordered">
<thead>
<tr>
<th>Labour Name</th>    
<th>Description</th>
<th>Cost</th>
<th>Gst</th>	    
<th>Total</th>    
<th>Cancel</th>    
</tr>
</thead>
    
<tbody id="dynamic_labour">
 

<?php
  
$labourname=$row_invoice['labourname'];
$description=$row_invoice['description'];      
$cost=$row_invoice['cost'];
$labourgst=$row_invoice['labourgst']; 
    
    
$str_labourname =explode("@@@@",$labourname);
$str_description =explode("@@@@",$description);
$str_cost =explode("@@@@",$cost);
$str_labourgst =explode("@@@@",$labourgst);    
    
    
$itemcount=count($str_labourname); 
    
for($i=0;$i<$itemcount;$i++)
 {      
    
    
    $labourrowid=$i+1;
    
?>    
    
<tr count="<?php echo $labourrowid; ?>" id="display_labour_invoice<?php echo $labourrowid; ?>">
<td>
<input type="text" placeholder="Labour Name" class="form-control1" name="labourname[]" value="<?php echo $str_labourname[$i]; ?>">    
</td>      
<td>
<input type="text" placeholder="Description" class="form-control1"  name="productdescription[]" value="<?php echo $str_description[$i]; ?>">   
</td>    
<td>
<input type="number" placeholder="Cost" class="form-control1 changelabourproductcost" name="productcost[]" id="productcost<?php echo $labourrowid; ?>" changeid="<?php echo $labourrowid; ?>" value="<?php echo $str_cost[$i]; ?>">    
</td>	
<td>
<input type="number" placeholder="GST" class="form-control1 changelabourproductcost" name="productgst[]" id="productgst<?php echo $labourrowid; ?>" changeid="<?php echo $labourrowid; ?>" value="<?php echo $str_labourgst[$i]; ?>">  
</td>	  
<td>
<input type="number" placeholder="Total" class="form-control1" name="invenlabourtotal[]" changeid="<?php echo $labourrowid; ?>" id="producttotal<?php echo $labourrowid; ?>" value="<?php echo $str_labourname[$i]; ?>">
</td>
<td>
<button type="button" name="remove" id="<?php echo $labourrowid; ?>" class="btn btn-danger removeinvoiceadisinalcostrowval remove">X</button>
</td>
    </tr>	
  
<?php
    
    echo "<script>$('.changelabourproductcost').keyup();</script>";
    
}
?>    
    
</tbody>
    
</table>
</div>  
</div>    
    
<div class="form-group row">
<div class="col-12 col-sm-8 col-lg-6">
<button type="button" class="btn btn-space btn-primary" id="addinvoicerowlabourid">Add</button>   
</div>
		
	
</div>
     
    
    
    
    
<div class="form-group row">
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
 <label class="col-12 col-lg-3 col-form-label">₹ Discount Amt</label>
<div class="col-12 col-sm-9 col-lg-9">
<input type="number" placeholder="Overall Discount Amount" class="form-control changeoverallinvoicecal" id="invoice_overall_discount_amount" value="<?php echo $row_invoice['overalldiscount']; ?>">    
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
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
 <label class="col-12 col-lg-3 col-form-label">₹ Paid Amount</label>
<div class="col-12 col-sm-9 col-lg-9">
<input type="text" placeholder="Paid Amount" class="form-control" id="invoice_paid_amt">    
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
            $('.changelabourproductcost').keyup();
			loadinvetntorytotal();
			
			
		});
		
		</script>