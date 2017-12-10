<?php
/* Examplo adicionando HSTS baseado em php headers;
 * Based on http headers documentation: http://php.net/manual/pt_BR/function.header.php
 * O valor base para o parâmetro max-age é definido em segundos, neste exemplo: 1 ano */
header("strict-transport-security: max-age=31536000");
exit;
?>
