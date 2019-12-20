<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/6/2019
 * Time: 2:54 PM
 */

$page=new \omh\template\Page('Add update');
$db=new \omh\database\DB();
$db->start_session();
$db->hasAccess('updates/add');
if (isset($_POST['title'], $_POST['content'],
	$_POST['author'], $_POST['status'],
	$_POST['date_added'], $_POST['category'])) {
	$post[0] = $_POST['title'];
	$post[1] = $_POST['content'];
	$post[2] = $_POST['author'];
	$post[3] = $_POST['status'];
	$upload = new \omh\utils\Upload(null, $_FILES['blog_pic']);
	$uploaded = $upload->startUpload();
	$post[4]='';
	if (!empty($uploaded['name'])) {
		$post[4] = $uploaded['name'];
	}
	$post[5] = $_POST['category'];
	$date_added=$_POST['date_added'];
	if (empty($date_added)) {
		$d = strtotime("now");
		$date_added = date("Y-m-d H:i:s", $d);
	}
	$post[6] = $date_added;
	$db->addPost($post) ? header('Location:' . BASE_PATH . 'updates/') : $page->setPageError('Please fill all fields', null, 'danger');
}
$page->setPageContent('blog/blog-add.php');
$page->makePage();