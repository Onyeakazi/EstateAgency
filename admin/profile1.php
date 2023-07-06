<?php include "includes/admin_header.php" ?>



<?php 
    if(isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_profile_query = mysqli_query($con, $query);

    while($row = mysqli_fetch_array($select_user_profile_query)) {

    $id = $row['id'];
    $username = $row['username'];
    $full_name = $row['full_name'];
    $phone = $row['phone'];
    $about = $row['about'];
    $image = $row['image'];
    $password = $row['password'];
    $email = $row['email'];

  }

}

if(isset($_POST['update_profile'])) {

  $username = $_POST['username'];
  $full_name = $_POST['full_name'];
  $phone = $_POST['phone'];
  $about = $_POST['about'];
  $password = $_POST['password'];
  $image = $_FILES['image']['name'];
  $image_temp = $_FILES['image']['tmp_name'];
  $email = $_POST['email'];
  
  move_uploaded_file($image_temp, "../assets/img/$image");

  if(empty($image)) {
    $query = "SELECT * FROM users WHERE id = $id ";
    $select_image = mysqli_query($con, $query);

    while($row = mysqli_fetch_array($select_image)) {
        $image = $row['image'];
    }
}

  $query = "UPDATE users SET ";
  $query.="username = '{$username}', ";
  $query.="full_name = '{$full_name}', ";   
  $query.="phone = '{$phone}', ";   
  $query.="about = '{$about}', ";   
  $query.="password = '{$password}', ";
  $query.="image = '{$image}', ";
  $query.="email = '{$email}' ";
  $query.= "WHERE username = '{$username}' ";

  $update_user = mysqli_query($con, $query);

  if ($update_user) {
    echo "<script>
            Swal.fire({
              title: 'Success!',
              text: 'Profile Updated!',
              confirmButtonColor: '#ffa500',
              confirmButtonText: 'OK'
            });
          </script>";
}

  if(!$update_user) {
      echo "QUERY FALIED" . mysqli_error($con);
  }

  // echo "<p class='bg-success'>Profile Updated";


}

?> 


<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="admin_index.php" class="logo">EstateAgency<span class="lite">Admin</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>
        </ul>
        <!--  search form end -->
      </div>

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <!-- user login dropdown start-->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" width='50' src="../assets/img/<?php echo $image; ?>">
                            </span>
                            <span class="username"><?php echo $username; ?></span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li>
                <a href="login.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    
    <!-- SIDEBAR -->
    <?php include "includes/sidebar.php" ?>
    <!--sidebar end-->


    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="admin_index.php">Home</a></li>
              <li><i class="icon_documents_alt"></i>Pages</li>
              <li><i class="fa fa-user-md"></i>Profile</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                <div class="col-lg-2 col-sm-2">
                  <h4><?php echo $full_name; ?></h4>
                  <div class="follow-ava">
                    <img alt="" width='50' src="../assets/img/<?php echo $image; ?>">
                  </div>
                  <h6>Administrator</h6>
                </div>
                <div class="col-lg-4 col-sm-4 follow-info">
                  <p>Hello I’m <?php echo $username; ?>, a leading expert in interactive and creative design.</p>
                  <!-- <p>@jenifersmith</p>
                  <p><i class="fa fa-twitter">jenifertweet</i></p>
                  <h6>
                                    <span><i class="icon_clock_alt"></i>11:05 AM</span>
                                    <span><i class="icon_calendar"></i>25.10.13</span>
                                    <span><i class="icon_pin_alt"></i>NY</span>
                                </h6> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  <li>
                    <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          Profile
                                      </a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          Edit Profile
                                      </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                  <div id="recent-activity" class="tab-pane active">
                    <div class="profile-activity">
                      <div class="act-time">
                        <div class="activity-body act-in">
                          <span class="arrow"></span>
                          <div class="text">
                            <a href="#" class="activity-img"><img alt="" width='50' src="../assets/img/<?php echo $image; ?>"></a>
                            <p class="attribution"><a href="#"><?php echo $username; ?></a> at 4:25pm, 30th Octmber 2014</p>
                            <p><?php echo $about; ?></p>
                          </div>
                          <div class="text">
                            <a href="#" class="activity-img"><img alt="" width='50' src="../assets/img/<?php echo $image; ?>"></a>
                            <p class="attribution"><a href="#"><?php echo $username; ?></a> at 4:25pm, 30th Octmber 2014</p>
                            <p>It is a long established fact that a reader will be distracted layout</p>
                          </div>
                          <div class="text">
                            <a href="#" class="activity-img"><img alt="" width='50' src="../assets/img/<?php echo $image; ?>"></a>
                            <p class="attribution"><a href="#"><?php echo $username; ?></a> at 4:25pm, 30th Octmber 2014</p>
                            <p>It is a long established fact that a reader will be distracted layout</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- profile -->
                  <div id="profile" class="tab-pane">
                    <section class="panel">
                      <div id="recent-activity" class="tab-pane active">

                      <div class="bio-graph-heading">
                        Hello I’m <?php echo $username; ?>, a leading expert in interactive and creative design specializing in the mobile medium. My graduation from Massey University with a Bachelor of Design majoring in visual communication.
                      </div>
                      <div class="panel-body bio-graph-info">
                        
                        <div class="row">
                          <div class="bio-row">
                            <p><span>FullName </span>: <?php echo $full_name; ?></p>
                          </div>

                          <div class="bio-row">
                            <p><span>UserName </span>: <?php echo $username; ?></p>
                          </div>

                          <div class="bio-row">
                            <p><span>Phone </span>: <?php echo $phone; ?></p>
                          </div>
                          
                          <div class="bio-row">
                            <p><span>Email: </span><?php echo $email; ?></p>
                          </div>

                          <div class="bio-row">
                            <p><span>About </span>: <?php echo $about; ?></p>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    </section>
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>
                  
                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
                        <h1> Profile Info</h1>
                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
                          
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Fullname</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="c-name" name="full_name" value="<?php echo $full_name; ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="c-name" name="username" value="<?php echo $username; ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Phone</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="c-name" name="phone" value="<?php echo $phone; ?>">
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">About</label>
                            <div class="col-lg-6">
                              <textarea rows="5" cols="30" class="form-control" id="c-name" name="about"><?php echo $about; ?></textarea>
                            </div>
                          </div>
                          
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="col-lg-2 control-label">Password</label>
                            <div class="col-lg-6">
                              <input type="text" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Profile Photo</label>
                            <div class="col-lg-6">
                              <input type="file" accept="image/*" name="image" id="inpfile" value="<?php echo $image; ?>" class="form-control" style="display: none;"><br>
                              <img id="image-preview" style="border-radius:50%; width:30%;" class="width=500" src="../assets/img/<?php echo $image; ?>" alt=""><br><br>
                              <button type="button" id="profile_upload-btn" class="btn btn-success">Choose profile <i class="fa fa-image"></i></button>
                            </div>
                          </div>

                          <!-- <div class="form-group">
                            <div class="col-lg-6">
                              <a href="#" class="activity-img"><img class="thumbnail" alt=""  ></a>
                              <input type="file" class="form-control" id="photo" name="image"  
                            </div>
                          </div> -->

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary" name="update_profile">Save</button>
                              <button type="button" class="btn btn-danger">Cancel</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>

        <!-- page end-->
      </section>
    </section>

<?php include "includes/admin_footer.php" ?>