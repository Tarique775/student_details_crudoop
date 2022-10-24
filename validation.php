<?php
    class Validator{
        private $data='';
        private $errors=[];

        public function __construct($post_data){
            $this->data=$post_data;
        }

        public function validation(){
            $this->validName();
            echo $this->errors;
        }

        //NAME FIELD VALIDATION
        private function validName(){
            $val=trim($this->data['name']);

            if(empty($val)){
                $this->errors['name']='Name is required!';
            }else{
                if (!preg_match ("/^[a-zA-Z ]*$/", $val) ) { 
                    $this->errors['name']='Only numeric value is allowed.'; 
                }
                if(strlen($val)<15 && strlen($val)>3){
                    $this->errors['name']='Name length should be greater than 3 and not more than 15.';
                } 
            }
        }

        // //UNIVERSITY FIELD VALIDATION
        // private function valideUni(){   
        // }

        // //CITY FIELD VALIDATION
        // private function validecity(){   
        // }

    //     private function adderror($key,$value){
    //         $this->errors[$key]=$value;
    //     }
    // }
?>