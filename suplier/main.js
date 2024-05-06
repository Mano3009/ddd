$("#addsuplier").submit(function(e){
e.preventDefault();

var suplier_name=$("#suplier_name").val();
var suplier_code=$("#suplier_code").val();
var suplier_phone=$("#suplier_phone").val();
var suplier_email_id=$("#suplier_email_id").val();
var gst_number=$("#gst_number").val();
var suplier_address=$("#company_address").val();
var place_name=$("#place_name").val();
var pincode=$("#pincode").val();
var date=$("#date").val(); 
           

if(suplier_name == '')
{
alert('Please Enter Customer Name');
return false;
}
 

    
if(date == '')
{
alert('Please Select Date');
return false;
}    

 
$.ajax({
url:'action.php',
type:'POST',
data:{addsuplier_name:suplier_name,addsuplier_code:suplier_code,addsuplier_phone:suplier_phone,addsuplier_email_id:suplier_email_id,addgst_number:gst_number,addsuplier_address:suplier_address,addplace_name:place_name,addpincode:pincode,adddate:date},
   success:function(data)
{
$("#add_suplier_all").html(data);

}

});


});




 $(document).on('click','.clickdeletesuplier',function(e) 
 {
    if(confirm("Are You Confirm"))    
    {    
       var clickdeletesuplierid=$(this).attr("removecusid");
        
        
           $.ajax({
            url:'action.php',
            type:'POST',
            data:{clickdeletesuplierid:clickdeletesuplierid},
            success:function(data){
                $("#deletecusid").html(data);
            }
        });
    }   
    });



$("#updatesuplierform").submit(function(e){
e.preventDefault();

var suplier_name=$("#suplier_name").val();
var suplier_code=$("#suplier_code").val();
var suplier_phone=$("#suplier_phone").val();
var suplier_email_id=$("#suplier_email_id").val();
var gst_number=$("#gst_number").val();
var suplier_address=$("#company_address").val();
var place_name=$("#place_name").val();
var pincode=$("#pincode").val();
var date=$("#date").val(); 
var updatesuplierid=$("#updatesuplierid").val();
           

if(suplier_name == '')
{
alert('Please Enter Customer Name');
return false;
}
    
if(suplier_code == '')
{
alert('Please Enter Customer Code');
return false;
}

if(gst_number == '')
{
alert('Please Enter Customer Gst Number');
return false;
}
    
if(date == '')
{
alert('Please Select Date');
return false;
}    

 
$.ajax({
url:'action.php',
type:'POST',
data:{updatesuplier_name:suplier_name,updatesuplier_code:suplier_code,updatesuplier_phone:suplier_phone,updatesuplier_email_id:suplier_email_id,updategst_number:gst_number,updatesuplier_address:suplier_address,updateplace_name:place_name,updatepincode:pincode,updatedate:date,updatesuplierid:updatesuplierid},
   success:function(data)
{
$("#update_suplier_all").html(data);

}

});


});
