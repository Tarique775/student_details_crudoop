<?php
    include 'database.php';
    $obj=new UsersData();
    // print_r($obj);

    //POST DATA
    if(isset($_POST['update'])){
        $ups=$obj->updateData($_POST,'studentsinfo');
        //print_r($ups);
    }
    //GET DEL ID
    // if(isset($_GET['delete'])){
    //     $delID=$_GET['delete'];
    //     $obj->deleteData($delID,'studentsinfo');
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
        <button type="button" onclick="history.back()" class="btn btn-primary mt-4 ms-5">Back Page</button>
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
                    <!-- INSERT_FORM -->
                    <form class="" action="displayrecords.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label"><strong>UsarName</strong></label>
                            <input type="name" name="name" value=<?php echo $singleRecord['std_name'];?> class="form-control">
                        </div>
                        <div class="mb-3 ">
                            <label class="form-label"><strong>University</strong></label>
                            <input type="university" name="university" class="form-control" value=<?php echo $singleRecord['university'];?> >
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>City</strong></label>
                            <input type="city" name="city" class="form-control" value=<?php echo $singleRecord['city']?> >
                        </div>
                        <button type="submit" name="update" value="update" class="btn btn-primary" ><strong>Update</strong></button>
                        <input type="hidden" name='hid' value=<?php echo $singleRecord['id']?> >
                    </form>
                    <!-- INSERT_FORM END -->
                </div>
            </div>
            <?php
                }else{ ?>
                <?php
                    if(isset($_GET['msg']) && $_GET['msg'] == 'update_done'){
                        echo '<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                        <strong> Update Successfully!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                    }
                ?>
                <!-- TABLE LIST -->
            <table class="table table-striped mt-3">
                <thead>
                    <tr class="text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Std_name</th>
                    <th scope="col">University</th>
                    <th scope="col">City</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $data=$obj->displayRecords('studentsinfo');//table name
                        $id_no=1;
                        foreach($data as $value){
                    ?>
                        <tr class="text-center">
                            <td><?php echo $id_no++;?></td>
                            <td><?php echo $value['std_name'];?></td>
                            <td><?php echo $value['university'];?></td>
                            <td><?php echo $value['city'];?></td>
                            <td>
                                <a href="displayrecords.php?edit=<?php echo $value['id']?>" type="button" class="btn btn-primary ms-2 ">Update</a>
                                <a href="displayrecords.php?delete=<?php echo $value['id']?>" type="button" class="btn btn-danger ms-2 ">Delete</a>
                            </td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
            <?php } ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</body>
</html>