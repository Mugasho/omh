<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/19/2019
 * Time: 8:44 PM
 */
$page = new omh\template\Page( 'Ledger Detail' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess();

$id=$match['params']['id'];
$ledger=$db->getStaffLedgerByID($id);
$staff_id=isset($ledger['staff_id'])?$ledger['staff_id']:'';
$staff = $db->getHealthWorkerByID( $staff_id );
$page->setPageVars($staff);
$page->setPageVars2($ledger);

if(isset($_POST['t_amount'],$_POST['t_date'],$_POST['t_time'])){
	$data['ledger_id']=$id;
	$data['staff_id']=$staff_id;
	$data['t_amount']=filter_input(INPUT_POST,'t_amount',FILTER_SANITIZE_NUMBER_INT);
	$data['t_type']=filter_input(INPUT_POST,'t_type',FILTER_SANITIZE_STRING);
	$data['t_date']=filter_input(INPUT_POST,'t_date',FILTER_SANITIZE_STRING);
	$data['t_time']=filter_input(INPUT_POST,'t_time',FILTER_SANITIZE_STRING);
	$data['t_time']=!empty($data['t_time'])?$data['t_time']:date('H:i:s');
	$data['t_notes']=filter_input(INPUT_POST,'t_notes',FILTER_SANITIZE_STRING);

	$db->addLedgerTransaction($data);
}

if(isset($_GET['post'],$_GET['action'])){
	$post=!empty($_GET['post'])?$_GET['post']:0;
	if($_GET['action']=='trash'){
		$db->deleteLedgerTransaction($post);
	}
}
$page->setPageContent( 'ledgers/detail.php' );
$page->makePage();