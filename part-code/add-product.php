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
<h2 class="pageheader-title">Add Product</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Add Product</li>
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
<h3 class="card-header text-center">Add Part Code</h3>
<div class="card-body">
    
<form id="partcodeaddform" method="post">
    

<div class="table-responsive">
    
<datalist id="unittype">
<option value="Number"></option>
<option value="Fraction"></option>
</datalist>    
    
<table  class="table table-striped table-bordered">
    
<thead>
<tr>
<th>Code</th>    
<th>Name</th>
<th>Unit</th>
<th>Unit Type</th>
<th>Category</th>
<th>Price</th>
<th>Selling Price</th>
<th>GST</th>
<th>HSN</th>
<th>Date</th>
<th>Remove</th>    
</tr>
</thead>
    
<tbody id="dynamic_field" style="height: 10px !important; overflow: scroll; ">

<tr id="display_partcode1" count="1">
<td><input type="text" placeholder="Part Code" class="form-control2 changepartcode partcolor1" name="part_code[]" upid="1"></td>
<td><input type="text" placeholder="Part Name" class="form-control2" name="part_name[]"></td>    
<td><input type="text" placeholder="Unit" class="form-control2" name="part_unit[]"></td>    
<td><input type="text" placeholder="Unit Type" class="form-control2" name="part_unittype[]" list="unittype"></td>
<td><input type="text" placeholder="Category" class="form-control2" name="part_category[]"></td>
<td><input type="number" placeholder="Price" class="form-control2" name="part_price[]"></td>
<td><input type="number" placeholder="Selling Price" class="form-control2" name="part_selling_price[]"></td>
<td><input type="number" placeholder="GST" class="form-control2" name="part_gst[]"></td>
<td><input type="text" placeholder="HSN" class="form-control2" name="part_hsn[]"></td> <td><input type="date"  class="form-control2" name="part_date[]"></td> 
<td><button type="button" name="remove" id="1" class="btn btn-danger removenewpartcode remove">X</button></td>    
</tr>    
    
</tbody>    

</table>

</div>    
    
    
<div class="form-group row">
<div class="col-12 col-sm-8 col-lg-6">
<button type="button" class="btn btn-space btn-primary" id="add_partcode">Add</button>   
</div>
</div>
   
     
<div class="form-group row text-center">
<div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
<button type="submit" class="btn btn-space btn-primary" id="addpartsubmit">Submit</button>
<button class="btn btn-space btn-secondary" type="reset">Cancel</button>
<div id="add_product_all"></div>    
</div>
</div>
    
<div id="statuspartcode"></div>    
   
    
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