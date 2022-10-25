<?php
    class UserValidation{
        private $data='';
        private $errors=[];
        private static $fields=['name','university','city','phone'];

        public function __construct($post_data){
            $this->data=$post_data;
            //var_dump(gettype($post_data['phone']));
        }

        //COMMON METHOD FOR CALL ALL VALIDATION FIELD
        public function validation(){
            foreach(self::$fields as $field){
                //CHECK FIELD NAME EXISTS OR NOT
                if(!array_key_exists($field,$this->data)){
                    //GENERATES A USER-LEVEL ERROR/WARNING/NOTICE MESSAGE
                    $error_msg = trigger_error("Field name not found!");
                    return $error_msg;
                }
            }
            //CALL __NAME FIELD VALIDATION METHOD
            $this->validName();
            $this->valideUni();
            $this->valideCity();
            $this->validePhone();
            return $this->errors;
        }

        //NAME FIELD VALIDATION
        private function validName(){
            //TRIM EXTRA SPACE
            $val=trim($this->data['name']);

            if(empty($val)){
                $this->errors['name']='Name is required!';
            }else{
                if (!preg_match ("/^[a-zA-Z ]*$/", $val) ){ 
                    $this->errors['name']='Only alphabetical value is allowed.'; 
                }
                if(strlen($val) > 6 || strlen($val) < 3){
                    $this->errors['name']='Name length should be greater than 3 and not more than 6.';
                } 
            }
        }

        //UNIVERSITY FIELD VALIDATION
        private function valideUni(){ 
            $val=trim($this->data['university']);

            if(empty($val)){
                $this->errors['university']='University is required!';
            }else{
                if (!preg_match ("/^[a-zA-Z ]*$/", $val) ){ 
                    $this->errors['university']='Only alphabetical value is allowed.'; 
                }
                if(strlen($val) > 6 || strlen($val) < 3){
                    $this->errors['university']='University length should be greater than 3 and not more than 6.';
                } 
            }  
        }

        //CITY FIELD VALIDATION
        private function valideCity(){
            $val=trim($this->data['city']);

            if(empty($val)){
                $this->errors['city']='City is required!';
            }else{
                if (!preg_match ("/^[a-zA-Z ]*$/", $val) ){ 
                    $this->errors['city']='Only alphabetical value is allowed.'; 
                }
                if(strlen($val) > 6 || strlen($val) < 3){
                    $this->errors['city']='City length should be greater than 3 and not more than 6.';
                } 
            } 
        }

         //CITY FIELD VALIDATION
        private function validePhone(){ 
            $val=trim($this->data['phone']);

            if(empty($val)){
                $this->errors['phone']='Contact is required!';
            }else{
                if (!preg_match ("/^(\+)?([0-9]){10,16}$/", $val) ){ 
                    $this->errors['phone']='Only numaric value is allowed.'; 
                }
                if(strlen($val) < 11){
                    $this->errors['phone']='Please provide 11 digits!';
                } 
            }  
        }

        //ADD_ERROR METHOD TO GET THE ERROR MESSAGE
        private function adderror($key,$value){
            $this->errors[$key]=$value;
        }
    }
?>