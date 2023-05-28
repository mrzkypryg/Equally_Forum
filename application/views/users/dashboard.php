<div class="body-content">
  	  <div class="container">
  	  	<div class="row min-progg">
  	  		 <div class="col-md-3 no-padding profile-cover">

  	  			<?php $this->load->view('users/section/users_menu'); ?>

  	  		</div>
  	  		<div id="user-vue" class="col-md-9 fpd">
  				<div class="info-card-row row  no-margin">
  					<div class="col-sm-4">
  						<div class="info-card-single d-flex">
  							<div class="ico-cover w-100">
  								<i class="far fa-comments"></i>
  								<p>Total Posts</p>
  							</div>
  							<div class="count">
  								<b>{{post}}</b>
  							</div>
  						</div>
  					</div>
  					<div class="col-sm-4">
  						<div class="info-card-single d-flex">
  							<div class="ico-cover w-100">
  								<i class="fas fa-retweet"></i>
  								<p> Replies</p>
  							</div>
  							<div class="count">
  								<b>{{replay}}</b>
  							</div>
  						</div>
  					</div>
  					<div class="col-sm-4">
  						<div class="info-card-single d-flex">
  							<div class="ico-cover w-100">
  								<i class="fas fa-heart "></i>
  								<p>Total Likes</p>
  							</div>
  							<div class="count">
  								<b>{{like}}</b>
  							</div>
  						</div>
  					</div>
  				</div>
 	  			<div class="row no-margin mypost-cover">
 	  				<h6 class="cd-titl"> My Latest Posts</h6>
             		<?php $this->load->view('users/section/users_posts'); ?>
 	  			</div>
 	  			<div class="row no-margin mypost-cover">
 	  				<h6 class="cd-titl">My Latest Reply</h6>
          			<?php $this->load->view('users/section/users_reply'); ?>
 	  			</div>
  	  		</div>
  	  	</div>
  	  </div>
  </div>
