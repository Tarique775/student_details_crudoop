<?php
    class UsersData{
        private $db_host="localhost";
        private $db_user="root";
        private $db_password="";
        private $db_name="student_details";

        private $mysqli="";
        private $conn=false;

        public function __construct(){
            if(!$this->conn){
                $this->mysqli=new mysqli($this->db_host,$this->db_user,$this->db_password,$this->db_name);
                $this->conn=true;

                //connection error
                if($this->mysqli->connect_error){
                     return $this->mysqli->connect_error;
                }else{
                    return $this->mysqli;
                }
                echo"database connected<br/>";
            }
            
        }

        //INSERT DATA FROM UI TO DATABASE
        public function insertData($post,$table){

            //IF TABLE EXISTS
            if($this->tableExists($table)){

                $userName=$post['name'];
                $university=$post['university'];
                $city=$post['city'];
                $phone=$post['phone'];
                $class_id=$post['class_id'];

                //INSERT QUERY
                $sql="INSERT INTO $table (std_name,university,city,phone_nbr,class_id) VALUES ('$userName','$university','$city','$phone',$class_id)";

                if($this->mysqli->query($sql)){
                    //IF DATA INSERT SUCCESSFULLY THEN SENT A HEADER WITH QUERY PARAMETER
                    header('location:displayrecords.php?msg=insert_done');
                }
                else{
                    return $this->mysqli->error;
                }
            }else{
                echo "Table not exists!";
            }
        }

        //UPDATE SINGLE RECORD
        public function updateData($post,$table){
            //IF TABLE EXISTS
            if($this->tableExists($table)){

                $userName=$post['name'];
                $university=$post['university'];
                $city=$post['city'];
                $phone=$post['phone'];
                $id=$post['hid'];
                $class_id=$post['class_id'];

                //UPDATE RECORD QUERY
                $sql="UPDATE $table SET std_name='$userName', university='$university', city='$city', phone_nbr='$phone',class_id='$class_id' where id='$id'";

                if($this->mysqli->query($sql)){
                    //IF DATA UPDATE SUCCESSFULLY THEN SENT A HEADER WITH QUERY PARAMETER
                    header('location:displayrecords.php?msg=update_done');
                }
                else{
                    return $this->mysqli->error;
                }
            }else{
                echo "Table not exists!";
            }
        }

        //DELETE SINGLE RECORD
        public function deleteData($delID,$table){
             //table exists or not checking
             if($this->tableExists($table)){
                // DELETE RECORD QUERY
                $sql="DELETE FROM $table where id='$delID'";

                if($this->mysqli->query($sql)){
                    //IF DATA DELETE SUCCESSFULLY THEN SENT A HEADER WITH QUERY PARAMETER
                    header('location:displayrecords.php?msg=delete_done');
                }else{
                    return $this->mysqli->error;
                }
            }else{
                echo "Table not exists!";
            }
        }

        //DISPLAY ALL RECORDS
        public function displayRecords($stdTable){

            //IF TABLE EXISTS
            if($this->tableExists($stdTable)){
                //SHOW ALL RECORDS SQL
                //echo $sql="SELECT * FROM $stdTable left JOIN $classTable ON $stdTable.id = $classTable.std_id";
                echo $sql="SELECT * FROM $stdTable";
                
                //RUN SQL COMMAND
                $data=$this->mysqli->query($sql);

                //CHECK THERE IS ANY RECORD IN THE TABLE;
                if($data->num_rows>0){
                    // FATCHING ASSOCIATIVE ARRAY TYPE RECORDS
                    while($row=$data->fetch_assoc()){
                        print_r($displayData[]=$row);
                    }
                    // $displayData[]=$data->fetch_assoc();
                    return $displayData;
                }else{
                    echo"There is no records in the table";
                }
            }else{
                return $this->mysqli->error;
            }
        }

        //SINGLE RECORD DISPLAY BY ID
        public function displayByID($editID,$table){

            //IF TABLE EXISTS
            if($this->tableExists($table)){
                //SHOW SINGLE RECORD FIND SQL
                $sql="SELECT * FROM $table where id='$editID'";

                //RUN SQL COMMAND
                $display=$this->mysqli->query($sql);

                //CHECK THERE IS ANY RECORD IN THE TABLE;
                if($display->num_rows > 0){
                    // FATCHING A SINGLE ASSOCIATIVE ARRAY TYPE RECORD
                    $row=$display->fetch_array();
                    return $row;
                }else{
                    echo"There is no single record in this table!";
                }
            }
        }

        public function insert_forenkey_into_home_page(){
            $sql="SELECT * FROM `classes`";
            $row=$this->mysqli->query($sql);
                if($row->num_rows > 0){
                    while($data=$row->fetch_assoc()){
                        $classData[]=$data;
                    }
                    return $classData;
                }
        }

        public function displayrecordwithforenkeydropdown($clsId){
            $sql="SELECT * FROM `classes` WHERE class_id='$clsId'";
            $data=$this->mysqli->query($sql);
            if($data->num_rows > 0){
                while($row=$data->fetch_assoc()){
                    $rows[]=$row;
                };
            }
            return $rows;
        }
        //DISPLAY CLASSES PER_SINGLE RECORDS
        // public function classlistByID($stdID,$stdTable,$classTable){
            
        //     //SQL FOR JOINING
        //     $sql="SELECT $stdTable.std_name, $classTable.sub_name FROM $stdTable INNER JOIN $classTable ON $stdTable.id = $classTable.std_id where $stdTable.id='$stdID'";

        //     //RUN SQL COMMAND
        //     $result=$this->mysqli->query($sql);

        //     //CHECK IF THERE IS ANY SINGLE RECORD EXISTS
        //     if($result->num_rows > 0){
        //         //FETCHING ALL DATA FROM JOINING CONDITION
        //         while($row=$result->fetch_assoc()){
        //             $data[]=$row;
        //         }
        //         return $data;
        //         //var_dump($data);
        //     }else{
        //         echo"There is no records in the table class";
        //     }
        // }

        //CHECK TABLE EXISTS OR NOT
        private function tableExists($table){
            //TABLE FIND QUERY
            $sql="SHOW TABLES FROM $this->db_name LIKE '$table'";

            $record=$this->mysqli->query($sql);

            //CHECK THERE IS ANY TABLE IN THE TABLE;
            if($record->num_rows > 0){
                return true;
            }else{
                return $this->mysqli->error;
            }
        }

        //CLOSE CONNECTION
        public function __distruct(){
            if($this->conn){
                if($this->mysqli->close()){
                    $this->conn=false;
                    return true;
                }else{
                    return false;
                }
            }
        }
    }
?>