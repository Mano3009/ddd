$(document).on('click','#addinvoicerowid',function(e)
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
	
$('#dynamic_field').append('<tr count="'+i+'" id="display_invoice'+i+'"><td><input list="part_code" type="text" placeholder="Part No" class="form-control1 changelocalinvoicepartcode" changeid="'+i+'" name="product_code[]" id="invoice_part_code'+i+'"></td><td id="display_inven_invno'+i+'"></td><td><input list="part_name" type="text" placeholder="Part Description" class="form-control1" id="product_name" name="product_name[]"></td><td><input type="text" placeholder="Unit" class="form-control1" id="hsn" name="product_unit[]"></td><td><input type="text" placeholder="Unit Type" class="form-control1" name="product_unittype[]"></td><td><input type="text" placeholder="Category" class="form-control1" name="product_category[]"></td><td><input type="text" placeholder="Price" class="form-control1" name="product_price[]"></td><td><input type="text" placeholder="Selling Price" class="form-control1" name="product_selling_price[]" invgetid="1"></td><td><input type="text" placeholder="Gst" class="form-control1" name="product_gst[]"></td><td><input type="number placeholder="Qty" class="form-control1" name="inven_hsn[]"></td><td><input type="number placeholder="Qty" class="form-control1" name="inven_hsn[]"></td><td><input type="text" placeholder="HSN" class="form-control1" name="inven_hsn[]"></td><td><input type="number" placeholder="Total" class="form-control1" name="inven_total[]"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger remove_local_invoiceory remove">X</button></td></tr>'); 	 
	
	
});


$(document).on('change','.changelocalcustomernum',function(e){  
changelocalcustomernum();
});

$(document).on('keyup','.changelocalcustomernum',function(e){     
changelocalcustomernum();
});

$(document).on('change','.changelocalinvoicepartcode',function()
{
    var invoice_changepartid=''; 
    var invoice_code=$(this).val();
    var invoice_changecodeid=$(this).attr("changeid");
    
    invoice_changepartid=$('#part_code option').filter(function() {
    return this.value == invoice_code;
    }).data('proid');
    
    if(typeof invoice_changepartid !== 'undefined')
    {
      invoice_changepartid='';  
    }
    
    
    $.ajax({
            url:'action.php',
            type:'POST',
            data:{invoiceproductcode:invoice_code,invoiceproductchangecoderowid:invoice_changecodeid,invoiceproductchangepartid:invoice_changepartid},
            success:function(data){
         $("#display_inven_invno"+invoice_changecodeid).html(data);
            }
        });
});

$(document).on('keyup','.changeinvoicecalculation',function(e)
{
	
   var invoicetotalid=$(this).attr("invoiceid");
	
    loadinvoicealltotal(invoicetotalid);  
	
    

    
});

$(document).on('keyup','.changeoverallinvoicecal',function(e)
{ 
loadinvoicetotal();
});

$(document).on('submit','#addinvoiceform',function(e) 
{
   e.preventDefault();  
	
   var invoice_invoice_no=$("#invoice_invoice_no").val();
   var invoicecustomername=$("#invoicecustomername").val();
   var invoicecustomervehiclenumber=$("#invoicecustomervehiclenumber").val();    
   var invoicedate=$("#inven_date").val();
   var invoice_grand_total=$("#invoice_grand_total").val();
   var invoice_paid_amt=$("#invoice_paid_amt").val();    
   var invoicetypename=$("#invoicetypename").val();
       
   var invoice_overall_discount_amount=$("#invoice_overall_discount_amount").val();    
    
    
   var a=1;
    
   if(invoice_invoice_no == '')
   {
    alert('Please Enter Invoice Number');    
    return false;   
    }
    
   if(invoicecustomername == '')
   {
    alert('Please Select Customer');    
    return false;   
    }
    
   if(invoicetypename == '')
   {
    
        alert('Please Enter Invoice Type');    
    return false;
        
    }
    
   if(invoice_overall_discount_amount == '')
   {
    
        alert('Please Enter Discount Amount');    
    return false;
        
    }
   
   if(invoice_paid_amt == '')
   {
    
        invoice_paid_amt=0;
        
    }   
    
    
    var invoicecustomernamevalid=$('#listcustomername option').filter(function() {
            return this.value == invoicecustomername;
            }).data('cusid');
    
     
    var formData = new FormData(this);

    formData.append('invoice_invoice_no',invoice_invoice_no);
    formData.append('invoicecustomercode',invoicecustomernamevalid);
    formData.append('invoicedate',invoicedate);
    formData.append('invoice_grand_total',invoice_grand_total);
    formData.append('invoice_paid_amt',invoice_paid_amt);
formData.append('addinvoicecustomervehiclenumber',invoicecustomervehiclenumber);
    formData.append('invoicetypename',invoicetypename);
    formData.append('addinvoice_overall_discount_amount',invoice_overall_discount_amount);
    

         $.ajax({
            type: 'POST',
            url: 'action.php',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
	    $("#display_invoice_all").html(data);
            },
	 
        }); 
});

$(document).on('click','.clickdeleteinvoiceory',function() 
{

if(confirm("Are You Confirm"))  
{
var invoiceoryremovegetid=$(this).attr("removecusid");


$.ajax({
url:'action.php',
type:'POST',
data:{invoiceoryremovegetid:invoiceoryremovegetid},
success:function(data){
$("#deletecusid").html(data);
}
});
}

});

$(document).on('change','.change_invoice_no',function() {
    
        var getinvoice_no=$(this).val();
        var invoicerowid=$(this).attr("changeid");
        var invoicepartcode=$('#invoice_part_code'+invoicerowid+'').val();
    
        
        if(getinvoice_no == '')
        {
            return false;
        }
	
        var invoiceinvid=$('#inven_invno'+invoicerowid+' option').filter(function() {
        return this.value == getinvoice_no;
        }).data('invid');
        
        
        
        $.ajax({
                url:'action.php',
                type:'POST',
                data:{getinvoice_no:getinvoice_no,invoicerowid:invoicerowid,invoicepartcode:invoicepartcode,invoiceinvid:invoiceinvid},
                success:function(data){
                    $("#display_invoice"+invoicerowid).html(data);
                }
            });
        
    });
    
$(document).on('click','.removeinvoicerowval',function() 
{
	
	   var removeinvoicerowvalid=$(this).attr("id");
	
	   $(this).closest("tr").remove();
	
	
	   $.ajax({
					url:'action.php',
					type:'POST',
					data:{removeinvoicerowvalid:removeinvoicerowvalid},
					success:function(data){
					$("#displayinvoice").html(data);
					}
					});
	
	
	
});

$(document).on('submit','#updateinvoiceform',function(e) 
{
   e.preventDefault();  
	
   var invoice_invoice_no=$("#invoice_invoice_no").val();
   var invoicecustomername=$("#invoicecustomername").val();
   var invoicecustomervehiclenumber=$("#invoicecustomervehiclenumber").val();    
   var invoicedate=$("#inven_date").val();
   var invoice_grand_total=$("#invoice_grand_total").val();
   var invoice_paid_amt=$("#invoice_paid_amt").val();
   var invoice_update_id=$("#invoice_update_id").val();
   var updateinvoicetypename=$("#updateinvoicetypename").val();
    
     
   var invoice_overall_discount_amount=$("#invoice_overall_discount_amount").val(); 
    
    
   var a=1;
    
   if(invoice_invoice_no == '')
   {
    alert('Please Enter Invoice Number');    
    return false;   
    }
    
   if(invoicecustomername == '')
   {
    alert('Please Select Customer');    
    return false;   
    }
	
   if(updateinvoicetypename == '')
   {
    alert('Please Enter Invoice Type');    
    return false;   
    }
    
    
   if(invoice_overall_discount_amount == '')
   {
    
        alert('Please Enter Discount Amount');    
    return false;
        
    }
       
   
   if(invoice_paid_amt == '')
   {
    
        invoice_paid_amt=0;
        
    }
    
   var invoicecustomernamevalid=$('#listcustomername option').filter(function() {
            return this.value == invoicecustomername;
            }).data('cusid');    
     
    var formData = new FormData(this);

    formData.append('uinvoice_invoice_no',invoice_invoice_no);
    formData.append('uinvoicecustomercode',invoicecustomernamevalid);
    formData.append('uinvoicecustomervehiclenumber',invoicecustomervehiclenumber);
    formData.append('uinvoicedate',invoicedate);
    formData.append('uinvoice_grand_total',invoice_grand_total);
    formData.append('uinvoice_paid_amt',invoice_paid_amt);  
    formData.append('uinvoice_update_id',invoice_update_id);  
	formData.append('updatediscount_amount',invoice_overall_discount_amount); 
	formData.append('updateinvoicetypename',updateinvoicetypename); 
    

         $.ajax({
            type: 'POST',
            url: 'action.php',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
	    $("#display_invoice_all").html(data);
            },
	 
        }); 
});

$(document).on('change','.changeinvoicecustomervehiclenumber',function()
{
    
    changeinvoicecustomervehiclenumber();

	
	
});

$(document).on('keyup','.changeinvoicecustomervehiclenumber',function()
{
    
    changeinvoicecustomervehiclenumber();

	
	
});

$(document).on('change','.changelocalcustomername',function()
{
    
    changeinvoicecustomername();

	
	
});


$(document).on('keyup','.changelocalcustomername',function()
{
    
    changeinvoicecustomername();

	
	
});



$(document).on('click','#addinvoicerowlabourid',function(e)
{
e.preventDefault();   
	
var count=$("#dynamic_labour tr").last().length;	
	
	if(count == '0')
	{
	var n=0;
	}
	else
	{
	var n=$("#dynamic_labour tr").last().attr("count");
	}	
	
var m=1;
var i= parseInt(m, 10) + parseInt(n, 10);
	
$('#dynamic_labour').append('<tr count="'+i+'" id="display_labour_invoice'+i+'"><td><input type="text" placeholder="Labour Name" class="form-control1" name="labourname[]" step="any" autocomplete="off"></td><td><input type="text" placeholder="Description" class="form-control1" name="productdescription[]" step="any" autocomplete="off"></td><td><input type="number" placeholder="Cost" class="form-control1 changelabourproductcost" name="productcost[]" step="any" autocomplete="off" id="productcost'+i+'" changeid="'+i+'"></td><td><input type="number" placeholder="GST" class="form-control1 changelabourproductcost" name="productgst[]" step="any" autocomplete="off" id="productgst'+i+'" changeid="'+i+'"></td><td><input type="number" placeholder="Total" class="form-control1" name="invenlabourtotal[]" id="producttotal'+i+'" step="any" autocomplete="off"></td><td><button type="button" name="remove" id="1" class="btn btn-danger removeinvoiceadisinalcostrowval remove">X</button></td></tr>');
    
});



$(document).on('keyup','.changelabourproductcost',function(e)
{
	
   var labourproductchangeid=$(this).attr("changeid");
	
	
     loadlabourinvoicealltotal(labourproductchangeid);
    
});


$(document).on('keyup','.changeinvoicejobcardnumber',function(e)
{	
     loadinvoicejobcardnumber();
    
});

$(document).on('change','.changeinvoicejobcardnumber',function(e)
{

     loadinvoicejobcardnumber();
    
});







function loadinvoicejobcardnumber()
{
    var invoicecustomerjobcardnumber=$("#invoicecustomerjobcardnumber").val();
    
    if(invoicecustomerjobcardnumber != '')
    {  
            
     var invoicecustomerjobcardnumberid=$('#listcustomerjobcardnumber option').filter(function() {
            return this.value == invoicecustomerjobcardnumber;
     }).data('cusid');
           
        
        if(typeof invoicecustomerjobcardnumberid !== 'undefined')
        {        
            
        $.ajax({
            url:'action.php',
            type:'POST',
            data:{invoicecustomerjobcardnumberid:invoicecustomerjobcardnumberid},
            success:function(data){
                $("#display_invoice_all").html(data);
            }
        });
            
        }
        
            
        }
    
    
}

function loadlabourinvoicealltotal(i)
{
    
    var labourinvoicealltotalid=parseInt(i);
 
 
    
  if(labourinvoicealltotalid != '')
  {  
  
    var labourinvoice_price=$("#productcost"+labourinvoicealltotalid).val(); 
    var labourinvoice_gst=$("#productgst"+labourinvoicealltotalid).val();
	
			 
			
    if(labourinvoice_price == '')
    {
       return false;
    }
       
    if(labourinvoice_gst == '')
    {
       return false;
    }
			

   $.ajax({
        url:'action.php',
        type:'POST',
        data:{labourinvoice_price:labourinvoice_price,labourinvoice_gst:labourinvoice_gst,labourinvoicealltotalid:labourinvoicealltotalid},
        success:function(data)
        {
            $("#displayinvoice").html(data);
        }
    });      
      
  }
    
}


function changeinvoicecustomername()
{
    
    var invoicecustomernameval=$("#invoicecustomername").val();
    
    if(invoicecustomernameval != '')
    {  
            
            var invoicecustomernamevalid=$('#listcustomername option').filter(function() {
            return this.value == invoicecustomernameval;
            }).data('cusid');
           
        
        if(typeof invoicecustomernamevalid !== 'undefined')
        {       
            
        $.ajax({
            url:'action.php',
            type:'POST',
            data:{invoicecustomernamevalid:invoicecustomernamevalid},
            success:function(data){
                $("#listcustomervehiclenumber").html(data);
            }
        });
            
        }
        
            
        }
    
}



function changeinvoicecustomervehiclenumber()
{
    
    var invoicecustomervehiclenumberval=$("#invoicecustomervehiclenumber").val();
        
    
    if(invoicecustomervehiclenumberval != '')
    {  
            
            var invoicecustomervehiclenumberid=$('#listcustomervehiclenumber option').filter(function() {
            return this.value == invoicecustomervehiclenumberval;
            }).data('cusid');
           
            
        if(typeof invoicecustomervehiclenumberid !== 'undefined')
        {  
            
        $.ajax({
            url:'action.php',
            type:'POST',
            data:{invoicecustomervehiclenumberid:invoicecustomervehiclenumberid},
            success:function(data){
                $("#display_invoice_all").html(data);
            }
        });

        }
        
        }
    
}


function changelocalcustomernum()
{
        var invoicecustomercode=$("#invoicecustomercode").val();
        
        if(invoicecustomercode != '')
        {    
        $.ajax({
            url:'action.php',
            type:'POST',
            data:{invoicecustomercode:invoicecustomercode},
            success:function(data){
                $("#displayinvoice").html(data);
            }
        });
        }
    }


function loadinvoicealltotal(i)
{
  var invoicetotalrowid=parseInt(i);
 
    
  if(invoicetotalrowid != '')
  {  
  
	
			
    var invoice_price=$("#sellingprice"+invoicetotalrowid).val(); 
    var invoice_gst=$("#gst"+invoicetotalrowid).val();
    var invoice_qty=$("#qty"+invoicetotalrowid).val();
var invoice_inventory_qty=$("#inventoryqty"+invoicetotalrowid).val();
	
			 
			
    if(invoice_price == '')
    {
       return false;
    }
       
    if(invoice_gst == '')
    {
       return false;
    }
			
			 if(invoice_qty == '')
    {
       return false;
    }
			
			 invoice_qty=parseInt(invoice_qty, 10);
			 invoice_inventory_qty=parseInt(invoice_inventory_qty, 10);
			
			 if(invoice_inventory_qty<invoice_qty)
				{
					
					$("#qty"+invoicetotalrowid).css({"background-color":"red","color":"#ffffff"});
					$(".invoicesubmit").attr({"type": "button"});
					return false;
					
				}
			 else
				{
				
					$("#qty"+invoicetotalrowid).css({"background-color":"#ffffff","color":"#71748d"});
					$(".invoicesubmit").attr({"type": "submit"});
					
				}
			

   $.ajax({
        url:'action.php',
        type:'POST',
        data:{invoicetotalrowid:invoicetotalrowid,invoice_price:invoice_price,invoice_gst:invoice_gst,invoice_qty:invoice_qty},
        success:function(data)
				    {
            $("#displayinvoice").html(data);
        }
    });      
      
  }
    
}


function loadinvoicetotal()
{
    
    var loadinvoicetotal=1;
    
    var invoice_overall_discount_amount=$("#invoice_overall_discount_amount").val();
    
    
     $.ajax({
        url:'action.php',
        type:'POST',
        data:{loadinvoicetotal:loadinvoicetotal,invoice_overall_discount_amount:invoice_overall_discount_amount},
        success:function(data){
            $("#displayinvoice").html(data);
        }
    }); 
}

