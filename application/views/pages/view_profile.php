 <div class="body-content">
  	  <div class="container">
  	  	<div class="row">
			<div class="col-lg-4 col-md-12">
  	  			<div class="cat-box forum-status">
					<div class="profile-roe d-flex justify-content-between">
						<div class="pro-img">
							<img src="<?php echo base_url() ?>upload/users/<?php echo $single['image']; ?>" alt=""> 
						</div>
						<div class="pro-dff w-100">
						<h6><?php echo $single['name']; ?> </h6>
						 <p><?php echo $single['designation'] ?></p>
						</div>
					</div>
					<div class="row fs-ro no-margin">
						<div class="col-6 r-bord scc">
							<i class="far fa-comments"></i>
							<p> Posts</p>
							<b><?php echo $post_count; ?></b>
						</div>
						<div class="col-6 scc">
						<i class="fas fa-retweet"></i>
							<p> Reply</p>
							<b><?php echo $replay_count; ?></b>
						</div>
					</div>
  	  			</div>
  	  			 <?php $this->load->view('pages/section/post_category'); ?>
  	  		</div>
  	  		<div class="col-lg-8 col-md-12">
  	  			 <?php $this->load->view('pages/section/user_posts'); ?>
  	  		</div>
  	  	</div>
  	  </div>
  </div>
