<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/18/2019
 * Time: 4:54 PM
 */

$page=new omh\template\Page('Media Library');
$db=new \omh\database\DB();
$db->start_session();
$db->hasAccess();
$page->addScripts( 'datatables.min.js', CONTENT_PATH . 'global_assets/js/plugins/tables/datatables/' );
$page->setPageContent('media/library.php');
$page->makePage();