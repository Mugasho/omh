<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/4/2019
 * Time: 12:51 AM
 */

$page=new omh\template\Page('Health workers');
$db=new \omh\database\DB();
$db->start_session();
$db->hasAccess();
$page->addScripts( 'natural_sort.js', CONTENT_PATH . 'global_assets/js/plugins/tables/datatables/extensions/' );
$page->setPageContent('hw/data.php');
$page->makePage();