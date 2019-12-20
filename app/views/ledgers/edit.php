<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/30/2019
 * Time: 3:40 AM
 */

$page = new omh\template\Page( 'Edit Ledger' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess();

$id=$match['params']['id'];
$page->setPageVars($id);

if ( isset( $_POST['ledger_no'], $_POST['ledger_description'] ) ) {

	$data['id']           = $id;
	$data['ledger_no']           = $_POST['ledger_no'];
	$data['ledger_description'] = $_POST['ledger_description'];

	if ( $db->updateStaffLedger( $data ) ) {

		header( 'location: ' . BASE_PATH . 'ledgers/' );
	} else {
		$page->setHasError( true );
		$page->setPageError( 'Change a few things and try  again', 'Ledger not saved', 'warning' );
	}
}

$page->setPageContent( 'ledgers/edit.php' );
$page->makePage();