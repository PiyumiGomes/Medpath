<?php
// Include database connection file
include('./dbconnection.php');

// Start session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Fetch the user data from the database
    $query = "SELECT * FROM user WHERE UserName='$username' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $stored_password = $user['Password'];  // The hashed password from the database

        // Verify the entered password with the hashed password
        if (password_verify($password, $stored_password)) {
            // Password matches, login successful
            $_SESSION['UserName'] = $user['UserName'];  // Store username in session

            echo "<script>alert('Login successful! Redirecting..');</script>";
            header("Location: home.php");  // Redirect to home page or dashboard
            exit();
        } else {
            // Password does not match
            echo "Invalid username or password!";
        }
    } else {
        // User not found
        echo "Username not found!";
    }

    // Close connection
    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css" />

    <style type="text/css">

 /* Background image section */
 body {
        background-image: url('imgs/img5.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 100vh;
        padding-top: 70px; /* Adjust this value based on the height of the navbar */
        margin: 0;
    }

        /* Login Form Styles (Similar to Registration Form) */
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-form {
    background-color: rgba(255, 255, 255, 0.9);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    width: 320px;
    text-align: center;
}

.login-form h2 {
    margin-bottom: 20px;
    color: #333;
}

.login-form .form-group {
    margin-bottom: 15px;
    text-align: left;
}

.login-form .form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.login-form .form-group input {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-sizing: border-box;
    font-size: 14px;
}

.login-form button[type="submit"] {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    cursor: pointer;
    width: 100%;
    margin-top: 10px;
    transition: background-color 0.3s;
}

.login-form button[type="submit"]:hover {
    background-color: #0056b3;
}

nav {
    position: fixed;  /* Change to fixed to keep it at the top */
    top: 0;
    left: 0;
    width: 100%;  /* Make sure the navbar spans the full width */
    z-index: 1000;  /* Keeps the navbar above other content */
    background-color: #2772a1;  /* Ensure background color is set */
    padding: 15px;  /* Adjust padding as needed */
    height: 70px;  /* Set the height of the navbar */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);  /* Optional: Add shadow for visibility */
}

/* Ensure body padding accounts for the fixed navbar */
body {
    padding-top: 70px;  /* Add padding equal to navbar height */
    margin: 0;
}


        </style>

</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <a href="home.php" class="logo">
            <img src=" imgs/hh.png "  alt="HeartGuard" class="logo1">
        </a>
        <ul class="nav-links">
            <div class="menu">
                <li><a href="home.php">Home</a></li>
                <li><a href="reg.php">Register</a></li>
                <li><a href="Login.php">Login</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="AboutUs.html">About Us</a></li>
            </div>
        </ul>
    </nav>

    <!-- Login Form -->
    <div class="login-container">
    <form action="login.php" method="POST" class="login-form">
        <h2>Login</h2>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
        
       
        <p>Not registered? <a href="reg.php">Register here</a>.</p>
    </form>
</div>
</body>
</html>