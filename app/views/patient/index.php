<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/11/2019
 * Time: 8:44 PM
 */

$db=new \omh\database\DB();
$page=new omh\template\Page('Patients');
$db->start_session();
$db->hasAccess();
$page->addScripts( 'datatables.min.js', CONTENT_PATH . 'global_assets/js/plugins/tables/datatables/' );
$page->addScripts( 'natural_sort.js', CONTENT_PATH . 'global_assets/js/plugins/tables/datatables/extensions/' );
$page->addScripts( 'table_icon.js', CONTENT_PATH . 'global_assets/js/demo_pages/' );
$page->setPageContent('patient/data.php');
$page->makePage();