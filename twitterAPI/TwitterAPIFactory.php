<?php

include_once 'twitterAPI/Twitter1_2.php';

class TwitterAPIFactory{

	public static function getAPI($config){
		return new Twitter1_2($config);
	}


}
