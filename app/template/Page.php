<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/8/2019
 * Time: 12:12 PM
 */

namespace omh\template;

use omh\database\DB;

class Page extends Master {

	/**
	 * Page constructor.
	 *
	 * @param $pageTitle
	 */
	public function __construct( $pageTitle ) {
		$db = new DB();
		$this->setCompany( $db->getOptions( 'company' ) );
		$this->setCompany( $db->getOptions( 'company' ) );
		$this->setSidebarClass( $db->getOptions( 'sidebar' ) );
		$this->setDateFounded( $db->getOptions( 'founded' ) );
		$this->setPageTitle( $pageTitle );
		$this->setMetaAuthor( 'Lincoln' );
		$this->setMetaDescription( 'Hospital' );
		$this->setMetaViewport( 'width=device-width, initial-scale=1, shrink-to-fit=no' );
		$this->setMetaKeywords( 'Health,management,application' );

		$this->addStyle( ' ', CONTENT_PATH . 'global_assets/css/fonts/roboto/roboto.css?family=Roboto:400,300,100,500,700,900' );
		$this->addStyle( 'icomoon/styles.min.css', CONTENT_PATH . 'global_assets/css/icons/' );
		$this->addStyle( 'bootstrap.min.css', CONTENT_PATH . 'a/b/c/d/assets/css/' );
		$this->addStyle( 'bootstrap_limitless.min.css', CONTENT_PATH . 'a/b/c/d/assets/css/' );
		$this->addStyle( 'layout.min.css', CONTENT_PATH . 'a/b/c/d/assets/css/' );
		$this->addStyle( 'components.min.css', CONTENT_PATH . 'a/b/c/d/assets/css/' );
		$this->addStyle( 'colors.min.css', CONTENT_PATH . 'a/b/c/d/assets/css/' );


		$this->addScripts( 'jquery.min.js', CONTENT_PATH . 'global_assets/js/main/' );
		$this->addScripts( 'bootstrap.bundle.min.js', CONTENT_PATH . 'global_assets/js/main/' );
		$this->addScripts( 'blockui.min.js', CONTENT_PATH . 'global_assets/js/plugins/loaders/' );

		$this->addScripts( 'widgets.min.js', CONTENT_PATH . 'global_assets/js/plugins/extensions/jquery_ui/' );
		$this->addScripts( 'select2.min.js', CONTENT_PATH . 'global_assets/js/plugins/forms/selects/' );
		$this->addScripts( 'uniform.min.js', CONTENT_PATH . 'global_assets/js/plugins/forms/styling/' );
		$this->addScripts( 'fancybox.min.js', CONTENT_PATH . 'global_assets/js/plugins/media/' );
		$this->addScripts( 'switchery.min.js', CONTENT_PATH . 'global_assets/js/plugins/forms/styling/' );
		$this->addScripts( 'pnotify.min.js', CONTENT_PATH . 'global_assets/js/plugins/notifications/' );
		$this->addScripts( 'datatables.min.js', CONTENT_PATH . 'global_assets/js/plugins/tables/datatables/' );
		$this->addScripts( 'picker.js', CONTENT_PATH . 'global_assets/js/plugins/pickers/pickadate/' );
		$this->addScripts( 'picker.date.js', CONTENT_PATH . 'global_assets/js/plugins/pickers/pickadate/' );
		$this->addScripts( 'picker.time.js', CONTENT_PATH . 'global_assets/js/plugins/pickers/pickadate/' );
		$this->addScripts( 'jquery.repeater.min.js', CONTENT_PATH . 'global_assets/js/plugins/forms/utils/' );
		$this->addScripts( 'typeahead.bundle.min.js', CONTENT_PATH . 'global_assets/js/plugins/forms/inputs/' );
        $this->addScripts( 'session_timeout.min.js', CONTENT_PATH . 'global_assets/js/plugins/extensions/' );
		$this->addScripts( 'app.js', CONTENT_PATH . 'a/b/c/d/assets/js/' );
		$this->addScripts( 'custom.js', CONTENT_PATH . 'a/b/c/d/assets/js/' );
		$this->addScripts( 'pages.js', CONTENT_PATH . 'a/b/c/d/assets/js/' );


		$this->addMenu( 'Home', '', 'icon-home4', null );
		$this->addMenu( 'Patients', 'patients', 'icon-accessibility2', array(
			'Add new'    => 'patients/add/',
			'Patients'   => 'patients/',
			'Outpatient' => 'patients/outpatient/',
			'Inpatient'  => 'patients/inpatient/',
			'Discharges' => 'patients/discharge/'
		) );

		$this->addMenu( 'News & updates', 'updates', 'icon-book', array(
			'Add New' => 'updates/add/',
			'Updates' => 'updates/',
			'Mail'   => 'updates/mail/'
		) );

		$this->addMenu( 'Health workers', 'hw', 'icon-briefcase', array(
			'Add new'        => 'hw/add/',
			'Health workers' => 'hw/',
			'Departments' => 'hw/departments/',
		) );
		$this->addMenu( 'Pharmacy', 'drugs', 'icon-aid-kit', array(
			'Add New'         => 'drugs/add/',
			'Drugs'         => 'drugs/',
			'Prescriptions' => 'drugs/prescriptions/',
			'Ledgers'         => 'drugs/ledgers/'
		) );
		$this->addMenu( 'Laboratory', 'lab', 'icon-lab', array(
			'laboratory' => 'lab/',
			'Requests'   => 'lab/requests/'
		) );
		$this->addMenu( 'Ledgers', 'ledgers', 'icon-stack-text', array(
			'Add new'      => 'ledgers/add/',
			'Ledgers'      => 'ledgers/',
			'Ledger Fees' => 'ledgers/fees/'
		) );
		$this->addMenu( 'Expenses', 'expenses', 'icon-cart2', array(
			'Add New'       => 'expenses/add/',
			'Expenses'      => 'expenses/',
			'Expense Types' => 'expenses/types/'
		) );

		$this->addMenu( 'Assets', 'assets', 'icon-folder', array(
			'Add New'     => 'assets/add/',
			'Assets'      => 'assets/',
			'Asset Types' => 'assets/types/'
		) );

		$this->addMenu( 'Payroll', 'payroll', 'icon-gift', array(
			'Payments' => 'blog/add/',
			'Income'   => 'blog/',
			'Expenses' => 'blog/categories/'
		) );

		$this->addMenu( 'Media Library', 'library', 'icon-presentation', array(
			'Media List' => 'library/',
			'Add media'  => 'library/add/'
		) );

		$this->addMenu( 'Reports', 'reports', 'icon-file-stats', array(
			'Invoice'     => 'reports/invoice/',
			'Treatment' => 'blog/',
			'Stock'     => 'blog/categories/'
		) );

		$this->addMenu( 'Users', 'users', 'icon-user', array(
			'All Users'  => 'users/',
			'Add New'    => 'users/add/',
			'User Roles' => 'users/roles/'
		) );
		$this->addMenu( 'Settings', 'settings', 'icon-wrench', array(
			'General'     => 'general/',
			'Appearance'  => 'appearance//',
			'Import'      => 'import/',
			'Export'      => 'export/'
		) );


		$this->setCopyright( 'Copyright © 2019 VIMS All rights reserved.' );
	}

	/**
	 *Render the page in browser
	 */
	public function makePage() {
		echo '<!DOCTYPE html>
<html lang="en">
<head>';

		$this->makeMeta();
		$this->setTitle();
		$this->makeStyles();
		$this->makeScripts();

		echo '</head>
		<body class="' . $this->getSidebarClass() . '">';

		if ( $this->hasNavbar ) {
			require_once 'navbar.php';
		}
		/*--/page content---*/
		echo '<div class="page-content">';

		if ( $this->hasSidebar ) {
			require_once 'sidebar.php';
		}
		//--main content---
		echo '<div class="content-wrapper">';
		//--page header---
		if ( $this->hasHeader ) {
			echo '<div class="page-header page-header-light">';
			require_once 'header.php';
			if ( $this->isHasBreadcrumbNav() ) {
				$this->setHasBreadcrumb( false );
				require_once 'breadcrumb-nav.php';
			}
			if ( $this->hasBreadcrumb ) {
				require_once 'breadcrumb.php';
			}
			echo '</div>';
		}

		echo '<div class="content">';
		if ( $this->ishasError() ) {
			$this->showPageError();
		}

		if ( $this->isHasContent() ) {
			$this->addPageContent( $this->getPageContent() );
		}
		echo '</div>';
		/*--/footer---*/
		if ( $this->hasFooter ) {
			require_once 'footer.php';
		}

		echo '</div>';
		/*--/main content---*/

		echo '</div>';
		/*--/page content---*/

		echo '</body>
</html>';
	}

}