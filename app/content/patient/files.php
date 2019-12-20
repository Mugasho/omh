<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/27/2019
 * Time: 12:55 AM
 */

$id=$this->getPageVars2();
$db=new omh\database\DB();
$utils=new omh\utils\Utils();
if(isset($_FILES['upload_file'])) {
	$upload   = new omh\utils\Upload( null, $_FILES['upload_file'] );
	$uploaded = $upload->startUpload();
	if (!empty($uploaded['name'])) {
		$data['patient_id']=$id;
		$data['review_id']=$id;
		$data['file_name']=$uploaded['name'];
		$data['file_link'] =CONTENT_PATH . 'uploads/' ;
		$data['file_size']=$utils->formatBytes($uploaded['size'],1);
		$data['user_id']=$id;
		$db->addPatientFile($data);
	}
}

if ( isset( $_GET['file'], $_GET['status'] ) ) {
	$status = $_GET['status'];
	$db->unPublishFile( $_GET['file'], $status );
	$this->setPageError('File unpublished','success','success');
}

$files=$db->getPatientFiles($id);
?>
<div class="card">
	<div class="card-header bg-transparent header-elements-inline">
		<span class="text-uppercase font-size-sm font-weight-semibold">Attached files</span>
		<div class="header-elements">
			<div class="list-icons">
				<button class="btn btn-primary" data-toggle="modal" data-target="#add-file-modal"><i class="icon-file-plus"></i> New File</button>
			</div>
		</div>
	</div>

	<div class="card-body">
		<table class="table media-library">
			<thead>
			<tr>
				<th><input type="checkbox" class="form-input-styled"></th>
				<th>Preview</th>
				<th>Name</th>
				<th>Author</th>
				<th>Date</th>
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
				<td><a href="#">' . $filename . '</a>
				<ul class="list-inline list-inline-dotted list-inline-condensed font-size-sm text-muted">
							<li class="list-inline-item">Size: '.$file['file_size'].'</li>
					</ul>
				</td>
				<td><a href="user/'.$file['user_id'].'/">Admin</a></td>
				<td>' . date( "M d, Y", strtotime( $file['date_added'] ) ) . '</td>
			
				<td class="text-center">
					<div class="list-icons">
						<div class="list-icons-item dropdown">
							<a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
								<i class="icon-menu9"></i>
							</a>
	
							<div class="dropdown-menu dropdown-menu-right">
								<a href="' . $file['file_link'] . $filename . '" class="dropdown-item"><i class="icon-download"></i> Download</a>
								<a href="?visit='.$visit['id'].'&tab=files&file=' . $file['id'] . '&status=' . $status . '" class="dropdown-item"><i class="icon-eye-blocked"></i> Unpublish</a>
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
</div>

<div id="add-file-modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Files to  <?php echo $patient['first_name'].' '.$patient['last_name'];?></h5>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
					<input type="file" class="form-input-styled" name="upload_file" id="upload_file" data-fouc="">
					<span class="form-text text-muted">Accepted formats: doc, pdf, xlsx, png, jpg . Max file size 2Mb</span>

			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
				<button type="submit" class="btn bg-primary">Upload</button>
			</div>
			</form>
		</div>
	</div>
</div>