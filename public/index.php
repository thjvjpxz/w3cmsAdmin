<?php
    /*
     * file index.php này đóng vai trò là Routing
     * Công việc của file này này phân tích URL để kiểm tra Controller và Action
     */
    // require_once '../app/controllers/HomeController.php'; // Yêu cầu file HomeController.php để sử dụng class HomeController();

    $controller = $_GET['c'] ?? 'home'; // Nếu tồn tại value của biến _GET['c'] thì gán cho $controller value của biến _GET
    // Nếu không tồn tại thì gán 'home'
    $action = $_GET['a'] ?? 'index'; // Giống trên, gán $action = value của _GET['a'] còn không thì gán 'index'
//    $curPage = $_GET['p'] ?? '1';
    // Xử lý path
    $controller = ucfirst($controller) . 'Controller'; // In hoa chữ cái đầu của $controller (Ví dụ: $controller = 'home' --> $controller = 'HomeController'
    $pathController = "../app/controllers/" . $controller . ".php"; // Path
//    echo $pathController . "--" . $action;

    // nếu đường dẫn không tồn tại thì hiển thị thông báo và dừng đoạn code phía dưới nó
    if (!file_exists($pathController)) {
        die("Đường dẫn không tồn tại");
    }

    include_once ($pathController);

    $myController = new $controller(); // tạo đối tượng controller
    $myController->$action(); // gọi phương thức tương ứng với action