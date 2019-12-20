<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/7/2019
 * Time: 10:54 AM
 */

$page=new omh\template\Page('Lab Requests');
$db=new \omh\database\DB();
$db->start_session();
$db->hasAccess();
$page->addScripts( 'datatables.min.js', CONTENT_PATH . 'global_assets/js/plugins/tables/datatables/' );
$page->addScripts( 'natural_sort.js', CONTENT_PATH . 'global_assets/js/plugins/tables/datatables/extensions/' );
$page->setPageContent('lab/requests.php');
$page->makePage();