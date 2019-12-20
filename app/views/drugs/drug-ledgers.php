<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 12/4/2019
 * Time: 3:25 PM
 */

$page = new omh\template\Page( 'Drug Ledgers' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess('drugs/ledgers');

$page->setPageContent('drugs/ledgers.php' );
$page->makePage();