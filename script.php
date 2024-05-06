    <!-- jquery 3.3.1 -->
    <script src="<?php echo $baseurl; ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="<?php echo $baseurl; ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="<?php echo $baseurl; ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- main js -->
    <script src="<?php echo $baseurl; ?>assets/libs/js/main-js.js"></script>
    <!-- chart chartist js -->
    <script src="<?php echo $baseurl; ?>assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <!-- sparkline js -->
    <script src="<?php echo $baseurl; ?>assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- morris js -->
    <script src="<?php echo $baseurl; ?>assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="<?php echo $baseurl; ?>assets/vendor/charts/morris-bundle/morris.js"></script>
    <!-- chart c3 js -->
    <script src="<?php echo $baseurl; ?>assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="<?php echo $baseurl; ?>assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="<?php echo $baseurl; ?>assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="<?php echo $baseurl; ?>assets/libs/js/dashboard-ecommerce.js"></script>
<script src="<?php echo $baseurl; ?>main.js"></script>



<script src="<?php echo $baseurl; ?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo $baseurl; ?>assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>




<script type="text/javascript">
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
	</script>