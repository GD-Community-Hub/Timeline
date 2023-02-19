<?php
session_start();
require_once "../config.php";
if(!isset($_SESSION["isAuthor"]) || $_SESSION["isAuthor"] == "0"){
    header("Location: lurkin.php");
}

function formatDate($date) {
    $dateArr = explode('-', $date);
    $day = $dateArr[2];
    $month = $dateArr[1];
    $year = $dateArr[0];
    return $day.'. '.$month.'. '.$year;
}

// if form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // define variables
        $slug = $_REQUEST["id"];
        $name = $_REQUEST["name"];
        $date_start = $_REQUEST["date_start"];
        $date_end = $_REQUEST["date_end"];
        $description = $_REQUEST['desc'];
        $timelinegroup = $_REQUEST["group"];
        $type = $_REQUEST["type"];
        global $confirmation;

        // check the data to make sure its correct format
        if($type == "range" && $date_end == "") {
            echo ("<script>alert('Error: If your selected type is 'range', you have to define the End Date.')</script>");
            die;
        }


    // instert into database for timeline use
    $sql = "INSERT INTO events (name, date_start, date_end, description, timelinegroup, type, slug) VALUES ('$name', '$date_start', '$date_end', '$description', '$timelinegroup', '$type', '$slug')";
    if($date_end == '') {
        $sql = "INSERT INTO events (name, date_start, description, type, slug) VALUES ('$name', '$date_start', '$description', '$type', '$slug')";
    }
    $rs = mysqli_query($link, $sql);
    if($rs) {
        echo "<script>alert('Entries added!');</script>";
    } else {
        echo "<script>alert('ERROR: Wasn't able to submit successfully.');</script>";
    }

    // format the date
    if($date_end == '') {
        $date = formatDate($date_start);
    } else {
        $date = formatDate($date_start)." - ". formatDate($date_end);
    }

    // make a file with all the stuff
    $mainString = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>".$name."</title>
                <script src=\"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js\"></script>
                <script type=\"text/javascript\" src=\"../js/menu.js\"></script>
                <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css\">
                <link rel=\"stylesheet\" href=\"../css/main.css\">
                <link rel=\"stylesheet\" href=\"../css/bg.css\">
                <link rel=\"icon\" type=\"image/x-icon\" href=\"../img/favicon.ico\">
            </head>
            <body>
                <header id=\"menu-container\">
                    <div id=\"menu-wrapper\">
                        <div id=\"hamburger-menu\">
                            <span></span>
                            <span></span>
                            <span></span></div>
                    </div>
                    <ul class=\"menu-list accordion\">
                        <li id=\"nav1\" class=\"toggle accordion-toggle\">
                            <a class=\"menu-link\" href=\"../index.php\">The Timeline</a>
                        </li>
                        <li id=\"nav2\" class=\"toggle accordion-toggle\">
                            <span class=\"icon-plus\"></span>
                            <a class=\"menu-link\" href=\"#\">Documentation</a>
                        </li>
                        <ul class=\"menu-submenu accordion-content\">
                            <li>
                                <a class=\"head\" href=\"submit-event.html\">How to Become an Author/Editor</a>
                            </li>
                            <li>
                                <a class=\"head\" href=\"howto-author.html\">How to use the Author Central</a>
                            </li>
                            <li>
                                <a class=\"head\" href=\"howto-editor.html\">How to use the Editor Central</a>
                            </li>
                            <li>
                                <a class=\"head\" href=\"help/help-central.html\">Help Central</a>
                            </li>
                        </ul>
                        <li id=\"nav3\" class=\"toggle accordion-toggle\">
                            <span class=\"icon-plus\"></span>
                            <a class=\"menu-link\" href=\"#\">AdminSpace</a>
                        </li>
                        <ul class=\"menu-submenu accordion-content\">
                            <li>
                                <a class=\"head\" href=\"../adminspace/author-central.php\">Author Central</a>
                            </li>
                            <li>
                                <a class=\"head\" href=\"../adminspace/editor-central.php\">Editor Central</a>
                            </li>
                        </ul>
                </ul>
            </header>
            <div class=\"wrapped-wrapper\">
                <div class=\"wrapper\">
                    <h1>
                        <b>".$name."</b>
                    </h1>
                    <h2>".$date."</h2>
                    <div>".$description."</div>
                </div>
            </div>
        </body>
        </html>";
    $fileName = trim($slug);

    $f = fopen("../articles/".$fileName.".html", "w+");
    fwrite($f, $mainString);
    fclose($f);

    header("location: ../articles/".$fileName.".html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Author Central - GDT</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/menu.js"></script>
    <script type="text/javascript" src="https://unpkg.com/vis-timeline@latest/standalone/umd/vis-timeline-graph2d.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/ujyrzbph9buaadvi88n79xzcafcfhf43wk3lyfyc3rcbp6au/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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
        <form method="POST">
            <div class="form-group">
                <label><b>Name</b></label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label><b>Date</b></label>
                <input type="date" name="date_start" class="form-control" required>
            </div>
            <div class="form-group">
                <label><b>End Date (optional)</b></label>
                <input type="date" name="date_end" class="form-control">
            </div>
            <div class="form-group">
                <label><b>ID</b></label>
                <input type="text" name="id" class="form-control" placeholder="The URL to the entry." required>
            </div>
            <div class="form-group">
            <label><b>Article content</b></label>
                <textarea class="form-control" name="desc" cols="50" rows="20" id="tinymce"></textarea>
            </div>
            <div class="form-group" id="desc-span">
            </div>
            <div class="form-group">
                <label><b>Timeline group</b></label>
                <label for="1"><input type="radio" id="box" name="group" value="1" checked>Updates/Game news</label>
                <label for="2"><input type="radio" id="point" name="group" value="2">Levels</label>
                <label for="3"><input type="radio" id="range" name="group" value="3">Community events</label>
            </div>
            <div class="form-group">
                <label><b>Type</b></label>
                <label for="box"><input type="radio" id="box" name="type" value="box" checked>Box</label>
                <label for="point"><input type="radio" id="point" name="type" value="point">Point</label>
                <label for="range"><input type="radio" id="range" name="type" value="range">Range</label>
            </div>
            <div class="form-group" style="flex-direction: row;">
                <input type="submit" class="btn btn-primary" id="author-submit" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <script>
                tinymce.init({
                    selector: 'textarea#tinymce',
                    height: 750,
                    plugins: [
                      'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                      'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                      'insertdatetime', 'media', 'table', 'help', 'wordcount', 'save'
                    ],
                    toolbar: 'undo redo | blocks | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help' + 'save',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
                });
            </script>
        </form>
      </div>
    </div>    
  </body>
</html>