<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/28/2019
 * Time: 1:23 PM
 */

$page =new omh\template\Page('Asset Types');
$db=new omh\database\DB();
$db->start_session();
$db->hasAccess('assets/types');
if(isset($_POST['asset_name'],$_POST['asset_description'],$_POST['add'])){
	if($db->addAssetType($_POST)){
		$page->setPageError('Asset Added','Success','success');
	}

}

if(isset($_POST['asset_name'],$_POST['asset_description'],$_POST['edit'])){
	if($db->updateAssetType($_POST)){
		$page->setPageError('Asset updated','Success','success');
	}

}
if(isset($_GET['r'])){
	$rid=$_GET['r'];
	if ( ! empty( $rid ) ) {
		$db->deleteAssetType($rid);
	}$page->setPageError('Asset Removed','Success','info');
}
$page->addScripts( 'natural_sort.js', CONTENT_PATH . 'global_assets/js/plugins/tables/datatables/extensions/' );
$page->addScripts( 'task_manager_list.js', CONTENT_PATH . 'global_assets/js/demo_pages/' );
$page->setPageContent('assets/types.php');
$page->makePage();