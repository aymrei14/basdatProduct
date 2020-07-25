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
        <h3>ALL FILES</h3>
        <table class="table table-hover">
            <thead style="background: #888888;">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Berkas</th>
                    <th scope="col">No Peserta</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Tema</th>
                    <th scope="col">File</th>
                    <th scope="col">Status Berkas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `berkas` ORDER BY waktu ";
                $data = $mysqli->query($sql);
                $no = 0;
                while ($row = $data->fetch_array()) {
                    $no++;
                ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['idberkas'] ?></td>
                        <td><?= $row['idpeserta'] ?></td>
                        <td><?= $row['waktu'] ?></td>
                        <td><?= $row['tema'] ?></td>
                        <td><img src="berkas/<?= $row['berkas'] ?>" width="150"></td>
                        <td><?= $row['statusberkas'] ?></td>
                        <td>
                            <!-- Edit -->
                            <a href="#" type="button" class="btn btn-success btn-sm" style="margin-left:5px;" data-toggle="modal" data-target="#editModal<?= $row['idberkas'] ?>">Edit Status</a></td>
                    </tr>
                    <!-- Modal Edit -->
                    <div class="modal fade" id="editModal<?= $row['idberkas'] ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <center>
                                        <h4>Edit Your File</h4>
                                    </center>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="editstatus.php" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" id="formGroupExampleInput" name="idberkas" value="<?= $row['idberkas'] ?>">
                                        <input type="hidden" class="form-control" id="formGroupExampleInput" name="berkas" value="<?= $row['berkas'] ?>">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" id="statusberkas" name="statusberkas" required>
                                                <option value="Terkirim" <?php if ($row['statusberkas'] == "Terkirim") {
                                                                                echo "selected";
                                                                            } ?>>Terkirim</option>
                                                <option value="Lolos" <?php if ($row['statusberkas'] == "Lolos") {
                                                                            echo "selected";
                                                                        } ?>>Lolos</option>
                                                <option value="Gagal" <?php if ($row['statusberkas'] == "Gagal") {
                                                                            echo "selected";
                                                                        } ?>>Gagal</option>
                                            </select>
                                        </div>
                                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Kembali</button>
                                        <input type="submit" class="btn btn-success btn-sm" name="submit" value="Submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </tbody>

        <?php } ?>
        </table>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>