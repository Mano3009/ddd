<?php
session_start();
  include("link.php");  

  
  if(isset($_SESSION['loginid']))
    {
        
    }  
    else
    {
        echo "<script>alert('Please Login');window.location.href='login.php';</script>";
    }
  
?>

<!doctype html>
<html lang="en">

 

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
  
    
    
</head>

<body>
    
    <div class="dashboard-main-wrapper">
        
     
        <?php
        
        include("header.php");
        
        ?>
    
        <?php
        
        include("nav.php");
        
        ?>
					
					
					
					     <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    
                    <div class="row">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
								<div class="page-header">
																									<h2 class="pageheader-title">Dashboard </h2>
																									<div class="page-breadcrumb">
																											<nav aria-label="breadcrumb">
																													<ol class="breadcrumb">
																															<li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
																															<li class="breadcrumb-item active" aria-current="page">Index</li>
																													</ol>
																											</nav>
																									</div>
																							</div>
																					</div>
																			</div>

                    
                    <div class="ecommerce-widget">

						<div class="row">

														
														<?php
																			
													$grat_tot1=0;

													$selecttt = "SELECT * FROM `invoice`";
													$run_tt = mysqli_query($conn, $selecttt);
													while($row_tt = mysqli_fetch_array($run_tt))
													{

															$temp_grat_tot=$row_tt['granttotal'];

															$grat_tot1=$grat_tot1+$temp_grat_tot;

													}								
																						
																
													$grat_tot1 = number_format($grat_tot1);
								
																						
														?>								
																						
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"><div class="card bg-secondary dashtitle">
                  <div class="card-header networth bg-secondary">
                    <h1 class="mb-1 text-center">₹ <?php echo $grat_tot1; ?></h1>
                  </div>
                  <div class="card-body">
                    <h3 class="mb-1 text-center headpaid">Overall Amount</h3>
                  </div>
                </div>
              </div>

												<?php
																	
													 $todaydate = date("Y-m-d");									
																						
													$todaygrattot=0;

													$selecttt = "SELECT * FROM `invoice` WHERE invoicedate='$todaydate'";
													$run_tt = mysqli_query($conn, $selecttt);
													while($row_tt = mysqli_fetch_array($run_tt))
													{

															$temp_grat_tot=$row_tt['granttotal'];

															$todaygrattot=$todaygrattot+$temp_grat_tot;

													}								
																						
																
													$todaygrattot = number_format($todaygrattot);
								
																						
														?>										
																						
																						
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"><div class="card bg-info dashtitle">
                  <div class="card-header networth bg-info">
                    <h1 class="mb-1 text-center">₹ <?php echo $todaygrattot; ?></h1>
                  </div>
                  <div class="card-body">
                    <h3 class="mb-1 text-center headpaid">Today Amount</h3>
                  </div>
                </div>
              </div>
								
																						
																		<?php
																	
													 $todaydate = date("Y/m/d");									
																						
													$monthgrattot=0;

													$selecttt = "SELECT * FROM `invoice` WHERE MONTH(invoicedate)=MONTH(curdate())";
													$run_tt = mysqli_query($conn, $selecttt);
													while($row_tt = mysqli_fetch_array($run_tt))
													{

															$temp_grat_tot=$row_tt['granttotal'];

															$monthgrattot=$monthgrattot+$temp_grat_tot;

													}								
																						
																
													$monthgrattot = number_format($monthgrattot);
								
																						
														?>										
																						
																						
													<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"><div class="card bg-primary dashtitle">
                  <div class="card-header networth1">
                    <h1 class="mb-1 text-center">₹ <?php echo $monthgrattot; ?></h1>
                  </div>
                  <div class="card-body">
                    <h3 class="mb-1 text-center headpaid">Month Amount</h3>
                  </div>
                </div>
              </div>
																
             
            </div>
																					
						<div class="row">

              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card bg-brand dashtitle">
                  <div class="card-header networth bg-brand">
                    <?php
                    $seleccus = "SELECT * FROM `invoice`";
                    $run_cus = mysqli_query($conn, $seleccus);
                    $count_cus = mysqli_num_rows($run_cus);
                    ?>
                    <h1 class="text-center"><i class="fa fa-fw fa-user-circle"></i> <?php echo $count_cus; ?></h1>
                  </div>
                  <div class="card-body">
                    <h3 class="mb-1 text-center headpaid">Number of Sales</h3>
                  </div>
                </div>
              </div>

              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card btn-danger dashtitle">
                  <div class="card-header	btn-danger">
                     <?php
                    $seleccus = "SELECT * FROM `invoice` WHERE granttotal=paidamount";
                    $run_cus = mysqli_query($conn, $seleccus);
                    $count_cus = mysqli_num_rows($run_cus);
                    ?>

                    <h1 class="mb-1 text-center text-white"><i class="fa fa-fw fa-user-circle"></i> <?php echo $count_cus; ?></h1>
                  </div>
                  <div class="card-body">
                    <h3 class="mb-1 text-center headpaid">Full Paid Sales</h3>
                  </div>
                </div>
              </div>

													 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card btn-success dashtitle">
                  <div class="card-header	btn-success">
                     <?php
                    $seleccus = "SELECT * FROM `invoice` WHERE granttotal!=paidamount";
                    $run_cus = mysqli_query($conn, $seleccus);
                    $count_cus = mysqli_num_rows($run_cus);
                    ?>

                    <h1 class="mb-1 text-center text-white"><i class="fa fa-fw fa-user-circle"></i> <?php echo $count_cus; ?></h1>
                  </div>
                  <div class="card-body">
                    <h3 class="mb-1 text-center headpaid">Partial Paid Sales</h3>
                  </div>
                </div>
              </div>
										
           
          

            </div>
                        
                        <div class="card">
                        <div class="row m-3">
<div class="table-responsive">
<table  class="table table-striped table-bordered">
<thead>
<tr>
<th>S.No</th>
<th>Event Name</th>	
<th>Start Date</th>
<th>End Date</th>
<th>Message </th>	
</tr>
</thead>
    
<tbody id="dynamic_field">	
	     
	
<?php
	
$start_date=date('Y-m-d');    

$date = strtotime($start_date);
$date = strtotime("+2 day", $date);
$enddate=date('Y-m-d', $date);
    
$selectevents="SELECT * FROM `events` where notificationdate between '$start_date' and '$enddate' ORDER BY id DESC";
$runevents=mysqli_query($conn,$selectevents);
$i=1;    
$checkeventscount=mysqli_num_rows($runevents);
while($rowevents=mysqli_fetch_array($runevents))
{
	
	 ?>
	
	  <tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $rowevents['event_name']; ?></td>	
			<td><?php echo $rowevents['startdate']; ?></td>
			<td><?php echo $rowevents['enddate']; ?></td>
			<td><?php echo $rowevents['message']; ?></td>
			</tr>
	
	 <?php
	
	 $i=$i+1;
	
}	
	
?>	
	
	
</tbody>
    
</table>
</div>  
</div>    
                        </div>

																					
																					
                    </div>
																	
																	
                </div>
            </div>
            
        </div>
       
					
					
					</div>
					
					
	
	<style>
	
		.bg-primary {
    background-color: #5969ff !important;
    color: #fff !important;
   }
		
		.networth1 {
    background-color: #5969ff !important;
			 border: 0px;
   }	
		.networth h1 {
    color: #fff !important;
   }	
  	.networth1 h1 {
    color: #fff !important;
   }		
   .headpaid {
    color: #f7f7f7;
   }
		
		 .networthtable tr td {
    padding: 10px 0px 10px 10px;
    border: 0px;
   }
		
		 .incomein {
    padding: 0px;
    background: none;
				color: white;
				border: 0px;
   }
		
		 .btn-danger
		{
			
			background-color: #ef172c;
			
		}
		
		.btn-success
		{
			
			background-color: #2ec551;
			
		}
		
	</style>
	

    

    
    <?php
    
    include("script.php");
    
    ?>
    
    
</body>
 

</html>