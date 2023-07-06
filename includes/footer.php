<?php 
  $query = "SELECT * FROM users";
  $select_user = mysqli_query($con, $query);
  
  while($row = mysqli_fetch_assoc($select_user)) {
    $about = $row['about'];
    $phone = $row['phone'];
    $email = $row['email'];

  }

?>


<!-- ======= Footer ======= -->
<section class="section-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-4" data-aos="zoom-in" data-aos-duration="900">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">EstateAgency</h3>
            </div>
            <div class="w-body-a">
              <p class="w-text-a color-text-a">
                <?php echo $about ?>
              </p>
            </div>
            <div class="w-footer-a">
              <ul class="list-unstyled">
                <li class="color-a">
                  <span class="color-text-a">Phone :</span> <?php echo $phone ?>

                </li>
                <li class="color-a">
                  <span class="color-text-a">Email :</span> <?php echo $email ?>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3" data-aos="zoom-in" data-aos-duration="900">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">The Company</h3>
            </div>
            <div class="w-body-a">
              <div class="w-body-a">
                <ul class="list-unstyled">
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Site Map</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Legal</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Agent Admin</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Careers</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Affiliate</a>
                  </li>
                  <li class="item-list-a">
                    <i class="bi bi-chevron-right"></i> <a href="#">Privacy Policy</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-4 section-md-t3" data-aos="zoom-in" data-aos-duration="900">
          <div class="widget-a">
            <div class="w-header-a">
              <h3 class="w-title-a text-brand">International sites</h3>
            </div>
            <div class="w-body-a">
              <ul class="list-unstyled">
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Venezuela</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">China</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Hong Kong</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Argentina</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Singapore</a>
                </li>
                <li class="item-list-a">
                  <i class="bi bi-chevron-right"></i> <a href="#">Philippines</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="nav-footer">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="index.php">Home</a>
              </li>
              <li class="list-inline-item">
                <a href="about.php">About</a>
              </li>
              <li class="list-inline-item">
                <a href="property-grid.php">Property</a>
              </li>
              <li class="list-inline-item">
                <a href="review.php">Review</a>
              </li>
              <li class="list-inline-item">
                <a href="contact.php">Contact</a>
              </li>
            </ul>
          </nav>
          <div class="socials-a">
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-twitter" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="bi bi-linkedin" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="copyright-footer">
            <p class="copyright color-text-a">
              &copy; Copyright
              <span class="color-a">EstateAgency</span> All Rights Reserved.
            </p>
          </div>
          <div class="credits">
            Designed by <a href="bit.ly/Chiemena">Onyitechs Corp.</a>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- End  Footer -->


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
  <!-- Vendor JS Files -->
  <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="./assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="./assets/js/main.js"></script>

</body>

</html>