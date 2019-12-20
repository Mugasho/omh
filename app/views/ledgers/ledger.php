<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/10/2019
 * Time: 1:11 PM
 */

$page = new omh\template\Page( 'Ledgers' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess();

$page->setPageContent('ledgers/data.php' );
$page->makePage();