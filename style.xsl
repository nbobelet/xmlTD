<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output
    method="html"
    version="1.0"
    omit-xml-declaration="no"
    indent="yes" >
  </xsl:output>
		<xsl:template match="/previsions">
					<xsl:copy>
					<xsl:apply-templates select="/previsions/echeance"/>
				</xsl:copy>

		</xsl:template>
		<xsl:template match="echeance">
 <xsl:copy-of select="*"/>
		</xsl:template>
</xsl:stylesheet>
