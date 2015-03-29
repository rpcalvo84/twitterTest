<?php

class DrawTwits{

	private $txt;

	function __construct(){
		$this->txt = "<html><head></head><body>";
	}

	public function addTwitterItem($twit){
		$this->txt .= "<div>";
		$this->txt .= "Usuario: " . $twit->user->screen_name . "<br/>";
		$this->txt .= "Fecha: " . $twit->created_at . "<br/>";
		$this->txt .= "Texto" . $twit->text . "<br/>";
		$this->txt .= "</div>";
	}

	public function endDraw(){
		return $this->txt . "</body></html>";
	}
}
?>
