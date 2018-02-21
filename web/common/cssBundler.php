<?php
	$newLineStr = "\n";
	$indentStr = "\t\t";

	$cssDir = 'Libraries/IndustryStyles';
	$files = scandir($_SERVER['DOCUMENT_ROOT'].'/cs401/web/'.$cssDir);
		
	foreach ($files as $file) {

		if (strcmp($file, '.') != 0 && strcmp($file, '..') != 0) {
			echo $indentStr . '<link rel="stylesheet" href="/cs401/web/' . $cssDir . '/' . $file . '">' . $newLineStr;
		}
	}
	
	$cssDir = 'Libraries/CustomStyles';
	$files = scandir($_SERVER['DOCUMENT_ROOT'].'/cs401/web/'.$cssDir);
		
	foreach ($files as $file) {
		if (strcmp($file, '.') != 0 && strcmp($file, '..') != 0) {
			echo $indentStr . '<link rel="stylesheet" href="/cs401/web/' . $cssDir . '/' . $file . '">' . $newLineStr;
		}
	}