
<?php
if(isset($_POST['create_house'])) {
    $house_name = $_POST['house_name'];
    $house_amount = $_POST['house_amount'];
    $house_location = $_POST['house_location'];
    $house_description = $_POST['house_description'];
    $house_amenities = $_POST['house_amenities'];
    $house_area = $_POST['house_area'];
    $house_status = $_POST['house_status'];
    $house_beds = $_POST['house_beds'];
    $house_baths = $_POST['house_baths'];

    $house_image = [$_FILES['images']['name']];
    $totalFiles = count($_FILES['images']['name']);
    
        // Loop through each file
        $fileNames = array();
        foreach ($_FILES['images']['name'] as $i => $house_image) {
            $fileTmpName = $_FILES['images']['tmp_name'][$i];

            // Move the file to the specified directory
            if (move_uploaded_file($fileTmpName, "img/$house_image")) {
                $fileNames[] = $house_image;
            } else {
                echo "Error uploading {$house_image}.<br>";
            }
        }
        $house_image = implode(",", $fileNames);
    
    $query = "INSERT INTO houses (house_name, house_amount, house_location, house_description, house_amenities, house_area, house_image, house_status, house_beds, house_baths) ";
    $query .= "VALUES ('{$house_name}', '{$house_amount}', '{$house_location}', '{$house_description}', '{$house_amenities}', '{$house_area}', '{$house_image}', '{$house_status}', '{$house_beds}', '{$house_baths}')";

    $create_house_query = mysqli_query($con, $query);

    if ($create_house_query) {
        echo "<script>
            Swal.fire({
                title: 'Success!',
                text: 'House added successfully!',
                confirmButtonColor: '#ffa500',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>";
    }

    echo "<p class='bg-success'><a href='house.php'>View houses</a></p>";
}

?>

<section class="panel ">
    <div class="panel-body">
        <form action="" id="upload" method="POST" enctype="multipart/form-data">
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_name" style="font-weight:700;">House Name</label>
                    <input type="text" class="form-control" name="house_name">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_amount" style="font-weight:700;">House Amount</label>
                    <input type="text" class="form-control" name="house_amount">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_location" style="font-weight:700;">Location</label>
                    <input type="text" class="form-control" name="house_location">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="image" style="font-weight:700;">Image</label>
                    <input type="file" class="form-control" name="images[]" id="inpfile" accept="images/*" style="display: none;" multiple><br>
                    <img id="image-preview" style="border-radius:10%; width:30%;" class="width=300" src="img/Adefault.png" alt=""><br><br>
                    <button type="button" id="profile_upload-btn" class="btn btn-info">Choose Image <i class="fa fa-image"></i></button>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <select name="house_status" class="form-control" id="">
                        <option value="sold" style="font-weight:700;">House Status</option>
                        <option value="available">Available</option>
                        <option value="sold">Sold</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_beds" style="font-weight:700;">House Beds</label>
                    <input type="text" class="form-control" name="house_beds">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_baths" style="font-weight:700;">House Baths</label>
                    <input type="text" class="form-control" name="house_baths">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_amenities" style="font-weight:700;">House Amenities</label>
                    <input type="text" class="form-control" name="house_amenities">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_area" style="font-weight:700;">House Area</label>
                    <input type="text" class="form-control" name="house_area">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="house_description" style="font-weight:700;">Description</label>
                    <textarea name="house_description" id="" cols="30" rows="10" class="form-control" placeholder="Your Text"></textarea>
                </div>
            </div>

            <div class="form-group text-right">
                <input type="submit" class="btn btn-success" name="create_house" value="Publish house">
            </div>
            

            

        </form>
    </div>
</section>


