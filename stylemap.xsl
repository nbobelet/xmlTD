<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output 
		method="html"
		encoding="UTF-8"
		doctype-public="html"
		doctype-system="html"
		indent="yes" ></xsl:output>

		<xsl:template match="/carto">
			<div id="mapid"></div>
<script>
	


	var mymap = L.map('mapid').setView([<xsl:value-of select="/carto/localisation/latitude"/>, 	<xsl:value-of select="/carto/localisation/longitude"/>], 15);

	L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data ; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
			'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="http://mapbox.com">Mapbox</a>',
		id: 'mapbox.streets'
	}).addTo(mymap);

	L.marker([	<xsl:value-of select="/carto/localisation/latitude"/>,	<xsl:value-of select="/carto/localisation/longitude"/>]).addTo(mymap)
		.bindPopup("<b>Vous êtes Ici</b><br />").openPopup();


	var popup = L.popup();
	
</script>

			<xsl:apply-templates select="/carto/markers/marker"/>

			
	<xsl:apply-templates select="/carto/localisation"/>
		</xsl:template>

		<xsl:template match="marker">
			
			
<script>
	L.circleMarker([<xsl:value-of select="@lat"/>,<xsl:value-of select="@lng"/>]).addTo(mymap)
		.bindPopup("<b> <xsl:value-of select="@address"/></b><br />").openPopup();
</script>
		</xsl:template>

		<xsl:template match="localisation">
			
			<xsl:value-of select="latitude"/>
			<xsl:value-of select="longitude"/>
		</xsl:template>

	</xsl:stylesheet>
