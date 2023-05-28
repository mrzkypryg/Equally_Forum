<!doctype html>
<html lang="en" translate="yes">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Empowering Minds, Inspiring Action">
	<meta name="author" content="Equally's Team">
	<title> <?php if (!empty($this->title)) {
				echo $this->title;
			} ?> </title>
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/themify-icons.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/fontawsom-all.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summer-note/summernote-lite.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/crope-box/jquery.cropbox.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" />
	<?php if (!empty($txt)) {
		echo $txt;
	} ?>
</head>

<body>
	<!--HEADER-->
	<header id="nav-head">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 d-lokj">
					<a href="<?php echo base_url() ?>">
						<img src="<?php echo base_url() ?>upload/admin/brand.png?<?php echo date("Ymd"); ?>" style="max-width:160px" alt="Equality Forum">
					</a>
					<a data-toggle="collapse" data-target="#search" href="#search">
						<i class="fas  d-md-none fa-search"></i>
					</a>
					<a data-toggle="collapse" data-target="#login" href="#login">
						<i class="fas d-md-none fa-ellipsis-v"></i>
					</a>
				</div>
				<div id="search" class="col-lg-5 col-md-4  sarch-box d-md-flex justify-content-center">
					<input v-on:keyup="startSearch()" id="sk" onblur="hide_search()" type="text" class="form-control" placeholder="Enter keywords">
					<i class="fas fa-search"></i>
					<div class="search-box">
						<ul>
							<li v-for="r in result">
								<a v-bind:href="r.url">
									<h6>{{r.title}}</h6>
									<p>{{r.description}}</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div id="login" class="col-lg-4 col-md-5 d-none d-md-block center login-btns">
					<?php if (empty($this->single)) { ?>
						<button onclick="show_login()" type="button" class="btn btn-sm btn-info"><i class="fas fa-sign-in-alt"></i> Login</button>
						<button onclick="show_login()" type="button" class="btn btn-sm btn-light"><i class=" far fa-edit"></i> Add New Post</button>
					<?php } else { ?>
						<ul id="vu-notify" class="notify-list">
							<li>
								<div class="dropdown forum-dd">
									<a class=" dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<img src="<?php echo base_url() ?>upload/users/<?php echo $this->single->image; ?>" alt=""> <?php echo $this->single->name; ?>
									</a>
									<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
										<a href="<?php echo base_url() ?>pages/new_post">
											<button class="dropdown-item" type="button"><i class="far fa-edit"></i> New Post</button>
										</a>
										<a href="<?php echo base_url() ?>users/dashboard">
											<button class="dropdown-item" type="button"><i class="fas fa-user"></i> View Profile</button>
										</a>
										<a href="<?php echo base_url() ?>users/settings">
											<button class="dropdown-item" type="button"><i class="fas fa-cogs"></i> Settings</button>
										</a>
										<a href="<?php echo base_url() ?>users/log_out">
											<button class="dropdown-item" type="button"><i class="fas fa-lock"></i> Logout</button>
										</a>
									</div>
								</div>
							</li>
							<li class="notify">
								<a href="#" id="dropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="far fa-bell"></i>
									<span class="badge badge-danger badge-pill">{{not.length}}</span>
								</a>
								<div class="dropdown-menu new-messages" aria-labelledby="dropdownMenuLink-2">
									<ul class="list-group">
										<li class="list-group-item list-title d-flex justify-content-between align-items-center">
											You have {{not.length}} Notifications
											<span class="badge badge-primary badge-pill">{{not.length}}</span>
										</li>
										<li v-for="(n, i) in not" class="list-group-item d-flex notification-item justify-content-between align-items-center">
											<div class="media">
												<span v-html="n.icon"></span>
												<div class="media-body">
													<p class="msg-info">{{n.text}}</p>
												</div>
											</div>
										</li>
										<li v-on:click="clear_all_notiy()" class="list-group-item cp d-flex notification-item justify-content-center align-items-center"> Clear Notification</li>
									</ul>
								</div>
							</li>
						</ul>
					<?php	} ?>
				</div>
			</div>
		</div>
	</header> <!------- Header Ends Here ------->