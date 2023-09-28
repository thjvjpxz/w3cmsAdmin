<?php
    //namespace config;
    class Database {
        /*
         * Thông tin kết nối mysql
         * - hostname: Địa chỉ máy chủ Database(Lúc này là máy chủ cục bộ - localhost)
         * - username: Tên người dùng Database
         * - password: Mật khẩu Database
         */
        private string $hostname = 'localhost';
        private string $username = 'root';
        private string $password = '123';
        private string $dbname = 'adminsite';
        private $conn = NULL; // Biến chứa kết nối, khởi tạo biến $conn gán giá trị bằng NULL
        /*
         * Khởi tạo kết nối bằng PDO
         */
        public function __construct()
        {
            try {
                /*
                 * Khởi tạo kết nối với Database (Đang sử dụng MySQL)
                 * Sử dụng cách kết nối PDO
                 * Thông tin kết nối lấy từ các biến thành viên và được gán vào biến $conn;
                 */
                $this->conn = new PDO("mysql:hostname=$this->hostname;dbname=$this->dbname", $this->username, $this->password);
            } catch (PDOException $e) {
                echo "Có lỗi khi kết nối với database: " . $e->getMessage();
            }
        }

        public function getConn(): ?PDO
        {
            return $this->conn;
        }

        /*
         * Hàm db_excute trả về đối tượng PDOStatement nếu câu truy vấn thực thi thành công
         * Nếu không tồn tại kết nối SQL hoặc thực thi câu truy vấn lỗi thì trả về false
         */
//        public function db_excute($sql): false|PDOStatement
//        {
//            // Nếu tồn tại kết nối SQL
//            if (isset($this->conn)) {
//                try {
//                    $res = $this->conn->prepare($sql);
//                    $res->execute();
//                    return $res;
//                } catch (PDOException $e) {
//                    // throw new ErrorException("Lỗi thực thi câu lệnh: " . $e->getMessage());
//                    echo "Lỗi thực thi câu lệnh: " .$e->getMessage();
//                }
//            }
//            return false;
//        }
        /*
         * Hàm trả về tất cả bản ghi trong SQL của 1 table
         *  - Sử dụng hàm db_excute($sql) để thực thi câu lệnh của biến $sql
         *  - Kết quả câu lệnh truy vấn được lưu trong biến mảng $dataLst và là loại mảng kết hợp (Key->Value)
         */
//        public function db_getAllDataToTbl($tbl) : array {
//            $sql = "SELECT * FROM $tbl";
//            $dataLst = [];
//            $res = $this->db_excute($sql);
//            if ($res) {
//                // PDO::FETCH_ASSOC (Loại trả về là mảng kết hợp)
//                $dataLst = $res->fetchAll(PDO::FETCH_ASSOC);
//            }
//            return $dataLst;
//        }
    }
