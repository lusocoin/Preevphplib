<?php
// Preevphplib - Display the averaged Bitcoin price from preev.com. 
// by Armando Machado <armando.machado@outlook.com>
//
// Donate BTC to 12tBivZm35qxHMDwVFJSiasseFRCnCHMUg
// 
// Warning! This is completely unofficial, and may break when Preev 
// changes the website API. 

class Preevphplib {

	// -------------------------
	// Custom Average function
	function average($numbers) {

		$a = $numbers;
		$b = 0;
		$c = 0;
		$d = 0;
		foreach ($a as $b) {
		    $c = $c + $b;
		    $d++;
		}
		return number_format($c/$d,0);
	}

	// --------------------------------------------------------------
	// Get decoded JSON data from Preev.
	function get_data($currency = 'USD', $sources = 'bitfinex+bitstamp+btce+localbitcoins')
	{
		$url = "http://preev.com/pulse/units:btc+$currency/sources:".$sources;		
		$json = file_get_contents($url);
		return json_decode($json, true);
	}



	// ---------------------------------------
	// Given data from Preev, average the rate
	function average_rate($data, $currency)
	{

		$btcarr = array_values($data['btc'][strtolower($currency)]);
		$lastarr = array('0');

		for ($i=0; $i < sizeof($btcarr); $i++)
		{
			$pairData = array_values($btcarr[$i]);
			$lastarr[$i] = $pairData[0];		
		}

		return self::average($lastarr);

	}

	// -----------------------------------------
	// Given data from Preev, average the volume 
	function average_volume($data, $currency)
	{

		$btcarr = array_values($data['btc'][strtolower($currency)]);

		$volumearr = array('0');

		for ($i=0; $i < sizeof($btcarr); $i++)
		{
			$pairData = array_values($btcarr[$i]);
			$volumearr[$i] = $pairData[1];
		}
	
		return self::average($volumearr);

	}

}

?>
