<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output 
		method="html"
		encoding="UTF-8"
		doctype-public="html"
		doctype-system="html"
		indent="yes" ></xsl:output>

		<xsl:template match="/carto">
		

			<xsl:apply-templates select="/carto/markers"/>
			<div id="mapid"></div>
	

		</xsl:template>
		<xsl:template match="markers">
		<xsl:value-of select ="marker/@name"/>
			
		</xsl:template>
	</xsl:stylesheet>
