<?php
   session_start();
?>
<aside class="col-md-2 pt-3 rounded-end-5 bg-white">
    <div class="row logo">
        <a href="#" class="">
            <img src="./images/logo1.png" class="w-75 mx-auto d-block" alt="logo">
        </a>
    </div>
    <!--                End logo-->
    <!--                Start nav-->
    <nav class="row navbar px-3 mt-2">
        <ul class="navbar-nav col-10 mx-auto">
            <li class="nav-item text-danger fs-5 text-center">
                Xin chào, <span class="fw-bold"><?= $_SESSION['isLogin']; ?></span>
            </li>
            <li class="nav-item">
                <a href="?c=user" class="color-danger text-black-50 fs-5 d-flex align-items-center gap-3 nav-link">
                    <i class="bi bi-person text-danger"></i>
                    <span>User</span>
                    <i class="bi bi-caret-right-fill ms-auto"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="." class="color-danger text-black-50 fs-5 d-flex align-items-center gap-3 nav-link">
                    <i class="bi bi-grid text-danger"></i>
                    <span>Dashboard</span>
                    <i class="bi bi-caret-right-fill ms-auto"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="color-danger text-black-50 fs-5 d-flex align-items-center gap-3 nav-link">
                    <i class="bi bi-info-circle text-danger"></i>
                    <span>App</span>
                    <i class="bi bi-caret-right-fill ms-auto"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="?a=logout" class="color-danger text-black-50 fs-5 d-flex align-items-center gap-3 nav-link">
                    <i class="bi text-danger bi-box-arrow-right"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>
    </nav>
</aside>