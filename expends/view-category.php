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
<h2 class="pageheader-title">View Category</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">View Category</li>
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
	
<div class="row">

	<div class="col-md-6">
	
		<h5 class="card-header text-left">View Category</h5>
		
	</div>
	
	<div class="col-md-6 text-right">
	
		<br>
		
		<a href="add-expends-category.php"><button type="button" class="btn btn-space btn-primary">Add Category</button></a> &nbsp;
		
		
	</div>
	
</div>	
	

<div class="card-body">
<div class="table-responsive ">
<table class="table" id="dataTables-example">
<thead>
<tr>
<th scope="col">S.No</th>
<th scope="col">Category Name</th>   
<th scope="col">Status</th>  
</tr>
</thead>
<tbody id="dispalynextdoc">
<?php
$selectexpendscategory="SELECT * FROM `expendscategory` ORDER BY id DESC";
$run_expendscategory=mysqli_query($conn,$selectexpendscategory);
$i=1;    
$checkexpendscategorycount=mysqli_num_rows($run_expendscategory);
if($checkexpendscategorycount > 0)    
{

while($row_expendscategory=mysqli_fetch_array($run_expendscategory))
{ 

	
?>    
  
<tr id="deletehide<?php echo $row_expendscategory['id']; ?>">
<th scope="row"><?php echo $i; ?></th>
<td><?php echo $row_expendscategory['categoryname']; ?></td>
<td><div class="btn-group">    
	<a  href="<?php echo $baseurl; ?>expends/update-expends-category.php?expendsupid=<?php echo $row_expendscategory['id']; ?>"><button class="btn btn-sm btn-outline-light"><i class="fas fa-pencil-alt"></i></button></a> &nbsp; &nbsp;
	
  <button class="btn btn-sm btn-outline-light clickexpendsxategory" removeid="<?php echo $row_expendscategory['id']; ?>">
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
<div id="deleteexpendscategoryid"></div>
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