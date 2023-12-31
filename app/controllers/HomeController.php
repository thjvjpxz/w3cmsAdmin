<?php
    require_once ('../app/models/UserModel.php');
    require_once ('../app/models/User.php');
//    require_once ('../config/Database.php');
    class HomeController {
        private UserModel $userModel;

        public function __construct()
        {
            $this->userModel = new UserModel();
        }

        public function index() : void {
            require_once ('../app/views/index.php');
        }

        public function login() : void {
            /*
             * Phương thức sử dụng để hiển thị trang chủ của web
             */
            if (isset($_POST['btnLogin'])) {
                $uname = $_POST['uname'];
                $pass = $_POST['pass'];
                $uname_get = '';
                $this->userModel->verifyLogin($uname, $pass);
//                header('Location: .?c=home&a=index');
//                echo $noti;
//                $pass_default = '123';
//                $pass = '$2y$10$PmEVldGpaoXf8/tOMvnE9.GBgDuOZSyw9JQnRl1iuHrniPm89jvom';
//                echo (!password_verify($pass_default, $pass)) ? "Not match" : "Match";
            }
            require_once '../app/views/login.php'; // Yêu cầu file index.php để hiển thị trang chủ
        }

        public function logout() : void {
            session_start();
            if (isset($_SESSION['isLogin'])) {
                unset($_SESSION['isLogin']);
                header('Location: .?a=login');
            }
        }

        public function register() : void {
            if (isset($_POST['btnAdd'])) {
                $uname = $_POST['uname'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                if ($pass != $_POST['re-pass']) {
                    header('Location: .?a=register&err=Password and Re-password not match');
                    return;
                }
                $user_new = new User($uname, $pass, $email);
//                echo "<pre>";
//                print_r($user_new);
//                echo "</pre>";
                $noti = $this->userModel->createUser($user_new);

                header("Location: .?a=register&err=$noti");
            }
            require_once('../app/views/register.php');
        }
    }