
$(document).on('click','#updateexpendscategorysubmit',function() 
{

var addcategoryname=$("#addcategoryname").val();
var expendsupdateid=$("#expendsupdateid").val();	


$.ajax({
url:'action.php',
type:'POST',
data:{updatecategoryname:addcategoryname,expendsupdateid:expendsupdateid},
success:function(data){
$("#update_expends_all").html(data);
}
});

});


$(document).on('click','#addexpendscategorysubmit',function() 
{

var addexpendscategoryval=$("#addcategoryname").val();


$.ajax({
url:'action.php',
type:'POST',
data:{addexpendscategoryval:addexpendscategoryval},
success:function(data){
$("#add_expends_all").html(data);
}
});

});


$(document).on('click','.clickexpendsxategory',function() 
{

if(confirm("Are You Confirm"))  
{
var expendsxategoryremovegetid=$(this).attr("removeid");
	
$.ajax({
url:'action.php',
type:'POST',
data:{expendsxategoryremovegetid:expendsxategoryremovegetid},
success:function(data){
$("#deleteexpendscategoryid").html(data);
}
});
}

});


$(document).on('click','.removeexpendsrow',function()
{

	 $(this).closest("tr").remove();

});


$(document).on('click','#addexpensesrowid',function(e)
{
e.preventDefault();   
	
var count=$("#dynamic_field tr").last().length;	
	
	if(count == '0')
	{
	var n=0;
	}
	else
	{
	var n=$("#dynamic_field tr").last().attr("count");
	}	
	
var m=1;
var i= parseInt(m, 10) + parseInt(n, 10);
	
$('#dynamic_field').append('<tr count="'+i+'" id="displayexpends'+i+'"><td><input list="expendscategorylist" type="text" placeholder="Expends Category" class="form-control1" name="expendscategoryname[]"></td><td><input type="number" placeholder="Amount" class="form-control1 changeexpendsamount" id="expendsamount'+i+'" name="expendsamount[]" changeid="'+i+'"></td><td><input type="text" placeholder="Remarks" class="form-control1" name="expendsremark[]"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger removeexpendsrow remove">X</button></td></tr>'); 	 
	
	
});


$(document).on('keyup','.changeexpendsamount',function(e)
{

    var rowid=$(this).attr("changeid");
    loadexpenseschange(rowid);
        
    
});


$(document).on('submit','#addexpensesform',function(e) 
{
   e.preventDefault();  
	
   var addexpendsdate=$("#addexpendsdate").val();
   var displayalltotal=$("#displayalltotal").val();
    
    
   if(addexpendsdate == '')
   {
    alert('Select Date');    
    return false;   
    }
   
     
    var formData = new FormData(this);

    formData.append('addexpendsdate',addexpendsdate);
    formData.append('displayalltotal',displayalltotal);

         $.ajax({
            type: 'POST',
            url: 'action.php',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
	    $("#displayexpends").html(data);
            },
	 
        }); 
});










function loadexpenseschange(i)
{
   var get_row_id=parseInt(i);   
   
	  
   var get_expense_amt=$("#expendsamount"+get_row_id).val();
  
	
    $.ajax({
        url: 'action.php',
        type: 'POST',
        data: {get_row_id: get_row_id,get_expense_amt:get_expense_amt},
        success: function (data) {
            $("#displayexpends").html(data);
        }
    });    
    
    
}


function loadexpensetotal()
{
   
    var loadexpensetotal=1;
    
        $.ajax({
        url: 'action.php',
        type: 'POST',
        data: {loadexpensetotal:loadexpensetotal},
        success: function (data) {
            $("#displayexpends").html(data);
        }
    });
    
}

