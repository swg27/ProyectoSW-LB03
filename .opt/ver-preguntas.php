<!DOCTYPE html>

<?php
$xslDoc = new DOMDocument();
$xslDoc->load("ver-preguntas.xsl");
$xmlDoc = new DOMDocument();
$xmlDoc->load("../.back-end/xml/questions.xml");
$proc = new XSLTProcessor();
$proc->importStylesheet($xslDoc);
echo $proc->transformToXML($xmlDoc);
?>

