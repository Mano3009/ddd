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
<h2 class="pageheader-title">View Service Type</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">View Service Type</li>
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
	
		<h5 class="card-header text-left">View Service Type</h5>
		
	</div>
	
	<div class="col-md-6 text-right">
	
		<br>
		
		<a href="add-servicetype.php"><button type="button" class="btn btn-space btn-primary">Add Service Type</button></a> &nbsp;
		
		
	</div>
	
</div>	
	

<div class="card-body">
<div class="table-responsive ">
<table class="table" id="dataTables-example">
<thead>
<tr>
<th scope="col">S.No</th>
<th scope="col">Service Type Name</th>   
<th scope="col">Status</th>  
</tr>
</thead>
<tbody id="dispalynextdoc">
<?php
$selectservicetype="SELECT * FROM `servicetype` ORDER BY id DESC";
$run_servicetype=mysqli_query($conn,$selectservicetype);
$i=1;    
$checkservicetypecount=mysqli_num_rows($run_servicetype);
if($checkservicetypecount > 0)    
{

while($row_servicetype=mysqli_fetch_array($run_servicetype))
{ 

	
?>    
  
<tr id="deletehide<?php echo $row_servicetype['id']; ?>">
<th scope="row"><?php echo $i; ?></th>
<td><?php echo $row_servicetype['servicetype']; ?></td>
<td><div class="btn-group">    
	<a  href="<?php echo $baseurl; ?>jobcard/update-servicetype.php?servicetypeupid=<?php echo $row_servicetype['id']; ?>"><button class="btn btn-sm btn-outline-light"><i class="fas fa-pencil-alt"></i></button></a> &nbsp; &nbsp;
	
  <button class="btn btn-sm btn-outline-light clickservicetype" removeid="<?php echo $row_servicetype['id']; ?>">
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
<div id="deleteservicetypeid"></div>
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