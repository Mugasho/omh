<?php
/**
 * Created by PhpStorm.
 * User: Lincoln
 * Date: 11/10/2019
 * Time: 8:24 PM
 */

$db          = new  omh\database\DB();
$utils=new omh\utils\Utils();
$ledger_fees = $db->getLedgerFees();
$fee_actions=$utils->get_fee_action();
?>

<div class="row"><?php
	if ( ! isset( $_GET['e'] ) ) {?>
		<div class="col-lg-4">
			<!-- /default ordering -->
			<div class="card">
				<div class="card-header header-elements-inline">
					<h5 class="card-title">Add new Ledger fee</h5>
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
							<label for="expense_fee">Ledger fee</label>
							<input class="form-control" name="ledger_fee" title="ledger fee">
						</div>
                        <div class="form-group">
                            <label for="expense_fee">Fee Action</label>
                            <select name="fee_action" class="form-control">
	                        <?php foreach ($fee_actions as $key=>$value){
		                        echo '<option value="'.$key.'">'.$value.'</option>';
	                        }?></select></div>
						<div class="form-group">
							<label for="fee_description">Description</label>
							<textarea rows="5" class="form-control" name="fee_description"
							          title="fee description"></textarea>
						</div>
						<button class="btn btn-primary">Save</button>
					</form>
				</div>


			</div>
			<!-- /default ordering -->
		</div><?php } else {
		$expense =$db->getLedgerFeeByID($_GET['e']);
		?>
		<div class="col-lg-4">
		<!-- /default ordering -->
		<div class="card">
			<div class="card-header header-elements-inline bg-primary-300">
				<h5 class="card-title">Edit Ledger fee</h5>
				<div class="header-elements">
					<div class="list-icons">
						<a class="list-icons-item" data-action="collapse"></a>
						<a class="list-icons-item" data-action="reload"></a>
						<a class="list-icons-item" data-action="remove"></a>
					</div>
				</div>
			</div>

			<div class="card-body">

				<form method="post" action="<?php echo BASE_PATH.'ledgers/fees/'?>">
					<input hidden name="edit" title="edit">
					<input hidden name="id" title="id" value="<?php echo $_GET['e'];?>">
					<div class="form-group">
						<label for="expense_fee">Ledger fee</label>
						<input class="form-control" name="ledger_fee" title="Ledger fee" value="<?php echo  $expense['ledger_fee'];?>">
					</div>
                    <div class="form-group">
                        <label for="expense_fee">Fee Action</label>
                        <select name="fee_action" class="form-control">
                            <?php foreach ($fee_actions as $key=>$value){
	                            $selected=$this->getSelected($expense['fee_action'],$key);
                                echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                            }?>
                        </select>
                    </div>
					<div class="form-group">
						<label for="expense_description">Description</label>
						<textarea rows="5" class="form-control" name="fee_description"
						          title="fee Description" ><?php echo $expense['fee_description'];?></textarea>
					</div>
					<button class="btn btn-primary">Save Changes</button>
				</form>
			</div>


		</div>
		<!-- /default ordering -->
		</div><?php } ?>

	<div class="col-lg-8">
		<!-- /default ordering -->
		<div class="card">
			<div class="card-header header-elements-inline">
				<h5 class="card-title">Ledger fees</h5>
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
					<th>Ledger fee</th>
					<th>Fee action</th>
					<th>Description</th>
					<th class="text-center">Actions</th>
				</tr>
				</thead>
				<tbody>

				<?php if ( ! empty( $ledger_fees ) ) {
					foreach ( $ledger_fees as $ledger_fee ) {
						$fee_action=$ledger_fee['fee_action']==0?'deposit':'withdraw';
						echo '<tr>
	            <td><a href="?e='.$ledger_fee['id'].'"> ' . $ledger_fee['ledger_fee'] . '</a></td>
	            <td>' . $fee_action.'</td>
	            <td>' . $ledger_fee['fee_description'] . '</td>
	            <td class="text-center">
	                <div class="list-icons">
	                    <div class="dropdown">
	                        <a href="#" class="list-icons-item" data-toggle="dropdown">
	                            <i class="icon-menu9"></i>
	                        </a>
	
	                        <div class="dropdown-menu dropdown-menu-right">
	                            <a href="?e=' . $ledger_fee['id'] . '" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
	                            <a href="?r=' . $ledger_fee['id'] . '" class="dropdown-item"><i class="icon-bin"></i> Delete</a>
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