<?php include "includes/admin_header.php" ?>

<?php

   if(isset($_GET['id'])){

    $the_id = $_GET['id'];
    

   }

    $query = "SELECT * FROM coverpage WHERE id = $the_id ";
    $select__by_id = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($select__by_id)) {
    $id = $row['id'];
    $cover_name = $row['cover_name'];
    $cover_amount = $row['cover_amount'];
    $cover_location = $row['cover_location'];
    $cover_image = $row['cover_image'];

    }
      
    if(isset($_POST['update'])) {
        
        $cover_name = $_POST['cover_name'];
        $cover_amount = $_POST['cover_amount'];
        $cover_location = $_POST['cover_location'];
        $cover_image = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        
        move_uploaded_file($image_temp, "img/$cover_image");

        if(empty($cover_image)) {
            $query = "SELECT * FROM coverpage WHERE id = $the_id ";
            $select_image = mysqli_query($con, $query);

            while($row = mysqli_fetch_array($select_image)) {
                $cover_image = $row['cover_image'];
            }
        }

        
        $query = "UPDATE coverpage SET ";
        $query.="cover_name = '{$cover_name}', ";   
        $query.="cover_amount = '{$cover_amount}', ";
        $query.="cover_location = '{$cover_location}', ";
        $query.="cover_image = '{$cover_image}' ";
        $query.="WHERE id = {$the_id} ";

        $update = mysqli_query($con, $query);

        if(!$update) {
            echo "QUERY FALIED" . mysqli_error($con);
        }

        if ($update) {
            echo "<script>
                    Swal.fire({
                      title: 'Success!',
                      text: 'Coverpage Updated!',
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
                  <h3 class="page-header"><i class="fa fa-tasks"></i>Edit Cover Page</h3>
              </div>
            </div>

            <div class="col-xs-9">
                <!--progress bar start-->

                <section class="panel ">
                    <div class="panel-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group has-success">
                                <label for="cat-title" style="font-weight:700;">Coverpage Display Name</label>
                                <input type="text" class="form-control" name="cover_name" value="<?php echo $cover_name; ?>">
                            </div>
                            <div class="form-group has-success">
                                <label for="cat-title" style="font-weight:700;">Coverpage Display Amount</label>
                                <input type="text" class="form-control" name="cover_amount" value="<?php echo $cover_amount; ?>">
                            </div>
                            <div class="form-group has-success">
                                <label for="cat-title" style="font-weight:700;">Coverpage Display Location</label>
                                <input type="text" class="form-control" name="cover_location" value="<?php echo $cover_location ?>">
                            </div>
                            <div class="form-group has-success">
                                <input type="file" accept="image/*" name="image" id="inpfile" value="<?php echo $cover_image; ?>" class="form-control" style="display: none;"><br>
                                <img id="image-preview" style="border-radius:10%; width:60%;" class="width=300" src="img/<?php echo $cover_image; ?>" alt=""><br><br>
                                <button type="button" id="profile_upload-btn" class="btn btn-warning">Choose Coverpage Image <i class="fa fa-image"></i></button>
                            </div>
                            <div class="form-group">
                                <input  class="btn btn-success" type="submit" name="update" value="Update Cover Details">
                            </div>
                        </form>
                    </div>
                </section>
                
                <!--progress bar end-->
            </div>

            <br>
            
        </div>
      </div>
    </section>
      

<?php include "includes/admin_footer.php" ?>