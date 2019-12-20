<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/2/2019
 * Time: 4:26 PM
 */

$db    = new  omh\database\DB();
$utils =new omh\utils\Utils();
$users = $db->getDepartments();
$hods  =$db->getAllUsers();

?>

<div class="row"><?php
	if ( ! isset( $_GET['e'] ) ) {?>
		<div class="col-lg-4">
		<!-- /default ordering -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Add Department</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">
				<form method="post">
					<input hidden name="a" title="a">
					<div class="form-group">
						<label for="asset_name">Department</label>
						<input class="form-control" name="department" title="department">
					</div>
					<div class="form-group">
						<label for="asset_category">HOD</label>
						<select class="form-control form-control-select2" id="hod" name="hod">
							<option value="">--- select HOD ---</option>
							<?php
							foreach ($hods as $hod){
								echo '<option value="'.$hod['username'].'">'.$hod['username'].'</option>';
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="asset_description">Description</label>
						<textarea rows="5" class="form-control" name="description"
						          title="description"></textarea>
					</div>
					<button class="btn btn-primary">Submit</button>
				</form>
			</div>


		</div>
		<!-- /default ordering -->
		</div><?php } else {
		$c_department =$db->getDepartmentByID($_GET['e']);
		?>
		<div class="col-lg-4">
		<!-- /default ordering -->
		<div class="card">
			<div class="card-header header-elements-inline bg-primary-300">
				<h5 class="card-title">Edit Department</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">

				<form method="post" action="<?php echo BASE_PATH.'settings/departments/'?>">
					<input hidden name="e" title="e">
					<input hidden name="id" title="id" value="<?php echo $_GET['e'];?>">
					<div class="form-group">
						<label for="asset_name">Department</label>
						<input class="form-control" name="department" title="Department" value="<?php echo  $c_department['department'];?>">
					</div>
					<div class="form-group">
						<label for="asset_category">HOD</label>
						<select class="form-control form-control-select2" id="asset_category" name="hod">
							<?php
							foreach ($hods as $hod){
								$selected=$this->getSelected($hod['username'],$c_department['hod']);
								echo '<option value="'.$hod['username'].'" '.$selected.' >'.$hod['username'].'</option>';
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="description">Description</label>
						<textarea rows="5" class="form-control" name="description" title="Description" ><?php echo $c_department['description'];?></textarea>
					</div>
					<button class="btn btn-primary">Submit</button>
				</form>
			</div>


		</div>
		<!-- /default ordering -->
		</div><?php } ?>

	<div class="col-lg-8">
		<!-- /default ordering -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Departments</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">

			</div>
			<table class="table datatable-sorting">
				<thead>
				<tr>
					<th>Department</th>
					<th>HOD</th>
					<th>Description</th>
					<th class="text-center">Actions</th>
				</tr>
				</thead>
				<tbody>

				<?php if ( ! empty( $users ) ) {
					foreach ( $users as $department ) {
						echo '<tr>
	            <td><a href="#">' . $department['department'] . '</a></td>
	            <td>' . $department['hod'] . '</td>
	            <td>' . $department['description'] . '</td>
	            <td class="text-center">
	                <div class="list-icons">
	                    <div class="dropdown">
	                        <a href="#" class="list-icons-item" data-toggle="dropdown">
	                            <i class="icon-menu9"></i>
	                        </a>
	
	                        <div class="dropdown-menu dropdown-menu-right">
	                            <a href="?e=' . $department['id'] . '" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
	                            <a href="?r=' . $department['id'] . '" class="dropdown-item"><i class="icon-bin"></i> Delete</a>
	                            <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export to .pdf</a>
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
		<!-- /default ordering -->
	</div>
</div>


<script>
    $('.datatable-sorting').DataTable({
        autoWidth: false,
        columnDefs: [{
            orderable: false,
            width: 100,
            targets: [3]
        }],
        dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
        language: {
            search: '<span>Filter:</span> _INPUT_',
            searchPlaceholder: 'Type to filter...',
            lengthMenu: '<span>Show:</span> _MENU_',
            paginate: {
                'first': 'First',
                'last': 'Last',
                'next': $('html').attr('dir') === 'rtl' ? '&larr;' : '&rarr;',
                'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
            }
        }
    });
</script>