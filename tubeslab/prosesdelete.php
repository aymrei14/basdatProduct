<?php
session_start();
include 'connect.php';

$path = "berkas/" . $_GET['nama'];
if (unlink($path)) {
    $idberkas = $_GET['idberkas'];
    $sql = "DELETE FROM `berkas` WHERE `idberkas` = '$idberkas'";
    $result = $mysqli->query($sql);
    if (!$result) {
        printf("Error description: " . $mysqli->error);
        exit();
    } else {
        header('Location: menuyourwork.php?deletesuccess');
    }
} else {
    printf("You have an error!");
}
