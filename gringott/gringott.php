<?php
	// First, include Requests
include('Requests/library/Requests.php');
 
// Next, make sure Requests can load internal classes
Requests::register_autoloader();
 
//get the page

if (isset($_GET['data'])) {
	$data = unserialize($_GET['data']);	
	$data = str_replace(":", "=", $data);
	$data = str_replace(",", "&", $data);
	$data = parse_str($data);
} else {
	$data = array();
}

if ($_GET['method'] == 'POST') {
	$response = Requests::post($_GET['url'], array(), $data);
} else {
	$response = Requests::get($_GET['url']);
}
echo '<pre>';
var_dump($response->cookies);
echo '</pre>';
?>