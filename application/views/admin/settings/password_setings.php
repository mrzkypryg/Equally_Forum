
<div class="page-title row no-margin">
	<h4>Password Settings</h4>
	<ul>
		<li><a>Home <i class="fas fa-angle-double-right"></i></a></li>
		<li><a>Settings <i class="fas fa-angle-double-right"></i></a></li>
		<li>Password Settings</li>
	</ul>
</div> 


<div id="vue-setting" class="row body-content">

	<div class="col-lg-6 float-auto">
		<div class="panel-card">
			<div class="panel-header">Admin Password Settings</div>
			<div class="form-body">
				<p class="err bgghn-err" id="err">Old Password not Match, Please try again!</p>
				<div class="form-group  row">
					<div class="col-sm-5">
						<label for="">Old Password</label>
						<span class="form-indicat">:</span>
					</div>
					<div class="col-sm-7">
						<input id="soldpswd" placeholder="Your Old Password..." type="password" class="form-control form-control-sm" name="" value="">
						<div class="smart-valid" id="soldpswd-err"></div>
					</div>
				</div>
				<div class="form-group  row">
					<div class="col-sm-5">
						<label for="">New Password</label>
						<span class="form-indicat">:</span>
					</div>
					<div class="col-sm-7">
						<input id="snewpswd" placeholder="Your New Password..." type="password" class="form-control form-control-sm" name="" value="">
						<div class="smart-valid" id="snewpswd-err"></div>
					</div>
				</div>
				<div class="form-group  row">
					<div class="col-sm-5">
						<label for="">Confirm Password</label>
						<span class="form-indicat">:</span>
					</div>
					<div class="col-sm-7">
					<input id="sconp" placeholder="Confirm Your New Password..." type="password" class="form-control form-control-sm" name="" value="">
					<div class="smart-valid" id="sconp-err"></div>
					</div>
				</div>
				<div class="form-group no-margin-bottom row">
					<div class="col-sm-5">

					</div>
					<div class="col-sm-7">
						<button v-on:click="updatePassword()" class="btn btn-primary btn-sm">Change Password</button>
					</div>
				</div>
			</div>
		</div>
	</div>

</div><!-- Password Settings  End -->
