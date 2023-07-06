<?php include "includes/admin_header.php" ?>

<?php
if(isset($_POST['submit'])) {
    $Cname = $_POST['Cname'];
    $Camount = $_POST['Camount'];
    $Clocation = $_POST['Clocation'];

    $image = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    
        // SHOW IMAGE
        move_uploaded_file($image_temp, "img/$image");
    
    $query = "INSERT INTO coverpage (cover_name, cover_amount, cover_location, cover_image ) ";
    $query .= "VALUES ('{$Cname}', '{$Camount}', '{$Clocation}', '{$image}')";

    $create_coverpage_query = mysqli_query($con, $query);

    if ($create_coverpage_query) {
        echo "<script>
                Swal.fire({
                  title: 'Success!',
                  text: 'Coverpage Created!',
                  confirmButtonColor: '#ffa500',
                  confirmButtonText: 'OK'
                });
              </script>";
    }

}

?>


  <!-- container section start -->
  <section id="container" class="">
      
    <?php include "includes/nav_header.php" ?>



    <!-- SIDEBAR -->
    <?php include "includes/sidebar.php" ?>



    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">

      <div class="row">
        <div class="col-lg-12">

            <div class="row">
              <div class="col-lg-12">
                  <h3 class="page-header"><i class="fa fa-tasks"></i> Cover Page</h3>
              </div>
            </div>

            <div class="col-xs-5">
                <section class="panel ">
                    <div class="panel-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group has-success">
                                <label for="cat-title" style="font-weight:700;">Coverpage Name</label>
                                <input type="text" class="form-control" name="Cname">
                            </div>
                            <div class="form-group has-success">
                                <label for="cat-title" style="font-weight:700;">Coverpage Amount</label>
                                <input type="text" class="form-control" name="Camount">
                            </div>
                            <div class="form-group has-success">
                                <label for="cat-title" style="font-weight:700;">Coverpage Location</label>
                                <input type="text" class="form-control" name="Clocation">
                            </div>
                            <div class="form-group has-success">
                                <input type="file" accept="image/*" name="image" id="inpfile" value="" required class="form-control" style="display: none;"><br>
                                <img id="image-preview" style="border-radius:10%; width:30%;" class="width=300" src="img/Adefault.png" alt=""><br><br>
                                <button type="button" id="profile_upload-btn" class="btn btn-primary">Choose Coverpage Image <i class="fa fa-image"></i></button>
                            </div>
                            <div class="form-group">
                                <input  class="btn btn-success" type="submit" name="submit" value="Add Cover Details">
                            </div>
                        </form>
                    </div>
                </section>
                
                <!--progress bar end-->
            </div>

            <br>
            <div class="col-sm-7">
                <section class="panel">
                    <header class="panel-heading">
                        Cover Pages 
                    </header>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Coverpage Image</th>
                            <th>Coverpage Name</th>
                            <th>Coverpage Amount</th>
                            <th>Coverpage Location</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="active">
                            <?php 
                        
                                $query = "SELECT * FROM coverpage ORDER BY id DESC";
                                $select_all_coverpage = mysqli_query($con, $query);

                                while($row = mysqli_fetch_assoc($select_all_coverpage)) {
                                    $id = $row['id'];
                                    $cover_name = $row['cover_name'];
                                    $cover_location = $row['cover_location'];
                                    $cover_amount = $row['cover_amount'];
                                    $cover_image = $row['cover_image'];
                                    
                                    echo "<tr>";
                                    echo "<td>$id</td>";
                                    echo "<td><a href=''><img width='100' src='../assets/img/$cover_image'></a></td>";
                                    echo "<td>$cover_name</td>";
                                    echo "<td>$cover_amount</td>";
                                    echo "<td>$cover_location</td>";
                                    echo "<td><a class='btn btn-success' href='edit_cover_page.php?id={$id}'><i class='icon_plus_alt2'></i></a>
                                    </td>";
                                    echo "<td><a class='btn btn-danger' href='javascript:void(0);' onclick='confirmDelete({$id})'><i class='icon_trash_alt'></i></a></td>";
                                    echo "</tr>";
                                }
                            ?>

                        </tr>
                        </tbody>
                    </table>

                    <?php 

                        if(isset($_GET['delete'])) {

                            $id = $_GET['delete'];

                            $query = "DELETE FROM coverpage WHERE id = $id";
                            $delete_page = mysqli_query($con, $query);
                            header("Location: cover_page.php");

                        } else {
                            
                        }

                        
                    ?>
                </section>
            </div>
        </div>
      </div>
    </section>
      

<?php include "includes/admin_footer.php" ?>