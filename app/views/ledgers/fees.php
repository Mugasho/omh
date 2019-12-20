<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/10/2019
 * Time: 8:21 PM
 */

$page =new omh\template\Page('Ledger Fees');
$db=new omh\database\DB();
$db->start_session();
$db->hasAccess();
if(isset($_POST['ledger_fee'],$_POST['fee_description'],$_POST['add'])){
	if($db->addLedgerFee($_POST)){
		$page->setPageError('Ledger Fee Added','Success','success');
	}

}

if(isset($_POST['ledger_fee'],$_POST['fee_action'],$_POST['fee_description'],$_POST['edit'])){
	if($db->updateLedgerFee($_POST)){
		$page->setPageError('Fee updated','Success','success');
	}

}
if(isset($_GET['r'])){
	$rid=$_GET['r'];
	if ( ! empty( $rid ) ) {
		$db->deleteLedgerFee($rid);
	}$page->setPageError('Ledger Fee Removed','Success','info');
}
$page->setPageContent('ledgers/fees.php');
$page->makePage();