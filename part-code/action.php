<?php
session_start();
include("../conn.php"); 
include("../baseurl.php");



if (isset($_POST['addpartcode']))
{
  $part_code = $_POST['part_code'];
  $checkno = 1;


  $itemcount = count($part_code);

  for ($i = 0; $i < $itemcount; $i++) 
		{

    $spart_code = $_POST['part_code'][$i];
    $spart_name = $_POST['part_name'][$i];
			 $spart_date = $_POST['part_date'][$i];

    if ($spart_code == '') {
      $checkno = 0;
      echo "<script>alert('Please Check Part Code');</script>";
      break;
    }

    if ($spart_name == '') {
      echo "<script>alert('Please Check Part Name');</script>";
      $checkno = 0;
      break;
    }
			if ($spart_date == '') {
      echo "<script>alert('Please Check Date');</script>";
      $checkno = 0;
      break;
    }
  }

  if ($checkno == 1) 
		{
    for ($i = 0; $i < $itemcount; $i++) 
				{

      $spart_code = $_POST['part_code'][$i];
      $spart_name = $_POST['part_name'][$i];
      $spart_unit = $_POST['part_unit'][$i];
      $spart_unittype = $_POST['part_unittype'][$i];
      $spart_category = $_POST['part_category'][$i];
      $spart_price = $_POST['part_price'][$i];
					 $spart_selling_price = $_POST['part_selling_price'][$i];
      $spart_gst = $_POST['part_gst'][$i];
      $spart_hsn = $_POST['part_hsn'][$i];
      $spart_date = $_POST['part_date'][$i];

      $insert = "INSERT INTO `productdetails`(`code`, `name`, `unit`, `unittype`, `category`, `price`, `sellingprice`, `gst`, `hsn`, `date`) VALUES ('$spart_code','$spart_name','$spart_unit','$spart_unittype','$spart_category','$spart_price','$spart_selling_price','$spart_gst','$spart_hsn','$spart_date')";
      $run = mysqli_query($conn, $insert);
    }
			
    echo "<script>alert('Product Details Added Successfully');window.location.href='view-product.php';</script>";
			
  }
}


if(isset($_POST['clickdeleteproductdetailsremoveid']))
{
$clickdeleteproductdetailsremoveid=$_POST['clickdeleteproductdetailsremoveid']; 
    
$deleteproductdetailid="DELETE FROM `productdetails` WHERE id='$clickdeleteproductdetailsremoveid'";    
$run_product_id=mysqli_query($conn,$deleteproductdetailid);
if($run_product_id)
{
echo"<script>alert('Product Details Deleted successfully');$('#deletehide$clickdeleteproductdetailsremoveid').hide();</script>";
}
}


if(isset($_POST['uproductdetailscode']))
{
   
    $uproductdetailscode=$_POST['uproductdetailscode'];
    $uproductdetailsname=$_POST['uproductdetailsname'];
    $uproductdetailsunit=$_POST['uproductdetailsunit'];
    $uproductdetailunittype=$_POST['uproductdetailunittype'];
    $uproductdetailscategory=$_POST['uproductdetailscategory'];
    $uproductdetailsprice=$_POST['uproductdetailsprice'];
    $uproductdetailssellingprice=$_POST['uproductdetailssellingprice'];
    $uproductdetailsgst=$_POST['uproductdetailsgst'];
    $uproductdetailshsn=$_POST['uproductdetailshsn'];
    $uproductdetailsdate=$_POST['uproductdetailsdate'];
	   $uproductdetailsuid=$_POST['uproductdetailsuid'];
    
    
    
  $insert="UPDATE `productdetails` SET `code`='$uproductdetailscode',`name`='$uproductdetailsname',`unit`='$uproductdetailsunit',`unittype`='$uproductdetailunittype',`category`='$uproductdetailscategory',`price`='$uproductdetailsprice',`sellingprice`='$uproductdetailssellingprice',`gst`='$uproductdetailsgst',`hsn`='$uproductdetailshsn',`date`='$uproductdetailsdate' WHERE  id='$uproductdetailsuid'";
  $run=mysqli_query($conn,$insert);
    
     if($run)
     {
            
          
         $sendurl=$baseurl.'part-code/update-product.php?cusupid='.$uproductdetailsuid;
         
         echo "<script>alert('Product details Updated Successfully');window.location.href='$sendurl';</script>";
     }
    
    
    
    
}



?>
