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
                <article class="row main-content">
                    <div class="col-md-4 bg-success rounded-2 p-3 ps-4 mt-5">
                        <a href="#" class="text-decoration-none">
                            <h1 class="text-white">Join Now and Get <br>Discount Voucher Up To <br>20%</h1>
                        </a>
                    </div>
                </article>
            </section>
<!--            End main content-->
        </div>
    </div>
<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>