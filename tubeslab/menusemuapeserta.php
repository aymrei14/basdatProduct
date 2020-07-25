<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("Location: login.php?silahkanlogin");
} else {
    if ($_SESSION['level'] != "admin") {
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

        .table>.thead>.tbody {
            border-radius: 3px;
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

        <ul class="list-group text-white">
            <div class="card">
                <center>
                    <div class="card-header">
                        <h4>Welcome, Admin!</h4>
                    </div>
                </center>
            </div>

            <a href="menusemuapeserta.php" class="list-group-item"><i class="fas fa-file-alt"></i>All Participant</a>
            <a href="menusemuaberkas.php" class="list-group-item">All Files</a>
            <a href="proseslogout.php" class="list-group-item">Logout</a>
        </ul>

    </aside>
    <section class="content">
        <h3>ALL PARTICIPANT</h3>
        <table class="table table-hover">
            <thead style="background: #888888;">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">No Peserta</th>
                    <th scope="col">Nama Depan</th>
                    <th scope="col">Nama Belakang</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `peserta`";
                $data = $mysqli->query($sql);
                $no = 0;
                while ($row = $data->fetch_array()) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['idpeserta'] ?></td>
                        <td><?= $row['namadepan'] ?></td>
                        <td><?= $row['namabelakang'] ?></td>
                        <td><?= $row['nohp'] ?></td>
                        <td><?= $row['email'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>