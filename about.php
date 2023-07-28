<?php
session_start();


$userprofile = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];

if ($userprofile) {
} else {

    header("location:login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Konema</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      /* padding: 20px; */
      background-color: #f5f5f5;
    }

    .about-container {
      max-width: 800px;
      margin: 50px auto;
      background-color: #fff;
      border-radius: 5px;
      padding: 30px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    h1 {
      color: #333;
      margin-top: 0;
      text-align: center;
      font-size: 25px;
    }
    h2{
      font-size: 20px;

        
    }

    img.profile-picture {
      display: block;
      max-width: 200px;
      height: auto;
      margin: 0 auto 20px;
      border-radius: 50%;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    p {
      line-height: 1.6;
      margin-bottom: 20px;
    }

    ul {
      list-style-type: none;
      padding-left: 0;
    }

    
    a {
      color: #007bff;
      text-decoration: none;
    }
    .social-icons {
      display: flex;
      justify-content: center;
      margin-top: 20px;
    }

    .social-icons a {
      color: #333;
      font-size: 24px;
      margin-right: 10px;
      transition: color 0.3s;
    }

    .social-icons a:hover {
      color: #007bff;
    }
  </style>
</head>

<body>
    <?php include 'header.php'; ?>
    
  <div class="about-container">
    <h1>About Me</h1>
    <img src="gallery/user.png" alt="Profile Picture" style="max-width: 200px;">
    <p>Hi, I'm [Your Name]! Welcome to my personal website. Here, you can learn a little bit about me, my interests, and my background.</p>
    <h2>Background</h2>
    <p>I have a background in [Your Field/Area of Expertise]. I have [X] years of experience in [Specific Work/Research/Projects]. I'm passionate about [Your Passion/Interest] and love to [Something You Enjoy Doing in Your Field/Interest].</p>
    <h2>Interests</h2>
    <p>Aside from my professional pursuits, I have a variety of interests and hobbies. Some of my favorite activities include [Interests/Hobbies You Enjoy]. In my free time, you can often find me [Another Interest/Hobby You Engage In].</p>
    <h2>Blog</h2>
    <p>I also maintain a blog where I share my thoughts and insights on [Topics You Write About]. Feel free to check it out to delve deeper into my ideas and experiences.</p>
    <h2>Contact Me</h2>
    <p>If you'd like to get in touch, don't hesitate to reach out. You can contact me through the following channels:</p>
    <div class="social-icons">
      <a href="[Your LinkedIn Profile URL]"><i class="fab fa-linkedin"></i></a>
      <a href="[Your Twitter Profile URL]"><i class="fab fa-twitter"></i></a>
      <a href="[Your GitHub Profile URL]"><i class="fab fa-github"></i></a>
      <a href="[Your Instagram Profile URL]"><i class="fab fa-instagram"></i></a>
    </div>
  </div>


    <script src="script.js"></script>
    <script>
        const orders = document.getElementById('about');
        orders.classList.add('active');

        
    </script>
    <script src="toggle.js">

</script>
</body>

</html>