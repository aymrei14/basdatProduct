<?php
$mysqli = new mysqli("localhost", "root", "", "tubeslab");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
