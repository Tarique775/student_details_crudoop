<?php
    include 'database.php';
    $obj=new UsersData();
    //print_r($obj);

    if(isset($_POST['submit'])){
        $ins=$obj->insertData($_POST,'studentsinfo');
        //print_r($ins);
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
        <h1 class="text-center mt-4">CRUD OPERATION USING OOP IN PHP</h1>
    </div>
    <div class="row mt-5">
        <div class="col-md-4"></div>
        <div class="col-md-4 maincol">
        <?php
        if(isset($_GET['msg']) && $_GET['msg'] == 'insert_done'){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Record Insert Successfully!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
            <div class="card" >
                <div class="card-body">
                    <!-- INSERT_FORM -->
                    <form class="" action="home.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label"><strong>UsarName</strong></label>
                            <input type="name" name="name" placeholder="Enter your name" class="form-control" id="input" >
                        </div>
                        <div class="mb-3 ">
                            <label class="form-label"><strong>University</strong></label>
                            <input type="university" name="university" class="form-control" placeholder="Enter your university name" id="input" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>City</strong></label>
                            <input type="city" name="city" class="form-control" placeholder="Enter the city" id="input">
                        </div>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary" id="submit"><strong>Submit</strong></button>
                        <a href="http://localhost/crudui/displayrecords.php" type="button" class="btn btn-primary ms-2 submittag">Display Records</a>
                    </form>
                    <!-- INSERT_FORM END -->
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>      
    </div>
</body>
</html>