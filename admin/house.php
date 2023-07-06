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
                  <h3 class="page-header"><i class="fa fa-tasks"></i> Houses</h3>
              </div>
            </div>

           <?php 
           
           if(isset($_GET['source'])) {

            $source = $_GET['source'];

           } else {

            $source = '';

           }

           switch($source) {

            case 'add_house';
            include "includes/add_house.php";
            break;

            case 'edit_house';
            include "includes/edit_house.php";
            break;

            case 'avaliable_house';
            include "includes/avaliable_house.php";
            break;

            case 'house_view';
            include "includes/view_house_details.php";
            break;

            case 'sold_houses';
            include "includes/sold_houses.php";
            break;

            default:
            include "includes/view_all_houses.php";
            break;
           }
           
           
           ?>

        </div>
      </div>
    </section>
      

<?php include "includes/admin_footer.php" ?>