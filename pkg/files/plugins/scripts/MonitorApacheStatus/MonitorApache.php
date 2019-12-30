<?php

/*
Author: Kenneth Cheung
Date: 06.26.2008
Description: This is a plug-in monitor that interacts with MOD-STATUS through the machine readable 
	interface on Apache Servers. ModStatus must be enabled, and for the stats to be complete the directive 
	extendedstatus should be set to on in apache.conf, as well in the directive the domain of the monitoring station should
	be allowed to query the URL
Usage: Install appropriate files in scripts and xml folder then use erdcloader to load this into the core
Notes: Needs to be configured per SERVER!

Edited: 01.23.2012
Author: Joel Pereira
- updated to loadpluginmonitor format
- updated/fixed issues for uptime 5+/6+

*/


//grab the second argument from up.time which should be the URL to the mod status handler on a given webserver
$hostname        = trim($_SERVER['UPTIME_HOSTNAME']);
$status_url_path = trim($_SERVER['UPTIME_STATUS_URL_PATH']);
$apache_port     = trim($_SERVER['UPTIME_APACHE_PORT']);
$status_url      = "http://{$hostname}:{$apache_port}{$status_url_path}?auto";

//** TEST CODE REMOVE/COMMENT FOR DELIVERY ****
//$status_url = "http://localhost/server-status?auto";

$apache_status_output = file_get_contents( trim($status_url) );

//** TEST CODE REMOVE/COMMENT FOR DELIVERY ****		
//echo $apache_status_output;	

// if we got something from the call then we need to clean it up for up.time
	if($apache_status_output){ //only if this got set by our call
	
		//clean out the spaces
		$apache_status_output = preg_replace('/ /', '', $apache_status_output);
		$arrayOutput = preg_split('/:/',$apache_status_output);
		
	
		$ut_status_output = "";
		//output = sizeof($arrayOutput);
		//iterate through and rebuild this thing no need to strip out the scoreboard uptime won't pick it up because it won't be part of the definition
		for ($i = 0; $i < 37; $i++){
			$ut_status_output = trim($ut_status_output) . " " . $arrayOutput[$i];
		}
		
		//output to std_out for uptime		
		echo $ut_status_output;
	
	}else {
		echo "ERROR: Monitor could not connect to MOD-STATUS on your apache server. The passed in URL was '{$status_url}'.\n";
		echo "Please ensure that you have mod-status enabled, the extended status directive enabled, and have given the monitoring station domain permissions to call the directive.\n";
	}


?>


