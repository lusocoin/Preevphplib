<?php
// Preevphplib - Display the averaged Bitcoin price from preev.com. 
// by Armando Machado <armando.machado@outlook.com>
//
// Donate BTC to 12tBivZm35qxHMDwVFJSiasseFRCnCHMUg 
//
// Warning! This is completely unofficial, and may break when Preev 
// changes the the website API.

include("Preevphplib.php");

$preev = new Preevphplib();
$currency = 'USD'; // USD, GBP, EUR, ...

$data = $preev->get_data($currency);

echo "Rate ".$preev->average_rate($data, $currency)."<br>";

echo "Volume ".$preev->average_volume($data, $currency)."<br>";

?>
