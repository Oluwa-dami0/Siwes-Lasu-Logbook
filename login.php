<?php
    include_once "conn.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $matricnumber = $_POST['matric-number'];
        $password = $_POST['st-password'];
    
        // Validate inputs
        if (empty($matricnumber) || empty($password)) {
            die("Matric number and password are required.");
        }
    
        // Prepare and execute SQL statement
        $stmt = $conn->prepare("SELECT password_hash FROM users WHERE matric_number = ?");
        $stmt->bind_param("i", $matricnumber);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($password_hash);
        $stmt->fetch();
    
        // Verify password
        if (password_verify($password, $password_hash)) {
            header("location: dashboard");
        } else {
            $login_err = "Invalid username or password.";
        }
    
        $stmt->close();
    }
    $conn->close();
?>
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
<div class="login-container student-login">
        <h2>Student Login</h2>
        <?php echo (!empty($login_err)) ? 
            '<div style="color: red; background-color: #f8d7da; padding: 10px; border-radius: 5px; margin-bottom: 10px; text-align: center;">' . $login_err . '</div>'
             : ''; ?>
        <form id="login-form"  action="" method="POST">
            <div class="form-group">
                <label for="matric-number">Matric number</label>
                <input type="number" id="matric-number" name="matric-number" required>
            </div>
            <div class="form-group">
                <label for="st-password">Password</label>
                <input type="password" id="st-password" name="st-password" required>
            </div>
            <a href="" class="forget-password"><p>Forgot password?</p></a>
            <button type="submit" id="login" name="student-login" >Login</button>
        </form>
    </div> 
    <script> 
        // document.getElementById("login-form").addEventListener("submit", function(event) {
        //     event.preventDefault();
        //     goToPage1();
        //  // Prevent default form submission
        // function goToPage1(){
        //     window.location.href = 'dashboard.php'
        // };})

        // document.getElementById("supervisor-login").addEventListener("submit", function(event) {
        //     event.preventDefault();
        //     goToPage2();
        //  // Prevent default form submission
        // function goToPage2(){
        //     window.location.href = 'supervisor.php'
        // };})
    </script>
</body>
</html>