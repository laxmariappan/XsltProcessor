<?xml version="1.0" encoding="UTF-8" ?>
<xsl:transform xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" doctype-public="XSLT-compat" omit-xml-declaration="yes" encoding="UTF-8" indent="yes" />
    <xsl:template match="breakfast_menu">
		<section class="breakfast_menu">
			<xsl:apply-templates />
		</section><br/>
    </xsl:template>
    <xsl:template match="food">
		<hr/><div class="food">
			<xsl:apply-templates />
		</div>
    </xsl:template>
    <xsl:template match="name">
      <p class="name">
        <xsl:apply-templates />
      </p>
    </xsl:template>
    <xsl:template match="price">
      <span class="price">
        <xsl:apply-templates />
      </span>
    </xsl:template>
    <xsl:template match="list">
      <ol class="list">
        <xsl:apply-templates />
      </ol>
    </xsl:template>
    <xsl:template match="item">
      <li class="item">
        <xsl:apply-templates />
      </li>
    </xsl:template>
</xsl:transform>