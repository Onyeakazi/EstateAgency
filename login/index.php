<?php include "../includes/db.php"; ?>
<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

  <title>Login</title>

  <!-- SweetAlert CDN -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>

  <section class="form-01-main">
    <div class="form-cover">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="form-sub-main">
              <div class="_main_head_as">
                <a href="#">
                  <img src="assets/images/vector.png">
                </a>
              </div>
              <form action="index.php" method="post">
                <div class="form-group">
                  <input id="email" name="email" class="form-control _ge_de_ol" type="text" placeholder="Enter Email" required="" aria-required="true">
                </div>

                <div class="form-group">
                  <input id="password" type="password" class="form-control" name="password" placeholder="********" required="required">
                  <i id="togglePassword" class="fa fa-fw fa-eye toggle-password field-icon"></i>
                </div>

                <div class="form-group">
                  <div class="check_box_main">
                    <a href="#" class="pas-text">Forgot Password</a>
                  </div>
                </div>

                <div class="form-group">
                  <div class="btn_uy">
                    <input class="form-control buttom" type="submit" name="login" value="Log In">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<script>
  var togglePassword = document.getElementById('togglePassword');
  var passwordField = document.getElementById('password');

  togglePassword.addEventListener('click', function() {
    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      togglePassword.classList.remove('fa-eye');
      togglePassword.classList.add('fa-eye-slash');
    } else {
      passwordField.type = 'password';
      togglePassword.classList.remove('fa-eye-slash');
      togglePassword.classList.add('fa-eye');
    }
  });
</script>
</body>
</html>

<?php
  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    $query = "SELECT * FROM users WHERE email = '{$email}' ";
    $select_users_query = mysqli_query($con, $query);

    if (!$select_users_query) {
      die("QUERY" . mysqli_error($con));
    }

    while ($row = mysqli_fetch_array($select_users_query)) {
      $db_user_id = $row['id'];
      $db_user_name = $row['username'];
      $user_password = $row['password'];
      $user_email = $row['email'];
    }

    if ((mysqli_num_rows($select_users_query) == 0)) {
      echo "<script>
              Swal.fire({
                icon: 'error',
                title: 'Login Failed',
                text: 'Incorrect email or password!',
                confirmButtonColor: '#d33',
                confirmButtonText: 'OK'
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location = 'index.php';
                }
              });
            </script>";
    } elseif ($email == $user_email && $password == $user_password) {
      $_SESSION['email'] = $user_email;
      $_SESSION['username'] = $db_user_name;
      $_SESSION['password'] = $db_user_password;
      $_SESSION['image'] = $db_user_image;

      header("Location: ../admin/admin_index.php");
    }
  }
  ?>
