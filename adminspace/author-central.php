<?php
session_start();
require_once "../config.php";
if(!isset($_SESSION["isAuthor"]) || $_SESSION["isAuthor"] == "0"){
    header("Location: lurkin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_REQUEST["name"];
    $date_start = $_REQUEST["date_start"];
    $date_end = $_REQUEST["date_end"];
    $description = $_REQUEST["desc"];
    $timelinegroup = $_REQUEST["group"];
    $type = $_REQUEST["type"];

    $sql = "INSERT INTO events (name, date_start, date_end, description, timelinegroup, type) VALUES ('$name', '$date_start', '$date_end', '$description', '$timelinegroup', '$type')";
    if($date_end == '') {
        $sql = "INSERT INTO events (name, date_start, description, type) VALUES ('$name', '$date_start', '$description', '$type')";
    }
    $rs = mysqli_query($link, $sql);
    if($rs) {
        echo "<script>alert('Entries added!');</script>";
    } else {
        echo "<script>alert('ERROR: Wasn't able to submit successfully.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Author Central - GDT</title>
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
        <h1>Author Central</h1>
        <h2>Submit an Entry</h2>
        <p>Please fill this form to submit an entry to the GDT.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>    
            <div class="form-group">
                <label>Date</label>
                <input type="date" name="date_start" class="form-control" required>
            </div>
            <div class="form-group">
                <label>End Date (optional)</label>
                <input type="date" name="date_end" class="form-control">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="textarea" name="desc" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Group</label><br>
                <label for="1"><input type="radio" id="box" name="group" value="1" checked>Updates/Game news</label><br>
                <label for="2"><input type="radio" id="point" name="group" value="2">Levels</label><br>
                <label for="3"><input type="radio" id="range" name="group" value="3">Community events</label><br>
            </div>
            <div class="form-group">
                <label>Type</label><br>
                <label for="box"><input type="radio" id="box" name="type" value="box" checked>Box</label><br>
                <label for="point"><input type="radio" id="point" name="type" value="point">Point</label><br>
                <label for="range"><input type="radio" id="range" name="type" value="range">Range</label><br>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <span id="confirmation">
            </span>
        </form>
    </div>    
</div>
  </body>
</html>