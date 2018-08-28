<?php
/************************************************************************/
/* AppServ Open Project                                          */
/* Copyright (c) 2001 by Phanupong Panyadee (http://www.appservnetwork.com)         */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
if (empty($appservlang)) {
$appservlang = getenv("HTTP_ACCEPT_LANGUAGE");
}
switch ($appservlang)
	{
	case "th" :
	include("lang-thai.php");
	break;
	case "en" :
	include("lang-english.php");
	break;
	default :
	include("lang-english.php");
	break;
}
define("_LPHPMYADMIN","phpMyAdmin");
define("_LPERL","/cgi-bin/");
define("_APPVERSION","8.0.0");
define("_VMYSQL","5.7.10");
define("_VPHP","5.6.17");
define("_VPHP7","7.0.2");
define("_VAPACHE","2.4.18");
define("_VPHPMYADMIN"," 4.5.3.1");
define("_APPSERV","AppServ");
?>