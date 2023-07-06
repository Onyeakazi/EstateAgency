<?php include "includes/admin_header.php" ?>

<?php



    $query = "SELECT * FROM about ";
    $select_about = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($select_about)) {
    $id = $row['id'];
    $about_heading = $row['about_heading'];
    $about_image = $row['about_image'];
    $about_since = $row['about_since'];
    $about_message = $row['about_message'];
    $about_sub_heading = $row['about_sub_heading'];
    $contact = $row['contact'];
    $location = $row['location'];


    }
      
    if(isset($_POST['update'])) {
        
        $about_heading = $_POST['about_heading'];
        $about_sub_heading = $_POST['about_sub_heading'];
        $contact = $_POST['contact'];
        $location = $_POST['location'];
        $about_since = $_POST['about_since'];
        $about_message = $_POST['about_message'];

        
        $about_image = $_FILES['image']['name'];
        $about_image_temp = $_FILES['image']['tmp_name'];

        // rETURNING COVER IMAGE
        if (!empty($about_image_temp)) {
            move_uploaded_file($about_image_temp, "img/$about_image");
        }
        
        $query = "UPDATE about SET ";
        $query.="about_heading = '{$about_heading}', ";   
        $query.="about_since = '{$about_since}', ";   
        $query.="contact = '{$contact}', ";   
        $query.="location = '{$location}', ";   
        $query.="about_sub_heading = '{$about_sub_heading}', ";
        $query.="about_image = '{$about_image}', ";
        $query.="about_message = '{$about_message}' ";
        $query.="WHERE id = {$id} ";

        $update = mysqli_query($con, $query);

        if(!$update) {
            echo "QUERY FALIED" . mysqli_error($con);
        }

        if ($update) {
            echo "<script>
                    Swal.fire({
                      title: 'Success!',
                      text: 'Updated!',
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
                  <h3 class="page-header"><i class="fa fa-tasks"></i> About Page</h3>
              </div>
            </div>

            <div class="col-lg-10 align-content-center ">
                <section class="panel">
                    <div class="panel-body">
                        <form action="about.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="cat-title" style="font-weight:700;">Heading</label>
                                <input type="text" class="form-control" name="about_heading" value="<?php echo $about_heading; ?>">
                            </div>
                                <div class="form-group">
                                    <label for="cat-title" style="font-weight:700;">Sub Heading</label>
                                    <input type="text" class="form-control" name="about_sub_heading" value="<?php echo $about_sub_heading; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cat-title" style="font-weight:700;">About Duration</label>
                                    <input type="text" class="form-control" name="about_since" value="<?php echo $about_since; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cat-title" style="font-weight:700;">Company Location</label>
                                    <input type="text" class="form-control" name="location" value="<?php echo $location; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="cat-title" style="font-weight:700;">Contact Description</label>
                                    <textarea id="textMessage" class="form-control" name="contact" cols="10" rows="5" required><?php echo $contact; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="cat-title" style="font-weight:700;">About Company</label>
                                    <textarea id="textMessage" class="form-control" name="about_message" cols="10" rows="8" required><?php echo $about_message; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="file" accept="image/*" name="image" id="inpfile" value="<?php echo $about_image; ?>" class="form-control" style="display: none;"><br>
                                    <img id="image-preview" style="border-radius:10%; width:20%;" class="width=300" src="img/<?php echo $about_image; ?>" alt=""><br><br>
                                    <button type="button" id="profile_upload-btn" class="btn btn-primary">About Cover page <i class="fa fa-image"></i></button>
                                </div>
                           <div class="form-group">
                                <input  class="btn btn-success" type="submit" name="update" value="Update Details">
                            </div>
                        </form>
                    </div>
                </section>
                
                <!--progress bar end-->
            </div>
        </div>
      </div>
    </section>
      

<?php include "includes/admin_footer.php" ?>