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
    
<h3 class="card-header text-center">Add Event</h3>
<div class="card-body" id="new_invoice">
    

<form id="addeventform" method="post" data-parsley-validate="" novalidate="">
   	
	<?php
	
	$date=date('Y-m-d');
	
	?>

    
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Event Name</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="text"  placeholder="Event Name" class="form-control" id="addeventname">
</div>
</div>
    
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Start Date</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="date"  placeholder="Select Date" class="form-control" id="addeventstartdate">
</div>
</div>
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">End Date</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="date"  placeholder="Select Date" class="form-control" id="addeventenddate">
</div>
</div>    
    
    
    
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Notification Date</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="date"  placeholder="Select Date" class="form-control" id="addnotificationdate">
</div>
</div>
 


	
	<div class="form-group row">
             
            <label class="col-12 col-sm-3 col-lg-3 col-form-label text-sm-right">Message : </label> 
            <div class="col-12 col-sm-8 col-lg-6 ">
                <input type="text"  placeholder="Enter Message" class="form-control" id="addeventmessage">
            </div>
          </div>
	
	
<div class="form-group row text-center">
<div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
<button type="submit" class="btn btn-space btn-primary" id="addjobcardsubmit">Submit</button>
<button class="btn btn-space btn-secondary" type="reset">Cancel</button>
<div id="displayevent"></div>    
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