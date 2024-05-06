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
    
    if(isset($_SESSION["labourinvoicetotal"]))    
		{
		unset($_SESSION["labourinvoicetotal"]);    
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
<h2 class="pageheader-title">Add  invoice</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Add  invoice</li>
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
    
<h3 class="card-header text-center">Add  invoice</h3>
<div class="card-body" id="new_invoice">
    
<form id="addinvoiceform" method="post">
      
<div class="form-group row">
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
	
<?php
	
$selectcount="SELECT * FROM `count` WHERE name='invoice'";
$run_count=mysqli_query($conn,$selectcount);
$row_count=mysqli_fetch_array($run_count);
$ccount=$row_count['count'];
$totalid=$ccount+1;
$displayid=$totalid; 
	
	
	
?>
	
	
<label class="col-12 col-lg-3 col-form-label">Invoice No</label>
<div class="col-12 col-sm-9 col-lg-9">  
<input type="text" placeholder="Invoice No" class="form-control" id="invoice_invoice_no" value="<?php echo $displayid; ?>" readonly> 
<p id="displayinvoice_no" class="errormessage"></p>    
</div>   
</div>    
</div>
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">Customer Name</label>
<div class="col-12 col-sm-9 col-lg-9">
<input list="listcustomername" type="text" placeholder="Customer Name" class="form-control changelocalcustomername" id="invoicecustomername" >    
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
<input type="date" placeholder="invoice Date" class="form-control changelogalinv" id="inven_date" value="<?php echo $date; ?>"> 
<p id="displayinvoice_no" class="errormessage"></p>    
</div>   
</div>    
</div>
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">Vehicle Number</label>
<div class="col-12 col-sm-9 col-lg-9">  
<input list="listcustomervehiclenumber" type="text" placeholder="Vehicle Number" class="form-control changeinvoicecustomervehiclenumber" id="invoicecustomervehiclenumber" > 
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
	
<div class="col-md-6 col-lg-6 text-left">
</div>
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">Jobcard Number</label>
<div class="col-12 col-sm-9 col-lg-9">  
<input list="listcustomerjobcardnumber" type="text" placeholder="Jobcard Number" class="form-control changeinvoicejobcardnumber" id="invoicecustomerjobcardnumber" > 
<datalist id="listcustomerjobcardnumber">
  <?php
      $selectjobcardstore="SELECT * FROM `jobcardstore` WHERE date BETWEEN '$startdate' AND '$enddate'";
      $run_jobcardstore=mysqli_query($conn,$selectjobcardstore);
      $row_count=mysqli_num_rows($run_jobcardstore);
      while($row_jobcardstore=mysqli_fetch_array($run_jobcardstore))
      {
          
        $cardnum=$row_jobcardstore['cardnum'];
        $cardnumid=$row_jobcardstore['id'];    
          
      ?>
      <option value="<?php echo $cardnum; ?>" data-cusid="<?php echo $cardnumid; ?>"></option>
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
	
	
<tr count="1" id="display_invoice1">
<td>
<input list="part_code" type="text" placeholder="Part No" class="form-control1 changelocalinvoicepartcode"  changeid="1" name="product_code[]" id="invoice_part_code1">   
</td>
<td id="display_inven_invno1">

</td>	
<td>
<input list="part_name" type="text" placeholder="Part Description" class="form-control1" id="product_name" name="product_name[]">   
</td>    
<td>
<input type="text" placeholder="Unit" class="form-control1" id="hsn" name="product_unit[]">    
</td>
<td>
<input type="text" placeholder="Unit Type" class="form-control1"  name="product_unittype[]">    
</td>	
<td>
<input type="text" placeholder="Category" class="form-control1"  name="product_category[]">  
</td>	
<td>
<input type="text" placeholder="Price" class="form-control1"  name="product_price[]">  
</td>   
<td>
<input type="text" placeholder="Selling Price" class="form-control1"  name="product_selling_price[]" invgetid="1">
</td>    
<td>
<input type="text" placeholder="Gst" class="form-control1"  name="product_gst[]">
</td>  
<td>
<input type="number" placeholder="Qty" class="form-control1" name="inven_qty[]">
</td>	
<td>
<input type="number" placeholder="Qty" class="form-control1" name="inven_qty[]">
</td>	
<td>
<input type="text" placeholder="HSN" class="form-control1" name="inven_hsn[]">
</td>
<td>
<input type="number" placeholder="Total" class="form-control1" name="inven_total[]">
</td>
<td></td>	
</tr>    
     
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
<input type="text" placeholder="Invoice Type" class="form-control" id="invoicetypename"> 
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
 
<tr count="1" id="display_labour_invoice1">
<td>
<input type="text" placeholder="Labour Name" class="form-control1" name="labourname[]">    
</td>      
<td>
<input type="text" placeholder="Description" class="form-control1"  name="productdescription[]">   
</td>    
<td>
<input type="number" placeholder="Cost" class="form-control1 changelabourproductcost" name="productcost[]" id="productcost1" changeid="1">    
</td>	
<td>
<input type="number" placeholder="GST" class="form-control1 changelabourproductcost" name="productgst[]" id="productgst1" changeid="1">  
</td>	  
<td>
<input type="number" placeholder="Total" class="form-control1" name="invenlabourtotal[]" changeid="1" id="producttotal1">
</td>
<td>
<button type="button" name="remove" id="1" class="btn btn-danger removeinvoiceadisinalcostrowval remove">X</button>
</td>
	
    
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
<div class="col-12 col-lg-9">
<input type="number" placeholder="Overall Discount Amount" class="form-control changeoverallinvoicecal" id="invoice_overall_discount_amount">    
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
	</div>
	</div>
							</div>
					</div>
	</div>
  <script src="main.js"></script>  
    
</body>
 

</html>