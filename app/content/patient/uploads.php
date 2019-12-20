<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/18/2019
 * Time: 11:40 AM
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

$files=$db->getPatientFiles($id);
?>
<div class="card">
	<div class="card-header bg-transparent header-elements-inline">
		<span class="text-uppercase font-size-sm font-weight-semibold">Attached files</span>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
			</div>
		</div>
	</div>

	<div class="card-body">
		<ul class="media-list">
			<?php if ( ! empty( $files ) ) {
				foreach ($files as $file){
					$filename=$file['file_name'];
					$extension=strtolower(pathinfo($file['file_link'].$filename,PATHINFO_EXTENSION));
					echo '<li class="media">
					<div class="mr-3 align-self-center">
						'.$utils->get_image_icon( $file['file_link'] . $filename ).'
					</div>
	
					<div class="media-body">
						<div class="font-weight-semibold">'.$filename.'</div>
						<ul class="list-inline list-inline-dotted list-inline-condensed font-size-sm text-muted">
							<li class="list-inline-item">Size: '.$file['file_size'].'</li>
							<li class="list-inline-item">By <a href="'.BASE_PATH.'users/'.$file['user_id'].'/">'.$file['user_id'].'</a></li>
						</ul>
					</div>
	
					<div class="ml-3">
						<div class="list-icons">
							<a href="'.$file['file_link'].$filename.'" class="list-icons-item"><i class="icon-file-eye"></i></a>
						</div>
					</div>
				</li>';
				}
			} ?>

			<li class="media">
				<form method="post" enctype="multipart/form-data">
					<input type="file" class="form-input-styled" name="upload_file" id="upload_file" data-fouc="">
					<span class="form-text text-muted">Accepted formats: doc, pdf, xlsx, png, jpg . Max file size 2Mb</span>
					<div class="text-right">
						<button  class="btn btn-primary">Upload file</button>
					</div>
				</form>
			</li>
		</ul>
	</div>
</div>
