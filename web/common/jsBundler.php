<?php
	$newLineStr = "\n";
	$indentStr = "\t\t";
	$jsDir = 'Libraries/IndustryScripts';
	$files = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$jsDir);
	
	echo $newLineStr . $indentStr . '<script type="text/javascript" src="/Libraries/IndustryScripts/jquery-3.1.1.js"></script>';
	
	foreach ($files as $file) {
		if (strcmp($file, '.') != 0 && strcmp($file, '..') != 0 && strcmp($file, 'jquery-3.1.1.js') != 0) {
			echo $newLineStr;
			echo $indentStr . '<script type="text/javascript" src="/' . $jsDir . '/' . $file . '"></script>';
		}
	}
		
	echo $newLineStr;
		
	$jsDir = 'Libraries/CustomScripts';
	$files = scandir($_SERVER['DOCUMENT_ROOT'].'/'.$jsDir);
		
	foreach ($files as $file) {
		if (strcmp($file, '.') != 0 && strcmp($file, '..') != 0 && strcmp($file, 'jquery-3.1.1.js') != 0) {
			echo $newLineStr;
			echo $indentStr . '<script type="text/javascript" src="/' . $jsDir . '/' . $file . '"></script>';
		}
	}