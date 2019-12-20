<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/12/2019
 * Time: 11:50 AM
 */

$invoice=new omh\template\Page('Invoice');
$db=new \omh\database\DB();
$db->start_session();
$db->hasAccess();
$invoice->setHasHeader(false);
//$invoice->setHasSidebar(false);
//$invoice->setHasNavbar(false);
//$invoice->setHasFooter(false);
$invoice->setPageContent('invoice/print.php');
$invoice->makePage();