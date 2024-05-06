<?php session_start(); ?>
<!doctype html>
<html lang="en">
 

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  
<?php
  include("../link.php");  
	
	 if(isset($_SESSION["inventorytotal"]))    
		{
		unset($_SESSION["inventorytotal"]);    
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
<h2 class="pageheader-title">Add  Inventory</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Add  Inventory</li>
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
    
<h3 class="card-header text-center">Add  Inventory</h3>
<div class="card-body" id="new_inventory">
    
<form id="addinventoryform" method="post">
      
<div class="form-group row">
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">Invoice No</label>
<div class="col-12 col-sm-9 col-lg-9">  
<input type="text" placeholder="Invoice No" class="form-control" id="inventory_invoice_no"> 
<p id="displayinvoice_no" class="errormessage"></p>    
</div>   
</div>    
</div>
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">Supplier No</label>
<div class="col-12 col-sm-9 col-lg-9">
<input list="supplier_num" type="text" placeholder="Supplier No" class="form-control changelocalsupliernum" id="inventorysupliercode" >    
<datalist id="supplier_num">
  <?php
      $selectsubli="SELECT * FROM `suplier` WHERE date BETWEEN '$startdate' AND '$enddate'";
      $run_subli=mysqli_query($conn,$selectsubli);
      $row_count=mysqli_num_rows($run_subli);
      while($row_subli=mysqli_fetch_array($run_subli))
      {
      $supplier_num=$row_subli['code'];     
      ?>
      <option value="<?php echo $supplier_num; ?>"></option>
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
<label class="col-12 col-lg-3 col-form-label">Inventory Date</label>
<div class="col-12 col-sm-9 col-lg-9">
<?php
$date=date("Y-m-d");    
?>    
<input type="date" placeholder="Inventory Date" class="form-control changelogalinv" id="inven_date" value="<?php echo $date; ?>"> 
<p id="displayinvoice_no" class="errormessage"></p>    
</div>   
</div>    
</div>
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
<label class="col-12 col-lg-3 col-form-label">Supplier Name</label>
<div class="col-12 col-sm-9 col-lg-9">  
<input type="text" placeholder="Supplier Name" class="form-control" id="inventorysupliername" > 
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
	
	
<tr count="1" id="display_inventory1">
<td>
<input list="part_code" type="text" placeholder="Part No" class="form-control1 changelocalinventorypartcode"  changeid="1" name="product_code[]">   
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
<button type="button" class="btn btn-space btn-primary" id="add_local_inventory">Add</button>   
</div>
</div>
 
<div class="form-group row">
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
 <label class="col-12 col-lg-3 col-form-label">₹ Sub Total</label>
<div class="col-12 col-sm-9 col-lg-9">
<input type="text" placeholder="Sub Total" class="form-control" id="ineventory_sub_total" readonly="">    
</div>   
</div>        
</div>  

<div class="col-md-6 col-lg-6 text-right">
<div class="row">
 <label class="col-12 col-lg-3 col-form-label text-left">₹ Gst Amount</label>
<div class="col-12 col-sm-9 col-lg-9">
<input type="text" placeholder="Gst Amount" class="form-control" id="ineventory_gst_amount" readonly=""> 
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
<input type="text" placeholder="Grand Total" class="form-control" id="ineventory_grand_total" readonly="">    
</div>   
</div>        
</div>
	
<div class="col-md-6 col-lg-6 text-left">
<div class="row">
 <label class="col-12 col-lg-3 col-form-label">₹ Paid Amount</label>
<div class="col-12 col-sm-9 col-lg-9">
<input type="text" placeholder="Paid Amount" class="form-control" id="local_ineventory_paid_amt">    
</div>   
</div>        
</div>	
    
</div>

    
    
<div class="form-group row text-center">
<div class="col col-sm-12 col-lg-12 offset-sm-1 offset-lg-0">
<button type="submit" class="btn btn-space btn-primary inventorysubmit pageloadcheck">Submit</button>
<button class="btn btn-space btn-secondary" type="reset">Cancel</button>    
<div id="display_inventory_all"></div>    
</div>
</div>
    
</form>
    
</div>
</div>
</div>

<div id="displayinventory"></div>

					
					
					
					
					
					
					
  
        
    </div>

    
    <?php
    
    include("../script.php");
    
    ?>
   
  <script src="main.js"></script>  
    
</body>
 

</html>