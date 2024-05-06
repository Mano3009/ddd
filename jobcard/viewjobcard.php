<?php session_start(); ?>
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
<h2 class="pageheader-title">View Jobcard</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">View Jobcard</li>
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
<h5 class="card-header text-center">View Jobcard</h5>
<div class="card-body">
<div class="table-responsive ">
<table class="table" id="dataTables-example">
<thead>
<tr>
<th scope="col">S.No</th>
<th scope="col">Name</th>
<th scope="col">No</th>
<th scope="col">Date</th>
<th scope="col">Time</th>    
<th scope="col">Entry Time</th>    
<th scope="col">Phone</th>
<th scope="col">Technician</th>
<th scope="col">Status</th>    
</tr>
</thead>
<tbody id="dispalynextdoc">
<?php
$selectjobcardstore="SELECT * FROM `jobcardstore` ORDER BY id DESC";
$run_jobcardstore=mysqli_query($conn,$selectjobcardstore);
$i=1;    
$checkjobcardstorecount=mysqli_num_rows($run_jobcardstore);
if($checkjobcardstorecount > 0)    
{

while($row_jobcardstore=mysqli_fetch_array($run_jobcardstore))
{    
	
	$customerid=$row_jobcardstore['cusid'];
	
	$selectcus="SELECT * FROM `customer` WHERE id='$customerid'";
 $run_cus=mysqli_query($conn,$selectcus);
	$row_cus=mysqli_fetch_array($run_cus);
	
?>    
  
<tr id="deletehide<?php echo $row_jobcardstore['id']; ?>">
<th scope="row"><?php echo $i; ?></th>
<td><?php echo $row_cus['name']; ?></td>
<td><?php echo $row_jobcardstore['cardnum']; ?></td>
<td><?php echo $row_jobcardstore['date']; ?></td>
<td><?php echo $row_jobcardstore['time']; ?></td>
<td><?php echo $row_jobcardstore['entrytime']; ?></td>
<td><?php echo $row_jobcardstore['phonenumber']; ?></td>
<td><?php echo $row_jobcardstore['technician']; ?></td>    
<td>
 <?php
  
    if(isset($_SESSION["loginid"]))
     {
         $loginid= $_SESSION["loginid"];
     }
    if($loginid == '1')
    {
    ?>   
<div class="btn-group">    
<a  href="<?php echo $baseurl; ?>jobcard/updatejobcard.php?jobcardupid=<?php echo $row_jobcardstore['id']; ?>"><button class="btn btn-sm btn-outline-light"><i class="fas fa-pencil-alt"></i></button></a>
<button class="btn btn-sm btn-outline-light clickdeletejobcard" 
removejobid="<?php echo $row_jobcardstore['id']; ?>">
<i class="far fa-trash-alt"></i>
</button>
</div>
    <?php
    }
?>     
</td>    
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
<div id="deletejobcardid"></div>
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