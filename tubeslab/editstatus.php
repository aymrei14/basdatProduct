<?php
session_start();
include 'connect.php';
if (isset($_POST['submit'])) {

    $idberkas = $_POST['idberkas'];
    $status = $_POST['statusberkas'];

    $sql = "UPDATE `berkas` SET `statusberkas`= '$status' WHERE `idberkas` = '$idberkas'";
    $result = $mysqli->query($sql);
    if (!$result) {
        printf("Error description: " . $mysqli->error);
        exit();
    } else {
        header('Location: menusemuaberkas.php?updatestatussukses');
    }
}
