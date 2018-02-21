<html>
	<head>
	<link rel="shortcut icon" type="image/png" href="../cs401/favicon.png"/>
<?php 
	require_once('jsBundler.php');
	require_once('cssBundler.php');
?>	
	</head>	
	
	<body>			
		<!-- Static navbar -->
		<nav class="navbar navbar-inverse bg-inverse navbar-fixed-top min-navbar">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/cs401/"><img src="/cs401/favicon.ico" width="25" height="25" class="d-inline-block greyimg align-top" alt="">Music Lessons</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li id='home' <?php if ($thisPage=="home") { echo ' class="active"'; } ?>><a href="/cs401/">Home</a></li>
						<li id='learn' <?php if ($thisPage=="learn") { echo ' class="active"'; } ?>><a href="/cs401/learn/">Learn</a></li>
						<li id='teach'<?php if ($thisPage=="teach") { echo ' class="active"'; } ?>><a href="/cs401/teach/">Teach</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li id="signup"<?php if ($thisPage=="signup") { echo ' class="active"'; } ?>><a href="/cs401/signup/"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li id="login"<?php if ($thisPage=="login") { echo ' class="active"'; } ?>><a href="/cs401/login/"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>						
					</ul>
				</div><!--/.nav-collapse -->
			</div><!--/.container-fluid -->
		</nav>
	
