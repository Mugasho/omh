<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/7/2019
 * Time: 4:12 PM
 */

$page = new omh\template\Page( 'User Roles' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess();
$page->setPageContent('users/roles.php');
$page->makePage();