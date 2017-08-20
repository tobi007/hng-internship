<?php

// Get Variables
$dbn = $_GET["dbname"];
$dbun = $_GET["dbusername"];
$dbp = $_GET["dbpass"];
$dbh = $_GET["dbhost"];


$connection = mysql_connect("$dbh", "$dbun", "$dbp");
if (!$connection) {
    die('Could not connect: ' . mysql_error());
} else {
    echo "Connected";

    $dbcheck = mysql_select_db("$dbn");
    if (!$dbcheck) {
        echo mysql_error();
    } else {
        echo "<p>Successfully connected to the database '" . $database . "'</p>\n";
// Check tables
        $sql = "SHOW TABLES FROM `$database`";
        $result = mysql_query($sql);
        if (mysql_num_rows($result) > 0) {
            echo "<p>Available tables:</p>\n";
            echo "<pre>\n";
            while ($row = mysql_fetch_row($result)) {
                echo "{$row[0]}\n";
            }
            echo "</pre>\n";
        } else {
            echo "<p>The database '" . $database . "' contains no tables.</p>\n";
            echo mysql_error();
        }
    }
}
?>