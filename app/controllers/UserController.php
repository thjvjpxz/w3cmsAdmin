<?php
    require_once ('../app/models/UserModel.php');
    require_once ('../app/models/User.php');
    class UserController
    {
        private UserModel $userModel;
        public function __construct()
        {
            $this->userModel = new UserModel();
        }

        public function index() : void {
            /*
             * Phương thức hiển thị trang user
             */
            // Phân trang
            $perPage = 10;
            $curPage = $_GET['p'] ?? 1;
            $offset = ($curPage - 1) * $perPage;

//            $userModel = new UserModel();
            $users = $this->userModel->getAllUser($perPage, $offset);
//            echo "<pre>";
//            print_r($users);
//            echo "<pre>";
            // Total records
            $totalRecords = $this->userModel->getTotalRecords();
            // Total page
            $totalPage = ceil($totalRecords / 10); // Tổng số trang sẽ bằng tổng số bản ghi / 10 và làm tròn lên
            $page = [
                'curPage' => $curPage,
                'totalPage' => $totalPage
            ];
//            echo $totalRecords;
            require_once ('../app/views/users/user.php');
//            echo "$curPage";
        }

        public function delete() : void {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $uname = $this->userModel->getUserById($id);
                $res = $this->userModel->deleteUserById($id);
                $noti = "Username <span class='text-warning'>{$uname['uname']}</span> has been successfully deleted";
                if (!$res) {
                    $noti = "User not exist or has been deleted";
                }
                header("Location: .?c=user&i=$id&noti=$noti");
            }
//            require_once ('../app/views/user.php');

        }

        public function add() : void {
            if (isset($_POST['btnAdd'])) {
                $uname = $_POST['uname'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                if ($pass != $_POST['re-pass']) {
                    header('Location: .?c=user&a=add&err=Password and Re-password must be the same');
                    return;
                }
                $new_User = new User($uname, $pass, $email);
                $noti = $this->userModel->createUser($new_User);
//                echo "$noti";
                header('Location: .?c=user&a=add&err='.$noti);
            }
            require_once ('../app/views/users/add_user.php');
        }

        public function edit() : void {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $user_old = $this->userModel->getUserById($id);
                if (isset($_POST['btnEdit'])) {
                    $user_new = [
                        'id' => $id,
                        'uname' => $_POST['uname'],
                        'email' => $_POST['email']
                    ];
                    if ($user_new['uname'] == $user_old['uname'] && $user_new['email'] == $user_old['email']) {
                        header("Location: .?c=user&a=edit&id=$id&err=Please enter username or email you want to change");
                    }
                    else {
                        $noti = $this->userModel->editUserById($id, $user_new['uname'], $user_new['email']);
                        header("Location: .?c=user&a=edit&id=$id&err=$noti");
                    }
//                    echo  ($user_new['uname'] === $user_old['uname'] && $user_new['emai'] === $user_old['email']) ? "True" : "False";
//                    echo "<br>";
//                    echo "<pre>";
//                    print_r($user_old);
//                    echo "</pre>";
//                    echo "<pre>";
//                    print_r($user_new);
//                    echo "</pre>";
                }
            }
            require_once ('../app/views/users/edit_user.php');
        }
    }