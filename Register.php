<?php
    include_once "conn.php";
    $user_type;
    if (isset($_GET['type'])) {
        $val = $_GET['type'];
        switch ($val) {
            case 'student':
                $user_type =  1;
                break;
            case 'supervisor':
                $user_type =  2;
                break;
            
            default:
                header("location: ./");
                exit();
        }
    } else {
        header("location: "); 
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name = htmlspecialchars(trim($_POST["firstname"] ?? ''));
        $last_name = htmlspecialchars(trim($_POST["lastname"] ?? ''));
        $middle_name = htmlspecialchars(trim($_POST["middlename"] ?? ''));
        $matric_no = isset($_POST["matric-number"]) ? (int) $_POST["matric-number"] : 0;
        $password = $_POST["password"] ?? '';
        $name_of_company = htmlspecialchars(trim($_POST["name_of_company"] ?? ''));
        $address = htmlspecialchars(trim($_POST["address"] ?? ''));

        if (strlen($password) < 8) {
            echo "Password must be at least 8 characters long.";
            exit();
        }
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // echo "First Name: $first_name <br>";
        // echo "Last Name: $last_name <br>";
        // echo "Middle Name: $middle_name <br>";
        // echo "Matric Number: $matric_no <br>";
        // echo "Password: $hashed_password <br>";
        // echo "Name of Company: $name_of_company <br>";
        // echo "Address: $address <br>";
        // echo "User Type: $user_type <br>";

        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE matric_number = ?");
        $stmt->bind_param("i", $matric_no);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();

        if ($count == 0){
            $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, middle_name, matric_number, password_hash, name_of_company, address, user_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            if ($stmt) {
                $stmt->bind_param("sssisssi", $first_name, $last_name, $middle_name, $matric_no, $hashed_password, $name_of_company, $address, $user_type);
                if ($stmt->execute()) {
                    echo "Registration successful!";
                    sleep(1);
                    header("location: login.php");
                } else {
                    echo "Error: running statement ";
                }
    
            } else {
                echo "Error preparing statement: ";
            }
            
            $stmt->close();
        }else{
           $user_exists_err = "User with matric number <b> $matric_no </b> already exists.";
        }
    
    
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="./style.css">

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
        <div>

            <?php echo (!empty($user_exists_err)) ? 
            '<div style="color: red; background-color: #f8d7da; padding: 10px; border-radius: 5px; margin-bottom: 10px; text-align: center;">' . $user_exists_err . '</div>'
             : ''; ?>
        </div>
    
        <h1>Registration Form</h1>
        <form action="" method="post">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>
            
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>
            
            <label for="middlename">Middle Name: <i>optional</i>  </label>
            <input type="text" id="middlename" name="middlename">
            
            <label for="matric-number">Matric Number:</label>
            <input type="number" id="matric-number" name="matric-number" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <label for="name_of_company">Name of Company:</label>
            <input type="text" id="name_of_company" name="name_of_company" required>
            
            <label for="address">Address: <i>optional</i> </label>
            <input id="address" name="address" />
            
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>