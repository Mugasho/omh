<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 12/4/2019
 * Time: 3:41 PM
 */

$db      =new omh\database\DB();
$ledgers =$db->getDrugLedgers();

?>

<!-- Invoice archive -->
<div class="card">
	<div class="card-header bg-transparent header-elements-inline">
		<a href="<?php echo BASE_PATH .'drugs/ledgers/add/' ?>"
		   class="btn btn-primary"><i class="icon-diff-added"></i> Add New </a>
		<div class="header-elements">
			<div class="list-icons">
				<a class="list-icons-item" data-action="collapse"></a>
				<a class="list-icons-item" data-action="reload"></a>
				<a class="list-icons-item" data-action="remove"></a>
			</div>
		</div>
	</div>

	<table class="table table-lg ledgers">
		<thead>
		<tr>
			<th>Drug</th>
			<th>In stock</th>
			<th class="text-center">Actions</th>
		</tr>
		</thead>
		<tbody>

		<?php if ( ! empty( $ledgers ) ) {
			foreach ($ledgers as $ledger){
				$drug =$db->getDrugByID($ledger['drug_id']);
				echo '<tr>
				<td>
					<a href="' . $ledger['id'] . '/">' . $drug['name_of_drug'] . '</a>
				</td>
				<td>
					' . $ledger['balance'] . '
				</td>
				<td class="text-center">
					<div class="list-icons list-icons-extended">
						<div class="list-icons-item dropdown">
							<a href="' . $ledger['id'] . '/" class="list-icons-item " ><i class="icon-file-eye"></i></a>
							<a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Export</a>
								<div class="dropdown-divider"></div>
								<a href="'.BASE_PATH.'ledgers/edit/' . $ledger['id'] . '/" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
								<a href="'.BASE_PATH.'ledgers/?post=' . $ledger['id'] . '&action=trash" class="dropdown-item"><i class="icon-bin"></i> Remove</a>
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


<script>
    $('.ledgers').DataTable({
        columnDefs: [{
            orderable: false,
            width: 100,
            targets: [4]
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