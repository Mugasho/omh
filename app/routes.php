<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/11/2019
 * Time: 7:53 AM
 */

header("Content-Type: text/html");
$router = new AltoRouter();
$router->setBasePath('/app/');

// Main routes that non-customers see
$router->map('GET|POST','', 'views/dashboard/index.php', 'home');
$router->map('GET|POST','login/', 'views/auth/login.php', 'login');
$router->map('GET|POST','register/', 'views/auth/register.php', 'register');
$router->map('GET','logout/', 'views/auth/logout.php', 'logout');

$router->map('GET','assets/', 'views/assets/data.php', 'assets');
$router->map('GET|POST','assets/add/', 'views/assets/add.php', 'assets-add');
$router->map('GET|POST','assets/edit/[*:id]/', 'views/assets/edit.php', 'assets-edit');
$router->map('GET|POST','assets/view/[*:id]/', 'views/assets/edit.php', 'view-edit');
$router->map('GET|POST','assets/types/', 'views/assets/asset_types.php', 'assets-type');

$router->map('GET','expenses/', 'views/expenses/data.php', 'expenses');
$router->map('GET|POST','expenses/add/', 'views/expenses/add.php', 'expenses-add');
$router->map('GET|POST','expenses/edit/[*:id]/', 'views/expenses/edit.php', 'expenses-edit');
$router->map('GET|POST','expenses/types/', 'views/expenses/expense_types.php', 'expenses-type');

$router->map('GET|POST','settings/', 'views/settings/general.php', 'settings-general');
$router->map('GET|POST','settings/departments/', 'views/settings/department.php', 'departments');

$router->map('GET|POST','users/', 'views/users/data.php', 'users');
$router->map('GET','users/roles/', 'views/users/roles.php', 'users-roles');

$router->map('GET|POST','hw/', 'views/hw/data.php', 'hw');
$router->map('GET|POST','hw/add/', 'views/hw/hw-add.php', 'hw-add');
$router->map('GET|POST','hw/departments/', 'views/hw/department.php', 'hw-departments');

$router->map('GET|POST','ledgers/', 'views/ledgers/ledger.php', 'ledger');
$router->map('GET|POST','ledgers/add/', 'views/ledgers/ledger-add.php', 'ledger-add');
$router->map('GET|POST','ledgers/fees/', 'views/ledgers/fees.php', 'ledger-fees');
$router->map('GET|POST','ledgers/edit/[*:id]/', 'views/ledgers/edit.php', 'ledger-edit');
$router->map('GET|POST','ledgers/[*:id]/', 'views/ledgers/detail.php', 'ledger-detail');

$router->map('GET|POST','lab/requests/', 'views/lab/requests.php', 'lab-requests');
$router->map('GET|POST','lab/tests/', 'views/lab/tests.php', 'lab-tests');

$router->map('GET|POST','drugs/', 'views/drugs/data.php', 'drugs');
$router->map('GET|POST','drugs/add/', 'views/drugs/add.php', 'add-drugs');
$router->map('GET|POST','drugs/api/', 'views/drugs/api.php', 'api-drugs');
$router->map('GET|POST','drugs/ledgers/', 'views/drugs/drug-ledgers.php', 'drug-ledgers');
$router->map('GET|POST','drugs/ledgers/add/', 'views/drugs/add-ledger.php', 'add-drug-ledger');
$router->map('GET|POST','drugs/ledgers/[*:id]/', 'views/drugs/ledger-detail.php', 'drug-ledger-detail');


$router->map('GET','updates/', 'views/blog/grid.php', 'blog');
$router->map('GET|POST','updates/add/', 'views/blog/add.php', 'blog-add');
$router->map('GET','updates/mail/', 'views/blog/mail.php', 'blog-mail');

$router->map('GET','patients/', 'views/patient/index.php', 'patients');
$router->map('GET|POST','patients/add/', 'views/patient/add.php', 'patients-add');
$router->map('GET|POST','patients/edit/[*:id]/', 'views/patient/edit.php', 'patients-edit');
$router->map('GET|POST','patients/view/[*:id]/', 'views/patient/detail.php', 'patients-view');
$router->map('GET|POST','patients/view/[*:id]/visit/[*:visit_id]/', 'views/patient/detail.php', 'patients-visit');

$router->map('GET','patients/inpatient/', 'views/patient/add.php', 'patients-ip');
$router->map('GET','patients/outpatient/', 'views/patient/add.php', 'patients-op');
$router->map('GET','patients/trash/[*:id]', 'views/patient/add.php', 'patients-trash');
$router->map('GET','library/', 'views/media/index.php', 'media-view');

$router->map('GET','reports/invoice/', 'views/invoice/index.php', 'invoices');
$router->map('GET','reports/invoice/[*:id]/', 'views/invoice/print.php', 'invoice-print');


$router->map('GET|POST','admin/drugs/add/', 'admin/views/drugs/add.php', 'add-drug');
$router->map('GET|POST','admin/drugs/detail/[*:id]/', 'admin/views/drugs/detail.php', 'drug-detail');

/* Match the current request */
$match = $router->match();
if($match) {
	require $match['target'];
}
else {
	header("HTTP/1.0 404 Not Found");
	require 'utils/404.php';
}