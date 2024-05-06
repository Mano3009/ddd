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
<h2 class="pageheader-title">Add Service Type</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Add Service Type</li>
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
<h3 class="card-header text-center">Add Service Type</h3>
<div class="card-body">   
	
<form  data-parsley-validate="" novalidate="">
    
	
       
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Service Type name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Service Type name" class="form-control" id="addservicetypename">
<p id="displaycustomer_name" class="errormessage"></p>    
</div>
</div>
 
   

	
<div class="form-group row text-center">
<div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">	
<button type="button" class="btn btn-space btn-primary" id="addservicetypesubmit">Submit</button>
<button class="btn btn-space btn-secondary" type="reset">Cancel</button>
<div id="add_servicetype_all"></div>    
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
   
  <script src="main.js"></script>  
    
</body>
 

</html>