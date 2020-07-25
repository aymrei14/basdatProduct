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
            <a class="navbar-brand">
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
        <h3>YOUR WORK</h3>
        <table class="table table-hover">
            <thead style="background: #888888;">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Berkas</th>
                    <th scope="col">Waktu</th>
                    <th scope="col">Tema</th>
                    <th scope="col">File</th>
                    <th scope="col">Status Berkas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <?php
            $sql = "SELECT * FROM `berkas` WHERE `idpeserta`= '" . $row['idpeserta'] . "' ORDER BY waktu ";
            $data = $mysqli->query($sql);
            $no = 0;
            while ($row = $data->fetch_array()) {
                $no++;
            ?>
                <tbody>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['idberkas'] ?></td>
                        <td><?= $row['waktu'] ?></td>
                        <td><?= $row['tema'] ?></td>
                        <td><img src="berkas/<?= $row['berkas'] ?>" width="150"></td>
                        <td><?= $row['statusberkas'] ?></td>
                        <td>
                            <!-- Delete -->
                            <a href="<?php if ($row['statusberkas'] == "Terkirim") {
                                            echo "prosesdelete.php?idberkas=" . $row['idberkas'] . "&nama=" . $row['berkas'];
                                        } ?>" type="button" class="btn btn-danger btn-sm">Delete</a>
                            <!-- Edit -->
                            <a href="#" type="button" class="btn btn-success btn-sm" style="margin-left:5px;" data-toggle="modal" data-target="<?php if ($row['statusberkas'] == "Terkirim") {
                                                                                                                                                    echo "#editModal" . $row['idberkas'];
                                                                                                                                                } ?>">Edit</a></td>
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
                                    <form method="POST" action="prosesedit.php" enctype="multipart/form-data">
                                        <input type="hidden" class="form-control" id="formGroupExampleInput" name="idberkas" value="<?= $row['idberkas'] ?>">
                                        <input type="hidden" class="form-control" id="formGroupExampleInput" name="berkas" value="<?= $row['berkas'] ?>">
                                        <div class="form-group">
                                            <label for="tema">Tema</label>
                                            <input type="text" class="form-control" id="tema" name="tema" value="<?= $row['tema'] ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <img src="berkas/<?= $row['berkas'] ?>" width="100">
                                        </div>
                                        <div class="form-group">
                                            <label for="uploadfile">Upload File</label>
                                            <input type="file" class="form-control-file" id="uploadfile" name="file">
                                        </div>
                                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Kembali</button>
                                        <input type="submit" class="btn btn-success btn-sm" name="submit" value="Submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            }
                ?>
                </tbody>
        </table>
    </section>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>