<?php
// Pull in the NuSOAP code
require_once('nusoap.php');

ini_set("soap.wsdl_cache_enabled", "1"); // Set to zero to avoid caching WSDL

ini_set("display_errors", true);

try{
	$client = new nusoap_client('http://pmksy.gov.in/mis/MIdataintegrationtest.asmx?wsdl', true);
	$err = $client->getError();
	if ($err) {
		// Display the error
		echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
		// At this point, you know the call that follows will fail
	}

	$str4="hello";
	$result = $client->call('TestWebservice', $str4);

echo '<br><br>result:';
print_r($result);
echo '<br><br>';

echo '<br><br>';

echo '<h2>Response</h2>';

//echo '<pre>' . $client->response. '</pre>';
echo '<h2>Request</h2><pre>' . htmlspecialchars($client->request, ENT_QUOTES) . '</pre>';
echo '<h2>Response</h2><pre>' . htmlspecialchars($client->response, ENT_QUOTES) . '</pre>';
echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';

}
catch(SoapFault $ex) {
    echo 'Error:';
    if ($ex->getMessage() != '') {
        echo $ex->getMessage();
    } else {
        echo $ex . "\n";
    }
	echo '<br><br>';
	print_r($ex);
}
?>