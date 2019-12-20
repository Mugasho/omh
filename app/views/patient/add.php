<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/12/2019
 * Time: 10:25 AM
 */

$page = new omh\template\Page( 'Add Patient' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess();
if ( isset( $_POST['first_name'], $_POST['patient_id'] ) ) {
	if ( ! empty( $_POST['first_name'] ) ) {
		$data['first_name'] = filter_input(INPUT_POST,'first_name',FILTER_SANITIZE_STRING);
		$data['last_name']  = filter_input(INPUT_POST,'last_name',FILTER_SANITIZE_STRING);
		$data['patient_id'] = filter_input(INPUT_POST,'patient_id',FILTER_SANITIZE_STRING);
		$data['sex']        = $_POST['sex'];
		$data['email']      = $_POST['email'];
		$data['city']       = $_POST['city'];
		$data['division']   = $_POST['division'];
		$data['village']    = $_POST['village'];
		$data['address']    = $_POST['address'];
		$data['country']    = $_POST['country'];
		$data['phone']      = $_POST['phone'];
		$data['dob']        = $_POST['dob'];
		$data['dob_submit'] = $_POST['dob_submit'];
		$temp               = isset( $_FILES['profile_pic'] ) ? $_FILES['profile_pic'] : null;
		$upload             = new omh\utils\Upload( null, $temp );
		$uploaded           = $upload->startUpload();
		if ( ! empty( $uploaded['name'] ) ) {
			$data['profile_pic'] = $uploaded['name'];
		}
		$db->addPatient( $data );
		header('location: '.BASE_PATH.'patients/');
	} else {
		$page->setHasError( true );
		$page->setPageError( 'At least First Name is needed ', 'Patient not saved', 'warning' );
	}
}
$page->setPageContent( 'patient/add.php' );
$page->makePage();
