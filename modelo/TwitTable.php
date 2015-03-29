<?php

class TwitTable{

	private $bd;

	function __construct($config){
		$this->bd = new PDO('mysql:host=localhost;dbname=' . $config['db'], $config['user'], $config['pass']);
	}

	public function addTwit($twit){
		try{
			$this->bd->beginTransaction();
			$query = "INSERT INTO twit (usuario,fecha,texto) VALUES (:usuario, :fecha, :texto)";
			$q = $this->bd->prepare($query);
			$q->bindParam(':usuario', $twit->user->screen_name);
			$q->bindParam(':fecha', $twit->created_at);
			$q->bindParam(':texto', $twit->text);
			$q->execute();

			$this->bd->commit();
		}catch(Exception $e){
			$this->bd->rollBack();
		}
	}

}

?>
