<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/31/2019
 * Time: 3:52 PM
 */

$page =new omh\template\Page('Expense Types');
$db=new omh\database\DB();
$db->start_session();
$db->hasAccess();
if(isset($_POST['expense_type'],$_POST['expense_description'],$_POST['add'])){
	if($db->addExpenseType($_POST)){
		$page->setPageError('Expense Added','Success','success');
	}

}

if(isset($_POST['expense_type'],$_POST['expense_description'],$_POST['edit'])){
	if($db->updateExpenseType($_POST)){
		$page->setPageError('Expense updated','Success','success');
	}

}
if(isset($_GET['r'])){
	$rid=$_GET['r'];
	if ( ! empty( $rid ) ) {
		$db->deleteExpenseType($rid);
	}$page->setPageError('Expense Removed','Success','info');
}
$page->addScripts( 'natural_sort.js', CONTENT_PATH . 'global_assets/js/plugins/tables/datatables/extensions/' );
$page->addScripts( 'task_manager_list.js', CONTENT_PATH . 'global_assets/js/demo_pages/' );
$page->setPageContent('expenses/types.php');
$page->makePage();