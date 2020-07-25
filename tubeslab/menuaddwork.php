<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("Location: login.php?silahkanlogin");
} else {
    if ($_SESSION['level'] != "peserta") {
        header("Location: aksesblok.php");
    }
}
include 'connect.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <title>Comic Strip Competition</title>

    <style>
        .navbar {
            background: #27496d;
            margin-bottom: 0px;
            padding: 0px;
        }

        body {
            font-family: 'Raleway', sans-serif;
            font-size: 14px;
        }

        .navbar-brand {
            margin-left: 600px;
        }

        .sidebar {
            width: 100%;
            height: 100%;
            position: fixed;
            z-index: 100;
            background: #3f3f44;
            font-size: 16px;
            padding-top: 50px;
        }

        @media (min-width: 768px) {
            .sidebar {
                width: 240px;
            }

            .content {
                width: 600px;
            }
        }

        .list-group-item {
            background: transparent;
            color: white;

        }

        .list-group-item:hover {
            color: #8ec6c5;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            padding-top: 70px;
        }

        .card {
            background: transparent;
        }

        .card-body {
            font-size: 14px;
            line-height: 0px;
        }
    </style>

</head>

<body>


    <section id="nav-bar">
        <nav class="navbar fixed-top">
            <a class="navbar-brand" href="menupeserta.php">
                <img src="image/logo1.png" width="70" height="35">
            </a>
        </nav>
    </section>
    <aside class="sidebar">
        <?php
        $email = $_SESSION['email'];
        $data = $mysqli->query("SELECT * FROM peserta where `email` = '" . $email . "'");
        $row = $data->fetch_array();
        ?>
        <ul class="list-group text-white">
            <div class="card">
                <center>
                    <div class="card-header">
                        No Peserta : <?= $row['idpeserta'] ?>
                    </div>
                </center>
                <div class="card-body">
                    <p class="card-text"><?= $row['namadepan'] ?> <?= $row['namabelakang'] ?> </p>
                    <p class="card-text"><?= wordwrap($row['email'], 26, "<br />", 1) ?>
                        <p class="card-text"><?= $row['nohp'] ?></p>
                </div>
            </div>

            <a href="menuaddwork.php" class="list-group-item"><i class="fas fa-file-alt"></i>Add Work</a>
            <a href="menuyourwork.php" class="list-group-item">Your Work</a>
            <a href="menusetting.php" class="list-group-item">Setting</a>
            <a href="proseslogout.php" class="list-group-item">Logout</a>
        </ul>

    </aside>
    <section class="content">
        <h3>ADD YOUR WORK</h3>
        <form method="POST" action="prosestambah.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tema">Tema</label>
                <input type="input" class="form-control" id="tema" name="tema" required>
            </div>
            <div class="form-group">
                <label for="uploadfile">Upload File</label>
                <input type="file" class="form-control-file" id="uploadfile" name="file" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">Saya menyatakan bahwa karya ini asli karya saya sendiri.</label>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck2" required>
                <label class="form-check-label" for="exampleCheck2">Saya menyatakan bahwa karya ini tidak mengandung unsur SARA dan Pornografi.</label>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>