<?php include "includes/header.php" ?>
<?php

      $query = "SELECT * FROM about ";
      $about_query = mysqli_query($con, $query);

      while($row = mysqli_fetch_assoc($about_query)) {
      $id = $row['id'];
      $about_heading = $row['about_heading'];
      $about_sub_heading = $row['about_sub_heading'];
      $about_image = $row['about_image'];
      $about_message = $row['about_message'];
      $about_since = $row['about_since'];
      }
    ?>

  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box" data-aos="fade-down" data-aos-duration="1000">
              <h1 class="title-single"><?php echo $about_heading; ?></h1>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  About
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= About Section ======= -->
    <section class="section-about">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 position-relative" data-aos="zoom-in" data-aos-duration="1000">
            <div class="about-img-box">
              <img src="admin/img/<?php echo $about_image; ?>" alt="" class="img-fluid">
            </div>
            <div class="sinse-box">
              <h3 class="sinse-title">EstateAgency
                <span></span>
                <br> <?php echo $about_since; ?>
              </h3>
            </div>
          </div>

          <?php 
              $query = "SELECT * FROM users";
              $select_user = mysqli_query($con, $query);
              
              while($row = mysqli_fetch_assoc($select_user)) {
                $id = $row['id'];
                $image = $row['image'];

              }
          ?>
          <div class="col-md-12 section-t8 position-relative">
            <div class="row">
              <div class="col-md-6 col-lg-5" data-aos="fade-up-right" data-aos-duration="1000">
                <img src="assets/img/<?php echo $image; ?>" alt="" class="img-fluid">
              </div>
              <!-- <div class="col-lg-2  d-none d-lg-block position-relative">
                <div class="title-vertical d-flex justify-content-start">
                  <span>EstateAgency Exclusive Property</span>
                </div>
              </div> -->
              <div class="col-md-6 col-lg-5 section-md-t3">
                <div class="title-box-d" data-aos="fade-up-left" data-aos-duration="1000">
                  <h3 class="title-d">
                  <?php echo $about_sub_heading; ?>
                  </h3>
                </div>
                <p class="color-text-a" data-aos="fade-down" data-aos-duration="1000">
                  <?php echo $about_message; ?>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <?php include "includes/footer.php" ?>