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
<h2 class="pageheader-title">View Expense</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">View Expense</li>
</ol>
</nav>
</div>
</div>
</div>
</div>


<div class="dashboard-short-list">
    
  
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 co-12">
<div class="card">
<h5 class="card-header text-center">View Expense</h5>
<div class="card-body">
<div class="table-responsive ">
<table class="table" id="dataTables-example">
<thead>
<tr>
<th scope="col">S.No</th>
<th scope="col">Date</th>
<th scope="col">Total</th> 
<th scope="col">Status</th>  
</tr>
</thead>
<tbody id="dispalynextdoc">
<?php
$selectexpenses="SELECT * FROM `expenses` ORDER BY id DESC";
$run_expenses=mysqli_query($conn,$selectexpenses);
$i=1;    
$checkexpensescount=mysqli_num_rows($run_expenses);
if($checkexpensescount > 0)    
{

while($row_expenses=mysqli_fetch_array($run_expenses))
{ 

	
?>    
  
<tr id="deletehide<?php echo $row_expenses['id']; ?>">
<th scope="row"><?php echo $i; ?></th>
<td><?php echo $row_expenses['date']; ?></td>
<td><?php echo $row_expenses['total']; ?></td>
<td><div class="btn-group">    
<a  href="<?php echo $baseurl; ?>invoice/invoice-bill-pdf.php?invoiceupid=<?php echo $row_expenses['id']; ?>"><button class="btn btn-sm btn-outline-light"><i class="fas fa-eye"></i></button></a>
	<a  href="<?php echo $baseurl; ?>invoice/update-invoice.php?invoiceupid=<?php echo $row_expenses['id']; ?>"><button class="btn btn-sm btn-outline-light"><i class="fas fa-pencil-alt"></i></button></a>
</div></td>    
</tr>
 <?php
$i++;    
}
    
}
?>    
    
</tbody>
</table>
</div>
 </div>
    
</div>    
<div id="deletecusid"></div>
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