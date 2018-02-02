<?php 
$str = file_get_contents('http://www.velostanlib.fr/service/stationdetails/nancy/'.$_GET["id"]);
$xml = simplexml_load_string($str);
$dispo = ["Vélo Disponibles" => "$xml->available","Nombre de Places Libres" =>"$xml->free"];
foreach ($dispo as $key => $value) {
	echo "$key :"."$value<br>";
}
 ?>