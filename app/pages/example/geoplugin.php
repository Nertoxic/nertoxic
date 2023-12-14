<?php
#
#  _   _ _____ ____ _____ _____  _____ ____ 
# | \ | | ____|  _ \_   _/ _ \ \/ /_ _/ ___|
# |  \| |  _| | |_) || || | | \  / | | |    
# | |\  | |___|  _ < | || |_| /  \ | | |___ 
# |_| \_|_____|_| \_\|_| \___/_/\_\___\____|
#
#

$currPage = 'front_geoplugin';
?>

<?php 
    $geo->locate(); 
    echo "Geolocation results for {$geo->ip}: <br />\n".
	"City: {$geo->city} <br />\n".
	"Region: {$geo->region} <br />\n".
	"Region Code: {$geo->regionCode} <br />\n".
	"Region Name: {$geo->regionName} <br />\n".
	"Country Name: {$geo->countryName} <br />\n".
	"Country Code: {$geo->countryCode} <br />\n".
	"In the EU?: {$geo->inEU} <br />\n".
	"EU VAT Rate: {$geo->euVATrate} <br />\n".
	"Latitude: {$geo->latitude} <br />\n".
	"Longitude: {$geo->longitude} <br />\n".
	"Radius of Accuracy (Miles): {$geo->locationAccuracyRadius} <br />\n".
	"Timezone: {$geo->timezone}  <br />\n".
	"Currency Code: {$geo->currencyCode} <br />\n".
	"Currency Symbol: {$geo->currencySymbol} <br />\n".
	"Exchange Rate: {$geo->currencyConverter} <br />\n";
?>