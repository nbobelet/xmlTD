<?php

// Stringify du xml
$str = file_get_contents('http://ip-api.com/xml');

//transforme la string en XML (comme un objet)
$xml = simplexml_load_string($str);
// Récupère la lattitude et longitude
$gps = ["$xml->lat","$xml->lon"];
// Concatène la valeur
$localisation = array($gps[0],$gps[1]);

// Stringify du XML avec la varaible localisation
$data = file_get_contents('http://www.infoclimat.fr/public-api/gfs/xml?_ll='.$localisation[0].','.$localisation[1].'&_auth=ARsDFFIsBCZRfFtsD3lSe1Q8ADUPeVRzBHgFZgtuAH1UMQNgUTNcPlU5VClSfVZkUn8AYVxmVW0Eb1I2WylSLgFgA25SNwRuUT1bPw83UnlUeAB9DzFUcwR4BWMLYwBhVCkDb1EzXCBVOFQoUmNWZlJnAH9cfFVsBGRSPVs1UjEBZwNkUjIEYVE6WyYPIFJjVGUAZg9mVD4EbwVhCzMAMFQzA2JRMlw5VThUKFJiVmtSZQBpXGtVbwRlUjVbKVIuARsDFFIsBCZRfFtsD3lSe1QyAD4PZA%3D%3D&_c=19f3aa7d766b6ba91191c8be71dd1ab2');

$data = simplexml_load_string($data);

// LOAD LE STYLE
$xsl = new DOMDocument;
$xsl->load('style.xsl');

// Configuration du transformateur 
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl); // attachement des règles xsl

$data2 = file_get_contents('http://www.velostanlib.fr/service/carto');
$data2 = simplexml_load_string($data2);

$myloc=$data2->addChild('localisation');
$myloc->addChild("latitude",$gps[0]);
$myloc->addChild("longitude",$gps[1]);
$xsl2 = new DOMDocument;
$xsl2->load('stylemap.xsl');
$proc2 = new XSLTProcessor;
$proc2->importStyleSheet($xsl2); // attachement des règles xsl
?>
<html>
<head>
	<title>TP1</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>




</head>
<body>
<?php
echo $proc->transformToXML($data);
echo $proc2->transformToXML($data2);
?>
</body>
</html>

