<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>-logbook</title>
   <meta charset="utf-8">

   <!-- mobile responsive meta -->
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
   <meta name="description" content="This is meta description">
   <meta name="author" content="Themefisher">
 
   <!-- theme meta -->
   <meta name="theme-name" content="logbook" />

   <!-- plugins -->
   <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2" style="font-display: optional;">
   <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap" media="screen">

   <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
   <link rel="stylesheet" href="plugins/slick/slick.css">

   <!-- Main Stylesheet -->
   <link rel="stylesheet" href="e-logbook.css">

   <!--Favicon-->
   <link rel="shortcut icon" href="Lasu_logo.jpg" type="image/x-icon">
   <link rel="icon" href="Lasu_logo.jpg" type="image/x-icon">

   <style>
    /* Additional inline style for hiding the table initially */
    #myTable {
        display: none;
    }
</style>
</head>
<body>
<header class="sticky-top bg-white border-bottom border-default">
   <div class="container">

      <nav class="navbar navbar-expand-lg navbar-white">
         <a class="navbar-brand" href="">
            <img class="lasu-logo" width="75px" height="75px" src="Lasu_logo.jpg" alt="LogBook">
         </a> <h4>Student Industrial Work Experience Scheme Logbook</h4>
         <button onclick="location.href='Homepage.php'" style="float: right; width: 80px; font-size: 18px; font-weight:700;">
            Logout</button>
      </nav>
   </div>
</header> 
<h3> Student Weekly Report</h3>
<button onclick="toggleTable()">+ New Week</button>
<div id="reportSection">
            <h3>Submitted Report</h3>
            <table id="report">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Work Done</th>
                    </tr>
                </thead>
                <tbody id="reportBody">
                    <!-- Report data will be inserted here -->
                </tbody>
            </table>
        </div>
    </div>
<div class="table-container">
        <table id=myTable>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Work Done</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input  class="date-input" id="date" type="date" placeholder="Enter date"></td> 
                    <td><textarea name="Write Report" id="workDone" class="report" placeholder="Write report"></textarea></td>
                </tr>
                <tr>
                    <td><input  class="date-input" id="date" type="date" placeholder="Enter date"></td> 
                    <td><textarea name="Write Report" id="workDone" class="report" placeholder="Write report"></textarea></td>
                </tr>
                <tr>
                    <td><input  class="date-input" id="date" type="date" placeholder="Enter date"></td> 
                    <td><textarea name="Write Report" id="workDone" class="report" placeholder="Write report"></textarea></td>
                </tr>
                <tr>
                    <td><input  class="date-input" id="date" type="date" placeholder="Enter date"></td> 
                    <td><textarea name="Write Report" id="workDone" class="report" placeholder="Write report"></textarea></td>
                </tr>
                <tr>
                    <td><input  class="date-input" id="date" type="date" placeholder="Enter date"></td> 
                    <td><textarea name="Write Report" id="workDone" class="report" placeholder="Write report"></textarea></td>
                </tr>
                <tr>
                    <td><input  class="date-input" id="date" type="date" placeholder="Enter date"></td> 
                    <td><textarea name="Write Report" id="workDone" class="report" placeholder="Write report"></textarea></td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
</div>
<form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileUpload" style="margin: auto 50px">
        <input type="submit" value="Upload File" name="submit" id="fileupload">
    </form>
    <button class="submit" onclick="returnTable">Submit</button>
    <div class="subimtted-report"> </div> 

    <?php /*

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Check if file was uploaded without errors
    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
        $file_name = basename($_FILES["fileToUpload"]["name"]);
        $target_dir = "uploads/"; // Directory where files will be uploaded
        $target_file = $target_dir . $file_name;
        $uploadOk = true;
        
        // Check file size (optional)
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = false;
        }
        // If $uploadOk is set to false, display error
        if (!$uploadOk) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // If everything is ok, try to upload file
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars($file_name) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "No file uploaded or file upload error occurred.";
    }
}*/
?>


    <script>
        function toggleTable() {
            var table = document.getElementById("myTable");
            var button = document.querySelector("button");

            if (table.style.display === "none") {
                table.style.display = "table";
                button.textContent = "Hide Table";
            } else {
                table.style.display = "none";
                button.textContent = "+ New Week";
            }
        }

        document.getElementById("myTable").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent default form submission

            // Get form values
            var date = document.getElementById("date").value;
            var workDone = document.getElementById("workDone").value;

            // Display submitted report
            var reportTable = document.getElementById("reportBody");
            var newRow = reportTable.insertRow();

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);

            cell1.textContent = date;
            cell2.textContent = workDone;

            // Show the report section
            document.getElementById("reportSection").style.display = "block";

            // Clear form fields
            document.getElementById("myTable").reset();
        });

        /*function clearTableInputs() {
            var tableRows = document.getElementById("myTable").rows;

            for (var i = 1; i < tableRows.length; i++) { // Start from index 1 to skip header row
                tableRows[i].cells[0].querySelector("input.date-input").value = "";
                tableRows[i].cells[1].querySelector("textarea.report").value = "";
            }
        }*/
    </script>
</body>
</html>

    