<!doctype html>
<html lang="en">
 

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  
<?php
  include("../link.php");  
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
<h2 class="pageheader-title">Update Product Details</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Update Product Details</li>
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
<h3 class="card-header text-center">Update Product Details</h3>
<div class="card-body">   
    
    
<?php
  $cusupid=$_GET['cusupid'];      
  $selectcuscc="SELECT * FROM `productdetails` WHERE id='$cusupid'";
  $run_cc=mysqli_query($conn,$selectcuscc);
  $row_cc=mysqli_fetch_array($run_cc);   
?>     
    
    
<form id="updateproductdetails" data-parsley-validate="" novalidate="">
    
<div class="form-group row">
<!--<label class="col-12 col-sm-3 col-form-label text-sm-right">Suplier Code</label>-->
<div class="col-12 col-sm-8 col-lg-6">
     
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Code</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Suplier Name" class="form-control" id="productdetailscode" value="<?php echo $row_cc['code']; ?>">
<p id="displaysuplier_name" class="errormessage"></p>    
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Suplier Code" class="form-control" id="productdetailsname" value="<?php echo $row_cc['name']; ?>">
<p id="displaycompany_name" ></p>    
</div>
</div>    
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Unit</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Unit" class="form-control" id="productdetailsunit" value="<?php echo $row_cc['unit']; ?>">
<p id="displaycustomer_phone" ></p>        
</div>
</div>
    
<div class="form-group row">
	
<datalist id="unittype">
<option value="Number"></option>
<option value="Fraction"></option>
</datalist>	
	
<label class="col-12 col-sm-3 col-form-label text-sm-right">Unit Type</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Unit Type" class="form-control" id="suplier_unittype" value="<?php echo $row_cc['unittype']; ?>" list="unittype">
<p id="displayunittype"></p>    
</div>
</div>

    
 <div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Category</label>
<div class="col-12 col-sm-8 col-lg-6">
<input  type="text"  placeholder="Category" class="form-control" id="category" value="<?php echo $row_cc['category']; ?>">
<p id="displaystreet"></p>    
</div>
</div>
       
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Price</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="number"  placeholder="Price" class="form-control" id="price" value="<?php echo $row_cc['price']; ?>">    
  
  <p id="displaydistrict_name" ></p>   
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Selling Price</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="number"  placeholder="Selling Price" class="form-control" id="sellingprice" value="<?php echo $row_cc['sellingprice']; ?>">   
   <p id="displaystate"></p>    
</div>
</div>
    
 <div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Gst</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Gst" class="form-control" id="productdetailsgst" value="<?php echo $row_cc['gst']; ?>">   
   <p id="displaystate"></p>    
</div>
</div> 
    
 <div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">HSN</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="HSN" class="form-control" id="hsn" value="<?php echo $row_cc['hsn']; ?>">   
   <p id="displaystate"></p>    
</div>
</div> 
    
 <div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Date</label>
<div class="col-12 col-sm-8 col-lg-6">
	
<input type="date"  placeholder="Date" class="form-control" id="date" value="<?php echo $row_cc['date']; ?>"> 

<input type="hidden"  class="form-control" id="productdetailsuid" value="<?php echo $row_cc['id']; ?>"> 	
	
   <p id="displaystate"></p>    
</div>
</div>     
    
  
<div class="form-group row text-center">
<div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
<button type="submit" class="btn btn-space btn-primary" id="addsuplier">Submit</button>
<button class="btn btn-space btn-secondary" type="reset">Cancel</button>
<div id="update_product_details"></div>    
</div>
</div>
    
</form>
</div>
</div>
</div>

</div>
</div>
    
    
    
</div>
</div>
</div>    
    
  
        
    </div>

    
    <?php
    
    include("../script.php");
    
    ?>
    
	   <script src="main.js" type="application/javascript"></script>
    
</body>
 

</html>