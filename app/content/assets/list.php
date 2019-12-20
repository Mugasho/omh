<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/11/2019
 * Time: 3:34 PM
 */
$db=new omh\database\DB();
$assets=$db->getAssets();


?>

<!-- Invoice archive -->
<div class="card">
	<div class="card-header bg-transparent header-elements-inline">
        <a href="<?php echo BASE_PATH .'assets/add/' ?>"
           class="btn btn-primary"><i class="icon-diff-added"></i> Add New </a>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
				<a class="list-icons-item" data-action="reload"></a>
				<a class="list-icons-item" data-action="remove"></a>
			</div>
		</div>
	</div>

	<table class="table table-lg tasks-list">
		<thead>
		<tr>
			<th>#</th>
			<th>Date added</th>
			<th>Item name</th>
			<th>Purchase price</th>
			<th>Purchase date</th>
			<th>Replacement value</th>
			<th>Current value</th>
			<th class="text-center">Actions</th>
		</tr>
		</thead>
		<tbody>

		<?php if ( ! empty( $assets ) ) {
			foreach ($assets as $asset){
				$valuations=$db->getAssetValuations($asset['id']);
			    $asset_type=$db->getAssetTypeByID($asset['asset_type_id']);
				echo '<tr>
				<td>#0025</td>
				<td>'.$asset_type['asset_name'].'</td>
				<td>
					<h6 class="mb-0">
						<a href="'.BASE_PATH.'assets/edit/'.$asset['id'].'/">'.$asset['asset_name'].'</a>
						<span class="d-block font-size-sm text-muted">'.$asset_type['asset_category'].' asset</span>
					</h6>
				</td>
				<td>
					UGX '.$asset['purchase_price'].'
				</td>
				<td>
					'.$asset['purchase_date'].'
				</td>
				<td>
					<span class="badge badge-success">'.$asset['replacement_date'].'</span>
				</td>
				<td>
					<h6 class="mb-0 font-weight-bold">UGX '.$asset['purchase_price'].' <span class="d-block font-size-sm text-muted font-weight-normal">'.$asset['purchase_date'].'</span></h6>
				</td>
				<td class="text-center">
					<div class="list-icons list-icons-extended">
						<a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
						<div class="list-icons-item dropdown">
							<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
								<a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
								<div class="dropdown-divider"></div>
								<a href="'.BASE_PATH.'assets/edit/'.$asset['id'].'/" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
								<a href="'.BASE_PATH.'assets/?r='.$asset['id'].'" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
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
<!-- /invoice archive -->

