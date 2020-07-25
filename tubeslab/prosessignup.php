<?php
include 'connect.php';
if (isset($_POST['submit'])) {
    //generate id peserta dan cek data id agar id tidak sama
    $datahuruf = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $idpeserta = substr(str_shuffle($datahuruf), 0, 6);
    $data = $mysqli->query("SELECT * FROM peserta where `idpeserta` = '" . $idpeserta . "'");
    $cek = mysqli_num_rows($data);
    while ($cek != NULL) {
        $idpeserta = substr(str_shuffle($datahuruf), 0, 6);
        $data = $mysqli->query("SELECT * FROM peserta where `idpeserta` = '" . $idpeserta . "'");
        $cek = mysqli_num_rows($data);
    }
    //value dari inputan user
    $namadepan = $_POST['namadepan'];
    $namabelakang = $_POST['namabelakang'];
    $nohp = $_POST['nohp'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    if ($_POST['password'] != $_POST['confirmpassword']) {
        header("Location: signup.php?confirmpasswordtidaksamadenganpassword");
    } else {
        $sql = "INSERT INTO `peserta`(`idpeserta`, `namadepan`, `namabelakang`, `status`, `alamat`, `nohp`, `email`, `password`, `idlevel`) VALUES ('$idpeserta','$namadepan','$namabelakang','$status','$alamat','$nohp','$email','$password',2)";
        $result = $mysqli->query($sql);
        if (!$result) {
            printf("Error description: " . $mysqli->error);
            exit();
        } else {
            header('Location: login.php?signupsuccesssilahkanlogin');
        }
    }
}
