<?php session_start(); ?>
<?php
include("../conn.php"); 


if(isset($_POST['get_row_id'])) 
{
    
    $get_row_id=$_POST['get_row_id'];
    $get_expense_amt=$_POST['get_expense_amt'];
    
      if (isset($_SESSION["checkexpense"])) 
      {
         $item = array(
          'get_row_id' => $get_row_id,
          'get_expense_amt' => $get_expense_amt
        );
        $_SESSION["checkexpense"][$get_row_id] = $item;
          
        } 
      else 
      {
        $displayrow = 1;

        $item = array(
          'get_row_id' => $get_row_id,
          'get_expense_amt' => $get_expense_amt
        );
        $_SESSION["checkexpense"][$get_row_id] = $item;
        }
    
    echo "<script>loadexpensetotal();</script>";

    
}

if(isset($_POST['loadexpensetotal']))
{
    
    $all_expense_total=0;
    
    
      foreach ($_SESSION["checkexpense"] as $keys => $values) 
      {

          $new_amount=$values["get_expense_amt"];
    
          
          if($new_amount == '')
          {
              $new_amount=0;
          }
              
              
          $all_expense_total=$all_expense_total+$new_amount;
             
      }
    

    echo '<script>$("#displayalltotal").val("'.$all_expense_total.'");</script>';
    
    
    
}


if(isset($_POST['addexpendsdate']))
{
	
  $addexpendsdate=$_POST['addexpendsdate'];
	 $displayalltotal=$_POST['displayalltotal'];
	
	   $expendscategoryname='';
    $amount='';
    $remarks='';
    
    $expendscategoryname=$_POST['expendscategoryname'];
    $expendscategorynamecount=count($expendscategoryname);
    
    $storeinsert=1;

    for($i=0;$i<$expendscategorynamecount;$i++)
    {
        
          if($_POST['expendscategoryname'][$i] == '')    
          {  
            $storeinsert=0;
            echo "<script>alert('Please Select Expends Category');</script>";
            exit();  
          }
            
          if($_POST['expendsamount'][$i] == '')    
          {
            echo "<script>alert('Please Select Amount');</script>";  
            $storeinsert=0;
            exit(); 
          }    

          if($_POST['expendsremark'][$i] == '')    
          {
            echo "<script>alert('Please Check Remarks');</script>";  
            $storeinsert=0;
            exit(); 
          }     
           
    }    
    
	
	   if($storeinsert == 1)
				{
				
				  for($i=0;$i<$expendscategorynamecount;$i++)
      {  
        
         if($i == 0) 
         {      
            
          $expendscategoryname=$_POST['expendscategoryname'][$i];  
          $amount=$_POST['expendsamount'][$i];
          $remarks=$_POST['expendsremark'][$i];   

         }
         else
         {   
  
          $expendscategoryname .='@@@@'.$_POST['expendscategoryname'][$i];    
          $amount .='@@@@'.$_POST['expendsamount'][$i];
          $remarks .='@@@@'.$_POST['expendsremark'][$i];         

         }  
     }    
    
	
    $insert="INSERT INTO `expenses`(`date`, `expendscategoryname`, `amount`, `remark`, `total`) VALUES ('$addexpendsdate','$expendscategoryname','$amount','$remarks','$displayalltotal')";
    
    $run_expenses=mysqli_query($conn,$insert);
    
    if($run_expenses)
    {
    echo "<script>alert('Expenses Added Successfully');window.location.href='view-expends.php';</script>";
        
    }

				}

}



?>
