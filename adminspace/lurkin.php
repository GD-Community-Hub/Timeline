<?php
session_start();
require_once "../config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Editor Central - GDT</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/vis-timeline@latest/standalone/umd/vis-timeline-graph2d.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/vis-timeline@latest/styles/vis-timeline-graph2d.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/bg.css">
    <link rel="stylesheet" href="../css/login.css">
  </head>
  <body>
    <div class="wrapped-wrapper">
        <div class="wrapper">
            <h1>You're not supposed to be here.</h1>
            <p style="margin-bottom: 5%;">What is lurking in the darkness?</p>
            <a href="../index.php" class="btn btn-primary">I'll let you home... for now.</a>
        </div>
    </div>
  </body>
</html>