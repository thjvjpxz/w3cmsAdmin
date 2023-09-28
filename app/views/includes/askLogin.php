<?php

    session_start();
    if (!$_SESSION['isLogin']) {
        header('Location: .?a=login');
    }
