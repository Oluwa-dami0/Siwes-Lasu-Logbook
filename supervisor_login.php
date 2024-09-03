<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container supervisor-login">
        <h2> Supervisor Login</h2>
        <form id="supervisor-login">
            <div class="form-group">
                <label for="pf-number">PF-Number</label>
                <input type="number" id="pf-number" name="PF-number" required>
            </div>
            <div class="form-group">
                <label for="sp-password">Password</label>
                <input type="password" id="sp-password" name="sp-password" required>
            </div>
            <a href="" class="forget-password"><p>Forgot password?</p></a>
            <button type="submit" onclick="goToPage2()">Login</button>
        </form>
    </div> 
   
</body>
</html>