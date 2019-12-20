<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/30/2019
 * Time: 4:44 AM
 */

$page=new omh\template\Page('Add Drug');
$db=new omh\database\DB();
$db->start_session();
$db->hasAccess('drugs/add');

if (isset($_POST['nda_registration_no'], $_POST['license_holder'],
	$_POST['local_technical_representative'], $_POST['name_of_drug'],
	$_POST['generic_name_of_drug'], $_POST['strength_of_drug'],
	$_POST['manufacturer'], $_POST['country_of_manufacture'], $_POST['dosage_form'], $_POST['pack_size'])) {
	$drug[0] = $_POST['nda_registration_no'];
	$drug[1] = $_POST['license_holder'];
	$drug[2] = $_POST['local_technical_representative'];
	$drug[3] = $_POST['name_of_drug'];
	$drug[4] = $_POST['generic_name_of_drug'];
	$drug[5] = $_POST['strength_of_drug'];
	$drug[6] = $_POST['manufacturer'];
	$drug[7] = $_POST['country_of_manufacture'];
	$drug[8] = $_POST['dosage_form'];
	$drug[9] = $_POST['pack_size'];
	$db->addDrug($drug) ? header('Location:' . BASE_PATH . 'drugs/') : $page->setPageError('Please fill all fields', null, 'danger');
}

$page->setPageContent('drugs/add.php');
$page->makePage();