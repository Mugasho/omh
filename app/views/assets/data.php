<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/11/2019
 * Time: 3:31 PM
 */

$page = new omh\template\Page( 'Assets' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess('assets');

if ( isset( $_GET['r'] ) ) {

	if ( $db->deleteAsset( $_GET['r'] ) ) {
		$page->setPageError( 'Asset removed', 'Notice', 'info' );
	};
}
$page->addScripts( 'natural_sort.js', CONTENT_PATH . 'global_assets/js/plugins/tables/datatables/extensions/' );
$page->addScripts( 'task_manager_list.js', CONTENT_PATH . 'global_assets/js/demo_pages/' );
$page->setPageContent( 'assets/list.php' );
$page->makePage();
