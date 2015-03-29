
<?php

include_once 'config/Config.php';
include_once 'modelo/TwitTable.php';
include_once 'twitterAPI/TwitterAPIFactory.php';
require_once ('presentacion/DrawTwits.php');


if (empty($argv[1])){
	die ('---No se ha especificado el "hash"---');
}
$hash = $argv[1];

$config = new Config();

$bd = new TwitTable($config->getBBDDConfig());

$lectorTwits = TwitterAPIFactory::getAPI($config->getAPIConfig());

$twits = json_decode($lectorTwits->getTwitsByHash($hash));

$draw = new DrawTwits();

foreach ($twits->statuses as $twit){
	$bd->addTwit($twit);
	$draw->addTwitterItem($twit);
}

echo $draw->endDraw();


