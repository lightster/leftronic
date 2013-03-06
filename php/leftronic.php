<?php

# Use of "json_encode()" requires PHP 5.2.0 or greater

class Leftronic {
	
	public $accessKey;
	
	public function __construct($secretKey) {
		$this->accessKey = $secretKey;
		$this->apiUrl = 'https://www.leftronic.com/customSend/';
	}
	
	public function pushNumber($streamName, $point) {
		### Pushing a number to a Number, Horizontal/Vertical Bar, or Dial widget
		if (is_numeric($point)) {
			$point = array('number' => $point);
		}
		$parameters = array('accessKey' => $this->accessKey, 'streamName' => $streamName, 'point' => $point);
		# Convert to JSON
		$jsonData = json_encode($parameters);
		# Make request
		$this->postData($jsonData);
	}

	public function pushGeo($streamName, $lati, $longi, $color=Null) {
		### Pushing a geographic location (latitude and longitude) to a Map widget
		# Color can also be passed (red, green, blue, yellow, or purple).
		# Default color is red.
		$parameters = array('accessKey' => $this->accessKey, 'streamName' => $streamName, 'point' => array(
			'latitude' => $lati, 'longitude' => $longi, 'color' => $color));
		# Convert to JSON
		$jsonData = json_encode($parameters);
		# Make request
		$this->postData($jsonData);
	}
	
	public function pushText($streamName, $myTitle, $myMsg) {
		### Pushing a title and message to a Text Feed widget
		$parameters = array('accessKey' => $this->accessKey, 'streamName' => $streamName, 'point' => array(
			'title' => $myTitle, 'msg' => $myMsg));
		# Convert to JSON
		$jsonData = json_encode($parameters);
		# Make request
		$this->postData($jsonData);
	}
	
	public function pushLeaderboard($streamName, array $leaderArray) {
		### Pushing an array to a Leaderboard widget
		$parameters = array('accessKey' => $this->accessKey, 'streamName' => $streamName, 'point' => array(
			'leaderboard' => $leaderArray));
		# Convert to JSON
		$jsonData = json_encode($parameters);
		# Make request
		$this->postData($jsonData);
	}
	
	public function pushList($streamName, array $listArray) {
		### Pushing an array to a List widget
		$parameters = array('accessKey' => $this->accessKey, 'streamName' => $streamName, 'point' => array(
			'list' => $listArray));
		# Convert to JSON
		$jsonData = json_encode($parameters);
		# Make request
		$this->postData($jsonData);
	}

	public function pushLabel($streamName, $label) {
		### Pushing HTML to an HTML widget
		$parameters = array('accessKey' => $this->accessKey, 'streamName' => $streamName, 'point' => array(
			'label' => $label));
		# Convert to JSON
		$jsonData = json_encode($parameters);
		# Make request
		$this->postData($jsonData);
	}

	public function pushHtml($streamName, $html) {
		### Pushing HTML to an HTML widget
		$parameters = array('accessKey' => $this->accessKey, 'streamName' => $streamName, 'point' => array(
			'html' => $html));
		# Convert to JSON
		$jsonData = json_encode($parameters);
		# Make request
		$this->postData($jsonData);
	}

	public function pushTable($streamName, $table) {
		### Pushing table to a table widget
		$parameters = array('accessKey' => $this->accessKey, 'streamName' => $streamName, 'point' => array(
			'table' => $table));
		# Convert to JSON
		$jsonData = json_encode($parameters);
		# Make request
		$this->postData($jsonData);
	}

	public function postData($data) {
		### Makes an HTTP POST with JSON data
		$ch = curl_init();
		# SSL options
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
		# Check that common name exists and that it matches server hostname
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt($ch, CURLOPT_CAINFO, getcwd() ."/CAcerts/BuiltinObjectToken-GoDaddyClass2CA.cert");
		# POST options
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		# Make the request
		$result = curl_exec($ch);
	}
}

?>
