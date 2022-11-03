<!-- <div class="mb-3">
                        <label class="form-label"><strong>Select Classes</strong></label>
                        <select name="class_id" class="form-select bg-dark text-light class_id" aria-label="Default select example">
                            <option selected>Please Select classes</option>
                        <?php
                            $classes=$obj->insert_forenkey_into_home_page();

                            foreach($classes as $classValue){
                        ?>
                            <option value="<?php echo $classValue['class_id'] ?>"><?php echo $classValue['class_name'] ?></option>
                        <?php } ?>
                        </select>
                        </div> -->


                         <!-- <?PHP
                $row=$obj->classListDisplay('classes');
                foreach($row as $value){        
            ?>
            <div class="form-check ps-5">
                <input class="form-check-input" type="radio" name="class_id" value="<?php echo $value['cls_id'];?>" id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    <?php echo $value['cls_name']?><span class="ms-5"><?php echo $value['cls_schedule'];?></span>
                </label>
            </div> -->
            <?php } ?>


            // public function insert_forenkey_into_home_page(){
        //     $sql="SELECT * FROM `classes`";
        //     $row=$this->mysqli->query($sql);
        //         if($row->num_rows > 0){
        //             while($data=$row->fetch_assoc()){
        //                 $classData[]=$data;
        //             }
        //             return $classData;
        //         }
        // }

        https://www.freecodecamp.org/news/sql-inner-join-how-to-join-3-tables-in-sql-and-mysql/