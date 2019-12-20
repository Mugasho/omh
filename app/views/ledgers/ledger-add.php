<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/10/2019
 * Time: 8:21 PM
 */

$page = new omh\template\Page( 'Add Ledger' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess();

if ( isset( $_POST['staff_id'], $_POST['ledger_description'] ) ) {

	$data['staff_id']           = $_POST['staff_id'];
	$data['ledger_no']           = $_POST['ledger_no'];
	$data['ledger_description'] = $_POST['ledger_description'];

	if ( $db->addStaffLedger( $data ) ) {

		header( 'location: ' . BASE_PATH . 'ledgers/' );
	} else {
		$page->setHasError( true );
		$page->setPageError( 'Change a few things and try  again', 'Ledger not saved', 'warning' );
	}
}

$page->setPageContent( 'ledgers/add.php' );
$page->makePage();