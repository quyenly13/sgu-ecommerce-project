<?php
return[
'client_id' =>'AfJ-Ercf_k2psv4xL30tt2XGAQco2Z2yxceiHYd4PGyxjzdqcT1YTvAMysDPJEMkE0oeJ_5xkfWi0mdb',
'secret' => 'EMcJQt1Dcb9UOnGZgLdvv6_yIxVI0fmtKdVep93shI-rO5WSn8qGTGoKt5n3bPQGdkkbVCmSAH0lb6L_',
/**
* SDK configuration 
*/
'settings' => [
	/**
	* Available option 'sandbox' or 'live'
	*/
	'mode' => 'sandbox',
	/**
	* Specify the max request time in seconds
	*/
	'http.ConnectionTimeOut' => 1000,
	/**
	* Whether want to log to a file
	*/
	'log.LogEnabled' => true,
	/**
	* Specify the file that want to write on
	*/
	'log.FileName' => storage_path() . '/logs/paypal.log',
	/**
	* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
	*
	* Logging is most verbose in the 'FINE' level and decreases as you
	* proceed towards ERROR
	*/
	'log.LogLevel' => 'INFO',
],
];