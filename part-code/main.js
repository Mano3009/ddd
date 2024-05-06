$(document).on('click','#add_partcode',function(e)
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
    
    $('#dynamic_field').append('<tr id="display_partcode1" count="1"><td><input type="text" placeholder="Part Code" class="form-control2 changepartcode partcolor1" name="part_code[]" upid="1"></td><td><input type="text" placeholder="Part Name" class="form-control2" name="part_name[]"></td><td><input type="text" placeholder="Unit" class="form-control2" name="part_unit[]"></td><td><input type="text" placeholder="Unit Type" class="form-control2" name="part_unittype[]" list="unittype"></td><td><input type="text" placeholder="Category" class="form-control2" name="part_category[]"></td><td><input type="number" placeholder="Price" class="form-control2" name="part_price[]"></td><td><input type="number" placeholder="Selling Price" class="form-control2" name="part_selling_price[]"></td><td><input type="number" placeholder="GST" class="form-control2" name="part_gst[]"></td><td><input type="text" placeholder="HSN" class="form-control2" name="part_hsn[]"></td><td><input type="date"  class="form-control2" name="part_date[]"></td><td><button type="button" name="remove" id="1" class="btn btn-danger removenewpartcode remove">X</button></td></tr>'); 
         
    });



$(document).on('click', '.removenewpartcode', function()
{
   
    
$(this).closest("tr").remove();    
    
    
});


$(document).on('submit','#partcodeaddform', function(e)
{
    e.preventDefault();
	  
    var addpartcode=1;
    
    var formData = new FormData(this);
	
   formData.append('addpartcode',addpartcode);
    
    $.ajax({
            type: 'POST',
            url: 'action.php',
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
	    $("#add_product_all").html(data);
            },
	 
        });
    
});



$(document).on('click','.clickdeleteproductdetails',function(e) 
{
		
    if(confirm("Are You Confirm"))    
    {    
       var clickdeleteproductdetailsremoveid=$(this).attr("removeid");
        
        
           $.ajax({
            url:'action.php',
            type:'POST',
            data:{clickdeleteproductdetailsremoveid:clickdeleteproductdetailsremoveid},
            success:function(data){
                $("#deleteproductid").html(data);
            }
        });
    }   
    });



$(document).on('submit','#updateproductdetails', function(e)
{
e.preventDefault();

	
var productdetailscode=$("#productdetailscode").val();
var productdetailsname=$("#productdetailsname").val();
var productdetailsunit=$("#productdetailsunit").val();
var productdetailunittype=$("#suplier_unittype").val();
var productdetailscategory=$("#category").val();
var productdetailsprice=$("#price").val();
var productdetailssellingprice=$("#sellingprice").val();
var productdetailsgst=$("#productdetailsgst").val();
var productdetailshsn=$("#hsn").val(); 
var productdetailsdate=$("#date").val();
var productdetailsuid=$("#productdetailsuid").val();	
           

if(productdetailscode == '')
{
alert('Please Enter Product Code');
return false;
}
    
if(productdetailsname == '')
{
alert('Please Enter Product Name');
return false;
}

if(productdetailsdate == '')
{
alert('Please Enter Product Date');
return false;
}
 
 
$.ajax({
url:'action.php',
type:'POST',
data:{uproductdetailscode:productdetailscode,uproductdetailsname:productdetailsname,uproductdetailsunit:productdetailsunit,uproductdetailunittype:productdetailunittype,uproductdetailscategory:productdetailscategory,uproductdetailsprice:productdetailsprice,uproductdetailssellingprice:productdetailssellingprice,uproductdetailsgst:productdetailsgst,uproductdetailshsn:productdetailshsn,uproductdetailsdate:productdetailsdate,uproductdetailsuid:productdetailsuid},
   success:function(data)
{
$("#update_product_details").html(data);

}

});


});
