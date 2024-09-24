<?php
$request = $_SERVER['REQUEST_URI'];
$path = trim(parse_url($request, PHP_URL_PATH), '/');
$segments = explode('/', $path);

// Handle the route
switch($segments[0]) {
    case 'week':
        if(isset($segments[1])) {
            $weekId = $segments[1];
            include 'week.php';
        } else {

        }
        break;
    default:
<<<<<<< HEAD
        // Handle 404 or home page
        //include '404.php';
=======
>>>>>>> 4d2d10f1830f56e7064518369b3ccbf808deebd8
        break;
}
 ?>

<!DOCTYPE html>
<html lang="en-us">

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

   <!-- Main Stylesheet -->
   <link rel="stylesheet" href="style.css">

   <!--Favicon-->
   <link rel="shortcut icon" href="Lasu_logo.jpg" type="image/x-icon">
   <link rel="icon" href="Lasu_logo.jpg" type="image/x-icon">
</head>

<body>
<!-- navigation -->
<header class="sticky-top bg-white border-bottom border-default">
   <div class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-white">
         <a class="navbar-brand" href="">
            <img class="lasu-logo" width="65px" height="65px" src="Lasu_logo.jpg" alt="LogBook">
         </a> <h5>Student Industrial Work Experience Scheme Logbook</h5>
         <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navigation">
            <i class="ti-menu"></i>
         </button>
        <div class="nav-button ml-auto">
            <a href="./" class="btn btn-primary">Home</a>
            <div class="nav-button ml-auto">
        <div>
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Register
          </button>
          <ul class="dropdown-menu dropdown-menu-right" style="right: 100px; background-color: #fffff0;">
            <li>
               <a class="dropdown-item" href="./register?type=student">Student</a>
            </li>
            <li>
               <a class="dropdown-item" href="./register?type=supervisor">Supervisor</a>
            </li>
          </ul>
        </div>
        <div>
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Login
          </button>
          <ul class="dropdown-menu dropdown-menu-right" style="background-color: #fffff0;">
            <ul>
               <a class="dropdown-item" href="./login">Student</a>
            </ul>
            <ul>
               <a class="dropdown-item" href="./supervisor_login">Supervisor</a>
            </ul>
          </ul>
        </div>
      </div>
        </div>

         </div>
      </nav>
   </div>
</header>
<!-- /navigation -->

<section class="section">
	<div class="container">
		<div class="row">
			<div class="col-lg-8  mb-5 mb-lg-0">
				<article class="row mb-5">
					<div class="col-12">
						<div class="about-lasu-img" style="margin-bottom: 550px; width: 600px; height:r600px;">
							<img  src="Lasu_logo.jpg" class="img-fluid" alt="">
						</div>
					</div>
					<div class="col-12 mx-auto">
						<h3 class="about-lasu">About Lagos State University.</h3>
						<p>Established in 1983, Lagos State University is a public university in Nigeria, operating 
                            three major campuses, namely: Ojo, Ikeja and Epa. As the only state university in Lagos 
                            State, the non-residential university has over 35,000 students enrolled full time in courses
                            at diploma, undergraduate and postgraduate levels. The Ojo campus is the main campus and 
                            the location of the central administration. It houses the faculties of arts, education, law,
                            management sciences, science and social sciences, school of transport, school of communication,
                            centre for environment studies and sustainable development, centre for general Nigerian studies,
                            centre for planning studies, information and communication technology centre, online and distance
                            learning and research institute and centre for entrepreneurial studies. The Lagos State University
                            Epe campus, a fully residential campus on a former military barrack, is even larger than the main 
                            campus. It is home to the faculty of engineering, the school of agriculture and the institute for 
                            organic agriculture and green economy. The faculty of engineering includes four departments, namely
                            mechanical engineering, electronic and computer engineering, chemical and polymer engineering, 
                            and aeronautic engineering. The administrative structure of the university has been built on a 
                            network including the registry, academic planning unit, general administration, academic and 
                            students affairs, senior staff establishment and welfare, junior staff establishment and training. 
                            The Latin motto, Per la verità e di servizio, translates to "For Truth and Service". </p> 
                            <a href="https://lasu.edu.ng/home/" target="_blank" class="btn btn-outline-primary">Continue Reading</a>
					</div>
				</article>
				<article class="row mb-5">
					<div class="col-12">
						<div class="about-siwes-img">
							<img src="siwes_logbook.jpg" class="img-fluid" alt="" style="height: 500px;">
						</div>
					</div>
					<div class="col-12 mx-auto">
						<h3>About SIWES</h3>
						<p>S.I.W.E.S. (Students Industrial Work Experience Scheme) is an industrial training program for
                            undergraduate students at Nigerian universities and other higher educational institutions. It is a 
                            six-month training arrangement in which students are attached to industries that are appropriate to 
                            their field of study. The Industrial Training Fund (ITF) is the body accountable for the 
                            synchronization and backing of the program
                        </p> <a href="https://siwes.itf.gov.ng/Identity/LandingPage/siwes" target="_blank" class="btn btn-outline-primary">Continue Reading</a>
					</div>
				</article>
			</div>
			<aside class="col-lg-4">
				   <!-- Search -->
   <div class="widget">
      <h5 class="widget-title"><span>Search</span></h5>
      <form action="/logbook-hugo/search" class="widget-search">
         <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
         <button type="submit"><i class="ti-search"></i>
         </button>
      </form>
   </div>
   <!-- categories -->
   <div class="widget">
      <h5 class="widget-title"><span>Categories</span></h5>
      <ul class="list-unstyled widget-list">
         <li><a href="e-logbook.php" class="d-flex">Student</a>
         </li>
         <li><a href="supervisor.php" class="d-flex">School Supervisor</a>
         </li>
         <li><a href="#!" class="d-flex">Submitted Report</a>
         </li>
      </ul>
   </div>
			</aside>
		</div>
	</div>
</section>

<footer class="footer">
       <p>Copyright © 2024 Lagos State University. All rights reserved.</p>
   </footer>

   


   <!-- JS Plugins -->
   <script src="plugins/jQuery/jquery.min.js"></script>
   <script src="plugins/bootstrap/bootstrap.min.js" async></script>
   <script src="plugins/slick/slick.min.js"></script>

   <!-- Main Script -->
   <script src="js/script.js"></script>
</body>
</html>
