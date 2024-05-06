<?php
session_start();
include("../conn.php"); 

if(isset($_POST['inventorysupliercode']))
{
    $inventorysupliercode=$_POST['inventorysupliercode'];
	
    $selectgoo="SELECT * FROM `suplier` WHERE code='$inventorysupliercode'";
    $run_goo=mysqli_query($conn,$selectgoo);
    $row_goo=mysqli_fetch_array($run_goo);
	
    $disname=$row_goo['name'];
	
    echo "<script>$('#inventorysupliername').val('$disname');</script>";
}


if(isset($_POST['invententoryproductcode']))
{
	
	 $invententoryproductcode=$_POST['invententoryproductcode'];
	 $inventproductchangecoderowid=$_POST['inventproductchangecoderowid'];
	 $inventproductchangepartid=$_POST['inventproductchangepartid'];
	
	 $selectproductdetails = "SELECT * FROM `productdetails` WHERE id='$inventproductchangepartid'";
  $run_productdetails = mysqli_query($conn, $selectproductdetails);
  $row_productdetails = mysqli_fetch_array($run_productdetails);
	
	
	 ?>
	
<td>
<input type="text" placeholder="Part No" class="form-control1"  name="product_code[]" value="<?php echo $row_productdetails['code']; ?>" readonly>   
</td>
<td>
<input  type="text" placeholder="Part Description" class="form-control1" id="product_name" name="product_name[]" value="<?php echo $row_productdetails['name']; ?>">   
</td>    
<td>
<input type="text" placeholder="Unit" class="form-control1"  name="product_unit[]" value="<?php echo $row_productdetails['unit']; ?>">    
</td>
<td>
<input type="text" placeholder="Unit Type" class="form-control1"  name="product_unittype[]" value="<?php echo $row_productdetails['unittype']; ?>">    
</td>	
<td>
<input type="text" placeholder="Category" class="form-control1"  name="product_category[]" value="<?php echo $row_productdetails['category']; ?>">  
</td>	
<td>
<input type="number" placeholder="Price" class="form-control1 changeinventorycalculation"  name="product_price[]" id="price<?php echo $inventproductchangecoderowid; ?>" value="<?php echo $row_productdetails['price']; ?>" inventoryid="<?php echo $inventproductchangecoderowid; ?>">  
</td>   
<td>
<input type="number" placeholder="Selling Price" class="form-control1"  name="product_selling_price[]" inventoryid="<?php echo $inventproductchangecoderowid; ?>" value="<?php echo $row_productdetails['sellingprice']; ?>" id="sellingprice<?php echo $inventproductchangecoderowid; ?>">
</td>    
<td>
<input type="number" placeholder="Gst" class="form-control1 changeinventorycalculation"  name="product_gst[]" inventoryid="<?php echo $inventproductchangecoderowid; ?>" value="<?php echo $row_productdetails['gst']; ?>" id="gst<?php echo $inventproductchangecoderowid; ?>">
</td>  
<td>
<input type="number" placeholder="Qty" class="form-control1 changeinventorycalculation" name="inven_qty[]" inventoryid="<?php echo $inventproductchangecoderowid; ?>" id="qty<?php echo $inventproductchangecoderowid; ?>">
</td>
<td>
<input type="text" placeholder="HSN" class="form-control1" name="inven_hsn[]" value="<?php echo $row_productdetails['hsn']; ?>" readonly>
</td>
<td>
<input type="number" placeholder="Total" class="form-control1" name="inven_total[]" readonly id="totalinventory<?php echo $inventproductchangecoderowid; ?>">
</td>
<td>
<button type="button" name="remove" id="<?php echo $inventproductchangecoderowid; ?>" class="btn btn-danger removeinventoryrowid remove">X</button>
</td>
	
  <?php
	
}


if(isset($_POST['inventorytotalrowid'])) 
{
  $inventorytotalrowid = $_POST['inventorytotalrowid'];
  $inventory_price = $_POST['inventory_price'];
  $inventory_gst = $_POST['inventory_gst'];
  $inventory_qty = $_POST['inventory_qty'];
	
	
	 $item = array(
			'rowid' => $inventorytotalrowid,
			'price' => $inventory_price,
			'gst' => $inventory_gst,
			'qty' => $inventory_qty
	);


 $_SESSION["inventorytotal"][$inventorytotalrowid] = $item;

	echo '<script>loadinvetntorytotal();</script>';

}


if(isset($_POST['loadinvetntorytotal']))
{

  if (!empty($_SESSION["inventorytotal"]))
  {
    $no = 0;
    $grttotal = 0;
    $subtotal = 0;
    $gstamount = 0;

    foreach ($_SESSION["inventorytotal"] as $keys => $values)
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
					
					 echo "<script>$('#totalinventory$invid').val('$totalprice');</script>";
					
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

    echo '<script>$("#ineventory_sub_total").val("' . $subtotaldis . '");</script>';
    echo '<script>$("#ineventory_gst_amount").val("' . $gstamountdis . '");</script>';
    echo '<script>$("#ineventory_grand_total").val("' . $grttotaldis . '");</script>';
  }
  else
  {
  
    echo '<script>$("#ineventory_sub_total").val("0");</script>';
    echo '<script>$("#ineventory_gst_amount").val("0");</script>';
    echo '<script>$("#ineventory_grand_total").val("0");</script>';  
  
  }
    
    
}


if(isset($_POST['inventory_invoice_no']))
{
  $inventory_invoice_no = $_POST['inventory_invoice_no'];
  $inventorysupliercode = $_POST['inventorysupliercode'];
  $inventorydate = $_POST['inventorydate'];
  $ineventory_paid_amt = $_POST['ineventory_paid_amt'];
  $ineventory_grand_total = $_POST['ineventory_grand_total'];   

  $checkinsert = 1;
  $firststore = 1;
  $date = date("Y-m-d");
  $amt_status='';    

	 $product_code=$_POST['product_code'];

  $productcount = count($product_code);
  $productcountall = $productcount - 1;

	 $checkinsert=1;
	
	
  for ($i = 0; $i < $productcount; $i++) 
  {
			
			 if ($_POST['product_code'][$i] == '')
				{
        echo "<script>alert('Please Enter Code');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['product_price'][$i] == '')
				{
        echo "<script>alert('Please Enter Price');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['product_selling_price'][$i] == '')
				{
        echo "<script>alert('Please Enter Selling Price');</script>";
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
        

  if ($checkinsert == '1') 
  {

    $selcetcount = "SELECT * FROM `count` WHERE name='local-inventory'";
    $runcount = mysqli_query($conn, $selcetcount);
    $rowcount = mysqli_fetch_array($runcount);

    $rowcountno = $rowcount['count'];

    $inventoryid = 1000 + $rowcountno;

    for ($i = 0; $i < $productcount; $i++) 
    {
      $check_code = $_POST['product_code'][$i];
      $check_name = $_POST['product_name'][$i];
      $check_unit = $_POST['product_unit'][$i];
      $check_unittype = $_POST['product_unittype'][$i];
      $check_category = $_POST['product_category'][$i];
      $check_price = $_POST['product_price'][$i];
      $check_selling_price = $_POST['product_selling_price'][$i];
      $check_gst = $_POST['product_gst'][$i];
      $check_hsn = $_POST['inven_hsn'][$i];
					 $check_qty = $_POST['inven_qty'][$i];
      $check_total = $_POST['inven_total'][$i];

       $insertinventory = "INSERT INTO `inventory`(`inventoryid`,`inventoryinvoiceno`, `inventorysupliernum`, `inventorydate`, `code`, `name`, `unit`, `unittype`, `category`, `price`, `sellingprice`, `gst`, `inventory_qty`,`invoice_qty`, `hsn`, `total`, `grandtotal`, `paidamount`) VALUES ('$inventoryid','$inventory_invoice_no','$inventorysupliercode','$inventorydate','$check_code','$check_name','$check_unit','$check_unittype','$check_category','$check_price','$check_selling_price','$check_gst','$check_qty','$check_qty','$check_hsn','$check_total','$ineventory_grand_total','$ineventory_paid_amt')";
        
      $run_query = mysqli_query($conn, $insertinventory);
        
      //echo "<br><br>";    
        
    }

    $selectsalno = "SELECT * FROM `count` WHERE name='local-inventory'";
    $run_sal = mysqli_query($conn, $selectsalno);
    $rowsalnonew = mysqli_fetch_array($run_sal);
    $countnew = $rowsalnonew['count'];
    $newcount = $countnew + 1;
    $updateno = "UPDATE `count` SET `count` = '$newcount' WHERE name='local-inventory'";
    $run_upcus = mysqli_query($conn, $updateno);

    echo "<script>alert('Product Added Successfully');window.location.href='view-inventory.php';</script>";
  }
    
}


if(isset($_POST['inventoryremovegetid']))
{

  $inventoryremovegetid=$_POST['inventoryremovegetid'];
	
	 $delete="DELETE FROM `inventory` WHERE inventoryid='$inventoryremovegetid'";
		$run=mysqli_query($conn,$delete);
		if($run)
		{
						echo "<script>alert('Inventory deleted successfully'); window.location.href='view-inventory.php';</script>";
		}

}


if(isset($_POST['removeinventoryvalrowid']))
{
	
	 $removeinventoryvalrowid=$_POST['removeinventoryvalrowid'];
	
	 if (!empty($_SESSION["inventorytotal"]))
		{
			
			 unset($_SESSION["inventorytotal"][$removeinventoryvalrowid]);
			 echo '<script>loadinvetntorytotal();</script>';
		}
	
}
	
	
if(isset($_POST['uinventory_invoice_no']))
{
  $uinventory_invoice_no = $_POST['uinventory_invoice_no'];
  $uinventorysupliercode = $_POST['uinventorysupliercode'];
  $uinventorydate = $_POST['uinventorydate'];
  $uineventory_paid_amt = $_POST['uineventory_paid_amt'];
  $uineventory_grand_total = $_POST['uineventory_grand_total']; 
	 $uinventoryupdateid = $_POST['uinventoryupdateid']; 

  $checkinsert = 1;
  $firststore = 1;
  $date = date("Y-m-d");
  $amt_status='';    

	 $product_code=$_POST['product_code'];

  $productcount = count($product_code);
  $productcountall = $productcount - 1;

	 $checkinsert=1;
	
	
  for ($i = 0; $i < $productcount; $i++) 
  {
			
			 if ($_POST['product_code'][$i] == '')
				{
        echo "<script>alert('Please Enter Code');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['product_price'][$i] == '')
				{
        echo "<script>alert('Please Enter Price');</script>";
        $checkinsert = 0;
        exit();
    }
			
			 if ($_POST['product_selling_price'][$i] == '')
				{
        echo "<script>alert('Please Enter Selling Price');</script>";
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
        

  if ($checkinsert == '1') 
  {
   
			
    $deleteinventory = "DELETE FROM `inventory` WHERE inventoryid='$uinventoryupdateid'";
    $runinventory = mysqli_query($conn, $deleteinventory);

    for ($i = 0; $i < $productcount; $i++) 
    {
      $check_code = $_POST['product_code'][$i];
      $check_name = $_POST['product_name'][$i];
      $check_unit = $_POST['product_unit'][$i];
      $check_unittype = $_POST['product_unittype'][$i];
      $check_category = $_POST['product_category'][$i];
      $check_price = $_POST['product_price'][$i];
      $check_selling_price = $_POST['product_selling_price'][$i];
      $check_gst = $_POST['product_gst'][$i];
      $check_hsn = $_POST['inven_hsn'][$i];
					 $check_qty = $_POST['inven_qty'][$i];
      $check_total = $_POST['inven_total'][$i];

       $insertinventory = "INSERT INTO `inventory`(`inventoryid`,`inventoryinvoiceno`, `inventorysupliernum`, `inventorydate`, `code`, `name`, `unit`, `unittype`, `category`, `price`, `sellingprice`, `gst`, `inventory_qty`,`invoice_qty`, `hsn`, `total`, `grandtotal`, `paidamount`) VALUES ('$uinventoryupdateid','$uinventory_invoice_no','$uinventorysupliercode','$uinventorydate','$check_code','$check_name','$check_unit','$check_unittype','$check_category','$check_price','$check_selling_price','$check_gst','$check_qty','$check_qty','$check_hsn','$check_total','$uineventory_grand_total','$uineventory_paid_amt')";
        
      $run_query = mysqli_query($conn, $insertinventory);
        
      //echo "<br><br>";    
        
    }

 

    echo "<script>alert('Product Updated Successfully');window.location.href1='view-inventory.php';</script>";
  }
    
}




?>
