<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/30/2019
 * Time: 5:15 AM
 */

$page=new omh\template\Page('All Drugs');
$db=new omh\database\DB();
$db->start_session();
$db->hasAccess('drugs');

$page->setPageContent('drugs/data.php');
$page->makePage();