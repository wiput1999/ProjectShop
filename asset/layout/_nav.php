<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand"><i class="fa fa-apple" aria-hidden="true"></i></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-main-collapse">
			<ul class="nav navbar-nav">
				<li class="active" id="home">
					<a href="index.php">Home</a>
				</li>
			</ul>
			<?php
			if( isset($_SESSION['user_id']) )
			{
				?>
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$_SESSION['firstname']." ".$_SESSION['lastname']?> <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">View Cart</a></li>
							<li><a href="#">View Profile</a></li>
							<li><a href="#">Order History</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
				<?php
			}
			?>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>