
$(document).on('submit','#addeventform',function(e) 
{
   e.preventDefault();  
	
   var addeventname=$("#addeventname").val();
   var addeventstartdate=$("#addeventstartdate").val();
   var addeventenddate=$("#addeventenddate").val();
   var addnotificationdate=$("#addnotificationdate").val();
   var addeventmessage=$("#addeventmessage").val();  
    
    
   if(addeventname == '')
   {
    alert('Enter Event Name');    
    return false;   
    }
    
    if(addeventstartdate == '')
   {
    alert('Select Start Date');    
    return false;   
    }
     
    if(addeventenddate == '')
   {
    alert('Select End Date');    
    return false;   
    }
    
    if(addnotificationdate == '')
   {
    alert('Select Notification Date');    
    return false;   
    }
    
   
     
    var formData = new FormData(this);

    formData.append('addeventname',addeventname);
    formData.append('addeventstartdate',addeventstartdate);
    formData.append('addeventenddate',addeventenddate);
    formData.append('addnotificationdate',addnotificationdate);
    formData.append('addeventmessage',addeventmessage);

         $.ajax({
            type: 'POST',
            url: 'action.php',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
	    $("#displayevent").html(data);
            },
	 
        }); 
});


$(document).on('submit','#updateeventform',function(e) 
{
   e.preventDefault();  
	
   var updateeventname=$("#updateeventname").val();
   var updateeventstartdate=$("#updateeventstartdate").val();
   var updateeventenddate=$("#updateeventenddate").val();
   var updatenotificationdate=$("#updatenotificationdate").val();
   var updateeventmessage=$("#updateeventmessage").val(); 
   var updateeventid=$("#updateeventid").val();     
    
    
   if(updateeventname == '')
   {
    alert('Enter Event Name');    
    return false;   
    }
    
    if(updateeventstartdate == '')
   {
    alert('Select Start Date');    
    return false;   
    }
     
    if(updateeventenddate == '')
   {
    alert('Select End Date');    
    return false;   
    }
    
    if(updatenotificationdate == '')
   {
    alert('Select Notification Date');    
    return false;   
    }
    
   
     
    var formData = new FormData(this);

    formData.append('updateeventid',updateeventid);
    formData.append('updateeventname',updateeventname);
    formData.append('updateeventstartdate',updateeventstartdate);
    formData.append('updateeventenddate',updateeventenddate);
    formData.append('updatenotificationdate',updatenotificationdate);
    formData.append('updateeventmessage',updateeventmessage);

         $.ajax({
            type: 'POST',
            url: 'action.php',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
	    $("#displayevent").html(data);
            },
	 
        }); 
});


$(document).on('click','.clickdeleteevent',function() 
{

        if(confirm("Are You Confirm"))  
        {
        var deleteeventremovegetid=$(this).attr("removecusid");


        $.ajax({
        url:'action.php',
        type:'POST',
        data:{deleteeventremovegetid:deleteeventremovegetid},
        success:function(data){
        $("#deletecusid").html(data);
        }
        });
        }

});

