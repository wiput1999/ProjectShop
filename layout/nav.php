<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Basement Shop</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?
				if ( isset($_SESSION['userid']) ){
			?>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Signed in as <?=$_SESSION['name']?> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="edit_profile.php">Edit Profile</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="logout.php">Sign Out</a></li>
						</ul>
					</li>
				</ul>
			<? } ?>
		</div>
	</div>
</nav>