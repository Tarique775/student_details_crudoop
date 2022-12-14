<?php
    include 'database.php';
    include 'validation.php';
    $obj=new UsersData();
    session_start();
    if(!isset($_SESSION['userName'])){
        header('location:home.php');
    }
    // $class=$obj->classlistByID(1,'studentsinfo');
    // print_r($class);
    //print_r($obj);

    //POST UPDATED DATA WITH VALIDATION
    if(isset($_POST['update'])){

        //CREATE A INSTANCE OF UserValidation CLASS
        $validations=new UserValidation($_POST);

        //GET ERROR MESSAGE
        $get_error=$validations->validation();
        print_r($get_error);

        if(!$get_error){
            $obj->updateData($_POST,'studentsinfo');
        }
        //print_r($ups);
    }

    //GET_DELETED_ID
    if(isset($_GET['delete'])){
        $delID=$_GET['delete'];
        $obj->deleteData($delID,'studentsinfo');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP SETTING -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP SETTING END-->

    <title>DisplayRecords</title>
</head>
<body>
    <div class="row">
        <div class="col-md-2">
        <button type="button" onclick="history.back()" class="btn btn-primary mt-4 ms-5"><strong>GO BACK</strong></button>
        </div>
        <div class="col-md-8">
            <?php       
                if(isset($_GET['edit'])){
                    $editID=$_GET['edit'];
                    $singleRecord=$obj->displayByID($editID,'studentsinfo');
                    //print_r($singleRecord);
            ?>
            <div class="card mt-5" >
                <div class="card-body">
                    <!-- UPDATED_FORM -->
                    <form class="" action="displayrecords.php?edit=<?php echo $singleRecord['id'];?>" method="POST">
                        <div class="mb-3">
                            <label class="form-label"><strong>UsarName</strong></label>
                            <input type="name" name="name" value=<?php echo $singleRecord['std_name'];?> class="form-control">
                        </div>
                        <?php 
                            if(isset($get_error['name'])){
                                echo '<div class="alert alert-danger">'.$get_error['name'].'</div>';
                            }
                        ?>
                        <div class="mb-3 ">
                            <label class="form-label"><strong>University</strong></label>
                            <input type="university" name="university" class="form-control" value=<?php echo $singleRecord['university'];?> >
                        </div>
                        <?php 
                            if(isset($get_error['university'])){
                                echo '<div class="alert alert-danger">'.$get_error['university'].'</div>';
                            }
                        ?>
                        <div class="mb-3">
                            <label class="form-label"><strong>City</strong></label>
                            <input type="city" name="city" class="form-control" value=<?php echo $singleRecord['city']?> >
                        </div>
                        <?php 
                            if(isset($get_error['city'])){
                                echo '<div class="alert alert-danger">'.$get_error['city'].'</div>';
                            }
                        ?>
                        <div class="mb-3">
                            <label class="form-label"><strong>Contact</strong></label>
                            <input type="phone" name="phone" class="form-control" value=<?php echo $singleRecord['phone_nbr']?> >
                        </div>
                        <?php 
                            if(isset($get_error['phone'])){
                                echo '<div class="alert alert-danger">'.$get_error['phone'].'</div>';
                            }
                        ?>
                        <!-- <div class="mb-3">
                            <label class="form-label"><strong>Contact</strong></label>
                            <input type="class_id" name="class_id" class="form-control" value=<?php echo $singleRecord['class_id']?> >
                        </div> -->
                        <button type="submit" name="update" value="update" class="btn btn-primary" ><strong>Update</strong></button>
                        <input type="hidden" name='hid' value=<?php echo $singleRecord['id']?> >
                    </form>
                    <!-- UPDATED_FORM END -->
                </div>
            </div>
            <?php
                }else{ ?>
                
                <!-- ALERT MESSAGE -->
                <?php
                    if(isset($_GET['msg']) && $_GET['msg'] == 'insert_done'){
                        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Record Insert Successfully!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                    if(isset($_GET['msg']) && $_GET['msg'] == 'update_done'){
                        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Record Update Successfully!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                    if(isset($_GET['msg']) && $_GET['msg'] == 'delete_done'){
                        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Record delete Successfully!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                    if(isset($_GET['msg']) && $_GET['msg'] == 'class_added_done'){
                        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Successfully Add Classes!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                    if(isset($_GET['msg']) && $_GET['msg'] == 'class_updated_done'){
                        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong>Successfully Updated Classes!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                ?>

                <!-- TABLE LIST -->
            <table class="table table-striped mt-4">
                <thead>
                    <tr class="text-center bg-dark text-light">
                    <th scope="col">Id</th>
                    <th scope="col">Std_name</th>
                    <th scope="col">University</th>
                    <th scope="col">City</th>
                    <th scope="col">Contact</th>
                    <th scope="col">ClassList</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data=$obj->displayRecords('studentsinfo');//table name
                        if($data){
                        $id_no=1;
                        foreach($data as $value){
                    ?>
                        <tr class="text-center">
                            <td><?php echo $id_no++;?></td>
                            <td><?php echo $value['std_name'];?></td>
                            <td><?php echo $value['university'];?></td>
                            <td><?php echo $value['city'];?></td>
                            <td><?php echo $value['phone_nbr'];?></td>
                            <td>
                                <?php
                                    if($value['cls_id']!=0){

                                    
                                ?>
                                <div class="dropdown ">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        Classes
                                    </button>
                                    <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1">
                            <?php
                                $iD=$value['cls_id'];
                                $data2=$obj->display_Record_with_forenkey_dropdown($iD,'classes');
                                foreach($data2 as $classIDdata){
                            ?>
                                        <li><a class="dropdown-item "><?php echo $classIDdata['cls_name'];?><span class="ms-5"><?php echo $classIDdata['cls_schedule'];?></span></a></li>
                            <?php } ?>
                                    </ul>
                                </div>
                                <?php }else {?>
                                    <h6></h6>
                                <?php } ?>
                            </td>                            
                            <td>
                                <a href="classSchedule.php?addclass=<?php echo $value['id']?>" type="button" class="btn btn-info">Add_Class</a>
                                <a href="displayrecords.php?edit=<?php echo $value['id']?>" type="button" class="btn btn-primary ms-2 ">Update</a>
                                <a href="displayrecords.php?delete=<?php echo $value['id']?>" type="button" class="btn btn-danger ms-2 ">Delete</a>
                            </td>
                        </tr>
                <?php }
                }else{ ?>
                    <tr class="text-center">
                        <td colspan='6'><h5>THERE IS NO RECORDS</h5></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php } ?>
            <!-- TABLE_LIST END -->
        </div>
        <div class="col-md-2">
            <a href="home.php" type="button" class="btn btn-success mt-4 ms-4"><strong>Add_NewUser</strong></a>
            <a href="logout.php" type="button" class="btn btn-danger mt-4 ms-4"><strong>Logout</strong></a>
        </div>
    </div>
</body>
</html>