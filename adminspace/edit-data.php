<?php
session_start();
require_once "../config.php";
if (!isset($_SESSION["isAuthor"]) || $_SESSION["isAuthor"] == "0") {
  header("Location: lurkin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  echo "helo";
  $isAuthor = $_REQUEST["isauthor"];
  $isEditor = $_REQUEST["iseditor"];
  $currentid = $_REQUEST["currentid"];

  if ($isAuthor == "on") {
    $isAuthor = "1";
  } else {
    $isAuthor = "0";
  }

  if ($isEditor == "on") {
    $isEditor = "1";
  } else {
    $isEditor = "0";
  }

  if ($isAuthor == "" && $isEditor == "") {
    die;
  } elseif ($isAuthor == "") {
    $sql = "UPDATE users SET isAuthor = '$isAuthor' WHERE id = '$currentid'";
  } elseif ($isEditor == "") {
    $sql = "UPDATE users SET isEditor = '$isEditor' WHERE id = '$currentid'";
  } else {
    $sql = "UPDATE users SET isAuthor = '$isAuthor', isEditor = '$isEditor' WHERE id = '$currentid'";
  }

  echo ("<script>alert('".$sql."')</script>");

  $rs = mysqli_query($link, $sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit User Details - GDT</title>
  <?php require "../data/header-admin.php"; ?>
</head>

<body data-nav="false">
  <main>
    <div class="wrapped-wrapper">
      <div class="wrapper">
        <h1>Edit User Details</h1>
        <?php
        $sql = "SELECT id, username, created_at, isAuthor, isEditor FROM users";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
          echo "<table class='editor-overview'><tr><th>ID</th><th>Username</th><th>Created At</th><th>Is Author</th><th>Is Editor</th><th>Changes</th></tr>";
          while ($row = $result->fetch_assoc()) {
            echo "<form action='/adminspace/edit-data.php' method='GET'>";
            echo "<input type='hidden' name='currentid' value='" . $row['id'] . "'>";
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["created_at"] . "</td><td><input type='checkbox' name='isauthor' ";
            if ($row["isAuthor"] == '1') {
              echo "checked";
            } else {
              echo "";
            }
            echo "></input></td><td><input type='checkbox' name='iseditor' ";
            if ($row["isEditor"] == '1') {
              echo "checked";
            } else {
              echo "";
            }
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
            if (isset($rs)) {
              if ($rs) {
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
  </main>
  <?php require "../data/footer-admin.php"; ?>
</body>

</html>