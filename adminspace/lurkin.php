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
  </head>
  <body>
  <header id="menu-container">
            <div id="menu-wrapper">
                <div id="hamburger-menu"><span></span><span></span><span></span></div>
            </div>
            <ul class="menu-list accordion">
                <li id="nav1" class="toggle accordion-toggle">
                    <a class="menu-link" href="../index.php">The Timeline</a>
                </li>
                <li id="nav2" class="toggle accordion-toggle">
                    <span class="icon-plus"></span>
                    <a class="menu-link" href="#">Documentation</a>
                </li>
                <ul class="menu-submenu accordion-content">
                    <li><a class="head" href="../docs/submit-event.html">How to Become an Author/Editor</a></li>
                    <li><a class="head" href="../docs/howto-author.html">How to use the Author Central</a></li>
                    <li><a class="head" href="../docs/howto-editor.html">How to use the Editor Central</a></li>
                    <li><a class="head" href="../docs/help/help-central.html">Help Central</a></li>
                </ul>
                <li id="nav3" class="toggle accordion-toggle">
                    <span class="icon-plus"></span>
                    <a class="menu-link" href="#">AdminSpace</a>
                </li>
                <ul class="menu-submenu accordion-content">
                    <li><a class="head" href="author-central.php">Author Central</a></li>
                    <li><a class="head" href="editor-central.php">Editor Central</a></li>
                </ul>
            </ul>
        </header>
    <div class="wrapped-wrapper">
        <div class="wrapper">
            <h1>You're not supposed to be here.</h1>
            <p style="margin-bottom: 5%;">What is lurking in the darkness?</p>
            <a href="../index.php" class="btn btn-primary">I'll let you home... for now.</a>
            <a href="../docs/help/lurkin-error.html" class="btn btn-success">Already an Author/Editor?</a>
        </div>
    </div>
  </body>
</html>