<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/10/2019
 * Time: 12:25 PM
 */

$db=new omh\database\DB();
$expenses=$db->getExpenses();
?>

<!-- Expenses -->
<div class="card">
	<div class="card-header bg-transparent header-elements-inline">
		<a href="<?php echo BASE_PATH .'expenses/add/' ?>"
		   class="btn btn-primary"><i class="icon-diff-added"></i> Add New </a>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
				<a class="list-icons-item" data-action="reload"></a>
				<a class="list-icons-item" data-action="remove"></a>
			</div>
		</div>
	</div>

	<table class="table table-lg expense">
		<thead>
		<tr>
			<th>#</th>
			<th>Expense Type</th>
			<th>Amount</th>
			<th>Date</th>
			<th>Recurring</th>
			<th>Description</th>
			<th class="text-center">Actions</th>
		</tr>
		</thead>
		<tbody>

		<?php if ( ! empty( $expenses ) ) {
			foreach ($expenses as $expense){
				$expense_type=$db->getExpenseTypeByID($expense['expense_type_id']);
				$recurring=$expense['recurring']=='1'?'Yes':'No';
				$badge=$expense['recurring']=='1'?'success':'info';
				echo '<tr>
				<td>#'.$expense['id'].'</td>
				<td>'.$expense_type['expense_type'].'</td>
				<td>
					UGX '.$expense['amount'].'
				</td>
				<td>
					'.$expense['expense_date'].'
				</td>
				<td>
					<span class="badge badge-'.$badge.'">'.$recurring.'</span>
				</td>
				<td>
					'.$expense['expense_description'].'
				</td>
				<td class="text-center">
					<div class="list-icons list-icons-extended">
						<div class="list-icons-item dropdown">
							<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
							<div class="dropdown-menu dropdown-menu-right">
								
								<a href="#" class="dropdown-item"><i class="icon-file-eye"></i> View</a>
								<div class="dropdown-divider"></div>
								<a href="'.BASE_PATH.'expenses/edit/'.$expense['id'].'/" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
								<a href="'.BASE_PATH.'expenses/?r='.$expense['id'].'" class="dropdown-item"><i class="icon-bin"></i> Remove</a>
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
<!-- /Expenses -->

<script>
	$('.expense').DataTable({
        columnDefs: [{
            orderable: false,
            width: 100,
            targets: [6]
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
