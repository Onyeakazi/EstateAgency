<section class="section-testimonials section-t8 nav-arrow-a">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="title-wrap d-flex justify-content-between">
              <div class="title-box">
                <h2 class="title-a">Testimonials</h2>
              </div>
            </div>
          </div>
        </div>

        <div id="testimonial-carousel" class="swiper">
          <div class="swiper-wrapper">

            <?php

                $query = "SELECT * FROM review WHERE statue = 'approved' ";
                $review_query = mysqli_query($con, $query);

                while($row = mysqli_fetch_assoc($review_query)) {
                $id = $row['id'];
                $full_name = $row['full_name'];
                $message = $row['message'];
                $image = $row['image'];
                
                ?>

                <div class="carousel-item-a swiper-slide">
                    <div class="testimonials-box">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                          <div class="testimonial-img" data-aos="flip-left" data-aos-duration="500">
                              <img src="./admin/img/<?php echo $image; ?>" alt="" class="img-fluid">
                          </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                          <div class="testimonial-ico" data-aos="zoom-in" data-aos-duration="900">
                              <i class="bi bi-chat-quote-fill"></i>
                          </div>
                        <div class="testimonials-content" data-aos="zoom-in" data-aos-duration="900">
                            <p class="testimonial-text">
                            <?php echo $message; ?>
                            </p>
                        </div>
                        <div class="testimonial-author-box">
                            <img src="./admin/img/<?php echo $image; ?>" alt="" class="testimonial-avatar">
                            <h5 class="testimonial-author"><?php echo $full_name; ?></h5>
                        </div>
                        </div>
                    </div>
                    </div>
                </div><!-- End carousel item -->
                <!-- END OF LOOP -->
            <?php } ?>

          </div>
        </div>
        <div class="testimonial-carousel-pagination carousel-pagination"></div>

      </div>
  </section><!-- End Testimonials Section -->
    
    
    