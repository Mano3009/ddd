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
<h2 class="pageheader-title">View Product Details</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">View Product Details</li>
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
<h5 class="card-header text-center">View Product Details</h5>
<div class="card-body">
<div class="table-responsive ">
<table class="table" id="dataTables-example">
<thead>
<tr>
<th scope="col">S.No</th>
<th scope="col">Code</th>
<th scope="col">Name</th>
<th scope="col">Unit</th>
<th scope="col">Unit Type</th>    
<th scope="col">Category</th>    
<th scope="col">Price</th>
<th scope="col">Selling Price</th>
<th scope="col">GST</th>
<th scope="col">HSN</th> 
<th scope="col">Date</th>
<th scope="col">Status</th>    
</tr>
</thead>
<tbody id="dispalynextdoc">
<?php
$selectproductdetail="SELECT * FROM `productdetails` ORDER BY id DESC";
$run_productdetail=mysqli_query($conn,$selectproductdetail);
$i=1;    
$checkproductdetailscount=mysqli_num_rows($run_productdetail);
if($checkproductdetailscount > 0)    
{

while($row_productdetail=mysqli_fetch_array($run_productdetail))
{    
?>    
  
<tr id="deletehide<?php echo $row_productdetail['id']; ?>">
<th scope="row"><?php echo $i; ?></th>
<td><?php echo $row_productdetail['code']; ?></td>
<td><?php echo $row_productdetail['name']; ?></td>
<td><?php echo $row_productdetail['unit']; ?></td>
<td><?php echo $row_productdetail['unittype']; ?></td>
<td><?php echo $row_productdetail['category']; ?></td>
<td><?php echo $row_productdetail['price']; ?></td>
<td><?php echo $row_productdetail['sellingprice']; ?></td>
<td><?php echo $row_productdetail['gst']; ?></td>    
<td><?php echo $row_productdetail['hsn']; ?></td>
<td><?php echo $row_productdetail['date']; ?></td>    
<td><div class="btn-group">    
<a  href="<?php echo $baseurl; ?>part-code/update-product.php?cusupid=<?php echo $row_productdetail['id']; ?>"><button class="btn btn-sm btn-outline-light"><i class="fas fa-pencil-alt"></i></button></a>
<button class="btn btn-sm btn-outline-light clickdeleteproductdetails" 
removeid="<?php echo $row_productdetail['id']; ?>">
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
<div id="deleteproductid"></div>
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