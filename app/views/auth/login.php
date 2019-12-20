<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/1/2019
 * Time: 2:26 PM
 */

$page =new omh\template\Page('Login');

$db=new omh\database\DB();
$db->start_session();
//$db->storeUser('john','mugalink2@gmail.com','0751553336','mlinksgo6262');
if (isset($_POST['email'], $_POST['password'])) {
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRIPPED);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRIPPED);
	if ($db->getUserByEmailAndPassword($email, $password) != null) {
		$return_path = isset( $_GET['return'] ) ? BASE_PATH . str_replace( " ", "/", $_GET['return'] ) . '/' : BASE_PATH ;
		header('Location:' . $return_path);
	} else {
		$page->setPageError(' Wrong email or password', 'Login Failed', 'danger');
	}
}
$page->setHasNavbar(false);
$page->setHasHeader(false);
$page->setHasSidebar(false);
$page->setHasFooter(false);
$page->setPageContent('auth/login.php');
$page->makePage();