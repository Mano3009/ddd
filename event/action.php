<?php
include("../conn.php"); 


if(isset($_POST['addeventname']))
{
	
  $addeventname=$_POST['addeventname'];
  $addeventstartdate=$_POST['addeventstartdate'];
  $addeventenddate=$_POST['addeventenddate'];
  $addnotificationdate=$_POST['addnotificationdate'];
  $addeventmessage=$_POST['addeventmessage'];


	
    $insert="INSERT INTO `events`(`event_name`, `startdate`, `enddate`, `notificationdate`, `message`) VALUES ('$addeventname','$addeventstartdate','$addeventenddate','$addnotificationdate','$addeventmessage')";
    $run_expenses=mysqli_query($conn,$insert);
    
    if($run_expenses)
    {
    echo "<script>alert('Events Added Successfully');window.location.href='view-event.php';</script>";
        
    }


}

if(isset($_POST['updateeventid']))
{
	
  $updateeventid=$_POST['updateeventid'];
  $updateeventname=$_POST['updateeventname'];
  $updateeventstartdate=$_POST['updateeventstartdate'];
  $updateeventenddate=$_POST['updateeventenddate'];
  $updatenotificationdate=$_POST['updatenotificationdate'];
  $updateeventmessage=$_POST['updateeventmessage'];  


	
    $insert="UPDATE `events` SET `event_name`='$updateeventname',`startdate`='$updateeventstartdate',`enddate`='$updateeventenddate',`notificationdate`='$updatenotificationdate',`message`='$updateeventmessage' WHERE id='$updateeventid'";
    $run_event=mysqli_query($conn,$insert);
    
    if($run_event)
    {
    echo "<script>alert('Events Update Successfully');window.location.href='view-event.php';</script>";
        
    }


}

if(isset($_POST['deleteeventremovegetid']))
{
       $deleteeventremovegetid=$_POST['deleteeventremovegetid'];
       $delete="DELETE FROM `events` WHERE id='$deleteeventremovegetid'";
       $run=mysqli_query($conn,$delete);
       if($run)
       {
           echo "<script>alert('Event deleted successfully'); window.location.href='view-event.php';</script>";
       }
   }



?>
