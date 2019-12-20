<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/9/2019
 * Time: 10:44 PM
 */

$protocol=!empty($_SERVER['HTTPS'])?'https://':'http://';
define("PROTOCOL",$protocol);
define("DB_HOST", "localhost");     // The host you want to connect to.
define("DB_USER", "root");    // The database username.
define("DB_PASSWORD", "");    // The database password.
define("DB_DATABASE", "omh");    // The database name.
define("DB_ENGINE", "InnoDB");    // The database engine.
define("DB_CHARSET", "latin1");    // The database charset.
define("SERVER",PROTOCOL.$_SERVER['SERVER_NAME']);
define("ROUTE",$_SERVER['REQUEST_URI']);
define("BASE_PATH",PROTOCOL.$_SERVER['SERVER_NAME']."/omh/");
define("DOCUMENT_PATH",$_SERVER['DOCUMENT_ROOT']."/omh/app-assets/");
define("CONTENT_PATH",BASE_PATH."app-assets/");
define("ASSETS_PATH",BASE_PATH."app-assets/a/b/c/d/assets/");

