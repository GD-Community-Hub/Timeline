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

<!DOCTYPE html>
<html>

<head>
  <title>The GD Timeline</title>
  <?php require "data/header.php"; ?>
</head>

<body data-nav="false">
  <main>
    <div class="wrapper">
      <h1 id="title">The Timeline of Geometry Dash's History</h1>
      <div id="login-container">
        <?php require "scripts/login-span.php" ?>
      </div>
      <script src="scripts/width.js"></script>
      <div id="visualization"></div>
      <div id="loading">Loading...</div>
      <span style="display: hidden;" id="dom-input">
        <?php require "scripts/index-data-handler.php"; ?>
      </span>
    </div>
  </main>
  <?php require "data/footer.php"; ?>
  <script type="text/javascript" src="js/listen.js"></script>
  <script src="js/main-timeline.js"></script>
  <script src="js/main.js"></script>
</body>

</html>