<?php
session_start();
require_once "config.php";

$sql = "SELECT * FROM events WHERE approved = 1";
$result = mysqli_query($link, $sql) or die("<script>alert('Error in Selecting " . mysqli_error($link) . "');");

$tldata = array();
while($row = mysqli_fetch_assoc($result))
{
    $tldata[] = $row;
}

function recursive_change_key($arr, $set) {
  if (is_array($arr) && is_array($set)) {
  $newArr = array();
  foreach ($arr as $k => $v) {
      $key = array_key_exists( $k, $set) ? $set[$k] : $k;
      $newArr[$key] = is_array($v) ? recursive_change_key($v, $set) : $v;
  }
  return $newArr;
}
return $arr;    
}

$finaldata = recursive_change_key($tldata, array('name' => 'content', 'description' => 'title', 'date_start' => 'start', 'date_end' => 'end', 'timelinegroup' => 'group'));

$filepath = fopen('main-data.json', 'w+');
fwrite ($filepath, json_encode($finaldata, JSON_PRETTY_PRINT));
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>The GD Timeline</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/menu.js"></script>
    <script type="text/javascript" src="js/listen.js"></script>
    <script type="text/javascript" src="https://unpkg.com/vis-timeline@latest/standalone/umd/vis-timeline-graph2d.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/vis-timeline@latest/styles/vis-timeline-graph2d.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/bg.css">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>

<body>
<header id="menu-container">
        <div id="menu-wrapper">
            <div id="hamburger-menu"><span></span><span></span><span></span></div>
        </div>
        <ul class="menu-list accordion">
            <li id="nav1" class="toggle accordion-toggle">
                <a class="menu-link" href="index.php">The Timeline</a>
            </li>
            <li id="nav2" class="toggle accordion-toggle">
                <span class="icon-plus"></span>
                <a class="menu-link" href="#">Documentation</a>
            </li>
            <ul class="menu-submenu accordion-content">
                <li><a class="head" href="docs/submit-event.html">How to Become an Author/Editor</a></li>
                <li><a class="head" href="docs/howto-author.html">How to use the Author Central</a></li>
                <li><a class="head" href="docs/howto-editor.html">How to use the Editor Central</a></li>
                <li><a class="head" href="docs/help/help-central.html">Help Central</a></li>
            </ul>
            <li id="nav3" class="toggle accordion-toggle">
                <span class="icon-plus"></span>
                <a class="menu-link" href="#">AdminSpace</a>
            </li>
            <ul class="menu-submenu accordion-content">
                <li><a class="head" href="adminspace/author-central.php">Author Central</a></li>
                <li><a class="head" href="adminspace/editor-central.php">Editor Central</a></li>
            </ul>
        </ul>
    </header>
    <div class="wrapper">
    <span id="login-container">
        <?php
        if(isset($_SESSION["loggedin"])){
            if($_SESSION["loggedin"] == true) {
                echo "<a href='welcome.php' class='logged-in-text'> Hi, <b> " . htmlspecialchars($_SESSION["username"]) . "</b>.</a>";
            }
        } else {
            echo "<a href='login.php' class='logged-in-text'>Log in</a>";
        }
        ?>
    </span>
        <h1>The Timeline of Geometry Dash's History</h1>
        <div id="visualization"></div>
        <div id="loading">Loading...</div>
        <script src="js/main-timeline.js"></script>
    </div>
</body>

</html>