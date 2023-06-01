<div class="body-content">
	<div class="container">
		<div class="page-title no-margin row">
			<h2>Add New Discussion Topic </h2>
		</div>
		<div class="row">
			<div class="col-lg-9 app-post-cont col-md-12" >
				<form method="post" action="<?php echo base_url() ?>forum/add_topic">
					<div class="row no-margin form-row">
						<div class="col-sm-3">
							<label for="">Topic</label><span class="rit-coln">:</span>
						</div>
						<div class="col-sm-9">
							<input name="title" id="atitle" type="text" placeholder="Your discussion topic...." class="form-control form-control-sm" require>
						</div>
						<div class="col-sm-3">
							<label for="">Description</label><span class="rit-coln">:</span>
						</div>
						<div class="col-sm-9">
							<textarea name="description" id="post_desc" type="text" placeholder="Discussion description...." class="form-control form-control-sm" require></textarea>
						</div>
					</div>
					<center><button class="btn bs-btn btn-sm btn-info">Add Post</button></center>
				</form>
			</div>
		</div>
	</div>
</div>
