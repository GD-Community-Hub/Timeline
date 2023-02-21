<?php
if (isset($_SESSION["loggedin"])) {
    if ($_SESSION["loggedin"] == true) {
        echo "<a href='welcome.php' class='logged-in-text'> Hi, <b> " . htmlspecialchars($_SESSION["username"]) . "</b>.</a>";
    }
} else {
    echo "<a href='login.php' class='logged-in-text'>Log in</a>";
}
?>