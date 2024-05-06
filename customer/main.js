$("#addcustomer").submit(function(e){
e.preventDefault();

var addcustomercode=$("#customer_code").val();
var addgstno=$("#gst_number").val();
var addcompanyname=$("#customer_name").val();
var addcustomerphoneno=$("#customer_phone").val();
var addcustomeremailid=$("#customer_email_id").val();
var addcompanyaddress=$("#company_address").val();
var addcusstate=$("#place_name").val();
var addpincode=$("#pincode").val();
var addcusdate=$("#date").val();
var addvehicleno=$("#addvehicleno").val();
    
           

if(addcompanyname == '')
{
alert('Please enter Customer Name');
return false;
}
if(addcustomercode == '')
{
alert('Please enter Customer Code');
return false;
}


    if(addcompanyaddress == '')
{
alert('Please enter Company Address');
return false;
}
if(addpincode == '')
{
alert('Please enter Pincode');
return false;
}
    if(addcustomerphoneno == '')
{
alert('Please enter Customer Phone');
return false;
}
if(addcusstate == '')
{
alert('Please enter Place Name');
return false;
}

    
    




$.ajax({
url:'action.php',
type:'POST',
data:{addcustomercode:addcustomercode,addgstno:addgstno,addcompanyname:addcompanyname,addcustomerphoneno:addcustomerphoneno,addcustomeremailid:addcustomeremailid,addcompanyaddress:addcompanyaddress,addcusstate:addcusstate,addpincode:addpincode,addvehicleno:addvehicleno},
   success:function(data)
{
$("#add_customer_all").html(data);

}

});


});


$(document).on('click','.clickdeletecus',function() 
{

                    if(confirm("Are You Confirm"))  
                            {
            var customerremovegetid=$(this).attr("removecusid");


            $.ajax({
                                    url:'action.php',
                                    type:'POST',
                                    data:{removegetid2:customerremovegetid},
                                    success:function(data){
                                                    $("#deletecusid").html(data);
                                    }
                        });
                            }

});

$("#updcustomer").submit(function(e){
e.preventDefault();

var updcustomercode=$("#updcustomer_code").val();
var updgstno=$("#updgst_number").val();
var updcompanyname=$("#updcustomer_name").val();
var updcustomerphoneno=$("#updcustomer_phone").val();
var updcustomeremailid=$("#updcustomer_email_id").val();
var updcompanyupdress=$("#updcompany_address").val();
var updcusstate=$("#updplace_name").val();
var updpincode=$("#updpincode").val();
var updcusdate=$("#date").val();
var customerupdateid=$("#customerupdateid").val();
var updvehicleno=$("#updvehicleno").val();
    

if(updcompanyname == '')
{
alert('Please enter Customer Name');
return false;
}
if(updcustomercode == '')
{
alert('Please enter Customer Code');
return false;
}
   

    if(updcompanyupdress == '')
{
alert('Please enter Company updress');
return false;
}
if(updpincode == '')
{
alert('Please enter Pincode');
return false;
}
if(updcustomerphoneno == '')
{
alert('Please enter Customer Phone');
return false;
}
if(updcusstate == '')
{
alert('Please enter Place Name');
return false;
}



$.ajax({
url:'action.php',
type:'POST',
data:{updcustomercode:updcustomercode,updgstno:updgstno,updcompanyname:updcompanyname,updcustomerphoneno:updcustomerphoneno,updcustomeremailid:updcustomeremailid,updcompanyupdress:updcompanyupdress,updcusstate:updcusstate,updpincode:updpincode, customerupdateid:customerupdateid,updvehicleno:updvehicleno},
   success:function(data)
{
$("#upd_customer_all").html(data);

}

});


});

