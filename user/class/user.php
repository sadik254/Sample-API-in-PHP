<?php
  
    class User{
        // Connection
        private $conn;
        // Table
        private $db_table = "user";
        // Columns
        public $u_id;
        public $u_fullname;
        public $u_email;
        public $u_password;
        public $u_phone;
        public $u_image;
        public $code;
        public $status;
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getUser(){
            $sqlQuery = "SELECT u_id, u_fullname, u_email, u_phone, u_image, code, status FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        public function createUser(){
            if($this->isAlreadyExist()){
                return false;
            }
            
            $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        u_fullname = :u_fullname,
                        u_phone = :u_phone,
                        u_password = :u_password,
                        u_email = :u_email,
                        u_image = :u_image,
                        code = :code,
                        status = :status";
                        
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            // sanitize
            $this->u_fullname=htmlspecialchars(strip_tags($this->u_fullname));
            $this->u_phone=htmlspecialchars(strip_tags($this->u_phone));
            $this->u_password=htmlspecialchars(strip_tags($this->u_password));
            $this->u_email=htmlspecialchars(strip_tags($this->u_email));
            $this->u_image=htmlspecialchars(strip_tags($this->u_image));
            $this->code=htmlspecialchars(strip_tags($this->code));
            $this->status=htmlspecialchars(strip_tags($this->status));
            
        
            // bind data
            $stmt->bindParam(":u_fullname", $this->u_fullname);
            $stmt->bindParam(":u_phone", $this->u_phone);
            $stmt->bindParam(":u_password", $this->u_password);
            $stmt->bindParam(":u_email", $this->u_email);
            $stmt->bindParam(":u_image", $this->u_image);
            $stmt->bindParam(":code", $this->code);
            $stmt->bindParam(":status", $this->status);
            
            $from = "no-reply@reuse.sale";
            $to = "$this->u_email";
            $subject= "Registration Confirmation";
            $message = "Hello $this->u_fullname .  Please verify your reuse.sale account using the otp $this->code";
            $headers = "From:" .$from;
            if(mail($to,$subject,$message,$headers)){
                echo "The email was sent";
            }
            else{
                echo "The email can't be sent";
            }
            

        
            if($stmt->execute()){
               return true;
                  
            }
            return false;
        }
        
        function userMail(){
            $query = "SELECT
                        `u_id`, `u_fullname`, `u_email`, `code`
                    FROM
                        " . $this->db_table . " 
                    WHERE
                        u_email='".$this->u_email."'";
                        
                        $stmt = $this->conn->prepare($query);
                        $stmt->execute();
                        return $stmt;
                       
        }

        // login user method
        function login(){
            // select all query with user inputed username and password
            $query = "SELECT
                        `u_id`, `u_fullname`, `u_email`, `u_password`, `u_phone`, `u_image`
                    FROM
                        " . $this->db_table . " 
                    WHERE
                        u_email='".$this->u_email."' AND u_password='".$this->u_password."'";
            // prepare query statement
            $stmt = $this->conn->prepare($query);
            // execute query
            $stmt->execute();
            return $stmt;
        }

        // READ single
        public function getSingleUser(){
            $sqlQuery = "SELECT
                        u_id, 
                        u_fullname, 
                        u_phone,
                        u_email,
                        u_image,
                        code,
                        status
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       u_id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->u_id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->u_fullname = $dataRow['u_fullname'];
            $this->u_phone = $dataRow['u_phone'];
            $this->u_email = $dataRow['u_email'];
            $this->u_image = $dataRow['u_image'];
            $this->code = $dataRow['code'];
            $this->status = $dataRow['status'];
        }        
        // UPDATE
        public function updateUser(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        u_fullname = :u_fullname, 
                        u_phone = :u_phone, 
                        u_password = :u_password,
                        u_email = :u_email, 
                        u_image = :u_image,
                        code = :code,
                        status = :status
                    WHERE 
                        u_id = :u_id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->u_fullname=htmlspecialchars(strip_tags($this->u_fullname));
            $this->u_phone=htmlspecialchars(strip_tags($this->u_phone));
            $this->u_password=htmlspecialchars(strip_tags($this->u_password));
            $this->u_email=htmlspecialchars(strip_tags($this->u_email));
            $this->u_id=htmlspecialchars(strip_tags($this->u_id));
            $this->u_image=htmlspecialchars(strip_tags($this->u_image));
            $this->code=htmlspecialchars(strip_tags($this->code));
            $this->status=htmlspecialchars(strip_tags($this->status));
        
            // bind data
            $stmt->bindParam(":u_fullname", $this->u_fullname);
            $stmt->bindParam(":u_phone", $this->u_phone);
            $stmt->bindParam(":u_password", $this->u_password);
            $stmt->bindParam(":u_email", $this->u_email);
            $stmt->bindParam(":u_id", $this->u_id);
            $stmt->bindParam(":u_image", $this->u_image);
            $stmt->bindParam(":code", $this->code);
            $stmt->bindParam(":status", $this->status);
        
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteUser(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE u_id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->u_id=htmlspecialchars(strip_tags($this->u_id));
        
            $stmt->bindParam(1, $this->u_id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        }
        function isAlreadyExist(){
            $query = "SELECT *
                FROM
                    " . $this->db_table . " 
                WHERE
                    u_email='".$this->u_email."'";
            // prepare query statement
            $stmt = $this->conn->prepare($query);
            // execute query
            $stmt->execute();
            if($stmt->rowCount() > 0){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>