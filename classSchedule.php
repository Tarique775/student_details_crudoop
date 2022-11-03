<?php
include 'database.php';
//include 'displayrecords.php';
//include 'home.php';
session_start();
if(!isset($_SESSION['userName'])){
    header('location:home.php');
}
$obj=new UsersData();

//POST REQUEST FOR SUBMIT_CLASS
if(isset($_POST['submitclass'])){
    echo 'ptint';
    $result=$obj->add_Class_Into_the_record($_POST,'studentsinfo');
    print_r($result);
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
    <title>ClassSchedule</title>
</head>
<body>
    <h1 class="text-center m-5">Class Schedule</h1>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <?php
            //GET REQUEST
            if(isset($_GET['addclass'])){
                $add_classID=$_GET['addclass'];
                $addclass_singleRecord=$obj->add_classByID($add_classID,'studentsinfo');
                //print_r($singleRecord);
                print_r($addclass_singleRecord);
            ?>

        <form id="form" action="classSchedule.php?addclass=<?php echo $addclass_singleRecord['id'];?>" method="POST">
        <table class="table table-striped mt-4">
                <thead>
                    <tr class="text-center bg-dark text-light">
                    <th scope="col">Classes</th>
                    <th scope="col">Schedule</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP
                        $row=$obj->classListDisplay('classes');
                        foreach($row as $value){        
                    ?>
                    <tr class="">
                            <td>
                                <div class="form-check ps-5">
                                <!-- <?php echo $value['cls_id'];?> -->
                                    <input class="form-check-input" type="radio" name="class_id" value="<?php echo $value['cls_id'];?>" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        <?php echo $value['cls_name']?>
                                    </label>
                                </div>
                            </td>
                            <td class="text-center">
                            <label class="form-check-label schedule" for="flexRadioDefault2">
                                        <?php echo $value['cls_schedule']?>
                                    </label>
                            </td>
                            
                            <td><input type="hidden" name='hid_id' value=<?php echo $addclass_singleRecord['id'];?>></td>
                            <td><input type="hidden" name='hid_std_name' value=<?php echo $addclass_singleRecord['std_name'];?>></td>
                            <td><input type="hidden" name='hid_university' value=<?php echo $addclass_singleRecord['university'];?>></td>
                            <td><input type="hidden" name='hid_city' value=<?php echo $addclass_singleRecord['city'];?>></td>
                            <td><input type="hidden" name='hid_phone_nbr' value=<?php echo $addclass_singleRecord['phone_nbr'];?>></td>
                    </tr>
                    <?php } ?>
                </tbody>
        </table>
           
            <button type="submit" name="submitclass" value="submitclass" class="btn btn-primary mt-2 " id="submitcl"><strong>SUBMIT</strong></button>
            <button type="button" onclick="history.back()" class="btn btn-primary ms-2 mt-2 " id="submitcl"><strong>GO BACK</strong></button>
        </div>
        </form>
        <?php } ?>
        <div class="col-md-4"></div>
    </div>
</body>
</html>