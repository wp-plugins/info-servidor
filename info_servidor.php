<?php
/*
Plugin Name: info. Servidor	
Plugin URI: 
Description: Informacion del servidor
Author: V0ltr4n
Version: 1.0
Author URI: http://www.bo0m.org
*/
//Menu de administracion
function menu_info_servidor() {
	add_submenu_page('index.php', 'Informacion del servidor', 'Info. Server', 10, __FILE__, 'funciones_infoserv');
}
add_action('admin_menu', 'menu_info_servidor');
//Informacion general
function funciones_infoserv() {
	informacion_general();
}
//Funcion informacion_general
function informacion_general() {
?>
<style>
#info{
	font:10px Verdana, Arial, Helvetica, sans-serif;
	width:550px;
	margin:0 auto;
	padding:25px;
	border:2px solid #00CCFF;
}
</style>
<center><h1>Informacion General</h1></center>
<table id="info" width="100%">
<tr>
<th bgcolor="#CCFFFF">Alojado en</th>
</tr>
<tr>
<td> <? echo php_uname('n'); ?></td>
</tr>
<tr>
<th bgcolor="#CCFFFF">Sistema operativo</th>
</tr>
<tr>
<td><? echo php_uname('s'); ?></td>
</tr>
<tr>
<th bgcolor="#CCFFFF">Tipo de ordenador</th>
</tr>
<tr>
<td><? echo php_uname('m'); ?></td>
</tr>
<tr>
<th bgcolor="#CCFFFF">Nombre del servidor</th>
</tr>
<tr>
<td><? echo $_SERVER['SERVER_NAME']; ?></td>
</tr>
<tr>
<th bgcolor="#CCFFFF">Protocolo</th>
</tr>
<tr>
<td><? echo $_SERVER['SERVER_PROTOCOL']; ?></td>
</tr>
<tr>
<th bgcolor="#CCFFFF">Puerto de servidor</th>
</tr>
<tr>
<td><? echo $_SERVER['SERVER_PORT']; ?></td>
</tr>
<tr>
<th bgcolor="#CCFFFF">Documento raiz</th>
</tr>
<tr>
<td><? echo $_SERVER['DOCUMENT_ROOT']; ?></td>
</tr>
</table>
<br>
<center><h1>Informacion de PHP</h1></center>
<table id="info" width="100%">
<tr>
<center><th bgcolor="#CCFFFF">Version de PHP</th></center>
</tr>
<tr>
<td><? echo phpversion(); ?></td>
</tr>  
<tr>
<tr>
<th bgcolor="#CCFFFF">Magic quotes</th>
</tr>
<tr>
<td><? echo get_magic_quotes_runtime(); ?></td>
</tr>
<tr>
<th bgcolor="#CCFFFF">Memoria asignada</th>
</tr>
<tr>
<td><? echo memory_get_peak_usage(); ?></td>
</tr>
<tr>
<th bgcolor="#CCFFFF">Memoria usada por PHP</th>
</tr>
<tr>
<td><? echo memory_get_usage(); ?></td>
</tr>
<tr>
<th bgcolor="#CCFFFF">Ruta del php.ini</th>
</tr>
<tr>
<td><? echo php_ini_loaded_file(); ?></td>
</tr>
<tr>
<th bgcolor="#CCFFFF">Zend</th>
</tr>
<tr>
<td><? echo zend_version(); ?></td>
</tr>
</table>
<br>
<center><h1>Informacion de MYSQL</h1></center>
<table id="info" width="100%">
<tr>
<th bgcolor="#CCFFFF">Version de Mysql</th>
</tr>
<tr>
<td><? echo mysql_get_client_info(); ?></td>
</tr>
<tr>
<th bgcolor="#CCFFFF">Servidor MYSQl</th>
</tr>
<tr>
<td><? echo mysql_get_host_info(); ?></td>
</tr>
</table>
<? } ?>