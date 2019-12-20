<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/17/2019
 * Time: 12:06 PM
 */

$page=new omh\template\Page('Patients Detail');
$db=new omh\database\DB();
$db->start_session();
$db->hasAccess();
$id=$match['params']['id'];

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
		$page->setPageError( 'Your changes were saved', 'Patient updated', 'success' );
	} else {
		$page->setHasError( true );
		$page->setPageError( 'Change a few things and try submitting again', 'Patient not saved', 'warning' );
	}
}

if(isset($_POST['category'],$_POST['visit_no'],$_POST['department'],$_POST['doctor'])){

	$data['category']=$_POST['category'];
	$data['patient_id']=$id;
	$data['visit_no']=$_POST['visit_no'];
	$data['department']=$_POST['department'];
	$data['doctor']=$_POST['doctor'];
	$data['care']=isset($_POST['care'])?$_POST['care']:'';
	if($db->addVisit($data)){
		$page->setHasError( true );
		$page->setPageError( 'Visit saved', 'Success', 'success' );
	};
}



if(isset($_POST['lab_request'],$_POST['specimen'],$_POST['department_id'],$_POST['test'],$_POST['request_notes'])){

	$data=$_POST;
	$data['patient_id']=$id;
	$data['visit_id']=$_GET['visit'];
	if($db->addLabRequest($data)){
		$page->setHasError( true );
		$page->setPageError( 'Lab Request saved', 'Success', 'success' );
	};
}

if(isset($_POST['notes'],$_POST['add-note'])){

	$data=$_POST;
	$data['patient_id']=$id;
	$data['visit_id']=$_GET['visit'];
	$data['notes']=$_POST['notes'];
	if($db->addPatientNotes($data)){
		$page->setHasError( true );
		$page->setPageError( 'Note saved', 'Success', 'success' );
	};
}

if(isset($_GET['r'])&& $_GET['tab']=='notes'){
	$note_id=$_GET['r'];
	if($db->deletePatientNote($note_id)){
		$page->setHasError( true );
		$page->setPageError( 'Note Deleted', 'Success', 'success' );
	}

}

if(isset($_POST['edit-note'],$_POST['notes'])){
	$data['note_id']=$_POST['edit-note'];
	$data['notes']=$_POST['notes'];
	if($db->updatePatientNote($data)){
		$page->setHasError( true );
		$page->setPageError( 'Note Updated', 'Success', 'success' );
	}

}


if ( isset($_POST['drug_id'],$_POST['qty'],$_POST['type'],$_POST['times'],$_POST['days'],$_POST['period'] ) ) {
	if ( ! empty( $_POST['drug_id'] ) ) {
		$drug         = $_POST;
			$drug['patient_id'] = $id;
			$drug['visit_id'] = $_GET['visit'];

			$db->addPrescription( $drug );
	} else {
		$page->setHasError( true );
		$page->setPageError( 'Change a few things and try  again', 'Asset not saved', 'warning' );
	}
}
$page->setHasBreadcrumbNav(true);
$patient=$db->getPatientByID($id);
$page->setPageTitle($patient['first_name'].' '.$patient['last_name']);
$page->setPageVars($patient);
$page->setPageVars2($id);
$page->setPageContent('patient/detail.php');
$page->makePage();