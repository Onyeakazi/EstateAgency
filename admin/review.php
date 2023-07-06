<?php include "includes/admin_header.php" ?>



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
                        <th># Id</th>
                        <th><i class="icon_image"></i> Image</th>
                        <th><i class="icon_pencil"></i> Full Name</th>
                        <th><i class="icon_mail_alt"></i> Message</th>
                        <th><i class="icon_star-half_alt"></i> Status</th>
                        <th><i class="icon_calendar"></i> Date</th>
                        <th><i class="icon_like_alt"></i> Approve</th>
                        <th><i class="icon_dislike_alt"></i> Unapprove</th>
                        <th><i class="icon_close"></i> Delete</th>
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
                      echo "<td>$id</td>";
                      echo "<td><a href=''><img width='50' src='/img/$image'></a></td>";
                      echo "<td>$full_name</td>";
                      echo "<td>$message</td>";
                      echo "<td>$statue</td>";
                      echo "<td>$date</td>";
                      echo "<td><a class='btn btn-success' href='review.php?approved=$id'><i class='icon_plus_alt2'></i></a>
                      </td>";
                      echo "<td><a class='btn btn-primary' href='review.php?unapproved=$id'><i class='icon_minus_alt2'></i></a>
                      </td>";
                      echo "<td><a class='btn btn-danger' href='javascript:void(0);' onclick='confirmDelete({$id})'><i class='icon_close_alt2'></i></a>
                      </td>";
                      echo "</tr>";
                    }
                 ?>

                </tbody>
            </table>
            
        </form>

        <?php 
          if(isset($_GET['approved'])){
            
            $the_review_id = $_GET['approved'];
 
            $query = "UPDATE review SET statue = 'approved' WHERE id = $the_review_id  ";
            $approve_review_query = mysqli_query($con, $query);
            header("Location: review.php");
           }


           if(isset($_GET['unapproved'])){
            
            $the_review_id = $_GET['unapproved'];
 
            $query = "UPDATE review SET statue = 'unapproved' WHERE id = $the_review_id  ";
            $approve_review_query = mysqli_query($con, $query);
            header("Location: review.php");
           }

            //DELETING THE REVIEW
           if(isset($_GET['delete'])){
            
            $review_id = $_GET['delete'];
 
            $query = "DELETE FROM review WHERE id = {$review_id} ";
            $delete_query = mysqli_query($con, $query);
            header("Location: review.php");
           }
        ?>
        </div>
      </div>

      

        </div>
      </div>
    </section>
      

<?php include "includes/admin_footer.php" ?>