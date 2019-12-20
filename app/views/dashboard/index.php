<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/11/2019
 * Time: 8:13 AM
 */

$home=new omh\template\Page('home');
$db=new \omh\database\DB();
$db->start_session();
$db->hasAccess();
$home->setPageContent('home/index.php');
$home->makePage();