<?php
/* Examplo adicionando HSTS baseado em php headers;
 * Based on http headers documentation: http://php.net/manual/pt_BR/function.header.php
 * Neste exemplo de remocao do hsts, o brownser entende que o recurso foi removido
 * quando o valor do parametro max-age for ingual a zero */
header("strict-transport-security: max-age=0 includeSubDomains");
exit;
?>
