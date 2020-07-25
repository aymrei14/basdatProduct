<?php
session_start();
include 'connect.php';
if (isset($_POST['submit'])) {
    $idpeserta = $_POST['idpeserta'];
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $nohp = $_POST['nohp'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    $sql = "UPDATE `peserta` SET `namadepan`='$namadepan', `namabelakang`='$namabelakang', `nohp`='$nohp' ,`email`='$email' , `status`='$status', `alamat`='$alamat' WHERE `idpeserta`='$idpeserta'";
    $result = $mysqli->query($sql);
    if (!$result) {
        printf("Error description: " . $mysqli->error);
        exit();
    } else {
        header('Location: menusetting.php?updatesuccess');
    }
}
