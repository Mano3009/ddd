<?php session_start(); ?>
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
    
<h3 class="card-header text-center">Add Expense</h3>
<div class="card-body" id="new_invoice">
    

<form id="addexpensesform" method="post" data-parsley-validate="" novalidate="">
   	
	<?php
	
	$date=date('Y-m-d');
	
	?>
       
<div class="form-group row">
<label class="col-12 col-sm-3 col-form-label text-sm-right">Date</label>
<div class="col-12 col-sm-8 col-lg-6">
<input type="date"  placeholder="Select Date" class="form-control" id="addexpendsdate" value="<?php echo $date; ?>">
</div>
</div>
 
<div class="form-group row">
<div class="table-responsive">
<table  class="table table-striped table-bordered">
<thead>
<tr>
<th>Expense Category</th>
<th>Amount</th>	
<th>Remarks</th>
<th>Cancel</th>    
</tr>
</thead>
    
<tbody id="dynamic_field">
 
	

<datalist id="expendscategorylist">
  <?php
      $selectexpendscategory="SELECT * FROM `expendscategory` ORDER BY id DESC";
      $run_expendscategory=mysqli_query($conn,$selectexpendscategory);
      $row_expendscategory=mysqli_num_rows($run_expendscategory);
      while($row_expendscategory=mysqli_fetch_array($run_expendscategory))
      {
      $categoryname=$row_expendscategory['categoryname'];    
      ?>
    <option value="<?php echo $categoryname; ?>"></option>
     <?php
      }
    ?>
</datalist> 	
	
	
<tr count="1" id="displayexpends1">
<td>
<input list="expendscategorylist" type="text" placeholder="Expends Category" class="form-control1"  name="expendscategoryname[]">   
</td>	
<td>
<input type="number" placeholder="Amount" class="form-control1 changeexpendsamount" id="expendsamount1" name="expendsamount[]" changeid="1"> 
</td>    
<td>
<input type="text" placeholder="Remarks" class="form-control1"  name="expendsremark[]">    
</td>
<td><button type="button" name="remove" id="1" class="btn btn-danger removeexpendsrow remove">X</button></td>	
</tr>    
     
</tbody>
    
</table>
</div>  
</div>    
	
	
	<div class="form-group row">
<div class="col-12 col-sm-12 col-lg-12">
<button type="button" class="btn btn-space btn-primary" id="addexpensesrowid">Add</button>   
</div>
</div>

	
	<div class="form-group row">
             
            <label class="col-12 col-sm-3 col-lg-3 col-form-label text-sm-right">Total : </label> 
            <div class="col-12 col-sm-8 col-lg-6 ">
                <input type="number" class="form-control" id="displayalltotal" readonly="">
            </div>
          </div>
	
	
<div class="form-group row text-center">
<div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
<button type="submit" class="btn btn-space btn-primary" id="addjobcardsubmit">Submit</button>
<button class="btn btn-space btn-secondary" type="reset">Cancel</button>
<div id="displayexpends"></div>    
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