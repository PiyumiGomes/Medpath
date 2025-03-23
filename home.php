<?php 

// Start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HeartGuard</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="blogs.css" />
    <link rel="stylesheet" href="footer.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.0/countUp.min.js"></script>
</head>
<body>
    <nav class="navbar">
        <a href="home.php" class="logo">
            <img src=" imgs/hh.png "  alt="HeartGuard" class="logo1">
        </a>
        <ul class="nav-links">
            <div class="menu">
                <li><a href="home.php">Home</a></li>

                <?php if (!isset($_SESSION['UserName'])): ?>
                <li><a href="reg.php">Register</a></li>
                <li><a href="Login.php">Login</a></li>
                <?php endif; ?>

                

            <?php if (isset($_SESSION['UserName'])): ?>
              <li><a href="logout.php">Logout</a></li>
            <?php endif; ?>

            </div>
        </ul>
    </nav>

    
    <section class="background-image">
        <div class="content">
            <h1></br>Keeping Your Heart Safe,</br> Every Day.</h1>
            <?php if (!isset($_SESSION['UserName'])): ?>
              <a href="login.php" class="cta-button">Get Started</a>

            <?php else: ?>
            <a href="form.php" class="cta-button">Get Started</a>
            <?php endif; ?>

        </div>
    </section>



    <section class="about-section">
            <div class="container">
                <div class="about-content">
                    <div class="image-container">
                        <img src="imgs/img2.jpg" alt="Doctor Image">
                    </div>
                    <div class="text-container">
                        <h2>About HeartGuard</h2>
                        <p>
                            Your comprehensive heart health companion. Our platform is designed to help you understand and manage your heart health by predicting the risk of heart disease based on your individual health data. After entering your details, you’ll receive an assessment of your risk level. Additionally, you’ll find recommendations on the website that can help avoid heart diseases, offering you valuable knowledge and information to support a healthier lifestyle. Start your journey towards better heart health today. We are committed to empowering you with the tools and insights needed to make informed decisions. Trust HeartGuard to guide you every step of the way on your path to a healthier heart.
                        </p>
                        <div class="stats">
                            <div class="stat-item">
                                <h3 id="users-helped">0</h3>
                                <p>Babies </p>
                            </div>
                            <div class="stat-item">
                                <h3 id="risk-assessments">0</h3>
                                <p>Worldwide Patients</p>
                            </div>
                            <div class="stat-item">
                                <h3 id="support">0</h3>
                                <p>Deaths per year</p>
                            </div>
                        </div>
                        
                        </div>
                        
                    </div>
                </div>
            </div>
    </section>

    <section>
        <div class="heading-container">
        <h1>Our Recent Blogs </h1> 
        </div>

        <div class="blog-container">
            <div class="blog-post">
              <a href="blog1.html">
                <div class="blog-image">
                  <img src="imgs/man.jpg" alt="Blog 1">
                </div>
              </a>
              <h3 class="blog-title">The Silent Killer</h3>
              
            </div>
            <div class="blog-post">
              <a href="blog2.html">
                <div class="blog-image">
                  <img src="imgs/baby.jpg" alt="Blog 2">
                </div>
              </a>
              <h3 class="blog-title">The Rising Concern of Congenital Heart Disease in Newborns</h3>
              
            </div>
            <div class="blog-post">
              <a href="blog3.html">
                <div class="blog-image">
                  <img src="imgs/run.jpg" alt="Blog 3">
                </div>
              </a>
              <h3 class="blog-title">Lifestyle Choices Matter</h3>
            
            </div>
          </div>
          
        </div>  

    </section>

<section>
<footer>
    <div class="footer-container">
        <div class="footer-links">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="footer-social">
            <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2024 HeartGuard. All rights reserved.</p>
    </div>
</footer>

</section>
    
        
   
    <script src="count.js"></script>
</body>
</html>