<?php include "includes/admin_header.php" ?>



  <!-- container section start -->
  <section id="container" class="">

    <?php include "includes/nav_header.php" ?>

    <?php include "includes/sidebar.php" ?>

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Welcome to admin 

            <small style=color:blue;><?php echo $_SESSION['username'] ?></small>

          </h3>

            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="admin_index">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">

         <!-- TOTAL HOUSE ROW COUNT -->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg" style="border-radius:10px;">
              <i><img src="./img/houses.png" width="50" alt=""></i>

              <?php 
               $query = "SELECT * FROM houses ";
               $select_house = mysqli_query($con, $query);
               $house_count = mysqli_num_rows($select_house); 

               echo "<div class='count'>{$house_count}</div>"
              
              ?>

              <div class="title">Houses</div>
              <hr>
              <a href="house.php" style="color:white; background-color:#4e73df; padding:5px; border-radius:6px;font-size:20px; font-weight:300; text-decoration:none">View Details</a>
            </div>
            <!--/.info-box-->
             
            </div>
          <!--/.col-->

         <!-- TOTAL FREE HOUSE ROW COUNT -->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg" style="border-radius:10px;">
              <i><img src="./img/free_house.png" width="80" alt=""></i>

              <?php 
              $query = "SELECT * FROM houses WHERE house_status = 'available' ";
              $select_free_houses = mysqli_query($con, $query);
              $free_houses = mysqli_num_rows($select_free_houses);

              echo "<div class='count'>{$free_houses}</div>";
              
              ?>

              <div class="title">Free Houses</div>
              <hr>
              <a href="house.php?source=avaliable_house" style="color:white; background-color:#4e73df; padding:5px; border-radius:6px;font-size:20px; font-weight:300; text-decoration:none">View Details</a>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

         <!-- TOTAL SLOD OUT HOUSE ROW COUNT -->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box red-bg" style="border-radius:10px;">
              <i><img src="./img/sold_houses.png" width="60" alt=""></i>

              <?php 
              $query = "SELECT * FROM houses WHERE house_status = 'sold' ";
              $sold_houses = mysqli_query($con, $query);
              $sold_houses_counts = mysqli_num_rows($sold_houses);

              echo "<div class='count'>{$sold_houses_counts}</div>";
              
              ?>

              <div class="title">Sold Houses</div>
              <hr>
              <a href="house.php?source=sold_houses" style="color:white; background-color:#4e73df; padding:5px; border-radius:6px;font-size:20px; font-weight:300; text-decoration:none">View Details</a>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <!-- TOTAL REVIEW ROW COUNT -->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box yellow-bg" style="border-radius:10px;">
              <i><img src="./img/review.png" width="60" alt=""></i>

              <?php 
              $query = "SELECT * FROM review ";
              $review = mysqli_query($con, $query);
              $review_counts = mysqli_num_rows($review);

              echo "<div class='count'>{$review_counts}</div>";
              
              ?>

              <div class="title">Reviews</div>
              <hr>
              <a href="review.php" style="color:white; background-color:#4e73df; padding:5px; border-radius:6px;font-size:20px; font-weight:300; text-decoration:none">View Details</a>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->
        </div>
        <!--/.row-->


    <!-- SHOWING THE REVIEW INFORMATION -->

    <!--main content start-->

      <div class="row">
        <div class="col-lg-12">

            <div class="row">
              <div class="col-lg-12">
                  <h3 class="page-header"><i class="fa fa-tasks"></i> Reviews</h3>
              </div>
            </div>

        <form action="" method="POST">
            <br>
            <!-- <header class="panel-heading">
                REVIEW TABLE
              </header> -->
            <table class="table table-bordered table-hover">
                <thead>
                    </tr>
                        <th><i class="icon_image"></i> Image</th>
                        <th><i class="icon_pencil"></i> Full Name</th>
                        <th><i class="icon_mail_alt"></i> Message</th>
                        <th><i class="icon_star-half_alt"></i> Status</th>
                        <th><i class="icon_calendar"></i> Date</th>
                    </tr>
                </thead>
                <tbody>
                     
                <?php 
                    
                    $query = "SELECT * FROM review ORDER BY id DESC";
                    $select_all_reviews = mysqli_query($con, $query);

                    while($row = mysqli_fetch_assoc($select_all_reviews)) {
                      $id = $row['id'];
                      $full_name = $row['full_name'];
                      $message = $row['message'];
                      $statue = $row['statue'];
                      $image = $row['image'];
                      $date = $row['review_date'];
                      
                      echo "<tr>";
                      echo "<td><a href=''><img width='50' src='/img/$image'></a></td>";
                      echo "<td>$full_name</td>";
                      echo "<td>$message</td>";
                      echo "<td>$statue</td>";
                      echo "<td>$date</td>";
                      echo "</tr>";
                    }
                 ?>

                </tbody>
            </table>
            
        </form>
        </div>
      </div> <!--  END OF MAIN CONTAINER -->

    

  </section>
      

<?php include "includes/admin_footer.php" ?>