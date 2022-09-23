<?php session_start() ?>
<!DOCTYPE html>
<html>

<head>
    <title>SD Negeri Jatibarang 01</title>

    <link rel="shortcut icon" href="assets/img/Sekolah Dasar.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <script src="bootstrap4/js/bootstrap.js"></script>
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
</head>

<body>
    <div class="container">
        <div class="w-25 mx-auto text-center mt-5">
            <div class="card bg-dark text-light">
                <div class="card-body">
                    <h2 class="card-title">LOGIN</h2>
                    <form method="post" action="akses.php">
                        <div class="form-group">
                            <label for="username">Nama user</label>
                            <input class="form-control" type="text" name="username" id="username" autofocus>
                        </div>
                        <div class="form-group">
                            <label for="passw">Password</label>
                            <input class="form-control" type="password" name="password" id="password">
                        </div>
                        <div>
                            <button class="btn btn-info" type="submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>