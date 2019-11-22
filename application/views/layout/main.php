<!DOCTYPE html>
<html lang="en">


<?php $this->load->view('layout/header'); ?>

<body>
<!-- Main navbar -->
<!-- Main navbar -->
<div class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand">SIMPANSE</a>

		<ul class="nav navbar-nav pull-right visible-xs-block">
			<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
			<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
		</ul>
	</div>

	<div class="navbar-collapse collapse" id="navbar-mobile">
		<ul class="nav navbar-nav">
			<li>
				<a class="sidebar-control sidebar-main-toggle hidden-xs" data-popup="tooltip" title="Collapse main"
				   data-placement="bottom" data-container="body">
					<i class="icon-paragraph-justify3"></i>
				</a>
			</li>
		</ul>

		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<li class="dropdown dropdown-user">
					<a class="dropdown-toggle" data-toggle="dropdown">
						<img src="assets/images/placeholder.jpg" alt="">
						<span>Victoria</span>
						<i class="caret"></i>
					</a>

					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
						<li><a href="#"><i class="icon-coins"></i> My balance</a></li>
						<li><a href="#"><span class="badge bg-blue pull-right">58</span> <i
									class="icon-comment-discussion"></i> Messages</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
<!-- /main navbar -->


<div class="page-container">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-main">
			<div class="sidebar-content">
				<?php $this->load->view('layout/sidebar'); ?>

			</div>
		</div>


		<div class="content-wrapper">
			<div class="content">
				<div class="panel panel-flat">
					<div class="panel-heading">
						<h3><?= $title ?></h3>
					</div>
					<div class="panel-body">
						<?php $this->load->view($page); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


</body>

</html>
