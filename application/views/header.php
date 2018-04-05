<!DOCTYPE html>
<html>
	<head>
		<!-- META -->
		<title>JobFinds | Welcome</title>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="description" content="" />

		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/kickstart.css" media="all" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css" media="all" />

		<!-- Javascript -->
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/kickstart.js"></script>
		<?php echo $map['js']; ?>
	</head>
<body>
	<div id="container" class="grid">
		<header>
			<div class="col_6 column">
				<h1><a href="<?php echo base_url();?>"><strong>Job</strong>Finds</a></h1>
			</div>
			<?php if($this->session->userdata('logged_in')) :?>
			<div class="col_6 column right">
				<form id="add_job_lin">
					<a href="<?php echo base_url(); ?>home/addjob"><button type="button" class="large green"><i class="fa fa-plus"></i> Add Job</button></a>
				</form>
			</div>
		<?php endif;?>

		</header>

		<div class="col_12 column">
			<!-- Menu Horizontal -->
			<ul class="menu">
				<li<?php if($page=='') echo ' class="current"';?>><a href="<?php echo base_url();?>"><i class="fa fa-home"></i> Home</a></li>
				<li<?php if($page=='jobs') echo ' class="current"';?>><a href="<?php echo base_url();?>home/jobs"><i class="fa fa-desktop"></i> Browse Jobs</a></li>
				<?php if(!$this->session->userdata('logged_in')) :?>
				<li<?php if($page=='register') echo ' class="current"';?>><a href="<?php echo base_url();?>home/register"><i class="fa fa-user"></i> Register</a></li>
				<li<?php if($page=='signin') echo ' class="current"';?>><a href="<?php echo base_url();?>home/signin"></i> Login</a></li>
				<?php else:?>
				<li><a><i class="fa fa-user"></i> <?php echo $this->session->userdata('username');?></a>
					<ul>
						<li><a href="<?php echo base_url();?>home/myjobs">Your jobs</a></li>
						<li><a href="<?php echo base_url();?>home/logout">Logout</a></li>
					</ul>
				</li>
				<?php endif;?>
			</ul>
		</div>
