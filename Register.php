<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="styles.css">

    <!--Favicon-->
   <link rel="shortcut icon" href="Lasu_logo.jpg" type="image/x-icon">
   <link rel="icon" href="Lasu_logo.jpg" type="image/x-icon">

<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    height: auto;
    margin: 0;
    margin-top: 20px;
    }

    .container {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 500px;
        width: 100%;
        height: auto;
    }

    h1 {
        margin-bottom: 20px;
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin-bottom: 5px;
        font-weight: bold;
    }

    input, textarea {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    button {
        padding: 10px;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    </style>
</head>
<body>
    <div class="container">
        <h1>Registration Form</h1>
        <form action="" method="post" id="registrationForm">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>
            
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>
            
            <label for="middlename">Middle Name:</label>
            <input type="text" id="middlename" name="middlename">
            
            <label for="matricNumber">Matric Number:</label>
            <input type="text" id="matricNumber" name="matricNumber" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="companyName">Name of Company:</label>
            <input type="text" id="companyName" name="companyName" required>
            
            <label for="address">Address:</label>
            <input id="address" name="address" rows="4" required></input>
            
            <button type="submit" id="registrationSubmit" onclick="goToPage1()">Register</button>
        </form>
    </div>
</body>
<script>
    /*
        // Ensure the DOM is fully loaded before running scripts
        document.addEventListener("DOMContentLoaded", function() {
            // Attach event listener to the submit button
            document.getElementById("registrationSubmit").addEventListener("click", function(event) {
                // Prevent the form from submitting
                event.preventDefault();
                goToPage1();
                // Call the showAlert function
                showAlert();
            });
        });

        function showAlert() {
            alert("Registration Successful!");
            // Redirect to the login page after showing the alert
            setTimeout(goToPage1, 1000); // Redirect after 1 second to allow the alert to be seen
        }

        function goToPage1() {
            window.location.href = 'login.php';
    }*/
        // Ensure the DOM is fully loaded before running scripts
        document.addEventListener("DOMContentLoaded", function() {
            // Attach event listener to the submit button
            document.getElementById("registrationSubmit").addEventListener("click", function(event) {
                event.preventDefault();
                // Call the processForm function
                processForm();
            });
        });

        function processForm() {
            // Optionally, you can add form validation here
            const form = document.getElementById('registrationForm');
            const isValid = form.checkValidity();

            if (isValid) {
                // Show alert
                alert("Registration Successful!");

                // Redirect after 1 second
                setTimeout(goToPage1, 1000);
                window.location.href = 'login.php';
                function goToPage1() {
            // Redirect to the login page
            
        }
            } else {
                // Show a message or handle validation errors
                alert("Please fill in all required fields.");
            }
        }

        function goToPage1() {
            // Redirect to the login page
           // window.location.href = 'login.php';
        }
    </script>
</script>
</html>