### General Info
***
This more dirty script is there to help you setting up a feed from your zway / z-wave server to your influxDB2 
There is a plugin available in Zway Server which was created for influxDB v1. That one does not work with influxDB2 anymore. A fork of this for influxDB2 is not official commited and buggy - you can find it here https://github.com/aeytom/Zway-InfluxDbStats/tree/influxdb2-pr

## Technologies
***
A list of technologies used within the project:
* [php]: Version 8.1 
* [Apache2]
* [php-curl]

## Installation
***
Script is using php-curl to get data from the zway API - install it for your version 

Align the script to your needs 

Line 10-14 your influxDB2 server data
Line 28-34 your zway server data

Important
Line 72-78 needs aligned to your set of data!

If you want to setup the thing completly from scratch you need to get you the InfluxDB2\Clent from composer
more info https://www.influxdata.com/blog/getting-started-php-influxdb/

Once your setup is running, you can use it eg. in a cronjob to transport data on a regular basis
