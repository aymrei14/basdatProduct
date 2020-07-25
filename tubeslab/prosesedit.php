<?php
session_start();
include 'connect.php';
if (isset($_POST['submit'])) {
    // var_dump($_FILES['file']['name']);
    // die;
    $fileName = $_FILES['file']['name'];
    $filetmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $filetype = $_FILES['file']['type'];

    $fileTarget = 'berkas/' . basename($fileName);

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    $path = "berkas/" . $_POST['berkas'];
    $idberkas = $_POST['idberkas'];
    $tema = $_POST['tema'];
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d H:i:s');

    if ($fileName != "") {
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 10000000) {
                    unlink($path);
                    $sql = "UPDATE `berkas` SET `waktu`='$date', `tema`='$tema', `berkas`='$fileName' WHERE `idberkas`='$idberkas'";
                    $result = $mysqli->query($sql);
                    if (!$result) {
                        printf("Error description: " . $mysqli->error);
                        exit();
                    } else {
                        move_uploaded_file($filetmpName, $fileTarget);
                        header('Location: menuyourwork.php?updatesuccess');
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
    } else {
        $sql = "UPDATE `berkas` SET `waktu`='$date',`tema`='$tema' WHERE `idberkas`='$idberkas'";
        $result = $mysqli->query($sql);
        if (!$result) {
            printf("Error description: " . $mysqli->error);
            exit();
        } else {
            header('Location: menuyourwork.php?updatesuccess');
        }
    }
}
