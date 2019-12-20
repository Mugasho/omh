<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 10/31/2019
 * Time: 7:16 PM
 */

$db          = new  omh\database\DB();
$utils=new omh\utils\Utils();
$expense_types = $db->getExpenseTypes();

?>

<div class="row"><?php
	if ( ! isset( $_GET['e'] ) ) {?>
		<div class="col-lg-4">
		<!-- /default ordering -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Add new expense type</h5>
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
					<input hidden name="add" title="add">
					<div class="form-group">
						<label for="expense_type">Expense Type</label>
						<input class="form-control" name="expense_type" title="Expense type">
					</div>
					<div class="form-group">
						<label for="expense_description">Expense Description</label>
						<textarea rows="5" class="form-control" name="expense_description"
						          title="Expense description"></textarea>
					</div>
					<button class="btn btn-primary">Submit</button>
				</form>
			</div>


		</div>
		<!-- /default ordering -->
		</div><?php } else {
		$expense =$db->getExpenseTypeByID($_GET['e']);
		?>
		<div class="col-lg-4">
		<!-- /default ordering -->
		<div class="card">
			<div class="card-header header-elements-inline bg-primary-300">
				<h5 class="card-title">Edit Expense type</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">

				<form method="post" action="<?php echo BASE_PATH.'expenses/types/'?>">
					<input hidden name="edit" title="edit">
					<input hidden name="id" title="id" value="<?php echo $_GET['e'];?>">
					<div class="form-group">
						<label for="expense_type">Expense type</label>
						<input class="form-control" name="expense_type" title="Expense type" value="<?php echo  $expense['expense_type'];?>">
					</div>
					<div class="form-group">
						<label for="expense_description">Description</label>
						<textarea rows="5" class="form-control" name="expense_description"
						          title="Expense Description" ><?php echo $expense['expense_description'];?></textarea>
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
				<h5 class="card-title">Expense Types</h5>
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
					<th>Expense type</th>
					<th>Description</th>
					<th class="text-center">Actions</th>
				</tr>
				</thead>
				<tbody>

				<?php if ( ! empty( $expense_types ) ) {
					foreach ( $expense_types as $expense_type ) {
						echo '<tr>
	            <td><a href="#">' . $expense_type['expense_type'] . '</a></td>
	            <td>' . $expense_type['expense_description'] . '</td>
	            <td class="text-center">
	                <div class="list-icons">
	                    <div class="dropdown">
	                        <a href="#" class="list-icons-item" data-toggle="dropdown">
	                            <i class="icon-menu9"></i>
	                        </a>
	
	                        <div class="dropdown-menu dropdown-menu-right">
	                            <a href="?e=' . $expense_type['id'] . '" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
	                            <a href="?r=' . $expense_type['id'] . '" class="dropdown-item"><i class="icon-bin"></i> Delete</a>
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
            targets: [2]
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
                'previous': $('html').attr('dir') === 'rtl' ? '&rarr;' : '&larr;'
            }
        }
    });
</script>