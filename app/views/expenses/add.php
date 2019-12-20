<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/2/2019
 * Time: 3:07 AM
 */

$page = new omh\template\Page( 'Add Expense' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess();

if ( isset( $_POST['expense_date'], $_POST['expense_type_id'], $_POST['amount'], $_POST['recurring'] ) ) {

	$data['expense_type_id']     = filter_input( INPUT_POST, 'expense_type_id', FILTER_SANITIZE_NUMBER_INT );
	$data['amount']              = filter_input( INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_INT );
	$data['expense_date']        = filter_input( INPUT_POST, 'expense_date', FILTER_SANITIZE_STRING );
	$data['recurring']           = filter_input( INPUT_POST, 'recurring', FILTER_SANITIZE_NUMBER_INT );
	$data['expense_description'] = filter_input( INPUT_POST, 'expense_description', FILTER_SANITIZE_STRING );
	$data['recur_frequency']     = null;
	$data['recur_type']          = null;
	$data['recur_start_date']    = null;
	$data['recur_end_date']      = null;

	if ( $data['recurring'] == '1' ) {

		$data['recur_frequency']  = $_POST['recur_frequency'];
		$data['recur_type']       = $_POST['recur_type'];
		$data['recur_start_date'] = $_POST['recur_start_date'];
		$data['recur_end_date']   = $_POST['recur_end_date'];
	}

	if ( $db->addExpense( $data ) ) {
		header('location: '.BASE_PATH.'expenses/');
	}else{
		$page->setHasError( true );
		$page->setPageError( 'Change a few things and try again', 'Expense not saved', 'danger' );
	}

}
$page->setPageContent( 'expenses/add-expense.php' );
$page->makePage();