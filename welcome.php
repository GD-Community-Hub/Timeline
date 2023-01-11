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
    <script type="text/javascript" src="https://unpkg.com/vis-timeline@latest/standalone/umd/vis-timeline-graph2d.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/vis-timeline@latest/styles/vis-timeline-graph2d.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bg.css">
</head>
<body>
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
</body>
</html>