<?php
    class UsersData{
        private $db_host="localhost";
        private $db_user="root";
        private $db_password="";
        private $db_name="crudoop";

        private $mysqli="";
        private $result=array();
        private $conn=false;

        public function __construct(){
            if(!$this->conn){
                $this->mysqli=new mysqli($this->db_host,$this->db_user,$this->db_password,$this->db_name);
                $this->conn=true;

                //connection error
                if($this->mysqli->connect_error){
                    array_push($this->result,$this->mysqli->connect_error);
                    return false;
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

                //INSERT QUERY
                $sql="INSERT INTO $table (std_name,university,city) VALUES ('$userName','$university','$city')";

                if($this->mysqli->query($sql)){
                    //IF DATA INSERT SUCCESSFULLY THEN SENT A HEADER WITH QUERY PARAMETER
                    header('location:home.php?msg=insert_done');
                }
                else{
                    return $this->mysqli->error;
                }
            }else{
                echo "Table not exists!";
            }
        }

        //DISPLAY ALL RECORDS
        public function displayRecords($table){

            //IF TABLE EXISTS
            if($this->tableExists($table)){
                //SHOW ALL RECORDS SQL
                $sql="SELECT * FROM $table";

                $data=$this->mysqli->query($sql);

                //CHECK THERE IS ANY RECORD IN THE TABLE;
                if($data->num_rows>0){
                    // FATCHING AN ASSOCIATIVE ARRAY TYPE RECORDS
                    while($row=$data->fetch_assoc()){
                        $displayData[]=$row;
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

        //UPDATE SINGLE RECORD
        public function updateData($post,$table){
            //IF TABLE EXISTS
            if($this->tableExists($table)){

                $userName=$post['name'];
                $university=$post['university'];
                $city=$post['city'];
                $id=$post['hid'];

                //INSERT QUERY
                echo $sql="UPDATE $table SET std_name='$userName', university='$university', city='$city' where id='$id'";

                if($this->mysqli->query($sql)){
                    //IF DATA INSERT SUCCESSFULLY THEN SENT A HEADER WITH QUERY PARAMETER
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
        // public function deleteData($delID,$table){
        //      //table exists or not checking
        //      if($this->tableExists($table)){
        //         echo $sql="DELETE FROM $table where id='$delID'";
        //         echo "<br/>";

        //         if($this->mysqli->query($sql)){
        //             array_push($this->result,$this->mysqli->affected_rows);
        //             return true;
        //         }else{
        //             array_push($this->result,$this->mysqli->error);
        //             return false;
        //         }
        //     }else{
        //         return false;
        //     }
        // }

        //CHECK TABLE EXISTS OR NOT
        private function tableExists($table){
            //TABLE FIND QUERY
            $sql="SHOW TABLES FROM $this->db_name LIKE '$table'";

            $record=$this->mysqli->query($sql);

            if($record->num_rows > 0){
                return true;
            }else{
                array_push($this->result,$this->mysqli->error);
                return false;
            }
        }

        //ALL THE RESULT SHOWCASE
        public function getResult(){
            $val=$this->result;
            $this->result=array();
            return $val;
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