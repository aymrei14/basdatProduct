<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <title>Register - Comic Strip Competition</title>
    <style>
        body {
            background-color: #34346b;
        }

        .card {
            border-color: #34346b;
        }

        .col {
            text-align: left;
        }
    </style>
</head>

<body>
    <br>
    <div class="d-flex justify-content-center">
        <div class="card">
            <img src="image/logo.png" class="card-img-top" style="width: 600px;">
            <div class="card-body text-center">
                <h5 class="card-title">Register your account</h5>
                <form action="prosessignup.php" method="POST">
                    <div class="row">
                        <div class="col">
                            <label for="namadepan">Nama Depan</label>
                            <input type="text" class="form-control" name="namadepan" placeholder="Nama Depan" required>
                        </div>
                        <div class="col">
                            <label for="Nama Belakang">Nama Belakang</label>
                            <input type="text" class="form-control" name="namabelakang" placeholder="Nama Belakang" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="nohp">No HP</label>
                            <input type="text" class="form-control" id="nohp" name="nohp" placeholder="No HP/No Telp/No WA" required>
                        </div>
                        <div class="col">
                            <label for="email">Email </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option>Mahasiswa/i</option>
                                <option>Siswa/i</option>
                                <option>Umum</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="Alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Alamat" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
                        </div>
                        <div class="col">
                            <label for="ConfirmPassword">Confirm Password </label>
                            <input type="password" class="form-control" id="ConfirmPassword" name="confirmpassword" placeholder="ConfirmPassword" required>
                        </div>
                    </div>
                    <br>
                    <a href="index.php" class="btn btn-warning">Back To Home</a>
                    <button type="submit" name="submit" class="btn btn-danger">SignUp</button>
                    <br>
                    <small class="card-text">Have an account? <a href="login.php">Login</a></small>
                </form>
            </div>
        </div>
    </div>
    <br>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>