<?php
	$thisPage = 'login';
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/common/";
	require_once($path."buildHeader.php");
?>
	<div class="maindiv">

		<div class="container">
			<h1>LOGIN MAIN PAGE</h1>		
			<div class="contents"></div>
		</div>
	</div>
<?php
	require_once($path."buildFooter.php");
?>