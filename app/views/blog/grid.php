<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/6/2019
 * Time: 1:41 PM
 */
$page=new \omh\template\Page('Blog');
$db=new \omh\database\DB();
$db->start_session();
$db->hasAccess('updates');
$page->setPageContent('blog/grid.php');
$page->makePage();