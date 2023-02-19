<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome - GDT</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="https://unpkg.com/vis-timeline@latest/standalone/umd/vis-timeline-graph2d.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/vis-timeline@latest/styles/vis-timeline-graph2d.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bg.css">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <link rel="stylesheet" href="css/menu.css">
    <style>
        .wrapped-wrapper {
            height: 100%;
        }
    </style>
</head>
<body>
<main>
    <div class="wrapped-wrapper">
        <div class="wrapper">
            <h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
            <p>
                <a href="index.php" class="btn btn-primary ml-3">Home</a>
                <a href="reset-password.php" class="btn btn-warning ml-3">Reset Your Password</a>
                <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
                <?php
                    if(!isset($_SESSION["isAuthor"]) || $_SESSION["isAuthor"] == "1"){
                        echo "<br><br><a href='adminspace/author-central.php' class='btn btn-secondary ml-3'>Author Central</a>";
                    }
                ?>
                <?php
                    if(!isset($_SESSION["isEditor"])  ||$_SESSION["isEditor"] == "1"){
                        echo "<a href='adminspace/editor-central.php' class='btn btn-info ml-3'>Editor Central</a>";
                    }
                ?>
            </p>
        </div>
    </div>
</main>
<nav>
      <div id="nav-links">
        <a class="nav-link" href="index.php">
          <h2 class="nav-link-label rubik-font">Home</h2>
          <img class="nav-link-image" src="img/homepage.jpg" />
        </a>
        <a class="nav-link" href="docs/submit-event.html">
          <h2 class="nav-link-label rubik-font">Join Us</h2>
          <img class="nav-link-image" src="img/join us.jpg" />
        </a>
        <a class="nav-link" href="#">
          <h2 class="nav-link-label rubik-font">About Us)</h2>
          <img class="nav-link-image" src="img/about.jpg"/>
        </a>
      </div>
    </nav>

    <button id="nav-toggle" type="button" onclick="toggleNav()">
      <i class="open fa-light fa-bars-staggered"></i>
      <i class="close fa-light fa-xmark-large"></i>
    </button>
</body>
</html>