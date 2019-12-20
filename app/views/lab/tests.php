<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 12/5/2019
 * Time: 11:30 PM
 */
$page = new omh\template\Page( 'Tests' );
$db   = new omh\database\DB();
$db->start_session();
$db->hasAccess();
$page->setPageContent( 'lab/tests.php' );
$page->makePage();