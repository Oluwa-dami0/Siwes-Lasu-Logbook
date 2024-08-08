<!DOCTYPE html>
<html lang="en">
<head>
<head>
   <meta charset="utf-8">
   <title>Logbook - Homepage</title>

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
   <link rel="stylesheet" href="supervisor.css">

   <!-- Main Stylesheet -->
   <link rel="stylesheet" href="style.css">

   <!--Favicon-->
   <link rel="shortcut icon" href="Lasu_logo.jpg" type="image/x-icon">
   <link rel="icon" href="Lasu_logo.jpg" type="image/x-icon">
</head>
</head>
<body>
    <header class="sticky-top bg-white border-bottom border-default">
    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-white">
            <a class="navbar-brand" href="">
                <img class="lasu-logo" width="75px" height="75px" src="Lasu_logo.jpg" alt="LogBook">
            </a> <h4>Student Industrial Work Experience Scheme Logbook</h4>
            <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
                <i class="ti-menu"></i>
            </button>
            <div class="nav-button">
                <button onclick="location.href='Homepage.php'">Home</button>
                <button onclick="location.href='Homepage.php'">Logout</button>
            </div>

            </div>
        </nav>
    </div>
    </header>

    <div class="report-container">
        <h4>
            Check Student Report
        </h4>
        <h6>Student matric number</h6>
        <span><input type="text"></span>

        <button class="fetch-report">Fetch Report</button>
    </div>
</body>
</html>