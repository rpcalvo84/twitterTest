<?php

class Config{

	private $config;

	function __construct(){

		//leer y parsear config.xml
		$xml = simplexml_load_file('config/config.xml') or die('Error: No se ha encontrado el archivo de configuracion');

		$this->config['API']['APIKey'] = $xml->APIKey;
		$this->config['API']['APISecret'] = $xml->APISecret;
		$this->config['API']['AccessToken'] = $xml->AccessToken;
		$this->config['API']['AccessTokenSecret'] = $xml->AccessTokenSecret;
		$this->config['API']['urlAPI'] = $xml->UrlAPI;


		$this->config['BBDD']['user'] = $xml->user;
		$this->config['BBDD']['pass'] = $xml->pass;
		$this->config['BBDD']['db'] = $xml->db;
	}

	public function getAPIConfig(){
		return $this->config['API'];
	}

	public function getBBDDConfig(){
		return $this->config['BBDD'];
	}
}
?>
