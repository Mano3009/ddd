$(document).on('click','#addservicetypesubmit',function() 
{

var addservicetypenameval=$("#addservicetypename").val();


$.ajax({
url:'action.php',
type:'POST',
data:{addservicetypenameval:addservicetypenameval},
success:function(data){
$("#add_servicetype_all").html(data);
}
});

});

$(document).on('click','#updateservicetypesubmit',function() 
{

var updateservicetypename=$("#updateservicetypename").val();
var servicetypeupdateid=$("#servicetypeupdateid").val();	


$.ajax({
url:'action.php',
type:'POST',
data:{updateservicetypename:updateservicetypename,servicetypeupdateid:servicetypeupdateid},
success:function(data){
$("#add_servicetype_all").html(data);
}
});

});

$(document).on('click','.clickservicetype',function() 
{

if(confirm("Are You Confirm"))  
{
var servicetyperemovegetid=$(this).attr("removeid");
	
$.ajax({
url:'action.php',
type:'POST',
data:{servicetyperemovegetid:servicetyperemovegetid},
success:function(data){
$("#deleteservicetypeid").html(data);
}
});
}

});




$(document).on('click','#addjobcardsubmit',function() 
{
	
	var addcustomer_name=$("#addcustomer_name").val();
    var addcustomer_vehickenumbernum=$("#addcustomer_vehickenumbernum").val();
	var addcardno=$("#addcardno").val();
	var addjobcarddate=$("#jobcarddate").val();
	var addjobcardtime=$("#jobcardtime").val();
	var addentrytime=$("#entrytime").val();
	var addgreetingtime=$("#greetingtime").val();
	var addaftertime=$("#aftertime").val();
	var addjobcardphonenumber=$("#addjobcardphonenumber").val();
	var addjobcardemail=$("#addjobcardemail").val();
	var addjobcardbirthday=$("#addjobcardbirthday").val();
	var addjobcardrepair=$("#addjobcardrepair").val();
	var addjobcardmodal=$("#addjobcardmodal").val();
	var addjobcardregno=$("#addjobcardregno").val();
	var addjobcardchassisno=$("#addjobcardchassisno").val();
	var addjobcardengineno=$("#addjobcardengineno").val();
	var addjobcardmilage=$("#addjobcardmilage").val();
	var addjobcardserviceadvisorcommend=$("#addjobcardserviceadvisorcommend").val();
	var addjobcardcommends=$("#addjobcardcommends").val();
	var addjobcardadditionalcommends=$("#addjobcardadditionalcommends").val();
	var addjobcardtechnician=$("#addjobcardtechnician").val();
	var addjobcardserviceadivisor=$("#addjobcardserviceadivisor").val();
    var addservicetypenum=$("#addservicetypenum").val();
    
    var vehiclepickup = $("input[name='vehiclepickup']:checked").val();
    var vehicledrop = $("input[name='vehicledrop']:checked").val();
	
    if(addcustomer_name == '')
    {
    alert('Please Select Cunstomer name');
    return false;    
    }
    
    if(addservicetypenum == '')
    {
    alert('Please Select Service Type name');
    return false;    
    }
    
	var addcustomernameid='';
    var addservicetypenumid='';
	
	
	if(addcustomer_name != '')
	{
		
		addcustomernameid=$('#listcustomer option').filter(function() {
    return this.value == addcustomer_name;
    }).data('cusid');
	
	}
    
    if(addservicetypenum != '')
	{
		
		addservicetypenumid=$('#listservicetype option').filter(function() {
    return this.value == addservicetypenum;
    }).data('cusid');
	
	}
    
    if(addcustomer_vehickenumbernum != '')
	{
		
		addcustomernameid=$('#listcustomervehicleno option').filter(function() {
    return this.value == addcustomer_vehickenumbernum;
    }).data('cusid');
	
	}
	
	
		   $.ajax({
					url:'action.php',
					type:'POST',
					data:{addcustomernameid:addcustomernameid,addcardno:addcardno,addjobcarddate:addjobcarddate,addjobcardtime:addjobcardtime,addentrytime:addentrytime,addgreetingtime:addgreetingtime,addaftertime:addaftertime,addjobcardphonenumber:addjobcardphonenumber,addjobcardemail:addjobcardemail,addjobcardbirthday:addjobcardbirthday,addjobcardrepair:addjobcardrepair,addjobcardmodal:addjobcardmodal,addjobcardregno:addjobcardregno,addjobcardchassisno:addjobcardchassisno,addjobcardengineno:addjobcardengineno,addjobcardmilage:addjobcardmilage,addjobcardserviceadvisorcommend:addjobcardserviceadvisorcommend,addjobcardcommends:addjobcardcommends,addjobcardadditionalcommends:addjobcardadditionalcommends,addjobcardtechnician:addjobcardtechnician,addjobcardserviceadivisor:addjobcardserviceadivisor,addcustomer_vehickenumbernum:addcustomer_vehickenumbernum,addservicetypenumid:addservicetypenumid,addvehiclepickup:vehiclepickup,addvehicledrop:vehicledrop},
					success:function(data){
					$("#add_jobcard_all").html(data);
					}
					});
	 
	
	
});



$(document).on('click','.clickdeletejobcard',function() 
{

if(confirm("Are You Confirm"))  
{
var jobcardremovegetid=$(this).attr("removejobid");
	
$.ajax({
url:'action.php',
type:'POST',
data:{jobcardremovegetid:jobcardremovegetid},
success:function(data){
$("#deletejobcardid").html(data);
}
});
}

});



$(document).on('click','#updatejobcardsubmit',function() 
{

	
	var addcustomer_name=$("#addcustomer_name").val();
    var addcustomer_vehickenumbernum=$("#addcustomer_vehickenumbernum").val();
	var addcardno=$("#addcardno").val();
	var addjobcarddate=$("#jobcarddate").val();
	var addjobcardtime=$("#jobcardtime").val();
	var addentrytime=$("#entrytime").val();
	var addgreetingtime=$("#greetingtime").val();
	var addaftertime=$("#aftertime").val();
	var addjobcardphonenumber=$("#addjobcardphonenumber").val();
	var addjobcardemail=$("#addjobcardemail").val();
	var addjobcardbirthday=$("#addjobcardbirthday").val();
	var addjobcardrepair=$("#addjobcardrepair").val();
	var addjobcardmodal=$("#addjobcardmodal").val();
	var addjobcardregno=$("#addjobcardregno").val();
	var addjobcardchassisno=$("#addjobcardchassisno").val();
	var addjobcardengineno=$("#addjobcardengineno").val();
	var addjobcardmilage=$("#addjobcardmilage").val();
	var addjobcardserviceadvisorcommend=$("#addjobcardserviceadvisorcommend").val();
	var addjobcardcommends=$("#addjobcardcommends").val();
	var addjobcardadditionalcommends=$("#addjobcardadditionalcommends").val();
	var addjobcardtechnician=$("#addjobcardtechnician").val();
	var addjobcardserviceadivisor=$("#addjobcardserviceadivisor").val();
	var jobcardupdateid=$("#jobcardupdateid").val();
	var updateservicetypenum=$("#updateservicetypenum").val();
	
    var updatevehiclepickup = $("input[name='vehiclepickup']:checked").val();
    var updatevehicledrop = $("input[name='vehicledrop']:checked").val();
	
    
    if(addcustomer_name == '')
    {
    alert('Please Select Cunstomer name');
    return false;    
    }
    
    if(updateservicetypenum == '')
    {
    alert('Please Select Service Type name');
    return false;    
    }
    
    
	var addcustomernameid='';
    var updateservicetypenumid='';
	
	
	if(addcustomer_name != '')
	{
		
		addcustomernameid=$('#listcustomer option').filter(function() {
    return this.value == addcustomer_name;
    }).data('cusid');
	
	}
    if(updateservicetypenum != '')
	{
		
		updateservicetypenumid=$('#listservicetype option').filter(function() {
    return this.value == updateservicetypenum;
    }).data('cusid');
	
	}
    if(addcustomer_vehickenumbernum != '')
	{
		
		addcustomernameid=$('#listcustomervehicleno option').filter(function() {
    return this.value == addcustomer_vehickenumbernum;
    }).data('cusid');
	
	}
    
	
	
		   $.ajax({
					url:'action.php',
					type:'POST',
					data:{updatejobcardupdateid:jobcardupdateid,updatecustomernameid:addcustomernameid,updatecardno:addcardno,updatejobcarddate:addjobcarddate,updatejobcardtime:addjobcardtime,updateentrytime:addentrytime,updategreetingtime:addgreetingtime,updateaftertime:addaftertime,updatejobcardphonenumber:addjobcardphonenumber,updatejobcardemail:addjobcardemail,updatejobcardbirthday:addjobcardbirthday,updatejobcardrepair:addjobcardrepair,updatejobcardmodal:addjobcardmodal,updatejobcardregno:addjobcardregno,updatejobcardchassisno:addjobcardchassisno,updatejobcardengineno:addjobcardengineno,updatejobcardmilage:addjobcardmilage,updateservicetypenumid:updateservicetypenumid,updatejobcardserviceadvisorcommend:addjobcardserviceadvisorcommend,updatejobcardcommends:addjobcardcommends,updatejobcardadditionalcommends:addjobcardadditionalcommends,updatejobcardtechnician:addjobcardtechnician,updatejobcardserviceadivisor:addjobcardserviceadivisor,updatecustomer_vehickenumbernum:addcustomer_vehickenumbernum,updatevehiclepickup:updatevehiclepickup,updatevehicledrop:updatevehicledrop},
					success:function(data){
					$("#add_jobcard_all").html(data);
					}
					});
	 
	
	
});

$(document).on('change','.changejobcardcustomernum',function()
{

	changejobcardcustomernum();
	
});

$(document).on('change','.changejobcardvehickenumbernum',function()
{
	changejobcardvehickenumbernum();
	
});




function changejobcardcustomernum()
{
        var addcustomer_name=$("#addcustomer_name").val();
        
        if(addcustomer_name != '')
        {    
        $.ajax({
            url:'action.php',
            type:'POST',
            data:{addcustomer_name:addcustomer_name},
            success:function(data){
                $("#listcustomervehicleno").html(data);
            }
        });
        }
    }



function changejobcardvehickenumbernum()
{
    var addcustomer_vehickenumbernum=$("#addcustomer_vehickenumbernum").val();
        
    
    
        if(addcustomer_vehickenumbernum != '')
        {  
            
        var addcustomer_vehickenumbernumid=$('#listcustomervehicleno option').filter(function() {
        return this.value == addcustomer_vehickenumbernum;
        }).data('cusid');    
             
            
        if(typeof addcustomer_vehickenumbernumid !== 'undefined')
        {       
            
        $.ajax({
            url:'action.php',
            type:'POST',
            data:{addcustomer_vehickenumbernumid:addcustomer_vehickenumbernumid},
            success:function(data){
                $("#displaycusdetails").html(data);
            }
        });
            
        }
        }
    }
