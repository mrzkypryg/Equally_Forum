
<div class="page-title row no-margin">
	<h4>Admin Settings</h4>
	<ul>
		<li><a>Home <i class="fas fa-angle-double-right"></i></a></li>
		<li><a>Settings <i class="fas fa-angle-double-right"></i></a></li>
		<li>Admin Settings</li>
	</ul>
</div> 
<div class="row body-content">
	<div class="col-lg-6 float-auto">
		<div class="panel-card">
			<div class="panel-header">Admin Settings</div>
			<div class="form-body">
				<form action="<?php echo base_url() ?>admin/updatedetails" method="post" enctype="multipart/form-data">
					<div class="form-group  row">
						<div class="col-sm-4">
							<label for="">Name</label>
							<span class="form-indicat">:</span>
						</div>
						<div class="col-sm-8">
							<input placeholder="Name"  type="text" class="form-control form-control-sm" name="app-name" value="<?php echo $this->page_detail['name'] ?>">
						</div>
					</div>
					<div class="form-group  row">
						<div class="col-sm-4">
							<label for="">Full Name</label>
							<span class="form-indicat">:</span>
						</div>
						<div class="col-sm-8">
							<input placeholder="Full Name" type="text" class="form-control form-control-sm" name="app-title" value="<?php echo $this->page_detail['nick_admin'] ?>">
						</div>
					</div>
					<div class="form-group  row">
						<div class="col-sm-4">
							<label for="">Email Address</label>
							<span class="form-indicat">:</span>
						</div>
						<div class="col-sm-8">
							<input placeholder="Email Address" type="text" class="form-control form-control-sm" name="email-address" value="<?php echo $this->page_detail['email'] ?>">
						</div>
					</div>
					<div class="form-group  row">
						<div class="col-sm-4">
							<label for="">Mobile Number</label>
							<span class="form-indicat">:</span>
						</div>
						<div class="col-sm-8">
							<input placeholder="Mobile No" type="text" class="form-control form-control-sm" name="mobile-no" value="<?php echo $this->page_detail['mobile_no'] ?>">
						</div>
					</div>
					<div class="form-group no-margin-bottom row">
						<div class="col-sm-4">

						</div>
						<div class="col-sm-8">
							<button class="btn btn-primary btn-sm">Save Changes</button>
						</div>
					</div>
				</form>	
			</div>

		</div>
	</div>

</div><!-- Admin Settings  End -->
