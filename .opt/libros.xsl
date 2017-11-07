<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <HTML>
            <BODY>
                <xsl:for-each select="/LIBROS/LIBRO">
                    Título:
                    <FONT SIZE="2" COLOR="red" FACE="Verdana">
                        <xsl:value-of select="TITULO"/>
                        <BR/>
                    </FONT>
                    Autor:
                    <FONT SIZE="2" COLOR="blue" FACE="Verdana">
                        <xsl:value-of select="AUTOR"/>
                        <BR/>
                    </FONT>
                    Precio:
                    <FONT SIZE="2" COLOR="green" FACE="Verdana">
                        <xsl:value-of select="PRECIO"/>
                        Euros.
                        <BR/>
                    </FONT>
                </xsl:for-each>
            </BODY>
        </HTML>
    </xsl:template>
</xsl:stylesheet>