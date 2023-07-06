<?php include "includes/header.php" ?>
<?php include "includes/db.php" ?>


  <main id="main">

    <!-- ======= Intro Single ======= -->
    <section class="intro-single">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-lg-8">
            <div class="title-single-box" data-aos="zoom-in" data-aos-duration="1000">
              <h1 class="title-single">Our Amazing Properties</h1>
              <span class="color-text-a">Grid Properties</span>
            </div>
          </div>
          <div class="col-md-12 col-lg-4">
            <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="index.php">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  Properties Grid
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Intro Single-->

    <!-- ======= Property Grid ======= -->

    <!-- ==== FETCHING PROPERTIES FROM THE DATABASE ==== -->
    


    <section class="property-grid grid">
      <div class="container">
        <div class="row">

          

          <?php

            $per_page = 6;

            if(isset($_GET['page'])){

                $page = $_GET['page'];

            } else {

                $page = "";

            }

            if($page == "" || $page == 1) {
                $page_1 = 0;
            } else {
              $page_1 = ($page * $per_page) - $per_page;
            }

            $query = "SELECT * FROM houses";
            $find_count = mysqli_query($con, $query);
            $count = mysqli_num_rows($find_count);

            $count = ceil($count / 6);



            $query = "SELECT * FROM houses WHERE house_status = 'available' LIMIT $page_1, $per_page";
            $select_all_house_query = mysqli_query($con, $query);

            while($row = mysqli_fetch_assoc($select_all_house_query)) {
              $id = $row['id'];
              $house_name = $row['house_name'];
              $house_amount = $row['house_amount'];
              $house_description = $row['house_description'];
              $house_image = $row['house_image'];
              $house_location = $row['house_location'];
              $house_status = $row['house_status'];
              $house_area = $row['house_area'];
              $house_beds = $row['house_beds'];
              $house_baths = $row['house_baths'];
              $house_amenities = $row['house_amenities'];

              $imageNames = explode(',', $house_image); // Convert the image names string to an array
              $firstImage = $imageNames[0]; // Get the first image name
              
          ?>
          <div class="col-md-4">
            <div class="card-box-a card-shadow" data-aos="zoom-in-up" data-aos-duration="1000">
              <div class="img-box-a">
                <img src="./admin/img/<?php echo $firstImage; ?>" alt="" class="img-a img-fluid">
              </div>
              <div class="card-overlay">
                <div class="card-overlay-a-content">
                  <div class="card-header-a">
                    <h2 class="card-title-a">
                      <a href="#">
                        <br /> <?php echo $house_name?></a>
                    </h2>
                  </div>
                  <div class="card-body-a">
                    <div class="price-box d-flex">
                      <span class="price-a">rent | <?php echo $house_amount?></span>
                    </div>
                    <a href="property-single.php?source=view_single&p_id=<?php echo $id; ?>" class="link-a">Click here to view
                      <span class="bi bi-chevron-right"></span>
                    </a>
                  </div>
                  <div class="card-footer-a">
                    <ul class="card-info d-flex justify-content-around">
                      <li>
                        <h4 class="card-info-title">Area</h4>
                        <span><?php echo $house_area?>
                          <sup>2</sup>
                        </span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Beds</h4>
                        <span><?php echo $house_beds?></span>
                      </li>
                      <li>
                        <h4 class="card-info-title">Baths</h4>
                        <span><?php echo $house_baths?></span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>


        <!-- END OF LOOP -->
        <?php } ?>

          
        </div>
        

        <div class="row">
          <div class="col-sm-12">
            <nav class="pagination-a">
              <ul class="pagination justify-content-end">
                
                <?php 
                
                  for($i =1; $i <= $count; $i++) {
                    if($i == $page) {
                      echo "<li class='page-item'><a class='page-link active' style='
                      background: #ffa500;' href='property-grid.php?page={$i}'>{$i}</a></li>";
                    } else {
                      echo "<li class='page-item'><a class='page-link' href='property-grid.php?page={$i}'>{$i}</a></li>";
                    }
                  }
                  
                ?> 
                
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </section><!-- End Property Grid Single-->

  </main><!-- End #main -->


<?php include "includes/footer.php" ?>