<?php
session_start();
require_once "../config.php";
if(!isset($_SESSION["isAuthor"]) || $_SESSION["isAuthor"] == "0"){
    header("Location: lurkin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  echo "helo";
  $isAuthor = $_REQUEST["isauthor"];
  $isEditor = $_REQUEST["iseditor"];
  $currentid = $_REQUEST["currentid"];

  if($isAuthor == "on") {
    $isAuthor = "1";
  } else {
    $isAuthor = "0";
  }

  if($isEditor == "on") {
    $isEditor = "1";
  } else {
    $isEditor = "0";
  }

  $sql = "UPDATE users SET isAuthor = '$isAuthor', isEditor = '$isEditor' WHERE id = '$currentid'";
  $rs = mysqli_query($link, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Edit User Details - GDT</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/vis-timeline@latest/standalone/umd/vis-timeline-graph2d.min.js"></script>
    <script type="text/javascript" src="../js/menu.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/vis-timeline@latest/styles/vis-timeline-graph2d.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/bg.css">
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
    <h1>Edit User Details</h1>
    <?php
      $sql = "SELECT id, username, created_at, isAuthor, isEditor FROM users";
      $result = $link->query($sql);
    
      if ($result->num_rows > 0) {
        echo "<table class='editor-overview'><tr><th>ID</th><th>Username</th><th>Created At</th><th>Is Author</th><th>Is Editor</th><th>Changes</th></tr>";
        while($row = $result->fetch_assoc()) {
          echo "<form action='/adminspace/edit-data.php' method='post'>";
          echo "<input type='hidden' name='currentid' value='".$row['id']."'>";
          echo "<tr><td>".$row["id"]."</td><td>".$row["username"]."</td><td>".$row["created_at"]."</td><td><input type='checkbox' name='isauthor' ";
          if($row["isAuthor"] == '1'){echo "checked";} else {echo "";}
          echo "></input></td><td><input type='checkbox' name='iseditor' ";
          if($row["isEditor"] == '1'){echo "checked";} else {echo "";}
          echo "></input></td><td class='d-flex justify-content-center align-items-center'><input type='submit' value='Submit Changes' class='btn btn-primary'><br>";
          echo "<input type='reset' class='btn btn-secondary ml-2' value='Reset'></td></tr>";
        }
        echo "</table></form>";
      } else {
        echo "0 results";
      }
    ?>
    <br>
    <div>
      <p class="confirmations-container">
      <?php
      if(isset($rs)) {
        if($rs) {
            echo "Entries added successfully!";
        } else {
            echo "ERROR: Wasn't able to submit successfully\.";
        }
      }
      ?>
      </p>
    </div>
      </div>
      </div>
  </body>
</html>