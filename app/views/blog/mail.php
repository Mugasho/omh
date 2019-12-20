<?php
/**
 * Created by PhpStorm.
 * User: lincoln
 * Date: 12/9/19
 * Time: 10:23 AM
 */

$page=new \omh\template\Page('Mail');
$db=new \omh\database\DB();
$db->start_session();
$db->hasAccess('updates/mail');
$page->addScripts( 'rowlink.js', CONTENT_PATH . 'global_assets/js/plugins/extensions/' );
$page->setPageContent('blog/mail.php');
$page->makePage();