<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/10/2019
 * Time: 12:24 PM
 */

$page = new omh\template\Page( 'Expenses' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess();
$page->setPageContent( 'expenses/data.php' );
$page->makePage();