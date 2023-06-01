  <div class="body-content">
  	  <div class="container">
		<div class="page-title no-margin row">
			<h2 style="text-decoration:underline overline">Edit Topic </h2>
		</div>
			<div class="row" style="margin-bottom:4rem">
  	  			<div class="col-lg-9 app-post-cont col-md-12">
					<form method="post" action="<?php echo base_url() ?>forum/update_topics">
						<div class="row no-margin form-row">
							<div class="col-sm-3">
								<label for="">Topic</label><span class="rit-coln">:</span>
							</div>
							<div class="col-sm-9">
								<input style="padding:15px" value="<?php echo $single->title; ?>" name="title" id="atitle" type="text" placeholder="Enter Title" class="form-control form-control-sm">
							</div>
							<div class="col-sm-3">
							<label for="">Description</label><span class="rit-coln">:</span>
							</div>
							<div class="col-sm-9">
								<input type="hidden" name="post_id" value="<?php echo $single->id; ?>" id="">
								<textarea name="description" id="post_desc" type="text" placeholder="Discussion description...." class="form-control form-control-sm" style="height:9rem;padding:15px" require ><?php echo $single->description; ?></textarea>
							</div>
						</div>
					<center><button class="btn bs-btn btn-sm btn-info">Update</button></center>
					</form>
  	  			</div>
  	  		</div>
  	  </div>
  </div>
