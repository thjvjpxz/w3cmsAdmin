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
            <article class="row main-content h-100">
                <div class="col rounded-2 p-3 ps-4 mt-5">
                    <div class="mb-3 d-flex">
                        <a href="?c=user&a=add" class="btn btn-primary ms-auto">Add user</a>
                    </div>
                        <?php
                            if (isset($_GET['noti'])) {
                        ?>
                                <div class="mb-3">
                                    <p class="bg-success rounded py-2 px-3 fs-5 text-white"><?= $_GET['noti']; ?> </p>
                                </div>
                        <?php
                            }
                        ?>
<!--                    Table data-->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="col text-center">#</th>
                                <th class="col-3">Username</th>
                                <th class="col-3">Email</th>
                                <th class="col-2">Created At</th>
                                <th class="col text-center">Edit</th>
                                <th class="col text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            require_once ('../app/controllers/HomeController.php');
                            if (isset($users)) {
                                foreach ($users as $u) {
                        ?>
                                    <tr>
                                        <th class="text-center"><?= $u['id'] ?></th>
                                        <td><?= $u['uname'] ?></td>
                                        <td><?= $u['email'] ?></td>
                                        <td><?= date('d-m-Y', strtotime($u['created_at'])) ?></td>
                                        <td class="text-center"><a href="?c=user&a=edit&id=<?= $u['id']; ?>"><i class="bi bi-pen"></i></a></td>
                                        <td class="text-center">
<!--                                            Button delete-->
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#i<?= $u['id']; ?>"><i class="bi bi-trash"></i></a>
<!--                                            Confirm delete-->
                                            <div class="modal fade" id="i<?= $u['id']; ?>" aria-labelledby="confirmDelete">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmDelete">Confirm delete</h5>
                                                            <button data-bs-dismiss="modal" aria-label="Close" class="btn-close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>ARE YOU SURE ?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="?c=user&a=delete&id=<?= $u['id']; ?>" class="btn btn-primary">OK</a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        ?>
                        </tbody>
                    </table>
<!--                    End table data-->
<!--                    Pagination-->
                    <nav class="d-flex">
                        <ul class="pagination ms-auto">
                            <?php
                                // Trang trước sẽ bằng trang hiện hành - 1
                                $previousPage = $page['curPage'] - 1 ;
                                $previousLink = "?c=user&p=$previousPage"; // gán link với $_GET['p'] = $previousPage

                                // Trang sau sẽ bằng trang hiện hành + 1
                                $nextPage = $page['curPage'] + 1;
                                $nextLink = "?c=user&p=$nextPage";
                            ?>
<!--                            <p>--><?php //= $nextPage ?><!--</p>-->
                            <li class="page-item">
                                <a href="<?=$previousLink;?>" class="page-link <?php if ($page['curPage'] == 1) echo "visually-hidden"; ?>">Previous</a>
                            </li>
                            <?php
                                $curr = $page['curPage'];
                                /*
                                 * (Ý nghĩa của đoạn này là nếu số trang >= 3 thì chỉ hiển thị các trang trước và sau nó)
                                 * ví dụ đang ở trang 3 thì chỉ hiển thị lựa chọn trang 2 và trang 4
                                 *
                                 * nếu trang hiện hành đang ở trang cuối thì chỉ hiển thị trang trước nó
                                 * nếu trang hiện hành không phải trang cuối thì hiển thị trang trước và sau nó
                                 */
                                $begin = $curr == 1 ? 1 : $curr - 1;
                                $end = ($curr == $page['totalPage']) ? $curr : $curr + 1;
                                for ($i = $begin; $i <= $end; $i++) {
                            ?>
                                    <li class="page-item">
                                        <a href="?c=user&p=<?=$i?>" class="page-link <?php if ($i == $page['curPage']) echo "active" ?>"><?=$i?></a>
                                    </li>
                            <?php
                                }
                            ?>
                            <li class="page-item">
                                <a href="<?=$nextLink?>" class="page-link <?php if ($page['curPage'] == $page['totalPage']) echo "visually-hidden" ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </article>
        </section>
        <!--            End main content-->
    </div>
</div>
<script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>