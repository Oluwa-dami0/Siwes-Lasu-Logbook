<?php
   include("student_auth.php");
   require_once "conn.php";

   $matric_no = $_SESSION["matric_no"];

?>

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
 
   <meta name="theme-name" content="logbook" />

   <link rel="preload" href="https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2" style="font-display: optional;">
   <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:600%7cOpen&#43;Sans&amp;display=swap" media="screen">

   <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
   <link rel="stylesheet" href="plugins/slick/slick.css">

   <link rel="stylesheet" href="dashboard.css">

   <link rel="shortcut icon" href="Lasu_logo.jpg" type="image/x-icon">
   <link rel="icon" href="Lasu_logo.jpg" type="image/x-icon">

   <style>
    #myTable {
        border-collapse: collapse;
        font-family: Arial, sans-serif;
        margin-top: 10px;
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
         <a href="./logout" style="margin-left:50px; width: 80px; font-size: 18px; font-weight:500; border: 1px solid black; padding: 5px 10px;">
            Logout</a>
      </nav>
   </div>
</header> 
<div style="margin-top: 30px;">
    <h3>Student Weekly Report</h3>
    <div 
        style="
            display: grid;
            grid-template-columns: 1fr 3fr; 
            grid-gap: 20px
        ">   
        <div class="weeks" style="border-right: 1px solid #ddd; padding-right: 20px;">
            <?php
                for ($i = 1; $i <= 12; $i++) {
                    echo "<div><a href='week?id=$i'>Week $i</a></div>";
                }
            ?>
        </div>
        <div>
            <h5>Comments</h5>
            <table border="2" style="border-collapse: collapse;font-family: Arial, sans-serif; width:80%">
                <thead style="background-color: #f2f2f2; color: #333; font-weight: bold;">
                    <tr>
                        <th style="padding: 8px; border: 1px solid #ddd;">Week</th>
                        <th style="padding: 8px; border: 1px solid #ddd;">Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $stmt = $conn->prepare("SELECT week, comment FROM comments WHERE matric_number = ?");
                        $stmt->bind_param("i", $matric_no);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['week']) . "</td>";
                            echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . htmlspecialchars($row['comment']) . "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
    