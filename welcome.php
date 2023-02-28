<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome - GDT</title>
    <?php require "data/header.php"; ?>
    <link rel="stylesheet" href="css/login.css">
    <style>
        .wrapped-wrapper {
            height: 100%;
        }
    </style>
</head>

<body data-nav="false">
    <main>
        <div class="wrapped-wrapper">
            <div class="wrapper">
<<<<<<< Updated upstream
                <h1 class="my-5">Hi,&nbsp;<b>
=======
                <h1 class="my-5 welcome-text">Hi,&nbsp;<b>
>>>>>>> Stashed changes
                        <?php echo htmlspecialchars($_SESSION["username"]); ?>
                    </b>. <wbr>Welcome&nbsp;to&nbsp;our&nbsp;site.</h1>
                <script>
                    if ($(window).width() < 768) {
                        document.write('<br>');
                        document.getElementById("title").innerHTML = "The GD Timeline";
                    } 
                </script>
                <div class="welcome-buttons">
                    <a href="index.php" class="btn btn-primary ml-3">Home</a>
                    <a href="reset-password.php" class="btn btn-warning ml-3">Reset Your Password</a>
                    <a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
                    <?php
                    if (!isset($_SESSION["isAuthor"]) || $_SESSION["isAuthor"] == "1") {
                        echo "<br><br><a href='adminspace/author-central.php' class='btn btn-secondary ml-3'>Author Central</a>";
                    }
                    ?>
                    <?php
                    if (!isset($_SESSION["isEditor"]) || $_SESSION["isEditor"] == "1") {
                        echo "<a href='adminspace/editor-central.php' class='btn btn-info ml-3'>Editor Central</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <?php require "data/footer.php" ?>
</body>

</html>