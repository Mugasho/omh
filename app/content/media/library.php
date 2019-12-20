<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/18/2019
 * Time: 4:56 PM
 */

$db    = new omh\database\DB();
$files = $db->getAllFiles();
$utils = new omh\utils\Utils();
if ( isset( $_GET['file'], $_GET['status'] ) ) {
	$status = $_GET['status'];
	$db->unPublishFile( $_GET['file'], $status );
	$this->setPageError('File unpublished','success','success');
}

if ( isset( $_GET['media'], $_GET['action'] ) ) {
	if ( $_GET['action'] == 'delete' ) {
		$db->deleteFile( $_GET['media']);
		$this->setPageError('File deleted','success','success');
	}
}
?>


<!-- Media library -->
<div class="card">
    <div class="card-header bg-white header-elements-inline">
        <h6 class="card-title">Media library</h6>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table table-striped media-library">
        <thead>
        <tr>
            <th><input type="checkbox" class="form-input-styled"></th>
            <th>Preview</th>
            <th>Name</th>
            <th>Author</th>
            <th>Date</th>
            <th>File info</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
		<?php
		if ( ! empty( $files ) ) {
			foreach ( $files as $file ) {

				$status    = $file['status'] == '1' ? '0' : '1';
				$filename  = $file['file_name'];
				$extension = $utils->get_extension( $file['file_link'] . $filename );
				echo '<tr>
				<td><input type="checkbox" class="form-input-styled"></td>
				<td>
					<a href="' . $file['file_link'] . $filename . '" data-popup="lightbox">
						' . $utils->get_image_icon( $file['file_link'] . $filename ) . '
					</a>
				</td>
				<td><a href="#">' . $filename . '</a></td>
				<td><a href="user/'.$file['user_id'].'/">Admin</a></td>
				<td>' . date( "M d, Y", strtotime( $file['date_added'] ) ) . '</td>
				<td>
					<ul class="list-unstyled mb-0">
						<li><span class="font-weight-semibold">Size:</span> ' . $file['file_size'] . '</li>
						<li><span class="font-weight-semibold">Format:</span> .' . $extension . '</li>
					</ul>
				</td>
				<td class="text-center">
					<div class="list-icons">
						<div class="list-icons-item dropdown">
							<a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
	
							<div class="dropdown-menu dropdown-menu-right">
								<a href="' . $file['file_link'] . $filename . '" class="dropdown-item"><i class="icon-download"></i> Download file</a>
								<a href="?file=' . $file['id'] . '&status=' . $status . '" class="dropdown-item"><i class="icon-eye-blocked"></i> Unpublish</a>
								<div class="dropdown-divider"></div>
								<a href="#" class="dropdown-item"><i class="icon-bin"></i> Move to trash</a>
							</div>
						</div>
					</div>
				</td>
			</tr>';
			}
		} ?>

        </tbody>
    </table>
</div>
<!-- /media library -->
<script>

</script>
