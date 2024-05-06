<html>
<head>
<title>Account View</title>
<?php
  include("link.php");     
?>    
    
</head>
<body>

<div class="dashboard-main-wrapper">
<?php
include("nav.php");    
?> 
 
<div class="dashboard-wrapper">
<div class="dashboard-ecommerce">
    
<div class="influence-profile">
<div class="container-fluid dashboard-content ">

<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="page-header">
<h3 class="mb-2">Account View</h3>

<div class="page-breadcrumb">
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
<li class="breadcrumb-item active" aria-current="page">Account View</li>
</ol>
</nav>
</div>
</div>
</div>
</div>

<div class="row">
    
<div class="col-xl-3 col-lg-3 col-md-5 col-sm-12 col-12">

<?php
  $accid=$_GET["accid"];
      
  $selectaccount="SELECT * FROM `login` WHERE id='$accid'";
  $run_account=mysqli_query($conn,$selectaccount);
  $row_account=mysqli_fetch_array($run_account);
    
  $ciphering = "AES-128-CTR"; 
  $iv_length = openssl_cipher_iv_length($ciphering); 
  $options = 0; 
  $decryption_iv = '1234567891011121'; 
  $decryption_key = "qwertyuiopasdfghjklzxcvbnm";   
?>  

<div class="card">
<div class="card-body">
<div class="user-avatar text-center d-block">
<img src="assets/images/logo/<?php echo $row_account['logo']; ?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
    <br>
</div>
<div class="text-center">
<h2 class="font-24 mb-0"><?php 
$username=$row_account['username'];   
echo $decryption=openssl_decrypt($username, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h2>   
</div>
</div>
<div class="card-body border-top">

<div class="">
<ul class="list-unstyled mb-0">
    
<li class="mb-2">
<i class="fas fa-fw fa-envelope mr-2"></i><a class="__cf_email__"><?php 
$email_id=$row_account['email_id']; 
echo $decryption=openssl_decrypt($email_id, $ciphering,$decryption_key, $options, $decryption_iv);   ?></a>
</li>
    
<li class="mb-0">
<i class="fas fa-fw fa-phone mr-2"></i><?php 
$Phone=$row_account['Phone']; 
echo $decryption=openssl_decrypt($Phone, $ciphering,$decryption_key, $options, $decryption_iv);   ?>
</li>
    
<li class="mb-0 etidcus"><a href="view-account.php"><i class="fas fa-pencil-alt"></i> Edit</a>
    
</li> 
    
</ul>
</div>
</div>
</div>
    
</div>

<div class="col-xl-9 col-lg-9 col-md-7 col-sm-12 col-12">
<div class="influence-profile-content pills-regular">
<ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
<li class="nav-item">
<a class="nav-link active show" id="pills-campaign-tab" data-toggle="pill" href="#pills-campaign" role="tab" aria-controls="pills-campaign" aria-selected="true">Details</a>
</li>
<li class="nav-item">
<a class="nav-link" id="pills-packages-tab" data-toggle="pill" href="#pills-packages" role="tab" aria-controls="pills-packages" aria-selected="false">Address</a>
</li>
<li class="nav-item">
<a class="nav-link" id="pills-msg-tab" data-toggle="pill" href="#pills-msg" role="tab" aria-controls="pills-msg" aria-selected="false">Bank Details</a>
</li>
</ul>
<div class="tab-content" id="pills-tabContent">
    
<div class="tab-pane fade active show" id="pills-campaign" role="tabpanel" aria-labelledby="pills-campaign-tab">
<div class="section-block">
</div>
<div class="card">
<div class="card-body">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="media influencer-profile-data d-flex align-items-center p-2">
<div class="media-body ">
<div class="influencer-profile-data">
<h3 class="m-b-10 text-center">Details</h3>
</div>
</div>
</div>
</div>
 </div>
</div>
    
<div class="border-top card-footer p-0">
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$username=$row_account['username']; 
echo $decryption=openssl_decrypt($username, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>User Name</p>
</div>
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$password=$row_account['password']; 
echo $decryption=openssl_decrypt($password, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>Password</p>
</div>
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$name=$row_account['Name']; 
echo $decryption=openssl_decrypt($name, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>Name</p>
</div>
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$com_name=$row_account['com_name']; 
echo $decryption=openssl_decrypt($com_name, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>Company Name</p>
</div>
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$Phone=$row_account['Phone']; 
echo $decryption=openssl_decrypt($Phone, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>Phone</p>
</div>
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$email_id=$row_account['email_id']; 
echo $decryption=openssl_decrypt($email_id, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>Email Id </p>
</div>
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$gst_num=$row_account['gst_num']; 
echo $decryption=openssl_decrypt($gst_num, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>Gst Number</p>
</div> 
    
</div>
    
</div>
</div>
    
<div class="tab-pane fade" id="pills-packages" role="tabpanel" aria-labelledby="pills-packages-tab">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="section-block">
</div>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

<div class="card">
<div class="card-body">
<div class="row">
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
<div class="media influencer-profile-data d-flex align-items-center p-2">
<div class="media-body ">
<div class="influencer-profile-data">
<h3 class="m-b-10 text-center">Address</h3>
</div>
</div>
</div>
</div>
 </div>
</div>
<div class="border-top card-footer p-0">
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$street=$row_account['street']; 
echo $decryption=openssl_decrypt($street, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>Street</p>
</div>
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$v_name=$row_account['v_name']; 
echo $decryption=openssl_decrypt($v_name, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>Village Name</p>
</div>
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$d_name=$row_account['d_name']; 
echo $decryption=openssl_decrypt($d_name, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>District Name</p>
</div>
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$state=$row_account['state']; 
echo $decryption=openssl_decrypt($state, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>State </p>
</div>
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$pin_code=$row_account['pin_code']; 
echo $decryption=openssl_decrypt($pin_code, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>Pin Code </p>
</div>  
    
</div>
</div>    
    
</div>
</div>
</div>
    

    
<div class="tab-pane fade" id="pills-msg" role="tabpanel" aria-labelledby="pills-msg-tab">
<div class="card">
<h5 class="card-header text-center">Bank Details</h5>
<div class="card-body">

<div class="border-top card-footer p-0">
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$bank_name=$row_account['bank_name']; 
echo $decryption=openssl_decrypt($bank_name, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>Bank Name</p>
</div>
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$a_c_no=$row_account['a_c_no']; 
echo $decryption=openssl_decrypt($a_c_no, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>A/c No</p>
</div>
    
<div class="campaign-metrics d-xl-inline-block">
<h4 class="mb-0"><?php 
$ifc_code=$row_account['ifc_code']; 
echo $decryption=openssl_decrypt($ifc_code, $ciphering,$decryption_key, $options, $decryption_iv);   ?></h4>
<p>IFC Code</p>
</div>

 
    
</div>    
    
</div>
</div>
</div>
    
</div>
</div>



</div>

</div>
    
</div>
</div>   
    
</div>
</div>    
    
    
    
<?php
include("script.php");  
     
?>    
</div>    
    
</body>
</html>