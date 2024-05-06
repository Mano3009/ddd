<?php session_start(); ?>
<?php
include("../conn.php"); 

if(isset($_POST['invoicecustomercode']))
{
    $invoicecustomercode=$_POST['invoicecustomercode'];
	
    $selectgoo="SELECT * FROM `customer` WHERE code='$invoicecustomercode'";
    $run_goo=mysqli_query($conn,$selectgoo);
    $row_goo=mysqli_fetch_array($run_goo);
	
    $disname=$row_goo['name'];
	
    echo "<script>$('#invoicecustomername').val('$disname');</script>";
}

if(isset($_POST['invoicetotalrowid'])) 
{
  $invoicetotalrowid = $_POST['invoicetotalrowid'];
  $invoice_price = $_POST['invoice_price'];
  $invoice_gst = $_POST['invoice_gst'];
  $invoice_qty = $_POST['invoice_qty'];
	
	
	 $item = array(
			'rowid' => $invoicetotalrowid,
			'price' => $invoice_price,
			'gst' => $invoice_gst,
			'qty' => $invoice_qty
	);


 $_SESSION["invoicetotal"][$invoicetotalrowid] = $item;

	echo '<script>loadinvoicetotal();</script>';

}


if(isset($_POST['loadinvoicetotal']))
{

  if (!empty($_SESSION["invoicetotal"]))
  {
    $no = 0;
    $grttotal = 0;
    $subtotal = 0;
    $gstamount = 0;
			

    foreach ($_SESSION["invoicetotal"] as $keys => $values)
    {
      $invid = $values["rowid"];
      $quantity = $values["qty"];
      $price = $values["price"];
      $tax = $values["gst"];

      $num2 = $tax * $price;
      $total2 = $num2 / 100;
      $distotal = $price + $total2;
      $totalprice = $quantity * $distotal;

      $qtyprice = $quantity * $price;
      $num3 = $tax * $qtyprice;
      $total3 = $num3 / 100;
					
					
					 $totalprice = number_format($totalprice, 2);
      $totalprice = str_replace(",", "", $totalprice);
					
					 echo "<script>$('#totalinvoice$invid').val('$totalprice');</script>";

      $subtotal1 = $quantity * $price;
      $subtotal = $subtotal1 + $subtotal;
      $gstamount = $gstamount + $total3;
      $grttotal = $grttotal + $totalprice;
    }

    $subtotal1 = number_format($subtotal, 2);
    $subtotaldis = str_replace(",", "", $subtotal1);

    $gstamount1 = number_format($gstamount, 2);
    $gstamountdis = str_replace(",", "", $gstamount1);
        

    $grttotal1 = number_format($grttotal, 2);
    $grttotaldis = str_replace(",", "", $grttotal1);

    echo '<script>$("#invoice_sub_total").val("' . $subtotaldis . '");</script>';
    echo '<script>$("#invoice_gst_amount").val("' . $gstamountdis . '");</script>';
    echo '<script>$("#invoice_grand_total").val("' . $grttotaldis . '");</script>';
  }
  else
  {
  
    echo '<script>$("#invoice_sub_total").val("0");</script>';
    echo '<script>$("#invoice_gst_amount").val("0");</script>';
    echo '<script>$("#invoice_grand_total").val("0");</script>';  
  
  }
    
    
}



if (isset($_POST['invoice_invoice_no']))
{
  $invoice_invoice_no = $_POST['invoice_invoice_no'];
  $invoicecustomercode = $_POST['invoicecustomercode'];
  $invoicedate = $_POST['invoicedate'];
  $invoice_grand_total = $_POST['invoice_grand_total'];
	 $invoicetypename = $_POST['invoicetypename'];

  $checkinsert = 1;
  $firststore = 1;
  $date = date("Y-m-d");
  $amt_status='';    

	 $product_code=$_POST['product_name'];

  $productcount = count($product_code);
  $productcountall = $productcount - 1;

	 $checkinsert=1;
	
	 	
	
  for($i = 0; $i < $productcount; $i++) 
  {
			
			 if ($_POST['product_name'][$i] == '')
				{
        echo "<script>alert('Please Enter Product Description');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['product_price'][$i] == '')
				{
        echo "<script>alert('Please Enter Price');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['product_gst'][$i] == '')
				{
        echo "<script>alert('Please Enter GST');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['product_Qty'][$i] == '')
				{
        echo "<script>alert('Please Enter QTY');</script>";
        $checkinsert = 0;
        exit();
    }
			

			
		}

	
	
	 $displayname='';
	 $displayprice='';
	 $displaygst='';
	 $displayhsn='';
	 $displayqty='';
	 $displaytotal='';

	
  if($checkinsert == '1') 
  {

    for ($i = 0; $i < $productcount; $i++) 
				{
					
					  if($i == 0)
							{
								 
									$displayname .=$_POST['product_name'][$i];
									$displayprice .=$_POST['product_price'][$i];
									$displaygst .=$_POST['product_gst'][$i];
									$displayhsn .=$_POST['product_hsn'][$i];
									$displayqty .=$_POST['product_Qty'][$i];
									$displaytotal .=$_POST['inven_total'][$i];
							}
				   else
							{
						
								 $displayname .='@@@@'.$_POST['product_name'][$i];
									$displayprice .='@@@@'.$_POST['product_price'][$i];
									$displaygst .='@@@@'.$_POST['product_gst'][$i];
									$displayhsn .='@@@@'.$_POST['product_hsn'][$i];
									$displayqty .='@@@@'.$_POST['product_Qty'][$i];
									$displaytotal .='@@@@'.$_POST['inven_total'][$i];
								
							}
					  
					
				}
	
			
			  $insert="INSERT INTO `perfoma-invoice`(`invoicenum`, `invoicedate`, `customer`, `name`, `price`, `gst`, `qty`, `hsn`, `total`, `granttotal`) VALUES ('$invoice_invoice_no','$invoicedate','$invoicecustomercode','$displayname','$displayprice','$displaygst','$displayqty','$displayhsn','$displaytotal','$invoice_grand_total')";

				$runinsert=mysqli_query($conn,$insert);
			
			 if($runinsert)
				{
				
				$selectsalno = "SELECT * FROM `count` WHERE name='perfoma-invoice'";
    $run_sal = mysqli_query($conn, $selectsalno);
    $rowsalnonew = mysqli_fetch_array($run_sal);
    $countnew = $rowsalnonew['count'];
    $newcount = $countnew + 1;
    $updateno = "UPDATE `count` SET `count` = '$newcount' WHERE name='perfoma-invoice'";
    $run_upcus = mysqli_query($conn, $updateno);
			
			
				echo "<script>alert('Perfoma Invoice Added successfully'); window.location.href='view-invoice.php';</script>";
					
				}
    
}
	
	 
	
}
	

if(isset($_POST['deleteperfomainvoicegetid']))
{

  $deleteperfomainvoicegetid=$_POST['deleteperfomainvoicegetid'];
	
	 $delete="DELETE FROM `perfoma-invoice` WHERE id='$deleteperfomainvoicegetid'";
		$run=mysqli_query($conn,$delete);
		if($run)
		{
						echo "<script>alert('Perfoma Invoice deleted successfully'); window.location.href='view-invoice.php';</script>";
		}

}



if(isset($_POST['removeinvoicerowvalid']))
{
	
	 $removeinvoicerowvalid=$_POST['removeinvoicerowvalid'];
	
	 if (!empty($_SESSION["invoicetotal"]))
		{
			
			 unset($_SESSION["invoicetotal"][$removeinvoicerowvalid]);
			 echo '<script>loadinvoicetotal();</script>';
		}
	
}



if (isset($_POST['uinvoice_invoice_no']))
{
  $invoice_invoice_no = $_POST['uinvoice_invoice_no'];
  $invoicecustomercode = $_POST['uinvoicecustomercode'];
  $invoicedate = $_POST['uinvoicedate'];
  $invoice_grand_total = $_POST['uinvoice_grand_total'];
	 $uinvoice_update_id=$_POST['uinvoice_update_id'];
	 $updateinvoicetypename=$_POST['updateinvoicetypename'];

  $checkinsert = 1;
  $firststore = 1;
  $date = date("Y-m-d");
  $amt_status='';    

	 $product_code=$_POST['product_name'];

  $productcount = count($product_code);
  $productcountall = $productcount - 1;

	 $checkinsert=1;
	
	 	
	
  for($i = 0; $i < $productcount; $i++) 
  {
			
			 if ($_POST['product_name'][$i] == '')
				{
        echo "<script>alert('Please Part Description');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['product_price'][$i] == '')
				{
        echo "<script>alert('Please Enter Price');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['product_gst'][$i] == '')
				{
        echo "<script>alert('Please Enter GST');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['product_Qty'][$i] == '')
				{
        echo "<script>alert('Please Enter QTY');</script>";
        $checkinsert = 0;
        exit();
    }
			

			
		}

	
	 $displayname='';
	 $displayprice='';
	 $displaygst='';
	 $displayhsn='';
	 $displayqty='';
	 $displaytotal='';

	
  if($checkinsert == '1') 
  {

    for ($i = 0; $i < $productcount; $i++) 
				{
					
					  if($i == 0)
							{
									$displayname .=$_POST['product_name'][$i];
									$displayprice .=$_POST['product_price'][$i];
									$displaygst .=$_POST['product_gst'][$i];
									$displayhsn .=$_POST['inven_hsn'][$i];
									$displayqty .=$_POST['product_Qty'][$i];
									$displaytotal .=$_POST['inven_total'][$i];
							}
				   else
							{
							
								 $displayname .='@@@@'.$_POST['product_name'][$i];
									$displayprice .='@@@@'.$_POST['product_price'][$i];
									$displaygst .='@@@@'.$_POST['product_gst'][$i];
									$displayhsn .='@@@@'.$_POST['inven_hsn'][$i];
									$displayqty .='@@@@'.$_POST['product_Qty'][$i];
									$displaytotal .='@@@@'.$_POST['inven_total'][$i];
								
								 
							}
					  
					
				}
	
			
			 $update="UPDATE `perfoma-invoice` SET `invoicenum`='$invoice_invoice_no',`invoicedate`='$invoicedate',`customer`='$invoicecustomercode',`name`='$displayname',`price`='$displayprice',`gst`='$displaygst',`qty`='$displayqty',`hsn`='$displayhsn',`total`='$displaytotal',`granttotal`='$invoice_grand_total',`type`='$updateinvoicetypename' WHERE  id='$uinvoice_update_id'";

				$runupdate=mysqli_query($conn,$update);
			
			 if($runupdate)
				{
				echo "<script>alert('Invoice Updated successfully'); window.location.href1='view-invoice.php';</script>";
					
				}
    
}
	
	 
	
}
	


?>
