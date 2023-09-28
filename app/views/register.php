<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-icons/bootstrap-icons.min.css">
</head>
<body>
<div class="container-fluid vh-100">
        <!--            Start main content-->
            <article class="row main-content h-100">
                <form method="POST" action="" class="col-md-4 d-flex flex-column mt-5 pt-5 mx-auto">
                    <p class="fs-1 fw-bold text-center">REGISTER USER</p>
                    <?php
                        if (isset($_GET['err'])) {
                            if ($_GET['err'] === "success") {
                                ?>
                                <div class="text-white bg-success mb-2 ps-3 py-1 rounded">Registed successfully</div>
                                <?php
                            } else {
                                ?>
                                <div class="text-white bg-danger mb-2 ps-3 py-1 rounded"><?= $_GET['err']; ?></div>
                                <?php
                            }
                        }
                    ?>
                    <label for="uname" class="input-group mb-2">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" id="uname" name="uname" class="form-control" placeholder="Enter username" required>
                    </label>
                    <label for="email" class="input-group mb-2">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </label>
                   <label for="pass" class="input-group mb-2">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Enter your password" required>
                   </label>
                    <label for="re-pass" class="input-group mb-2">
                        <span class="input-group-text"><i class="bi bi-key"></i></span>
                        <input type="password" id="re-pass" name="re-pass" class="form-control" placeholder="Re-enter your password" required>
                    </label>
                    <div class="d-flex justify-content-center gap-3">
                        <button class="btn btn-primary" type="submit" name="btnAdd">Register</button>
                        <a href="?a=login" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
        <!--            End main content-->
    </div>

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jquery.min.js"></script>
</body>
</html>