$(document).on('click','#add_local_inventory',function(e)
{
e.preventDefault();    
var m=1;
	
var count=$("#dynamic_field tr").last().length; 
       
	if(count == '0')
	{
	var n=0;
	}
	else
	{
	var n=$("#dynamic_field tr").last().attr("count");
	} 	
	
var i= parseInt(m, 10) + parseInt(n, 10);
	
$('#dynamic_field').append('<tr count="'+i+'" id="display_inventory'+i+'"><td><input list="part_code" type="text" placeholder="Part No" class="form-control1 changelocalinventorypartcode" changeid="'+i+'" name="product_code[]"></td><td><input list="part_name" type="text" placeholder="Part Description" class="form-control1" id="product_name" name="product_name[]"></td><td><input type="text" placeholder="Unit" class="form-control1" id="hsn" name="product_unit[]"></td><td><input type="text" placeholder="Unit Type" class="form-control1" name="product_unittype[]"></td><td><input type="text" placeholder="Category" class="form-control1" name="product_category[]"></td><td><input type="text" placeholder="Price" class="form-control1" name="product_price[]"></td><td><input type="text" placeholder="Selling Price" class="form-control1" name="product_selling_price[]" invgetid="1"></td><td><input type="text" placeholder="Gst" class="form-control1" name="product_gst[]"></td><td><input type="number" placeholder="Qty" class="form-control1" name="inven_hsn[]"></td><td><input type="text" placeholder="HSN" class="form-control1" name="inven_hsn[]"></td><td><input type="number" placeholder="Total" class="form-control1" name="inven_total[]"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger remove_local_inventory remove">X</button></td></tr>'); 	 
	
	
});


$(document).on('change','.changelocalsupliernum',function(e){  
changelocalsupliernum();
});

$(document).on('keyup','.changelocalsupliernum',function(e){     
changelocalsupliernum();
});

$(document).on('change','.changelocalinventorypartcode',function()
{
    var invent_changepartid=''; 
    var invent_code=$(this).val();
    var invent_changecodeid=$(this).attr("changeid");
    
    invent_changepartid=$('#part_code option').filter(function() {
    return this.value == invent_code;
    }).data('proid');
    
    if(typeof invent_changepartid === 'undefined')
    {
      invent_changepartid='';  
    }
    
    
    $.ajax({
            url:'action.php',
            type:'POST',
            data:{invententoryproductcode:invent_code,inventproductchangecoderowid:invent_changecodeid,inventproductchangepartid:invent_changepartid},
            success:function(data){
         $("#display_inventory"+invent_changecodeid).html(data);
            }
        });
});

$(document).on('keyup','.changeinventorycalculation',function(e)
{
   var inventorytotalid=$(this).attr("inventoryid");
	
    if(typeof inventorytotalid === 'undefined')
    {
        
    }
    else
    {
    inventorytotal(inventorytotalid);
    }
    
});

$(document).on('keyup','#local_ineventory_tcs_amt',function(e)
{ 
loadinvetntorytotal();
});

$(document).on('submit','#addinventoryform',function(e) 
{
   e.preventDefault();  
	
   var inventory_invoice_no=$("#inventory_invoice_no").val();
   var inventorysupliercode=$("#inventorysupliercode").val();
   var inventorydate=$("#inven_date").val();
   var ineventory_paid_amt=$("#local_ineventory_paid_amt").val();
   var ineventory_grand_total=$("#ineventory_grand_total").val();    
    
    
    
   var a=1;
    
   if(inventory_invoice_no == '')
   {
    alert('Please Enter Invoice Number');    
    return false;   
    }
    
   if(inventorysupliercode == '')
   {
    alert('Please Enter Supplier No');    
    return false;   
    }
    
   
   if(local_ineventory_paid_amt == '')
   {
    
        local_ineventory_paid_amt=0;
        
    }
     
    var formData = new FormData(this);

    formData.append('inventory_invoice_no',inventory_invoice_no);
    formData.append('inventorysupliercode',inventorysupliercode);
    formData.append('inventorydate',inventorydate);
    formData.append('ineventory_paid_amt',ineventory_paid_amt);
    formData.append('ineventory_grand_total',ineventory_grand_total);  
    

         $.ajax({
            type: 'POST',
            url: 'action.php',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
	    $("#display_inventory_all").html(data);
            },
	 
        }); 
});

$(document).on('click','.clickdeleteinventory',function() 
{

if(confirm("Are You Confirm"))  
{
var inventoryremovegetid=$(this).attr("removecusid");


$.ajax({
url:'action.php',
type:'POST',
data:{inventoryremovegetid:inventoryremovegetid},
success:function(data){
$("#deletecusid").html(data);
}
});
}

});

$(document).on('click','.removeinventoryrowid',function() 
{
	
	   var removeinventoryvalrowid=$(this).attr("id");
	
	   $(this).closest("tr").remove();
	
	
	   $.ajax({
					url:'action.php',
					type:'POST',
					data:{removeinventoryvalrowid:removeinventoryvalrowid},
					success:function(data){
					$("#displayinventory").html(data);
					}
					});
	
	
	
});


$(document).on('submit','#updateinventoryform',function(e) 
{
   e.preventDefault();  
	
   var inventory_invoice_no=$("#inventory_invoice_no").val();
   var inventorysupliercode=$("#inventorysupliercode").val();
   var inventorydate=$("#inven_date").val();
   var ineventory_paid_amt=$("#local_ineventory_paid_amt").val();
   var ineventory_grand_total=$("#ineventory_grand_total").val();    
   var inventoryupdateid=$("#inventoryupdateid").val(); 
    
    
   var a=1;
    
   if(inventory_invoice_no == '')
   {
    alert('Please Enter Invoice Number');    
    return false;   
    }
    
   if(inventorysupliercode == '')
   {
    alert('Please Enter Supplier No');    
    return false;   
    }
    
   if(local_ineventory_paid_amt == '')
   {
    
        local_ineventory_paid_amt=0;
        
    }
     
    var formData = new FormData(this);

    formData.append('uinventory_invoice_no',inventory_invoice_no);
    formData.append('uinventorysupliercode',inventorysupliercode);
    formData.append('uinventorydate',inventorydate);
    formData.append('uineventory_paid_amt',ineventory_paid_amt);
    formData.append('uineventory_grand_total',ineventory_grand_total);
	   formData.append('uinventoryupdateid',inventoryupdateid);
    

         $.ajax({
            type: 'POST',
            url: 'action.php',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
	    $("#display_inventory_all").html(data);
            },
	 
        }); 
});









function changelocalsupliernum()
{
        var inventorysupliercode=$("#inventorysupliercode").val();
        
        if(inventorysupliercode != '')
        {    
        $.ajax({
            url:'action.php',
            type:'POST',
            data:{inventorysupliercode:inventorysupliercode},
            success:function(data){
                $("#display_inventory_all").html(data);
            }
        });
        }
    }


function inventorytotal(i)
{
  var inventorytotalrowid=parseInt(i);
    
    
  if(inventorytotalrowid != '')
  {  
  
    var inventory_price=$("#price"+inventorytotalrowid).val(); 
    var inventory_gst=$("#gst"+inventorytotalrowid).val();
    var inventory_qty=$("#qty"+inventorytotalrowid).val();
 
      
    if(inventory_price == '')
    {
       return false;
    }
       
    if(inventory_gst == '')
    {
       return false;
    }
			
			 if(inventory_qty == '')
    {
       return false;
    }

   $.ajax({
        url:'action.php',
        type:'POST',
        data:{inventorytotalrowid:inventorytotalrowid,inventory_price:inventory_price,inventory_gst:inventory_gst,inventory_qty:inventory_qty},
        success:function(data)
				    {
            $("#display_inventory_all").html(data);
        }
    });      
      
  }
    
}


function loadinvetntorytotal()
{
  
    var loadinvetntorytotal=1;
    
     $.ajax({
        url:'action.php',
        type:'POST',
        data:{loadinvetntorytotal:loadinvetntorytotal},
        success:function(data){
            $("#displayinventory").html(data);
        }
    }); 
}


