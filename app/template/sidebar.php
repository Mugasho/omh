<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/10/2019
 * Time: 11:54 AM
 */
?>

<!-- Main sidebar -->
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md d-print-none">

	<!-- Sidebar mobile toggler -->
	<div class="sidebar-mobile-toggler text-center">
		<a href="#" class="sidebar-mobile-main-toggle">
			<i class="icon-arrow-left8"></i>
		</a>
		Navigation
		<a href="#" class="sidebar-mobile-expand">
			<i class="icon-screen-full"></i>
			<i class="icon-screen-normal"></i>
		</a>
	</div>
	<!-- /sidebar mobile toggler -->


	<!-- Sidebar content -->
	<div class="sidebar-content">

		<!-- User menu -->
		<div class="sidebar-user">
			<div class="card-body">
				<div class="media">
					<div class="mr-3">
						<a href="#"><img src="../../../../global_assets/images/demo/users/face11.jpg" width="38" height="38" class="rounded-circle" alt=""></a>
					</div>

					<div class="media-body">
						<div class="media-title font-weight-semibold"><?php echo $_SESSION['username']?></div>
						<div class="font-size-xs opacity-50">
							<i class="icon-pin font-size-sm"></i> &nbsp;Kampala, UG
						</div>
					</div>

					<div class="ml-3 align-self-center">
						<a href="#" class="text-white"><i class="icon-cog3"></i></a>
					</div>
				</div>
			</div>
		</div>
		<!-- /user menu -->


		<!-- Main navigation -->
		<div class="card card-sidebar-mobile">
			<ul class="nav nav-sidebar" data-nav-type="accordion">

				<!-- Main -->

				<li class="nav-item-header">
					<div class="text-uppercase font-size-xs line-height-xs">Main</div>
					<i class="icon-menu" title="Main"></i></li>
				<?php
				foreach ( $this->getMenu() as $key => $value ) {
				    $active=$value['path']==explode("/",$_SERVER['REQUEST_URI'])[2]?' nav-item-expanded nav-item-open"':'';
					$href    = ! is_null( $value['items'] ) ? '#' : BASE_PATH . $value['path'];
					$classes = ! is_null( $value['items'] ) ? 'nav-item nav-item-submenu' : 'nav-item ';

					echo '<li class="' . $classes .$active. '">';
					echo '<a class="nav-link" href="' . $href . '">';
					if ( $value['icon'] != null ) {
						echo '<i class="' . $value['icon'] . '"></i>'.PHP_EOL;
					}
					echo '<span>' . $key . '</span></a>'.PHP_EOL;
					if ( ! is_null( $value['items'] ) ) {
						echo '<ul class="nav nav-group-sub" data-submenu-title="' . $key . '">'.PHP_EOL;
						foreach ( $value['items'] as $item => $item_value ) {
							echo '<li class="nav-item"> <a class="nav-link" href="' . BASE_PATH . $item_value . '">' .PHP_EOL. $item . '</a></li>';
						}
						echo '</ul>'.PHP_EOL;
					}
					echo '</li>'.PHP_EOL;
				}
				?>
			</ul>


		</div>
		<!-- /main navigation -->

	</div>
	<!-- /sidebar content -->

</div>
<!-- /main sidebar -->
