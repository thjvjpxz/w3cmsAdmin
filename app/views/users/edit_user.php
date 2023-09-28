<?php
    include ('../app/views/includes/askLogin.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>W3CMS</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap-icons/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="container-fluid vh-100">
    <div class="row h-100 bg-secondary-subtle">
        <!--            Start aside-->
        <?php
            require_once ('../app/views/includes/aside.php');
        ?>
        <!--            End aside-->
        <!--            Start main content-->
        <section class="col-md-10 pt-3 px-5">
            <!--                Header-->
            <?php
                require_once ('../app/views/includes/header.php');
            ?>
            <!--                End header-->
            <?php
                if (isset($user_old)) {

            ?>
            <article class="row main-content h-100">
                <div class="mt-5 pt-5">
                    <p class="fs-1 fw-bold text-center">EDIT USER</p>
                    <form action="" class="col-md-4 mx-auto" method="post">
                        <?php
                            if (isset($_GET['err'])) {
                                if ($_GET['err'] == 'success') {
                        ?>
                                    <div class="bg-success text-white mb-2 ps-3 py-1 rounded"><?= "Edited successfully" ?></div>
                        <?php
                                } else {
                                    ?>
                                    <div class="bg-danger text-white mb-2 ps-3 py-1 rounded"><?= $_GET['err'] ?></div>
                        <?php
                                }
                            }
                        ?>
                        <label for="id" class="form-label">ID:</label>
                        <input type="text" class="form-control fw-bold text-danger bg-opacity-25 bg-secondary" id="id" name="id" readonly value="<?= $user_old['id']; ?>">
                        <label for="uname" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="uname" name="uname" value="<?= $user_old['uname'] ?>">
                        <label for="email" class="form-label mt-2">Email:</label>
                        <input type="email" class="form-control mb-3" id="email" name="email" value="<?= $user_old['email'] ?>">
                        <div class="d-flex justify-content-center gap-3">
                            <button class="btn btn-primary" type="submit" name="btnEdit">Save</button>
                            <a href="?c=user" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </article>
            <?php
                }
            ?>
        </section>
        <!--            End main content-->
    </div>
</div>

<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/jquery.min.js"></script>
</body>
</html>