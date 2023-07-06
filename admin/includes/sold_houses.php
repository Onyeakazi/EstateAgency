

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Location</th>
                        <th>Image</th>
                        <th>House Description</th>
                        <th>House Amenities</th>
                        <th>House Area</th>
                        <th>Status</th>
                        <th>Beds</th>
                        <th>Baths</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php 
                
                $query = "SELECT * FROM houses WHERE house_status = 'sold' ORDER BY id DESC ";
                $select_all_houses = mysqli_query($con, $query);

                while($row = mysqli_fetch_assoc($select_all_houses)) {
                    $house_id = $row['id'];
                    $house_name = $row['house_name'];
                    $house_amount = $row['house_amount'];
                    $house_location = $row['house_location'];
                    $house_description = $row['house_description'];
                    $house_amenities = $row['house_amenities'];
                    $house_area = $row['house_area'];
                    $house_image = $row['house_image'];
                    $house_status = $row['house_status'];
                    $house_beds = $row['house_beds'];
                    $house_baths = $row['house_baths'];
                    
                    echo "<tr>";
                    echo "<td>$house_id</td>";
                    echo "<td>$house_name</td>";
                    echo "<td>$house_amount</td>";
                    echo "<td>$house_location</td>";
                    // Display the first image from the house images
                    if (!empty($house_image)) {
                        $imageNames = explode(',', $house_image);
                        $first_image = $imageNames[0];
                        echo "<td><a href='house.php?source=house_view&d_id={$house_id}'><img width='100' src='img/" . trim($first_image) . "'></a></td>";
                    } else {
                        echo "<td>No image available</td>";
                    }
                    // echo "<td><a href='house.php?source=house_view&h_id={$house_id}'><img width='100' src='img/$house_image'></a></td>";
                    echo "<td>$house_description</td>";
                    echo "<td>$house_amenities</td>";
                    echo "<td>$house_area</td>";
                    echo "<td>$house_beds</td>";
                    echo "<td>$house_baths</td>";

                
                } ?>

                </tbody>
            </table>
