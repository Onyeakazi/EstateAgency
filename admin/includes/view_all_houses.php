<?php 

if(isset($_POST['checkBoxArray'])) {
    
    foreach($_POST['checkBoxArray'] as $checkBoxValue ) {
        
        $bulk_options = $_POST['bulk_options'];

        switch ($bulk_options) {
            case 'sold':
                
            $query = "UPDATE houses SET house_status = '{$bulk_options}' WHERE id = {$checkBoxValue} ";
            $check_box_update = mysqli_query($con, $query);
            
            break;

            case 'available':
                
            $query = "UPDATE houses SET house_status = '{$bulk_options}' WHERE id = {$checkBoxValue} ";
            $check_box_update = mysqli_query($con, $query);

            break;

            case 'delete':
            
            $query = "DELETE FROM houses WHERE id = {$checkBoxValue} ";
            $check_box_update = mysqli_query($con, $query);
    
            break;
            
            default:
                break;
        }
    }
}



?>

        <form action="" method="post">

            <div id="bulkOptionContainer" class="col-xs-4" style=" padding:0px; ">

            <select class="form-control" name="bulk_options" id="">
                
                <option value="">Select Option</option>
                <option value="available">Available</option>
                <option value="sold">Sold</option>
                <option value="delete">Delete</option>

            </select>
            </div>

            <div class="col-xs-4">
                <input type="submit" name="submit" class="btn btn-success" value="Apply">
                <a href="house.php?source=add_house" class="btn btn-primary">Add New</a>
            </div>
            <br>
            <table class="table table-bordered table-hover">
                <thead>
        
                        <th><input id="selectAllBoxes" type="checkbox"></th>
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
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php 
                
                $query = "SELECT * FROM houses ORDER BY id DESC";
                $select_all_houses = mysqli_query($con, $query);

                while($row = mysqli_fetch_assoc($select_all_houses)) {
                $house_id = $row['id'];
                $house_name = $row['house_name'];
                $house_amount = $row['house_amount'];
                $house_description = $row['house_description'];
                $house_amenities = $row['house_amenities'];
                $house_area = $row['house_area'];
                $house_location = $row['house_location'];
                $house_image = explode(',', $row['house_image']);
                $house_status = $row['house_status'];
                $house_beds = $row['house_beds'];
                $house_baths = $row['house_baths'];

                
                
                echo "<tr>";
                ?>

                <td><input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $house_id ?>'></td>;

                <?php
                    
                echo "<td>$house_id</td>";
                echo "<td>$house_name</td>";
                echo "<td>$house_amount</td>";
                echo "<td>$house_location</td>";
                    // Display the first image from the house images
                    if (!empty($house_image)) {
                        $first_image = $house_image[0];
                        echo "<td><a href='house.php?source=house_view&d_id={$house_id}'><img width='100' src='img/" . trim($first_image) . "'></a></td>";
                    } else {
                        echo "<td>No image available</td>";
                    }
                // echo "<td><a href='house.php?source=house_view&d_id={$house_id}'><img width='100' src='../assets/img/$house_image'></a></td>";
                echo "<td>$house_description</td>";
                echo "<td>$house_amenities</td>";
                echo "<td>$house_area</td>";
                echo "<td>$house_status</td>";
                echo "<td>$house_beds</td>";
                echo "<td>$house_baths</td>";
                echo "<td><a class='btn btn-success' href='house.php?source=edit_house&h_id={$house_id}'>Edit</a></td>";
                echo "<td><a class='btn btn-danger' href='javascript:void(0);' onclick='confirmDelete({$house_id})'>Delete</a></td>";
                echo "</tr>";

                
                 } ?>

                </tbody>
            </table>
            
        </form>

            <?php 

            if(isset($_GET['delete'])) {

                $house_id = $_GET['delete'];

                $query = "DELETE FROM houses WHERE id = $house_id";
                $delete_house = mysqli_query($con, $query);

                header("Location: house.php");

            } else {
                
            }

            
            ?>

        </div>
      </div>

      