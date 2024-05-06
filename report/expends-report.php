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
    
    
<div class="row">
<div class="col-md-6 text-left"><br><h3 class="card-header">Expenses Report</h3></div>
<div class="col-md-6 text-right"><br><?php
    $loginid= $_SESSION["loginid"];
    
    if($loginid == 1)
    {
    ?>
    <button type="button" class="btn btn-success" onclick="tableToCSV()">download CSV
</button>&nbsp;&nbsp;
    <?php
    }
?>   </div>    
</div>       
    
<div class="card-body" id="new_invoice">
    

<form id="addexpensesform" method="post" data-parsley-validate="" novalidate="">
   	
	<?php
	
	$date=date('Y-m-d');
	
	?>
       

 
<div class="form-group row">
<div class="table-responsive">
<table  class="table table-striped table-bordered">
<thead>
<tr>
<th>S.No</th>
<th>Date</th>	
<th>Expends Category</th>
<th>Amount</th>
<th>Remark</th>	
</tr>
</thead>
    
<tbody id="dynamic_field">	
	     
	
<?php
	
$selectexpenses="SELECT * FROM `expenses` WHERE date BETWEEN '$startdate' AND '$enddate'";
$runexpenses=mysqli_query($conn,$selectexpenses);
$snum=1;    
$checkexpensescount=mysqli_num_rows($runexpenses);
while($rowexpenses=mysqli_fetch_array($runexpenses))
{
	
	 $expendscategoryname=$rowexpenses['expendscategoryname'];
		$amount=$rowexpenses['amount'];
		$remark=$rowexpenses['remark'];
	
	
	 $str_expendscategoryname =explode("@@@@",$expendscategoryname);
		$str_amount =explode("@@@@",$amount);
		$str_remark =explode("@@@@",$remark);
	
	 $itemcount=count($str_expendscategoryname);

		for($i=0;$i<$itemcount;$i++)
		{
	
	 ?>
	
	  <tr>
			<td><?php echo $snum; ?></td>
			<td><?php echo $rowexpenses['date']; ?></td>	
			<td><?php echo $str_expendscategoryname[$i]; ?></td>	
			<td><?php echo $str_amount[$i]; ?></td>
			<td><?php echo $str_remark[$i]; ?></td>
	  </tr>
	
	 <?php
	
	 $snum=$snum+1;
		}
}	
	
?>	
	
	
</tbody>
    
</table>
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