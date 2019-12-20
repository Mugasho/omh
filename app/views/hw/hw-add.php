<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/4/2019
 * Time: 12:03 AM
 */

$page=new omh\template\Page('Add Health worker');
$db=new omh\database\DB();
$db->start_session();
$db->hasAccess();

if (isset($_POST['surname'],$_POST['first_name'],$_POST['other_names'], $_POST['title'], $_POST['phone'],
	$_POST['email'], $_POST['address'], $_POST['reg_no'],$_POST['nationality'])) {

    $email=filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
	$hw[0] = filter_input(INPUT_POST,'surname',FILTER_SANITIZE_STRIPPED);
	$hw[1] = filter_input(INPUT_POST,'first_name',FILTER_SANITIZE_STRIPPED);
	$hw[2] = filter_input(INPUT_POST,'other_names',FILTER_SANITIZE_STRIPPED);
	$hw[3] = $_POST['title'];
	$hw[4] = $_POST['phone'];
	$hw[5] = $email;
	$hw[6] = $_POST['address'];
	$hw[7] = $_POST['reg_no'];
	$hw[8] = $_POST['nationality'];
	$username=$hw[0].' '.$hw[1];
	$password=filter_input(INPUT_POST,'password',FILTER_SANITIZE_SPECIAL_CHARS);
	$temp=isset($_FILES['profile_pic'])?$_FILES['profile_pic']:null;
	$upload = new omh\utils\Upload(null, $temp);
	$uploaded = $upload->startUpload();
	if (!empty($uploaded['name'])) {
		$hw[9] = $uploaded['name'];
	}

	if(!empty($email) && !empty($username) && !empty($password)){
        try {
            $db->storeUser($username, $email, $password);
            $page->setPageError('Login saved','Success','success');
        } catch (Exception $e) {
            $page->setPageError('Login Not saved','warning','info');
        }
    }
	$return_path = isset( $_GET['return'] ) ? BASE_PATH . str_replace( " ", "/", $_GET['return'] ) . '/' : BASE_PATH . 'hw/';
	$db->addhW($hw) ? header('Location:' . $return_path) : $page->setPageError(' hw not saved', 'Error', 'warning');
}
$page->setPageContent('hw/hw-add.php');
$page->makePage();