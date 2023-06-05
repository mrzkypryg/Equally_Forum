    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #6742c3">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
          <!-- Section: Links -->
          <section class="">
            <!--Grid row-->
            <div class="row">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                  <h6 class="text-uppercase mb-4 font-weight-bold">
                      <img src="<?php echo base_url() ?>assets/images/logo.png?<?php echo date("Ymd"); ?>" style="width:180px" alt="Equality Forum">
                  </h6>
                  <p>
                      The Gender Equality Forum. Empowering Minds, Inspiring Action
                  </p>
                </div>
                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none" />
                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                  <h6 class="text-uppercase mb-4 font-weight-bold">Explore</h6>
                  <p>
                      <a class="text-white" href="#">Home</a>
                  </p>
                  <p>
                      <a class="text-white" href="#mainForum">Our Discussion Forum</a>
                  </p>
                  <p>
                      <a class="text-white" href="#equally-team">Our Team</a>
                  </p>
                </div>
                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none" />
                <!-- Grid column -->
                <hr class="w-100 clearfix d-md-none" />
                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                  <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                  <p><i class="fas fa-home mr-3"></i> Bandung, Jawa Barat</p>
                  <p><i class="fas fa-envelope mr-3"></i> equally@dicoding.org</p>
                  <p><i class="fas fa-phone mr-3"></i> 0818-485-850</p>
                </div>
                <!-- Grid column -->
                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                  <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>
                  <!-- Github 1 -->
                  <a class="btn btn-primary btn-floating m-1" style="background-color: #1c0ebd" href="https://github.com/mrzkypryg" role="button"><i class="fab fa-github"></i></a>
                  <!-- Github 2 -->
                  <a class="btn btn-primary btn-floating m-1" style="background-color: #1c0ebd" href="https://github.com/sittisafiatun" role="button"><i class="fab fa-github"></i></a>
                  <!-- Github 3 -->
                  <a class="btn btn-primary btn-floating m-1" style="background-color: #1c0ebd" href="https://github.com/vegaputraa" role="button"><i class="fab fa-github"></i></a>
                  <!-- Github 4 -->
                  <a class="btn btn-primary btn-floating m-1" style="background-color: #1c0ebd" href="https://github.com/Kgustipartsani" role="button"><i class="fab fa-github"></i></a>
                </div>
            </div>
            <!--Grid row-->
          </section>
          <!-- Section: Links -->
      </div>
      <!-- Grid container -->
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © <script>
            document.write(new Date().getFullYear())
          </script> Copyright:
          <a class="text-white" href="#">Equally</a>
      </div>
      <!-- Copyright -->
    </footer>
    <div id="equally_login">
      <!-- Login -->
      <div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-login_signup" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Equally User Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="hid" id="err_message">Email or Password Wrong! Please Check again</p>
                  <div class="row no-margin form-row" style="justify-content:center; padding:20px">
                      <img src="<?php echo base_url() ?>assets/images/logo.png?<?php echo date("Ymd"); ?>" style="max-width:180px" alt="Equality Forum">
                  </div>
                  <div class="row no-margin form-row">
                      <div class="col-sm-4">
                        <label>Email Address</label><span class="rit-coln">:</span>
                      </div>
                      <div class="col-sm-8">
                        <input v-on:keyup.enter="login_check" id="email_login" type="email" placeholder="Your email address..." class="form-control form-control-sm" required>
                      </div>
                  </div>
                  <div class="row no-margin form-row">
                      <div class="col-sm-4">
                        <label>Password</label><span class="rit-coln">:</span>
                      </div>
                      <div class="col-sm-8">
                        <input v-on:keyup.enter="login_check" id="email_pass" type="password" placeholder="Your password..." class="form-control form-control-sm" required>
                      </div>
                  </div>
                  <div class="row no-margin form-row">
                      <div class="col-sm-12">
                        <button v-on:click="login_check" class="btn btn-sm btn-info" id="btnLogin"> Login</button>
                      </div>
                  </div>
                  <div class="row no-margin form-row" style="text-align: center; margin-bottom: 4px; margin-top:-6px">
                      <div class="col-sm-12">
                        <p class="sign-up-text">Don’t have an account?</p>
                      </div>
                  </div>
                  <div class="row no-margin form-row" style="margin-bottom: 5px">
                      <div class="col-sm-12">
                        <button onclick="account_signup()" class="btn w-100 btn-danger btn-sm"> Sign up</button>
                      </div>
                  </div>
                </div>
            </div>
          </div>
      </div>
      <!-- Login End -->
      <!-- Sign Up -->
      <div class="modal fade" id="modal_signup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-login_signup signup-modal" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Equally Sign Up</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="post"  action="<?php echo base_url() ?>account/sign_up">
                      <div class="row no-margin form-row">
                        <div class="col-sm-4">
                            <label >Full Name</label><span class="rit-coln">:</span>
                        </div>
                        <div class="col-sm-8">
                            <input id="suname" type="text" name="name" placeholder="Your full name..." class="form-control form-control-sm" required>
                        </div>
                      </div>
                      <div class="row no-margin form-row">
                        <div class="col-sm-4">
                            <label>Username</label><span class="rit-coln">:</span>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" name="nickname" placeholder="Your username..." class="form-control form-control-sm" required>
                        </div>
                      </div>
                      <div class="row no-margin form-row">
                        <div class="col-sm-4">
                            <label>Email Address</label><span class="rit-coln">:</span>
                        </div>
                        <div class="col-sm-8">
                            <input id ="email_signup" type="email" name="email_address" placeholder="Your email address..." class="form-control form-control-sm" required>
                        </div>
                      </div>
                      <div class="row no-margin form-row">
                        <div class="col-sm-4">
                            <label>Password</label><span class="rit-coln">:</span>
                        </div>
                        <div class="col-sm-8">
                            <input id="pswd" name="password" type="password" placeholder="Your password..." class="form-control form-control-sm" required>
                        </div>
                      </div>
                      <div class="row no-margin form-row">
                        <div class="col-sm-4">
                            <label>Confirmation</label><span class="rit-coln">:</span>
                        </div>
                        <div class="col-sm-8">
                            <input id="confirm_pswd" type="password"  placeholder="Rewrite your password..." class="form-control form-control-sm" required>
                        </div>
                      </div>
                      <div class="row no-margin form-row">
                        <div class="col-sm-12">
                            <a onclick="show_login()" class="fp" href="#">Already have an account?</a>
                        </div>
                      </div>
                      <div class="row no-margin form-row">
                        <div class="col-sm-12">
                            <button onclick="check_sign_up()" class="btn btn-sm btn-info" style="width:100%;padding:15px;margin-bottom:-25px"> Sign Up</button>
                        </div>
                      </div>
                  </form>
                </div>
            </div>
          </div>
      </div>
      <!-- Sign Up Ends -->
    </div>
    <input type="hidden" id="base_url" value="<?php echo base_url() ?>">
  </body>
  <script id="dsq-count-scr" src="//equally.disqus.com/count.js" async></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/script.js"></script>
  <script src="<?php echo base_url() ?>assets/js/login_func.js"></script>
  <?php
    if (!empty($this->vue)) {
      foreach ($this->vue as $vue) {  ?>
  <script src="<?php echo base_url() ?>assets/<?php echo $vue;  ?>"></script>
  <?php }
    } ?>
</html>
