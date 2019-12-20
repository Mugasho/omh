<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 12/4/2019
 * Time: 3:45 PM
 */

$page = new omh\template\Page( 'Add Ledger' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess('drugs/ledgers/add');

if ( isset( $_POST['drug_id'], $_POST['ledger_description'] ) ) {

	$data['drug_id']           = $_POST['drug_id'];
	$data['ledger_description'] = $_POST['ledger_description'];
var_dump($data);
	if ( $db->addDrugLedger( $data ) ) {

		header( 'location: ' . BASE_PATH . 'drugs/ledgers/' );
	} else {
		$page->setHasError( true );
		$page->setPageError( 'Change a few things and try  again', 'Ledger not saved', 'warning' );
	}
}

$page->setPageContent( 'drugs/add-ledger.php' );
$page->makePage();