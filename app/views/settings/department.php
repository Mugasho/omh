<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/18/2019
 * Time: 11:05 AM
 */

$page = new omh\template\Page( 'Add Department' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess();
if ( isset( $_POST['department'], $_POST['hod'], $_POST['description'] ) ) {
	$data['department']  = filter_input( INPUT_POST, 'department', FILTER_SANITIZE_STRING );
	$data['hod']         = filter_input( INPUT_POST, 'hod', FILTER_SANITIZE_STRING );
	$data['description'] = filter_input( INPUT_POST, 'description', FILTER_SANITIZE_STRING );

	if ( isset( $_POST['a'] ) ) {
		if ( $db->addDepartment( $data ) ) {
			$page->setPageError( 'Department saved', 'Success', 'success' );
		}
	}

	if ( isset( $_POST['e'] ) ) {
		$data['id'] = filter_input( INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT );
		if ( $db->updateDepartment( $data ) ) {
			$page->setPageError( 'Department updated', 'Success', 'success' );
		}
	}
}
$page->setPageContent( 'settings/department.php' );
$page->makePage();