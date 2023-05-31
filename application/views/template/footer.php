    <div id="remove" class="modal">
      <div style="width: 350px;margin-top: 120px;" class="modal-dialog" role="document">
          <div class="modal-content remove-model">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure Want to Remove ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer no-padding">
                <div class="row w-100 no-margin">
                  <div id="yes" data-dismiss="modal" class="col-sm-6 vbn vvg">
                      <i class="fa  fa-check"></i> &nbsp; Yes
                  </div>
                  <div data-dismiss="modal" class="col-sm-6 vbn">
                      <i class="fa  fa-times"></i> &nbsp; No
                  </div>
                </div>
            </div>
          </div>
      </div>
    </div>
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
                      <img src="<?php echo base_url() ?>upload/admin/brand.png?<?php echo date("Ymd"); ?>" style="width:180px" alt="Equality Forum">
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
                      <a class="text-white" href="#recent-post">Recent Post</a>
                  </p>
                  <p>
                      <a class="text-white" href="#trending-post">Trending Post</a>
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
    <div id="login-vue">
      <!-- Login -->
      <div class="modal fade" id="loginmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog login-model" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">User Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="hid" id="login-err">User Name or Password Wrong</p>
                  <div class="row no-margin form-row" style="justify-content:center; padding:20px">
                      <img src="<?php echo base_url() ?>upload/admin/brand.png?<?php echo date("Ymd"); ?>" style="max-width:180px" alt="Equality Forum">
                  </div>
                  <div class="row no-margin form-row">
                      <div class="col-sm-4">
                        <label for="">Email Address</label><span class="rit-coln">:</span>
                      </div>
                      <div class="col-sm-8">
                        <input v-on:keyup.enter="userLogin" id="loemail" type="email" placeholder="Enter Email Address" class="form-control form-control-sm">
                        <div class="smart-valid" id="loemail-err"></div>
                      </div>
                  </div>
                  <div class="row no-margin form-row">
                      <div class="col-sm-4">
                        <label for="">Password</label><span class="rit-coln">:</span>
                      </div>
                      <div class="col-sm-8">
                        <input v-on:keyup.enter="userLogin" id="lopswd" type="password" placeholder="Enter Password" class="form-control form-control-sm">
                        <div class="smart-valid" id="lopswd-err"></div>
                      </div>
                  </div>
                  <div class="row no-margin form-row">
                      <div class="col-sm-12">
                        <button v-on:click="userLogin" class="btn btn-sm btn-info" id="btnLogin"> Login</button>
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
      <div class="modal fade" id="signupmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog login-model singup-model" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Sign Up</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form onsubmit="return signup_submit()" method="post"  action="<?php echo base_url() ?>users/add_users">
                      <div class="row no-margin form-row">
                        <div class="col-sm-4">
                            <label for="">Full Name</label><span class="rit-coln">:</span>
                        </div>
                        <div class="col-sm-8">
                            <input id="suname" type="text" name="name" placeholder="Enter Full Name" class="form-control form-control-sm">
                            <div class="smart-valid" id="suname-err"></div>
                        </div>
                      </div>
                      <div class="row no-margin form-row">
                        <div class="col-sm-4">
                            <label for="">Username</label><span class="rit-coln">:</span>
                        </div>
                        <div class="col-sm-8">
                            <input id="sudesig" type="text" name="nickname" placeholder="Enter Username" class="form-control form-control-sm">
                            <div class="smart-valid" id="sudesig-err"></div>
                        </div>
                      </div>
                      <div class="row no-margin form-row">
                        <div class="col-sm-4">
                            <label for="">Email Address</label><span class="rit-coln">:</span>
                        </div>
                        <div class="col-sm-8">
                            <input v-on:blur="unic_email()" id="suemail" type="email" name="email_address" placeholder="Enter Email Address" class="form-control form-control-sm">
                            <div class="smart-valid" id="suemail-err"></div>
                        </div>
                      </div>
                      <div class="row no-margin form-row">
                        <div class="col-sm-4">
                            <label for="">Password</label><span class="rit-coln">:</span>
                        </div>
                        <div class="col-sm-8">
                            <input id="supswd" name="password" type="password" placeholder="Enter Password" class="form-control form-control-sm" required>
                            <div class="smart-valid" id="supswd-err"></div>
                        </div>
                      </div>
                      <div class="row no-margin form-row">
                        <div class="col-sm-4">
                            <label for="">Confirmation</label><span class="rit-coln">:</span>
                        </div>
                        <div class="col-sm-8">
                            <input id="suconfirm" type="password"  placeholder="Password Confirmation" class="form-control form-control-sm" required>
                            <div class="smart-valid" id="suconfirm-err"></div>
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
  <script src="<?php echo base_url() ?>assets/js/jquery-3.2.1.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/popper.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/axios.min.js"></script>
  <script src="<?php echo base_url() ?>assets/js/vue.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/summer-note/summernote-lite.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/notify/notify.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/time-ago/timeago.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/crope-box/jquery.cropbox js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/crope-box/jquery.form.js"></script>
  <script src="<?php echo base_url() ?>assets/js/script.js"></script>
  <script src="<?php echo base_url() ?>assets/vue/update_vue.js"></script>
  <?php
    if (!empty($this->vue)) {
      foreach ($this->vue as $vue) {  ?>
  <script src="<?php echo base_url() ?>assets/<?php echo $vue;  ?>"></script>
  <?php }
    } ?>
</html>
