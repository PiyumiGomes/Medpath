<?php 
include('./dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve form data
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);
  $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
  
  // Validate if password matches confirm_password
  if ($password != $confirm_password) {
    echo "<script>alert('Passwords do not match!');</script>";
      exit();
  }

  // Hash the password before storing
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Check if the user already exists
  $check_user_query = "SELECT * FROM user WHERE email='$email' OR username='$username' LIMIT 1";
  $result = mysqli_query($conn, $check_user_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
      if ($user['email'] === $email) {
        echo "<script>alert('Email already registered!');</script>";
         
      } elseif ($user['username'] === $username) {
        echo "<script>alert('Username already exists!');</script>";
         
      }
  } else {
      // Insert data into the database
      $query = "INSERT INTO user (username, email, password) 
                VALUES ('$username', '$email', '$hashed_password')";

      if (mysqli_query($conn, $query)) {
        echo "<script>alert('Register Successful!'); window.location.href = 'login.php';</script>";
      } else {
        echo "<script>alert('Unsuccessful attempt!');</script>";
      }
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
    <title>Registration</title>
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

    /* Registration Form Styles */
.registration-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.registration-form {
  background-color: rgba(255, 255, 255, 0.9);
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
  width: 320px;
  text-align: center;
}

.registration-form h2 {
  margin-bottom: 20px;
  color: #333;
}

.form-group {
  margin-bottom: 15px;
  text-align: left;
}

.form-group label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

.form-group input {
  width: 100%;
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ccc;
  box-sizing: border-box;
  font-size: 14px;
}

button[type="submit"] {
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

button[type="submit"]:hover {
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

    <!-- Registration Form -->
    <div class="registration-container">
    <form action="reg.php" method="POST" class="registration-form">
        <h2>Register</h2>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <button type="submit">Register</button>
        
        <!-- Add this part for the login link -->
        <p>Already registered? <a href="login.php">Login here</a>.</p>
    </form>
</div>
    
</body>
</html>