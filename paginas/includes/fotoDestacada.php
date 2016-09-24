<?php

$file = fopen("critiquines.txt", "rb") or exit("Unable to open file!");

$num=mt_rand(1,5);
while(!feof($file))
{
	$datos=fgets($file);
	$leo=split(';',$datos);
	//print_r($leo);
	list($numero, $titulo, $critico, $opinion)=$leo;
	if($numero==$num){
		break;
	}
}
include("selectFotoDestacada.inc.php");

fclose($file);
?>