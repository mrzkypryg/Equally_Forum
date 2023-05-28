	 <div class="body-content">
  	  <div class="container">
  	  	<div class="row">
  	  		<div class="col-lg-8 col-md-12">

            <?php $this->load->view('pages/section/user_posts'); ?>

  	  		<div class=" view-box d-flex justify-content-center">
  	  				<nav aria-label="...">
							<?php echo $this->pagination->create_links(); ?>
					</nav>
  	  			</div>
  	  		</div>
  	  		  <div class="col-lg-4 col-md-12">

              <?php $this->load->view('pages/section/post_category'); ?>
			
              <?php $this->load->view('pages/section/forum_statistics'); ?>

              <?php $this->load->view('pages/section/trending_posts'); ?>

  	  		</div>
  	  	</div>
  	  </div>
  </div>
