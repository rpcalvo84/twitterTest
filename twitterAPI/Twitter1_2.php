<?php

require_once('TwitterAPIInterface.php');
require_once('twitter-api-php-master/TwitterAPIExchange.php');

class Twitter1_2 implements TwitterAPIInterface{
	
	private $twitter;
	private $urlAPI;

	function __construct($config){
		$settings = array(
			'oauth_access_token' => $config['AccessToken'],
			'oauth_access_token_secret' => $config['AccessTokenSecret'],
			'consumer_key' => $config['APIKey'],
			'consumer_secret' => $config['APISecret']
		);

		$this->twitter = new TwitterAPIExchange($settings);
		$this->urlAPI = $config['urlAPI'];
	}

	public function getTwitsByHash($hash){
		$url = $this->urlAPI . "search/tweets.json";
		$requestMethod = 'GET';

		return $this->twitter->setGetfield("?q=%23" . $hash)
			->buildOauth($url, $requestMethod)
			->performRequest();
	}
}
?>
