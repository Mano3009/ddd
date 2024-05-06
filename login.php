<html>
<head>
<title>Login</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
<link rel="stylesheet" href="assets/libs/css/style.css">
<link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
<link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
<link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
<link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
<link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
<link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">    
<?php 
include("conn.php");    
if(isset($_SESSION['loginid']))
{
 echo "<script>window.location.href='index.php';</script>";   
}  
else
{
?>
     
  <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
      .loginview{
          display: none;
      }
    </style>  
</head>
<body>

    
    
    
   
    
<div class="splash-container">

<div class="loginview animate__animated animate__fadeInUp">   
<p id="displaylogin"></p>    
</div>   
<div class="card" style="margin-bottom:0px;">
<div class="card-header text-center"><h2>Login</h2></div>
<div class="card-body">
     
<form method="post" id="loginform">
<div class="form-group">
<div class="row">
<div class="col-md-12 text-center">
<?php
  $selectaccount="SELECT * FROM `account` WHERE id='1'";
  $run_account=mysqli_query($conn,$selectaccount);
  $row_account=mysqli_fetch_array($run_account);   
?>    
<img src="assets/images/logo/<?php echo $row_account['logo']; ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl" width="100" height="100">    
</div>    
</div>    
</div>    
<div class="form-group">
<input class="form-control form-control-lg" id="username" type="text" placeholder="Username">
<p id="displayusername" class="errormessage"></p>    
</div>
<div class="form-group">
<input class="form-control form-control-lg" id="password" type="password" placeholder="Password">
<p id="displaypassword" class="errormessage"></p>    
</div>

<button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
<div class="form-group">
<div id="displaylogin"></div>    
</div>    
</form>
</div>
   
</div>
</div>

<?php

include("script.php");    
    
    ?>
	
	
       
<?php    
}
?>
</body>
</html>