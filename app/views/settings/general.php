<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/5/2019
 * Time: 11:07 PM
 */

$page=new omh\template\Page('Settings');
$db=new \omh\database\DB();
$db->start_session();
$db->hasAccess();
if(isset($_GET['sidebar'])){
$db->updateOptions('sidebar',$_GET['sidebar']);
echo $db->getOptions('sidebar');
}