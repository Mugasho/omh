<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/3/2019
 * Time: 4:32 PM
 */

$page = new omh\template\Page( 'Users' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess('users');
if(isset($_GET['r'])){
    $id=filter_input(INPUT_POST,'r',FILTER_SANITIZE_NUMBER_INT);
    if($db->deleteUser($id))$page->setPageError('User deleted','success','success');

}
$page->setPageContent('users/data.php');
$page->makePage();