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
<h2 class="pageheader-title">Add Proforma Invoice</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Add Proforma Invoice</li>
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
    
<h3 class="card-header text-center">Add Proforma Invoice</h3>
<div class="card-body" id="new_invoice">
    
<form id="addperfomainvoiceform" method="post">
      
<div class="form-group row">
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
	
<?php
	
$selectcount="SELECT * FROM `count` WHERE name='perfoma-invoice'";
$run_count=mysqli_query($conn,$selectcount);
$row_count=mysqli_fetch_array($run_count);
$ccount=$row_count['count'];
$totalid=$ccount+1;
$displayid=$totalid; 
?>
	
	
<label class="col-12 col-lg-3 col-form-label">Proforma Invoice No</label>
<div class="col-12 col-sm-9 col-lg-9">  
<input type="text" placeholder="Invoice No" class="form-control" id="invoice_invoice_no" value="<?php echo $displayid; ?>" readonly> 
<p id="displayinvoice_no" class="errormessage"></p>    
</div>   
</div>    
</div>
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">Customer</label>
<div class="col-12 col-sm-9 col-lg-9">
<input list="listcustomer" type="text" placeholder="Customer No" class="form-control changelocalcustomernum" id="invoicecustomercode" >    
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
<input type="date" placeholder="invoice Date" class="form-control changelogalinv" id="inven_date" value="<?php echo $date; ?>"> 
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
<th>Qty</th>	
<th>GST</th>
<th>Total</th>	  
<th>Cancel</th>    
</tr>
</thead>
    
<tbody id="dynamic_field">
<tr count="1" id="display_invoice1">
<td>
<input  type="text" placeholder="Part Description" class="form-control1" id="product_name" name="product_name[]">   
</td>    
<td>
<input type="text" placeholder="HSN" class="form-control1" id="hsn" name="product_hsn[]">    
</td>
<td>
<input type="number" placeholder="Price" class="form-control1 changeinvoicecalculation"  name="product_price[]" invoiceid="1" id="price1">
</td>	
<td>
<input type="number" placeholder="Qty" class="form-control1 changeinvoicecalculation" invoiceid="1"  name="product_Qty[]" id="qty1">    
</td>	
<td>
<input type="number" placeholder="GST" class="form-control1 changeinvoicecalculation" invoiceid="1"  name="product_gst[]" id="gst1">  
</td>	
<td>
<input type="number" placeholder="Total" class="form-control1" name="inven_total[]" id="totalinvoice1">
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
	</div>
	</div>
							</div>
					</div>
	</div>
  <script src="main.js"></script>  
    
</body>
 

</html>