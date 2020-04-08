<?php
	$dip=$ip;
	$string='full address:s:'.$dip;
	$con='RDP_'.$dip.'.rdp';
	
	$orig = file_get_contents("rdp/example.rdp");
	$rdp_file = fopen('rdp/'.$con, "w+b");
	fwrite($rdp_file, $orig. PHP_EOL.$string);
	fclose($rdp_file);

?>
