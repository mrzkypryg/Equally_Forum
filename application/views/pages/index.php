<!------- Body ------->
      <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-6 align-self-center">
                    <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                      <div class="row">
                        <div class="col-lg-12">
                          <h6>The Gender Equality Forum</h6>
                          <h2>Empowering Minds, Inspiring Action</h2>
                          <p>Through diverse and informative discussions, Equally invites you to actively engage in the ongoing struggle for a just and equitable society for all individuals, regardless of gender.</p>
                        </div>
                        <div class="col-lg-12">
                          <div class="btn_landing">
                            <a href="<?php echo base_url() ?>#mainForum">Explore</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                      <img src="assets/images/Community-group.svg" alt="" style="max-width:450px">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
       <div class="body-content" id="mainForum">
          <div class="forum_title">
            <h1>Discussion Forum</h1>
          </div>
          <div class="container">
            <div class="row">
            <!------- Equally Forum Post ------->
              <div  class="col-lg-8 col-md-12">
                <!--Load Singe Post From View-->
                <?php $this->load->view('pages/section/user_posts'); ?>
                <div class=" view-box d-flex justify-content-center">
                  <nav aria-label="...">
                    <?php echo $this->pagination->create_links(); ?>
                  </nav>
                </div>
              </div>
              <!------- Equally Forum Post End ------->
              <!------- Equally Right Content ------->
              <div  class="col-lg-4 col-md-12">
              <?php $this->load->view('pages/section/post_category'); ?>
              <?php $this->load->view('pages/section/trending_posts'); ?>
              </div>
              <!------- Equally Right Content End------->
            </div>
            <!--Equally Forum Statistics-->
            <?php $this->load->view('pages/section/forum_statistics'); ?>
            <!------- Team Section ------->
            <section id="equally-team">
              <div class="row-team">
                <h1>Equally's Team</h1>
              </div>
              <div class="row-team">
                <!-- TEAM 1-->
                <div class="column-team">
                  <div class="card-team">
                    <div class="img-container">
                      <img src="assets/images/team-rizky.jpg" />
                    </div>
                    <h3>Muhammad Rizky Prayoga</h3>
                    <p>F048XB193</p>
                    <a class="btn btn-primary btn-floating m-1" style="background-color: black;" href="https://github.com/mrzkypryg" role="button"><i class="fab fa-github"></i></a> 
                  </div>
                </div>
                <!-- TEAM 2-->
                <div class="column-team">
                  <div class="card-team">
                    <div class="img-container">
                      <img src="assets/images/team-sitti.jpg" />
                    </div>
                    <h3>Sitti Safiatun Naja Koto</h3>
                    <p>F048YB162</p>
                    <a class="btn btn-primary btn-floating m-1" style="background-color: black;" href="" role="button"><i class="fab fa-github"></i></a> 
                  </div>
                </div>
                <!-- TEAM 3-->
                <div class="column-team">
                  <div class="card-team">
                    <div class="img-container">
                      <img src="assets/images/team-vega.jpg" />
                    </div>
                    <h3>Vega Putra Dwi Agni</h3>
                    <p>F144XB430</p>
                    <a class="btn btn-primary btn-floating m-1" style="background-color: black;" href="https://github.com/vegaputraa" role="button"><i class="fab fa-github"></i></a> 
                  </div>
                </div>
                <!-- TEAM 4-->
                <div class="column-team">
                  <div class="card-team">
                    <div class="img-container">
                      <img src="assets/images/team-kamaludin.jpg" />
                    </div>
                    <h3>Kamaludin Gustipartsani</h3>
                    <p>F144XB490</p>
                    <a class="btn btn-primary btn-floating m-1" style="background-color: black;" href="https://github.com/Kgustipartsani" role="button"><i class="fab fa-github"></i></a> 
                  </div>
                </div>
              </div>
        </section>
        <!------- Team Section End ------->
  	  </div>
  </div><!------- Body Content End ------->
