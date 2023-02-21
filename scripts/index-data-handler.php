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