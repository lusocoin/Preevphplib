# Preevphplib

Display the averaged Bitcoin price from preev.com with PHP.

**Warning!** This is completely unofficial, and may break when Preev changes the website API.

## Examples:

### Show the USD price
    $preev = new Preevphplib();
    $currency = 'USD'; 
    $data = $preev->get_data($currency);
    echo "Rate ".$preev->average_rate($data, $currency)."<br>";

### Show the EUR price
    $preev = new Preevphplib();
    $currency = 'EUR'; 
    $data = $preev->get_data($currency);
    echo "Rate ".$preev->average_rate($data, $currency)."<br>";

### Only use "localbitcoins" and "btce" for sources
    $preev = new Preevphplib();
    $currency = 'USD'; 
    $data = $preev->get_data($currency, "localbitcoins+btce");
    echo "Rate ".$preev->average_rate($data, $currency)."<br>";

### Show the GBP volume
    $preev = new Preevphplib();
    $currency = 'GBP'; 
    $data = $preev->get_data($currency);
    echo "Volume ".$preev->average_volume($data, $currency)."<br>";

