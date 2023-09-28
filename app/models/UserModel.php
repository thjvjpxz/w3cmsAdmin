<?php
    require_once ('../config/Database.php');
    class UserModel {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
            $this->db = $this->db->getConn();
        }
        public function createUser(User $user): string
        {
            $uname = $user->getUname();
            $email = $user->getEmail();
            $pword = $user->getPword();
//            Truy vấn kiểm tra trùng uname hoặc email
            $query_check = "SELECT * FROM user WHERE uname = '$uname' OR email = '$email'";
            $stmt = $this->db->prepare($query_check);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                 return "Email or Username already exist";
            }
//            Password hash
            $pword = password_hash($pword, PASSWORD_DEFAULT);
//            Truy vấn thêm user
            $query = "INSERT INTO user(uname, pword, email) VALUES ('$uname', '$pword', '$email')";
            $stmt = $this->db->prepare($query);
            if ($stmt->execute()){
                return "success";
            }
            return "Add new user failed";
        }
//        Get total Records - Lấy tổng số bản ghi
        public function getTotalRecords() : int {
            $query = "SELECT count(*) as totalRecords FROM user ORDER BY id";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && isset($result['totalRecords']))
                return $result['totalRecords'];
            return 0;
        }
        public function getAllUser($perPage, $offset): array
        {
            /*
             * $perPage là số bản ghi trên 1 trang
             * $offset là số bản ghi bắt đầu từ value của offset
             */
//            Câu truy vấn
            $query = "SELECT * FROM user ORDER BY id LIMIT $perPage OFFSET $offset";
//            Thực thi SQL
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            // trả dữ liệu về duới dạng mảng kết hợp
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getUserById($id) {
            $sql = "SELECT id, uname, email FROM user WHERE id = $id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public function deleteUserById($id): bool
        {

            $sql = "DELETE FROM user WHERE id = $id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            return $rowCount > 0;
        }
        public function editUserById($id, $unameNew, $emailNew) : string {
            $sql_check = "SELECT * FROM user WHERE (uname = '$unameNew' OR email = '$emailNew') AND id != $id";
            $stmt = $this->db->prepare($sql_check);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                return 'Username or Email already exist';
            } else {
                $sql_update = "UPDATE user SET uname = '$unameNew', email = '$emailNew' WHERE id = $id";
                $stmt = $this->db->prepare($sql_update);
                if ($stmt->execute()) {
                    return 'success';
                }
                return 'Edit user fail';
            }
        }

        public function verifyLogin($uname, $pass): void
        {
            $sql = "SELECT uname, pword FROM user WHERE uname = '$uname' OR email = '$uname'";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() > 0 ) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!password_verify($pass, $user['pword'])) {
                    header('Location: .?a=login&err=Password not match');
                } else {
                    session_start();
                    $_SESSION['isLogin'] = $user['uname'];
                    header ('Location: .?a=index');
                }
            } else {
                header('Location: .?a=login&err=Username or Email not exist');
            }
        }
    }
