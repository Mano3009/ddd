$(document).ready(function(){
   $("input").attr("step","any"); 
   $("input").attr("autocomplete","off");     
});

$(document).on('submit','#loginform',function(e) 
{ 
 
  e.preventDefault();
	
	 var loginusername=$("#username").val();
  var loginpassword=$("#password").val();
	
	 if(loginusername == '')
		{
		alert('Please Enter Username');
		return false;	
		}
	
	 if(loginpassword == '')
		{
		alert('Please Enter Password');
		return false;	
		}

	
	 var formData = new FormData(this);

	 formData.append('loginusername',loginusername);
  formData.append('loginpassword',loginpassword);
	
	
				$.ajax({
				type: 'POST',
				url: 'action.php',
				data: formData,
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
				$("#displaylogin").html(data);
				},

				});

	
	
});



$(document).on('submit','#accountdetails',function(e) 
{ 

	 e.preventDefault();
	
  var auser_name=$("#auser_name").val();
  var apassword=$("#apassword").val();
	 var acompany_name=$("#acompany_name").val();
  var aphone=$("#aphone").val();
	 var aemail_id=$("#aemail_id").val();
  var agst_number=$("#agst_number").val();
	 var avillage_name=$("#avillage_name").val();
  var adistrict_name=$("#adistrict_name").val();
	 var astate=$("#astate").val();
  var apin_code=$("#apin_code").val();
	 var abank_name=$("#bank_name").val();
	 var abank_nameacno=$("#acno").val();
  var abank_nameifc_code=$("#ifc_code").val();

  if(auser_name == '')
		{
		alert('Please Enter Username');
		return false;	
		}
	
	 if(apassword == '')
		{
		alert('Please Enter Password');
		return false;	
		}


	 var formData = new FormData(this);

	 formData.append('auser_name',auser_name);
  formData.append('apassword',apassword);
	 formData.append('acompany_name',acompany_name);
  formData.append('aphone',aphone);
	 formData.append('aemail_id',aemail_id);
  formData.append('agst_number',agst_number);
	 formData.append('avillage_name',avillage_name);
  formData.append('adistrict_name',adistrict_name);
	 formData.append('astate',astate);
  formData.append('apin_code',apin_code);
	 formData.append('abank_name',abank_name);
	 formData.append('abank_nameacno',abank_nameacno);
  formData.append('abank_nameifc_code',abank_nameifc_code);
	
	
				$.ajax({
				type: 'POST',
				url: 'action.php',
				data: formData,
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
				$("#displayaccountdetailsupdate").html(data);
				},

				});
	

});

$(document).on('click','body',function(e) 
{
    $("input").attr("step","any");
    $("input").attr("autocomplete","off");  
});

		function tableToCSV() {

			// Variable to store the final csv data
			var csv_data = [];

			// Get each row data
			var rows = document.getElementsByTagName('tr');
			for (var i = 0; i < rows.length; i++) {

				// Get each column data
				var cols = rows[i].querySelectorAll('td,th');

				// Stores each csv row data
				var csvrow = [];
				for (var j = 0; j < cols.length; j++) {

					// Get the text data of each cell
					// of a row and push it to csvrow
					csvrow.push(cols[j].innerHTML);
				}

				// Combine each column value with comma
				csv_data.push(csvrow.join(","));
			}

			// Combine each row data with new line character
			csv_data = csv_data.join('\n');

			// Call this function to download csv file
			downloadCSVFile(csv_data);

		}

		function downloadCSVFile(csv_data) {

			// Create CSV file object and feed
			// our csv_data into it
			CSVFile = new Blob([csv_data], {
				type: "text/csv"
			});

			// Create to temporary link to initiate
			// download process
			var temp_link = document.createElement('a');

			// Download csv file
			temp_link.download = "GfG.csv";
			var url = window.URL.createObjectURL(CSVFile);
			temp_link.href = url;

			// This link should not be displayed
			temp_link.style.display = "none";
			document.body.appendChild(temp_link);

			// Automatically click the link to
			// trigger download
			temp_link.click();
			document.body.removeChild(temp_link);
		}
