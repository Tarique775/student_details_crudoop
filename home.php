<?php
    include 'database.php';
    include 'validation.php';

    $obj=new UsersData();
    //print_r($obj);

    if(isset($_POST['submit'])){
        //CREATE A INSTANCE OF UserValidation CLASS
        $validations=new UserValidation($_POST);
        //GET ERROR MESSAGE
        $get_error=$validations->validation();
        print_r($get_error);

        //IF THERE IN NO ERROR IN FIELD SECTION THEN INSERT THE DATA INTO DATABASE
        if(!$get_error){
            $insertData = $obj->insertData($_POST,'studentsinfo');//(POST_DATA,TABLENAME)
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- style.css file -->
    <link rel="stylesheet" href="./style.css">

    <!-- BOOTSTRAP SETTING -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP SETTING END-->

    <title>CRUDOOP</title>
</head>
<body>
    <div class="container-fluid">
        <h1 class="text-center m-5">CRUD OPERATION USING OOP IN PHP</h1>
    </div>
    <div class="row ">
        <div class="col-md-4"></div>
        <div class="col-md-4 maincol">
            <div class="card" >
                <div class="card-body">
                    <!-- INSERT_FORM -->
                    <form id="form" action="home.php" method="POST">
                        <div class="mb-2">
                            <label class="form-label label"><strong>UsarName</strong></label>
                            <div class="error"></div>
                            <input type="name" name="name" placeholder="Enter your name" class="form-control input" id="userName">
                        </div>
                        <?php 
                            if(isset($get_error['name'])){
                                echo '<div class="alert alert-danger">'.$get_error['name'].'</div>';
                            }
                        ?>
                        <div class="mb-2 ">
                            <label class="form-label label"><strong>University</strong></label>
                            <div class="error"></div>
                            <input type="university" name="university" class="form-control input" placeholder="Enter your university name" id="university">
                        </div>
                        <?php 
                            if(isset($get_error['university'])){
                                echo '<div class="alert alert-danger">'.$get_error['university'].'</div>';
                            }
                        ?>
                        <div class="mb-2">
                            <label class="form-label label"><strong>City</strong></label>
                            <div class="error"></div>
                            <input type="city" name="city" class="form-control input" placeholder="Enter the city" id="city">
                        </div>
                        <?php 
                            if(isset($get_error['city'])){
                                echo '<div class="alert alert-danger">'.$get_error['city'].'</div>';
                            }
                        ?>
                        <div class="mb-2">
                            <label class="form-label label"><strong>Contact</strong></label>
                            <div class="error"></div>
                            <input type="phone" name="phone" class="form-control input" placeholder="Enter the phone number" id="contact">
                        </div>
                        <?php 
                            if(isset($get_error['phone'])){
                                echo '<div class="alert alert-danger">'.$get_error['phone'].'</div>';
                            }
                        ?>
                        
                        <button type="submit" name="submit" value="submit" class="btn btn-primary submit mt-2" id="submit"><strong>SUBMIT</strong></button>
                        <button type="button" onclick="history.back()" class="btn btn-primary ms-2 mt-2" id="submit"><strong>GO BACK</strong></button>
                        <input type="hidden" name='hidcls_id' value='0'>
                    </form>
                    <!-- INSERT_FORM END -->
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>      
    </div>

    <!-- <script src="./src/validation.js"></script> -->
</body>
</html>