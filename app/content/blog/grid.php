<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/6/2019
 * Time: 1:38 PM
 */

$db    = new \omh\database\DB();
$utils = new \omh\utils\Utils();
$posts = $db->getAllPosts( 12 );
?>

<div class="row"><?php
	$col_count  = 1;
	$item_count = 0;

	foreach ( $posts as $post ) {

		echo '<div class="col-lg-4">';

		echo '<div class="card">
			<div class="card-body">';

		if ( ! empty( $post['blog_pic'] ) ) {
			echo '<div class="card-img-actions mb-3">
					<img class="card-img img-fluid" src="' . CONTENT_PATH . 'uploads/' . $post['blog_pic'] . '"  alt="">
					<div class="card-img-actions-overlay card-img">
						<a href="' . CONTENT_PATH . 'uploads/' . $post['blog_pic'] . '" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" 
						data-popup="lightbox">
							<i class="icon-link"></i>
						</a>
					</div>
				</div>';
		}
		echo '<h5 class="font-weight-semibold mb-1">
					<a href="#" class="text-default">' . $post['title'] . '</a>
				</h5>

				<ul class="list-inline list-inline-dotted text-muted mb-3">
					<li class="list-inline-item">By <a href="#" class="text-muted">Eugene</a></li>
					<li class="list-inline-item">' . date( "M d,Y", strtotime( $post['title'] ) ) . '</li>
				</ul>

				' . $utils->limitChars( $post['content'], 300 ) . '
			</div>

			<div class="card-footer d-flex">
				<a href="#" class="text-default"><i class="icon-heart6 text-pink mr-2"></i></a>
				<a href="?post=' . $post['id'] . '&action=trash" class="text-default"><i class="icon-bin text-blue mr-2"></i></a>
				<a href="#" class="ml-auto">Read more <i class="icon-arrow-right14 ml-2"></i></a>
			</div>
		</div>';
		echo '</div>';

	}
	?>


</div>
<script>
    $(window).load(function() {
        $('.post-module').hover(function() {
            $(this).find('.description').stop().animate({
                height: "toggle",
                opacity: "toggle"
            }, 300);
        });
    });
</script>
