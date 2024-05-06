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


if(isset($_POST['getinvoice_no']))
{
	
	 $getinvoice_no=$_POST['getinvoice_no'];
	 $invoiceproductchangecoderowid=$_POST['invoicerowid'];
	 $invoicepartcode=$_POST['invoicepartcode'];
	 $invoiceinvid=$_POST['invoiceinvid'];
	
	 $selectinven="SELECT * FROM `inventory` WHERE id='$invoiceinvid'";
  $run_query=mysqli_query($conn,$selectinven);
  $row_inventory=mysqli_fetch_array($run_query);

	
	
	 ?>
	
<td>
<input type="text" placeholder="Part No" class="form-control1"  name="product_code[]" value="<?php echo $row_inventory['code']; ?>" readonly>   
</td>
<td>
<input type="text" placeholder="Part No" class="form-control1"  name="product_invoicenumber[]" value="<?php echo $row_inventory['inventoryinvoiceno']; ?>" readonly>   
</td>
<td>
<input  type="text" placeholder="Part Description" class="form-control1" id="product_name" name="product_name[]" value="<?php echo $row_inventory['name']; ?>" readonly>   
<input type="hidden" class="form-control2" name="inventory_part_id[]" value="<?php echo $row_inventory['id']; ?>">	
</td>    
<td>
<input type="text" placeholder="Unit" class="form-control1"  name="product_unit[]" value="<?php echo $row_inventory['unit']; ?>" readonly>    
</td>
<td>
<input type="text" placeholder="Unit Type" class="form-control1"  name="product_unittype[]" value="<?php echo $row_inventory['unittype']; ?>" readonly>    
</td>	
<td>
<input type="text" placeholder="Category" class="form-control1"  name="product_category[]" value="<?php echo $row_inventory['category']; ?>" readonly>  
</td>	
<td>
<input type="number" placeholder="Price" class="form-control1"  name="product_price[]"  value="<?php echo $row_inventory['price']; ?>"  readonly>  
</td>   
<td>
<input type="number" placeholder="Selling Price" class="form-control1 changeinvoicecalculation"  name="product_selling_price[]" invoiceid="<?php echo $invoiceproductchangecoderowid; ?>" value="<?php echo $row_inventory['sellingprice']; ?>" id="sellingprice<?php echo $invoiceproductchangecoderowid; ?>">
</td>    
<td>
<input type="number" placeholder="Gst" class="form-control1 changeinvoicecalculation"  name="product_gst[]" invoiceid="<?php echo $invoiceproductchangecoderowid; ?>" value="<?php echo $row_inventory['gst']; ?>" id="gst<?php echo $invoiceproductchangecoderowid; ?>">
</td> 
<td>
<input type="number" placeholder="Inventory Qty" class="form-control1"  id="inventoryqty<?php echo $invoiceproductchangecoderowid; ?>" value="<?php echo $row_inventory['invoice_qty']; ?>" readonly>
</td>
<td>
<input type="number" placeholder="Qty" class="form-control1 changeinvoicecalculation" name="inven_qty[]" invoiceid="<?php echo $invoiceproductchangecoderowid; ?>" id="qty<?php echo $invoiceproductchangecoderowid; ?>" value="1">
</td>
<td>
<input type="text" placeholder="HSN" class="form-control1" name="inven_hsn[]" value="<?php echo $row_inventory['hsn']; ?>" readonly>
</td>
<td>
<input type="number" placeholder="Total" class="form-control1" name="inven_total[]" readonly id="totalinvoice<?php echo $invoiceproductchangecoderowid; ?>">
</td>
<td>
<button type="button" name="remove" id="<?php echo $invoiceproductchangecoderowid; ?>" class="btn btn-danger removeinvoicerowval remove">X</button>
</td>
	
  <?php
	
	echo "<script>$('.changeinvoicecalculation').keyup();</script>";
	
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

  if (!empty($_SESSION["invoicetotal"]) || !empty($_SESSION["labourinvoicetotal"]))
  {
    $no = 0;
    $grttotal = 0;
    $overallinvoicetotal=0;  
    $alllabourinvoicetotal=0;  
    $invoice_overall_discount_amount=$_POST['invoice_overall_discount_amount'];  
      
      
    if($invoice_overall_discount_amount == '')
    {
    
      $invoice_overall_discount_amount=0;  
        
    }
      
      
    if(!empty($_SESSION["invoicetotal"]))
    {
        
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

    
      $overallinvoicetotal = $overallinvoicetotal + $totalprice;
    }
        
    }
      
    if(!empty($_SESSION["labourinvoicetotal"]))  
    {
    
        
        
          foreach ($_SESSION["labourinvoicetotal"] as $keys => $values)
          {
              
      $invid = $values["rowid"];
      $price = $values["price"];
      $tax = $values["gst"];

      $num2 = $tax * $price;
      $total2 = $num2 / 100;
      $distotal = $price + $total2;


      $distotal = number_format($distotal, 2);
      $distotal = str_replace(",", "", $distotal);


      $alllabourinvoicetotal = $alllabourinvoicetotal + $distotal;
        }

        
    }

    $grttotal=$overallinvoicetotal+$alllabourinvoicetotal; 
      
//    echo "<script>alert('$grttotal');</script>";  
      
    $grttotal=$grttotal-$invoice_overall_discount_amount;  
      
    $grttotal1 = number_format($grttotal, 2);
    $grttotaldis = str_replace(",", "", $grttotal1);

      
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
  $invoice_paid_amt = $_POST['invoice_paid_amt'];
  $invoicetypename = $_POST['invoicetypename'];
  $adddiscount_amount = $_POST['addinvoice_overall_discount_amount'];
  $addinvoicecustomervehiclenumber = $_POST['addinvoicecustomervehiclenumber'];

  $checkinsert = 1;
  $firststore = 1;
  $date = date("Y-m-d");
  $amt_status='';    

	 $product_code=$_POST['product_code'];
    
     $labourname=$_POST['labourname'];

    $productcount = count($product_code);
    $productcountall = $productcount - 1;
    
    $labournamecount = count($labourname);
    $labournamecountall = $labournamecount - 1;

	 $checkinsert=1;
	
	 	
	
  for($i = 0; $i < $productcount; $i++) 
  {
			
			 if ($_POST['product_code'][$i] == '')
				{
        echo "<script>alert('Please Enter Code');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['product_selling_price'][$i] == '')
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
			
			 if ($_POST['inven_qty'][$i] == '')
				{
        echo "<script>alert('Please Enter QTY');</script>";
        $checkinsert = 0;
        exit();
    }
			

			
		}

    
  for($i = 0; $i < $labournamecount; $i++) 
  {
			
			 if ($_POST['labourname'][$i] == '')
				{
        echo "<script>alert('Please Enter Labour Name');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['productdescription'][$i] == '')
				{
        echo "<script>alert('Please Enter Description');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['productcost'][$i] == '')
				{
        echo "<script>alert('Please Enter Price');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['productgst'][$i] == '')
				{
        echo "<script>alert('Please Enter Gst');</script>";
        $checkinsert = 0;
        exit();
    }
			

			
		}
    
	
	 $displayinventorypid='';
	 $displaycode='';
	 $displayinvoicenumber='';
	 $displayname='';
	 $displayunit='';
	 $displayunittype='';
	 $displaycategory='';
	 $displayprice='';
	 $displaysallesprice='';
	 $displaygst='';
	 $displayhsn='';
	 $displayqty='';
	 $displaytotal='';

    
     $displaylabourname='';
	 $displaydescription='';
	 $displaycost='';
	 $displaylabourgst='';
    
	
  if($checkinsert == '1') 
  {

    for ($i = 0; $i < $productcount; $i++) 
    {
					
					  if($i == 0)
							{
								 $displayinventorypid .=$_POST['inventory_part_id'][$i];
							  $displaycode .=$_POST['product_code'][$i];
								 $displayinvoicenumber .=$_POST['product_invoicenumber'][$i];
									$displayname .=$_POST['product_name'][$i];
									$displayunit .=$_POST['product_unit'][$i];
									$displayunittype .=$_POST['product_unittype'][$i];
									$displaycategory .=$_POST['product_category'][$i];
									$displayprice .=$_POST['product_price'][$i];
								 $displaysallesprice .=$_POST['product_selling_price'][$i];
									$displaygst .=$_POST['product_gst'][$i];
									$displayhsn .=$_POST['inven_hsn'][$i];
									$displayqty .=$_POST['inven_qty'][$i];
									$displaytotal .=$_POST['inven_total'][$i];
							}
				   else
							{
							
								 $displayinventorypid .='@@@@'.$_POST['inventory_part_id'][$i];
								 $displaycode .='@@@@'.$_POST['product_code'][$i];
								 $displayinvoicenumber .='@@@@'.$_POST['product_invoicenumber'][$i];
									$displayname .='@@@@'.$_POST['product_name'][$i];
									$displayunit .='@@@@'.$_POST['product_unit'][$i];
									$displayunittype .='@@@@'.$_POST['product_unittype'][$i];
									$displaycategory .='@@@@'.$_POST['product_category'][$i];
									$displayprice .='@@@@'.$_POST['product_price'][$i];
								 $displaysallesprice .='@@@@'.$_POST['product_selling_price'][$i];
									$displaygst .='@@@@'.$_POST['product_gst'][$i];
									$displayhsn .='@@@@'.$_POST['inven_hsn'][$i];
									$displayqty .='@@@@'.$_POST['inven_qty'][$i];
									$displaytotal .='@@@@'.$_POST['inven_total'][$i];
								
							}
					  
					
				}
	
      
    for ($i = 0; $i < $labournamecount; $i++) 
    {
        
        if($i == 0)
        {
        
            $displaylabourname .=$_POST['labourname'][$i];
            $displaydescription .=$_POST['productdescription'][$i];
            $displaycost .=$_POST['productcost'][$i];
            $displaylabourgst .=$_POST['productgst'][$i];
            
        }
        else
        {
        
            $displaylabourname .='@@@@'.$_POST['labourname'][$i];
            $displaydescription .='@@@@'.$_POST['productdescription'][$i];
            $displaycost .='@@@@'.$_POST['productcost'][$i];
            $displaylabourgst .='@@@@'.$_POST['productgst'][$i];
            
        }
        
    }  
      
      
$insert="INSERT INTO `invoice`(`invoicenum`, `invoicedate`, `customer`,`vehiclenumber`,`type`,`inventory_pro_id`,`code`, `inventoryinvoicenum`, `name`, `unit`, `unittype`, `category`, `price`, `sellingprice`, `gst`, `qty`, `hsn`, `total`, `labourname`,`description`,`cost`,`labourgst`,`overalldiscount`,`granttotal`,`paidamount`) VALUES ('$invoice_invoice_no','$invoicedate','$invoicecustomercode','$addinvoicecustomervehiclenumber','$invoicetypename','$displayinventorypid','$displaycode','$displayinvoicenumber','$displayname','$displayunit','$displayunittype','$displaycategory','$displayprice','$displaysallesprice','$displaygst','$displayqty','$displayhsn','$displaytotal','$displaylabourname','$displaydescription','$displaycost','$displaygst','$adddiscount_amount','$invoice_grand_total','$invoice_paid_amt')";

$runinsert=mysqli_query($conn,$insert);
			
    if($runinsert)
    {
				
				$selectsalno = "SELECT * FROM `count` WHERE name='invoice'";
    $run_sal = mysqli_query($conn, $selectsalno);
    $rowsalnonew = mysqli_fetch_array($run_sal);
    $countnew = $rowsalnonew['count'];
    $newcount = $countnew + 1;
    $updateno = "UPDATE `count` SET `count` = '$newcount' WHERE name='invoice'";
    $run_upcus = mysqli_query($conn, $updateno);
				
			
   for($i=0;$i<$productcount;$i++)
   {
				
				 $temp_inventory_part_id=$_POST['inventory_part_id'][$i];
				 $temp_invoice_newquan=$_POST['inven_qty'][$i];
				
				 $selectinven="SELECT * FROM `inventory` WHERE id='$temp_inventory_part_id'";
     $run_qq=mysqli_query($conn,$selectinven);    
     $row_qq=mysqli_fetch_array($run_qq);
          
     $invenquantity=$row_qq['invoice_qty'];
          
     $storeqty=$invenquantity-$temp_invoice_newquan;
				
				 if($storeqty < 0)
					{
					
						$storeqty=0;
						
					}
				
				 $updateqq="UPDATE `inventory` SET `invoice_qty`='$storeqty' WHERE id='$temp_inventory_part_id'";
     $run_upqq=mysqli_query($conn,$updateqq);        
				
				
			}
			
			
				echo "<script>alert('Invoice Added successfully'); window.location.href='view-invoice.php';</script>";
					
				}
    
}
	
	 
	
}
	

if(isset($_POST['inventoryremovegetid']))
{

  $inventoryremovegetid=$_POST['inventoryremovegetid'];
	
	 $delete="DELETE FROM `inventory` WHERE invoiceid='$inventoryremovegetid'";
		$run=mysqli_query($conn,$delete);
		if($run)
		{
						echo "<script>alert('Inventory deleted successfully'); window.location.href='view-inventory.php';</script>";
		}

}


if(isset($_POST['invoiceproductcode']))
{

  $invoiceproductcode=$_POST['invoiceproductcode'];
	 $invoiceproductchangecoderowid=$_POST['invoiceproductchangecoderowid'];
	 $invoiceproductchangepartid=$_POST['invoiceproductchangepartid']; 
	
	 ?>
	
  <input list="inven_invno<?php echo $invoiceproductchangecoderowid; ?>" type="text" placeholder="Invoice No" class="form-control2 change_invoice_no" changeid="<?php echo $invoiceproductchangecoderowid; ?>" name="partinve_invno[]" autocomplete="off">         
  <datalist id="inven_invno<?php echo $invoiceproductchangecoderowid; ?>">   

  <?php    
    
  $selectinvno="SELECT * FROM `inventory` WHERE code='$invoiceproductcode' AND invoice_qty !='0'";
  $run_invno=mysqli_query($conn,$selectinvno);
  while($row_invno=mysqli_fetch_array($run_invno))    
  {
     ?>
      
      <option value="<?php echo $row_invno['inventoryinvoiceno'] ?>" data-invid="<?php echo $row_invno['id']; ?>"></option>
      
   <?php 
  
	
	
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
  $uinvoicecustomervehiclenumber = $_POST['uinvoicecustomervehiclenumber'];    
  $invoicedate = $_POST['uinvoicedate'];
  $invoice_grand_total = $_POST['uinvoice_grand_total'];
  $invoice_paid_amt = $_POST['uinvoice_paid_amt']; 
  $uinvoice_update_id=$_POST['uinvoice_update_id'];
  $updatediscount_amount=$_POST['updatediscount_amount'];
  $updateinvoicetypename=$_POST['updateinvoicetypename'];    
    
    

  $checkinsert = 1;
  $firststore = 1;
  $date = date("Y-m-d");
  $amt_status='';    

    $product_code=$_POST['product_code']; 
	 

  $productcount = count($product_code);
  $productcountall = $productcount - 1;

	 $checkinsert=1;

    $labourname=$_POST['labourname'];
    
		
  $labournamecount = count($labourname);
    $labournamecountall = $labournamecount - 1;    
    
	
  for($i = 0; $i < $productcount; $i++) 
  {
			
			 if ($_POST['product_code'][$i] == '')
				{
        echo "<script>alert('Please Enter Code');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['product_selling_price'][$i] == '')
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
			
			 if ($_POST['inven_qty'][$i] == '')
				{
        echo "<script>alert('Please Enter QTY');</script>";
        $checkinsert = 0;
        exit();
    }
			

			
		}

    
  for($i = 0; $i < $labournamecount; $i++) 
  {
			
			 if ($_POST['labourname'][$i] == '')
				{
        echo "<script>alert('Please Enter Labour Name');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['productdescription'][$i] == '')
				{
        echo "<script>alert('Please Enter Description');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['productcost'][$i] == '')
				{
        echo "<script>alert('Please Enter Price');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['productgst'][$i] == '')
				{
        echo "<script>alert('Please Enter Gst');</script>";
        $checkinsert = 0;
        exit();
    }
			

			
		}
    
	    
	
	 $displayinventorypid='';
	 $displaycode='';
	 $displayinvoicenumber='';
	 $displayname='';
	 $displayunit='';
	 $displayunittype='';
	 $displaycategory='';
	 $displayprice='';
	 $displaysallesprice='';
	 $displaygst='';
	 $displayhsn='';
	 $displayqty='';
	 $displaytotal='';
    
     $displaylabourname='';
	 $displaydescription='';
	 $displaycost='';
	 $displaylabourgst='';

	
  if($checkinsert == '1') 
  {

    for ($i = 0; $i < $productcount; $i++) 
    {
					
					  if($i == 0)
							{
								 $displayinventorypid .=$_POST['inventory_part_id'][$i];
							  $displaycode .=$_POST['product_code'][$i];
								 $displayinvoicenumber .=$_POST['product_invoicenumber'][$i];
									$displayname .=$_POST['product_name'][$i];
									$displayunit .=$_POST['product_unit'][$i];
									$displayunittype .=$_POST['product_unittype'][$i];
									$displaycategory .=$_POST['product_category'][$i];
									$displayprice .=$_POST['product_price'][$i];
								 $displaysallesprice .=$_POST['product_selling_price'][$i];
									$displaygst .=$_POST['product_gst'][$i];
									$displayhsn .=$_POST['inven_hsn'][$i];
									$displayqty .=$_POST['inven_qty'][$i];
									$displaytotal .=$_POST['inven_total'][$i];
							}
				   else
							{
							
								 $displayinventorypid .='@@@@'.$_POST['inventory_part_id'][$i];
								 $displaycode .='@@@@'.$_POST['product_code'][$i];
								 $displayinvoicenumber .='@@@@'.$_POST['product_invoicenumber'][$i];
									$displayname .='@@@@'.$_POST['product_name'][$i];
									$displayunit .='@@@@'.$_POST['product_unit'][$i];
									$displayunittype .='@@@@'.$_POST['product_unittype'][$i];
									$displaycategory .='@@@@'.$_POST['product_category'][$i];
									$displayprice .='@@@@'.$_POST['product_price'][$i];
								 $displaysallesprice .='@@@@'.$_POST['product_selling_price'][$i];
									$displaygst .='@@@@'.$_POST['product_gst'][$i];
									$displayhsn .='@@@@'.$_POST['inven_hsn'][$i];
									$displayqty .='@@@@'.$_POST['inven_qty'][$i];
									$displaytotal .='@@@@'.$_POST['inven_total'][$i];
								
							}
					  
					
				}
      
    
    for ($i = 0; $i < $labournamecount; $i++) 
    {
        
        if($i == 0)
        {
        
            $displaylabourname .=$_POST['labourname'][$i];
            $displaydescription .=$_POST['productdescription'][$i];
            $displaycost .=$_POST['productcost'][$i];
            $displaylabourgst .=$_POST['productgst'][$i];
            
        }
        else
        {
        
            $displaylabourname .='@@@@'.$_POST['labourname'][$i];
            $displaydescription .='@@@@'.$_POST['productdescription'][$i];
            $displaycost .='@@@@'.$_POST['productcost'][$i];
            $displaylabourgst .='@@@@'.$_POST['productgst'][$i];
            
        }
        
    }  
       
      
	
    $update="UPDATE `invoice` SET `invoicenum`='$invoice_invoice_no',`invoicedate`='$invoicedate',`customer`='$invoicecustomercode',`vehiclenumber`='$uinvoicecustomervehiclenumber',`type`='$updateinvoicetypename',`inventory_pro_id`='$displayinventorypid',`code`='$displaycode',`inventoryinvoicenum`='$displayinvoicenumber',`name`='$displayname',`unit`='$displayunit',`unittype`='$displayunittype',`category`='$displaycategory',`price`='$displayprice',`sellingprice`='$displaysallesprice',`gst`='$displaygst',`qty`='$displayqty',`hsn`='$displayhsn',`total`='$displayhsn',`granttotal`='$invoice_grand_total',`paidamount`='$invoice_paid_amt',`labourname`='$displaylabourname',`description`='$displaydescription',`cost`='$displaycost',`labourgst`='$displaylabourgst',`overalldiscount`='$updatediscount_amount' WHERE id='$uinvoice_update_id'";

				$runupdate=mysqli_query($conn,$update);
			
			 if($runupdate)
				{
				
			
  for($i=0;$i<$productcount;$i++)
   {
				
				 $temp_inventory_part_id=$_POST['inventory_part_id'][$i];
				 $temp_invoice_newquan=$_POST['inven_qty'][$i];
				
				 $selectinven="SELECT * FROM `inventory` WHERE id='$temp_inventory_part_id'";
     $run_qq=mysqli_query($conn,$selectinven);    
     $row_qq=mysqli_fetch_array($run_qq);
          
     $invenquantity=$row_qq['invoice_qty'];
          
     $storeqty=$invenquantity-$temp_invoice_newquan;
				
				 if($storeqty < 0)
					{
					
						$storeqty=0;
						
					}
				
				 $updateqq="UPDATE `inventory` SET `invoice_qty`='$storeqty' WHERE id='$temp_inventory_part_id'";
     $run_upqq=mysqli_query($conn,$updateqq);        
				
				
			}
			
			
				echo "<script>alert('Invoice Updated successfully'); window.location.href='view-invoice.php';</script>";
					
				}
    
}
	
	 
	
}
	

if(isset($_POST['invoicecustomervehiclenumberid']))
{
    $invoicecustomervehiclenumberid=$_POST['invoicecustomervehiclenumberid'];
	
    $selectgoo="SELECT * FROM `customer` WHERE id='$invoicecustomervehiclenumberid'";
    $run_goo=mysqli_query($conn,$selectgoo);
    $row_goo=mysqli_fetch_array($run_goo);
    
    $name=$row_goo['name'];
    
    echo "<script>$('#invoicecustomername').val('$name');</script>";
    
}



if(isset($_POST['invoicecustomernamevalid']))
{
    
    $invoicecustomernamevalid=$_POST['invoicecustomernamevalid'];
	
    $selectgoo="SELECT * FROM `customer` WHERE id='$invoicecustomernamevalid'";
    $run_goo=mysqli_query($conn,$selectgoo);
    
    while($row_subli=mysqli_fetch_array($run_goo))
    {
          
        $customer_vehicleno=$row_subli['vehicleno'];
          
        $str_customer_vehicleno =explode("@@@@",$customer_vehicleno);    
       
        $itemcount=count($str_customer_vehicleno);  
        
        for($i=0;$i<$itemcount;$i++)
		{    
          
      ?>
      <option value="<?php echo $str_customer_vehicleno[$i]; ?>" data-cusid="<?php echo $row_subli['id']; ?>"></option>
     <?php
        }
     }
    
}


if(isset($_POST['invoicecustomerjobcardnumberid']))
{
    
    $invoicecustomerjobcardnumberid=$_POST['invoicecustomerjobcardnumberid'];
	
    $selectjobcardstore="SELECT * FROM `jobcardstore` WHERE id='$invoicecustomerjobcardnumberid'";
    $run_jobcardstore=mysqli_query($conn,$selectjobcardstore);
    $row_jobcardstore=mysqli_fetch_array($run_jobcardstore);
          
     $customer_cusid=$row_jobcardstore['cusid'];
     $customer_vehicleno=$row_jobcardstore['vehicleno'];
        
    
    $selectcustomer="SELECT * FROM `customer` WHERE id='$customer_cusid'";
    $run_customer=mysqli_query($conn,$selectcustomer);
    $row_customer=mysqli_fetch_array($run_customer);
    
    $customer_name=$row_customer['name'];    
        
     echo "<script>$('#invoicecustomername').val('$customer_name');</script>"; 
     echo "<script>$('#invoicecustomervehiclenumber').val('$customer_vehicleno');</script>"; 
      
    
}






if(isset($_POST['labourinvoice_price']))
{

   $labourinvoice_price=$_POST['labourinvoice_price'];   
   $labourinvoice_gst=$_POST['labourinvoice_gst'];
   $labourinvoicealltotalid=$_POST['labourinvoicealltotalid'];
      
    
   $num2 = $labourinvoice_gst * $labourinvoice_price;
   $total2 = $num2 / 100;
   $distotal = $labourinvoice_price + $total2;
    
   $item = array(
   'rowid' => $labourinvoicealltotalid,
   'price' => $labourinvoice_price,
   'gst' => $labourinvoice_gst
	);


   $_SESSION["labourinvoicetotal"][$labourinvoicealltotalid] = $item;    
    
   $distotal = number_format($distotal, 2);
   $distotal = str_replace(",", "", $distotal);    
    
   echo "<script>$('#producttotal$labourinvoicealltotalid').val('$distotal');</script>"; 
   echo '<script>loadinvoicetotal();</script>';    
        

}






?>
