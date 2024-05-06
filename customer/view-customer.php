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
<h2 class="pageheader-title">View Customer</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">View Customer</li>
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
<h5 class="card-header text-center">View Customer</h5>
<div class="card-body">
<div class="table-responsive ">
<table class="table" id="dataTables-example">
<thead>
<tr>
<th scope="col">S.No</th>
<th scope="col">Name</th>
<th scope="col">Code</th>
<th scope="col">Phone</th>
<th scope="col">GST</th>    
<th scope="col">Place</th>    
<th scope="col">Pincode</th>
<th scope="col">Date</th>
<th scope="col">Status</th>    
</tr>
</thead>
<tbody id="dispalynextdoc">
<?php
$selectcus="SELECT * FROM `customer` ORDER BY id DESC";
$run_cus=mysqli_query($conn,$selectcus);
$i=1;    
$checkcustomercount=mysqli_num_rows($run_cus);
if($checkcustomercount > 0)    
{

while($row_cus=mysqli_fetch_array($run_cus))
{    
?>    
  
<tr id="deletehide<?php echo $row_cus['id']; ?>">
<th scope="row"><?php echo $i; ?></th>
<td><?php echo $row_cus['name']; ?></td>
<td><?php echo $row_cus['code']; ?></td>
<td><?php echo $row_cus['phono']; ?></td>
<td><?php echo $row_cus['gstno']; ?></td>
<td><?php echo $row_cus['place']; ?></td>
<td><?php echo $row_cus['pincode']; ?></td>
<td><?php echo $row_cus['date']; ?></td>    
<td><div class="btn-group">    
<a  href="<?php echo $baseurl; ?>customer/update-customer.php?cusupid=<?php echo $row_cus['id']; ?>"><button class="btn btn-sm btn-outline-light"><i class="fas fa-pencil-alt"></i></button></a>
<button class="btn btn-sm btn-outline-light clickdeletecus" 
removecusid="<?php echo $row_cus['id']; ?>">
<i class="far fa-trash-alt"></i>
</button>
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