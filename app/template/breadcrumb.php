<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/10/2019
 * Time: 12:05 PM
 */

$routes=explode("/",$_SERVER['REQUEST_URI']);
?>

<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline d-print-none">
	<div class="d-flex">
		<div class="breadcrumb"><?php
			echo '<a href="'.BASE_PATH.'" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>';
			for($i=2;$i<count($routes)-1;$i++){
				if($i != count($routes) - 2) {
					echo '<a class="breadcrumb-item" href="' . BASE_PATH . $routes[$i] . '/">' . $routes[$i] . '</a>';
				} else {
					echo '<span class="breadcrumb-item active">' . $routes[$i] . '</span>';
				}
			}
			?>

		</div>

		<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
	</div>

	<div class="header-elements d-none">
		<div class="breadcrumb justify-content-center">
			<a href="#" class="breadcrumb-elements-item">
				<i class="icon-comment-discussion mr-2"></i>
				Support
			</a>

            <a href="#" onclick="window.print()" class="breadcrumb-elements-item">
                <i class="icon-printer2 mr-2"></i>
                Print page
            </a>
		</div>
	</div>
</div>

