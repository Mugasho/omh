<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/19/2019
 * Time: 6:09 PM
 */

$page = new omh\template\Page( 'Add Asset' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess('assets/add');

if ( isset( $_POST['asset_name'], $_POST['asset_type'], $_POST['repeater-list'] ) ) {
	if ( ! empty( $_POST['asset_name'] ) ) {
		$data['asset_uid']  = date( "Ymd" ) . uniqid();
		$data['asset_type'] = $_POST['asset_type'];
		$data['asset_name'] = $_POST['asset_name'];
		$data['supplier']   = $_POST['supplier'];
		$data['serial']     = $_POST['serial'];
		$data['pprice']     = $_POST['pprice'];
		$data['pdate']      = $_POST['pdate'];
		$data['rprice']     = $_POST['rprice'];
		$data['rdate']      = $_POST['rdate'];
		$data['notes']      = $_POST['notes'];
		$data['file_id']    = 1;
		$data['dept_id']    = 1;
		$data['user_id']    = 1;
		$valuations         = $_POST['repeater-list'];
		if ( $db->addAsset( $data ) ) {
			$last_id=$db->getLastId();
			foreach ( $valuations as $valuation ) {
				$valuation['asset_id']=$last_id;
				$valuation['user_id']=1;
				$db->addAssetValuation( $valuation );
			}
			header('location: '.BASE_PATH.'assets/');
		};
	} else {
		$page->setHasError( true );
		$page->setPageError( 'Change a few things and try  again', 'Asset not saved', 'warning' );
	}
}
$page->setPageContent( 'assets/add.php' );
$page->makePage();