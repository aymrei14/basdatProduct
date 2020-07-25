<?php
session_start();
include('connect.php');
//value dari inputan user
$email = $_POST['email'];
$password = $_POST['password'];
// cek data login di database
$dataPeserta = $mysqli->query("SELECT * FROM peserta where `email` = '" . $email . "' and `password` = '" . $password . "'");
$dataAdmin = $mysqli->query("SELECT * FROM perusahaan where `emailperusahaan` = '" . $email . "' and `password` = '" . $password . "'");
$cekPeserta = mysqli_num_rows($dataPeserta);
$cekAdmin = mysqli_num_rows($dataAdmin);

if ($cekPeserta > 0) {
    $_SESSION['email'] = $email;
    $_SESSION['status'] = "login";
    $_SESSION['level'] = "peserta";
    header('Location: menuyourwork.php');
} else if ($cekAdmin > 0) {
    $_SESSION['email'] = $email;
    $_SESSION['status'] = "login";
    $_SESSION['level'] = "admin";
    header('Location: menusemuaberkas.php');
} else {
    header('Location: login.php?logingagal');
}
