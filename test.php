<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/10/2019
 * Time: 12:47 PM
 */

$test=new omh\template\Page('test');
$test->addScripts( 'widgets.min.js', CONTENT_PATH . 'global_assets/js/plugins/extensions/jquery_ui/' );
$test->addScripts( 'datatables.min.js', CONTENT_PATH . 'global_assets/js/plugins/tables/datatables/' );
$test->addScripts( 'natural_sort.js', CONTENT_PATH . 'global_assets/js/plugins/tables/datatables/extensions/' );
$test->addScripts( 'select2.min.js', CONTENT_PATH . 'global_assets/js/plugins/forms/selects/' );
$test->addScripts( 'task_manager_list.js', CONTENT_PATH . 'global_assets/js/demo_pages/' );
$test->makePage();