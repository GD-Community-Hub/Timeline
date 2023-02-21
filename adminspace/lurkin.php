<?php
session_start();
require_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Editor Central - GDT</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/menu.js"></script>
    <script type="text/javascript" src="https://unpkg.com/vis-timeline@latest/standalone/umd/vis-timeline-graph2d.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/vis-timeline@latest/styles/vis-timeline-graph2d.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/bg.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
    <script type="text/javascript" src="https://kit.fontawesome.com/944eb371a4.js"></script>
    <link rel="stylesheet" href="../css/menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body data-nav="false">
    <main>
    <div class="wrapped-wrapper">
        <div class="wrapper">
            <h1>You're not supposed to be here.</h1>
            <p style="margin-bottom: 5%;">What is lurking in the darkness?</p>
            <a href="../index.php" class="btn btn-primary">I'll let you home... for now.</a>
            <a href="../docs/help/lurkin-error.html" class="btn btn-success">Already an Author/Editor?</a>
        </div>
    </div>
</main>
<nav>
      <div id="nav-links">
        <a class="nav-link" href="../index.php">
          <h2 class="nav-link-label rubik-font">Home</h2>
          <img class="nav-link-image" src="../img/homepage.jpg" />
        </a>
        <a class="nav-link" href="../docs/submit-event.html">
          <h2 class="nav-link-label rubik-font">Join Us</h2>
          <img class="nav-link-image" src="../img/join us.jpg" />
        </a>
        <a class="nav-link" href="../about.html">
          <h2 class="nav-link-label rubik-font">About Us</h2>
          <img class="nav-link-image" src="../img/about.jpg"/>
        </a>
      </div>
    </nav>

    <button id="nav-toggle" type="button" onclick="toggleNav()">
      <i class="open fa-light fa-bars-staggered"></i>
      <i class="close fa-light fa-xmark-large"></i>
    </button>
  </body>
</html>