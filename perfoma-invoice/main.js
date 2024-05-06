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
	
$('#dynamic_field').append('<tr count="'+i+'" id="display_invoice'+i+'"><td><input type="text" placeholder="Part Description" class="form-control1" id="product_name" name="product_name[]"></td><td><input type="text" placeholder="HSN" class="form-control1" id="hsn" name="product_hsn[]"></td><td><input type="number" placeholder="Price" class="form-control1 changeinvoicecalculation" name="product_price[]" invoiceid="'+i+'" id="price'+i+'"></td><td><input type="number" placeholder="Qty" class="form-control1 changeinvoicecalculation" invoiceid="'+i+'" name="product_Qty[]" id="qty'+i+'"></td><td><input type="number" placeholder="GST" class="form-control1 changeinvoicecalculation" invoiceid="'+i+'" name="product_gst[]" id="gst'+i+'"></td><td><input type="number" placeholder="Total" class="form-control1" name="inven_total[]" id="totalinvoice'+i+'"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger removeinvoicerowval remove">X</button></td></tr>'); 	 
	
	
});


$(document).on('change','.changelocalcustomernum',function(e){  
changelocalcustomernum();
});

$(document).on('keyup','.changelocalcustomernum',function(e){     
changelocalcustomernum();
});


$(document).on('keyup','.changeinvoicecalculation',function(e)
{
	
   var invoicetotalid=$(this).attr("invoiceid");
	
	
    if(typeof invoicetotalid === 'undefined')
    {
        
    }
    else
    {
    loadinvoicealltotal(invoicetotalid);
    }
    
});



$(document).on('submit','#addperfomainvoiceform',function(e) 
{
   e.preventDefault();  
	
   var invoice_invoice_no=$("#invoice_invoice_no").val();
   var invoicecustomercode=$("#invoicecustomercode").val();
   var invoicedate=$("#inven_date").val();
   var invoice_grand_total=$("#invoice_grand_total").val();    
   var invoicetypename=$("#invoicetypename").val(); 
    
    
   var a=1;
    
   if(invoice_invoice_no == '')
   {
    alert('Please Enter Invoice Number');    
    return false;   
    }
    
   if(invoicecustomercode == '')
   {
    alert('Please Select Customer');    
    return false;   
    }
    
	if(invoicetypename == '')
   {
    
        alert('Please Enter Invoice Type');    
    return false;
        
    }

     
    var formData = new FormData(this);

    formData.append('invoice_invoice_no',invoice_invoice_no);
    formData.append('invoicecustomercode',invoicecustomercode);
    formData.append('invoicedate',invoicedate);
    formData.append('invoice_grand_total',invoice_grand_total);
	   formData.append('invoicetypename',invoicetypename);
    

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


$(document).on('click','.clickdeleteperfomainvoice',function() 
{

if(confirm("Are You Confirm"))  
{
var deleteperfomainvoicegetid=$(this).attr("removeid");


$.ajax({
url:'action.php',
type:'POST',
data:{deleteperfomainvoicegetid:deleteperfomainvoicegetid},
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


$(document).on('submit','#updateperfomainvoiceform',function(e) 
{
   e.preventDefault();  
	
   var invoice_invoice_no=$("#invoice_invoice_no").val();
   var invoicecustomercode=$("#invoicecustomercode").val();
   var invoicedate=$("#inven_date").val();
   var invoice_grand_total=$("#invoice_grand_total").val();
	  var invoice_update_id=$("#invoice_update_id").val();
	  var updateinvoicetypename=$("#updateinvoicetypename").val();
    
    
    
   var a=1;
    
   if(invoice_invoice_no == '')
   {
    alert('Please Enter Invoice Number');    
    return false;   
    }
    
   if(invoicecustomercode == '')
   {
    alert('Please Select Customer');    
    return false;   
    }
	
	  if(updateinvoicetypename == '')
   {
    alert('Please Enter Invoice Type');    
    return false;   
    }
    
     
    var formData = new FormData(this);

    formData.append('uinvoice_invoice_no',invoice_invoice_no);
    formData.append('uinvoicecustomercode',invoicecustomercode);
    formData.append('uinvoicedate',invoicedate);
    formData.append('uinvoice_grand_total',invoice_grand_total);
	   formData.append('uinvoice_update_id',invoice_update_id);  
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
  
	
			
    var invoice_price=$("#price"+invoicetotalrowid).val(); 
    var invoice_gst=$("#gst"+invoicetotalrowid).val();
    var invoice_qty=$("#qty"+invoicetotalrowid).val();

			
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
    
     $.ajax({
        url:'action.php',
        type:'POST',
        data:{loadinvoicetotal:loadinvoicetotal},
        success:function(data){
            $("#displayinvoice").html(data);
        }
    }); 
}

