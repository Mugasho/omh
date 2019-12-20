<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/26/2019
 * Time: 4:23 PM
 */

$page = new omh\template\Page( 'Edit Asset' );
$db   = new omh\database\DB();
$id=$match['params']['id'];
$db->start_session();
$db->hasAccess('assets/edit/'.$id);

$page->setPageVars($id);

if(isset($_GET['dv'])){
	$db->deleteAssetValuationByID($_GET['dv']);
	return;
}

if ( isset( $_POST['asset_name'], $_POST['asset_type'], $_POST['repeater-list'] ) ) {
	if ( ! empty( $_POST['asset_name'] ) ) {
		$data['asset_id']  = $id;
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
		if ( $db->updateAsset( $data ) ) {
			foreach ( $valuations as $valuation ) {
				if(!empty($valuation['value_id'])){
					$db->updateAssetValuation( $valuation );
				}else{
					$valuation['user_id']=$data['user_id'];
					$valuation['asset_id']=$data['asset_id'];
					$db->addAssetValuation($valuation);
				}

			}
			$page->setHasError( true );
			$page->setPageError( 'Success', 'Asset update', 'success' );
		};
	} else {
		$page->setHasError( true );
		$page->setPageError( 'Change a few things and try  again', 'Asset not updated', 'warning' );
	}
}
$page->setPageContent( 'assets/edit.php' );
$page->makePage();