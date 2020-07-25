<?php
session_start();
include 'connect.php';

if (isset($_POST['submit'])) {
    // generate id berkas dan mengambil value data yang ditambah
    $file = $_FILES['file'];
    $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $idBerkas = substr(str_shuffle($data), 0, 6);
    $tema = $_POST['tema'];
    $status = 'Terkirim';

    // Mengambil id peserta yang sesuai dengan session
    $email = $_SESSION['email'];
    $data = $mysqli->query("SELECT * FROM peserta where `email` = '" . $email . "'");
    $row = $data->fetch_array();
    $idPeserta = $row['idpeserta'];

    // value dari data file
    $fileName = $_FILES['file']['name'];
    $filetmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];

    // tempat file disimpan
    $fileTarget = 'berkas/' . basename($fileName);

    // tipe data file
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    // tipe yang dibolehkan
    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                $sql = "INSERT INTO `berkas`(`idberkas`, `tema`, `berkas`, `statusberkas`, `idpeserta`) VALUES ('$idBerkas','$tema','$fileName','$status','$idPeserta')";
                $result = $mysqli->query($sql);
                if (!$result) {
                    printf("Error description: " . $mysqli->error);
                    exit();
                } else {
                    move_uploaded_file($filetmpName, $fileTarget);
                    header('Location: menuyourwork.php?uploadsuccess');
                }
            } else {
                printf("Your file is too big!");
            }
        } else {
            printf("There was an error when uploading your file!");
        }
    } else {
        printf("You can't upload files of this type!");
    }
}
