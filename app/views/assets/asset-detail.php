<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/7/2019
 * Time: 12:19 PM
 */

$db=new \omh\database\DB();
$page=new omh\template\Page('Asset Detail');
$db->start_session();
$db->hasAccess();
$page->setPageContent('assets/detail.php');
$page->makePage();