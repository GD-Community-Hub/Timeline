<?php
session_start();
require_once "config.php";

$sql = "SELECT * FROM events WHERE approved = 1";
$result = mysqli_query($link, $sql) or die("<script>alert('Error in Selecting " . mysqli_error($link) . "');");

$tldata = array();
while ($row = mysqli_fetch_assoc($result)) {
  $tldata[] = $row;
}

function recursive_change_key($arr, $set)
{
  if (is_array($arr) && is_array($set)) {
    $newArr = array();
    foreach ($arr as $k => $v) {
      $key = array_key_exists($k, $set) ? $set[$k] : $k;
      $newArr[$key] = is_array($v) ? recursive_change_key($v, $set) : $v;
    }
    return $newArr;
  }
  return $arr;
}

$finaldata = recursive_change_key($tldata, array('name' => 'content', 'description' => 'title', 'date_start' => 'start', 'date_end' => 'end', 'timelinegroup' => 'group'));

$filepath = fopen('main-data.json', 'w+');
fwrite($filepath, json_encode($finaldata, JSON_PRETTY_PRINT));
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>The GD Timeline</title>
  <script type="text/javascript" src="https://unpkg.com/vis-timeline@latest/standalone/umd/vis-timeline-graph2d.min.js"></script>
  <script type="text/javascript" src="https://kit.fontawesome.com/944eb371a4.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/menu.js"></script>
  <script src="js/main-timeline.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/vis-timeline@latest/styles/vis-timeline-graph2d.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/bg.css">
  <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body data-nav="false" onresize="reload()">
  <main>
    <div class="wrapper">
      <h1 id="title">The Timeline of Geometry Dash's History</h1>
      <div id="login-container">
        <?php
        if (isset($_SESSION["loggedin"])) {
          if ($_SESSION["loggedin"] == true) {
            echo "<a href='welcome.php' class='logged-in-text'> Hi, <b> " . htmlspecialchars($_SESSION["username"]) . "</b>.</a>";
          }
        } else {
          echo "<a href='login.php' class='logged-in-text'>Log in</a>";
        }
        ?>
      </div>
      <script>
        if ($(window).width() < 768) {
          document.write('<br>');
        } 
      </script>
      <div id="visualization"></div>
      <div id="loading">Loading...</div>
      <span style="display: hidden;" id="dom-input">
        <?php
        $sql = "SELECT id, name, slug from events";
        $result = mysqli_query($link, $sql) or die("<script>alert('Error in Selecting " . mysqli_error($link) . "');");

        $dom_input = array();
        while ($row = mysqli_fetch_assoc($result)) {
          $dom_input[] = $row;
        }

        $filepath_dom = fopen('js-data.json', 'w+');
        fwrite($filepath_dom, json_encode($dom_input, JSON_PRETTY_PRINT));
        ?>
      </span>
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
      <a class="nav-link" href="about.html">
        <h2 class="nav-link-label rubik-font">About Us</h2>
        <img class="nav-link-image" src="img/about.jpg" />
      </a>
    </div>
  </nav>

  <button id="nav-toggle" type="button" onclick="toggleNav()">
    <i class="open fa-light fa-bars-staggered"></i>
    <i class="close fa-light fa-xmark-large"></i>
  </button>
  <script type="text/javascript" src="js/listen.js"></script>
</body>

</html>