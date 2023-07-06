
                    
                <?php

                if(isset($_GET['d_id'])){

                    $the_house_id = $_GET['d_id'];
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
                $house_image = $row['house_image'];
                $house_status = $row['house_status'];
                $house_beds = $row['house_beds'];
                $house_baths = $row['house_baths'];

                $imageNames = explode(',', $house_image); // Convert the image names string to an array
                $firstImage = $imageNames[0]; // Get the first image name
                
                ?>

                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <img width="400" src="img/<?php echo $firstImage; ?>" alt="">
                        </div>
                        <div class="col-md-6">
                            <h1 style="font-size:50px;font-weight: 600; text-decoration:underline;">About house</h1>
                            <h3><span style="font-weight: 600;">Name:</span><?php echo $house_name ?>.</h3>
                            <h3><span style="font-weight: 600;">Amount:</span><?php echo $house_amount ?>.</h3>
                            <h3><span style="font-weight: 600;">Location:</span><?php echo $house_location ?>.</h3>
                            <h3><span style="font-weight: 600;">Description:</span><?php echo $house_description ?></h3>
                            <h3><span style="font-weight: 600;">Amenities:</span><?php echo $house_amenities ?></h3>
                            <h3><span style="font-weight: 600;">Area:</span><?php echo $house_area ?></h3>
                            <h3><span style="font-weight: 600;">Rooms:</span><?php echo $house_beds ?>.</h3>
                            <h3><span style="font-weight: 600;">Bathrooms:</span><?php echo $house_baths ?>.</h3>
                        </div>
                    </div>
                </div>

                <?php } ?>

        </div>
      </div>

      