<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/14/2019
 * Time: 9:28 PM
 */

$page = new omh\template\Page( 'Edit Patient' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess();
$id   = $match['params']['id'];
if ( isset( $_POST['first_name'], $_POST['patient_id'] ) ) {

	if ( ! empty( $_POST['first_name'] ) && ! empty( $_POST['patient_id'] ) ) {
		$data['first_name'] = $_POST['first_name'];
		$data['last_name']  = $_POST['last_name'];
		$data['patient_id'] = $_POST['patient_id'];
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
		$data['profile_pic']=$_POST['profile'];
		$temp               = isset( $_FILES['profile_pic'] ) ? $_FILES['profile_pic'] : null;
		$upload             = new omh\utils\Upload( null, $temp );
		$uploaded           = $upload->startUpload();
		if ( ! empty( $uploaded['name'] ) ) {
			$data['profile_pic'] = $uploaded['name'];
		}
		$db->editPatient( $data, $id );
	} else {
		$page->setHasError( true );
		$page->setPageError( 'Change a few things and try submitting again', 'Patient not saved', 'warning' );
	}
}

$page->setPageVars( $db->getPatientByID( $id ) );
$page->setPageContent( 'patient/edit.php' );
$page->makePage();