<div class="body-content">
	<div class="container">
		<div id="vu-login-new" class="row">
			<div id="fps" class="col-lg-5 app-post-cont forget-pswd col-md-12">
				<div class="forg-title">
					<h6>User login</h6>
				</div>
				<p class="hid" id="login-err">User Name or Password Wrong</p>
				 <div class="row no-margin form-row">
                <div class="col-sm-4">
                    <label for="">Email Address</label><span class="rit-coln">:</span>
                </div>
                <div class="col-sm-8">
                    <input id="loemailnew" type="email" placeholder="Enter Email Address" class="form-control form-control-sm">
                    <div class="smart-valid" id="loemailnew-err"></div>
                </div>
                </div>
                <div class="row no-margin form-row">
                <div class="col-sm-4">
                    <label for="">Password</label><span class="rit-coln">:</span>
                </div>
                <div class="col-sm-8">
                    <input id="lopswdnew" type="password" placeholder="Enter Password" class="form-control form-control-sm">
                    <div class="smart-valid" id="lopswdnew-err"></div>
                </div>
                </div>
				<div class="row no-margin form-row">
					<div class="col-sm-5">
						
					</div>
					<div class="col-sm-7">
						<button v-on:click="userLoginNew()" class="btn btn-sm btn-info">Login</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

