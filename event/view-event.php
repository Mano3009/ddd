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
<h2 class="pageheader-title">View Event</h2>
<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">View Event</li>
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
<h5 class="card-header text-center">View Event</h5>
<div class="card-body">
<div class="table-responsive ">
<table class="table" id="dataTables-example">
<thead>
<tr>
<th scope="col">S.No</th>
<th scope="col">Event Name</th>    
<th scope="col">Date</th>
<th scope="col">Message</th> 
<th scope="col">Status</th>  
</tr>
</thead>
<tbody id="dispalynextdoc">
<?php
$selectevents="SELECT * FROM `events` ORDER BY id DESC";
$run_events=mysqli_query($conn,$selectevents);
$i=1;    
$checkeventscount=mysqli_num_rows($run_events);
if($checkeventscount > 0)    
{

while($row_events=mysqli_fetch_array($run_events))
{ 

	
?>    
  
<tr id="deletehide<?php echo $row_events['id']; ?>">
<th scope="row"><?php echo $i; ?></th>
<td><?php echo $row_events['event_name']; ?></td>
<td><?php echo $row_events['notificationdate']; ?></td>
<td><?php echo $row_events['message']; ?></td>
<td><div class="btn-group">    
	<a  href="<?php echo $baseurl; ?>event/update-event.php?eventupid=<?php echo $row_events['id']; ?>"><button class="btn btn-sm btn-outline-light"><i class="fas fa-pencil-alt"></i></button></a>
    &nbsp;
    <button class="btn btn-sm btn-outline-light clickdeleteevent" 
removecusid="<?php echo $row_events['id']; ?>">
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