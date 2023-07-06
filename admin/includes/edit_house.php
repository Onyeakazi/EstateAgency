   <?php

   if(isset($_GET['h_id'])){

    $the_house_id = $_GET['h_id'];
    

   }

    $query = "SELECT * FROM houses WHERE id = $the_house_id ";
    $select_houses_by_id = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($select_houses_by_id)) {
    $house_id = $row['id'];
    $house_name = $row['house_name'];
    $house_amount = $row['house_amount'];
    $house_description = $row['house_description'];
    $house_amenities = $row['house_amenities'];
    $house_area = $row['house_area'];
    $house_location = $row['house_location'];
    $existingImageNames = $row['house_image'];
    $house_status = $row['house_status'];
    $house_beds = $row['house_beds'];
    $house_baths = $row['house_baths'];

    }
      
    if(isset($_POST['update_house'])) {
        // Retrieve the existing image filenames from the database
        $existingImageNames = $_POST['existing_images'];
        
        $house_name = $_POST['house_name'];
        $house_amount = $_POST['house_amount'];
        $house_location = $_POST['house_location'];
        $house_description = $_POST['house_description'];
        $house_amenities = $_POST['house_amenities'];
        $house_area = $_POST['house_area'];
        $house_status = $_POST['house_status'];
        $house_beds = $_POST['house_beds'];
        $house_baths = $_POST['house_baths'];
        
        $house_image = [$_FILES['house_image']['name']];
        $totalFiles = count($_FILES['house_image']['name']);
    
        // Loop through each file
        $fileNames = array();
        foreach ($_FILES['house_image']['name'] as $i => $house_image) {
            $fileTmpName = $_FILES['house_image']['tmp_name'][$i];

            // Move the file to the specified directory
            if (move_uploaded_file($fileTmpName, "img/$house_image")) {
                $fileNames[] = $house_image;
            } else {
                echo " ";
            }
        }

        // Merge the existing and new image filenames
        if (is_string($existingImageNames)) {
            $existingImageNames = explode(',', $existingImageNames);
        }
        $fileNames = array_merge($existingImageNames, $fileNames);
        $house_image = implode(",", $fileNames);

        
        $query = "UPDATE houses SET ";
        $query.="house_name = '{$house_name}', ";   
        $query.="house_amount = '{$house_amount}', ";
        $query.="house_location = '{$house_location}', ";
        $query.="house_description = '{$house_description}', ";
        $query.="house_amenities = '{$house_amenities}', ";
        $query.="house_area = '{$house_area}', ";
        $query.="house_image = '{$house_image}', ";
        $query.="house_status = '{$house_status}', ";
        $query.="house_beds = '{$house_beds}', ";
        $query.="house_baths = '{$house_baths}' ";
        $query.="WHERE id = {$the_house_id} ";

        $update_house = mysqli_query($con, $query);

        if ($update_house) {
            echo "<script>
                    Swal.fire({
                      title: 'Success!',
                      text: 'House Updated!',
                      confirmButtonColor: '#ffa500',
                      confirmButtonText: 'OK'
                    });
                  </script>";
        }

        if(!$update_house) {
            echo "QUERY FALIED" . mysqli_error($con);
        }

        echo "<p class='bg-success'><a href='house.php'>View houses</a></p>";
    }




?>


<section class="panel ">
    <div class="panel-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_name" style="font-weight:700;">House Name</label>
                    <input type="text" value="<?php echo $house_name; ?>" class="form-control" name="house_name">
                </div>
            </div>

            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_amount">House Amount</label>
                    <input type="text" value="<?php echo $house_amount; ?>" class="form-control" name="house_amount">
                </div>
            </div>
            
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_location">Location</label>
                    <input type="text" value="<?php echo $house_location; ?>" class="form-control" name="house_location">
                </div>
            </div>

            <div class="col-xs-6">
                <div class="form-group">
                    <input type="file" class="form-control" name="house_image[]" id="inpfile" accept="images/*" style="display: none;" multiple><br>
                    <input type="hidden" name="existing_images" value="<?php echo $existingImageNames; ?>">
                        <?php
                            if (is_string($existingImageNames)) {
                                $firstImage = explode(',', $existingImageNames)[0]; // Get the first image from the array
                            } else {
                                $firstImage = ''; // Set a default value when $existingImageNames is not a string
                            }
                        ?>
                    <img id="image-preview" style="border-radius:10%; width:30%;" class="width=300" src="img/<?php echo $firstImage; ?>" alt=""><br><br>
                    <button type="button" id="profile_upload-btn" class="btn btn-info">Change Image <i class="fa fa-image"></i></button>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="form-group">
                    <select name="house_status" class="form-control" id="">
                        <option value='<?php echo $house_status; ?>'><?php echo $house_status; ?></option>

                        <?php
                            if($house_status == 'available' ) {
                                echo "<option value='sold'>Sold</option>";
                            } else {
                                echo "<option value='available'>Available</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_beds">House Beds</label>
                    <input type="text" value="<?php echo $house_beds; ?>" class="form-control" name="house_beds">
                </div>
            </div>
            
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_baths">House Beds</label>
                    <input type="text" value="<?php echo $house_baths; ?>" class="form-control" name="house_baths">
                </div>
            </div>
            
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_amenities">House Amenities</label>
                    <input type="text" value="<?php echo $house_amenities; ?>" class="form-control" name="house_amenities">
                </div>
            </div>
            
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_area">House Area</label>
                    <input type="text" value="<?php echo $house_area; ?>" class="form-control" name="house_area">
                </div>
            </div>
            
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_description">Description</label>
                    <textarea name="house_description" id="" cols="30" rows="10" class="form-control"><?php echo $house_description; ?></textarea>
                </div>
            </div>
            

            <div class="form-group text-right">
                <input type="submit" class="btn btn-warning" name="update_house" value="Update house">
            </div>
            
        </form>
    </div>
</section>