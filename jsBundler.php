<?php
	$newLineStr = "\n";
	$indentStr = "\t\t";

	$jsDir = 'ScriptLibraries';
	$files = scandir($jsDir);
	
	echo $newLineStr . $indentStr . '<script type="text/javascript" src="ScriptLibraries/jquery-3.1.1.js"></script>';
	
	foreach ($files as $file) {
		if (strcmp($file, '.') != 0 && strcmp($file, '..') != 0 && strcmp($file, 'jquery-3.1.1.js') != 0) {
			echo $newLineStr;
			echo $indentStr . '<script type="text/javascript" src="' . $jsDir . '/' . $file . '"></script>';
		}
	}
		
	echo $newLineStr;
		
	$jsDir = 'CustomScripts';
	$files = scandir($jsDir);
		
	foreach ($files as $file) {
		if (strcmp($file, '.') != 0 && strcmp($file, '..') != 0 && strcmp($file, 'jquery-3.1.1.js') != 0) {
			echo $newLineStr;
			echo $indentStr . '<script type="text/javascript" src="' . $jsDir . '/' . $file . '"></script>';
		}
	}
	
?>