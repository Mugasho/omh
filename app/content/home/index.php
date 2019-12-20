<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/10/2019
 * Time: 12:11 PM
 */

$db=new omh\database\DB();
$utils = new \omh\utils\Utils();
$patients=$db->getPatients(5);
$posts = $db->getAllPosts( 3 );
?>

<div class="row">
    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-purple-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0"><?php echo $db->count_patients()?></h3>
                    <span class="text-uppercase font-size-xs">Patients</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-accessibility2 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-blue-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0"><?php echo $db->count_HW()?></h3>
                    <span class="text-uppercase font-size-xs">Health Workers</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-people icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-success-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0"><?php echo $db->count_HW()?></h3>
                    <span class="text-uppercase font-size-xs">Appointments</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-calendar2 icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card card-body bg-danger-400 has-bg-image">
            <div class="media">
                <div class="media-body">
                    <h3 class="mb-0"><?php echo count($posts)?></h3>
                    <span class="text-uppercase font-size-xs">Messages</span>
                </div>

                <div class="ml-3 align-self-center">
                    <i class="icon-comment-discussion icon-3x opacity-75"></i>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Task manager table -->
<div class="card">
	<div class="card-header bg-transparent header-elements-inline">
		<h6 class="card-title">Latest Patients (<?php echo count($patients);?>)</h6>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
				<a class="list-icons-item" data-action="reload"></a>
				<a class="list-icons-item" data-action="remove"></a>
			</div>
		</div>
	</div>

	<table class="table">
		<thead>
		<tr>
			<th>#</th>
			<th>Added</th>
			<th>Patient Name</th>
			<th>sex</th>
			<th>Address</th>
			<th>Assigned doctor</th>
			<th class="text-center text-muted" style="width: 30px;"><i class="icon-checkmark3"></i></th>
		</tr>
		</thead>
		<tbody>
		<?php if ( ! empty( $patients ) ) {
			foreach ($patients as $patient){
				echo '<tr>
				     <td class="table-inbox-image">';
            if(!empty($patient['profile_pic'])){
            echo '<img src="'.CONTENT_PATH . 'uploads/' . $patient['profile_pic'].'" height="38" width="38" class="rounded-circle">';
            }else {
            echo '

            <span class="btn bg-pink-400 rounded-circle btn-icon btn-sm" >
                    <span class="letter-icon" > '.substr($patient['first_name'],0,1).' </span >
                </span >';
            }
            echo '
        </td>
				<td>'.date( "Y-m-d", strtotime( $patient['date_added']) ).'</td>
				<td>
					<div class="font-weight-semibold"><a href="patients/view/'.$patient['id'].'/">'.$patient['first_name'].' '.$patient['last_name'].'</a></div>
					
				</td>
				<td>'.$patient['sex'].'</td>
				<td>
					<div class="text-muted">'.$patient['address'].' '.$patient['city'].' '.$patient['division'].'</div>
				</td>
				<td>
					<a href="#"><img src="'.CONTENT_PATH.'images/users/user.png" class="rounded-circle" width="32" height="32" alt=""></a>
					<a href="#"><img src="../../../../global_assets/images/demo/users/face25.jpg" class="rounded-circle" width="32" height="32" alt=""></a>
					<a href="#" class="btn btn-icon bg-transparent btn-sm border-slate-300 text-slate rounded-round border-dashed"><i class="icon-plus22"></i></a>
				</td>
				<td class="text-center">
					<div class="list-icons">
						<div class="list-icons-item dropdown">
							<a href="#" class="list-icons-item dropdown-toggle caret-0" data-toggle="dropdown"><i class="icon-menu9"></i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-alarm-add"></i> Check in</a>
								<a href="#" class="dropdown-item"><i class="icon-attachment"></i> Attach Document</a>
								<a href="#" class="dropdown-item"><i class="icon-rotate-ccw2"></i> Reassign</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item"><i class="icon-pencil7"></i> Edit Patient</a>
								<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
							</div>
							</li>
						</div>
				</td>
			</tr>';
			}
		} ?>

		</tbody>
	</table>
</div>
<!-- /task manager table -->

<div class="row"><?php
	$col_count  = 1;
	$item_count = 0;

	if ( ! empty( $posts ) ) {
		foreach ( $posts as $post ) {

			echo '<div class="col-lg-4">';

			echo '<div class="card">
				<div class="card-body">';

/*			if ( ! empty( $post['blog_pic'] ) ) {
				echo '<div class="card-img-actions mb-3">
						<img class="card-img img-fluid" src="' . CONTENT_PATH . 'uploads/' . $post['blog_pic'] . '"  alt="">
						<div class="card-img-actions-overlay card-img">
							<a href="blog_single.html" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
								<i class="icon-link"></i>
							</a>
						</div>
					</div>';
			}*/
			echo '<h5 class="font-weight-semibold mb-1">
						<a href="updates/" class="text-default">' . $post['title'] . '</a>
					</h5>
	
					<ul class="list-inline list-inline-dotted text-muted mb-3">
						<li class="list-inline-item">By <a href="#" class="text-muted">Eugene</a></li>
						<li class="list-inline-item">' . date( "M d,Y", strtotime( $post['title'] ) ) . '</li>
					</ul>
	
					' . $utils->limitChars( $post['content'], 300 ) . '
				</div>
	
				<div class="card-footer d-flex">
					<a href="#" class="text-default"><i class="icon-heart6 text-pink mr-2"></i> 29</a>
					<a href="updates/" class="ml-auto">Read more <i class="icon-arrow-right14 ml-2"></i></a>
				</div>
			</div>';
			echo '</div>';

		}
	}
	?>

