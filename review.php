<?php include "includes/header.php" ?>

<?php 
 if(isset($_POST['send'])) {
   $name = $_POST['name'];
   $message = $_POST['message'];

   $review_image = $_FILES['img']['name'];
   $review_temp = $_FILES['img']['tmp_name'];

    move_uploaded_file($review_temp, "admin/img/$review_image");

    $query = "INSERT INTO review(full_name, message, image, statue, review_date) ";
    $query .= "VALUES('{$name}', '{$message}', '{$review_image}', 'unapproved', now() )";

    $create_review_query = mysqli_query($con, $query);
    
    // / Display SweetAlert after successful form submission
    if ($create_review_query) {
      echo "<script>
              Swal.fire({
                title: 'Success!',
                text: 'Review submitted successfully!',
                icon: 'success',
                confirmButtonColor: '#ffa500',
                confirmButtonText: 'OK'
              });
            </script>";
    }
 }
?>


  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8" data-aos="fade-right" data-aos-duration="1000">
            <div class="title-single-box">
              <h1 class="title-single">Review Us</h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Review
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Blog Single ======= -->
    <section class="news-single nav-arrow-b">
      <div class="container">
        <div class="row">
          <div class="col-sm-12" data-aos="zoom-out" data-aos-duration="1000">
            <div class="news-img-box">
              <img src="assets/img/slide-3.jpg" alt="" class="img-fluid">
            </div>
          </div>
            <br><br>
            <div class="col-lg-8" style="box-shadow:2px -2px 14px 3px whitesmoke; margin-top: 50px; padding: 22px 39px 66px;">
              <div class="title-box-d">
                <h3 class="title-d"> We appreciate your review &#128513; &#x2764; &#x1F4AF;</h3>
              </div>
                <form action="review.php" method="POST" enctype="multipart/form-data" class="form-a">
                  <div class="row">
                    <div class="col-md-10 mb-5">
                      <div class="form-group has-success">
                        <label for="inputName">Name</label>
                        <input type="text" name="name" class="form-control form-control-lg form-control-a" id="inputName" placeholder="Enter full name" required>
                      </div>
                    </div>
                    <div style="text-align: left;">
                      <div class="col-md-6 mb-5">
                        <div class="form-group">
                          <label for="inpfile">Display Image</label>:</label>
                          <input type="file" accept="image/*" name="img" id="inpfile" required class="form-control" style="display: none;"><br>
                          <img id="image-preview" style="border-radius:50%; width:30%;" class="image-preview__image" src="img/default.png" alt=""><br><br>
                          <button type="button" id="profile_upload-btn" class="btn btn-success">Choose Avatar <i class="fa fa-image"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-10 mb-3">
                      <div class="form-group">
                        <label for="textMessage">Review</label>
                        <textarea id="textMessage" class="form-control" placeholder="Enter a review " name="message" cols="10" rows="8" required></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <!-- <button type="submit" class="" name=""></button> -->
                      <input type="submit" class="btn btn-a" name="send" value="Send Message">
                    </div>
                  </div>
                </form>
              </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section><!-- End Blog Single-->

    <!-- ======= Testimonials Section ======= -->

      <!-- PULLING THE REVIEW DYNAMICALLY -->
      <?php include "includes/review.php"; ?>

    <!-- ======= Testimonials Section End======= -->

  </main><!-- End #main -->


<?php include "includes/footer.php" ?>