<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:output 
		method="html"
		encoding="UTF-8"
		doctype-public="html"
		doctype-system="html"
		indent="yes" ></xsl:output>

		<xsl:template match="/previsions">

			<xsl:apply-templates select="/previsions/echeance[@hour='3']"/>

		</xsl:template>
		<xsl:template match="echeance">
			<h1> Voici la météo frère</h1>
			<table>
				<th> Température</th>
				<th> Vent </th>
				<th> Humidite </th>
				<th> Pluie </th>
				<tr>
					<td>
						<xsl:value-of select="temperature/level[@val='sol'] - 273.15"/>
						°C
					</td>
					<td>
						<xsl:value-of select="vent_moyen"/> km/h
					</td>
					<td><xsl:value-of select="humidite"/> % </td>
					<td><xsl:value-of select="pluie"/> mm</td>
				</tr>
			</table>
			
		</xsl:template>
	</xsl:stylesheet>
