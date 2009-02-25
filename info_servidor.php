<?php
/*
Plugin Name: info. Servidor	
Plugin URI: 
Description: Informacion del servidor
Author: V0ltr4n
Version: 1.1
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
<th bgcolor="#CCFFFF">Ruta archivos temporales</th>
</tr>
<tr>
<td><? echo sys_get_temp_dir(); ?></td>
</tr>
<tr>
<center><th bgcolor="#CCFFFF">Cabezeras</th></center>
</tr>
<tr>
<td>
<?
$cabezeras = apache_response_headers();
foreach($cabezeras as $cabezera => $value) {
echo "$cabezera: $value <br />\n";
}
?>
</tr>
</td>
<th bgcolor="#CCFFFF">Espacio total</th>
</tr>
<tr>
<td><? 
$total = disk_total_space("../");
$bytes = disk_total_space("../") . " Bytes";
echo $bytes;
$totalkb = round($total / 1024);
$kbytes = "<br>" . $totalkb . " Kilobytes";
echo $kbytes;
$totalmb = round($totalkb / 1024);
$mbytes = "<br>" . $totalmb . " Megabytes";
echo $mbytes;
$totalgb = round($totalmb / 1024);
$gbytes = "<br>" . $totalgb . " Gigabytes";
echo $gbytes;
?>
</td>
</tr>
</table>
<br>
<center><h1>Apache</h1></center>
<table id="info" width="100%">
<tr>
<center><th bgcolor="#CCFFFF">Version de Apache</th></center>
</tr>
<tr>
<td>
<? 
echo apache_get_version();
?>
</td>
</tr>
</table>
<center><h1>Informacion de PHP</h1></center>
<table id="info" width="100%">
<tr>
<center><th bgcolor="#CCFFFF">Version de PHP</th></center>
</tr>
<tr>
<td><? echo phpversion(); ?></td>
</tr>
<tr>
<th bgcolor="#CCFFFF">Tipo de interfaz</th>
</tr>
<tr>
<td><? echo php_sapi_name(); ?></td>
</tr>
<th bgcolor="#CCFFFF">Magic quotes</th>
</tr>
<tr>
<td><? 
echo 
$quotes = get_magic_quotes_runtime();
if($quotes == TRUE) {
echo " = Habilitadas"; 
} else {
echo " = Deshabilitadas"; }
 ?></td>
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
<center><h1>GD</h1></center>
<table id="info" width="100%">
<tr>
<th bgcolor="#CCFFFF">Version</th>
</tr>
<tr>
<td>
<?
$gd = gd_info();
foreach($gd As $gds => $value) {
if($value === TRUE) {
$value = "Habilitado"; }
if($value === FALSE) {
$value = "Deshabilitado"; }
echo "$gds: $value <br />\n"; }
?>
</td>
</tr>
</table>
<? } ?>