<?php

$str = file_get_contents('http://ip-api.com/xml');

$xml = simplexml_load_string($str);
$gps = ["$xml->lat","$xml->lon"];

$localisation = $gps[0].','.$gps[1];

$data = file_get_contents('http://www.infoclimat.fr/public-api/gfs/xml?_ll='.$localisation.'&_auth=ARsDFFIsBCZRfFtsD3lSe1Q8ADUPeVRzBHgFZgtuAH1UMQNgUTNcPlU5VClSfVZkUn8AYVxmVW0Eb1I2WylSLgFgA25SNwRuUT1bPw83UnlUeAB9DzFUcwR4BWMLYwBhVCkDb1EzXCBVOFQoUmNWZlJnAH9cfFVsBGRSPVs1UjEBZwNkUjIEYVE6WyYPIFJjVGUAZg9mVD4EbwVhCzMAMFQzA2JRMlw5VThUKFJiVmtSZQBpXGtVbwRlUjVbKVIuARsDFFIsBCZRfFtsD3lSe1QyAD4PZA%3D%3D&_c=19f3aa7d766b6ba91191c8be71dd1ab2');

 $data = simplexml_load_string($data);

$xsl = new DOMDocument;
$xsl->load('style.xsl');

// Configuration du transformateur
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl); // attachement des règles xsl

header("Content-type: text/xml; charset-ISO-ISO-8859-1");

echo $proc->transformToXML($data);

