<?php
    class Listing{
        // Connection
        private $conn;
        // Table
        private $db_table = "listing";
        // Columns
        public $list_id;
        public $list_productname;
        public $list_description;
        public $list_address;
        public $list_image;
        public $list_publishdate;
        public $list_price;
        public $list_condition;
        public $list_fueltype;
        public $list_registrationyear;
        public $list_vehicletype;
        public $list_model;
        public $list_enginecapacity;
        public $list_mileage;
        public $list_brand;
        public $list_transmission;
        public $list_negotiable;
        public $list_phone;
        public $image_one;
        public $image_two;
        public $image_three;
        public $image_four;
        public $image_five;
        public $image_six;

        public $u_id;
        
        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getListing(){
            $sqlQuery = "SELECT list_id, list_productname, list_description, list_address, list_image, list_publishdate, list_price, list_condition, list_fueltype, list_registrationyear, list_vehicletype, list_model, list_enginecapacity, list_mileage, list_brand, list_brand, list_transmission, list_negotiable, list_phone, image_one, image_two, image_three, image_four, image_five, image_six, u_id FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
        // CREATE
        // public function createListing(){
        //     // if($this->isAlreadyExist()){
        //     //     return false;
        //     // }

        //     $sqlQuery = "INSERT INTO
        //                 ". $this->db_table ."
        //             SET
        //                 list_productname = :list_productname, 
        //                 list_description = :list_description, 
        //                 list_address = :list_address,
        //                 list_image = :list_image,
        //                 list_publishdate = :list_publishdate,
        //                 list_price = :list_price,
        //                 list_condition = :list_condition,
        //                 list_fueltype = :list_fueltype,
        //                 list_registrationyear = :list_registrationyear,
        //                 list_vehicletype = :list_vehicletype,
        //                 list_model = :list_model,
        //                 list_enginecapacity = :list_enginecapacity,
        //                 list_mileage = :list_mileage,
        //                 list_brand = :list_brand,
        //                 list_transmission = :list_transmission,
        //                 list_negotiable = :list_negotiable,
        //                 list_phone = :list_phone,
        //                 image_one = :image_one,
        //                 image_two = :image_two,
        //                 image_three = :image_three,
        //                 image_four = :image_four,
        //                 image_five = :image_five,
        //                 image_six = :image_six,
        //                 u_id = :u_id";
                        
        
        //     $stmt = $this->conn->prepare($sqlQuery);
        
        //     // sanitize
        //     $this->list_productname=htmlspecialchars(strip_tags($this->list_productname));
        //     $this->list_description=htmlspecialchars(strip_tags($this->list_description));
        //     $this->list_address=htmlspecialchars(strip_tags($this->list_address));
        //     $this->list_image=htmlspecialchars(strip_tags($this->list_image));
        //     $this->list_publishdate=htmlspecialchars(strip_tags($this->list_publishdate));
        //     $this->list_price=htmlspecialchars(strip_tags($this->list_price));
        //     $this->list_condition=htmlspecialchars(strip_tags($this->list_condition));
        //     $this->list_fueltype=htmlspecialchars(strip_tags($this->list_fueltype));
        //     $this->list_registrationyear=htmlspecialchars(strip_tags($this->list_registrationyear));
        //     $this->list_vehicletype=htmlspecialchars(strip_tags($this->list_vehicletype));
        //     $this->list_model=htmlspecialchars(strip_tags($this->list_model));
        //     $this->list_enginecapacity=htmlspecialchars(strip_tags($this->list_enginecapacity));
        //     $this->list_mileage=htmlspecialchars(strip_tags($this->list_mileage));
        //     $this->list_brand=htmlspecialchars(strip_tags($this->list_brand));
        //     $this->list_transmission=htmlspecialchars(strip_tags($this->list_transmission));
        //     $this->list_negotiable=htmlspecialchars(strip_tags($this->list_negotiable));
        //     $this->list_phone=htmlspecialchars(strip_tags($this->list_phone));
        //     $this->image_one=htmlspecialchars(strip_tags($this->image_one));
        //     $this->image_two=htmlspecialchars(strip_tags($this->image_two));
        //     $this->image_three=htmlspecialchars(strip_tags($this->image_three));
        //     $this->image_four=htmlspecialchars(strip_tags($this->image_four));
        //     $this->image_five=htmlspecialchars(strip_tags($this->image_five));
        //     $this->image_six=htmlspecialchars(strip_tags($this->image_six));
        //     $this->u_id=htmlspecialchars(strip_tags($this->u_id));
            
            
        //     // bind data
        //     $stmt->bindParam(":list_productname", $this->list_productname);
        //     $stmt->bindParam(":list_description", $this->list_description);
        //     $stmt->bindParam(":list_address", $this->list_address);
        //     $stmt->bindParam(":list_image", $this->list_image);
        //     $stmt->bindParam(":list_publishdate", $this->list_publishdate);
        //     $stmt->bindParam(":list_price", $this->list_price);
        //     $stmt->bindParam(":list_condition", $this->list_condition);
        //     $stmt->bindParam(":list_fueltype", $this->list_fueltype);
        //     $stmt->bindParam(":list_registrationyear", $this->list_registrationyear);
        //     $stmt->bindParam(":list_vehicletype", $this->list_vehicletype);
        //     $stmt->bindParam(":list_model", $this->list_model);
        //     $stmt->bindParam(":list_enginecapacity", $this->list_enginecapacity);
        //     $stmt->bindParam(":list_mileage", $this->list_mileage);
        //     $stmt->bindParam(":list_brand", $this->list_brand);
        //     $stmt->bindParam(":list_transmission", $this->list_transmission);
        //     $stmt->bindParam(":list_negotiable", $this->list_negotiable);
        //     $stmt->bindParam(":list_phone", $this->list_phone);
        //     $stmt->bindParam(":image_one", $this->image_one);
        //     $stmt->bindParam(":image_two", $this->image_two);
        //     $stmt->bindParam(":image_three", $this->image_three);
        //     $stmt->bindParam(":image_four", $this->image_four);
        //     $stmt->bindParam(":image_five", $this->image_five);
        //     $stmt->bindParam(":image_six", $this->image_six);
        //     $stmt->bindParam(":u_id", $this->u_id);
            
        //     if($stmt->execute()){
        //       return true;
        //     }
        //     return false;

            
        // }

        // login user method
    //     function login(){
    //     // select all query with user inputed username and password
    //     $query = "SELECT
    //                 `u_id`, `u_fullname`, `u_email`, `u_password`, `u_phone`
    //             FROM
    //                 " . $this->db_table . " 
    //             WHERE
    //                 u_email='".$this->u_email."' AND u_password='".$this->u_password."'";
    //     // prepare query statement
    //     $stmt = $this->conn->prepare($query);
    //     // execute query
    //     $stmt->execute();
    //     return $stmt;
    // }


        // READ single
        public function getSingleListing(){
            $sqlQuery = "SELECT
                        list_id , 
                        list_productname, 
                        list_description, 
                        list_address,
                        list_image,
                        list_publishdate,
                        list_price,
                        list_condition,
                        list_fueltype,
                        list_registrationyear,
                        list_vehicletype,
                        list_model,
                        list_enginecapacity,
                        list_mileage,
                        list_brand,
                        list_transmission,
                        list_negotiable,
                        list_phone,
                        image_one,
                        image_two,
                        image_three,
                        image_four,
                        image_five,
                        image_six,
                        u_id
                      FROM
                        ". $this->db_table ."
                    WHERE 
                       list_id = ?
                    LIMIT 0,1";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->bindParam(1, $this->list_id);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->list_productname = $dataRow['list_productname'];
            $this->list_description = $dataRow['list_description'];
            $this->list_address = $dataRow['list_address'];
            $this->list_image = $dataRow['list_image'];
            $this->list_publishdate = $dataRow['list_publishdate'];
            $this->list_price = $dataRow['list_price'];
            $this->list_condition = $dataRow['list_condition'];
            $this->list_fueltype = $dataRow['list_fueltype'];
            $this->list_registrationyear = $dataRow['list_registrationyear'];
            $this->list_vehicletype = $dataRow['list_vehicletype'];
            $this->list_model = $dataRow['list_model'];
            $this->list_enginecapacity = $dataRow['list_enginecapacity'];
            $this->list_mileage = $dataRow['list_mileage'];
            $this->list_brand = $dataRow['list_brand'];
            $this->list_transmission = $dataRow['list_transmission'];
            $this->list_negotiable = $dataRow['list_negotiable'];
            $this->list_phone = $dataRow['list_phone'];
            $this->image_one = $dataRow['image_one'];
            $this->image_two = $dataRow['image_two'];
            $this->image_three = $dataRow['image_three'];
            $this->image_four = $dataRow['image_four'];
            $this->image_five = $dataRow['image_five'];
            $this->image_six = $dataRow['image_six'];
            $this->u_id = $dataRow['u_id'];
            
        }        
        // UPDATE
        public function updateListing(){
            $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                    list_productname = :list_productname, 
                    list_description = :list_description, 
                    list_address = :list_address,
                    list_image = :list_image,
                    list_publishdate = :list_publishdate,
                    list_price = :list_price,
                    list_condition = :list_condition,
                    list_fueltype = :list_fueltype,
                    list_registrationyear = :list_registrationyear,
                    list_vehicletype = :list_vehicletype,
                    list_model = :list_model,
                    list_enginecapacity = :list_enginecapacity,
                    list_mileage = :list_mileage;
                    list_brand = :list_brand,
                    list_transmission = :list_transmission,
                    list_negotiable = :list_negotiable,
                    list_phone = :list_phone,
                    image_one = :image_one,
                    image_two = :image_two,
                    image_three = :image_three,
                    image_four = :image_four,
                    image_five = :image_five,
                    image_six = :image_six,
                    u_id = :u_id
                    WHERE 
                        list_id = :list_id";
        
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->list_productname=htmlspecialchars(strip_tags($this->list_productname));
            $this->list_description=htmlspecialchars(strip_tags($this->list_description));
            $this->list_address=htmlspecialchars(strip_tags($this->list_address));
            $this->list_image=htmlspecialchars(strip_tags($this->list_image));
            $this->list_publishdate=htmlspecialchars(strip_tags($this->list_publishdate));
            $this->list_price=htmlspecialchars(strip_tags($this->list_price));
            $this->list_condition=htmlspecialchars(strip_tags($this->list_condition));
            $this->list_fueltype=htmlspecialchars(strip_tags($this->list_fueltype));
            $this->list_registrationyear=htmlspecialchars(strip_tags($this->list_registrationyear));
            $this->list_vehicletype=htmlspecialchars(strip_tags($this->list_vehicletype));
            $this->list_model=htmlspecialchars(strip_tags($this->list_model));
            $this->list_enginecapacity=htmlspecialchars(strip_tags($this->list_enginecapacity));
            $this->list_mileage=htmlspecialchars(strip_tags($this->list_mileage));
            $this->list_brand=htmlspecialchars(strip_tags($this->list_brand));
            $this->list_transmission=htmlspecialchars(strip_tags($this->list_transmission));
            $this->list_negotiable=htmlspecialchars(strip_tags($this->list_negotiable));
            $this->list_phone=htmlspecialchars(strip_tags($this->list_phone));
            $this->image_one=htmlspecialchars(strip_tags($this->image_one));
            $this->image_two=htmlspecialchars(strip_tags($this->image_two));
            $this->image_three=htmlspecialchars(strip_tags($this->image_three));
            $this->image_four=htmlspecialchars(strip_tags($this->image_four));
            $this->image_five=htmlspecialchars(strip_tags($this->image_five));
            $this->image_six=htmlspecialchars(strip_tags($this->image_six));
            $this->list_id=htmlspecialchars(strip_tags($this->list_id));
            $this->u_id=htmlspecialchars(strip_tags($this->u_id));

            // bind data
            $stmt->bindParam(":list_productname", $this->list_productname);
            $stmt->bindParam(":list_description", $this->list_description);
            $stmt->bindParam(":list_address", $this->list_address);
            $stmt->bindParam(":list_image", $this->list_image);
            $stmt->bindParam(":list_publishdate", $this->list_publishdate);
            $stmt->bindParam(":list_price", $this->list_price);
            $stmt->bindParam(":list_condition", $this->list_condition);
            $stmt->bindParam(":list_fueltype", $this->list_fueltype);
            $stmt->bindParam(":list_registrationyear", $this->list_registrationyear);
            $stmt->bindParam(":list_vehicletype", $this->list_vehicletype);
            $stmt->bindParam(":list_model", $this->list_model);
            $stmt->bindParam(":list_enginecapacity", $this->list_enginecapacity);
            $stmt->bindParam(":list_mileage", $this->list_mileage);
            $stmt->bindParam(":list_brand", $this->list_brand);
            $stmt->bindParam(":list_transmission", $this->list_transmission);
            $stmt->bindParam(":list_negotiable", $this->list_negotiable);
            $stmt->bindParam(":list_phone", $this->list_phone);
            $stmt->bindParam(":image_one", $this->image_one);
            $stmt->bindParam(":image_two", $this->image_two);
            $stmt->bindParam(":image_three", $this->image_three);
            $stmt->bindParam(":image_four", $this->image_four);
            $stmt->bindParam(":image_five", $this->image_five);
            $stmt->bindParam(":image_six", $this->image_six);
            $stmt->bindParam(":list_id", $this->list_id);
            $stmt->bindParam(":u_id", $this->u_id);
            if($stmt->execute()){
               return true;
            }
            return false;
        }
        // DELETE
        function deleteListing(){
            $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE list_id = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $this->list_id=htmlspecialchars(strip_tags($this->list_id));
        
            $stmt->bindParam(1, $this->list_id);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        
        }

        

        // function isAlreadyExist(){
        //     $query = "SELECT *
        //         FROM
        //             " . $this->db_table . " 
        //         WHERE
        //             u_email='".$this->u_email."'";
        //     // prepare query statement
        //     $stmt = $this->conn->prepare($query);
        //     // execute query
        //     $stmt->execute();
        //     if($stmt->rowCount() > 0){
        //         return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }
    }
?>