<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/12/2019
 * Time: 8:40 PM
 */

$invoice=new omh\template\Page('Invoices');
$db=new \omh\database\DB();
$db->start_session();
$db->hasAccess();
$invoice->setPageContent('invoice/data.php');
$invoice->makePage();