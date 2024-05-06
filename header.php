<!-- navbar -->
<!-- ============================================================== -->


<?php

$select="SELECT * FROM `account` where id='1'";
$run=mysqli_query($conn,$select);
$rowdata=mysqli_fetch_array($run);

?>

<div class="dashboard-header">
<nav class="navbar navbar-expand-lg bg-white fixed-top">
<a class="navbar-brand" href="<?php echo $baseurl; ?>index.php"><?php echo $rowdata['companyname']; ?></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse " id="navbarSupportedContent">
<ul class="navbar-nav ml-auto navbar-right-top">

<li class="nav-item dropdown nav-user">
<a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="m-r-10 mdi mdi-account navpersonimg"></i></a>
<div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
<div class="nav-user-info">

<?php

$displayname='';

if(isset($_SESSION['loginid'])) 
{
$loginid=$_SESSION['loginid'];

$selectuser="SELECT * FROM `login` WHERE id='$loginid'";
$run_user=mysqli_query($conn,$selectuser);
$row_user=mysqli_fetch_array($run_user);

$displayname=$row_user['username'];	

}

?>

<h5 class="mb-0 text-white nav-user-name text-center"><?php echo $displayname; ?></h5>
</div>
<a class="dropdown-item" href="<?php echo $baseurl; ?>update-profile.php"><i class="fas fa-user mr-2"></i>Account</a>
<a class="dropdown-item" href="<?php echo $baseurl; ?>logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
</div>
</li>

</ul>
</div>
</nav>
</div>
<!-- ============================================================== -->
<!-- end navbar -->