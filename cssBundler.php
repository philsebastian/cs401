<?php
	$newLineStr = "\n";
	$indentStr = "\t\t";

	$cssDir = 'IndustryStyles';
	$files = scandir($cssDir);
		
	foreach ($files as $file) {
		if (strcmp($file, '.') != 0 && strcmp($file, '..') != 0) {
			echo $indentStr . '<link rel="stylesheet" href="' . $cssDir . '/' . $file . '">' . $newLineStr;
		}
	}
	
	$cssDir = 'CustomStyles';
	$files = scandir($cssDir);
		
	foreach ($files as $file) {
		if (strcmp($file, '.') != 0 && strcmp($file, '..') != 0) {
			echo $indentStr . '<link rel="stylesheet" href="' . $cssDir . '/' . $file . '">' . $newLineStr;
		}
	}
?>