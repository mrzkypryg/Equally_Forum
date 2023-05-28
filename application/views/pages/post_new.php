<div class="body-content">
	<div class="container">
		<div class="page-title no-margin row">
			<h2>Add New Post </h2>
			<p>Home <i class="fas fa-angle-double-right"></i> Add New Post </p>
		</div>
		<div class="row">
			<div class="col-lg-9 app-post-cont col-md-12">
				<form onsubmit="return post_validate()" method="post" action="<?php echo base_url() ?>posts/add_posts">
					<div class="row no-margin form-row">
						<div class="col-sm-3">
							<label for="">Enter Title</label><span class="rit-coln">:</span>
						</div>
						<div class="col-sm-9">
							<input name="title" id="atitle" type="text" placeholder="Enter Title" class="form-control form-control-sm">
							<div class="smart-valid" id="atitle-err"></div>
						</div>
					</div>
					<div class="row no-margin form-row">
						<div class="col-sm-3">
							<label for="">Select Category</label><span class="rit-coln">:</span>
						</div>
						<div class="col-sm-9">
							<select id="acat" class="form-control form-control-sm" name="cat_ref">
								<option name="user_ref" value="">Select Category</option>
								<?php if(!empty($category)): foreach($category as $c): ?>
								<option value="<?php echo $c->id ?>">
									<?php echo $c->name; ?>
								</option>
								<?php endforeach; endif; ?>
							</select>
							<div class="smart-valid" id="acat-err"></div>
						</div>
					</div>
					<!--SUMMERNOTE-->				
					<div class="row add-post-noot no-margin form-row">
						<div class="col-sm-12 no-padding">
							<textarea class="form-control form-control-sm" name="description" id="summernote"></textarea>
						</div>
					</div>
					<div class="row no-margin form-row">
						<div class="col-sm-12 right">
							<p id="summernote-err" class="text-danger ">Yout post text must be at least 60 characters;</p>
							<button class="btn bs-btn btn-sm btn-info">Add Post</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
