<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-icons/bootstrap-icons.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <h5 class="text-center fs-1 mt-5 pt-5 pb-3">Login</h5>
            <form action="" method="post" class="col-md-4 mx-auto">
                <label for="uname" class="input-group pb-2">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" placeholder="Enter your email or username" name="uname" id="uname" class="form-control" required>
                </label>
                <label for="pass" class="input-group pb-2">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" placeholder="Enter your password" name="pass" id="pass" class="form-control" required>
                </label>
                <label for="" class="form-check pb-2">
                    <input type="checkbox" class="form-check-input">
                    <span>Save account</span>
                </label>
                <?php
                    if (isset($_GET['err'])) {

                ?>
                        <div class="bg-danger text-white rounded ps-2 py-1"><?= $_GET['err'] ?></div>

                <?php
                    }
                ?>
                <button class="btn btn-primary w-100 mt-2" name="btnLogin" type="submit">Login</button>
                <a href=".?a=register" class="btn btn-secondary w-100 mt-2">Register</a>
            </form>
        </div>
    </div>
<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>