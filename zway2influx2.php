<?php

require __DIR__ . '/vendor/autoload.php';

use InfluxDB2\Client;
use InfluxDB2\Model\WritePrecision;
use InfluxDB2\Point;

#Influx2 Data - You can generate a Token from the "Tokens Tab" in the UI
$token = 'yourtoken';
$org = 'yourorg';
$bucket = 'yourbucket';
$ip = 'yourip';
$port = 'yourport'; //std 8086

# may replace http with https if your server supports to have more secure communication
$client = new Client([
    "url" => "http://".$ip.":".$port,
    "token" => $token,
]);
$writeApi = $client->createWriteApi();



function getZwayData()
{
	#zway server data
	$zwayDevice = 'yourDevice'; # eg. ZWayVDev_zway_25-0-50-0 - you can find it in the device settings -- Element ID
	$zwayServer = 'yourZwayIP';

	# you can create a user in the zway web frontend Settings -> Management -> user management 
	# if you have rooms setup etc. ensure the user has access to the device
	$username = 'yourZwayUser';  
	$password = 'yourZwayPassword';


	$json_url = 'http://'.$zwayServer.':8083/ZAutomation/api/v1/devices/'.$zwayDevice; 
	// Initializing curl
	$ch = curl_init( $json_url );

	// Configuring curl options
	$options = array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_USERPWD => $username . ':' . $password,  // authentication
		CURLOPT_HTTPHEADER => array('Content-type: application/json') #,CURLOPT_POSTFIELDS => $json_string
	);

	// Setting curl options
	curl_setopt_array($ch,$options );

	// Getting results
	$result = curl_exec($ch); // Getting jSON result string

	$status = json_decode($result,true);

	return $status;
}

$result = getZwayData();

#maybe you want to see whats in your result - uncomment next 3 lines to see output from zway server - check and align the array below along
#in the bucket you can use any array complexity - fields are created along in influx.
#note once a field is created and feeded to influx you cannot rename or drop it anmyore - may use a test bucket to setup your final script

//echo "<xmp>";
//print_r($result);
//echo "</xmp>";

# align the dataArray to your needs in influx - important is only the time field holding a valid timestring for your influx db
# result must be aligned to your result array only sample hirachy is shown
#
$dataArray['name'] = 'Title of your device or measurement';
$dataArray['fields']['level'] = $result['data']['metrics']['level'];
$dataArray['fields']['scale'] = $result['data']['metrics']['scaleTitle'];

$dataArray['time'] = $result['data']['metrics']['modificationTime'];

$writeApi->write($dataArray, WritePrecision::S, $bucket, $org);

