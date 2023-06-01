<!doctype html>
<html lang="en" translate="yes">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Empowering Minds, Inspiring Action">
	<meta name="author" content="Equally's Team">
	<title>Equally</title>
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.png">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css" />
</head>	<?php if (!empty($txt)) {
		echo $txt;
	} ?>

<body>
	<!--HEADER-->
	<header id="navbar-head">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 d-navmenu">
					<a href="<?php echo base_url() ?>">
						<img src="<?php echo base_url() ?>assets/images/logo.png?<?php echo date("Ymd"); ?>" style="max-width:160px" alt="Equality Forum">
					</a>
					<a data-toggle="collapse" data-target="#search" href="#search">
						<i class="fas d-md-none fa-search"></i>
					</a>
					<a data-toggle="collapse" data-target="#login" href="#login">
						<i class="fas d-md-none fa-ellipsis-v"></i>
					</a>
				</div>
				<div id="search" class="col-lg-5 col-md-4  sarch-box d-md-flex justify-content-center">
					<input v-on:keyup="topicSearch()" id="keyTopic" onblur="hide_search()" type="text" class="form-control" placeholder="Search discussion topics...">
					<i class="fas fa-search"></i>
					<div class="search-box">
						<ul>
							<li v-for="eq in result">
								<a v-bind:href="r.url">
									<h6>{{eq.title}}</h6>
									<p>{{eq.description}}</p>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<div id="login" class="col-lg-4 col-md-5 d-none d-md-block center login-btns">
					<?php if (empty($this->single)) { ?>
						<button onclick="show_login()" type="button" class="btn btn-sm btn-info" id="btnLoginUser"><i class="fas fa-sign-in-alt"></i> Login</button>
					<?php } else { ?>
								<ul>
									<li>
										<button class="btn btn-sm btn-info" type="button" id="btnUsername"> Hello!  <i class="fas fa-user"></i> <?php echo $this->single->name; ?></button>
										<a href="<?php echo base_url() ?>account/log_out">
											<button class="btn btn-sm btn-info" type="button" id="btnLogout"><i class="fas fa-exit"></i> Logout</button>
										</a>
									</li>
									</ul>
								</div>
					<?php	} ?>
				</div>
			</div>
		</div>
	</header> <!------- Header Ends Here ------->