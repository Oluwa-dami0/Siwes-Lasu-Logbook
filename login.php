<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">

    <!--Favicon-->
   <link rel="shortcut icon" href="Lasu_logo.jpg" type="image/x-icon">
   <link rel="icon" href="Lasu_logo.jpg" type="image/x-icon">
    <title>Siwes Logbook Login</title>
</head>
<body>
<div class="login-container supervisor-login">
        <h2> Supervisor Login</h2>
        <form id="supervisor-login">
            <div class="form-group">
                <label for="number">PF-Number</label>
                <input type="number" id="number" name="PF-number" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <a href="" class="forget-password"><p>Forgot password?</p></a>
            <button type="submit" onclick="goToPage2()">Login</button>
        </form>
    </div> 
<div class="login-container student-login">
        <h2>Student Login</h2>
        <form id="login-form">
            <div class="form-group">
                <label for="number">Matric number</label>
                <input type="number" id="number" name="matric-number" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <a href="" class="forget-password"><p>Forgot password?</p></a>
            <button type="submit" onclick="goToPage1()" id="login" >Login</button>
        </form>
    </div> 
    <script> 
        document.getElementById("login-form").addEventListener("submit", function(event) {
            event.preventDefault();
            goToPage1();
         // Prevent default form submission
        function goToPage1(){
            window.location.href = 'dashboard.php'
        };})

        document.getElementById("supervisor-login").addEventListener("submit", function(event) {
            event.preventDefault();
            goToPage2();
         // Prevent default form submission
        function goToPage2(){
            window.location.href = 'supervisor.php'
        };})
    </script>
</body>
</html>